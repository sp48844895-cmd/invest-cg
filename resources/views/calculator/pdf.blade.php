<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Subsidy Calculation Report</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 20px; }
        .header h1 { margin: 0; color: #0d6efd; }
        .header p { margin: 5px 0; color: #666; }
        .section { margin: 20px 0; }
        .section-title { background: #f8f9fa; padding: 10px; font-weight: bold; border-left: 4px solid #0d6efd; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        table th, table td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        table th { background: #f8f9fa; font-weight: bold; }
        .total-row { background: #e7f3ff; font-weight: bold; font-size: 1.1em; }
        .text-right { text-align: right; }
        .badge { display: inline-block; padding: 5px 10px; border-radius: 4px; font-size: 0.9em; }
        .badge-success { background: #28a745; color: white; }
        .badge-secondary { background: #6c757d; color: white; }
        @media print {
            body { margin: 0; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Subsidy Calculator Report</h1>
        <p>Generated on: {{ date('d M Y, h:i A') }}</p>
    </div>

    <div class="section">
        <div class="section-title">Project Details</div>
        <table>
            <tr><th width="40%">Field</th><th>Value</th></tr>
            <tr><td>Sector</td><td>{{ $sector->name ?? 'N/A' }}</td></tr>
            <tr><td>Subsector</td><td>{{ $subsector->name ?? 'N/A' }}</td></tr>
            <tr><td>District</td><td>{{ $district->name ?? 'N/A' }}</td></tr>
            @if($block)
            <tr><td>Block</td><td>{{ $block->name }}</td></tr>
            @endif
            <tr><td>Policy Type</td><td>{{ ucfirst($data['policy_type'] ?? 'N/A') }}</td></tr>
            <tr><td>Fixed Capital Investment</td><td>₹ {{ number_format($data['fci'], 2) }} Lakh</td></tr>
            <tr><td>Plant & Machinery</td><td>₹ {{ number_format($data['pm_investment'], 2) }} Lakh</td></tr>
            <tr><td>Loan Amount</td><td>₹ {{ number_format($data['loan_amount'], 2) }} Lakh</td></tr>
            <tr><td>Loan Tenure</td><td>{{ $data['tenure_years'] }} Years</td></tr>
            <tr><td>Interest Rate</td><td>{{ number_format($data['interest_rate'], 2) }}%</td></tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Enterprise Classification</div>
        <table>
            <tr><th width="40%">Classification</th><th>Details</th></tr>
            <tr><td>Enterprise Type</td><td>{{ $result['result']['enterprise'] }}</td></tr>
            <tr><td>Enterprise Level</td><td>{{ $result['result']['enterprise_level'] }}</td></tr>
            <tr><td>Area Group</td><td>{{ $result['result']['area_group'] }}</td></tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Subsidy Breakdown</div>
        <table>
            <thead>
                <tr>
                    <th width="60%">Subsidy Type</th>
                    <th class="text-right">Amount (₹ Lakh)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result['result']['subtotals'] as $label => $amount)
                <tr>
                    <td>{{ $label }}</td>
                    <td class="text-right">{{ number_format($amount, 2) }}</td>
                </tr>
                @endforeach
                <tr class="total-row">
                    <td><strong>TOTAL INCENTIVES</strong></td>
                    <td class="text-right"><strong>₹ {{ number_format($result['result']['total_incentives_lakh'], 2) }} Lakh</strong></td>
                </tr>
                <tr class="total-row">
                    <td><strong>TOTAL INCENTIVES</strong></td>
                    <td class="text-right"><strong>₹ {{ number_format($result['result']['total_incentives_crore'], 2) }} Crore</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Key Subsidy Details</div>
        <table>
            <tr><th width="40%">Subsidy Component</th><th>Details</th></tr>
            <tr>
                <td>FCI Subsidy</td>
                <td>{{ $result['result']['fci_percentage'] }}% of FCI, Cap: ₹ {{ number_format($result['result']['fci_cap_lakh'], 2) }} L, 
                    Disbursement: {{ $result['result']['fci_disbursement_years'] }} years</td>
            </tr>
            <tr>
                <td>Interest Subsidy</td>
                <td>{{ $result['result']['interest_percentage'] }}% for {{ $result['result']['interest_term_years'] }} years, 
                    Cap: ₹ {{ number_format($result['result']['interest_cap_per_year_lakh'], 2) }} L/year</td>
            </tr>
            <tr>
                <td>Electricity Duty Exemption</td>
                <td>{{ $result['result']['electricity_duty_percent'] }}% for {{ $result['result']['electricity_duty_years'] }} years</td>
            </tr>
        </table>
    </div>

    <div class="section no-print" style="text-align: center; margin-top: 40px; padding-top: 20px; border-top: 1px solid #ddd;">
        <p style="color: #666;">This is a computer-generated report. Use browser's Print function (Ctrl+P) to save as PDF.</p>
        <button onclick="window.print()" style="padding: 10px 20px; background: #0d6efd; color: white; border: none; border-radius: 4px; cursor: pointer;">
            Print / Save as PDF
        </button>
    </div>
</body>
</html>







