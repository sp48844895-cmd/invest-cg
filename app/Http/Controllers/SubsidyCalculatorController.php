<?php
namespace App\Http\Controllers;

use App\Models\AreaGroup;
use App\Models\District;
use App\Models\Sector;
use App\Models\Block;
use App\Models\Subsector;
use App\Services\SubsidyCalculator;
use Illuminate\Http\Request;

class SubsidyCalculatorController extends Controller
{
    public function index()
    {
        $districts = District::orderBy('name')->get();
        $policy = request('policy_type', old('policy_type', 'manufacturing'));
        $sectors = Sector::where('policy_type', $policy)->orderBy('name')->get();
        $areaGroups = AreaGroup::all();
        return view('calculator.index', compact('districts','sectors','areaGroups'));
    }

    public function blocks(Request $request)
    {
        $request->validate(['district_id'=>'required|exists:districts,id']);
        $blocks = Block::with('areaGroup:id,name')
            ->where('district_id', $request->district_id)
            ->orderBy('name')
            ->get(['id','name','area_group_id']);
        return response()->json($blocks);
    }

    public function sectors(Request $request)
    {
        $policy = $request->get('policy_type', 'manufacturing');
        $items = Sector::where('policy_type', $policy)
            ->orderBy('name')
            ->get(['id','name','is_special_sector']);
        return response()->json($items);
    }

    public function subsectors(Request $request)
    {
        $request->validate(['sector_id'=>'required|exists:sectors,id']);
        $subs = Subsector::where('sector_id',$request->sector_id)
            ->orderBy('name')
            ->get(['id','name','is_thrust','min_capital_investment_lakh']);
        return response()->json($subs);
    }

    public function calculate(Request $request, SubsidyCalculator $calc)
    {
        // First validate basic fields
        $data = $request->validate([
            'policy_type'=>'required|in:manufacturing,service',
            'fci'=>'required|numeric|min:0',
            'pm_investment'=>'required|numeric|min:0|lt:fci',
            'sector_id'=>'required|exists:sectors,id',
            'subsector_id'=>'required|exists:subsectors,id',
            'district_id'=>'required|exists:districts,id',
            'block_id'=>'nullable|exists:blocks,id',
            // Entrepreneur category: 1 = General, 2–15 = special categories
            'entrepreneur_category'=>'required|integer|between:1,15',
            'loan_amount'=>'required|numeric|min:0',
            'tenure_years'=>'required|integer|min:0',
            'interest_rate'=>'required|numeric|min:0',
            'monthly_units_lakh'=>'required|numeric|min:0',
            'tariff_per_unit'=>'required|numeric|min:0',
            'electricity_duty_percent'=>'required|numeric|min:0',
            'land_area_acres'=>'nullable|numeric|min:0',
            'land_rate_per_acre'=>'nullable|numeric|min:0',
            'employment_count'=>'nullable|integer|min:0',
            'is_exporter' => 'nullable|in:0,1',
            'freight_expense_lakh' => 'nullable|numeric|min:0',
            'mandi_fee_lakh' => 'nullable|numeric|min:0',
        ]);

        // Check if sector is agriculture, food, or horticulture (manufacturing only)
        $sector = Sector::find($data['sector_id']);
        $sectorName = strtolower($sector->name ?? '');
        $isMandiSector = $data['policy_type'] === 'manufacturing' && (
            stripos($sectorName, 'agri') !== false ||
            stripos($sectorName, 'food') !== false ||
            stripos($sectorName, 'horticulture') !== false
        );

        // Conditionally require mandi_fee_lakh for agriculture/food/horticulture sectors
        if ($isMandiSector) {
            $request->validate([
                'mandi_fee_lakh' => 'required|numeric|min:0',
            ]);
        }

        $result = $calc->compute($data);
        $districts = District::orderBy('name')->get();
        $sectors = Sector::where('policy_type', $data['policy_type'])->orderBy('name')->get();
        $areaGroups = AreaGroup::all();
        return view('calculator.index', compact('districts','sectors','areaGroups') + $result + ['inputs'=>$data]);
    }

