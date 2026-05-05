@extends('layouts.app')

@section('title', 'Subsidy Calculator')

@section('content')
<section class="sector-hero">
  <img src="assets/img/sectors/calculator_banner.jpg" class="hero-video" alt="">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">Subsidy Calculator</h1>
     
      </div>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<div class="breadcrumb-nav">
  <div class="container breadcrumb-container">
    <a href="{{ route('pages.show', 'investment_promotion') }}" >Investment Promotion</a>
    <span>›</span>
    <a href="{{ route('focus-sectors.index') }}">Focus Sectors</a>
    <span>›</span>
    <a href="#" class="active">Subsidy Calculator</a>
    <span>›</span>
    <a href="{{ route('pages.show', 'policy-notifications') }}">Policy & Notifications</a>
  </div>
</div>

<div class="calculator-wrapper">
  <div class="container-xxl">
    <div class="row g-4">

      <!-- FORM COLUMN -->
      <div class="col-lg-6">
        <div class="form-card sticky-form">
          <div class="form-header">
            <h4>
              <i class="bi bi-calculator-fill"></i>
              Project Details
            </h4>
  
          </div>

          <div class="form-body">
            <form method="POST" action="{{ route('calculator.calculate') }}" id="calculatorForm">
              @csrf
              
              <!-- Validation Errors -->
              @if($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="bi bi-exclamation-triangle-fill"></i> Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              
              <!-- BUSINESS -->
              <div class="form-section">
                <h6 class="calculator-section-title">
                  <i class="bi bi-briefcase"></i>Business Category
                </h6>
                <div class="row g-3">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <label class="form-label">Entrepreneur Category</label>
                    <select name="entrepreneur_category" class="form-select @error('entrepreneur_category') is-invalid @enderror" required>
                      @php
                        $selectedCat = (int) old('entrepreneur_category', $inputs['entrepreneur_category'] ?? 1);
                      @endphp
                      <option value="">Select entrepreneur category</option>
                      <option value="1" {{ $selectedCat === 1 ? 'selected' : '' }}>General Category Entrepreneurs</option>
                      <option value="2" {{ $selectedCat === 2 ? 'selected' : '' }}>Entrepreneurs from the Scheduled Castes and Scheduled Tribes</option>
                      <option value="3" {{ $selectedCat === 3 ? 'selected' : '' }}>Non-Resident Indians (NRIs)</option>
                      <option value="4" {{ $selectedCat === 4 ? 'selected' : '' }}>Foreign Direct Investors (FDI)</option>
                      <option value="5" {{ $selectedCat === 5 ? 'selected' : '' }}>Export Investors</option>
                      <option value="6" {{ $selectedCat === 6 ? 'selected' : '' }}>Enterprises with Foreign Technology</option>
                      <option value="7" {{ $selectedCat === 7 ? 'selected' : '' }}>Women Entrepreneurs</option>
                      <option value="8" {{ $selectedCat === 8 ? 'selected' : '' }}>Third Gender Entrepreneurs</option>
                      <option value="9" {{ $selectedCat === 9 ? 'selected' : '' }}>Retired Ex-servicemen from the State</option>
                      <option value="10" {{ $selectedCat === 10 ? 'selected' : '' }}>Retired Police and Paramilitary Forces Personnel</option>
                      <option value="11" {{ $selectedCat === 11 ? 'selected' : '' }}>Retired Agniveer Ex-servicemen from the State</option>
                      <option value="12" {{ $selectedCat === 12 ? 'selected' : '' }}>Individuals Affected by Naxalism</option>
                      <option value="13" {{ $selectedCat === 13 ? 'selected' : '' }}>Differently abled Entrepreneurs</option>
                      <option value="14" {{ $selectedCat === 14 ? 'selected' : '' }}>Entrepreneurs from Women’s Self-Help Groups in the State</option>
                      <option value="15" {{ $selectedCat === 15 ? 'selected' : '' }}>Entrepreneurs from Farmers Producer Organisations (FPOs) in the State</option>
                    </select>
                    @error('entrepreneur_category')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <label class="form-label">Industry Type</label>
                    <select name="policy_type" class="form-select">
                      <option value="manufacturing" @selected(old('policy_type', $inputs['policy_type'] ?? 'manufacturing')==='manufacturing')>Manufacturing</option>
                      <option value="service" @selected(old('policy_type', $inputs['policy_type'] ?? 'manufacturing')==='service')>Service</option>
                    </select>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <label class="form-label">Sector</label>
                    <select name="sector_id" id="sector" class="form-select @error('sector_id') is-invalid @enderror" required>
                      <option value="">Select sector</option>
                      @foreach($sectors as $s)
                      <option value="{{ $s->id }}" data-is-special-sector="{{ $s->is_special_sector ? 1 : 0 }}" @selected(old('sector_id', $inputs['sector_id'] ?? '')==$s->id)>{{ $s->name }}</option>
                      @endforeach
                    </select>
                    @error('sector_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <label class="form-label">Subsector</label>
                    <select name="subsector_id" id="subsector" class="form-select @error('subsector_id') is-invalid @enderror" required>
                      <option value="">Select subsector</option>
                    </select>
                    @error('subsector_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div id="subsector-min-hint" class="form-text text-muted"></div>
                  </div>
                </div>
              </div>

              <!-- INVESTMENT -->
              <div class="form-section">
                <h6 class="calculator-section-title">
                  <i class="bi bi-cash-stack"></i>Investment Details
                </h6>
                <div class="row g-3">
                  <div class="col-12 mb-4">
                    <label class="form-label mb-3">
                      <i class="bi bi-gear text-muted" style="font-size: 0.75rem;"></i>
                      Plant & Machinery (Lakhs)
                    </label>
                    <div class="investment-field-wrapper">
                      <div class="slider-container">
                        <input type="range" step="0.01" min="1" max="1000000" 
                               id="pm_slider" class="form-range investment-slider" 
                               value="{{ old('pm_investment', $inputs['pm_investment'] ?? 1) }}">
                        <div class="slider-labels d-flex justify-content-between mt-2">
                          <small class="text-muted">₹ 1 L</small>
                          <small class="text-muted">₹ 10,00,000 L</small>
                        </div>
                      </div>
                      <div class="input-container">
                        <div class="input-group investment-input-group">
                          <span class="input-group-text">₹</span>
                          <input type="number" step="0.01" min="1" max="1000000" 
                                 name="pm_investment" id="pm_investment" 
                                 class="form-control text-end investment-input @error('pm_investment') is-invalid @enderror" 
                                 value="{{ old('pm_investment', $inputs['pm_investment'] ?? '') }}" 
                                 placeholder="0.00" required>
                          <span class="input-group-text">L</span>
                        </div>
                        @error('pm_investment')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div id="pm-classification-display" class="mt-2 small" style="display:none;"></div>
                    <div id="pm-fci-error" class="text-danger small mt-1" style="display:none;"></div>
                  </div>
                  <div class="col-12 mb-4">
                    <label class="form-label mb-3">
                      <i class="bi bi-building text-muted" style="font-size: 0.75rem;"></i>
                      Fixed Capital (Lakhs)
                    </label>
                    <div class="investment-field-wrapper">
                      <div class="slider-container">
                        <input type="range" step="0.01" min="1" max="1000000" 
                               id="fci_slider" class="form-range investment-slider" 
                               value="{{ old('fci', $inputs['fci'] ?? (($inputs['pm_investment'] ?? 1) * 1.1)) }}">
                        <div class="slider-labels d-flex justify-content-between mt-2">
                          <small class="text-muted">₹ 1 L</small>
                          <small class="text-muted">₹ 10,00,000 L</small>
                        </div>
                      </div>
                      <div class="input-container">
                        <div class="input-group investment-input-group">
                          <span class="input-group-text">₹</span>
                          <input type="number" step="0.01" min="1" max="1000000" 
                                 name="fci" id="fci" 
                                 class="form-control text-end investment-input @error('fci') is-invalid @enderror" 
                                 value="{{ old('fci', $inputs['fci'] ?? (($inputs['pm_investment'] ?? 1) * 1.1)) }}" 
                                 placeholder="0.00" required>
                          <span class="input-group-text">L</span>
                        </div>
                        @error('fci')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- LOCATION -->
              <div class="form-section">
                <h6 class="calculator-section-title">
                  <i class="bi bi-geo-alt"></i>Location & Land Details
                </h6>
                <div class="row g-3">
                  <div class="col-lg-6">
                    <label class="form-label">District</label>
                    <select name="district_id" id="district" class="form-select @error('district_id') is-invalid @enderror" required>
                      <option value="">Select district</option>
                      @foreach($districts as $d)
                      <option value="{{ $d->id }}" @selected(old('district_id', $inputs['district_id'] ?? '')==$d->id)>{{ $d->name }}</option>
                      @endforeach
                    </select>
                    @error('district_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label">Block</label>
                    <select name="block_id" id="block" class="form-select"></select>
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label">Area (Acres)</label>
                    <input type="number" step="0.01" name="land_area_acres" class="form-control"
                           value="{{ old('land_area_acres', $inputs['land_area_acres'] ?? '') }}"
                           placeholder="0.00">
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label">Rate per Acre (Lakhs)</label>
                    <input type="number" step="0.01" name="land_rate_per_acre" class="form-control"
                           value="{{ old('land_rate_per_acre', $inputs['land_rate_per_acre'] ?? '') }}"
                           placeholder="0.00">
                  </div>
                </div>
              </div>

              <!-- LOAN -->
              <div class="form-section">
                <h6 class="calculator-section-title">
                  <i class="bi bi-bank"></i>Loan Information
                </h6>
                <div class="row g-3">
                  <div class="col-12 mb-4">
                    <label class="form-label mb-3">
                      <i class="bi bi-bank text-muted" style="font-size: 0.75rem;"></i>
                      Loan Amount (Lakhs)
                    </label>
                    <div class="investment-field-wrapper">
                      <div class="slider-container">
                        <input type="range" step="0.01" min="0" max="1000000" 
                               id="loan_slider" class="form-range investment-slider" 
                               value="{{ old('loan_amount', $inputs['loan_amount'] ?? 0) }}">
                        <div class="slider-labels d-flex justify-content-between mt-2">
                          <small class="text-muted">₹ 0 L</small>
                          <small class="text-muted">₹ 10,00,000 L</small>
                        </div>
                      </div>
                      <div class="input-container">
                        <div class="input-group investment-input-group">
                          <span class="input-group-text">₹</span>
                          <input type="number" step="0.01" min="0" max="1000000" 
                                 name="loan_amount" id="loan_amount" 
                                 class="form-control text-end investment-input @error('loan_amount') is-invalid @enderror" 
                                 value="{{ old('loan_amount', $inputs['loan_amount'] ?? '0') }}" 
                                 placeholder="0.00">
                          <span class="input-group-text">L</span>
                        </div>
                        @error('loan_amount')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Tenure (Years)</label>
                    <input type="number" name="tenure_years" class="form-control @error('tenure_years') is-invalid @enderror"
                           value="{{ old('tenure_years', $inputs['tenure_years'] ?? '0') }}" 
                           placeholder="0">
                    @error('tenure_years')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-6">
                    <label class="form-label">Interest (%)</label>
                    <input type="number" step="0.01" name="interest_rate" class="form-control @error('interest_rate') is-invalid @enderror"
                           value="{{ old('interest_rate', $inputs['interest_rate'] ?? '0') }}" 
                           placeholder="0.00" >
                    @error('interest_rate')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- ELECTRICITY -->
              <div class="form-section">
                <h6 class="calculator-section-title">
                  <i class="bi bi-lightning-charge"></i>Electricity Usage
                </h6>
                <div class="row g-3">
                  <div class="col-12 mb-4">
                    <label class="form-label mb-3">
                      <i class="bi bi-lightning-charge text-muted" style="font-size: 0.75rem;"></i>
                      Units/Month (Lakhs)
                    </label>
                    <div class="investment-field-wrapper">
                      <div class="slider-container">
                        <input type="range" step="0.0001" min="0" max="100" 
                               id="units_slider" class="form-range investment-slider" 
                               value="{{ old('monthly_units_lakh', $inputs['monthly_units_lakh'] ?? 0) }}">
                        <div class="slider-labels d-flex justify-content-between mt-2">
                          <small class="text-muted">0 L</small>
                          <small class="text-muted">100 L</small>
                        </div>
                      </div>
                      <div class="input-container">
                        <div class="input-group investment-input-group">
                          <span class="input-group-text"><i class="bi bi-bolt"></i></span>
                          <input type="number" step="0.0001" min="0" max="100" 
                                 name="monthly_units_lakh" id="monthly_units_lakh" 
                                 class="form-control text-end investment-input @error('monthly_units_lakh') is-invalid @enderror" 
                                 value="{{ old('monthly_units_lakh', $inputs['monthly_units_lakh'] ?? '') }}" 
                                 placeholder="" required>
                          <span class="input-group-text">L</span>
                        </div>
                        @error('monthly_units_lakh')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-6 ">
                    <label class="form-label">Tariff (₹/unit)</label>
                    <input type="number" step="0.01" name="tariff_per_unit" class="form-control @error('tariff_per_unit') is-invalid @enderror"
                           value="{{ old('tariff_per_unit', $inputs['tariff_per_unit'] ?? '') }}" 
                           placeholder="0.00" required>
                    @error('tariff_per_unit')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-6 ">
                    <label class="form-label">Duty (%)</label>
                    <input type="number" step="0.01" name="electricity_duty_percent" class="form-control @error('electricity_duty_percent') is-invalid @enderror"
                           value="{{ old('electricity_duty_percent', $inputs['electricity_duty_percent'] ?? config('incentives.electricity_duty_percent')) }}" 
                           placeholder="0.00" required>
                    @error('electricity_duty_percent')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- WORKFORCE & EXPORT -->
              <div class="form-section">
                <h6 class="calculator-section-title">
                  <i class="bi bi-people"></i>Workforce & Export
                </h6>
                <div class="row g-3">
                  <div class="col-lg-6">
                    <label class="form-label">Employment Count</label>
                    <input type="number" name="employment_count" class="form-control"
                           value="{{ old('employment_count', $inputs['employment_count'] ?? '') }}"
                           placeholder="0">
                  </div>
                  <div class="col-lg-6" id="mandi-row" style="display:none;">
                    <label class="form-label">Mandi Fee Yearly (₹ Lakh) <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="mandi_fee_lakh" id="mandi_fee_lakh" class="form-control @error('mandi_fee_lakh') is-invalid @enderror"
                          value="{{ old('mandi_fee_lakh', $inputs['mandi_fee_lakh'] ?? '') }}"
                          placeholder="0.00">
                    @error('mandi_fee_lakh')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label">Are you an exporter?</label>
                    <select name="is_exporter" class="form-select">
                      <option value="0" @selected(old('is_exporter', $inputs['is_exporter'] ?? '0')=='0')>No</option>
                      <option value="1" @selected(old('is_exporter', $inputs['is_exporter'] ?? '0')=='1')>Yes</option>
                    </select>
                  </div>
                  <div class="col-lg-6" id="freight-row" style="display:none;">
                    <label class="form-label">Yearly Freight (₹ Lakh)</label>
                    <input type="number" step="0.01" name="freight_expense_lakh" class="form-control"
                          value="{{ old('freight_expense_lakh', $inputs['freight_expense_lakh'] ?? '') }}"
                          placeholder="0.00">
                  </div>
                </div>
              </div>

              <div class="mt-4">
                <div class="d-flex gap-3">
                  <button type="submit" class="btn btn-primary btn-calculate flex-grow-1">
                    <i class="bi bi-calculator"></i>Calculate Subsidies
                  </button>
                  <button type="button" class="btn btn-outline-secondary btn-reset" id="resetBtn">
                    <i class="bi bi-arrow-clockwise"></i>Reset
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- RESULTS COLUMN -->
      <div class="col-lg-6">
        @isset($result)
        <div class="result-section">
          <!-- TOTAL BANNER -->
          <div class="total-banner">
            <div class="badges-container">
              @php $isSpecialSector = ($result['is_special_sector'] ?? false) == true; @endphp
              @if($isSpecialSector)
                <div class="enterprise-badge">
                  <i class="bi bi-star-fill"></i>
                  Special Package
                </div>
              @else
                <div class="enterprise-badge">
                  <i class="bi bi-building"></i>
                  {{ $result['enterprise'] }}
                </div>
                @php $isLargeServiceBanner = ($result['eligibility']['is_large_service'] ?? false) === true; @endphp
                @unless($isLargeServiceBanner)
                  <div class="enterprise-badge">
                    <i class="bi bi-bar-chart"></i>
                    {{ $result['enterprise_level'] }}
                  </div>
                  <div class="enterprise-badge">
                    <i class="bi bi-geo"></i>
                    {{ $result['area_group'] }}
                  </div>
                @endunless
              @endif
            </div>
            <h2 class="total-amount">₹ {{ number_format($result['total_incentives_lakh'], 2) }} L <span class="total-subtitle mb-0">(≈ ₹ {{ number_format($result['total_incentives_crore'],2) }} Crore)</span></h2>
          </div>
        
          <!-- SUBSIDY BREAKDOWN -->
          <div class="result-card">
            <div class="table-responsive">
              <table class="subsidy-table mb-0">
                <thead>
                  <tr>
                    <th width="28%">Subsidy Type</th>
                    <th width="52%">Details</th>
                    <th width="20%" class="text-end">Subsidy (₹Lakh)</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $isLargeService = ($result['eligibility']['is_large_service'] ?? false) == true;
                    $isSpecialSectorView = ($result['is_special_sector'] ?? false) == true;
                    $exclude = [];
                    // Hide Land registration fee row for non-large schemes, but show for special sectors
                    if (!$isLargeService && !$isSpecialSectorView) {
                        $exclude[] = 'Land registration fee exemption';
                    }
                    // Additionally hide Land diversion charges when Industry Type is service and not large service and not special sector
                    if (($result['eligibility']['policy_type'] ?? 'manufacturing') === 'service' && !$isLargeService && !$isSpecialSectorView) {
                        $exclude[] = 'Land diversion charges';
                    }
                    // Hide employment subsidy when entrepreneur category not eligible
                    if (!($result['employment_eligible'] ?? false)) {
                        $exclude[] = 'Employment subsidy';
                    }
                    // Hide Mandi fee exemption when sector not eligible
                    if (!($result['mandi_eligible'] ?? false)) {
                        $exclude[] = 'Mandi fee exemption';
                    }
                    // Hide interest subsidy row for large service package (not part of scheme)
                    if ($isLargeService) {
                        $exclude[] = 'Interest subsidy';
                        // For large service, hide expense-based subsidies not in the package
                        $exclude[] = 'Project report subsidy';
                        $exclude[] = 'Quality certification subsidy';
                        $exclude[] = 'Technical patent subsidy';
                        $exclude[] = 'Technology purchase subsidy';
                        $exclude[] = 'Environment Management Project';
                        $exclude[] = 'Water and power audit fee reimbursement';
                        // No transportation subsidy for large service
                        $exclude[] = 'Transportation subsidy (for exporters)';
                    }
                    // If not an exporter, hide transportation subsidy row
                    $isExporterInput = (string)($inputs['is_exporter'] ?? '0');
                    if ($isExporterInput !== '1') {
                        $exclude[] = 'Transportation subsidy (for exporters)';
                    }
                  @endphp
                  @foreach($result['subtotals'] as $label => $amount)
                    @if(!in_array($label, $exclude))
                    <tr>
                      <td class="subsidy-type">
                        <i class="bi bi-check-circle-fill"></i>
                        {{ $label }}
                      </td>
                      <td class="subsidy-details">
                        @switch($label)
                          @case('Fixed capital investment subsidy')
                            <strong>Percentage:</strong> {{ $result['fci_percentage'] }}% of FCI
                            <br><strong>Cap:</strong> ₹ {{ number_format($result['fci_cap_lakh'],2) }} L
                            <br><strong>Eligible FCI:</strong> ₹ {{ number_format($inputs['fci'] ?? 0,2) }} L
                            <br><strong>Disbursement:</strong> {{ $result['fci_disbursement_years'] }} years
                            @php $sch = $result['fci_disbursement_schedule_lakh'] ?? []; @endphp
                            @if(!empty($sch))
                              <br><strong>Schedule (₹ L/yr):</strong>
                              @foreach($sch as $v)
                                {{ number_format($v,2) }}@if(!$loop->last), @endif
                              @endforeach
                            @endif
                            @break

                          @case('Interest subsidy')
                            <strong>Rate:</strong> {{ $result['interest_percentage'] }}% on term loan
                            <br><strong>Cap:</strong> ₹ {{ number_format($result['interest_cap_per_year_lakh'],2) }} L per year
                            <br><strong>Term:</strong> {{ $result['interest_term_years'] }} yrs, applied {{ $result['interest_years_applied'] }} yrs
                            @php
                              $is = $result['interest_series_lakh'] ?? [];
                              $iss = $result['interest_subsidy_series_lakh'] ?? [];
                            @endphp
                            @if(!empty($is))
                              <br><strong>Yearly Interest (₹ L):</strong>
                              @foreach($is as $v)
                                {{ number_format($v,2) }}@if(!$loop->last), @endif
                              @endforeach
                            @endif
                            @if(!empty($iss))
                              <br><strong>Yearly Subsidy (₹ L):</strong>
                              @foreach($iss as $w)
                                {{ number_format($w,2) }}@if(!$loop->last), @endif
                              @endforeach
                            @endif
                            @break

                          @case('Electricity duty exemption')
                            <strong>Duty:</strong> {{ $result['electricity_duty_percent'] }}%
                            <br><strong>Years:</strong> {{ $result['electricity_duty_years'] }}
                            <br><strong>Annual Bill:</strong> ₹ {{ number_format($result['electricity_bill_year_lakh'],2) }} L
                            <br><strong>Annual Saving:</strong> ₹ {{ number_format($result['electricity_duty_saving_per_year_lakh'],2) }} L
                            @break

                          @case('Stamp duty exemption')
                            Exemption of stamp duty at {{ number_format((float)config('incentives.stamp_duty_percent'),2) }}% on land value.
                            <br><strong>Land value:</strong> {{ number_format((float)($inputs['land_area_acres'] ?? 0),2) }} ac × ₹ {{ number_format((float)($inputs['land_rate_per_acre'] ?? 0),2) }} L/ac
                            @break

                          @case('Land registration fee exemption')
                            Exemption of land registration fees at {{ number_format((float)config('incentives.land_registration_percent'),2) }}% of land value.
                            <br><strong>Land value:</strong> {{ number_format((float)($inputs['land_area_acres'] ?? 0),2) }} ac × ₹ {{ number_format((float)($inputs['land_rate_per_acre'] ?? 0),2) }} L/ac
                            @break

                          @case('Land diversion charges')
                            50% reimbursement of land diversion charges on eligible area.
                            <br><strong>Service:</strong> up to 50 acres
                            <br><strong>Manufacturing (Micro/Small):</strong> up to 15 acres
                            @break

                          @case('Project report subsidy')
                            {{ number_format((float)config('incentives.project_report_percent_of_fci'),2) }}% of FCI,
                            capped at ₹ {{ number_format((float)config('incentives.project_report_max_lakh'),2) }} L
                            @break

                          @case('Quality certification subsidy')
                            Reimbursement up to ₹ {{ number_format((float)config('incentives.quality_cert_max_lakh'),2) }} L
                            towards recognized quality certifications
                            @break

                          @case('Technical patent subsidy')
                            Assistance up to ₹ {{ number_format((float)config('incentives.patent_max_lakh'),2) }} L
                            towards patent-related costs
                            @break

                          @case('Technology purchase subsidy')
                            Support up to ₹ {{ number_format((float)config('incentives.technology_purchase_max_lakh'),2) }} L
                            for purchase/transfer of technology
                            @break

                          @case('Environment Management Project')
                            Support up to ₹ {{ number_format((float)config('incentives.env_project_max_lakh'),2) }} L
                            for environment management projects
                            @break

                          @case('Water and power audit fee reimbursement')
                            Reimbursement up to ₹ {{ number_format((float)config('incentives.water_power_audit_max_lakh'),2) }} L
                            towards water and power audit fees
                            @break

                          @case('Transportation subsidy (for exporters)')
                            <strong>Cap per year:</strong> ₹ {{ number_format($result['transport_cap_per_year_lakh'] ?? 50,2) }} L
                            <br><strong>Years:</strong> {{ $result['transport_years'] ?? 5 }}
                            @php $ts = $result['transport_schedule_lakh'] ?? []; @endphp
                            @if(!empty($ts))
                              <br><strong>Schedule (₹ L/yr):</strong>
                              @foreach($ts as $v)
                                {{ number_format($v,2) }}@if(!$loop->last), @endif
                              @endforeach
                            @endif
                            @break

                          @case('Training subsidy')
                            @php $isLargeServiceLocal = ($result['eligibility']['is_large_service'] ?? false) === true; @endphp
                            @if($isLargeServiceLocal)
                              Reimbursement of one month's salary (up to ₹ {{ number_format(min((int)config('incentives.training_month_salary_cap', 15000),(int)config('incentives.avg_salary_per_employee_pm', 15000)),0) }} per employee)
                              for eligible employees for 5 years, capped at 100% of approved FCI.
                            @else
                              One-month salary reimbursement for up to
                              {{ number_format(((float)config('incentives.training_employee_ratio', 0))*100,0) }}% of employees,
                              limited to ₹ {{ number_format(min((int)config('incentives.training_month_salary_cap', 15000),(int)config('incentives.avg_salary_per_employee_pm', 15000)),0) }} per employee
                            @endif
                            @break

                          @case('Mandi fee exemption')
                            Manufacturing only (Agro/Food sectors)
                            <br><strong>Cap per year:</strong> ₹ {{ number_format($result['mandi_fee_cap_per_year_lakh'] ?? 500,2) }} L
                            <br><strong>Years:</strong> {{ $result['mandi_fee_years'] ?? 5 }}
                            <br><strong>Total cap:</strong> Lesser of 75% of FCI and ₹ 2,500 L
                            @php $ms = $result['mandi_fee_schedule_lakh'] ?? []; @endphp
                            @if(!empty($ms))
                              <br><strong>Schedule (₹ L/yr):</strong>
                              @foreach($ms as $v)
                                {{ number_format($v,2) }}@if(!$loop->last), @endif
                              @endforeach
                            @endif
                            @break

                          @case('Employment subsidy')
                            <strong>Rate:</strong> {{ $result['employment_percent'] ?? 0 }}% of net salary/remuneration
                            <br><strong>Cap:</strong> ₹ {{ number_format($result['employment_cap_per_year_lakh'] ?? 0,2) }} L per year
                            <br><strong>Years:</strong> {{ $result['employment_years'] ?? 0 }}
                            <br><strong>Net salary considered:</strong> ₹ {{ number_format($result['employment_base_salary_lakh'] ?? 0,2) }} L per year
                            @php $es = $result['employment_schedule_lakh'] ?? []; @endphp
                            @if(!empty($es))
                              <br><strong>Schedule (₹ L/yr):</strong>
                              @foreach($es as $v)
                                {{ number_format($v,2) }}@if(!$loop->last), @endif
                              @endforeach
                            @endif
                            @break

                          @case('EPF reimbursement')
                            75% reimbursement of EPF contributions for eligible employees. (from Chhattisgarh)
                            <br><strong>Years:</strong> {{ $result['epf_years'] ?? 5 }}
                            <br><strong>Total cap:</strong> ₹ {{ number_format($result['epf_total_cap_lakh'] ?? 0,2) }} L
                            @php $esched = $result['epf_schedule_lakh'] ?? []; @endphp
                            @if(!empty($esched))
                              <br><strong>Schedule (₹ L/yr):</strong>
                              @foreach($esched as $v)
                                {{ number_format($v,2) }}@if(!$loop->last), @endif
                              @endforeach
                            @endif
                            @break

                          @default
                            Subsidy as per policy eligibility
                        @endswitch
                      </td>
                      <td class="subsidy-amount">₹ {{ number_format($amount,2) }}</td>
                    </tr>
                    @endif
                  @endforeach

                
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
        

        @else
        <!-- WELCOME STATE -->
        <div class="welcome-section">
          <div class="welcome-hero">
            <div class="welcome-icon">
              <img src="assets/img/subsidy_calculator_icon.png" width="100" height="100" alt="Subsidy Calculator" class="img-fluid">
            </div>
            <h2>Subsidy Calculator</h2>
            <p class="lead">Fill in your project details on the left to calculate your eligible subsidies and incentives</p>
          </div>

          <div class="info-cards-grid">
            <div class="info-card">
              <div class="info-card-icon purple">
                <i class="bi bi-calculator"></i>
              </div>
              <h5>Policy-Based Calculations</h5>
              <p>Calculate subsidies based on current government policies and regulations for your enterprise</p>
            </div>

            <div class="info-card">
              <div class="info-card-icon green">
                <i class="bi bi-list-check"></i>
              </div>
              <h5>Multiple Incentives</h5>
              <p>Calculate FCI, interest, electricity, land, and many more subsidies in one place</p>
            </div>

            <div class="info-card">
              <div class="info-card-icon blue">
                <i class="bi bi-lightning-fill"></i>
              </div>
              <h5>Instant Results</h5>
              <p>See your total eligible amount and detailed breakdown in seconds</p>
            </div>

            <div class="info-card">
              <div class="info-card-icon orange">
                <i class="bi bi-file-earmark-bar-graph"></i>
              </div>
              <h5>Detailed Breakdown</h5>
              <p>Understand each subsidy component with comprehensive details and schedules</p>
            </div>
          </div>

          <!-- Additional Features (Small Cards) -->
          <div class="additional-features mt-4">
            <div class="stats-row">
              <div class="stat-box">
                <div class="stat-number"><i class="bi bi-file-earmark-pdf"></i></div>
                <div class="stat-label">PDF Export</div>
              </div>
              <div class="stat-box">
                <div class="stat-number"><i class="bi bi-file-earmark-spreadsheet"></i></div>
                <div class="stat-label">Excel Export</div>
              </div>
              <div class="stat-box">
                <div class="stat-number"><i class="bi bi-share"></i></div>
                <div class="stat-label">Share & Save</div>
              </div>
            </div>
          </div>

          <div class="stats-row">
            <div class="stat-box">
              <div class="stat-number">15+</div>
              <div class="stat-label">Subsidy Types</div>
            </div>
            <div class="stat-box">
              <div class="stat-number">24/7</div>
              <div class="stat-label">Available</div>
            </div>
            <div class="stat-box">
              <div class="stat-number"><i class="bi bi-infinity"></i></div>
              <div class="stat-label">Free Calculations</div>
            </div>
          </div>
        </div>
        @endisset
      </div>

    </div>
  </div>
</div>

@endsection

@push('styles')

@endpush

@push('scripts')
<script>
(function() {
    const sectorEl = document.getElementById('sector');
    const subsectorEl = document.getElementById('subsector');
    const subsectorMinHintEl = document.getElementById('subsector-min-hint');
    const districtEl = document.getElementById('district');
    const blockEl = document.getElementById('block');
    const form = document.getElementById('calculatorForm');
    const submitBtn = form.querySelector('button[type="submit"]');
    const resetBtn = document.getElementById('resetBtn');
    const policyEl = document.querySelector('select[name="policy_type"]');
    const exporterEl = document.querySelector('select[name="is_exporter"]');
    const freightRow = document.getElementById('freight-row');
    const mandiRow = document.getElementById('mandi-row');
    const fciEl = document.getElementById('fci');
    const pmEl = document.getElementById('pm_investment');
    const pmSliderEl = document.getElementById('pm_slider');
    const fciSliderEl = document.getElementById('fci_slider');
    const pmClassificationDisplayEl = document.getElementById('pm-classification-display');
    const pmFciErrorEl = document.getElementById('pm-fci-error');
    const loanSliderEl = document.getElementById('loan_slider');
    const loanAmountEl = document.getElementById('loan_amount');
    const unitsSliderEl = document.getElementById('units_slider');
    const monthlyUnitsEl = document.getElementById('monthly_units_lakh');

    let selectedSubsectorMinInvestment = null;
    let selectedSubsectorIsThrust = false;
    let selectedSectorIsSpecial = false;
    let fciWasAutoFilled = false;
    let pmWasAutoFilled = false;

    function toNumber(v) {
        const n = parseFloat(v);
        return Number.isFinite(n) ? n : null;
    }

    function syncSliderToInput(sliderEl, inputEl) {
        if (!sliderEl || !inputEl) return;
        const value = parseFloat(sliderEl.value) || 0;
        // Ensure value is within min/max bounds
        const min = parseFloat(sliderEl.min) || 0;
        const max = parseFloat(sliderEl.max) || 1000000;
        const clampedValue = Math.max(min, Math.min(max, value));
        // Get step value to determine decimal places
        const step = parseFloat(sliderEl.step) || 0.01;
        const decimals = step < 0.001 ? 4 : (step < 0.1 ? 2 : 0);
        // Update the input value
        inputEl.value = clampedValue.toFixed(decimals);
        // Force input event to trigger validation
        const event = new Event('input', { bubbles: true });
        inputEl.dispatchEvent(event);
    }

    function syncInputToSlider(inputEl, sliderEl) {
        if (!inputEl || !sliderEl) return;
        const value = parseFloat(inputEl.value) || 0;
        // Ensure value is within min/max bounds
        const min = parseFloat(sliderEl.min) || 0;
        const max = parseFloat(sliderEl.max) || 1000000;
        const clampedValue = Math.max(min, Math.min(max, value));
        // Get step value to determine decimal places
        const step = parseFloat(sliderEl.step) || 0.01;
        const decimals = step < 0.001 ? 4 : (step < 0.1 ? 2 : 0);
        sliderEl.value = clampedValue.toFixed(decimals);
    }

    function updatePmClassification() {
        if (!pmClassificationDisplayEl) return;
        
        // Get PM value from input
        const pm = parseFloat(pmEl ? pmEl.value : 0) || 0;
        const min = selectedSubsectorMinInvestment;
        const policyType = policyEl ? policyEl.value : 'manufacturing';
        
        // Check for Special Package: PM > 50 crore (5000 lakh) AND special sector
        if (selectedSectorIsSpecial && pm > 5000) {
            pmClassificationDisplayEl.innerHTML = '<span class="badge bg-primary rounded-pill px-3 py-2">Special Package</span>';
            pmClassificationDisplayEl.style.display = 'block';
            return;
        }
        
        // Only show for manufacturing thrust sectors with minimum investment requirement
        if (policyType !== 'manufacturing' || !selectedSubsectorIsThrust || min === null) {
            pmClassificationDisplayEl.style.display = 'none';
            return;
        }
        
        // Always show badge if there's a minimum requirement (thrust sector)
        // Determine if PM meets the minimum
        const isThrust = pm >= min;
        
        if (isThrust) {
            pmClassificationDisplayEl.innerHTML = '<span class="badge bg-success rounded-pill px-3 py-2">Thrust Enterprise</span>';
        } else {
            pmClassificationDisplayEl.innerHTML = '<span class="badge bg-secondary rounded-pill px-3 py-2">General Enterprise</span>';
        }
        pmClassificationDisplayEl.style.display = 'block';
    }

    function validatePmLessThanFci() {
        if (!pmEl || !fciEl) return;
        const pm = toNumber(pmEl.value);
        const fci = toNumber(fciEl.value);

        if (pm === null || fci === null) {
            pmEl.setCustomValidity('');
            if (pmFciErrorEl) {
                pmFciErrorEl.style.display = 'none';
                pmFciErrorEl.textContent = '';
            }
            return;
        }

        if (pm >= fci) {
            const msg = 'Plant & Machinery must be less than Fixed Capital.';
            pmEl.setCustomValidity(msg);
            if (pmFciErrorEl) {
                pmFciErrorEl.textContent = msg;
                pmFciErrorEl.style.display = '';
            }
            // Auto-adjust FCI slider if PM is greater
            if (fciSliderEl && pmSliderEl) {
                fciSliderEl.value = (parseFloat(pmSliderEl.value) + 0.01).toFixed(2);
                updateSliderDisplay(fciSliderEl, fciDisplayEl, fciEl);
            }
        } else {
            pmEl.setCustomValidity('');
            if (pmFciErrorEl) {
                pmFciErrorEl.style.display = 'none';
                pmFciErrorEl.textContent = '';
            }
        }
    }

    function setMinHintText(text) {
        if (!subsectorMinHintEl) return;
        subsectorMinHintEl.textContent = text || '';
    }

    function updateMinHint() {
        const min = selectedSubsectorMinInvestment;
        const policyType = policyEl ? policyEl.value : 'manufacturing';

        if (min === null) {
            setMinHintText('');
            return;
        }

        const formatted = Number(min).toFixed(2);
        if (policyType === 'service') {
            setMinHintText(`Min. investment required: ₹ ${formatted} Lakh (Fixed Capital).`);
            return;
        }

        if (selectedSubsectorIsThrust) {
            setMinHintText(`Thrust eligibility minimum: ₹ ${formatted} Lakh (Plant & Machinery).`);
            return;
        }

        setMinHintText('');
    }


    function ensureFciGreaterThanPm() {
        if (!pmEl || !fciEl) return;
        // Get values from inputs
        const pm = parseFloat(pmEl.value) || 1;
        if (pm < 1) return;
        const fci = parseFloat(fciEl.value) || 1;

        // Auto-adjust FCI to be greater than PM (add 0.01 minimum)
        if (fci <= pm) {
            const newFci = (pm + 0.01).toFixed(2);
            // Update both slider and input
            if (fciSliderEl) {
                fciSliderEl.value = newFci;
            }
            fciEl.value = newFci;
            // Trigger input event to sync
            if (fciEl) {
                const event = new Event('input', { bubbles: true });
                fciEl.dispatchEvent(event);
            }
        }

        validatePmLessThanFci();
    }

    function applyMinFci(min) {
        if (!fciEl) return;
        const current = toNumber(fciEl.value);
        if (current === null || fciWasAutoFilled || current < min) {
            fciEl.value = min;
            fciWasAutoFilled = true;
        }
        ensureFciGreaterThanPm();
    }

    function applyMinPm(min) {
        if (!pmEl) return;
        const current = toNumber(pmEl.value);
        if (current === null || current <= 0 || pmWasAutoFilled || current < min) {
            pmEl.value = min;
            pmWasAutoFilled = true;
        }
        ensureFciGreaterThanPm();
    }

    function applyMinInvestmentFromSubsector() {
        // No longer auto-filling values - user must input manually
        ensureFciGreaterThanPm();
        updateMinHint();
        // Update classification after a short delay to ensure values are set
        setTimeout(() => {
            updatePmClassification();
        }, 100);
    }

    function toggleFreight() {
        if (!exporterEl || !freightRow) return;
        freightRow.style.display = (exporterEl.value === '1') ? '' : 'none';
    }

    function isMandiSector() {
        if (!sectorEl) return false;
        const opt = sectorEl.options[sectorEl.selectedIndex];
        const name = (opt && opt.textContent ? opt.textContent : '').toLowerCase();
        return name.includes('agri') || name.includes('food') || name.includes('horticulture');
    }

    function toggleMandiRow() {
        if (!mandiRow) return;
        const mandiInput = document.getElementById('mandi_fee_lakh');
        const isMandi = isMandiSector();
        
        if (isMandi) {
            mandiRow.style.display = '';
            if (mandiInput) {
                mandiInput.setAttribute('required', 'required');
            }
        } else {
            mandiRow.style.display = 'none';
            if (mandiInput) {
                mandiInput.removeAttribute('required');
                mandiInput.classList.remove('is-invalid');
                const errorDiv = mandiInput.parentNode.querySelector('.invalid-feedback:not([data-server-error])');
                if (errorDiv) {
                    errorDiv.remove();
                }
            }
        }
    }

    function loadSectors(policyType) {
        if (!sectorEl) return;
        sectorEl.innerHTML = '<option>Loading...</option>';
        subsectorEl.innerHTML = '<option value="">Select subsector</option>';
        selectedSubsectorMinInvestment = null;
        selectedSubsectorIsThrust = false;
        selectedSectorIsSpecial = false;
        updateMinHint();
        toggleMandiRow();
        updatePmClassification();

        fetch(`{{ url('/calculator/sectors') }}?policy_type=${policyType}`)
            .then(r => r.json())
            .then(items => {
                sectorEl.innerHTML = '<option value="">Select sector</option>';
                items.forEach(it => {
                    const opt = document.createElement('option');
                    opt.value = it.id;
                    opt.textContent = it.name;
                    opt.dataset.isSpecialSector = (it.is_special_sector ?? 0);
                    sectorEl.appendChild(opt);
                });
                toggleMandiRow();
            });
    }

    function loadSubsectors(sectorId, selectedId = null) {
        subsectorEl.innerHTML = '<option>Loading...</option>';
        selectedSubsectorMinInvestment = null;
        selectedSubsectorIsThrust = false;
        // Update selected sector special flag from current selection
        if (sectorId && sectorEl) {
            const selOpt = Array.from(sectorEl.options).find(opt => opt.value == sectorId);
            selectedSectorIsSpecial = selOpt
                ? (String(selOpt.dataset.isSpecialSector).toLowerCase() === '1' || String(selOpt.dataset.isSpecialSector).toLowerCase() === 'true')
                : false;
        }
        updateMinHint();
        updatePmClassification();

        if (!sectorId) {
            subsectorEl.innerHTML = '<option value="">Select subsector</option>';
            selectedSectorIsSpecial = false;
            updatePmClassification();
            return;
        }

        fetch(`{{ url('/calculator/subsectors') }}?sector_id=${sectorId}`)
            .then(r => r.json())
            .then(items => {
                subsectorEl.innerHTML = '<option value="">Select subsector</option>';
                items.forEach(it => {
                    const opt = document.createElement('option');
                    opt.value = it.id;
                    opt.textContent = it.name;
                    opt.dataset.minInvestment = (it.min_capital_investment_lakh ?? '');
                    opt.dataset.isThrust = (it.is_thrust ?? 0);
                    if (selectedId == it.id) opt.selected = true;
                    subsectorEl.appendChild(opt);
                });

                if (selectedId) {
                    const selOpt = subsectorEl.options[subsectorEl.selectedIndex];
                    selectedSubsectorMinInvestment = selOpt ? toNumber(selOpt.dataset.minInvestment) : null;
                    selectedSubsectorIsThrust = selOpt
                        ? (String(selOpt.dataset.isThrust).toLowerCase() === '1' || String(selOpt.dataset.isThrust).toLowerCase() === 'true')
                        : false;
                    applyMinInvestmentFromSubsector();
                }
            });
    }

    function loadBlocks(districtId, selectedId = null) {
        blockEl.innerHTML = '<option>Loading...</option>';
        if (!districtId) return blockEl.innerHTML = '<option value="">Select block</option>';

        fetch(`{{ url('/calculator/blocks') }}?district_id=${districtId}`)
            .then(r => r.json())
            .then(items => {
                blockEl.innerHTML = '<option value="">Select block</option>';
                items.forEach(it => {
                    const opt = document.createElement('option');
                    opt.value = it.id;
                    opt.textContent = `${it.name} (${it.area_group?.name ?? 'Group'})`;
                    if (selectedId == it.id) opt.selected = true;
                    blockEl.appendChild(opt);
                });
            });
    }

    sectorEl.addEventListener('change', () => {
        toggleMandiRow();
        // Update selected sector special flag
        const selOpt = sectorEl.options[sectorEl.selectedIndex];
        selectedSectorIsSpecial = selOpt
            ? (String(selOpt.dataset.isSpecialSector).toLowerCase() === '1' || String(selOpt.dataset.isSpecialSector).toLowerCase() === 'true')
            : false;
        loadSubsectors(sectorEl.value);
        // Clear any validation errors on subsector when sector changes
        if (subsectorEl) {
            subsectorEl.classList.remove('is-invalid');
            const errorDiv = subsectorEl.parentNode.querySelector('.invalid-feedback:not([data-server-error])');
            if (errorDiv) {
                errorDiv.remove();
            }
        }
        // Clear mandi fee validation if sector changes away from mandi sectors
        const mandiInput = document.getElementById('mandi_fee_lakh');
        if (mandiInput && !isMandiSector()) {
            mandiInput.classList.remove('is-invalid');
            const errorDiv = mandiInput.parentNode.querySelector('.invalid-feedback:not([data-server-error])');
            if (errorDiv) {
                errorDiv.remove();
            }
        }
        // Update PM classification when sector changes
        setTimeout(() => {
            updatePmClassification();
        }, 100);
    });

    subsectorEl.addEventListener('change', () => {
        const selOpt = subsectorEl.options[subsectorEl.selectedIndex];
        selectedSubsectorMinInvestment = selOpt ? toNumber(selOpt.dataset.minInvestment) : null;
        selectedSubsectorIsThrust = selOpt
            ? (String(selOpt.dataset.isThrust).toLowerCase() === '1' || String(selOpt.dataset.isThrust).toLowerCase() === 'true')
            : false;
        applyMinInvestmentFromSubsector();
        // Update PM classification when subsector changes
        setTimeout(() => {
            updatePmClassification();
        }, 100);
    });

    districtEl.addEventListener('change', () => loadBlocks(districtEl.value));

    if (policyEl) {
        policyEl.addEventListener('change', () => {
            loadSectors(policyEl.value);
            // Update classification when policy type changes
            setTimeout(() => {
                updatePmClassification();
            }, 100);
        });
    }

    if (exporterEl) {
        exporterEl.addEventListener('change', toggleFreight);
        toggleFreight();
    }

    toggleMandiRow();

    // Initialize sliders and sync with inputs
    if (pmSliderEl && pmEl) {
        const initialPm = parseFloat(pmEl.value) || 1;
        pmSliderEl.value = Math.max(1, Math.min(1000000, initialPm));
        syncSliderToInput(pmSliderEl, pmEl);
        updatePmClassification();
        
        // Sync slider to input when slider moves
        pmSliderEl.addEventListener('input', () => {
            syncSliderToInput(pmSliderEl, pmEl);
            ensureFciGreaterThanPm(); // Auto-adjust FCI to be greater than PM
            validatePmLessThanFci();
            updatePmClassification();
        });
        
        // Sync input to slider when input changes
        pmEl.addEventListener('input', () => {
            syncInputToSlider(pmEl, pmSliderEl);
            ensureFciGreaterThanPm(); // Auto-adjust FCI to be greater than PM
            validatePmLessThanFci();
            updatePmClassification();
        });
    }

    if (fciSliderEl && fciEl) {
        const initialFci = parseFloat(fciEl.value) || 1;
        fciSliderEl.value = Math.max(1, Math.min(1000000, initialFci));
        syncSliderToInput(fciSliderEl, fciEl);
        
        // Sync slider to input when slider moves
        fciSliderEl.addEventListener('input', () => {
            syncSliderToInput(fciSliderEl, fciEl);
            validatePmLessThanFci();
        });
        
        // Sync input to slider when input changes
        fciEl.addEventListener('input', () => {
            syncInputToSlider(fciEl, fciSliderEl);
            validatePmLessThanFci();
        });
    }

    // Initialize loan amount slider
    if (loanSliderEl && loanAmountEl) {
        const initialLoan = parseFloat(loanAmountEl.value) || 0;
        loanSliderEl.value = Math.max(0, Math.min(1000000, initialLoan));
        syncSliderToInput(loanSliderEl, loanAmountEl);
        
        loanSliderEl.addEventListener('input', () => {
            syncSliderToInput(loanSliderEl, loanAmountEl);
        });
        
        loanAmountEl.addEventListener('input', () => {
            syncInputToSlider(loanAmountEl, loanSliderEl);
        });
    }

    // Initialize electricity units slider
    if (unitsSliderEl && monthlyUnitsEl) {
        const initialUnits = parseFloat(monthlyUnitsEl.value) || 0;
        unitsSliderEl.value = Math.max(0, Math.min(100, initialUnits));
        syncSliderToInput(unitsSliderEl, monthlyUnitsEl);
        
        unitsSliderEl.addEventListener('input', () => {
            syncSliderToInput(unitsSliderEl, monthlyUnitsEl);
        });
        
        monthlyUnitsEl.addEventListener('input', () => {
            syncInputToSlider(monthlyUnitsEl, unitsSliderEl);
        });
    }

    // Reset button functionality
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            // Reset the form
            form.reset();
            
            // Reset sliders to default values
            if (pmSliderEl && pmEl) {
                pmSliderEl.value = 1;
                pmEl.value = '1.00';
            }
            
            if (fciSliderEl && fciEl) {
                const defaultFci = 1.1; // PM * 1.1
                fciSliderEl.value = defaultFci;
                fciEl.value = defaultFci.toFixed(2);
            }
            
            if (loanSliderEl && loanAmountEl) {
                loanSliderEl.value = 0;
                loanAmountEl.value = '';
            }
            
            if (unitsSliderEl && monthlyUnitsEl) {
                unitsSliderEl.value = 0;
                monthlyUnitsEl.value = '';
            }
            
            // Reset PM classification display
            if (pmClassificationDisplayEl) {
                pmClassificationDisplayEl.style.display = 'none';
                pmClassificationDisplayEl.textContent = '';
            }
            
            // Hide PM/FCI error
            if (pmFciErrorEl) {
                pmFciErrorEl.style.display = 'none';
                pmFciErrorEl.textContent = '';
            }
            
            // Clear custom validity messages
            if (pmEl) pmEl.setCustomValidity('');
            if (fciEl) fciEl.setCustomValidity('');
            
            // Reset select fields to default values
            const selects = form.querySelectorAll('select');
            selects.forEach(select => {
                if (select.name === 'policy_type') {
                    // Reset to 'manufacturing'
                    select.value = 'manufacturing';
                } else if (select.name === 'entrepreneur_category') {
                    // Reset to '1' (General Category Entrepreneurs)
                    select.value = '1';
                } else if (select.name === 'is_exporter') {
                    // Reset to '0' (No)
                    select.value = '0';
                } else if (select.options.length > 0) {
                    // For other selects (sector, subsector, district, block), reset to empty/first option
                    select.selectedIndex = 0;
                }
                // Trigger change event to reset dependent fields
                select.dispatchEvent(new Event('change', { bubbles: true }));
            });
            
            // Clear all validation errors
            form.querySelectorAll('.is-invalid').forEach(el => {
                el.classList.remove('is-invalid');
            });
            form.querySelectorAll('.invalid-feedback').forEach(el => {
                if (!el.hasAttribute('data-server-error')) {
                    el.remove();
                }
            });
            
            // Reset subsector hint
            if (subsectorMinHintEl) {
                subsectorMinHintEl.textContent = '';
            }
            
            // Reset exporter and related fields
            if (exporterEl) {
                exporterEl.value = '0';
                if (freightRow) freightRow.style.display = 'none';
            }
            
            // Clear any result sections if needed (scroll to top)
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    form.addEventListener('submit', function(e) {
        validatePmLessThanFci();
        
        // Check all required fields
        const requiredFields = form.querySelectorAll('[required]');
        let hasErrors = false;
        
        requiredFields.forEach(field => {
            let isEmpty = false;
            
            // For select fields, check if value is empty or the first option (which is usually the placeholder)
            if (field.tagName === 'SELECT') {
                const selectedOption = field.options[field.selectedIndex];
                const firstOption = field.options[0];
                // Check if no value, empty value, or first option is selected (which is usually placeholder)
                isEmpty = !field.value || 
                         field.value === '' || 
                         (field.selectedIndex === 0 && firstOption && (firstOption.value === '' || firstOption.textContent.toLowerCase().includes('select')));
            } else {
                // For input fields
                isEmpty = !field.value || field.value.trim() === '' || field.value === '0';
            }
            
            if (isEmpty) {
                field.classList.add('is-invalid');
                // Check if error message already exists
                let errorDiv = field.parentNode.querySelector('.invalid-feedback');
                if (!errorDiv) {
                    errorDiv = document.createElement('div');
                    errorDiv.className = 'invalid-feedback';
                    field.parentNode.appendChild(errorDiv);
                }
                // Set appropriate error message
                const fieldName = field.getAttribute('name') || '';
                let errorMessage = 'This field is required';
                if (fieldName === 'sector_id') {
                    errorMessage = 'Please select a sector';
                } else if (fieldName === 'subsector_id') {
                    errorMessage = 'Please select a subsector';
                } else if (fieldName === 'district_id') {
                    errorMessage = 'Please select a district';
                } else if (fieldName === 'mandi_fee_lakh') {
                    errorMessage = 'Mandi fee is required for Agriculture, Food, and Horticulture sectors';
                }
                errorDiv.textContent = field.getAttribute('data-error-message') || errorMessage;
                hasErrors = true;
            } else {
                field.classList.remove('is-invalid');
                const errorDiv = field.parentNode.querySelector('.invalid-feedback');
                if (errorDiv && !field.getAttribute('data-server-error')) {
                    errorDiv.remove();
                }
            }
        });
        
        if (!form.checkValidity() || hasErrors) {
            e.preventDefault();
            // Scroll to first error
            const firstError = form.querySelector('.is-invalid, :invalid');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
            return false;
        }
        
        submitBtn.classList.add('loading');
        submitBtn.innerHTML = '<span style="visibility: hidden;">Calculate Subsidies</span>';
    });
    
    // Remove invalid class on input/change
    form.querySelectorAll('input, select').forEach(field => {
        field.addEventListener('input', function() {
            if (this.tagName === 'SELECT') {
                if (this.classList.contains('is-invalid') && this.value && this.value !== '' && this.selectedIndex > 0) {
                    this.classList.remove('is-invalid');
                    const errorDiv = this.parentNode.querySelector('.invalid-feedback:not([data-server-error])');
                    if (errorDiv) {
                        errorDiv.remove();
                    }
                }
            } else {
                if (this.classList.contains('is-invalid') && this.value && this.value.trim() !== '' && this.value !== '0') {
                    this.classList.remove('is-invalid');
                    const errorDiv = this.parentNode.querySelector('.invalid-feedback:not([data-server-error])');
                    if (errorDiv) {
                        errorDiv.remove();
                    }
                }
            }
        });
        field.addEventListener('change', function() {
            if (this.tagName === 'SELECT') {
                if (this.classList.contains('is-invalid') && this.value && this.value !== '' && this.selectedIndex > 0) {
                    this.classList.remove('is-invalid');
                    const errorDiv = this.parentNode.querySelector('.invalid-feedback:not([data-server-error])');
                    if (errorDiv) {
                        errorDiv.remove();
                    }
                }
            } else {
                if (this.classList.contains('is-invalid') && this.value && this.value.trim() !== '' && this.value !== '0') {
                    this.classList.remove('is-invalid');
                    const errorDiv = this.parentNode.querySelector('.invalid-feedback:not([data-server-error])');
                    if (errorDiv) {
                        errorDiv.remove();
                    }
                }
            }
        });
    });
    

    loadSubsectors(sectorEl.value, {{ (int)old('subsector_id', $inputs['subsector_id'] ?? 0) }});
    loadBlocks(districtEl.value, {{ (int)old('block_id', $inputs['block_id'] ?? 0) }});
    validatePmLessThanFci();
    updateMinHint();
    // Initialize selectedSectorIsSpecial from initial sector selection if exists
    if (sectorEl && sectorEl.selectedIndex > 0) {
        const selOpt = sectorEl.options[sectorEl.selectedIndex];
        selectedSectorIsSpecial = selOpt
            ? (String(selOpt.dataset.isSpecialSector).toLowerCase() === '1' || String(selOpt.dataset.isSpecialSector).toLowerCase() === 'true')
            : false;
    }
    // Initialize classification display after everything loads
    setTimeout(() => {
        updatePmClassification();
    }, 500);
})();

// Feature Functions
function handlePrint() {
    window.print();
}

function handleDownloadPDF() {
    const form = document.getElementById('calculatorForm');
    if (!form) {
        alert('Please calculate subsidies first');
        return;
    }
    
    // Check if result section exists
    const resultSection = document.querySelector('.result-section');
    if (!resultSection) {
        alert('Please calculate subsidies first');
        return;
    }
    
    // Create a form to submit for PDF generation
    const pdfForm = document.createElement('form');
    pdfForm.method = 'POST';
    pdfForm.action = '{{ route("calculator.pdf") }}';
    pdfForm.target = '_blank';
    
    // Add CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = '{{ csrf_token() }}';
    pdfForm.appendChild(csrfInput);
    
    // Copy all form inputs
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        if (input.name && input.value) {
            const clone = input.cloneNode(true);
            clone.type = 'hidden';
            pdfForm.appendChild(clone);
        }
    });
    
    document.body.appendChild(pdfForm);
    pdfForm.submit();
    document.body.removeChild(pdfForm);
}

function handleDownloadExcel() {
    const form = document.getElementById('calculatorForm');
    if (!form) {
        alert('Please calculate subsidies first');
        return;
    }
    
    // Check if result section exists
    const resultSection = document.querySelector('.result-section');
    if (!resultSection) {
        alert('Please calculate subsidies first');
        return;
    }
    
    // Create a form to submit for Excel generation
    const excelForm = document.createElement('form');
    excelForm.method = 'POST';
    excelForm.action = '{{ route("calculator.excel") }}';
    excelForm.target = '_blank';
    
    // Add CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = '{{ csrf_token() }}';
    excelForm.appendChild(csrfInput);
    
    // Copy all form inputs
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        if (input.name && input.value) {
            const clone = input.cloneNode(true);
            clone.type = 'hidden';
            excelForm.appendChild(clone);
        }
    });
    
    document.body.appendChild(excelForm);
    excelForm.submit();
    document.body.removeChild(excelForm);
}

