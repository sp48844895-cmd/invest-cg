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

@php($activeBoilerTab = 'boe-list')
@include('partials.boiler-breadcrumb')

<section class="body-content-section">
  <div class="container">
    <div class="body-content-card">
      <div class="body-link-section" style="border-top: none; padding-top: 0; margin-top: 0;">
        <div class="boe-search-bar">
          <div class="boe-search-input-wrap">
            <i class="fa-solid fa-search boe-search-icon"></i>
            <input type="text" id="boeSearch" class="boe-search-input" placeholder="Search BOE name, certificate, email...">
          </div>
          <span class="boe-record-count"><strong id="boeCount">0</strong> records</span>
        </div>

        <div id="boeLoading" class="text-center py-5">
          <div class="spinner-border text-primary" role="status" style="width: 2.5rem; height: 2.5rem;">
            <span class="visually-hidden">Loading...</span>
          </div>
          <p class="text-muted mt-3 mb-0" style="font-size: 14px;">Loading BOE list...</p>
        </div>

        <div id="boeError" class="d-none">
          <div class="alert alert-light border text-center py-4">
            <i class="fa-solid fa-exclamation-triangle text-warning mb-2" style="font-size: 24px;"></i>
            <p class="mb-2 fw-semibold">Unable to load BOE list</p>
            <p class="text-muted mb-3" style="font-size: 14px;">Please try again later or check your connection.</p>
            <button id="boeRetry" class="btn btn-sm text-white" style="background: linear-gradient(135deg, #0077ff, #00b8a9);">
              <i class="fa-solid fa-refresh me-1"></i> Retry
            </button>
          </div>
        </div>

        <div id="boeEmpty" class="d-none">
          <div class="alert alert-light border text-center py-4">
            <i class="fa-solid fa-database text-muted mb-2" style="font-size: 24px;"></i>
            <p class="mb-0 text-muted">No BOE records available.</p>
          </div>
        </div>

        <div id="boeTableWrapper" class="d-none" style="position: relative;">
          <div id="boePageLoader" class="boe-page-loader d-none">
            <div class="spinner-border text-primary" role="status" style="width: 2rem; height: 2rem;">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>

          <div id="boeCards"></div>

          <div id="boeNoResults" class="alert alert-light border text-center py-4 d-none mt-3">
            <i class="fa-solid fa-search text-muted mb-2" style="font-size: 22px;"></i>
            <p class="mb-0 text-muted">No records matched your search.</p>
          </div>

          <div id="boePaginationWrap" class="d-flex justify-content-end mt-3 d-none">
            <nav aria-label="BOE list pagination">
              <ul id="boePagination" class="boe-pagination mb-0"></ul>
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
  .boe-search-bar {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 16px;
    padding: 12px 16px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
  }
  .boe-search-input-wrap {
    flex: 1;
    position: relative;
    display: flex;
    align-items: center;
  }
  .boe-search-icon {
    position: absolute;
    left: 0;
    color: #94a3b8;
    font-size: 15px;
  }
  .boe-search-input {
    width: 100%;
    border: none;
    background: transparent;
    outline: none;
    padding-left: 26px;
    font-size: 14px;
    color: #334155;
  }
  .boe-search-input::placeholder {
    color: #94a3b8;
  }
  .boe-record-count {
    white-space: nowrap;
    font-size: 13px;
    color: #64748b;
  }
  .boe-record-count strong {
    color: #475569;
  }
  .boe-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    margin-bottom: 10px;
    overflow: hidden;
    transition: box-shadow 0.2s ease;
  }
  .boe-card:hover {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
  }
  .boe-card-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding: 14px 16px;
    cursor: pointer;
    gap: 12px;
    user-select: none;
  }
  .boe-card-header-left {
    flex: 1;
    min-width: 0;
  }
  .boe-card-header-right {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
  }
  .boe-card-name {
    font-weight: 700;
    color: #1e293b;
    font-size: 15px;
    line-height: 1.3;
  }
  .boe-card-certificate {
    font-size: 13px;
    color: #475569;
    font-weight: 500;
    line-height: 1.4;
    margin-top: 2px;
  }
  .boe-card-email {
    font-size: 12px;
    color: #94a3b8;
    margin-top: 1px;
  }
  .boe-endorsement-badge {
    display: inline-flex;
    align-items: center;
    padding: 3px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
    background: #f1f5f9;
    color: #475569;
  }
  .boe-toggle-btn {
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
  .boe-card-body {
    display: none;
    border-top: 1px solid #e2e8f0;
    padding: 14px 16px 16px;
  }
  .boe-card.is-expanded .boe-card-body {
    display: block;
  }
  .boe-detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px 40px;
  }
  .boe-detail-row {
    display: flex;
    align-items: baseline;
    gap: 8px;
  }
  .boe-detail-label {
    font-size: 13px;
    color: #64748b;
    white-space: nowrap;
    min-width: 110px;
  }
  .boe-detail-value {
    font-size: 13px;
    color: #1e293b;
    font-weight: 600;
    word-break: break-word;
  }
  .boe-certificate-row {
    grid-column: 1 / -1;
  }
  .boe-pagination {
    display: flex;
    align-items: center;
    gap: 8px;
    padding-left: 0;
    list-style: none;
  }
  .boe-page-btn {
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
  .boe-page-btn:hover:not(:disabled) {
    border-color: #0077ff;
    color: #0077ff;
  }
  .boe-page-btn.is-active {
    border-color: transparent;
    background: linear-gradient(135deg, #0077ff, #00b8a9);
    color: #fff;
  }
  .boe-page-btn:disabled {
    opacity: 0.45;
    cursor: not-allowed;
  }
  .boe-page-loader {
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
  .boe-page-loader.d-none {
    display: none !important;
  }
  @media (max-width: 575.98px) {
    .boe-search-bar {
      padding: 10px 12px;
      gap: 12px;
    }
    .boe-detail-grid {
      grid-template-columns: 1fr;
      gap: 8px;
    }
    #boePaginationWrap {
      justify-content: center !important;
    }
    .boe-pagination {
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
  var loading = document.getElementById('boeLoading');
  var error = document.getElementById('boeError');
  var empty = document.getElementById('boeEmpty');
  var wrapper = document.getElementById('boeTableWrapper');
  var cards = document.getElementById('boeCards');
  var countEl = document.getElementById('boeCount');
  var paginationWrap = document.getElementById('boePaginationWrap');
  var paginationEl = document.getElementById('boePagination');
  var noResultsEl = document.getElementById('boeNoResults');
  var searchInput = document.getElementById('boeSearch');
  var retryBtn = document.getElementById('boeRetry');
  var pageLoader = document.getElementById('boePageLoader');
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
      html += '<div class="boe-card' + (isOpen ? ' is-expanded' : '') + '">'
        + '<div class="boe-card-header" data-toggle-card="' + i + '">'
        + '<div class="boe-card-header-left">'
        + '<div class="boe-card-name">' + escapeHtml(d.boeName) + '</div>'
        + '<div class="boe-card-certificate">' + escapeHtml(d.certificateNumber) + '</div>'
        + '<div class="boe-card-email">' + escapeHtml(d.emailId) + '</div>'
        + '</div>'
        + '<div class="boe-card-header-right">'
        + '<span class="boe-endorsement-badge">Endorsement: ' + escapeHtml(d.endorsementNumber) + '</span>'
        + '<span class="boe-toggle-btn">' + (isOpen ? '\u2212' : '+') + '</span>'
        + '</div>'
        + '</div>'
        + '<div class="boe-card-body">'
        + '<div class="boe-detail-grid">'
        + '<div class="boe-detail-row"><span class="boe-detail-label">BOE Name</span><span class="boe-detail-value">' + escapeHtml(d.boeName) + '</span></div>'
        + '<div class="boe-detail-row"><span class="boe-detail-label">Mobile</span><span class="boe-detail-value">' + escapeHtml(d.mobile) + '</span></div>'
        + '<div class="boe-detail-row"><span class="boe-detail-label">Email</span><span class="boe-detail-value">' + escapeHtml(d.emailId) + '</span></div>'
        + '<div class="boe-detail-row"><span class="boe-detail-label">Endorsement</span><span class="boe-detail-value">' + escapeHtml(d.endorsementNumber) + '</span></div>'
        + '<div class="boe-detail-row boe-certificate-row"><span class="boe-detail-label">Certificate</span><span class="boe-detail-value">' + escapeHtml(d.certificateNumber) + '</span></div>'
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
    html += '<li><button type="button" class="boe-page-btn" data-page="' + (page - 1) + '"' + (page === 1 ? ' disabled' : '') + '>Prev</button></li>';
    pages.forEach(function (p) {
      html += '<li><button type="button" class="boe-page-btn' + (p === page ? ' is-active' : '') + '" data-page="' + p + '">' + p + '</button></li>';
    });
    html += '<li><button type="button" class="boe-page-btn" data-page="' + (page + 1) + '"' + (page === totalPages ? ' disabled' : '') + '>Next</button></li>';
    paginationEl.innerHTML = html;
  }

  function renderCurrentPage() {
    var total = filteredData.length;
    countEl.textContent = total;
    if (total === 0) {
      cards.innerHTML = '';
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
    expandedCardIndex = 0;
    renderCards(pageData);
    renderPagination(totalPages, currentPage);
  }

  function applyFilter() {
    var q = (searchInput.value || '').toLowerCase().trim();
    filteredData = allData.filter(function (d) {
      if (!q) return true;
      var haystack = [d.boeName, d.mobile, d.emailId, d.certificateNumber, d.endorsementNumber]
        .join(' ')
        .toLowerCase();
      return haystack.indexOf(q) !== -1;
    });
    currentPage = 1;
    renderCurrentPage();
  }

  function fetchData() {
    showState('loading');
    fetch('{{ url("/api/boiler-boe-list") }}')
      .then(function (res) { return res.json(); })
      .then(function (json) {
        if (!json.success || !json.data || json.data.length === 0) {
          showState('empty');
          return;
        }
        allData = json.data.slice();
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

  cards.addEventListener('click', function (event) {
    var header = event.target.closest('[data-toggle-card]');
    if (!header) return;
    var clickedIndex = Number(header.getAttribute('data-toggle-card'));
    expandedCardIndex = expandedCardIndex === clickedIndex ? -1 : clickedIndex;
    var allCards = cards.querySelectorAll('.boe-card');
    for (var c = 0; c < allCards.length; c++) {
      var card = allCards[c];
      var btn = card.querySelector('.boe-toggle-btn');
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
