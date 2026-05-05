<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class FocusSectorController extends Controller
{
    /**
     * List of focus sector slugs.
     *
     * @var array<string>
     */
    protected array $sectors = [
        'agro-food-processing',
        'ai-robotics',
        'automobile-engineering',
        'defence-aerospace',
        'electronic',
        'gcc',
        'it-ites',
        'pharma-sector',
        'steel',
        'textile',
        'tourism',
    ];

    /**
     * Display the focus sectors index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.focus-sectors.index');
    }

    /**
     * Display a specific focus sector page.
     *
     * @param string $sector
     * @return \Illuminate\View\View
     */
    public function show(string $sector)
    {
        abort_unless(
            in_array($sector, $this->sectors) && View::exists("pages.focus-sectors.$sector"),
            404
        );

        return view("pages.focus-sectors.$sector");
    }
}

