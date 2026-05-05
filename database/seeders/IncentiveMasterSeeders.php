<?php
namespace Database\Seeders;

use App\Models\AreaGroup;
use App\Models\District;
use App\Models\Enterprise;
use App\Models\EnterpriseLevel;
use App\Models\Sector;
use App\Models\Subsector;
use App\Models\Block;
use App\Models\FciSubsidy;
use App\Models\InterestSubsidy;
use Illuminate\Support\Facades\DB;
use App\Models\Division;
use Illuminate\Database\Seeder;

class IncentiveMasterSeeders extends Seeder
{
    public function run(): void
    {
        // Area Groups
        $groups = [
            ['id'=>1,'name'=>'Group 1'],
            ['id'=>2,'name'=>'Group 2'],
            ['id'=>3,'name'=>'Group 3'],
        ];
        foreach ($groups as $g) { AreaGroup::updateOrCreate(['id'=>$g['id']], ['name'=>$g['name']]); }

        // Enterprises
        $enterprises = [
            ['id'=>1,'name'=>'General Enterprise'],
            ['id'=>2,'name'=>'Thrust Enterprise'],
        ];
        foreach ($enterprises as $e) { Enterprise::updateOrCreate(['id'=>$e['id']], ['name'=>$e['name']]); }

        // Enterprise Levels with P&M thresholds (in lakh)
        $levels = [
            ['id'=>1,'name'=>'Micro','min_pm_lakh'=>11,'max_pm_lakh'=>100],
            ['id'=>2,'name'=>'Small','min_pm_lakh'=>101,'max_pm_lakh'=>1000],
            ['id'=>3,'name'=>'Medium','min_pm_lakh'=>1001,'max_pm_lakh'=>5000],
        ];
        foreach ($levels as $l) { EnterpriseLevel::updateOrCreate(['id'=>$l['id']], $l); }

        // Divisions
        $divisions = [
            ['id'=>1,'name'=>'Raipur'],
            ['id'=>2,'name'=>'Durg'],
            ['id'=>3,'name'=>'Bilaspur'],
            ['id'=>4,'name'=>'Surguja'],
            ['id'=>5,'name'=>'Bastar'],
        ];
        foreach ($divisions as $d) { Division::updateOrCreate(['id'=>$d['id']], ['name'=>$d['name']]); }

        // Manufacturing sectors
        $mfSectors = [
            'Pharmaceutical and Medical Device',
            'Agriculture, Food & Horticulture',
            'Automobile',
            'Defence and Aerospace',
            'IT Hardware',
            'Textile',
            'Engineering',
            'Forest Produce',
            'Classification-based',
            'Product-based',
            'Investor-based',
            'Toy Sector',
            'Circular Economy',
        ];
        foreach ($mfSectors as $i=>$name) {
            Sector::updateOrCreate(
                ['id'=>$i+1],
                ['name'=>$name,'policy_type'=>'manufacturing']
            );
        }

        // Do NOT seed any placeholder "General" subsector for manufacturing.
        // General vs Thrust enterprise is derived from (PM < min_capital_investment_lakh), not from a separate subsector.
        foreach (Sector::where('policy_type','manufacturing')->get() as $sector) {
            $oldNames = [
                'General - '.$sector->name,
                'General-'.$sector->name,
                'General -'.$sector->name,
                'General- '.$sector->name,
            ];

            Subsector::where('sector_id', $sector->id)
                ->whereIn('name', $oldNames)
                ->whereNull('min_capital_investment_lakh')
                ->where('is_thrust', false)
                ->delete();

            Subsector::where('sector_id', $sector->id)
                ->where('name', 'General')
                ->whereNull('min_capital_investment_lakh')
                ->where('is_thrust', false)
                ->delete();
        }

        // Districts (from image list)
        $districts = [
            'Raipur','Gariyaband','Baloda Bazar-Bhatapara','Mahasamund','Dhamtari','Durg','Balod','Bemetara','Rajnandgaon','Khairagarh-Chhuikhadan-Gandai','Mohla-Manpur-Ambagarh Chowki','Kabirdham','Bilaspur','Mungeli','Gourela-Pendra-Marwahi','Raigarh','Sarangarh-Bilaigarh','Janjgir-Champa','Sakti','Korba','Surguja','Surajpur','Balrampur','Jashpur','Koriya','Manendragarh-Chirmiri-Bharatpur','Bastar','Dantewada','Sukma','Kanker','Kondagaon','Bijapur','Narayanpur',
        ];
        foreach ($districts as $i=>$name) {
            District::updateOrCreate(['id'=>$i+1], ['name'=>$name]);
        }

        // Map key districts to Surguja and Bastar divisions (for service policy rules)
        $divisionIdsByName = Division::pluck('id','name');
        $districtDivisionMap = [
            // Surguja division
            'Surguja' => 'Surguja',
            'Surajpur' => 'Surguja',
            'Balrampur' => 'Surguja',
            'Jashpur' => 'Surguja',
            'Koriya' => 'Surguja',
            'Manendragarh-Chirmiri-Bharatpur' => 'Surguja',
            // Bastar division
            'Bastar' => 'Bastar',
            'Dantewada' => 'Bastar',
            'Sukma' => 'Bastar',
            'Kanker' => 'Bastar',
            'Kondagaon' => 'Bastar',
            'Bijapur' => 'Bastar',
            'Narayanpur' => 'Bastar',
        ];
        foreach ($districtDivisionMap as $districtName => $divisionName) {
            $divisionId = $divisionIdsByName[$divisionName] ?? null;
            if (!$divisionId) continue;
            $dist = District::where('name',$districtName)->first();
            if ($dist) {
                $dist->division_id = $divisionId;
                $dist->save();
            }
        }

        // Service sectors and subsectors
        $serviceSectors = [
            'Logistics Service Sector' => [
                ['name'=>'Packaging Service','min'=>25,'conditions'=>null,'rules'=>null],
                ['name'=>'Transportation Service','min'=>50,'conditions'=>null,'rules'=>null],
                ['name'=>'Warehouse','min'=>100,'conditions'=>null,'rules'=>null],
                ['name'=>'Cold Storage','min'=>150,'conditions'=>null,'rules'=>null],
                ['name'=>'Courier Service','min'=>100,'conditions'=>null,'rules'=>null],
                ['name'=>'Freight Transportation','min'=>100,'conditions'=>null,'rules'=>null],
            ],
            'IT and IT-Enabled Services' => [
                ['name'=>'3D/Animation/VFX Studio','min'=>10,'conditions'=>null,'rules'=>null],
                ['name'=>'Film Studio','min'=>50,'conditions'=>null,'rules'=>null],
                ['name'=>'Business/Knowledge/Legal Process Outsourcing','min'=>30,'conditions'=>null,'rules'=>null],
                ['name'=>'IT Consultancy','min'=>30,'conditions'=>null,'rules'=>null],
                ['name'=>'Data Processing Centre','min'=>25,'conditions'=>null,'rules'=>null],
                ['name'=>'Artificial Intelligence Related Research & Development','min'=>10,'conditions'=>null,'rules'=>null],
            ],
            'Engineering Services' => [
                [
                    'name'=>'Automobile Repair and Service Centres',
                    'min'=>10,
                    'conditions'=>'For Group-1: min 50 L; Group-2: 30 L; Group-3: 10 L',
                    'rules'=>['group_thresholds'=>['1'=>50,'2'=>30,'3'=>10]],
                ],
                [
                    'name'=>'General Engineerring and Fabrrication Service',
                    'min'=>5,
                    'conditions'=>'For Group-2: min 10 L; Group-3: 5 L',
                    'rules'=>['group_thresholds'=>['2'=>10,'3'=>5]],
                ],
                ['name'=>'Repair and maintenance of Railway Transport equipment','min'=>25,'conditions'=>null,'rules'=>null],
                ['name'=>'Repair service Centres for all other types of Industrial machines','min'=>25,'conditions'=>null,'rules'=>null],
                ['name'=>'Repair Service Centres for Agricultural Equipment','min'=>10,'conditions'=>null,'rules'=>null],
            ],
            'Research & Development Sector ' => [
                ['name'=>'NABL Certified Industrial Research & Development Lab','min'=>15,'conditions'=>null,'rules'=>null],
                ['name'=>'Industrial Testing Lab','min'=>125,'conditions'=>null,'rules'=>null],
                ['name'=>'Lab Involved in Testing Raw Materials and Finished Products','min'=>25,'conditions'=>null,'rules'=>null],
            ],
            'Tourism, Entertainment, and Other Social Service Sector' => [
                ['name'=>'Amusement/Water/Adventure Park','min'=>1500,'conditions'=>null,'rules'=>null],
                [
                    'name'=>'Hotel, Resort and Convention Centre',
                    'min'=>1500,
                    'conditions'=>'Min 1500 L; reduced to 750 L for Bastar and Surguja divisions',
                    'rules'=>[
                        'division_overrides'=>[
                            ['division'=>'Bastar','min_investment_lakh'=>750],
                            ['division'=>'Surguja','min_investment_lakh'=>750],
                        ],
                    ],
                ],
                ['name'=>'Museum and Other Cultural Services (Promoting Indian/State Art, Music, Dance and Literature)','min'=>100,'conditions'=>null,'rules'=>null],
                ['name'=>'Eco Tourism Centre','min'=>100,'conditions'=>null,'rules'=>null],
                ['name'=>'Health and Wellness Centre (Allopathic, AYUSH, Naturopathy, or integrated hospitals/centers with min 50 beds)','min'=>500,'conditions'=>null,'rules'=>null],
                ['name'=>'Home Stay Services (Within 20 km of Surguja and Bastar Division)','min'=>5,'conditions'=>'Within 20 km of Surguja and Bastar divisions','rules'=>null],
                ['name'=>'Working Women Hostel','min'=>500,'conditions'=>null,'rules'=>null],
                ['name'=>'Center of Excellence (CoE)','min'=>500,'conditions'=>null,'rules'=>null],
                ['name'=>'Establishment of Facilities for Adventure Tourism Activities','min'=>25,'conditions'=>null,'rules'=>null],
            ],
            'Business Service Centre' => [
                ['name'=>'Hallmark Certification Service Centre','min'=>10,'conditions'=>null,'rules'=>null],
                ['name'=>'Printing, Digital Printing and 3D Printing Job Work','min'=>15,'conditions'=>null,'rules'=>null],
                ['name'=>'Charging Station Service Centre for Electric Vehicle','min'=>25,'conditions'=>null,'rules'=>null],
                ['name'=>'Power Laundries','min'=>25,'conditions'=>null,'rules'=>null],
                ['name'=>'Machine-Operated Seed Grading Services','min'=>5,'conditions'=>null,'rules'=>null],
            ],
            'Environment Conservation Related Service' => [
                ['name'=>'e-Waste Management','min'=>5,'conditions'=>null,'rules'=>null],
                ['name'=>'Common Effluent Treatment Plant','min'=>100,'conditions'=>null,'rules'=>null],
                ['name'=>'Hazardous and Other Waste Disposal/Management','min'=>50,'conditions'=>null,'rules'=>null],
            ],
            'Sports, Education and Training Services' => [
                ['name'=>'Sports and Recreational Center','min'=>500,'conditions'=>null,'rules'=>null],
                [
                    'name'=>'Residential Sports Academy',
                    'min'=>500,
                    'conditions'=>'Min 500 L; reduced to 200 L for Bastar and Surguja divisions',
                    'rules'=>[
                        'division_overrides'=>[
                            ['division'=>'Bastar','min_investment_lakh'=>200],
                            ['division'=>'Surguja','min_investment_lakh'=>200],
                        ],
                    ],
                ],
                ['name'=>'Private Training Centers (Textile, Apparel, Footwear, Toys, Furniture and other specified by the state gov)','min'=>25,'conditions'=>null,'rules'=>null],
                ['name'=>'Establish a 1,000-student campus in Chhattisgarh by a NIRF Top-100 private university (in Bastar/Surguja) or a QS Top-500 foreign university','min'=>5000,'conditions'=>null,'rules'=>null],
                ['name'=>'CBSE-recognized schools (from class 1 to 12) with min capacity of 500 students','min'=>500,'conditions'=>null,'rules'=>null],
            ],
        ];
        foreach ($serviceSectors as $sectorName => $subs) {
            $sector = Sector::updateOrCreate(
                ['name'=>$sectorName],
                ['policy_type'=>'service']
            );
            foreach ($subs as $s) {
                Subsector::updateOrCreate(
                    ['sector_id'=>$sector->id,'name'=>$s['name']],
                    [
                        'is_thrust'=>false,
                        'min_capital_investment_lakh'=>$s['min'],
                        'service_conditions'=>$s['conditions'],
                        'eligibility_rules_json'=>$s['rules'] ? json_encode($s['rules']) : null,
                    ]
                );
            }
        }

        // Sample blocks (replace with complete block-list mapping with correct area groups)
        Block::updateOrCreate(['district_id'=>1,'name'=>'Raipur Urban'],['area_group_id'=>1]);
        Block::updateOrCreate(['district_id'=>2,'name'=>'Gariyaband Block'],['area_group_id'=>2]);
        Block::updateOrCreate(['district_id'=>3,'name'=>'Baloda Bazar Block'],['area_group_id'=>3]);

        // Interest subsidy master data (Service policy values). Same for both enterprise types.
        $interestRows = [
            // enterprise_id, level_id (1-Micro,2-Small,3-Medium), group_id, term_years, pct, max_per_year_lakh
            // Micro
            [1,1,1,6,45,20], [1,1,2,7,50,25], [1,1,3,8,55,30],
            // Small
            [1,2,1,6,45,30], [1,2,2,7,50,35], [1,2,3,8,55,40],
            // Medium
            [1,3,1,6,45,40], [1,3,2,7,50,45], [1,3,3,8,55,50],
        ];
        foreach ($interestRows as [$enterpriseId,$levelId,$groupId,$term,$pct,$cap]) {
            $keys = [
                'policy_type'=>'service',
                'enterprise_id'=>$enterpriseId,
                'enterprise_level_id'=>$levelId,
                'area_group_id'=>$groupId,
            ];
            $existing = DB::table('interest_subsidies')->where($keys)->first();
            if ($existing) {
                DB::table('interest_subsidies')->where('id', $existing->id)->update([
                    'interest_term_years'=>$term,
                    'interest_percentage'=>$pct,
                    'interest_max_limit_lakh'=>$cap,
                    'updated_at'=>now(),
                ]);
            } else {
                $nextId = (int) ((DB::table('interest_subsidies')->max('id')) ?? 0) + 1;
                DB::table('interest_subsidies')->insert($keys + [
                    'id'=>$nextId,
                    'interest_term_years'=>$term,
                    'interest_percentage'=>$pct,
                    'interest_max_limit_lakh'=>$cap,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }

            // thrust row under service policy
            $keysT = [
                'policy_type'=>'service',
                'enterprise_id'=>2,
                'enterprise_level_id'=>$levelId,
                'area_group_id'=>$groupId,
            ];
            $existingT = DB::table('interest_subsidies')->where($keysT)->first();
            if ($existingT) {
                DB::table('interest_subsidies')->where('id', $existingT->id)->update([
                    'interest_term_years'=>$term,
                    'interest_percentage'=>$pct,
                    'interest_max_limit_lakh'=>$cap,
                    'updated_at'=>now(),
                ]);
            } else {
                $nextId = (int) ((DB::table('interest_subsidies')->max('id')) ?? 0) + 1;
                DB::table('interest_subsidies')->insert($keysT + [
                    'id'=>$nextId,
                    'interest_term_years'=>$term,
                    'interest_percentage'=>$pct,
                    'interest_max_limit_lakh'=>$cap,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }
        }

        // FCI subsidy master data (Service policy values). Same for both enterprise types.
        $fciRows = [
            // Micro
            [1,1,1,35,35], [1,1,2,40,40], [1,1,3,45,45],
            // Small
            [1,2,1,35,350], [1,2,2,40,450], [1,2,3,45,550],
            // Medium
            [1,3,1,35,700], [1,3,2,40,750], [1,3,3,45,800],
        ];
        foreach ($fciRows as [$enterpriseId,$levelId,$groupId,$pct,$cap]) {
            $keys = [
                'policy_type'=>'service',
                'enterprise_id'=>$enterpriseId,
                'enterprise_level_id'=>$levelId,
                'area_group_id'=>$groupId,
            ];
            $existing = DB::table('fci_subsidies')->where($keys)->first();
            if ($existing) {
                DB::table('fci_subsidies')->where('id', $existing->id)->update([
                    'fci_percentage'=>$pct,
                    'fci_max_limit_lakh'=>$cap,
                    'updated_at'=>now(),
                ]);
            } else {
                $nextId = (int) ((DB::table('fci_subsidies')->max('id')) ?? 0) + 1;
                DB::table('fci_subsidies')->insert($keys + [
                    'id'=>$nextId,
                    'fci_percentage'=>$pct,
                    'fci_max_limit_lakh'=>$cap,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }

            $keysT = [
                'policy_type'=>'service',
                'enterprise_id'=>2,
                'enterprise_level_id'=>$levelId,
                'area_group_id'=>$groupId,
            ];
            $existingT = DB::table('fci_subsidies')->where($keysT)->first();
            if ($existingT) {
                DB::table('fci_subsidies')->where('id', $existingT->id)->update([
                    'fci_percentage'=>$pct,
                    'fci_max_limit_lakh'=>$cap,
                    'updated_at'=>now(),
                ]);
            } else {
                $nextId = (int) ((DB::table('fci_subsidies')->max('id')) ?? 0) + 1;
                DB::table('fci_subsidies')->insert($keysT + [
                    'id'=>$nextId,
                    'fci_percentage'=>$pct,
                    'fci_max_limit_lakh'=>$cap,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }
        }

        // Manufacturing policy master data (different for general vs thrust)
        $mfFci = [
            // [enterprise_id(1=General,2=Thrust), level, group, pct, cap]
            // Micro
            [1,1,1,30,30],[1,1,2,35,35],[1,1,3,40,40],
            [2,1,1,35,35],[2,1,2,40,40],[2,1,3,45,45],
            // Small
            [1,2,1,30,250],[1,2,2,35,350],[1,2,3,40,450],
            [2,2,1,35,350],[2,2,2,40,450],[2,2,3,45,550],
            // Medium
            [1,3,1,30,400],[1,3,2,35,450],[1,3,3,40,500],
            [2,3,1,35,700],[2,3,2,40,750],[2,3,3,45,800],
        ];
        foreach ($mfFci as [$ent,$lvl,$grp,$pct,$cap]) {
            $keys = [
                'policy_type'=>'manufacturing',
                'enterprise_id'=>$ent,
                'enterprise_level_id'=>$lvl,
                'area_group_id'=>$grp,
            ];
            $existing = DB::table('fci_subsidies')->where($keys)->first();
            if ($existing) {
                DB::table('fci_subsidies')->where('id', $existing->id)->update([
                    'fci_percentage'=>$pct,
                    'fci_max_limit_lakh'=>$cap,
                    'updated_at'=>now(),
                ]);
            } else {
                $nextId = (int) ((DB::table('fci_subsidies')->max('id')) ?? 0) + 1;
                DB::table('fci_subsidies')->insert($keys + [
                    'id'=>$nextId,
                    'fci_percentage'=>$pct,
                    'fci_max_limit_lakh'=>$cap,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }
        }

        $mfInt = [
            // [enterprise_id(1=General,2=Thrust), level, group, years, pct, cap]
            // Micro
            [1,1,1,5,40,15],[1,1,2,6,45,20],[1,1,3,7,50,25],
            [2,1,1,6,45,20],[2,1,2,7,50,25],[2,1,3,8,55,30],
            // Small
            [1,2,1,5,40,25],[1,2,2,6,45,30],[1,2,3,7,50,35],
            [2,2,1,6,45,30],[2,2,2,7,50,35],[2,2,3,8,55,40],
            // Medium
            [1,3,1,5,40,35],[1,3,2,6,45,40],[1,3,3,7,50,45],
            [2,3,1,6,45,40],[2,3,2,7,50,45],[2,3,3,8,55,50],
        ];
        foreach ($mfInt as [$ent,$lvl,$grp,$yrs,$pct,$cap]) {
            $keys = [
                'policy_type'=>'manufacturing',
                'enterprise_id'=>$ent,
                'enterprise_level_id'=>$lvl,
                'area_group_id'=>$grp,
            ];
            $existing = DB::table('interest_subsidies')->where($keys)->first();
            if ($existing) {
                DB::table('interest_subsidies')->where('id', $existing->id)->update([
                    'interest_term_years'=>$yrs,
                    'interest_percentage'=>$pct,
                    'interest_max_limit_lakh'=>$cap,
                    'updated_at'=>now(),
                ]);
            } else {
                $nextId = (int) ((DB::table('interest_subsidies')->max('id')) ?? 0) + 1;
                DB::table('interest_subsidies')->insert($keys + [
                    'id'=>$nextId,
                    'interest_term_years'=>$yrs,
                    'interest_percentage'=>$pct,
                    'interest_max_limit_lakh'=>$cap,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }
        }
    }
}
