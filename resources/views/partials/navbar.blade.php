<nav class="navbar navbar-expand-lg navbar-dark fixed-top py-2">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/Business_Made_Easy_Logo_White.svg') }}" alt="Logo" class="site-logo" />
        </a>

        <div class="d-none d-lg-flex align-items-center ms-auto">
            <a href="{{ route('home') }}" class="btn btn-menu btn-outline-light  me-3"><i
                    class="bi bi-house-door"></i></a>
            <button type="button" class="btn btn-menu btn-outline-light  me-3 site-search-open" aria-label="Search">
                <i class="bi bi-search"></i>
            </button>

            <button class="btn btn-outline-light btn-menu me-3" id="desktopMenuBtn">
                <i class="bi bi-list"></i> Menu
            </button>
            <a href="https://swsportal.cgstate.gov.in/login" class="btn btn-menu me-3 btn-primary btn-investor"
                target="_blank">
                <i class="bi bi-person"></i> Login
            </a>

        </div>
        <button type="button" class="btn btn-outline-light btn-menu d-lg-none ms-auto site-search-open"
            aria-label="Search">
            <i class="bi bi-search"></i>
        </button>
        <button class="btn btn-outline-light btn-menu d-lg-none ms-2" data-bs-toggle="offcanvas"
            data-bs-target="#mobileMenu">
            <i class="bi bi-list"></i>
        </button>

        <a class="btn btn-investor d-lg-none ms-2" href="https://swsportal.cgstate.gov.in/login" target="_blank"
            rel="noopener">
            <i class="bi bi-person"></i>
        </a>

    </div>
</nav>

<div class="site-search-overlay" id="siteSearchOverlay" aria-hidden="true">
    <div class="site-search-panel" role="dialog" aria-modal="true" aria-label="Site Search">
        <div class="site-search-header">
            <input type="text" class="site-search-input" id="siteSearchInput" placeholder="Search..."
                autocomplete="off" />
            <button type="button" class="site-search-close" id="siteSearchCloseBtn" aria-label="Close">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <div class="site-search-results" id="siteSearchResults"></div>
    </div>
</div>

@push('scripts')
    <script>
        (function () {
            const openBtns = document.querySelectorAll('.site-search-open');
            const overlay = document.getElementById('siteSearchOverlay');
            const closeBtn = document.getElementById('siteSearchCloseBtn');
            const input = document.getElementById('siteSearchInput');
            const resultsEl = document.getElementById('siteSearchResults');

            if (!openBtns.length || !overlay || !closeBtn || !input || !resultsEl) {
                return;
            }

            let abortController = null;
            let debounceTimer = null;
            function openOverlay() {
                overlay.classList.add('open');
                overlay.setAttribute('aria-hidden', 'false');

                setTimeout(() => {
                    input.focus();
                    input.select();
                }, 150);
            }
            function closeOverlay() {
                overlay.classList.remove('open');
                overlay.setAttribute('aria-hidden', 'true');
                input.value = '';
                resultsEl.innerHTML = '';
                if (abortController) {
                    abortController.abort();
                    abortController = null;
                }
            }

            function escapeHtml(str) {
                return String(str)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            async function runSearch(q) {
                const query = (q || '').trim();
                if (!query) {
                    resultsEl.innerHTML = '';
                    return;
                }

                if (abortController) {
                    abortController.abort();
                }
                abortController = new AbortController();

                const url = `{{ route('site.search') }}?q=${encodeURIComponent(query)}`;

                try {
                    const res = await fetch(url, {
                        headers: { 'Accept': 'application/json' },
                        signal: abortController.signal,
                    });

                    if (!res.ok) {
                        resultsEl.innerHTML = '';
                        return;
                    }

                    const data = await res.json();
                    const items = Array.isArray(data?.results) ? data.results : [];

                    if (items.length === 0) {
                        resultsEl.innerHTML = '<div class="site-search-empty">No results found</div>';
                        return;
                    }

                    resultsEl.innerHTML = items
                        .map((item) => {
                            const title = escapeHtml(item.title || '');
                            const href = escapeHtml(item.url || '#');
                            return `<a class="site-search-item" href="${href}">${title}</a>`;
                        })
                        .join('');
                } catch (e) {
                    if (e && e.name === 'AbortError') {
                        return;
                    }
                    resultsEl.innerHTML = '';
                }
            }

            openBtns.forEach((btn) => btn.addEventListener('click', openOverlay));
            closeBtn.addEventListener('click', closeOverlay);

            overlay.addEventListener('click', (e) => {
                if (e.target === overlay) {
                    closeOverlay();
                }
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && overlay.classList.contains('open')) {
                    closeOverlay();
                }
            });

            input.addEventListener('input', () => {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => runSearch(input.value), 200);
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    const firstLink = resultsEl.querySelector('.site-search-item');
                    if (firstLink && firstLink.getAttribute('href')) {
                        window.location.href = firstLink.getAttribute('href');
                    }
                }
            });
        })();
    </script>
