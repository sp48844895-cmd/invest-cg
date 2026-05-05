@extends('layouts.app')

@section('content')
<section class="sector-hero">
  <img src="{{ asset('assets/img/sectors/dept-of-ci-banner.jpg') }}" class="hero-video" alt="Boiler Inspectorate">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">Boiler Inspectorate</h1>
      </div>
    </div>
  </div>
</section>

@php($activeBoilerTab = 'boiler-details')
@include('partials.boiler-breadcrumb')

<section class="body-content-section">
  <div class="container">
    <div class="body-content-card">
      <div class="body-link-section" style="border-top: none; padding-top: 0; margin-top: 0;">

        <div class="boiler-search-bar">
          <div class="boiler-search-input-wrap">
            <i class="fa-solid fa-search boiler-search-icon"></i>
            <input type="text" id="boilerSearch" class="boiler-search-input" placeholder="Search boiler, company, district...">
          </div>
          <span class="boiler-record-count"><strong id="boilerCount">0</strong> records</span>
        </div>

        <div class="d-none">
          <span id="boilerStart">0</span>
          <span id="boilerEnd">0</span>
          <select id="statusFilter">
            <option value="">All Status</option>
            <option value="active">Active</option>
            <option value="expiring">Expiring</option>
            <option value="expired">Expired</option>
          </select>
          <select id="districtFilter">
            <option value="">All Districts</option>
          </select>
          <button type="button" id="clearFilters">Clear Filters</button>
        </div>

        <div id="boilerLoading" class="text-center py-5">
          <div class="spinner-border text-primary" role="status" style="width: 2.5rem; height: 2.5rem;">
            <span class="visually-hidden">Loading...</span>
          </div>
          <p class="text-muted mt-3 mb-0" style="font-size: 14px;">Loading boiler data...</p>
        </div>

        <div id="boilerError" class="d-none">
          <div class="alert alert-light border text-center py-4">
            <i class="fa-solid fa-exclamation-triangle text-warning mb-2" style="font-size: 24px;"></i>
            <p class="mb-2 fw-semibold">Unable to load boiler data</p>
            <p class="text-muted mb-3" style="font-size: 14px;">Please try again later or check your connection.</p>
            <button id="boilerRetry" class="btn btn-sm text-white" style="background: linear-gradient(135deg, #0077ff, #00b8a9);">
              <i class="fa-solid fa-refresh me-1"></i> Retry
            </button>
          </div>
        </div>

        <div id="boilerEmpty" class="d-none">
          <div class="alert alert-light border text-center py-4">
            <i class="fa-solid fa-database text-muted mb-2" style="font-size: 24px;"></i>
            <p class="mb-0 text-muted">No boiler records available.</p>
          </div>
        </div>

        <div id="boilerTableWrapper" class="d-none" style="position: relative;">
          <div class="d-none">
            <table id="boilerTable"><thead><tr><th></th></tr></thead><tbody id="boilerTableBody"></tbody></table>
          </div>

          <div id="boilerPageLoader" class="boiler-page-loader d-none">
            <div class="spinner-border text-primary" role="status" style="width: 2rem; height: 2rem;">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>

          <div id="boilerCards"></div>

          <div id="boilerNoResults" class="alert alert-light border text-center py-4 d-none mt-3">
            <i class="fa-solid fa-search text-muted mb-2" style="font-size: 22px;"></i>
            <p class="mb-0 text-muted">No records matched your search.</p>
          </div>

          <div id="boilerPaginationWrap" class="d-flex justify-content-end mt-3 d-none">
            <nav aria-label="Boiler list pagination">
              <ul id="boilerPagination" class="boiler-pagination mb-0"></ul>
            </nav>
          </div>
        </div>
      </div>

      <div class="body-link-section">
        <a href="https://swsportal.cgstate.gov.in/login" class="body-external-link">
          <i class="fa-solid fa-external-link"></i>
          <span>Login</span>
        </a>
      </div>
    </div>
  </div>
</section>

