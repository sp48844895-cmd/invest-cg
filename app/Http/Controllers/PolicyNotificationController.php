<?php

namespace App\Http\Controllers;

use App\Models\PolicyDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PolicyNotificationController extends Controller
{
    public function index()
    {
        // Get documents by category and group by policy_period
        $acts = PolicyDocument::active()
            ->byCategory('acts')
            ->ordered()
            ->get()
            ->groupBy('policy_period');

        $industrialPolicies = PolicyDocument::active()
            ->byCategory('industrial_policy')
            ->ordered()
            ->get()
            ->groupBy('policy_period');

        $policyActs = PolicyDocument::active()
            ->byCategory('policy_act')
            ->ordered()
            ->get()
            ->groupBy('policy_period');

        $rules = PolicyDocument::active()
            ->byCategory('rules')
            ->ordered()
            ->get()
            ->groupBy('policy_period');

        $administrativeReports = PolicyDocument::active()
            ->byCategory('administrative_reports')
            ->ordered()
            ->get()
            ->groupBy('policy_period');

        // Get distinct policy periods for each category (only non-null periods)
        $actsPeriods = PolicyDocument::active()
            ->byCategory('acts')
            ->whereNotNull('policy_period')
            ->where('policy_period', '!=', '')
            ->distinct()
            ->orderBy('policy_period', 'desc')
            ->pluck('policy_period')
            ->toArray();

        $industrialPolicyPeriods = PolicyDocument::active()
            ->byCategory('industrial_policy')
            ->whereNotNull('policy_period')
            ->where('policy_period', '!=', '')
            ->distinct()
            ->orderBy('policy_period', 'desc')
            ->pluck('policy_period')
            ->toArray();

        $policyActPeriods = PolicyDocument::active()
            ->byCategory('policy_act')
            ->whereNotNull('policy_period')
            ->where('policy_period', '!=', '')
            ->distinct()
            ->orderBy('policy_period', 'desc')
            ->pluck('policy_period')
            ->toArray();

        $rulesPeriods = PolicyDocument::active()
            ->byCategory('rules')
            ->whereNotNull('policy_period')
            ->where('policy_period', '!=', '')
            ->distinct()
            ->orderBy('policy_period', 'desc')
            ->pluck('policy_period')
            ->toArray();

        $administrativeReportsPeriods = PolicyDocument::active()
            ->byCategory('administrative_reports')
            ->whereNotNull('policy_period')
            ->where('policy_period', '!=', '')
            ->distinct()
            ->orderBy('policy_period', 'desc')
            ->pluck('policy_period')
            ->toArray();

        return view('pages.policy-notifications', compact(
            'acts', 
            'industrialPolicies', 
            'policyActs', 
            'rules', 
            'administrativeReports',
            'actsPeriods',
            'industrialPolicyPeriods',
            'policyActPeriods',
            'rulesPeriods',
            'administrativeReportsPeriods'
        ));
    }

    /**
     * View or download a policy document
     */
    public function view(PolicyDocument $policyDocument, Request $request)
    {
        // Only allow viewing active documents
        if (!$policyDocument->is_active) {
            abort(404, 'Document not found');
        }

        // Check if file exists
        if (!Storage::disk('public')->exists($policyDocument->file_path)) {
            abort(404, 'File not found');
        }

        $filePath = Storage::disk('public')->path($policyDocument->file_path);
        $downloadFilename = $policyDocument->download_filename;
        
        // Check if download is requested
        if ($request->has('download')) {
            return response()->download($filePath, $downloadFilename, [
                'Content-Type' => 'application/pdf',
            ]);
        }
        
        // Otherwise, view inline
        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $downloadFilename . '"',
        ]);
    }
}