@endpush

<div id="megaMenu" class="mega-menu">
    <div class="mega-inner container">
        <div class="row gx-5">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="mega-title">Investment Promotion</div>
                <ul class="mega-list">
                    <li><a href="{{ route('pages.show', 'investment_promotion') }}">CG Industrial Development Policy
                            2024-30</a></li>
                    <li><a href="{{ route('calculator.index') }}">Subsidy Calculator</a></li>
                    <li><a href="{{ route('focus-sectors.index') }}">Focus Sectors</a></li>


                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="mega-title">Investor Services</div>
                <ul class="mega-list">
                    <li><a href="{{ route('pages.show', 'one-click') }}">One Click Single Window System</a></li>
                    <li><a href="https://csidc.cgstate.gov.in/website/home" target="_blank" rel="noopener">Land
                            Management</a></li>
                    <li><a href="{{ route('pages.show', 'invitation-to-invest') }}">Express Investment Intent</a></li>
                    <li><a href="https://swsportal.cgstate.gov.in/website/registration" target="_blank"
                            rel="noopener">Register as an Investor</a></li>
                    <li><a href="{{ route('pages.show', 'corporate-social-responsibility') }}">Corporate Social
                            Responsibility (CSR)</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="mega-title">About Industries</div>
                <ul class="mega-list">
                    <li><a href="{{ route('pages.show', 'dept-of-c-i') }}">Dept of C&amp;I, Govt. of CG</a></li>
                    <li><a href="{{ route('media-updates.index') }}">Media Updates</a></li>
                    <li><a href="{{ route('gallery.index') }}">Gallery</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="mega-title">Important Links</div>
                <ul class="mega-list">
                    <li><a href="{{ route('startup.index') }}">Start-up Chhattisgarh</a></li>
                    <li><a href="{{ route('pages.show', 'export') }}">Export Promotion</a></li>
                    <li><a href="{{ route('pages.show', 'schemes') }}">Schemes</a></li>
                    <li><a href="{{ route('pages.show', 'boiler-inspectorate') }}">Boiler
                            Inspectorate</a></li>
                    <li><a href="https://rfas.cg.nic.in/" target="_blank" rel="noopener">Registrar, Firms and
                            Societies</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">
        <div class="mega-title">Investment Promotion</div>
        <ul class="mega-list">
            <li><a href="{{ route('pages.show', 'investment_promotion') }}">CG Industrial Development Policy
                    2024-30</a></li>
            <li><a href="{{ route('calculator.index') }}">Subsidy Calculator</a></li>
            <li><a href="{{ route('focus-sectors.index') }}">Focus Sectors</a></li>

        </ul>
        <hr />
        <div class="mega-title">Investor Services</div>
        <ul class="mega-list">
            <li><a href="{{ route('pages.show', 'one-click') }}">One Click Single Window System</a></li>
            <li><a href="https://csidc.cgstate.gov.in/website/home" target="_blank" rel="noopener">Land
                    Management</a></li>
            <li><a href="{{ route('pages.show', 'invitation-to-invest') }}">Express Investment Intent</a></li>
            <li><a href="https://swsportal.cgstate.gov.in/website/registration" target="_blank" rel="noopener">Register
                    as an Investor</a></li>
            <li><a href="{{ route('pages.show', 'corporate-social-responsibility') }}">Corporate Social Responsibility
                    (CSR)</a></li>
        </ul>
        <hr />
        <div class="mega-title">About Industries</div>
        <ul class="mega-list">
            <li><a href="{{ route('pages.show', 'dept-of-c-i') }}">Dept of C&amp;I, Govt. of CG</a></li>
            <li><a href="{{ route('media-updates.index') }}">Media Updates</a></li>
            <li><a href="{{ route('gallery.index') }}">Gallery</a></li>
        </ul>
        <hr />
        <div class="mega-title">Important Links</div>
        <ul class="mega-list">
            <li><a href="{{ route('startup.index') }}">Start-up Chhattisgarh</a></li>
            <li><a href="{{ route('pages.show', 'export') }}">Export Promotion</a></li>
            <li><a href="{{ route('pages.show', 'schemes') }}">Schemes</a></li>
            <li><a href="{{ route('pages.show', 'boiler-inspectorate') }}">Boiler Inspectorate</a></li>
            <li><a href="https://rfas.cg.nic.in/" target="_blank" rel="noopener">Registrar, Firms and
                    Societies</a></li>
        </ul>
    </div>
</div>