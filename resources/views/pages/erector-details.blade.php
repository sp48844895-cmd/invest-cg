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

@php($activeBoilerTab = 'erector-details')
@include('partials.boiler-breadcrumb')

<section class="body-content-section">
  <div class="container">
    <div class="body-content-card">
      <div class="body-link-section" style="border-top: none; padding-top: 0; margin-top: 0;">
        <div class="erector-search-bar">
          <div class="erector-search-input-wrap">
            <i class="fa-solid fa-search erector-search-icon"></i>
            <input type="text" id="erectorSearch" class="erector-search-input" placeholder="Search company, district, class...">
          </div>
          <span class="erector-record-count"><strong id="erectorCount">0</strong> records</span>
        </div>

        <div class="d-none">
          <span id="erectorStart">0</span>
          <span id="erectorEnd">0</span>
          <select id="districtFilter">
            <option value="">All Districts</option>
          </select>
        </div>

        <div id="erectorLoading" class="text-center py-5">
          <div class="spinner-border text-primary" role="status" style="width: 2.5rem; height: 2.5rem;">
            <span class="visually-hidden">Loading...</span>
          </div>
          <p class="text-muted mt-3 mb-0" style="font-size: 14px;">Loading erector details...</p>
        </div>

        <div id="erectorError" class="d-none">
          <div class="alert alert-light border text-center py-4">
            <i class="fa-solid fa-exclamation-triangle text-warning mb-2" style="font-size: 24px;"></i>
            <p class="mb-2 fw-semibold">Unable to load erector details</p>
            <p class="text-muted mb-3" style="font-size: 14px;">Please try again later or check your connection.</p>
            <button id="erectorRetry" class="btn btn-sm text-white" style="background: linear-gradient(135deg, #0077ff, #00b8a9);">
              <i class="fa-solid fa-refresh me-1"></i> Retry
            </button>
          </div>
        </div>

        <div id="erectorEmpty" class="d-none">
          <div class="alert alert-light border text-center py-4">
            <i class="fa-solid fa-database text-muted mb-2" style="font-size: 24px;"></i>
            <p class="mb-0 text-muted">No erector records available.</p>
          </div>
        </div>

        <div id="erectorTableWrapper" class="d-none" style="position: relative;">
          <div id="erectorPageLoader" class="erector-page-loader d-none">
            <div class="spinner-border text-primary" role="status" style="width: 2rem; height: 2rem;">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>

          <div id="erectorCards"></div>

          <div id="erectorNoResults" class="alert alert-light border text-center py-4 d-none mt-3">
            <i class="fa-solid fa-search text-muted mb-2" style="font-size: 22px;"></i>
            <p class="mb-0 text-muted">No records matched your search.</p>
          </div>

          <div id="erectorPaginationWrap" class="d-flex justify-content-end mt-3 d-none">
            <nav aria-label="Erector list pagination">
              <ul id="erectorPagination" class="erector-pagination mb-0"></ul>
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
  .erector-search-bar {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 16px;
    padding: 12px 16px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
  }
  .erector-search-input-wrap {
    flex: 1;
    position: relative;
    display: flex;
    align-items: center;
  }
  .erector-search-icon {
    position: absolute;
    left: 0;
    color: #94a3b8;
    font-size: 15px;
  }
  .erector-search-input {
    width: 100%;
    border: none;
    background: transparent;
    outline: none;
    padding-left: 26px;
    font-size: 14px;
    color: #334155;
  }
  .erector-search-input::placeholder {
    color: #94a3b8;
  }
  .erector-record-count {
    white-space: nowrap;
    font-size: 13px;
    color: #64748b;
  }
  .erector-record-count strong {
    color: #475569;
  }
  .erector-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    margin-bottom: 10px;
    overflow: hidden;
    transition: box-shadow 0.2s ease;
  }
  .erector-card:hover {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
  }
  .erector-card-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding: 14px 16px;
    cursor: pointer;
    gap: 12px;
    user-select: none;
  }
  .erector-card-header-left {
    flex: 1;
    min-width: 0;
  }
  .erector-card-header-right {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
  }
  .erector-card-company-name {
    font-weight: 700;
    color: #1e293b;
    font-size: 15px;
    line-height: 1.3;
  }
  .erector-card-class-name {
    font-size: 13px;
    color: #475569;
    font-weight: 500;
    line-height: 1.4;
    margin-top: 2px;
  }
  .erector-card-district-name {
    font-size: 12px;
    color: #94a3b8;
    margin-top: 1px;
  }
  .erector-toggle-btn {
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
  .erector-card-body {
    display: none;
    border-top: 1px solid #e2e8f0;
    padding: 14px 16px 16px;
  }
  .erector-card.is-expanded .erector-card-body {
    display: block;
  }
  .erector-detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px 40px;
  }
  .erector-detail-row {
    display: flex;
    align-items: baseline;
    gap: 8px;
  }
  .erector-detail-label {
    font-size: 13px;
    color: #64748b;
    white-space: nowrap;
    min-width: 110px;
  }
  .erector-detail-value {
    font-size: 13px;
    color: #1e293b;
    font-weight: 600;
    word-break: break-word;
  }
  .erector-validity-row {
    grid-column: 1 / -1;
  }
  .erector-address-row {
    grid-column: 1 / -1;
  }
  .erector-status-badge {
    display: inline-flex;
    align-items: center;
    padding: 3px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
  }
  .erector-status-active {
    background: #ecfdf5;
    color: #059669;
  }
  .erector-status-expiring {
    background: #fffbeb;
    color: #b45309;
  }
  .erector-status-expired {
    background: #fef2f2;
    color: #dc2626;
  }
  .erector-status-other {
    background: #f1f5f9;
    color: #64748b;
  }
  .erector-pagination {
    display: flex;
    align-items: center;
    gap: 8px;
    padding-left: 0;
    list-style: none;
  }
  .erector-page-btn {
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
  .erector-page-btn:hover:not(:disabled) {
    border-color: #0077ff;
    color: #0077ff;
  }
  .erector-page-btn.is-active {
    border-color: transparent;
    background: linear-gradient(135deg, #0077ff, #00b8a9);
    color: #fff;
  }
  .erector-page-btn:disabled {
    opacity: 0.45;
    cursor: not-allowed;
  }
  .erector-page-loader {
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
  .erector-page-loader.d-none {
    display: none !important;
  }
  @media (max-width: 575.98px) {
    .erector-search-bar {
      padding: 10px 12px;
      gap: 12px;
    }
    .erector-detail-grid {
      grid-template-columns: 1fr;
      gap: 8px;
    }
    #erectorPaginationWrap {
      justify-content: center !important;
    }
    .erector-pagination {
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
  var loading = document.getElementById('erectorLoading');
  var error = document.getElementById('erectorError');
  var empty = document.getElementById('erectorEmpty');
  var wrapper = document.getElementById('erectorTableWrapper');
  var cards = document.getElementById('erectorCards');
  var countEl = document.getElementById('erectorCount');
  var startEl = document.getElementById('erectorStart');
  var endEl = document.getElementById('erectorEnd');
  var paginationWrap = document.getElementById('erectorPaginationWrap');
  var paginationEl = document.getElementById('erectorPagination');
  var noResultsEl = document.getElementById('erectorNoResults');
  var searchInput = document.getElementById('erectorSearch');
  var districtFilter = document.getElementById('districtFilter');
  var retryBtn = document.getElementById('erectorRetry');
  var pageLoader = document.getElementById('erectorPageLoader');
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
    var cls = 'erector-status-other';
    if (s === 'active') cls = 'erector-status-active';
    else if (s === 'expiring') cls = 'erector-status-expiring';
    else if (s === 'expired') cls = 'erector-status-expired';
    return '<span class="erector-status-badge ' + cls + '">' + escapeHtml(status || 'N/A') + '</span>';
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
      html += '<div class="erector-card' + (isOpen ? ' is-expanded' : '') + '">'
        + '<div class="erector-card-header" data-toggle-card="' + i + '">'
        + '<div class="erector-card-header-left">'
        + '<div class="erector-card-company-name">' + escapeHtml(d.companyName) + '</div>'
        + '<div class="erector-card-class-name">' + escapeHtml(d.classofErector) + '</div>'
        + '<div class="erector-card-district-name">' + escapeHtml(d.district) + '</div>'
        + '</div>'
        + '<div class="erector-card-header-right">'
        + statusBadge(d.computedStatus)
        + '<span class="erector-toggle-btn">' + (isOpen ? '\u2212' : '+') + '</span>'
        + '</div>'
        + '</div>'
        + '<div class="erector-card-body">'
        + '<div class="erector-detail-grid">'
        + '<div class="erector-detail-row"><span class="erector-detail-label">Class</span><span class="erector-detail-value">' + escapeHtml(d.classofErector) + '</span></div>'
        + '<div class="erector-detail-row"><span class="erector-detail-label">District</span><span class="erector-detail-value">' + escapeHtml(d.district) + '</span></div>'
        + '<div class="erector-detail-row"><span class="erector-detail-label">Contact</span><span class="erector-detail-value">' + escapeHtml(d.contactNumber) + '</span></div>'
        + '<div class="erector-detail-row"><span class="erector-detail-label">Email</span><span class="erector-detail-value">' + escapeHtml(d.emailId) + '</span></div>'
        + '<div class="erector-detail-row"><span class="erector-detail-label">Fee</span><span class="erector-detail-value">' + formatCurrency(d.feeAmount) + '</span></div>'
        + '<div class="erector-detail-row erector-validity-row"><span class="erector-detail-label">Validity</span><span class="erector-detail-value">' + escapeHtml(d.validityFromDate) + ' \u2192 ' + escapeHtml(d.validityToDate) + '</span></div>'
        + '<div class="erector-detail-row erector-address-row"><span class="erector-detail-label">Address</span><span class="erector-detail-value">' + escapeHtml(d.address) + '</span></div>'
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
    html += '<li><button type="button" class="erector-page-btn" data-page="' + (page - 1) + '"' + (page === 1 ? ' disabled' : '') + '>Prev</button></li>';
    pages.forEach(function (p) {
      html += '<li><button type="button" class="erector-page-btn' + (p === page ? ' is-active' : '') + '" data-page="' + p + '">' + p + '</button></li>';
    });
    html += '<li><button type="button" class="erector-page-btn" data-page="' + (page + 1) + '"' + (page === totalPages ? ' disabled' : '') + '>Next</button></li>';
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
      var haystack = [d.companyName, d.address, d.district, d.classofErector, d.contactNumber, d.emailId, d.validityFromDate, d.validityToDate]
        .join(' ')
        .toLowerCase();
      return haystack.indexOf(q) !== -1;
    });
    currentPage = 1;
    renderCurrentPage();
  }

  function fetchData() {
    showState('loading');
    fetch('{{ url("/api/boiler-erector-details") }}')
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
    var allCards = cards.querySelectorAll('.erector-card');
    for (var c = 0; c < allCards.length; c++) {
      var card = allCards[c];
      var btn = card.querySelector('.erector-toggle-btn');
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
