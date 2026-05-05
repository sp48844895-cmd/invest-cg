@php
    use Illuminate\Support\Str;

    $activeSlug = $active ?? null;

    $navItems = [
        [
            'label' => 'Overview',
            'url' => route('pages.show', 'startup-overview'),
            'slugs' => ['startup-overview'],
        ],
        [
            'label' => 'Policy & Guidelines',
            'url' => route('pages.show', 'policy-guidelines'),
            'slugs' => ['policy-guidelines', 'chhattisgarh-innovation', 'student-policy'],
            'children' => [
                [
                    'label' => 'Chhattisgarh Innovation & Startup Promotion Policy 2024-30',
                    'url' => route('pages.show', 'policy-guidelines') . '#cg-policy',
                ],
                [
                    'label' => 'Student Startup Innovation Policy',
                    'url' => route('pages.show', 'policy-guidelines') . '#student-policy',
                ],
            ],
        ],
        [
            'label' => 'Startup',
            'url' => route('pages.show', 'startup'),
            'slugs' => ['startup'],
            'children' => [
                [
                    'label' => 'Definition',
                    'url' => route('pages.show', 'startup') . '#definition',
                ],
                [
                    'label' => 'Recognition',
                    'url' => route('pages.show', 'startup') . '#recognition',
                ],
                [
                    'label' => 'Fundings',
                    'url' => route('pages.show', 'startup') . '#fundings',
                ],
                [
                    'label' => 'Women Entrepreneurship',
                    'url' => route('pages.show', 'startup') . '#women-entrepreneurship',
                ],
            ],
        ],
        [
            'label' => 'Ecosystem',
            'url' => route('pages.show', 'cg-startup-cell'),
            'slugs' => ['cg-startup-cell', 'incubators-accelerators', 'college-innovation-startup-cells', 'mentors'],
            'children' => [
                ['label' => 'CG Startup Cell', 'url' => route('pages.show', 'cg-startup-cell')],
                ['label' => 'Incubators and Accelerators', 'url' => route('pages.show', 'incubators-accelerators')],
                ['label' => 'College Innovation Startup Cells', 'url' => route('pages.show', 'college-innovation-startup-cells')],
                ['label' => 'Mentors', 'url' => route('pages.show', 'mentors')],
            ],
        ],
        [
            'label' => 'Information Wizard',
            'url' => '#',
            'slugs' => [],
        ],
        [
            'label' => 'Notification',
            'url' => '#',
            'slugs' => [],
        ],
        [
            'label' => 'Events',
            'url' => '#',
            'slugs' => [],
        ],
    ];
@endphp

<div class="breadcrumb-nav startup-nav">
    <div class="container breadcrumb-container startup-nav-container">
        @foreach ($navItems as $index => $item)
            @php
                $hasDropdown = !empty($item['children'] ?? []);
                $isActive = $activeSlug && in_array($activeSlug, $item['slugs'] ?? [], true);
                $dropdownId = $hasDropdown ? 'startup-nav-' . Str::slug($item['label']) : null;
            @endphp

            <div class="startup-nav-item {{ $hasDropdown ? 'dropdown' : '' }} {{ $isActive ? 'is-active' : '' }}">
                <a class="tab-breadcrumb {{ $isActive ? 'active' : '' }} {{ $hasDropdown ? 'dropdown-toggle' : '' }}"
                    href="{{ $hasDropdown ? 'javascript:void(0);' : $item['url'] }}"
                    @if ($hasDropdown)
                        id="{{ $dropdownId }}"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="{{ $isActive ? 'true' : 'false' }}"
                    @endif
                >
                    {{ $item['label'] }}
                </a>

                @if ($hasDropdown)
                    <ul class="dropdown-menu" aria-labelledby="{{ $dropdownId }}">
                        @foreach ($item['children'] as $child)
                            @php
                                $childActive = isset($child['slug']) && $activeSlug === $child['slug'];
                            @endphp
                            <li>
                                <a class="dropdown-item {{ $childActive ? 'active' : '' }}" href="{{ $child['url'] }}">
                                    {{ $child['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            @if ($index < count($navItems) - 1)
                <span class="nav-separator">›</span>
            @endif
        @endforeach
    </div>
</div>

