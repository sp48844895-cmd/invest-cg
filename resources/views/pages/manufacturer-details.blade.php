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

@php($activeBoilerTab = 'manufacturer-details')
@include('partials.boiler-breadcrumb')

<section class="body-content-section">
  <div class="container">
    <div class="body-content-card">
      <div class="body-link-section" style="border-top: none; padding-top: 0; margin-top: 0;">
        <div class="manufacturer-search-bar">
          <div class="manufacturer-search-input-wrap">
            <i class="fa-solid fa-search manufacturer-search-icon"></i>
            <input type="text" id="manufacturerSearch" class="manufacturer-search-input" placeholder="Search company, district, class...">
          </div>
          <span class="manufacturer-record-count"><strong id="manufacturerCount">0</strong> records</span>
        </div>

        <div class="d-none">
          <span id="manufacturerStart">0</span>
          <span id="manufacturerEnd">0</span>
          <select id="districtFilter">
            <option value="">All Districts</option>
          </select>
        </div>

        <div id="manufacturerLoading" class="text-center py-5">
          <div class="spinner-border text-primary" role="status" style="width: 2.5rem; height: 2.5rem;">
            <span class="visually-hidden">Loading...</span>
          </div>
          <p class="text-muted mt-3 mb-0" style="font-size: 14px;">Loading manufacturer details...</p>
        </div>

        <div id="manufacturerError" class="d-none">
          <div class="alert alert-light border text-center py-4">
            <i class="fa-solid fa-exclamation-triangle text-warning mb-2" style="font-size: 24px;"></i>
            <p class="mb-2 fw-semibold">Unable to load manufacturer details</p>
            <p class="text-muted mb-3" style="font-size: 14px;">Please try again later or check your connection.</p>
            <button id="manufacturerRetry" class="btn btn-sm text-white" style="background: linear-gradient(135deg, #0077ff, #00b8a9);">
              <i class="fa-solid fa-refresh me-1"></i> Retry
            </button>
          </div>
        </div>

        <div id="manufacturerEmpty" class="d-none">
          <div class="alert alert-light border text-center py-4">
            <i class="fa-solid fa-database text-muted mb-2" style="font-size: 24px;"></i>
            <p class="mb-0 text-muted">No manufacturer records available.</p>
          </div>
        </div>

        <div id="manufacturerTableWrapper" class="d-none" style="position: relative;">
          <div id="manufacturerPageLoader" class="manufacturer-page-loader d-none">
            <div class="spinner-border text-primary" role="status" style="width: 2rem; height: 2rem;">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>

          <div id="manufacturerCards"></div>

          <div id="manufacturerNoResults" class="alert alert-light border text-center py-4 d-none mt-3">
            <i class="fa-solid fa-search text-muted mb-2" style="font-size: 22px;"></i>
            <p class="mb-0 text-muted">No records matched your search.</p>
          </div>

          <div id="manufacturerPaginationWrap" class="d-flex justify-content-end mt-3 d-none">
            <nav aria-label="Manufacturer list pagination">
              <ul id="manufacturerPagination" class="manufacturer-pagination mb-0"></ul>
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
  .manufacturer-search-bar {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 16px;
    padding: 12px 16px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
  }
  .manufacturer-search-input-wrap {
    flex: 1;
    position: relative;
    display: flex;
    align-items: center;
  }
  .manufacturer-search-icon {
    position: absolute;
    left: 0;
    color: #94a3b8;
    font-size: 15px;
  }
  .manufacturer-search-input {
    width: 100%;
    border: none;
    background: transparent;
    outline: none;
    padding-left: 26px;
    font-size: 14px;
    color: #334155;
  }
  .manufacturer-search-input::placeholder {
    color: #94a3b8;
  }
  .manufacturer-record-count {
    white-space: nowrap;
    font-size: 13px;
    color: #64748b;
  }
  .manufacturer-record-count strong {
    color: #475569;
  }
  .manufacturer-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    margin-bottom: 10px;
    overflow: hidden;
    transition: box-shadow 0.2s ease;
  }
  .manufacturer-card:hover {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
  }
  .manufacturer-card-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding: 14px 16px;
    cursor: pointer;
    gap: 12px;
    user-select: none;
  }
  .manufacturer-card-header-left {
    flex: 1;
    min-width: 0;
  }
  .manufacturer-card-header-right {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
  }
  .manufacturer-card-company-name {
    font-weight: 700;
    color: #1e293b;
    font-size: 15px;
    line-height: 1.3;
  }
  .manufacturer-card-class-name {
    font-size: 13px;
    color: #475569;
    font-weight: 500;
    line-height: 1.4;
    margin-top: 2px;
  }
  .manufacturer-card-district-name {
    font-size: 12px;
    color: #94a3b8;
    margin-top: 1px;
  }
  .manufacturer-toggle-btn {
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
  .manufacturer-card-body {
    display: none;
    border-top: 1px solid #e2e8f0;
    padding: 14px 16px 16px;
  }
  .manufacturer-card.is-expanded .manufacturer-card-body {
    display: block;
  }
  .manufacturer-detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px 40px;
  }
  .manufacturer-detail-row {
    display: flex;
    align-items: baseline;
    gap: 8px;
  }
  .manufacturer-detail-label {
    font-size: 13px;
    color: #64748b;
    white-space: nowrap;
    min-width: 110px;
  }
  .manufacturer-detail-value {
    font-size: 13px;
    color: #1e293b;
    font-weight: 600;
    word-break: break-word;
  }
  .manufacturer-validity-row {
    grid-column: 1 / -1;
  }
  .manufacturer-address-row {
    grid-column: 1 / -1;
  }
  .manufacturer-status-badge {
    display: inline-flex;
    align-items: center;
    padding: 3px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
  }
  .manufacturer-status-active {
    background: #ecfdf5;
    color: #059669;
  }
  .manufacturer-status-expiring {
    background: #fffbeb;
    color: #b45309;
  }
  .manufacturer-status-expired {
    background: #fef2f2;
    color: #dc2626;
  }
  .manufacturer-status-other {
    background: #f1f5f9;
    color: #64748b;
  }
  .manufacturer-pagination {
    display: flex;
    align-items: center;
    gap: 8px;
    padding-left: 0;
    list-style: none;
  }
  .manufacturer-page-btn {
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
  .manufacturer-page-btn:hover:not(:disabled) {
    border-color: #0077ff;
    color: #0077ff;
  }
  .manufacturer-page-btn.is-active {
    border-color: transparent;
    background: linear-gradient(135deg, #0077ff, #00b8a9);
    color: #fff;
  }
  .manufacturer-page-btn:disabled {
    opacity: 0.45;
    cursor: not-allowed;
  }
  .manufacturer-page-loader {
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
  .manufacturer-page-loader.d-none {
    display: none !important;
  }
  @media (max-width: 575.98px) {
    .manufacturer-search-bar {
      padding: 10px 12px;
      gap: 12px;
    }
    .manufacturer-detail-grid {
      grid-template-columns: 1fr;
      gap: 8px;
    }
    #manufacturerPaginationWrap {
      justify-content: center !important;
    }
    .manufacturer-pagination {
      gap: 6px;
      flex-wrap: wrap;
      justify-content: center;
    }
  }
</style>
@endsection

@push('scripts')
<script>
(function () {
  var loading = document.getElementById('manufacturerLoading');
  var error = document.getElementById('manufacturerError');
  var empty = document.getElementById('manufacturerEmpty');
  var wrapper = document.getElementById('manufacturerTableWrapper');
  var cards = document.getElementById('manufacturerCards');
  var countEl = document.getElementById('manufacturerCount');
  var startEl = document.getElementById('manufacturerStart');
  var endEl = document.getElementById('manufacturerEnd');
  var paginationWrap = document.getElementById('manufacturerPaginationWrap');
  var paginationEl = document.getElementById('manufacturerPagination');
  var noResultsEl = document.getElementById('manufacturerNoResults');
  var searchInput = document.getElementById('manufacturerSearch');
  var districtFilter = document.getElementById('districtFilter');
  var retryBtn = document.getElementById('manufacturerRetry');
  var pageLoader = document.getElementById('manufacturerPageLoader');
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

  function formatCurrency(val) {
    if (val === null || val === undefined) return '-';
    return '\u20B9' + Number(val).toLocaleString('en-IN');
  }

  function parseDate(value) {
    if (!value || typeof value !== 'string') return null;
    var parts = value.split('-');
    if (parts.length !== 3) return null;
    var day = Number(parts[0]);
    var monthMap = { Jan: 0, Feb: 1, Mar: 2, Apr: 3, May: 4, Jun: 5, Jul: 6, Aug: 7, Sep: 8, Oct: 9, Nov: 10, Dec: 11 };
    var month = monthMap[parts[1]];
    var year = Number(parts[2]);
    if (!day || month === undefined || !year) return null;
    return new Date(year, month, day);
  }

  function getComputedStatus(item) {
    var validToDate = parseDate(item.validityToDate);
    if (!validToDate) return 'N/A';
    var today = new Date();
    today.setHours(0, 0, 0, 0);
    validToDate.setHours(0, 0, 0, 0);
    var diffDays = Math.floor((validToDate.getTime() - today.getTime()) / 86400000);
    if (diffDays < 0) return 'Expired';
    if (diffDays <= 30) return 'Expiring';
    return 'Active';
  }

  function statusBadge(status) {
    var s = (status || '').toLowerCase();
    var cls = 'manufacturer-status-other';
    if (s === 'active') cls = 'manufacturer-status-active';
    else if (s === 'expiring') cls = 'manufacturer-status-expiring';
    else if (s === 'expired') cls = 'manufacturer-status-expired';
    return '<span class="manufacturer-status-badge ' + cls + '">' + escapeHtml(status || 'N/A') + '</span>';
  }

  function populateDistrictFilter(data) {
    var districts = [];
    data.forEach(function (item) {
      var district = (item.district || '').trim();
      if (district && districts.indexOf(district) === -1) districts.push(district);
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

  function renderCards(data) {
    var html = '';
    for (var i = 0; i < data.length; i++) {
      var d = data[i];
      var isOpen = i === expandedCardIndex;
      html += '<div class="manufacturer-card' + (isOpen ? ' is-expanded' : '') + '">'
        + '<div class="manufacturer-card-header" data-toggle-card="' + i + '">'
        + '<div class="manufacturer-card-header-left">'
        + '<div class="manufacturer-card-company-name">' + escapeHtml(d.companyName) + '</div>'
        + '<div class="manufacturer-card-class-name">' + escapeHtml(d.classofManufacture) + '</div>'
        + '<div class="manufacturer-card-district-name">' + escapeHtml(d.district) + '</div>'
        + '</div>'
        + '<div class="manufacturer-card-header-right">'
        + statusBadge(d.computedStatus)
        + '<span class="manufacturer-toggle-btn">' + (isOpen ? '\u2212' : '+') + '</span>'
        + '</div>'
        + '</div>'
        + '<div class="manufacturer-card-body">'
        + '<div class="manufacturer-detail-grid">'
        + '<div class="manufacturer-detail-row"><span class="manufacturer-detail-label">Class</span><span class="manufacturer-detail-value">' + escapeHtml(d.classofManufacture) + '</span></div>'
        + '<div class="manufacturer-detail-row"><span class="manufacturer-detail-label">District</span><span class="manufacturer-detail-value">' + escapeHtml(d.district) + '</span></div>'
        + '<div class="manufacturer-detail-row"><span class="manufacturer-detail-label">Contact</span><span class="manufacturer-detail-value">' + escapeHtml(d.contactNumber) + '</span></div>'
        + '<div class="manufacturer-detail-row"><span class="manufacturer-detail-label">Email</span><span class="manufacturer-detail-value">' + escapeHtml(d.emailId) + '</span></div>'
        + '<div class="manufacturer-detail-row"><span class="manufacturer-detail-label">Fee</span><span class="manufacturer-detail-value">' + formatCurrency(d.feeAmount) + '</span></div>'
        + '<div class="manufacturer-detail-row manufacturer-validity-row"><span class="manufacturer-detail-label">Validity</span><span class="manufacturer-detail-value">' + escapeHtml(d.validityFromDate) + ' \u2192 ' + escapeHtml(d.validityToDate) + '</span></div>'
        + '<div class="manufacturer-detail-row manufacturer-address-row"><span class="manufacturer-detail-label">Address</span><span class="manufacturer-detail-value">' + escapeHtml(d.address) + '</span></div>'
        + '</div>'
        + '</div>'
        + '</div>';
    }
    cards.innerHTML = html;
  }

  function getVisiblePages(totalPages, page) {
    var pages = [];
    var start = Math.max(1, page - 2);
    var end = Math.min(totalPages, page + 2);
    for (var p = start; p <= end; p++) pages.push(p);
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
    html += '<li><button type="button" class="manufacturer-page-btn" data-page="' + (page - 1) + '"' + (page === 1 ? ' disabled' : '') + '>Prev</button></li>';
    pages.forEach(function (p) {
      html += '<li><button type="button" class="manufacturer-page-btn' + (p === page ? ' is-active' : '') + '" data-page="' + p + '">' + p + '</button></li>';
    });
    html += '<li><button type="button" class="manufacturer-page-btn" data-page="' + (page + 1) + '"' + (page === totalPages ? ' disabled' : '') + '>Next</button></li>';
    paginationEl.innerHTML = html;
  }

  function renderCurrentPage() {
    var total = filteredData.length;
    countEl.textContent = total;
    if (total === 0) {
      cards.innerHTML = '';
      startEl.textContent = 0;
      endEl.textContent = 0;
      noResultsEl.classList.remove('d-none');
      paginationWrap.classList.add('d-none');
      return;
    }
    noResultsEl.classList.add('d-none');
    var totalPages = Math.ceil(total / pageSize);
    if (currentPage > totalPages) currentPage = totalPages;
    if (currentPage < 1) currentPage = 1;
    var startIndex = (currentPage - 1) * pageSize;
    var endIndex = Math.min(startIndex + pageSize, total);
    var pageData = filteredData.slice(startIndex, endIndex);
    startEl.textContent = startIndex + 1;
    endEl.textContent = endIndex;
    expandedCardIndex = 0;
    renderCards(pageData);
    renderPagination(totalPages, currentPage);
  }

  function applyFilter() {
    var q = (searchInput.value || '').toLowerCase().trim();
    var districtValue = (districtFilter.value || '').toLowerCase();
    filteredData = allData.filter(function (d) {
      var districtMatches = !districtValue || (d.district || '').toLowerCase() === districtValue;
      if (!districtMatches) return false;
      if (!q) return true;
      var haystack = [d.companyName, d.address, d.district, d.classofManufacture, d.contactNumber, d.emailId, d.validityFromDate, d.validityToDate]
        .join(' ')
        .toLowerCase();
      return haystack.indexOf(q) !== -1;
    });
    currentPage = 1;
    renderCurrentPage();
  }

  function fetchData() {
    showState('loading');
    fetch('{{ url("/api/boiler-manufacturer-details") }}')
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

  searchInput.addEventListener('input', applyFilter);
  districtFilter.addEventListener('change', applyFilter);

  cards.addEventListener('click', function (event) {
    var header = event.target.closest('[data-toggle-card]');
    if (!header) return;
    var clickedIndex = Number(header.getAttribute('data-toggle-card'));
    expandedCardIndex = expandedCardIndex === clickedIndex ? -1 : clickedIndex;
    var allCards = cards.querySelectorAll('.manufacturer-card');
    for (var c = 0; c < allCards.length; c++) {
      var card = allCards[c];
      var btn = card.querySelector('.manufacturer-toggle-btn');
      if (c === expandedCardIndex) {
        card.classList.add('is-expanded');
        if (btn) btn.textContent = '\u2212';
      } else {
        card.classList.remove('is-expanded');
        if (btn) btn.textContent = '+';
      }
    }
  });

  paginationEl.addEventListener('click', function (event) {
    var button = event.target.closest('button[data-page]');
    if (!button || button.disabled) return;
    var nextPage = Number(button.getAttribute('data-page'));
    if (!nextPage || nextPage === currentPage) return;
    currentPage = nextPage;
    pageLoader.classList.remove('d-none');
    window.scrollTo({ top: wrapper.offsetTop - 120, behavior: 'smooth' });
    setTimeout(function () {
      renderCurrentPage();
      pageLoader.classList.add('d-none');
    }, 300);
  });

  retryBtn.addEventListener('click', fetchData);
  fetchData();
})();
</script>
@endpush
