<?php

use App\Http\Controllers\FocusSectorController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MediaUpdateController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SiteSearchController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\SubsidyCalculatorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VisitorApiController;

$pageSlugs = [
    'cg-startup-cell',
    'chhattisgarh-innovation',
    'college-innovation-startup-cells',
    'corporate-social-responsibility',
    'dept-of-c-i',
    'deap',
    'export',
    'incubators-accelerators',
    'investment_promotion',
    'mentors',
    'one-click',
    'one-click-help-and-support',
    'pm-gatishakti',
    'policy-notifications',
    'student-policy',
    'criminal-provision',
    'ease-of-doing-business',
    'facilitation-council',
    'directorate-of-industries',
    'state-investment-promotion-board',
    'boiler-inspectorate',
    'registrar-firms-societies',
    'csidc',
    'odop',
    'mode-of-contact',
    'schemes',
    'privacy-policy',
];

Route::get('/', [PageController::class, 'home'])->name('home');

// Subsidy Calculator
Route::controller(SubsidyCalculatorController::class)->group(function () {
    Route::get('/calculator', 'index')->name('calculator.index');
    Route::get('/calculator/blocks', 'blocks')->name('calculator.blocks');
    Route::get('/calculator/sectors', 'sectors')->name('calculator.sectors');
    Route::get('/calculator/subsectors', 'subsectors')->name('calculator.subsectors');
    Route::post('/calculator', 'calculate')->name('calculator.calculate');
    Route::post('/calculator/pdf', 'downloadPdf')->name('calculator.pdf');
    Route::post('/calculator/excel', 'downloadExcel')->name('calculator.excel');
});

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/policy-notifications', [App\Http\Controllers\PolicyNotificationController::class, 'index'])->name('pages.policy-notifications');
Route::get('/policy-documents/{policyDocument}/view', [App\Http\Controllers\PolicyNotificationController::class, 'view'])->name('policy-documents.view');

Route::get('/site-search', SiteSearchController::class)->name('site.search');
Route::get('/api/search', SiteSearchController::class)->name('api.search');

Route::controller(MediaUpdateController::class)->group(function () {
    Route::get('/media-updates', 'index')->name('media-updates.index');
    Route::get('/media-updates/create', 'create')->name('media-updates.create');
    Route::post('/media-updates', 'store')->name('media-updates.store');
});

Route::controller(App\Http\Controllers\PressReleaseController::class)->group(function () {
    Route::get('/press-releases', 'index')->name('press-releases.index');
    Route::get('/press-releases/{slug}', 'show')->name('press-releases.show');
});

Route::controller(FocusSectorController::class)->group(function () {
    Route::get('/focus-sectors', 'index')->name('focus-sectors.index');
    Route::get('/focus-sectors/{sector}', 'show')->name('focus-sectors.show');
});

Route::controller(StartupController::class)->group(function () {
    Route::get('/startup', 'index')->name('startup.index');
    Route::get('/startup/{tab}', 'show')->name('startup.show');
});


// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth routes (public)
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware([App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // User Management
        Route::get('users/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
        Route::put('users/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');

        // Policy Documents - Bulk upload routes must come before resource route
        Route::get('policy-documents/bulk-upload', [App\Http\Controllers\Admin\PolicyDocumentController::class, 'bulkUpload'])->name('policy-documents.bulk-upload');
        Route::post('policy-documents/bulk-upload', [App\Http\Controllers\Admin\PolicyDocumentController::class, 'bulkStore'])->name('policy-documents.bulk-store');
        Route::resource('policy-documents', App\Http\Controllers\Admin\PolicyDocumentController::class);

        // Gallery - Bulk upload routes must come before resource route
        Route::get('gallery/bulk-upload', [App\Http\Controllers\Admin\GalleryController::class, 'bulkUpload'])->name('gallery.bulk-upload');
        Route::post('gallery/bulk-upload', [App\Http\Controllers\Admin\GalleryController::class, 'bulkStore'])->name('gallery.bulk-store');
        Route::resource('gallery', App\Http\Controllers\Admin\GalleryController::class)->except(['show']);

        // Media Updates
        Route::resource('media-updates', App\Http\Controllers\Admin\MediaUpdateController::class);

        // Press Releases
        Route::resource('press-releases', App\Http\Controllers\Admin\PressReleaseController::class);
        // User Manual
        Route::post('user-manuals/bulk-delete', [App\Http\Controllers\Admin\UserManualController::class, 'bulkDestroy'])->name('user-manuals.bulk-delete');
        Route::resource('user-manuals', App\Http\Controllers\Admin\UserManualController::class);

        // Startup Notifications
        Route::resource('startup-notifications', App\Http\Controllers\Admin\StartupNotificationController::class)
            ->parameters(['startup-notifications' => 'startupNotification'])
            ->except(['show']);

        // Startup Events
        Route::resource('startup-events', App\Http\Controllers\Admin\StartupEventController::class)
            ->parameters(['startup-events' => 'startupEvent'])
            ->except(['show']);

        // Contact Persons
        Route::resource('contact-persons', App\Http\Controllers\Admin\ContactPersonController::class);
    });
});

// Invitation to Invest static page
Route::get('/invitation-to-invest', function () {
    return view('pages.invitation-to-invest');
})->name('pages.invitation-to-invest');

Route::get('/boiler-details', function () {
    return view('pages.boiler-details');
})->name('pages.boiler-details');

Route::get('/erector-details', function () {
    return view('pages.erector-details');
})->name('pages.erector-details');

Route::get('/manufacturer-details', function () {
    return view('pages.manufacturer-details');
})->name('pages.manufacturer-details');

Route::get('/boe-list', function () {
    return view('pages.boe-list');
})->name('pages.boe-list');

Route::get('/boiler-inspectorate', function () {
    return view('pages.boiler-inspectorate');
})->name('pages.boiler-inspectorate');

Route::get('/{slug}', [PageController::class, 'show'])
    ->whereIn('slug', $pageSlugs)
    ->name('pages.show');

Route::get('/admin/realtime-users', function (\App\Services\GoogleAnalyticsService $analytics) {
    if (!app()->environment('production')) {
        return response()->json(['users' => 0]);
    }

    return response()->json([
        'users' => $analytics->getRealtimeUsers()
    ]);
});


// API Route for total visitors
Route::get('/api/total-visitors', [VisitorApiController::class, 'totalVisitors']);

Route::get('/api/boiler-list', [App\Http\Controllers\Api\BoilerInspectorateController::class, 'boilerList']);
Route::get('/api/boiler-erector-details', [App\Http\Controllers\Api\BoilerInspectorateController::class, 'boilerErectorDetails']);
Route::get('/api/boiler-manufacturer-details', [App\Http\Controllers\Api\BoilerInspectorateController::class, 'boilerManufacturerDetails']);
Route::get('/api/boiler-boe-list', [App\Http\Controllers\Api\BoilerInspectorateController::class, 'boilerBoeList']);