function handleShare() {
    // Check if result section exists
    const resultSection = document.querySelector('.result-section');
    if (!resultSection) {
        alert('Please calculate subsidies first');
        return;
    }
    
    const totalAmount = document.querySelector('.total-amount');
    const amountText = totalAmount ? totalAmount.textContent.trim() : 'Subsidy Calculation Results';
    
    if (navigator.share) {
        const shareData = {
            title: 'Subsidy Calculator Results',
            text: `Total Eligible Subsidies: ${amountText}`,
            url: window.location.href
        };
        navigator.share(shareData).catch(err => console.log('Error sharing', err));
    } else {
        // Fallback: Copy to clipboard
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            alert('Calculation link copied to clipboard!');
        }).catch(() => {
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = url;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            alert('Calculation link copied to clipboard!');
        });
    }
}

function handleSave() {
    const form = document.getElementById('calculatorForm');
    if (!form) {
        alert('Please calculate subsidies first');
        return;
    }
    
    // Check if result section exists
    const resultSection = document.querySelector('.result-section');
    if (!resultSection) {
        alert('Please calculate subsidies first');
        return;
    }
    
    // Store calculation data in localStorage
    const formData = new FormData(form);
    const data = {};
    for (let [key, value] of formData.entries()) {
        data[key] = value;
    }
    
    // Get result data from the page
    const totalAmount = document.querySelector('.total-amount');
    const resultData = {
        total_incentives: totalAmount ? totalAmount.textContent.trim() : 'N/A',
        timestamp: new Date().toISOString()
    };
    
    const saved = {
        data: data,
        timestamp: new Date().toISOString(),
        result: resultData
    };
    
    // Get existing saves
    let saves = JSON.parse(localStorage.getItem('calculator_saves') || '[]');
    saves.push(saved);
    
    // Keep only last 10 saves
    if (saves.length > 10) {
        saves = saves.slice(-10);
    }
    
    localStorage.setItem('calculator_saves', JSON.stringify(saves));
    alert('Calculation saved! Access saved calculations from browser storage.');
}