    public function downloadPdf(Request $request, SubsidyCalculator $calc)
    {
        $data = $request->validate([
            'policy_type'=>'required|in:manufacturing,service',
            'fci'=>'required|numeric|min:0',
            'pm_investment'=>'required|numeric|min:0|lt:fci',
            'sector_id'=>'required|exists:sectors,id',
            'subsector_id'=>'required|exists:subsectors,id',
            'district_id'=>'required|exists:districts,id',
            'block_id'=>'nullable|exists:blocks,id',
            'entrepreneur_category'=>'required|integer|between:1,15',
            'loan_amount'=>'required|numeric|min:0',
            'tenure_years'=>'required|integer|min:1',
            'interest_rate'=>'required|numeric|min:0',
            'monthly_units_lakh'=>'required|numeric|min:0',
            'tariff_per_unit'=>'required|numeric|min:0',
            'electricity_duty_percent'=>'required|numeric|min:0',
            'land_area_acres'=>'nullable|numeric|min:0',
            'land_rate_per_acre'=>'nullable|numeric|min:0',
            'employment_count'=>'nullable|integer|min:0',
            'is_exporter' => 'nullable|in:0,1',
            'freight_expense_lakh' => 'nullable|numeric|min:0',
            'mandi_fee_lakh' => 'nullable|numeric|min:0',
        ]);

        $result = $calc->compute($data);
        $sector = Sector::find($data['sector_id']);
        $subsector = Subsector::find($data['subsector_id']);
        $district = District::find($data['district_id']);
        $block = $data['block_id'] ? Block::find($data['block_id']) : null;
        
        // Generate PDF using a simple HTML to PDF approach
        $html = view('calculator.pdf', compact('result', 'data', 'sector', 'subsector', 'district', 'block'))->render();
        
        // For now, return HTML that can be printed as PDF
        // You can integrate a PDF library like DomPDF or TCPDF later
        return response($html)
            ->header('Content-Type', 'text/html')
            ->header('Content-Disposition', 'inline; filename="subsidy-calculation.html"');
    }

    public function downloadExcel(Request $request, SubsidyCalculator $calc)
    {
        $data = $request->validate([
            'policy_type'=>'required|in:manufacturing,service',
            'fci'=>'required|numeric|min:0',
            'pm_investment'=>'required|numeric|min:0|lt:fci',
            'sector_id'=>'required|exists:sectors,id',
            'subsector_id'=>'required|exists:subsectors,id',
            'district_id'=>'required|exists:districts,id',
            'block_id'=>'nullable|exists:blocks,id',
            'entrepreneur_category'=>'required|integer|between:1,15',
            'loan_amount'=>'required|numeric|min:0',
            'tenure_years'=>'required|integer|min:1',
            'interest_rate'=>'required|numeric|min:0',
            'monthly_units_lakh'=>'required|numeric|min:0',
            'tariff_per_unit'=>'required|numeric|min:0',
            'electricity_duty_percent'=>'required|numeric|min:0',
            'land_area_acres'=>'nullable|numeric|min:0',
            'land_rate_per_acre'=>'nullable|numeric|min:0',
            'employment_count'=>'nullable|integer|min:0',
            'is_exporter' => 'nullable|in:0,1',
            'freight_expense_lakh' => 'nullable|numeric|min:0',
            'mandi_fee_lakh' => 'nullable|numeric|min:0',
        ]);

        $result = $calc->compute($data);
        $sector = Sector::find($data['sector_id']);
        $subsector = Subsector::find($data['subsector_id']);
        $district = District::find($data['district_id']);
        $block = $data['block_id'] ? Block::find($data['block_id']) : null;
        
        // Generate CSV/Excel format
        $filename = 'subsidy-calculation-' . date('Y-m-d-His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($result, $data, $sector, $subsector, $district, $block) {
            $file = fopen('php://output', 'w');
            
            // Header
            fputcsv($file, ['Subsidy Calculator Results']);
            fputcsv($file, ['Generated on: ' . date('Y-m-d H:i:s')]);
            fputcsv($file, []);
            
            // Project Details
            fputcsv($file, ['PROJECT DETAILS']);
            fputcsv($file, ['Sector', $sector->name ?? '']);
            fputcsv($file, ['Subsector', $subsector->name ?? '']);
            fputcsv($file, ['District', $district->name ?? '']);
            if ($block) {
                fputcsv($file, ['Block', $block->name ?? '']);
            }
            fputcsv($file, ['Policy Type', ucfirst($data['policy_type'] ?? '')]);
            fputcsv($file, ['Fixed Capital Investment', '₹ ' . number_format($data['fci'], 2) . ' Lakh']);
            fputcsv($file, ['Plant & Machinery', '₹ ' . number_format($data['pm_investment'], 2) . ' Lakh']);
            fputcsv($file, []);
            
            // Results
            fputcsv($file, ['SUBSIDY BREAKDOWN']);
            fputcsv($file, ['Subsidy Type', 'Amount (₹ Lakh)']);
            foreach ($result['result']['subtotals'] as $label => $amount) {
                fputcsv($file, [$label, number_format($amount, 2)]);
            }
            fputcsv($file, []);
            fputcsv($file, ['TOTAL INCENTIVES', '₹ ' . number_format($result['result']['total_incentives_lakh'], 2) . ' Lakh']);
            fputcsv($file, ['TOTAL INCENTIVES', '₹ ' . number_format($result['result']['total_incentives_crore'], 2) . ' Crore']);
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
