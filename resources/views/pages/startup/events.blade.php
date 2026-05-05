@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
    <img src="{{ asset('assets/img/sectors/startup-banner.jpg') }}" class="hero-video" alt="Startup Chhattisgarh Banner">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
        <div class="hero-content-wrapper">
            <div class="hero-text">
                <h1 class="hero-title">Startup Chhattisgarh</h1>
            </div>
        </div>
    </div>
</section>

@include('partials.startup-tabs', ['active' => 'events'])

<div class="container startup-page py-5">
    @php
        $eventTypeCards = [
            [
                'type' => 'Startup Investor Connect',
                'image' => asset('assets/img/investor_connect.png'),
                'icon' => 'fa-hand-holding-dollar',
            ],
            [
                'type' => 'Startup Connect',
                'image' => asset('assets/img/startup_connect.png'),
                'icon' => 'fa-link',
            ],
            [
                'type' => 'Mentor Connect',
                'image' => asset('assets/img/mentor_connect.png'),
                'icon' => 'fa-user-tie',
            ],
            [
                'type' => 'Incubator Connect',
                'image' => asset('assets/img/incubator_connect.png'),
                'icon' => 'fa-seedling',
            ],
            [
                'type' => 'Institutional Awareness',
                'image' => asset('assets/img/institutional_awareness.png'),
                'icon' => 'fa-building-columns',
            ],
            [
                'type' => 'Department Sensitization Program',
                'image' => asset('assets/img/department_sensitization_program.png'),
                'icon' => 'fa-chalkboard-user',
            ],
            [
                'type' => 'Collaborative Events',
                'image' => asset('assets/img/collaborative_events.png'),
                'icon' => 'fa-handshake',
            ],
            [
                'type' => 'Compliance Workshop',
                'image' => asset('assets/img/compliance_workshop.png'),
                'icon' => 'fa-shield-halved',
            ],
        ];

        $eventsCollection = $events ?? collect();
        $eventsByType = $eventsCollection->groupBy('event_type');
    @endphp

    <style>
        .startup-event-type-card {
            border: 1px solid rgba(0, 0, 0, 0.15);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            overflow: hidden;
            cursor: pointer;
            padding: 10px;
            text-align: center;
        }
        .startup-event-type-card h3{
       font-size: 0.8rem;
        }

        .startup-event-type-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.12);
        }

        .startup-event-type-card.is-active {
            border-color: rgba(0, 74, 173, 0.65);
            box-shadow: 0 10px 24px rgba(0, 74, 173, 0.18);
        }

        .startup-event-type-card .event-card-image {
            height: 120px;
            width: 100%;
            object-fit: cover;
            display: block;
        }

        .startup-event-type-card .event-card-icon {
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(0, 74, 173, 0.12), rgba(0, 180, 216, 0.10));
        }

        .startup-event-type-card .event-card-icon i {
            font-size: 34px;
            color: #004aad;
        }

        @media (max-width: 576px) {
            .startup-event-type-card .event-card-image {
                height: 80px;
            }

            .startup-event-type-card .event-card-icon {
                height: 80px;
            }

            .startup-event-type-card .event-card-icon i {
                font-size: 28px;
            }

            .startup-event-type-card .card-body {
                padding: 10px;
            }
        }
    </style>

    <section class="startup-card">
        <div class="startup-card-head">
            <div class="startup-icon"><i class="fa-solid fa-calendar-days"></i></div>
            <div>
                <h2 class="startup-title">Startup Events</h2>
            </div>
        </div>
        <div class="startup-card-body">
            <div class="row g-3">
                @foreach($eventTypeCards as $card)
                    @php
                        $typeSlug = \Illuminate\Support\Str::slug($card['type']);
                    @endphp
                    <div class="col-6 col-md-6 col-lg-3">
                        <div class="card startup-event-type-card h-100" role="button" tabindex="0" data-event-type="{{ $card['type'] }}" data-event-type-slug="{{ $typeSlug }}">
                            <img src="{{ $card['image'] ?? asset('assets/img/sectors/startup-banner.jpg') }}" alt="{{ $card['type'] }}" class="event-card-image">
                            <div class="card-body">
                                <h3 class="mb-1">{{ $card['type'] }}</h3>
                                <div class="text-muted small">
                                    {{ ($eventsByType->get($card['type']) ?? collect())->count() }} item(s)
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4" id="startupEventsTables">
                @foreach($eventTypeCards as $card)
                    @php
                        $type = $card['type'];
                        $typeSlug = \Illuminate\Support\Str::slug($type);
                        $items = $eventsByType->get($type, collect());
                    @endphp

                    <div class="event-type-table d-none" data-event-type-slug="{{ $typeSlug }}">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                            <h3 class="h5 mb-0">{{ $type }}</h3>
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-clear-selection>
                                Clear
                            </button>
                        </div>

                        @if($items->count() > 0)
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                                <div class="d-flex align-items-center d-none gap-2 flex-wrap">
                                    <label class="small text-muted mb-0">Show</label>
                                    <select class="form-select form-select-sm" style="width: 90px;" data-events-page-size>
                                        <option value="5">5</option>
                                        <option value="10" selected>10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                    <label class="small text-muted mb-0">entries</label>
                                </div>
                                <div class="d-flex w-100 align-items-center gap-2">
                                
                                    <input type="text" class="form-control form-control-sm"  placeholder="Type to search events..." data-events-search>
                                </div>
                            </div>

                            <div class="d-md-none">
                                <div class="row g-3" data-events-cards>
                                    @foreach($items as $event)
                                        <div class="col-12" data-event-card data-event-name="{{ $event->event_name }}" data-event-date="{{ $event->event_date->format('Y-m-d') }}">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="fw-semibold">{{ $event->event_name }}</div>
                                                    <div class="text-muted small mb-2">{{ $event->event_date->format('d M Y') }}</div>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        @if($event->pre_event_promotion_url)
                                                            <a href="{{ $event->pre_event_promotion_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                                <i class="fa-solid fa-image me-1"></i>
                                                                Promotion
                                                            </a>
                                                        @endif
                                                        @if($event->post_event_report_url)
                                                            <a href="{{ $event->post_event_report_url }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                                                <i class="fa-solid fa-file-pdf me-1"></i>
                                                                Report
                                                            </a>
                                                        @endif
                                                        @if(!$event->pre_event_promotion_url && !$event->post_event_report_url)
                                                            <span class="text-muted small">No attachments</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-3">
                                    <div class="small text-muted" data-events-info></div>
                                    <div class="btn-group" role="group" aria-label="Pagination" data-events-pagination></div>
                                </div>
                            </div>

                            <div class="d-none d-md-block">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0" data-events-table>
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th style="width: 160px;">Date</th>
                                                <th style="width: 230px;">Event Promotion</th>
                                                <th style="width: 200px;">Event Report</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $event)
                                                <tr data-event-row data-event-name="{{ $event->event_name }}" data-event-date="{{ $event->event_date->format('Y-m-d') }}">
                                                    <td>{{ $event->event_name }}</td>
                                                    <td>{{ $event->event_date->format('d M Y') }}</td>
                                                    <td>
                                                        @if($event->pre_event_promotion_url)
                                                            <a href="{{ $event->pre_event_promotion_url }}" target="_blank" class="startup-btn primary">
                                                                <i class="fa-solid fa-image me-2"></i>
                                                                View
                                                            </a>
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($event->post_event_report_url)
                                                            <a href="{{ $event->post_event_report_url }}" target="_blank" class="startup-btn primary">
                                                                <i class="fa-solid fa-file-pdf me-2"></i>
                                                                View PDF
                                                            </a>
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-3">
                                    <div class="small text-muted" data-events-info></div>
                                    <div class="btn-group" role="group" aria-label="Pagination" data-events-pagination></div>
                                </div>
                            </div>
                        @else
                            <p class="mb-0 text-muted">No events available for this category.</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        const cards = Array.from(document.querySelectorAll('.startup-event-type-card'));
        const tables = Array.from(document.querySelectorAll('.event-type-table'));
        const clearButtons = Array.from(document.querySelectorAll('[data-clear-selection]'));

        const tableStates = new WeakMap();

        if (!cards.length || !tables.length) {
            return;
        }

        function getState(container) {
            if (tableStates.has(container)) {
                return tableStates.get(container);
            }

            const state = {
                query: '',
                page: 1,
                pageSize: 10,
            };

            tableStates.set(container, state);
            return state;
        }

        function getItems(container) {
            const rows = Array.from(container.querySelectorAll('[data-event-row]'));
            const cards = Array.from(container.querySelectorAll('[data-event-card]'));

            if (rows.length) {
                return rows;
            }

            return cards;
        }

        function itemMatches(el, query) {
            if (!query) {
                return true;
            }

            const name = (el.getAttribute('data-event-name') || '').toLowerCase();
            const date = (el.getAttribute('data-event-date') || '').toLowerCase();
            const q = query.toLowerCase();

            return name.includes(q) || date.includes(q);
        }

        function render(container) {
            const state = getState(container);
            const infoEl = container.querySelector('[data-events-info]');
            const paginationEl = container.querySelector('[data-events-pagination]');

            const allItems = getItems(container);
            const filtered = allItems.filter((el) => itemMatches(el, state.query));

            const total = filtered.length;
            const totalPages = Math.max(1, Math.ceil(total / state.pageSize));
            state.page = Math.min(state.page, totalPages);

            const startIndex = (state.page - 1) * state.pageSize;
            const endIndex = startIndex + state.pageSize;

            allItems.forEach((el) => el.classList.add('d-none'));
            filtered.slice(startIndex, endIndex).forEach((el) => el.classList.remove('d-none'));

            if (infoEl) {
                const startLabel = total === 0 ? 0 : startIndex + 1;
                const endLabel = Math.min(endIndex, total);
                infoEl.textContent = `Showing ${startLabel} to ${endLabel} of ${total} entries`;
            }

            if (paginationEl) {
                const makeBtn = (label, page, disabled, active) => {
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = `btn btn-sm ${active ? 'btn-primary' : 'btn-outline-primary'}`;
                    btn.textContent = label;
                    btn.disabled = disabled;
                    btn.addEventListener('click', () => {
                        state.page = page;
                        render(container);
                    });
                    return btn;
                };

                paginationEl.innerHTML = '';

                const prevDisabled = state.page <= 1;
                paginationEl.appendChild(makeBtn('Prev', Math.max(1, state.page - 1), prevDisabled, false));

                const maxButtons = 5;
                let start = Math.max(1, state.page - Math.floor(maxButtons / 2));
                let end = Math.min(totalPages, start + maxButtons - 1);
                start = Math.max(1, end - maxButtons + 1);

                for (let p = start; p <= end; p++) {
                    paginationEl.appendChild(makeBtn(String(p), p, false, p === state.page));
                }

                const nextDisabled = state.page >= totalPages;
                paginationEl.appendChild(makeBtn('Next', Math.min(totalPages, state.page + 1), nextDisabled, false));
            }
        }

        function initTable(container) {
            if (!container || container.getAttribute('data-events-initialized') === '1') {
                return;
            }

            const state = getState(container);
            const searchInput = container.querySelector('[data-events-search]');
            const pageSizeSelect = container.querySelector('[data-events-page-size]');

            if (searchInput) {
                searchInput.addEventListener('input', () => {
                    state.query = searchInput.value || '';
                    state.page = 1;
                    render(container);
                });
            }

            if (pageSizeSelect) {
                pageSizeSelect.addEventListener('change', () => {
                    const size = parseInt(pageSizeSelect.value || '10', 10);
                    state.pageSize = Number.isFinite(size) && size > 0 ? size : 10;
                    state.page = 1;
                    render(container);
                });
            }

            container.setAttribute('data-events-initialized', '1');
            render(container);
        }

        function clearSelection() {
            cards.forEach((c) => c.classList.remove('is-active'));
            tables.forEach((t) => t.classList.add('d-none'));
        }

        function showBySlug(slug) {
            clearSelection();

            const card = cards.find((c) => c.getAttribute('data-event-type-slug') === slug);
            const table = tables.find((t) => t.getAttribute('data-event-type-slug') === slug);

            if (card) {
                card.classList.add('is-active');
            }

            if (table) {
                table.classList.remove('d-none');
                initTable(table);
                table.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        cards.forEach((card) => {
            const slug = card.getAttribute('data-event-type-slug');

            card.addEventListener('click', function () {
                if (!slug) {
                    return;
                }
                showBySlug(slug);
            });

            card.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    if (slug) {
                        showBySlug(slug);
                    }
                }
            });
        });

        clearButtons.forEach((btn) => btn.addEventListener('click', clearSelection));

        const params = new URLSearchParams(window.location.search);
        const selectedType = params.get('type');

        if (selectedType) {
            const selectedSlug = selectedType.toLowerCase().trim().replace(/\s+/g, '-');
            showBySlug(selectedSlug);
        }
    })();
</script>
@endpush

