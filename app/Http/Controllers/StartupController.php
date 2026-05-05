<?php

namespace App\Http\Controllers;

use App\Models\StartupEvent;
use App\Models\StartupNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StartupController extends Controller
{
    /**
     * List of startup tab slugs.
     *
     * @var array<string>
     */
    protected array $tabs = [
        'overview',
        'policy-guidelines',
        'startup',
        'ecosystem',
        'information-wizard',
        'notification',
        'events',
    ];

    /**
     * List of ecosystem sub-tab slugs.
     *
     * @var array<string>
     */
    protected array $ecosystemSubTabs = [
        'cg-startup-cell',
        'incubators-accelerators',
        'college-innovation-startup-cells',
        'mentors',
        'investor',
    ];

    /**
     * Display the startup index page (overview).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.startup.overview');
    }

    /**
     * Display a specific startup tab page.
     *
     * @param string $tab
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function show(string $tab, Request $request)
    {
        abort_unless(
            in_array($tab, $this->tabs) && View::exists("pages.startup.$tab"),
            404
        );

        if ($tab === 'notification') {
            $notifications = StartupNotification::active()->ordered()->get();

            return view("pages.startup.$tab", compact('notifications'));
        }

        if ($tab === 'events') {
            $events = StartupEvent::active()->ordered()->get();

            return view("pages.startup.$tab", compact('events'));
        }

        // Handle ecosystem sub-tabs
        if ($tab === 'ecosystem') {
            $subTab = $request->get('subTab', 'cg-startup-cell');
            
            abort_unless(
                in_array($subTab, $this->ecosystemSubTabs) && 
                View::exists("pages.startup.ecosystem.$subTab"),
                404
            );

            return view("pages.startup.$tab", ['subTab' => $subTab]);
        }

        return view("pages.startup.$tab");
    }
}