// Breadcrumb Navigation Scroll
document.addEventListener('DOMContentLoaded', function() {
  const breadcrumbContainer = document.getElementById('breadcrumbContainer');
  const breadcrumbPrev = document.getElementById('breadcrumbPrev');
  const breadcrumbNext = document.getElementById('breadcrumbNext');

  function updateBreadcrumbButtons() {
    if (breadcrumbContainer) {
      const scrollLeft = breadcrumbContainer.scrollLeft;
      const scrollWidth = breadcrumbContainer.scrollWidth;
      const clientWidth = breadcrumbContainer.clientWidth;

      if (breadcrumbPrev) {
        breadcrumbPrev.style.display = scrollLeft > 0 ? 'flex' : 'none';
      }
      if (breadcrumbNext) {
        breadcrumbNext.style.display = scrollLeft < scrollWidth - clientWidth - 10 ? 'flex' : 'none';
      }
    }
  }

  if (breadcrumbPrev) {
    breadcrumbPrev.addEventListener('click', () => {
      if (breadcrumbContainer) {
        breadcrumbContainer.scrollBy({ left: -200, behavior: 'smooth' });
      }
    });
  }

  if (breadcrumbNext) {
    breadcrumbNext.addEventListener('click', () => {
      if (breadcrumbContainer) {
        breadcrumbContainer.scrollBy({ left: 200, behavior: 'smooth' });
      }
    });
  }

  if (breadcrumbContainer) {
    breadcrumbContainer.addEventListener('scroll', updateBreadcrumbButtons);
    updateBreadcrumbButtons();
  }
});
</script>
@endpush


