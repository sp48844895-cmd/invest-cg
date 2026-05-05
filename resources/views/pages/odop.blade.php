@extends('layouts.app')

@section('content')
<!-- Hero Banner -->
<section class="sector-hero">
  <img src="assets/img/sectors/odop.jpg" class="hero-video" alt="ODOP - One District One Product">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">One District One Product (ODOP)</h1>
      </div>
    </div>
  </div>
</section>

<!-- Breadcrumb/Tabs Navigation -->
<div class="breadcrumb-nav">
  <div class="container breadcrumb-wrapper">
    <button class="breadcrumb-nav-btn breadcrumb-nav-prev" id="breadcrumbPrev" aria-label="Previous">
      <i class="fa-solid fa-chevron-left"></i>
    </button>
    <div class="breadcrumb-container" id="breadcrumbContainer">
      <a href="{{ route('pages.show', 'dept-of-c-i') }}" class="tab-breadcrumb">Dept of C&I</a>
      <span class="breadcrumb-separator">›</span>
      <a href="#" class="tab-breadcrumb active" data-tab="about-odop">About ODOP</a>
      <span class="breadcrumb-separator">›</span>
      <a href="#" class="tab-breadcrumb" data-tab="products">Products</a>
      <span class="breadcrumb-separator">›</span>
      <a href="#" class="tab-breadcrumb" data-tab="registered-business">Registered Business</a>
    </div>
    <button class="breadcrumb-nav-btn breadcrumb-nav-next" id="breadcrumbNext" aria-label="Next">
      <i class="fa-solid fa-chevron-right"></i>
    </button>
  </div>
</div>

