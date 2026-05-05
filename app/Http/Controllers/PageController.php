<?php

namespace App\Http\Controllers;

use App\Models\MediaUpdate;
use App\Models\UserManual;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    /**
     * Map of slug => blade view name (without pages. prefix).
     *
     * @var array<string, string>
     */
    protected array $pages = [
        'cg-startup-cell' => 'cg-startup-cell',
        'chhattisgarh-innovation' => 'chhattisgarh-innovation',
        'college-innovation-startup-cells' => 'college-innovation-startup-cells',
        'corporate-social-responsibility' => 'corporate-social-responsibility',
        'dept-of-c-i' => 'dept-of-c-i',
        'deap' => 'deap',
        'export' => 'export',
        'incubators-accelerators' => 'incubators-accelerators',
        'investment_promotion' => 'investment_promotion',
        'mentors' => 'mentors',
        'one-click' => 'one-click',
        'one-click-help-and-support' => 'one-click-help-and-support',
        'pm-gatishakti' => 'pm-gatishakti',
        'policy-notifications' => 'policy-notifications',
        'student-policy' => 'student-policy',
        'criminal-provision' => 'criminal-provision',
        'ease-of-doing-business' => 'ease-of-doing-business',
        'facilitation-council' => 'facilitation-council',
        'directorate-of-industries' => 'directorate-of-industries',
        'state-investment-promotion-board' => 'state-investment-promotion-board',
        'boiler-inspectorate' => 'boiler-inspectorate',
        'registrar-firms-societies' => 'registrar-firms-societies',
        'csidc' => 'csidc',
        'odop' => 'odop',
        'mode-of-contact' => 'mode-of-contact',
        'schemes' => 'schemes',
        'privacy-policy' => 'privacy-policy',
    ];

    public function home()
    {
        $mediaUpdates = MediaUpdate::published()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->limit(4)
            ->get();

        $newsData = $mediaUpdates->map(function (MediaUpdate $item) {
            return [
                'img' => $item->display_image ?? asset('assets/img/message_bg.jpg'),
                'date' => $item->published_label,
                'title' => $item->title,
                'desc' => $item->summary,
                'link' => $item->source_url,
            ];
        });

        return view('pages.index', [
            'newsData' => $newsData,
        ]);
    }

    public function show(string $slug)
    {
        // Redirect ecosystem pages to startup ecosystem tab
        $ecosystemRedirects = [
            'cg-startup-cell' => 'cg-startup-cell',
            'incubators-accelerators' => 'incubators-accelerators',
            'college-innovation-startup-cells' => 'college-innovation-startup-cells',
            'mentors' => 'mentors',
        ];

        if (isset($ecosystemRedirects[$slug])) {
            return redirect(route('startup.show', 'ecosystem') . '?subTab=' . $ecosystemRedirects[$slug]);
        }

        $viewName = $this->pages[$slug] ?? null;

        abort_unless($viewName && View::exists("pages.$viewName"), 404);

        if ($slug === 'one-click-help-and-support') {
            $manuals = UserManual::query()
                ->active()
                ->ordered()
                ->get();

            $faqs = [
                [
                    'question' => 'Contact details of the Helpdesk?',
                    'answer' => 'In case of further queries/suggestions please contact us at the following Call 0771-3101500 (10.00 AM - 5.30 PM) Monday - Friday',
                ],
                [
                    'question' => 'Where can an investor find government order and circulars?',
                    'answer' => 'Users can click on Policies and Notifications tab on the Homepage and find the state governments orders and circulars under the circular and notification button.',
                ],
                [
                    'question' => 'I have forgot my password what to do?',
                    'answer' => 'Please click on forgot password provided under Single Window Login section on the Homepage.',
                ],
                [
                    'question' => 'I am a businessman residing outside the state of Chhattisgarh can I register for business on the website?',
                    'answer' => 'Please refer to the common application form (CAF) under service charter section on the Homepage.',
                ],
                [
                    'question' => 'Is it possible to edit my profile details after registration?',
                    'answer' => 'Please refer to the service charter section on the Homepage.',
                ],
                [
                    'question' => 'How do I login into the website?',
                    'answer' => 'Please refer to the common application form (CAF) under service charter section on the Homepage.',
                ],
                [
                    'question' => 'How can I register my new business with the department?',
                    'answer' => 'Please refer to the common application form (CAF) under service charter section on the Homepage.',
                ],
                [
                    'question' => 'What is the role of the Department of Commerce and Industries?',
                    'answer' => 'The Department of Commerce and Industries is responsible for promoting economic growth supporting businesses fostering innovation regulating trade and ensuring fair commercial practices. It aims to create a conducive environment for industrial development and enhance the competitiveness of the commerce sector.',
                ],
                [
                    'question' => 'Does the State have a publicly available comprehensive checklist of all required No Objection Certificates (NOCs) licenses registration?',
                    'answer' => 'Yes. The list is available on the website of Department of Industries SIPB Chhattisgarh.',
                ],
                [
                    'question' => 'Where can an investor find Government Orders and Circulars?',
                    'answer' => 'Users can click on the Policies Notifications tab on the home page and find the States Government Orders and Circulars under the Circular Notification button',
                ],
            ];

            return view("pages.$viewName", compact('manuals', 'faqs'));
        }

        if ($slug === 'dept-of-c-i') {
            $contactPersons = \App\Models\ContactPerson::all()->groupBy('category');
            return view("pages.$viewName", compact('contactPersons'));
        }

        return view("pages.$viewName");
    }
}
