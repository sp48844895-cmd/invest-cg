@php
    $activeTab = $activeTab ?? null;

    $tabIcons = [
        'cg-startup-cell' => 'fa-chess-king',
        'incubators-accelerators' => 'fa-building-columns',
        'college-innovation-startup-cells' => 'fa-graduation-cap',
        'mentors' => 'fa-user-ninja',
    ];

    $tabs = [
        [
            'label' => 'CG Startup Cell',
            'slug' => 'cg-startup-cell',
            'url' => route('pages.show', 'cg-startup-cell'),
        ],
        [
            'label' => 'Incubators & Accelerators',
            'slug' => 'incubators-accelerators',
            'url' => route('pages.show', 'incubators-accelerators'),
        ],
        [
            'label' => 'College Innovation Startup Cells',
            'slug' => 'college-innovation-startup-cells',
            'url' => route('pages.show', 'college-innovation-startup-cells'),
        ],
        [
            'label' => 'Mentors',
            'slug' => 'mentors',
            'url' => route('pages.show', 'mentors'),
        ],
    ];
@endphp

<div class="ecosystem-tabs">
    <div class="tab-buttons">
        @foreach ($tabs as $tab)
            <a href="{{ $tab['url'] }}" class="tab-button {{ $activeTab === $tab['slug'] ? 'active' : '' }}">
                <span class="tab-button-inner">
                    <span class="tab-icon">
                        <i class="fa-solid {{ $tabIcons[$tab['slug']] }}"></i>
                    </span>
                    <span class="tab-label">{{ $tab['label'] }}</span>
                </span>
            </a>
        @endforeach
    </div>
    <div class="tab-content {{ $activeTab ? 'is-active' : '' }}">
        {!! $content ?? '' !!}
    </div>
</div>

