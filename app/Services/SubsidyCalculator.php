<?php
namespace App\Services;

use App\Models\AreaGroup;
use App\Models\Block;
use App\Models\Enterprise;
use App\Models\EnterpriseLevel;
use App\Models\FciSubsidy;
use App\Models\InterestSubsidy;
use App\Models\Sector;
use App\Models\Subsector;
use App\Models\District;

class SubsidyCalculator
{
    public function compute(array $data): array
    {
        $pm = (float) $data['pm_investment']; // in lakh
        $fci = (float) $data['fci']; // in lakh
        $loan = min((float) $data['loan_amount'], $fci * 0.80); // in lakh, capped at 80% of FCI
        $interestRate = (float) $data['interest_rate']; // % annual
        $tenureYears = (int) $data['tenure_years'];
        $policyType = $data['policy_type'] ?? 'service';
        $isManufacturing = $policyType === 'manufacturing';
        // Large service package: determined after special package check below
        $isLargeService = false;
        $largeServiceBand = null;

        // Electricity inputs (monthly consumption in lakh units, tariff Rs/unit, duty %)
        $monthlyUnitsLakh = (float) ($data['monthly_units_lakh'] ?? 0);
        $tariffRsPerUnit = (float) ($data['tariff_per_unit'] ?? 0);
        $electricityDutyPercent = isset($data['electricity_duty_percent'])
            ? (float) $data['electricity_duty_percent']
            : (float) config('incentives.electricity_duty_percent', 8.0);

        // Entrepreneur category handling
        // Category mapping (from form input id to business meaning):
        // 1 = General Category Entrepreneurs (treated as "general" – no special bonus)
        // 2–15 = Special categories (Women, SC/ST, NRI, FDI, Export, Foreign Tech, Third Gender,
        //         Retired Ex-servicemen, Retired Police/Paramilitary, Retired Agniveer,
        //         Naxalism-affected, Differently abled, Women SHG, FPO etc.)
        $entrepreneurCategory = (int) ($data['entrepreneur_category'] ?? 1);
        $isSpecialCategory = $entrepreneurCategory !== 1; // everything except 1 is special

        // Policy: special categories get +10% on FCI subsidy amount, +10% on caps,
        // +10 percentage-points on interest subsidy, and +1 year on all tenure-based benefits
        $bonusPct = 10.0;   // extra percentage-points on interest
        $bonusCapPct = 10.0; // extra % on monetary caps
        $bonusYears = 1;    // extra years

        // Check sector for special package flag
        $sector = Sector::find($data['sector_id']);

        // PM > 5000 lakh + is_special_sector=1 → Special Package
        // PM > 5000 lakh + is_special_sector=0 → Large Enterprise
        // Sector 22 (GCC): special package based on FCI > ₹10 Cr (1000 lakh), PM not used
        $isLargeByPm = $pm > 5000;
        $isSector22ByFci = ((int) $data['sector_id'] === 22) && $sector && $sector->is_special_sector && $fci > 1000;
        $isSpecialPackage = $isSector22ByFci || ($isLargeByPm && $sector && $sector->is_special_sector);
        $isLargeEnterprise = $isLargeByPm && !$isSpecialPackage;

        // Large service package: FCI > ₹50 Cr (5000 Lakh) and < ₹500 Cr (50000 Lakh), but NOT special package
        $isLargeService = (!$isManufacturing && !$isSpecialPackage && $fci > 5000 && $fci < 50000);
        if ($isLargeService) {
            if ($fci > 5000 && $fci < 20000) {
                $largeServiceBand = '50-200';
            } elseif ($fci > 20000 && $fci < 50000) {
                $largeServiceBand = '200-500';
            }
        }

        // Determine enterprise (General vs Thrust) from subsector and threshold
        // No thrust enterprise for special package sectors
        $sub = Subsector::findOrFail($data['subsector_id']);
        if ($isSpecialPackage) {
            $isThrust = false;
            $enterpriseId = 1; // General
            $enterpriseName = 'Special Package';
        } elseif ($isManufacturing) {
            $isThrust = $sub->is_thrust && ($sub->min_capital_investment_lakh === null || $pm >= (float)$sub->min_capital_investment_lakh);

            $enterpriseId = $isThrust ? 2 : 1; // 1=General, 2=Thrust
            $enterpriseName = $isThrust ? 'Thrust Enterprise' : 'General Enterprise';
        } else {
            $isThrust = false;
            $enterpriseId = null;
            $enterpriseName = $isLargeService ? 'Large Service Enterprise' : 'Service Enterprise';
        }

        // Determine enterprise level by P&M investment (in lakh)
        $level = EnterpriseLevel::query()
            ->where(function ($q) use ($pm) {
                $q->whereNull('min_pm_lakh')->orWhere('min_pm_lakh', '<=', $pm);
            })
            ->where(function ($q) use ($pm) {
                $q->whereNull('max_pm_lakh')->orWhere('max_pm_lakh', '>=', $pm);
            })
            ->orderBy('min_pm_lakh')
            ->first();
        $levelId = $level?->id ?? 1;
        $levelName = $level?->name ?? 'Micro';

        // Override level name when PM > 5000
        if ($isSpecialPackage) {
            $levelName = 'Special Package';
        } elseif ($isLargeEnterprise) {
            $levelName = 'Large';
        }

        // Area group from block (default group 1)
        $groupId = 1;
        $groupName = 'Group 1';
        if (!empty($data['block_id'])) {
            $block = Block::with('areaGroup')->find($data['block_id']);
            if ($block) {
                $groupId = $block->area_group_id;
                $groupName = $block->areaGroup?->name ?? ('Group '.$groupId);
            }
        }

        // Service policy: enforce subsector-specific eligibility using group/division rules
        $eligibleService = true;
        $minRequiredLakh = null;
        $eligibilityReasons = [];
        if (!$isManufacturing) {
            $minRequiredLakh = $sub->min_capital_investment_lakh !== null
                ? (float) $sub->min_capital_investment_lakh
                : 0.0;
            $rules = [];
            if (!empty($sub->eligibility_rules_json)) {
                try { $rules = json_decode($sub->eligibility_rules_json, true) ?: []; } catch (\Throwable $e) { $rules = []; }
            }
            // Group-based thresholds override base min; if group not listed, treat as ineligible
            if (!empty($rules['group_thresholds']) && is_array($rules['group_thresholds'])) {
                $grpKey = (string) $groupId;
                if (array_key_exists($grpKey, $rules['group_thresholds'])) {
                    $minRequiredLakh = (float) $rules['group_thresholds'][$grpKey];
                } else {
                    $eligibleService = false;
                    $eligibilityReasons[] = 'Not eligible for selected Area Group';
                }
            }
            // Division-based overrides (by division name)
            $district = \is_numeric($data['district_id'] ?? null)
                ? District::with('division')->find($data['district_id'])
                : null;
            $divisionName = $district?->division?->name;
            if (!empty($rules['division_overrides']) && is_array($rules['division_overrides']) && $divisionName) {
                foreach ($rules['division_overrides'] as $ov) {
                    $ovDiv = $ov['division'] ?? null;
                    if ($ovDiv && strcasecmp($ovDiv, $divisionName) === 0) {
                        $minRequiredLakh = (float) ($ov['min_investment_lakh'] ?? $minRequiredLakh);
                        break;
                    }
                }
            }
            // Enforce minimum investment against Fixed Capital Investment (FCI)
            if ($eligibleService && $minRequiredLakh !== null && $fci < (float) $minRequiredLakh) {
                $eligibleService = false;
                $eligibilityReasons[] = 'Minimum investment of '.$minRequiredLakh.' Lakh required for the selected subsector';
            }
        }

        // Interest subsidy lookup (by policy type)
        $interestRow = InterestSubsidy::query()
            ->where('policy_type', $policyType)
            ->where('enterprise_level_id', $levelId)
            ->where('area_group_id', $groupId)
            ->when($isManufacturing, fn($q) => $q->where('enterprise_id', $enterpriseId))
            ->first();

        // Fallback to general enterprise row if missing (manufacturing only)
        if ($isManufacturing && !$interestRow) {
            $interestRow = InterestSubsidy::query()
                ->where('policy_type', $policyType)
                ->where('enterprise_id', 1)
                ->where('enterprise_level_id', $levelId)
                ->where('area_group_id', $groupId)
                ->first();
        }

        // FCI subsidy lookup (by policy type)
        $fciRow = FciSubsidy::query()
            ->where('policy_type', $policyType)
            ->where('enterprise_level_id', $levelId)
            ->where('area_group_id', $groupId)
            ->when($isManufacturing, fn($q) => $q->where('enterprise_id', $enterpriseId))
            ->first();
        if ($isManufacturing && !$fciRow) {
            $fciRow = FciSubsidy::query()
                ->where('policy_type', $policyType)
                ->where('enterprise_id', 1)
                ->where('enterprise_level_id', $levelId)
                ->where('area_group_id', $groupId)
                ->first();
        }

        // Check if Large enterprise level
        $isLargeLevel = strcasecmp($levelName, 'Large') === 0;
        
        // Apply entrepreneur category bonus to interest (not applicable to large service package)
        $interestPct = $interestRow?->interest_percentage ?? 0; // % of yearly interest
        $interestYears = $interestRow?->interest_term_years ?? 0; // years
        $interestCapPerYear = (float)($interestRow?->interest_max_limit_lakh ?? 0); // in lakh

        // Sector 22 GCC classification (read employment early for this check)
        $employment = (int) ($data['employment_count'] ?? 0);
        $isSector22 = $isSpecialPackage && ((int) $data['sector_id'] === 22);
        $gccLevel = null; // null, 'level1', 'advanced'
        if ($isSector22) {
            if ($fci > 5000) {
                $gccLevel = 'advanced'; // Advanced GCC: FCI > ₹50 Cr
            } elseif ($fci > 1000) {
                $gccLevel = 'level1'; // Level-1 GCC: FCI ₹10-50 Cr
            }
        }

        // Special package interest subsidy
        $spInterestPerYear = 0.0;
        if ($isSector22 && $gccLevel) {
            // Sector 22 GCC interest subsidy: lower of X% of interest paid or 6% rate, capped per year, 5 years
            $interestPct = 6.0; // display as 6%
            $interestYears = 5;
            if ($gccLevel === 'level1') {
                $interestCapPerYear = 100.0; // ₹1 Cr = 100 lakh per year
                $gccInterestPctOfPaid = 0.50; // 50% of interest paid
            } else {
                $interestCapPerYear = 200.0; // ₹2 Cr = 200 lakh per year
                $gccInterestPctOfPaid = 0.40; // 40% of interest paid
            }
        } elseif ($isSpecialPackage) {
            // Other special package sectors: 50% of PM × 6%, max ₹20 Cr/year (2000 lakh), 6 years
            $spInterestBase = $pm * 0.50; // 50% of PM
            $spInterestAnnual = $spInterestBase * 0.06; // 6% of that
            $interestPct = 6.0; // display as 6%
            $interestCapPerYear = 2000.0; // ₹20 Cr = 2000 lakh per year
            $interestYears = 6;
            $spInterestPerYear = min($interestCapPerYear, $spInterestAnnual);
        } elseif ($isLargeLevel) {
            // For Large enterprise: 40% of loan amount for up to 5 years, capped at 5 crore per annum (500 lakh)
            $interestPct = 40.0; // 40% of loan amount
            $interestYears = 5; // up to 5 years
            $interestCapPerYear = 500.0; // 5 crore = 500 lakh per annum
        } elseif ($isSpecialCategory && !$isLargeService) {
            // +10% of current value on interest subsidy rate (e.g., 40% + 10% of 40 = 44%)
            $interestPct = min(100.0, $interestPct * (1 + $bonusCapPct/100.0));
            // +10% on yearly cap
            $interestCapPerYear = $interestCapPerYear * (1 + $bonusCapPct/100.0);
            // +1 extra year on interest term
            $interestYears += $bonusYears;
        }

        // EMI-based amortization schedule (annual compounding)
        $r = $interestRate / 100.0;
        if ($r > 0 && $tenureYears > 0) {
            $emi = $loan * ($r * pow(1+$r, $tenureYears)) / (pow(1+$r, $tenureYears) - 1);
        } else {
            $emi = $tenureYears > 0 ? ($loan / $tenureYears) : 0.0;
        }
        $outstanding = $loan;
        $interestSeries = [];
        for ($y = 1; $y <= $tenureYears; $y++) {
            $interestForYear = $outstanding * $r;
            $interestSeries[] = $interestForYear;
            $principalPay = max(0.0, $emi - $interestForYear);
            $outstanding = max(0.0, $outstanding - $principalPay);
        }
        $interestYearsApplied = min($tenureYears, $interestYears);
        $interestSubsidySeries = [];
        
        if ($isSector22 && $gccLevel) {
            // Sector 22 GCC: lower of (X% of interest paid) or (interest at 6% rate), capped per year, 5 years
            $interestYearsApplied = $interestYears; // always 5 years, not tied to loan tenure
            for ($i = 0; $i < $interestYearsApplied; $i++) {
                $interestPaid = $interestSeries[$i] ?? 0;
                $optionA = $interestPaid * $gccInterestPctOfPaid; // X% of interest actually paid
                $optionB = $loan * 0.06; // interest calculated at 6% rate
                if ($interestPaid > 0 && $optionB > 0) {
                    $eligible = min($optionA, $optionB); // whichever is lower
                } elseif ($optionB > 0) {
                    $eligible = $optionB; // no interest paid data, use 6% calculation
                } else {
                    $eligible = $optionA; // fallback
                }
                $interestSubsidySeries[$i] = min($interestCapPerYear, max(0, $eligible));
            }
        } elseif ($isSpecialPackage) {
            // Other special package: fixed annual subsidy (50% of PM × 6%), capped at ₹20 Cr/year, for 6 years
            $interestYearsApplied = $interestYears; // not tied to loan tenure
            for ($i = 0; $i < $interestYearsApplied; $i++) {
                $interestSubsidySeries[$i] = $spInterestPerYear;
            }
        } elseif ($isLargeLevel) {
            // For Large enterprise: 40% of loan amount per year (not interest), capped at 500 lakh per year
            for ($i = 0; $i < $interestYearsApplied; $i++) {
                $eligible = $loan * ($interestPct/100.0); // 40% of loan amount
                $interestSubsidySeries[$i] = min($interestCapPerYear, $eligible); // Cap at 500 lakh
            }
        } else {
            // Regular calculation: percentage of interest paid
            for ($i = 0; $i < $interestYearsApplied; $i++) {
                $eligible = $interestSeries[$i] * ($interestPct/100.0);
                $interestSubsidySeries[$i] = min($interestCapPerYear, $eligible);
            }
        }
        $interestTotal = array_sum($interestSubsidySeries);

        // Employment multiplier (affects FCI % and cap for regular schemes)
        // $employment already set above for GCC classification
        $employmentMultiplier = 1.0;
        if ($employment >= 1000) $employmentMultiplier = 1.5;
        elseif ($employment >= 700) $employmentMultiplier = 1.4;
        elseif ($employment >= 500) $employmentMultiplier = 1.3;
        elseif ($employment >= 200) $employmentMultiplier = 1.2;
        elseif ($employment >= 100) $employmentMultiplier = 1.1;

        if ($isSpecialPackage) {
            // Special package FCI subsidy: sector-specific rates and caps, 6-year equal disbursement
            $sectorId = (int) $data['sector_id'];
            $subsectorId = (int) $data['subsector_id'];
            if ($sectorId === 22 && $gccLevel) {
                // Sector 22 GCC: 35% subsidy with GCC-level caps
                $fciPct = 35.0;
                if ($gccLevel === 'level1') {
                    $fciCap = 1500.0; // ₹15 Cr = 1500 lakh
                    $fciYears = 5;
                } else {
                    $fciCap = 6000.0; // ₹60 Cr = 6000 lakh
                    $fciYears = 6;
                }
                // Both employment multiplier and entrepreneur bonus apply on base (no subsidy on subsidy)
                $combinedMultiplier = $employmentMultiplier + ($isSpecialCategory ? $bonusCapPct/100.0 : 0);
                $fciPct = min(100.0, $fciPct * $combinedMultiplier);
                $fciCap = $fciCap * $combinedMultiplier;
                $fciSubsidy = min($fciCap, $fci * ($fciPct / 100.0));
                $fciPerYear = $fciYears > 0 ? ($fciSubsidy / $fciYears) : $fciSubsidy;
                $fciSchedule = array_fill(0, $fciYears, round($fciPerYear, 2));
            } elseif ($sectorId === 2) {
                // Sector 2: 30% subsidy
                $fciPct = 30.0;
                if ($pm > 50000) {
                    $fciCap = 20000.0; // ₹200 Cr = 20000 lakh (PM > ₹500 Cr)
                } elseif ($pm > 20000) {
                    $fciCap = 12000.0; // ₹120 Cr = 12000 lakh (PM ₹200-500 Cr)
                } else {
                    $fciCap = 5000.0;  // ₹50 Cr = 5000 lakh (PM ₹50-200 Cr)
                }
            } elseif (($sectorId === 5 && $subsectorId === 25) || ($sectorId === 15 && $subsectorId === 102)) {
                // Sector 5 (subsector 25) / Sector 15 (subsector 102): 50% subsidy
                $fciPct = 50.0;
                if ($pm > 50000) {
                    $fciCap = 45000.0; // ₹450 Cr = 45000 lakh (PM > ₹500 Cr)
                } elseif ($pm > 20000) {
                    $fciCap = 23000.0; // ₹230 Cr = 23000 lakh (PM ₹200-500 Cr)
                } else {
                    $fciCap = 9000.0;  // ₹90 Cr = 9000 lakh (PM ₹50-200 Cr)
                }
            } else {
                // Sector 1 and others (default): 35% subsidy
                $fciPct = 35.0;
                if ($pm > 50000) {
                    $fciCap = 30000.0; // ₹300 Cr = 30000 lakh (PM > ₹500 Cr)
                } elseif ($pm > 20000) {
                    $fciCap = 15000.0; // ₹150 Cr = 15000 lakh (PM ₹200-500 Cr)
                } else {
                    $fciCap = 6000.0;  // ₹60 Cr = 6000 lakh (PM ₹50-200 Cr)
                }
            }
            // Sector 22 GCC already calculated above — skip shared logic
            if (!($sectorId === 22 && $gccLevel)) {
                // Both employment multiplier and entrepreneur bonus apply on base (no subsidy on subsidy)
                $combinedMultiplier = $employmentMultiplier + ($isSpecialCategory ? $bonusCapPct/100.0 : 0);
                $fciPct = min(100.0, $fciPct * $combinedMultiplier);
                $fciCap = $fciCap * $combinedMultiplier;

                $fciSubsidy = min($fciCap, $fci * ($fciPct / 100.0));
                $fciYears = 6;
                $fciPerYear = $fciYears > 0 ? ($fciSubsidy / $fciYears) : $fciSubsidy;
                $fciSchedule = array_fill(0, $fciYears, round($fciPerYear, 2));
            }
        } elseif ($isLargeService && $largeServiceBand) {
            // Large service FCI subsidy package: 30% with band-wise cap, 10-year equal disbursement
            // Apply employment multiplier here as well.
            $fciPctBaseLarge = 30.0;
            $fciCapBaseLarge = $largeServiceBand === '50-200' ? 5000.0 : 14000.0; // ₹50 Cr / ₹140 Cr in Lakh
            // Both employment multiplier and entrepreneur bonus apply on base (no subsidy on subsidy)
            $combinedMultiplier = $employmentMultiplier + ($isSpecialCategory ? $bonusCapPct/100.0 : 0);
            $fciPct = min(100.0, $fciPctBaseLarge * $combinedMultiplier);
            $fciCap = $fciCapBaseLarge * $combinedMultiplier;
            
            $fciSubsidy = min($fciCap, $fci * ($fciPct/100.0));
            $fciYears = 10;
            $fciPerYear = $fciYears > 0 ? ($fciSubsidy / $fciYears) : $fciSubsidy;
            $fciSchedule = array_fill(0, $fciYears, round($fciPerYear, 2));
        } else {
            $fciPctBase = $fciRow?->fci_percentage ?? 0; // base %
            $fciCapBase = (float)($fciRow?->fci_max_limit_lakh ?? 0);
            // Both employment multiplier and entrepreneur bonus apply on base (no subsidy on subsidy)
            $combinedMultiplier = $employmentMultiplier + ($isSpecialCategory ? $bonusCapPct/100.0 : 0);
            $fciPct = min(100.0, $fciPctBase * $combinedMultiplier);
            $fciCap = $fciCapBase * $combinedMultiplier;

            // Calculate subsidy after applying all bonuses
            $fciSubsidy = min($fciCap, $fci * ($fciPct/100.0));

            // Disbursement schedule
            if ($isManufacturing && strcasecmp($levelName, 'Large') === 0) {
                // Large manufacturing: 10 years for General, 8 years for Thrust
                $fciYears = $isThrust ? 8 : 10;
            } else {
                // Existing policy note for other levels
                $fciYears = match (strtolower($levelName)) {
                    'micro' => 1,
                    'small' => 3,
                    'medium' => 5,
                    default => 1,
                };
            }
            $fciPerYear = $fciYears > 0 ? ($fciSubsidy / $fciYears) : $fciSubsidy;
            $fciSchedule = array_fill(0, $fciYears, round($fciPerYear, 2));
        }

        // Electricity duty exemption
        $dutyPct = $electricityDutyPercent;
        if ($policyType === 'manufacturing') {
            if (strcasecmp($levelName, 'Large') === 0) {
                // Large manufacturing: group- and enterprise-specific years
                $baseDutyTenure = match ([$enterpriseId, $groupId]) {
                    // General (enterpriseId = 1)
                    [1,1] => 6,
                    [1,2] => 7,
                    [1,3] => 8,
                    // Thrust (enterpriseId = 2)
                    [2,1] => 8,
                    [2,2] => 10,
                    [2,3] => 12,
                    default => 6,
                };
                // +1 year electricity duty exemption for special entrepreneur categories (2–15)
                $dutyYears = $baseDutyTenure + ($isSpecialCategory ? $bonusYears : 0);
            } else {
                // Manufacturing (non-large): depends on enterprise type and group (General 5/7/9, Thrust 6/8/10)
                $baseDutyTenure = match ([$enterpriseId, $groupId]) {
                    [1,1] => 5,
                    [1,2] => 7,
                    [1,3] => 9,
                    [2,1] => 6,
                    [2,2] => 8,
                    [2,3] => 10,
                    default => 5,
                };
                // +1 year electricity duty exemption for special entrepreneur categories (2–15)
                $dutyYears = $baseDutyTenure + ($isSpecialCategory ? $bonusYears : 0);
            }
        } else {
            // Service: by group only (6/8/10)
            $baseDutyTenure = match ($groupId) {
                1 => 6,
                2 => 8,
                3 => 10,
                default => 6,
            };
            // Large service package: fixed duty period by FCI band (no extra year for special category)
            if ($isLargeService && $largeServiceBand) {
                $dutyYears = $largeServiceBand === '50-200' ? 6 : 7;
            } else {
                // +1 year electricity duty exemption for special entrepreneur categories (2–15)
                $dutyYears = $baseDutyTenure + ($isSpecialCategory ? $bonusYears : 0);
            }
        }
        // Annual electricity bill (Lakhs) = monthly_units_lakh * 12 * tariff (Rs/unit) / 100000
        $yearlyUnits = $monthlyUnitsLakh * 100000 * 12.0; // units/year
        $electricityBillYearLakh = ($yearlyUnits * $tariffRsPerUnit) / 100000.0;
        $electricityDutySavingPerYear = $electricityBillYearLakh * ($dutyPct/100.0);
        $electricityDutyTotal = $electricityDutySavingPerYear * $dutyYears;

        // Land-based values
        $landArea = (float) ($data['land_area_acres'] ?? 0);
        $landRate = (float) ($data['land_rate_per_acre'] ?? 0);
        $landValueLakh = $landArea * $landRate;
        $stampDutySaving = $landValueLakh * (config('incentives.stamp_duty_percent')/100.0); // full exemption
        $landRegistrationBase = $landValueLakh * (config('incentives.land_registration_percent')/100.0); // full registration fee
        // Registration fee: 50% reimbursement for eligible large service, large manufacturing, or special package enterprises
        $landRegistrationSaving = 0.0;
        if (($isLargeService && !$isManufacturing) || ($policyType === 'manufacturing' && (strcasecmp($levelName, 'Large') === 0 || $isSpecialPackage))) {
            $landRegistrationSaving = 0.5 * $landRegistrationBase;
        }
        // Land diversion:
        // - Service (including large service): 50% up to 50 acres
        // - Manufacturing non-large: 50% up to 15 acres, only Micro/Small (levelId <= 2)
        // - Large manufacturing / Special Package: 50% up to 50 acres
        if ($policyType === 'manufacturing') {
            if (strcasecmp($levelName, 'Large') === 0 || $isSpecialPackage) {
                $eligibleAcres = min($landArea, 50);
            } else {
                $eligibleAcres = ($levelId <= 2) ? min($landArea, 15) : 0; // only micro/small
            }
        } else {
            $eligibleAcres = min($landArea, 50);
        }
        $landDiversionBaseLakh = $eligibleAcres * $landRate * (config('incentives.land_diversion_percent')/100.0);
        $landDiversionSaving = 0.5 * $landDiversionBaseLakh;

        // Policy override: remove Land diversion charges when Industry Type is service (except large service package)
        if ($policyType === 'service' && !$isLargeService) {
            $landDiversionSaving = 0.0;
        }

        // Expense-based incentives (assume caps if enabled and no expense inputs provided)
        $assumeCaps = (bool) config('incentives.assume_expense_caps', true);
        $projectReport = min($fci * (config('incentives.project_report_percent_of_fci')/100.0), (float) config('incentives.project_report_max_lakh'));
        $qualityCert = $assumeCaps ? (float) config('incentives.quality_cert_max_lakh') : 0.0;
        $patent = $assumeCaps ? (float) config('incentives.patent_max_lakh') : 0.0;
        $techPurchase = $assumeCaps ? (float) config('incentives.technology_purchase_max_lakh') : 0.0;
        $envProject = $assumeCaps ? (float) config('incentives.env_project_max_lakh') : 0.0;
        $waterPowerAudit = $assumeCaps ? (float) config('incentives.water_power_audit_max_lakh') : 0.0;

        // Mandi fee exemption (manufacturing only): Agro/Food, max ₹5 cr/yr for 5 years, total ≤ 75% of FCI and ≤ ₹25 cr
        $sectorName = $sub->sector?->name ?? '';
        $mandiFeePerYearInputLakh = (float) ($data['mandi_fee_lakh'] ?? 0);
        $mandiPerYearCapLakh = 500.0;
        $mandiYears = 5;
        // +1 year mandi fee exemption for special entrepreneur categories (2–15)
        if ($isSpecialCategory) {
            $mandiYears += $bonusYears;
        }
        $mandiCapTotalLakh = $mandiYears * $mandiPerYearCapLakh;
        $mandiEligible = ($policyType === 'manufacturing') && (
            stripos($sectorName, 'agri') !== false
            || stripos($sectorName, 'food') !== false
            || stripos($sectorName, 'horticulture') !== false
        );
        $mandiSchedule = [];
        $mandiFee = 0.0;
        if ($mandiEligible && $mandiFeePerYearInputLakh > 0) {
            $remaining = min($mandiFeePerYearInputLakh * $mandiYears, min($fci * 0.75, $mandiCapTotalLakh));
            for ($i = 0; $i < $mandiYears && $remaining > 0; $i++) {
                $pay = min($mandiPerYearCapLakh, $mandiFeePerYearInputLakh, $remaining);
                $mandiSchedule[$i] = round($pay, 2);
                $remaining -= $pay;
            }
            $mandiFee = array_sum($mandiSchedule);
        }

        // Training stipend
        $employees = (int) ($data['employment_count'] ?? 0);
        $avgSalary = (int) config('incentives.avg_salary_per_employee_pm', 15000);
        $trainPayRs = min((int) config('incentives.training_month_salary_cap', 15000), $avgSalary);
        if ($isSpecialPackage || (($isLargeService && !$isManufacturing) || ($policyType === 'manufacturing' && strcasecmp($levelName, 'Large') === 0))) {
            // Large service / large manufacturing: one month's salary (max ₹15,000) per employee for 5 years,
            // capped overall at 100% of FCI
            $perEmployeeLakhPerYear = ($trainPayRs) / 100000.0;
            $trainingTotalPotential = $perEmployeeLakhPerYear * $employees * 5;
            $trainingSubsidy = min($fci, $trainingTotalPotential);
        } else {
            $trainable = (int) floor($employees * (float) config('incentives.training_employee_ratio', 0.0));
            $trainingSubsidy = ($trainable * $trainPayRs) / 100000.0; // to Lakhs
            if ($policyType === 'manufacturing' && !$isThrust) {
                $trainingSubsidy = 0.0;
            }
        }

        // Employment subsidy (net salary/remuneration)
        $employmentPct = (float) config('incentives.special_employment_percent', 40);
        $employmentCapPerYear = (float) config('incentives.special_employment_cap_per_year_lakh', 5);
        $employmentYears = (int) config('incentives.special_employment_years', 5);
        $employmentPerYear = 0.0;
        $employmentSchedule = [];
        // Employment subsidy:
        // - Large service: applies for all entrepreneur categories
        // - All manufacturing (MSME and Large): applies for all entrepreneur categories
        // - Service MSME (Micro, Small, Medium): NOT eligible
        $employmentEligibleLargeService = $isLargeService && !$isManufacturing && $employment > 0;
        $employmentEligibleManufacturing = $isManufacturing && $employment > 0;
        $employmentEligibleSpecialPackage = $isSpecialPackage && $employment > 0;
        $employmentEligible = $employmentEligibleLargeService || $employmentEligibleManufacturing || $employmentEligibleSpecialPackage;
        // Use the same default salary assumption as training stipend (₹15,000 per month)
        $employmentMonthlySalary = (int) config('incentives.avg_salary_per_employee_pm', 15000);
        $employmentCount = (int) ($data['employment_count'] ?? 0);
        $employmentBaseSalaryLakh = ($employmentMonthlySalary * 12 * $employmentCount) / 100000.0;
        if ($employmentEligible && $employmentBaseSalaryLakh > 0) {
            $employmentPerYear = min($employmentCapPerYear, $employmentBaseSalaryLakh * ($employmentPct/100.0));
            $employmentSchedule = array_fill(0, $employmentYears, round($employmentPerYear, 2));
        }
        $employmentSubsidy = $employmentEligible ? ($employmentPerYear * $employmentYears) : 0.0;

        // Exporter transport subsidy
        $isExporter = (int) ($data['is_exporter'] ?? 0) === 1;
        $freightExpense = (float) ($data['freight_expense_lakh'] ?? 0);
        $transportYears = 5;
        $transportCapPerYear = 50.0; // lakh per year
        $transportPerYear = 0.0;
        $transportSchedule = [];
        if (!$isLargeService && $isExporter && $freightExpense > 0) {
            $transportPerYear = min($transportCapPerYear, 0.5 * $freightExpense);
            $transportSchedule = array_fill(0, $transportYears, round($transportPerYear, 2));
        }
        $transportSubsidy = $transportPerYear * $transportYears;

        // Large manufacturing: cap "other subsidies" at 2% of FCI.
        // Other subsidies include: Project report, Quality cert, Patent, Technology purchase,
        // Environment project, Water & power audit, and Transportation subsidy (for exporters).
        if ($policyType === 'manufacturing' && strcasecmp($levelName, 'Large') === 0) {
            $otherTotal = $projectReport + $qualityCert + $patent + $techPurchase + $envProject + $waterPowerAudit + $transportSubsidy;
            $otherCap = $fci * 0.02;
            if ($otherCap > 0 && $otherTotal > $otherCap) {
                $scale = $otherCap / $otherTotal;
                $projectReport *= $scale;
                $qualityCert *= $scale;
                $patent *= $scale;
                $techPurchase *= $scale;
                $envProject *= $scale;
                $waterPowerAudit *= $scale;
                $transportSubsidy *= $scale;
                // Adjust transport schedule accordingly
                if (!empty($transportSchedule)) {
                    $transportPerYear *= $scale;
                    foreach ($transportSchedule as $i => $v) {
                        $transportSchedule[$i] = round($v * $scale, 2);
                    }
                }
            }
        }

        // EPF reimbursement (Large enterprise level or Special Package)
        // Assumptions:
        // - Employee salary = 15,000
        // - EPF-eligible wage = 75% of salary
        // - Employer EPF rate = 12%
        // - Calculated for 12 months
        // - EPF subsidy duration = 5 years
        // - Annual EPF subsidy ≤ 2% of FCI (cap per year)
        $epfYears = 5;
        $epfSchedule = [];
        $epfPerYear = 0.0;
        $epfCapTotal = 0.0;
        if ($employment > 0 && $isSpecialPackage) {
            // Special package EPF: 75% reimbursement for 5 years, up to 2% of FCI/year
            $baseSalary = 15000.0;
            $epfEligibleFrac = 0.75;
            $employerRate = 0.12;
            $months = 12;
            $epfAnnualPerEmpLakh = ($baseSalary * $epfEligibleFrac * $employerRate * $months) / 100000.0;
            $epfAnnualBaseLakh = $employment * $epfAnnualPerEmpLakh;
            $epfReimbursePct = 0.75; // 75% reimbursement
            $epfAnnualCapLakh = min($epfAnnualBaseLakh * $epfReimbursePct, $fci * 0.02);

            if ($epfAnnualCapLakh > 0) {
                $epfPerYear = $epfAnnualCapLakh;
                $epfCapTotal = $epfPerYear * $epfYears;
                $epfSchedule = array_fill(0, $epfYears, round($epfPerYear, 2));
            }
        } elseif ($employment > 0) {
            // EPF for Large and MSME (Micro, Small, Medium) in both Services and Manufacturing
            $baseSalary = 15000.0;
            $epfEligibleFrac = 0.75;
            $employerRate = 0.12;
            $months = 12;
            $epfAnnualPerEmpLakh = ($baseSalary * $epfEligibleFrac * $employerRate * $months) / 100000.0;
            $epfAnnualBaseLakh = $employment * $epfAnnualPerEmpLakh;

            if (!$isManufacturing) {
                // Service (including Large service): annual cap = 2% of FCI
                $epfAnnualCapLakh = min($epfAnnualBaseLakh, $fci * 0.02);
            } else {
                // Manufacturing: annual cap = ₹1 Cr = 100 Lakh
                $epfAnnualCapLakh = min($epfAnnualBaseLakh, 100.0);
            }

            if ($epfAnnualCapLakh > 0) {
                $epfPerYear = $epfAnnualCapLakh;
                $epfCapTotal = $epfPerYear * $epfYears;
                $epfSchedule = array_fill(0, $epfYears, round($epfPerYear, 2));
            }
        }

        // Zero Waste Incentive (Special Package only): ₹10 lakh/year for 5 years
        $zeroWastePerYear = 0.0;
        $zeroWasteYears = 0;
        $zeroWasteTotal = 0.0;
        $spSectorId = (int) $data['sector_id'];
        $spSubsectorId = (int) $data['subsector_id'];
        $noZeroWaste = $spSectorId === 4
            || $spSectorId === 23
            || $spSectorId === 5
            || $spSectorId === 15
            || $spSectorId === 22;
        if ($isSpecialPackage && !$noZeroWaste) {
            $zeroWastePerYear = 10.0; // ₹10 lakh per year
            $zeroWasteYears = 5;
            $zeroWasteTotal = $zeroWastePerYear * $zeroWasteYears; // ₹50 lakh total
        }

        // ETP Subsidy (Special Package only, not sector 4, 23): ₹1 Cr = 100 lakh (one-time)
        $etpSubsidy = 0.0;
        if ($isSpecialPackage && $spSectorId !== 4 && $spSectorId !== 23) {
            $etpSubsidy = 100.0; // ₹1 Cr = 100 lakh
        }

        // New Electricity Connection (Special Package only): 50% of cost (excl. security deposit), max ₹5 lakh
        $newElecConnection = 0.0;
        if ($isSpecialPackage) {
            $newElecConnection = 5.0; // ₹5 lakh max
        }

        // Registration Fee Reimbursement (Special Package only): 50% of registration fee on land
        $registrationFeeReimbursement = 0.0;
        if ($isSpecialPackage) {
            $registrationFeeReimbursement = $landRegistrationBase * 0.50;
        }

        // Rental Subsidy (Special Package, sector 5/15 except subsector 25/102): 40% of monthly rent, max ₹50,000/month for 5 yrs
        $rentalSubsidyTotal = 0.0;
        $rentalSubsidyYears = 0;
        $rentalSubsidyPerYear = 0.0;
        if ($isSpecialPackage && in_array($spSectorId, [5, 15]) && !in_array($spSubsectorId, [25, 102])) {
            $rentalSubsidyYears = 5;
            $rentalMaxPerMonthLakh = 0.50; // ₹50,000 = 0.50 lakh
            $rentalSubsidyPerYear = $rentalMaxPerMonthLakh * 12; // ₹6 lakh/year
            $rentalSubsidyTotal = $rentalSubsidyPerYear * $rentalSubsidyYears; // ₹30 lakh total
        }

        // Sector 22 GCC-specific incentives
        $payrollSubsidyTotal = 0.0;
        $payrollSubsidyPerYear = 0.0;
        $payrollSubsidyYears = 0;
        $opexSubsidyTotal = 0.0;
        $opexSubsidyPerYear = 0.0;
        $opexSubsidyYears = 0;
        $incubationTotal = 0.0;
        $incubationEstablishment = 0.0;
        $incubationOperationalPerYear = 0.0;
        $incubationOperationalYears = 0;
        if ($isSector22 && $gccLevel) {
            // Payroll Subsidy: 20% of salary, max ₹2L/employee/month, 5 yrs
            $payrollSubsidyYears = 5;
            $payrollMaxPerEmpPerMonthLakh = 2.0; // ₹2 lakh
            $payrollSubsidyPerYear = $payrollMaxPerEmpPerMonthLakh * 12 * $employment; // max per year
            $payrollSubsidyTotal = $payrollSubsidyPerYear * $payrollSubsidyYears;

            // Operational Expenditure Subsidy: 20% of OpEx, max 2% of FCI/yr, 5 yrs
            $opexSubsidyYears = 5;
            $opexSubsidyPerYear = $fci * 0.02; // max 2% of FCI/year
            $opexSubsidyTotal = $opexSubsidyPerYear * $opexSubsidyYears;

            // Incubation Center Subsidy: Establishment 40% of expenses max ₹40L; Operational ₹5L/yr (Divisional) or ₹3L/yr (Other) for 5 yrs
            $incubationEstablishment = 40.0; // max ₹40 lakh (40% of expenses)
            $incubationOperationalYears = 5;
            $incubationOperationalPerYear = 5.0; // ₹5L/yr (assuming divisional HQ; ₹3L/yr for others)
            $incubationTotal = $incubationEstablishment + ($incubationOperationalPerYear * $incubationOperationalYears);
        }

        // Grand total of itemized components implemented
        $subtotals = [
            'Fixed capital investment subsidy' => round($fciSubsidy, 2),
            'Interest subsidy' => round($interestTotal, 2),
            'Electricity duty exemption' => round($electricityDutyTotal, 2),
            'Stamp duty exemption' => round($stampDutySaving, 2),
            'Land registration fee exemption' => round($landRegistrationSaving, 2),
            'Land diversion charges' => round($landDiversionSaving, 2),
            'Project report subsidy' => round($projectReport, 2),
            'Quality certification subsidy' => round($qualityCert, 2),
            'Technical patent subsidy' => round($patent, 2),
            'Technology purchase subsidy' => round($techPurchase, 2),
            'Environment Management Project' => round($envProject, 2),
            'Water and power audit fee reimbursement' => round($waterPowerAudit, 2),
            'Transportation subsidy (for exporters)' => round($transportSubsidy, 2),
            'Training subsidy' => round($trainingSubsidy, 2),
            'Mandi fee exemption' => round($mandiFee, 2),
            'Employment subsidy' => round($employmentSubsidy, 2),
        ];
        // EPF reimbursement for all levels (MSME, Large, Special Package)
        if ($epfCapTotal > 0) {
            $subtotals['EPF reimbursement'] = round($epfCapTotal, 2);
        }
        // Special Package additional incentives
        if ($isSpecialPackage) {
            if ($zeroWasteTotal > 0) {
                $subtotals['Zero Waste Incentive'] = round($zeroWasteTotal, 2);
            }
            if ($etpSubsidy > 0) {
                $subtotals['ETP Subsidy'] = round($etpSubsidy, 2);
            }
            $subtotals['New Elec. Connection'] = round($newElecConnection, 2);
            $subtotals['Registration Fee Reimbursement'] = round($registrationFeeReimbursement, 2);
            if ($rentalSubsidyTotal > 0) {
                $subtotals['Rental Subsidy'] = round($rentalSubsidyTotal, 2);
            }
        }
        // Sector 22 GCC: remove inapplicable subsidies and add GCC-specific ones
        if ($isSector22 && $gccLevel) {
            unset($subtotals['Environment Management Project']);
            unset($subtotals['Training subsidy']);
            unset($subtotals['ETP Subsidy']);
            unset($subtotals['Employment subsidy']);
            unset($subtotals['New Elec. Connection']);
            $subtotals['Payroll Subsidy'] = round($payrollSubsidyTotal, 2);
            $subtotals['Operational Expenditure Subsidy'] = round($opexSubsidyTotal, 2);
            $subtotals['Incubation Center Subsidy'] = round($incubationTotal, 2);
        }
        $total = array_sum($subtotals);
        // Overall incentives cap: 100% of FCI for manufacturing, 150% of FCI for services
        $totalCap = $isManufacturing ? $fci : ($fci * 1.5);
        $total = min($total, $totalCap);

        // If service policy and not eligible as per subsector minimum rules, zero-out subsidies
        // Skip for special package sectors — their eligibility is determined by FCI/PM, not service rules
        if (!$isManufacturing && !$eligibleService && !$isSpecialPackage) {
            foreach ($subtotals as $k => $v) { $subtotals[$k] = 0.0; }
            $total = 0.0;
            $fciPct = 0.0; $fciCap = 0.0; $fciSubsidy = 0.0; $fciYears = 0; $fciSchedule = [];
            $interestPct = 0.0; $interestYears = 0; $interestYearsApplied = 0; $interestCapPerYear = 0.0; $interestSeries = []; $interestSubsidySeries = [];
            $electricityBillYearLakh = 0.0; $electricityDutySavingPerYear = 0.0; $electricityDutyTotal = 0.0; $dutyYears = 0;
            $mandiSchedule = []; $mandiFee = 0.0;
            $employmentSchedule = []; $employmentSubsidy = 0.0; $employmentPerYear = 0.0; $employmentBaseSalaryLakh = 0.0; $employmentEligible = false;
            $epfSchedule = []; $epfCapTotal = 0.0; $epfPerYear = 0.0;
        }

        return [
            'result' => [
                'enterprise' => $enterpriseName,
                'enterprise_level' => $levelName,
                'area_group' => $groupName,

                'fci_percentage' => $fciPct,
                'fci_cap_lakh' => $fciCap,
                'fci_subsidy_lakh' => round($fciSubsidy, 2),
                'fci_disbursement_years' => $fciYears,
                'fci_disbursement_schedule_lakh' => $fciSchedule,

                'interest_percentage' => $interestPct,
                'interest_term_years' => $interestYears,
                'interest_years_applied' => $interestYearsApplied,
                'interest_cap_per_year_lakh' => $interestCapPerYear,
                'interest_series_lakh' => array_map(fn($v)=>round($v,2), $interestSeries),
                'interest_subsidy_series_lakh' => array_map(fn($v)=>round($v,2), $interestSubsidySeries),
                'interest_total_lakh' => round($interestTotal, 2),

                'electricity_duty_percent' => $dutyPct,
                'electricity_duty_years' => $dutyYears,
                'electricity_bill_year_lakh' => round($electricityBillYearLakh, 2),
                'electricity_duty_saving_per_year_lakh' => round($electricityDutySavingPerYear, 2),
                'electricity_duty_total_lakh' => round($electricityDutyTotal, 2),

                'mandi_fee_years' => $mandiYears,
                'mandi_fee_cap_per_year_lakh' => $mandiPerYearCapLakh,
                'mandi_fee_schedule_lakh' => array_map(fn($v)=>round($v,2), $mandiSchedule),
                'transport_years' => $transportYears,
                'transport_cap_per_year_lakh' => $transportCapPerYear,
                'transport_schedule_lakh' => array_map(fn($v)=>round($v,2), $transportSchedule),

                'employment_percent' => $employmentPct,
                'employment_cap_per_year_lakh' => $employmentCapPerYear,
                'employment_years' => $employmentYears,
                'employment_per_year_lakh' => round($employmentPerYear, 2),
                'employment_schedule_lakh' => array_map(fn($v)=>round($v,2), $employmentSchedule),
                'employment_base_salary_lakh' => round($employmentBaseSalaryLakh, 2),
                'employment_eligible' => $employmentEligible,
                'mandi_eligible' => $mandiEligible,

                'epf_years' => $epfYears,
                'epf_total_cap_lakh' => round($epfCapTotal, 2),
                'epf_per_year_lakh' => round($epfPerYear, 2),
                'epf_schedule_lakh' => array_map(fn($v)=>round($v,2), $epfSchedule),

                'zero_waste_per_year_lakh' => round($zeroWastePerYear, 2),
                'zero_waste_years' => $zeroWasteYears,
                'zero_waste_total_lakh' => round($zeroWasteTotal, 2),

                'etp_subsidy_lakh' => round($etpSubsidy, 2),

                'new_elec_connection_lakh' => round($newElecConnection, 2),
                'rental_subsidy_per_year_lakh' => round($rentalSubsidyPerYear, 2),
                'rental_subsidy_years' => $rentalSubsidyYears,
                'rental_subsidy_total_lakh' => round($rentalSubsidyTotal, 2),
                'registration_fee_reimbursement_lakh' => round($registrationFeeReimbursement, 2),

                'gcc_level' => $gccLevel,
                'payroll_subsidy_per_year_lakh' => round($payrollSubsidyPerYear, 2),
                'payroll_subsidy_years' => $payrollSubsidyYears,
                'payroll_subsidy_total_lakh' => round($payrollSubsidyTotal, 2),
                'opex_subsidy_per_year_lakh' => round($opexSubsidyPerYear, 2),
                'opex_subsidy_years' => $opexSubsidyYears,
                'opex_subsidy_total_lakh' => round($opexSubsidyTotal, 2),
                'incubation_establishment_lakh' => round($incubationEstablishment, 2),
                'incubation_operational_per_year_lakh' => round($incubationOperationalPerYear, 2),
                'incubation_operational_years' => $incubationOperationalYears,
                'incubation_total_lakh' => round($incubationTotal, 2),

                'subtotals' => $subtotals,
                'total_incentives_lakh' => round($total, 2),
                'total_incentives_crore' => round($total/100.0, 2),
                'eligibility' => [
                    'policy_type' => $policyType,
                    'is_special_package' => $isSpecialPackage,
                    'is_large_service' => $isLargeService,
                    'large_service_band' => $largeServiceBand,
                    'service_meets_minimum' => $isManufacturing ? true : $eligibleService,
                    'service_min_required_lakh' => $isManufacturing ? null : $minRequiredLakh,
                    'reasons' => $isManufacturing ? [] : $eligibilityReasons,
                ],
            ],
        ];
    }
}