<!-- Tab Content -->
<div class="department-content-area">
  <!-- About ODOP Tab -->
  <div class="tab-panel active" id="about-odop">
    <div class="container">
      <!-- About ODOP Content -->
      <section class="odop-about-section">
        <div class="content-card">
          <h2 class="content-title">About One District - One Product - Chhattisgarh</h2>
          <div class="content-text">
            <p>
              In-line with the hon'ble Prime Minister's vision of Aatma Nirbhar Bharat, numerous initiatives have been undertaken by various ministries of Government of India. One such initiative is the One District One Product (ODOP) initiative spearheaded by the Department for Promotion of Industry and Internal Trade (DPIIT)
            </p>
            <p>
              One District One Product (ODOP) initiative is aimed at fostering balanced regional development across all districts of the country. The initiative aims to select, brand, and promote at least One Product from each District (One District - One Product) of the country for enabling holistic socioeconomic growth across all regions. The ODOP Initiative has identified a total of 1102 products from 761 districts across the country.
            </p>
            <p>
              Under the ODOP initiative, all products have been selected by States/UTs by taking into consideration the existing ecosystem on the ground, products identified under Districts as Export Hubs (DEH), and GI-tagged products.
            </p>
            <p>
              The initiative has been actively collaborating with various Indian Embassies to promote exports and public procurement of ODOP products. Various ODOP products have been delivered to multiple Indian Embassies in Argentina, Nigeria, Croatia, etc.
            </p>
          </div>
        </div>
      </section>

      <!-- Action Buttons -->
      <section class="odop-buttons-section">
        <div class="odop-buttons-grid">
          <a href="https://oneclick.cgstate.gov.in/page/Dashboard" class="odop-action-btn" target="_blank">
            <i class="fa-solid fa-chart-line"></i>
            <span>Dashboard</span>
          </a>
          <a href="#" class="odop-action-btn" data-pdf="Consolidated_List_of_approvals_for_ODOP.pdf" target="_blank">
            <i class="fa-solid fa-list-check"></i>
            <span>Approval List</span>
          </a>
          <a href="#" class="odop-action-btn" data-pdf="Common_facility.pdf" target="_blank">
            <i class="fa-solid fa-building"></i>
            <span>Common Facility Center cum Incubation Center</span>
          </a>
        </div>
      </section>

      <!-- State ODOP Nodal Officers Contact -->
      <section class="odop-contact-section">
        <div class="content-card">
          <h3 class="section-subtitle">State ODOP Nodal Officers Contact</h3>
          <div class="table-responsive">
            <table class="odop-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email Id</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Shiv Kumar Rathor</td>
                  <td><a href="mailto:dtic-directorate.cg@gov.in">dtic-directorate.cg@gov.in</a></td>
                </tr>
                <tr>
                  <td>Smt. Amey Tripathi</td>
                  <td><a href="mailto:dtic-directorate.cg@gov.in">dtic-directorate.cg@gov.in</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- Contact Details Section -->
      <section class="odop-contact-details-section">
        <div class="odop-contact-grid">
          <div class="content-card">
            <h3 class="section-subtitle">Contact Details</h3>
            <div class="table-responsive">
              <table class="odop-table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Mobile No</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Shri Shiv Kumar Rathore</td>
                    <td>Joint Director</td>
                    <td>9424257676</td>
                  </tr>
                  <tr>
                    <td>Shri Amay Tripathi</td>
                    <td>Deputy Director</td>
                    <td>8349389246</td>
                  </tr>
                  <tr>
                    <td>Shreemati Ameshwari Sahu</td>
                    <td>Assistant Director</td>
                    <td>9754432072</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="content-card">
            <h3 class="section-subtitle">Address & Timing</h3>
            <div class="table-responsive">
              <table class="odop-table">
                <thead>
                  <tr>
                    <th>Address</th>
                    <th>Timing</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      Directorate of Industries<br>
                      Ground Floor<br>
                      Udyog Bhawan<br>
                      Ring Road No. 1, Telibandha, Raipur
                    </td>
                    <td>All working Days, During office hours</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <!-- Products Tab -->
  <div class="tab-panel" id="products">
    <div class="container">
      <section class="odop-products-section">
        <div class="content-card">
          <h2 class="content-title">District Wise ODOP Products</h2>
          <div class="table-responsive">
            <table class="odop-products-table">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>District Name</th>
                  <th>Product 1</th>
                  <th>Product 2</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>1</td><td>Balod</td><td>Handloom</td><td></td></tr>
                <tr><td>2</td><td>Baloda Bazar</td><td>Rice based products - Poha, etc</td><td></td></tr>
                <tr><td>3</td><td>Balrampur</td><td>Rice-Jirafuli, Bisni</td><td></td></tr>
                <tr><td>4</td><td>Bastar</td><td>Bell Metal</td><td>Tamarind</td></tr>
                <tr><td>5</td><td>Bemetara</td><td>Papaya based product</td><td></td></tr>
                <tr><td>6</td><td>Bijapur</td><td>Minor forest produce - Tamarind, Mahua</td><td></td></tr>
                <tr><td>7</td><td>Bilaspur</td><td>Black Rice</td><td></td></tr>
                <tr><td>8</td><td>Dantewada</td><td>Minor forest produce - Tamarind</td><td></td></tr>
                <tr><td>9</td><td>Dhamtari</td><td>Rice</td><td></td></tr>
                <tr><td>10</td><td>Durg</td><td>Tomato Based Product</td><td></td></tr>
                <tr><td>11</td><td>Gariaband</td><td>Minor forest produce - Chironji</td><td></td></tr>
                <tr><td>12</td><td>Gourella-Pendra-Marwahi</td><td>Groundnuts</td><td></td></tr>
                <tr><td>13</td><td>Janjgir-Champa</td><td>Kosa</td><td></td></tr>
                <tr><td>14</td><td>Jashpur</td><td>Litchi</td><td></td></tr>
                <tr><td>15</td><td>Kabirdham</td><td>Sugarcane based products- Jaggery, molasses</td><td></td></tr>
                <tr><td>16</td><td>Kanker</td><td>Custard Apple based products</td><td></td></tr>
                <tr><td>17</td><td>Kondagaon</td><td>Bell Metal</td><td>Bastar Craft</td></tr>
                <tr><td>18</td><td>Khairagarh-Chhuikhadan-Gandai</td><td>Soyabean</td><td></td></tr>
                <tr><td>19</td><td>Korba</td><td>Minor forest produce - Mahua</td><td></td></tr>
                <tr><td>20</td><td>Koriya</td><td>Tomato</td><td></td></tr>
                <tr><td>21</td><td>Mahasamund</td><td>Milk based products</td><td></td></tr>
                <tr><td>22</td><td>Manendragarh-Chirmiri Bharatpur</td><td>Tomato</td><td></td></tr>
                <tr><td>23</td><td>Mohla-Manpur- Ambagarh Chowki</td><td>Soyabean</td><td></td></tr>
                <tr><td>24</td><td>Mungeli</td><td>Groundnuts</td><td></td></tr>
                <tr><td>25</td><td>Narayanpur</td><td>Black Gram</td><td></td></tr>
                <tr><td>26</td><td>Raigarh</td><td>Tomato</td><td></td></tr>
                <tr><td>27</td><td>Raipur</td><td>Papaya based product</td><td></td></tr>
                <tr><td>28</td><td>Rajnandgaon</td><td>Soyabean</td><td></td></tr>
                <tr><td>29</td><td>Sarangarh-Bilaigarh</td><td>Tomato</td><td></td></tr>
                <tr><td>30</td><td>Sakti</td><td>Kosa</td><td></td></tr>
                <tr><td>31</td><td>Sukma</td><td>Wooden Craft</td><td>Millet based product</td></tr>
                <tr><td>32</td><td>Surajpur</td><td>Turmeric</td><td>Potato</td></tr>
                <tr><td>33</td><td>Surguja</td><td>Jackfruit</td><td>Potato</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>
  </div>

  <!-- Registered Business Tab -->
  <div class="tab-panel" id="registered-business">
    <div class="container">
      <section class="odop-registered-section">
        <div class="content-card">
          <h2 class="content-title">Registered Business</h2>
          <div class="table-responsive">
            <table class="odop-registered-table">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Subject</th>
                  <th>Published Date</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Common Facility Center</td>
                  <td>07/02/2025</td>
                  <td><a href="#" class="odop-view-btn" data-pdf="Common_facility_center.pdf" target="_blank">View</a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Product Artiston List -2</td>
                  <td>07/02/2025</td>
                  <td><a href="#" class="odop-view-btn" data-pdf="Product_Artiston_List-2.pdf" target="_blank">View</a></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Product Artiston List</td>
                  <td>06/02/2025</td>
                  <td><a href="#" class="odop-view-btn" data-pdf="product-artiston-list.pdf" target="_blank">View</a></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Product Artiston List</td>
                  <td>28/02/2025</td>
                  <td><a href="#" class="odop-view-btn" data-pdf="product-artiston-list-1.pdf" target="_blank">View</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Tab Switching via Breadcrumb
  const tabBreadcrumbs = document.querySelectorAll('.tab-breadcrumb');
  const tabPanels = document.querySelectorAll('.tab-panel');

  tabBreadcrumbs.forEach(breadcrumb => {
    breadcrumb.addEventListener('click', function(e) {
      // Skip if it's the Dept of C&I link
      if (this.getAttribute('href') && this.getAttribute('href') !== '#') {
        return; // Let the link work normally
      }
      
      e.preventDefault();
      const targetTab = this.getAttribute('data-tab');

      // Remove active class from all breadcrumbs and panels
      tabBreadcrumbs.forEach(b => b.classList.remove('active'));
      tabPanels.forEach(p => p.classList.remove('active'));

      // Add active class to clicked breadcrumb and corresponding panel
      this.classList.add('active');
      const targetPanel = document.getElementById(targetTab);
      if (targetPanel) {
        targetPanel.classList.add('active');
      }
    });
  });

  // Breadcrumb Navigation Scroll
  const breadcrumbContainer = document.getElementById('breadcrumbContainer');
  const breadcrumbPrev = document.getElementById('breadcrumbPrev');
  const breadcrumbNext = document.getElementById('breadcrumbNext');

  function updateBreadcrumbButtons() {
    if (breadcrumbContainer) {
      const scrollLeft = breadcrumbContainer.scrollLeft;
      const scrollWidth = breadcrumbContainer.scrollWidth;
      const clientWidth = breadcrumbContainer.clientWidth;

      if (breadcrumbPrev) {
        breadcrumbPrev.style.display = scrollLeft > 0 ? 'flex' : 'none';
      }
      if (breadcrumbNext) {
        breadcrumbNext.style.display = scrollLeft < scrollWidth - clientWidth - 10 ? 'flex' : 'none';
      }
    }
  }

  if (breadcrumbPrev) {
    breadcrumbPrev.addEventListener('click', () => {
      if (breadcrumbContainer) {
        breadcrumbContainer.scrollBy({ left: -200, behavior: 'smooth' });
      }
    });
  }

  if (breadcrumbNext) {
    breadcrumbNext.addEventListener('click', () => {
      if (breadcrumbContainer) {
        breadcrumbContainer.scrollBy({ left: 200, behavior: 'smooth' });
      }
    });
  }

  if (breadcrumbContainer) {
    breadcrumbContainer.addEventListener('scroll', updateBreadcrumbButtons);
    updateBreadcrumbButtons();
  }

  // PDF Links Handler
  const pdfLinks = document.querySelectorAll('[data-pdf]');
  const pdfBaseUrl = '{{ asset("storage/pdfs") }}/';
  pdfLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const pdfPath = this.getAttribute('data-pdf');
      if (pdfPath) {
        window.open(pdfBaseUrl + pdfPath, '_blank');
      }
    });
  });
});
</script>
@endsection

