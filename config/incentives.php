<?php
return [
    // Electricity
    'electricity_duty_percent' => 8.0,

    // Entrepreneur category bonus
    'others_bonus_fci_percentage' => 10.0, // +10 percentage points
    'others_bonus_tenure_years' => 1,

    // Backend assumptions (percent of land value)
    'stamp_duty_percent' => 6.6,
    'land_registration_percent' => 4.5,
    'land_diversion_percent' => 0.6,

    // Training stipend
    'training_month_salary_cap' => 15000, // Rs per employee
    'avg_salary_per_employee_pm' => 15000, // Rs per month (backend assumption)
    'training_employee_ratio' => 0.01, // 1% of employees assumed trained unless provided

    // Exporter transportation subsidy
    'exporter_transport_percent' => 50, // % of freight
    'exporter_transport_max_per_year_lakh' => 50,
    'exporter_transport_years' => 5,

    // Expense-based incentive maximums (Lakhs)
    'assume_expense_caps' => true, // if true, use max caps when expense not supplied
    'project_report_percent_of_fci' => 1, // up to 10L
    'project_report_max_lakh' => 10,
    'quality_cert_max_lakh' => 10,
    'patent_max_lakh' => 20,
    'technology_purchase_max_lakh' => 10,
    'env_project_max_lakh' => 25,
    'water_power_audit_max_lakh' => 5,

    // Special employment subsidy (Divyang, etc.)
    'special_employment_percent' => 40,   // % of net salary/wages
    'special_employment_cap_per_year_lakh' => 5,
    'special_employment_years' => 5,
];