<style>
  .boiler-search-bar {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 16px;
    padding: 12px 16px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
  }
  .boiler-search-input-wrap {
    flex: 1;
    position: relative;
    display: flex;
    align-items: center;
  }
  .boiler-search-icon {
    position: absolute;
    left: 0;
    color: #94a3b8;
    font-size: 15px;
  }
  .boiler-search-input {
    width: 100%;
    border: none;
    background: transparent;
    outline: none;
    padding-left: 26px;
    font-size: 14px;
    color: #334155;
  }
  .boiler-search-input::placeholder {
    color: #94a3b8;
  }
  .boiler-record-count {
    white-space: nowrap;
    font-size: 13px;
    color: #64748b;
  }
  .boiler-record-count strong {
    color: #475569;
  }

  .boiler-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    margin-bottom: 10px;
    overflow: hidden;
    transition: box-shadow 0.2s ease;
  }
  .boiler-card:hover {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
  }
  .boiler-card-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding: 14px 16px;
    cursor: pointer;
    gap: 12px;
    user-select: none;
  }
  .boiler-card-header-left {
    flex: 1;
    min-width: 0;
  }
  .boiler-card-header-right {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
  }
  .boiler-card-boiler-no {
    font-weight: 700;
    color: #1e293b;
    font-size: 15px;
    line-height: 1.3;
  }
  .boiler-card-company-name {
    font-size: 13px;
    color: #475569;
    font-weight: 500;
    line-height: 1.4;
    margin-top: 2px;
  }
  .boiler-card-district-name {
    font-size: 12px;
    color: #94a3b8;
    margin-top: 1px;
  }
  .boiler-toggle-btn {
    width: 26px;
    height: 26px;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    background: #fff;
    color: #94a3b8;
    font-size: 16px;
    font-weight: 400;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    line-height: 1;
    flex-shrink: 0;
  }
  .boiler-toggle-btn:hover {
    border-color: #cbd5e1;
    color: #64748b;
  }

  .boiler-card-body {
    display: none;
    border-top: 1px solid #e2e8f0;
    padding: 14px 16px 16px;
  }
  .boiler-card.is-expanded .boiler-card-body {
    display: block;
  }
  .boiler-detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px 40px;
  }
  .boiler-detail-row {
    display: flex;
    align-items: baseline;
    gap: 8px;
  }
  .boiler-detail-label {
    font-size: 13px;
    color: #64748b;
    white-space: nowrap;
    min-width: 115px;
  }
  .boiler-detail-value {
    font-size: 13px;
    color: #1e293b;
    font-weight: 600;
  }
  .boiler-validity-row {
    grid-column: 1 / -1;
  }
  .boiler-card-address {
    margin-top: 12px;
    font-size: 12px;
    color: #64748b;
    line-height: 1.5;
  }

  .boiler-status-badge {
    display: inline-flex;
    align-items: center;
    padding: 3px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
  }
  .boiler-status-active {
    background: #ecfdf5;
    color: #059669;
  }
  .boiler-status-expiring {
    background: #fffbeb;
    color: #b45309;
  }
  .boiler-status-expired {
    background: #fef2f2;
    color: #dc2626;
  }
  .boiler-status-other {
    background: #f1f5f9;
    color: #64748b;
  }

  .boiler-pagination {
    display: flex;
    align-items: center;
    gap: 8px;
    padding-left: 0;
    list-style: none;
  }
  .boiler-page-btn {
    min-width: 34px;
    height: 34px;
    border: 1px solid #dbe2ea;
    background: #fff;
    color: #475569;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    padding: 0 10px;
    transition: all 0.2s ease;
  }
  .boiler-page-btn:hover:not(:disabled) {
    border-color: #0077ff;
    color: #0077ff;
  }
  .boiler-page-btn.is-active {
    border-color: transparent;
    background: linear-gradient(135deg, #0077ff, #00b8a9);
    color: #fff;
  }
  .boiler-page-btn:disabled {
    opacity: 0.45;
    cursor: not-allowed;
  }

  .boiler-page-loader {
    position: absolute;
    inset: 0;
    background: rgba(255, 255, 255, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    border-radius: 10px;
    min-height: 120px;
  }
  .boiler-page-loader.d-none {
    display: none !important;
  }

  @media (max-width: 575.98px) {
    .boiler-search-bar {
      padding: 10px 12px;
      gap: 12px;
    }
    .boiler-detail-grid {
      grid-template-columns: 1fr;
      gap: 8px;
    }
    .boiler-detail-label {
      min-width: 125px;
    }
    #boilerPaginationWrap {
      justify-content: center !important;
    }
    .boiler-pagination {
      gap: 6px;
      flex-wrap: wrap;
      justify-content: center;
    }
  }
  @media (min-width: 768px) {
    .boiler-detail-grid {
      gap: 8px 60px;
    }
    .boiler-detail-label {
      min-width: 130px;
    }
  }
</style>
@endsection

@push('scripts')
<script>
(function () {
  var loading = document.getElementById('boilerLoading');
  var error = document.getElementById('boilerError');
  var empty = document.getElementById('boilerEmpty');
  var wrapper = document.getElementById('boilerTableWrapper');
  var tbody = document.getElementById('boilerTableBody');
  var cards = document.getElementById('boilerCards');
  var countEl = document.getElementById('boilerCount');
  var startEl = document.getElementById('boilerStart');
  var endEl = document.getElementById('boilerEnd');
  var paginationWrap = document.getElementById('boilerPaginationWrap');
  var paginationEl = document.getElementById('boilerPagination');
  var noResultsEl = document.getElementById('boilerNoResults');
  var searchInput = document.getElementById('boilerSearch');
  var statusFilter = document.getElementById('statusFilter');
  var districtFilter = document.getElementById('districtFilter');
  var clearFilters = document.getElementById('clearFilters');
  var retryBtn = document.getElementById('boilerRetry');
  var pageSize = 10;
  var allData = [];
  var filteredData = [];
  var currentPage = 1;
  var expandedCardIndex = 0;

  function escapeHtml(str) {
    if (!str) return '-';
    var div = document.createElement('div');
    div.appendChild(document.createTextNode(str));
    return div.innerHTML;
  }

  function formatNumber(val) {
    if (val === null || val === undefined) return '-';
    return Number(val).toLocaleString('en-IN');
  }

  function formatCurrency(val) {
    if (val === null || val === undefined) return '-';
    return '\u20B9' + Number(val).toLocaleString('en-IN');
  }

  function statusBadge(status) {
    var s = (status || '').toLowerCase();
    var cls = 'boiler-status-other';
    if (s === 'active') cls = 'boiler-status-active';
    else if (s === 'expiring') cls = 'boiler-status-expiring';
    else if (s === 'expired') cls = 'boiler-status-expired';
    return '<span class="boiler-status-badge ' + cls + '">' + escapeHtml(status || 'N/A') + '</span>';
  }

  function parseDate(value) {
    if (!value || typeof value !== 'string') {
      return null;
    }
    var parts = value.split('-');
    if (parts.length !== 3) {
      return null;
    }
    var day = Number(parts[0]);
    var monthMap = { Jan: 0, Feb: 1, Mar: 2, Apr: 3, May: 4, Jun: 5, Jul: 6, Aug: 7, Sep: 8, Oct: 9, Nov: 10, Dec: 11 };
    var month = monthMap[parts[1]];
    var year = Number(parts[2]);
    if (!day || month === undefined || !year) {
      return null;
    }
    return new Date(year, month, day);
  }

  function getComputedStatus(item) {
    var validToDate = parseDate(item.validTo);
    if (!validToDate) {
      return (item.status || 'Active').toString();
    }
    var today = new Date();
    today.setHours(0, 0, 0, 0);
    validToDate.setHours(0, 0, 0, 0);
    var diffDays = Math.floor((validToDate.getTime() - today.getTime()) / 86400000);
    if (diffDays < 0) {
      return 'Expired';
    }
    if (diffDays <= 30) {
      return 'Expiring';
    }
    return 'Active';
  }

  function populateDistrictFilter(data) {
    var districts = [];
    data.forEach(function (item) {
      var district = (item.district || '').trim();
      if (district && districts.indexOf(district) === -1) {
        districts.push(district);
      }
    });
    districts.sort();
    districtFilter.innerHTML = '<option value="">All Districts</option>';
    districts.forEach(function (district) {
      districtFilter.innerHTML += '<option value="' + escapeHtml(district) + '">' + escapeHtml(district) + '</option>';
    });
  }

  function showState(state) {
    loading.classList.toggle('d-none', state !== 'loading');
    error.classList.toggle('d-none', state !== 'error');
    empty.classList.toggle('d-none', state !== 'empty');
    wrapper.classList.toggle('d-none', state !== 'data');
  }

  function renderTable(data, startIndex) {
    tbody.innerHTML = '';
  }

  function renderCards(data) {
    var html = '';
    for (var i = 0; i < data.length; i++) {
      var d = data[i];
      var isOpen = (i === expandedCardIndex);
      html += '<div class="boiler-card' + (isOpen ? ' is-expanded' : '') + '" data-card-index="' + i + '">'
        + '<div class="boiler-card-header" data-toggle-card="' + i + '">'
        + '<div class="boiler-card-header-left">'
        + '<div class="boiler-card-boiler-no">' + escapeHtml(d.boilerNo) + '</div>'
        + '<div class="boiler-card-company-name">' + escapeHtml(d.companyName) + '</div>'
        + '<div class="boiler-card-district-name">' + escapeHtml(d.district) + '</div>'
        + '</div>'
        + '<div class="boiler-card-header-right">'
        + statusBadge(d.computedStatus)
        + '<span class="boiler-toggle-btn">' + (isOpen ? '\u2212' : '+') + '</span>'
        + '</div>'
        + '</div>'
        + '<div class="boiler-card-body">'
        + '<div class="boiler-detail-grid">'
        + '<div class="boiler-detail-row"><span class="boiler-detail-label">Type</span><span class="boiler-detail-value">' + escapeHtml(d.boilerType) + '</span></div>'
        + '<div class="boiler-detail-row"><span class="boiler-detail-label">Year</span><span class="boiler-detail-value">' + (d.yearOfManufacture || '-') + '</span></div>'
        + '<div class="boiler-detail-row"><span class="boiler-detail-label">Max W.P.</span><span class="boiler-detail-value">' + escapeHtml(d.maxWorkingPressure) + ' kg/cm\u00B2</span></div>'
        + '<div class="boiler-detail-row"><span class="boiler-detail-label">Evaporation (TPH)</span><span class="boiler-detail-value">' + formatNumber(d.evaporationTph) + '</span></div>'
        + '<div class="boiler-detail-row"><span class="boiler-detail-label">Rating (M2)</span><span class="boiler-detail-value">' + formatNumber(d.rating) + '</span></div>'
        + '<div class="boiler-detail-row"><span class="boiler-detail-label">Fee</span><span class="boiler-detail-value">' + formatCurrency(d.fee) + '</span></div>'
        + '<div class="boiler-detail-row boiler-validity-row"><span class="boiler-detail-label">Validity</span><span class="boiler-detail-value">' + escapeHtml(d.validFrom) + ' \u2192 ' + escapeHtml(d.validTo) + '</span></div>'
        + '</div>'
        + '<div class="boiler-card-address">' + escapeHtml(d.address) + '</div>'
        + '</div>'
        + '</div>';
    }
    cards.innerHTML = html;
  }

  function getVisiblePages(totalPages, page) {
    var pages = [];
    var start = Math.max(1, page - 2);
    var end = Math.min(totalPages, page + 2);
    for (var p = start; p <= end; p++) {
      pages.push(p);
    }
    return pages;
  }

  function renderPagination(totalPages, page) {
    if (totalPages <= 1) {
      paginationWrap.classList.add('d-none');
      return;
    }
    paginationWrap.classList.remove('d-none');
    var pages = getVisiblePages(totalPages, page);
    var html = '';
    html += '<li><button type="button" class="boiler-page-btn" data-page="' + (page - 1) + '"' + (page === 1 ? ' disabled' : '') + '>Prev</button></li>';

    if (pages[0] > 1) {
      html += '<li><button type="button" class="boiler-page-btn" data-page="1">1</button></li>';
      if (pages[0] > 2) {
        html += '<li><button type="button" class="boiler-page-btn" disabled>...</button></li>';
      }
    }

    pages.forEach(function (p) {
      html += '<li><button type="button" class="boiler-page-btn' + (p === page ? ' is-active' : '') + '" data-page="' + p + '">' + p + '</button></li>';
    });

    if (pages[pages.length - 1] < totalPages) {
      if (pages[pages.length - 1] < totalPages - 1) {
        html += '<li><button type="button" class="boiler-page-btn" disabled>...</button></li>';
      }
      html += '<li><button type="button" class="boiler-page-btn" data-page="' + totalPages + '">' + totalPages + '</button></li>';
    }

    html += '<li><button type="button" class="boiler-page-btn" data-page="' + (page + 1) + '"' + (page === totalPages ? ' disabled' : '') + '>Next</button></li>';
    paginationEl.innerHTML = html;
  }

  function renderCurrentPage() {
    var total = filteredData.length;
    countEl.textContent = total;

    if (total === 0) {
      tbody.innerHTML = '';
      cards.innerHTML = '';
      startEl.textContent = 0;
      endEl.textContent = 0;
      noResultsEl.classList.remove('d-none');
      paginationWrap.classList.add('d-none');
      return;
    }

    noResultsEl.classList.add('d-none');
    var totalPages = Math.ceil(total / pageSize);
    if (currentPage > totalPages) {
      currentPage = totalPages;
    }
    if (currentPage < 1) {
      currentPage = 1;
    }

    var startIndex = (currentPage - 1) * pageSize;
    var endIndex = Math.min(startIndex + pageSize, total);
    var pageData = filteredData.slice(startIndex, endIndex);

    startEl.textContent = startIndex + 1;
    endEl.textContent = endIndex;
    expandedCardIndex = 0;
    renderTable(pageData, startIndex);
    renderCards(pageData);
    renderPagination(totalPages, currentPage);
  }

  function applyFilter() {
    var q = (searchInput.value || '').toLowerCase().trim();
    var statusValue = (statusFilter.value || '').toLowerCase();
    var districtValue = (districtFilter.value || '').toLowerCase();
    filteredData = allData.filter(function (d) {
      var statusMatches = !statusValue || (d.computedStatus || '').toLowerCase() === statusValue;
      var districtMatches = !districtValue || (d.district || '').toLowerCase() === districtValue;
      if (!statusMatches || !districtMatches) return false;
      if (!q) return true;
      var haystack = [d.boilerNo, d.companyName, d.address, d.district, d.boilerType, d.computedStatus, d.validFrom, d.validTo]
        .join(' ').toLowerCase();
      return haystack.indexOf(q) !== -1;
    });
    currentPage = 1;
    renderCurrentPage();
  }

  function fetchData() {
    showState('loading');
    fetch('{{ url("/api/boiler-list") }}')
      .then(function (res) { return res.json(); })
      .then(function (json) {
        if (!json.success || !json.data || json.data.length === 0) {
          showState('empty');
          return;
        }
        allData = json.data.map(function (item) {
          item.computedStatus = getComputedStatus(item);
          return item;
        });
        populateDistrictFilter(allData);
        filteredData = allData.slice();
        currentPage = 1;
        renderCurrentPage();
        showState('data');
      })
      .catch(function () {
        showState('error');
      });
  }

  if (searchInput) {
    searchInput.addEventListener('input', applyFilter);
  }
  if (statusFilter) {
    statusFilter.addEventListener('change', applyFilter);
  }
  if (districtFilter) {
    districtFilter.addEventListener('change', applyFilter);
  }
  if (clearFilters) {
    clearFilters.addEventListener('click', function () {
      searchInput.value = '';
      statusFilter.value = '';
      districtFilter.value = '';
      applyFilter();
    });
  }

  cards.addEventListener('click', function (event) {
    var header = event.target.closest('[data-toggle-card]');
    if (!header) return;
    var clickedIndex = Number(header.getAttribute('data-toggle-card'));
    if (expandedCardIndex === clickedIndex) {
      expandedCardIndex = -1;
    } else {
      expandedCardIndex = clickedIndex;
    }
    var allCards = cards.querySelectorAll('.boiler-card');
    for (var c = 0; c < allCards.length; c++) {
      var card = allCards[c];
      var btn = card.querySelector('.boiler-toggle-btn');
      if (c === expandedCardIndex) {
        card.classList.add('is-expanded');
        if (btn) btn.textContent = '\u2212';
      } else {
        card.classList.remove('is-expanded');
        if (btn) btn.textContent = '+';
      }
    }
  });

  var pageLoader = document.getElementById('boilerPageLoader');

  paginationEl.addEventListener('click', function (event) {
    var button = event.target.closest('button[data-page]');
    if (!button || button.disabled) {
      return;
    }
    var nextPage = Number(button.getAttribute('data-page'));
    if (!nextPage || nextPage === currentPage) {
      return;
    }
    currentPage = nextPage;
    pageLoader.classList.remove('d-none');
    window.scrollTo({ top: wrapper.offsetTop - 120, behavior: 'smooth' });
    setTimeout(function () {
      renderCurrentPage();
      pageLoader.classList.add('d-none');
    }, 300);
  });
  if (retryBtn) {
    retryBtn.addEventListener('click', fetchData);
  }

  fetchData();
})();
</script>
@endpush
