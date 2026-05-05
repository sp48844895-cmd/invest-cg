@php
    $activeTab = $active ?? 'overview';

    $tabs = [
        [
            'label' => 'Overview',
            'slug' => 'overview',
            'url' => route('startup.show', 'overview'),
       
        ],
        [
            'label' => 'Policy & Guidelines',
            'slug' => 'policy-guidelines',
            'url' => route('startup.show', 'policy-guidelines'),
         
        ],
        [
            'label' => 'Startup',
            'slug' => 'startup',
            'url' => route('startup.show', 'startup'),
       
        ],
        [
            'label' => 'Ecosystem',
            'slug' => 'ecosystem',
            'url' => route('startup.show', 'ecosystem'),
    
        ],
        [
            'label' => 'Information Wizard',
            'slug' => 'information-wizard',
            'url' => route('startup.show', 'information-wizard'),
         
        ],
        [
            'label' => 'Notification',
            'slug' => 'notification',
            'url' => route('startup.show', 'notification'),
        
        ],
        [
            'label' => 'Events',
            'slug' => 'events',
            'url' => route('startup.show', 'events'),
        
        ],
    ];
@endphp

<div class="breadcrumb-nav startup-nav">
    <div class="container breadcrumb-container startup-nav-container">
        @foreach ($tabs as $index => $tab)
            @php
                $isActive = $activeTab === $tab['slug'];
            @endphp

            <div class="startup-nav-item {{ $isActive ? 'is-active' : '' }}">
                <a class="tab-breadcrumb {{ $isActive ? 'active' : '' }}" href="{{ $tab['url'] }}">
            
                    {{ $tab['label'] }}
                </a>
            </div>

            @if ($index < count($tabs) - 1)
                <span class="nav-separator">›</span>
            @endif
        @endforeach
    </div>
</div>

