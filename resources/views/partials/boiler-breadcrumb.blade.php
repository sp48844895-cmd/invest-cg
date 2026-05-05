<div class="breadcrumb-nav">
  <div class="container breadcrumb-wrapper">
    <button class="breadcrumb-nav-btn breadcrumb-nav-prev" id="breadcrumbPrev" aria-label="Previous">
      <i class="fa-solid fa-chevron-left"></i>
    </button>
    <div class="breadcrumb-container" id="breadcrumbContainer">
      <a href="{{ url('/dept-of-c-i') }}" class="tab-breadcrumb" data-tab="dept-of-c-i">Dept of C&I, Govt. of CG</a>
      <span class="breadcrumb-separator">›</span>
      <a href="{{ url('/boiler-inspectorate') }}" class="tab-breadcrumb {{ ($activeBoilerTab ?? '') === 'boiler-list' ? 'active' : '' }}" data-tab="boiler-list">Boiler Inspectorate</a>
      <span class="breadcrumb-separator">›</span>
      <a href="{{ url('/boiler-details') }}" class="tab-breadcrumb {{ ($activeBoilerTab ?? '') === 'boiler-details' ? 'active' : '' }}" data-tab="boiler-details">Boiler Details</a>
      <span class="breadcrumb-separator">›</span>
      <a href="{{ url('/erector-details') }}" class="tab-breadcrumb {{ ($activeBoilerTab ?? '') === 'erector-details' ? 'active' : '' }}" data-tab="erector-details">Erector Details</a>
      <span class="breadcrumb-separator">›</span>
      <a href="{{ url('/manufacturer-details') }}" class="tab-breadcrumb {{ ($activeBoilerTab ?? '') === 'manufacturer-details' ? 'active' : '' }}" data-tab="manufacturer-details">Manufacturer Details</a>
      <span class="breadcrumb-separator">›</span>
      <a href="{{ url('/boe-list') }}" class="tab-breadcrumb {{ ($activeBoilerTab ?? '') === 'boe-list' ? 'active' : '' }}" data-tab="boe-list">Boiler Operation Engineer (BOE) List</a>
      <span class="breadcrumb-separator">›</span>
      <a href="#" class="tab-breadcrumb {{ ($activeBoilerTab ?? '') === 'doc-upload' ? 'active' : '' }}" data-tab="doc-upload">Document Upload</a>
    </div>
    <button class="breadcrumb-nav-btn breadcrumb-nav-next" id="breadcrumbNext" aria-label="Next">
      <i class="fa-solid fa-chevron-right"></i>
    </button>
  </div>
</div>
