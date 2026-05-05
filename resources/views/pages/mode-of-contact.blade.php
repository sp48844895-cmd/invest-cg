@extends('layouts.app')

@section('content')
  <!-- Hero Banner -->
  <section class="sector-hero">
    <img src="assets/img/sectors/mode-of-contact.jpg" class="hero-video" alt="Mode of Contract">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
      <div class="hero-content-wrapper">
        <div class="hero-text">
          <h1 class="hero-title">Mode of Contract</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Breadcrumb/Tabs Navigation -->
  <div class="breadcrumb-nav">
    <div class="container breadcrumb-wrapper"> <button class="breadcrumb-nav-btn breadcrumb-nav-prev" id="breadcrumbPrev"
        aria-label="Previous"> <i class="fa-solid fa-chevron-left"></i> </button>
      <div class="breadcrumb-container" id="breadcrumbContainer"> <a href="{{ route('pages.show', 'one-click') }}"
          class="tab-breadcrumb">One Click</a> <span class="breadcrumb-separator">›</span> <a href="#"
          class="tab-breadcrumb active">Mode of Contract</a> </div> <button class="breadcrumb-nav-btn breadcrumb-nav-next"
        id="breadcrumbNext" aria-label="Next"> <i class="fa-solid fa-chevron-right"></i> </button>
    </div>
  </div>
  <section class="mode-of-contact-section">
    <div class="container">
      <div class="content-card">
        <h1 class="content-title">Mode of Contract</h1>
        <p class="content-intro">आवश्यक दस्तावेज़ और फॉर्मेट्स</p>

        <!-- Desktop Table View -->
        <div class="table-responsive d-none d-md-block">
          <table class="mode-contact-table">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Name</th>
                <th>PDF</th>
                <th>Document</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>अनुबंध एवं समझौते के संबंध में आवश्यक दिशा निर्देश</td>
                <td>
                  <a href="{{ asset('storage/user-manuals/ProfileImage_376779.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a>
                </td>
                <td>-</td>
              </tr>
              <tr>
                <td>2</td>
                <td>विक्रय पत्र (कृषि भूमि)</td>
                <td> <a href="{{ asset('storage/user-manuals/ProfileImage_376779.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></td>
                <td><a href="{{ asset('storage/user-manuals/ProfileImage_963681.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></td>
              </tr>
              <tr>
                <td>3</td>
                <td>विक्रय पत्र (भूखण्ड एवं भवन)</td>
                <td> <a href="{{ asset('storage/user-manuals/ProfileImage_101799.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></td>
                <td><a href="{{ asset('storage/user-manuals/ProfileImage_347898.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></td>
              </tr>
              <tr>
                <td>4</td>
                <td>विक्रय पत्र का प्रारूप</td>
                <td> <a href="{{ asset('storage/user-manuals/ProfileImage_950752.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></td>
                <td><a href="{{ asset('storage/user-manuals/ProfileImage_517102.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></td>
              </tr>
              <tr>
                <td>5</td>
                <td>विनिमय का विलेख</td>
                <td> <a href="{{ asset('storage/user-manuals/ProfileImage_115740.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></td>
                <td><a href="{{ asset('storage/user-manuals/ProfileImage_855050.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></td>
              </tr>
              <tr>
                <td>6</td>
                <td>अचल संपत्ति के विक्रय के लिए करार</td>
                <td> <a href="{{ asset('storage/user-manuals/ProfileImage_359456.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></td>
                <td><a href="{{ asset('storage/user-manuals/ProfileImage_132059.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></td>
              </tr>
              <tr>
                <td>7</td>
                <td>भागीदारी विघटन का विलेख</td>
                <td> <a href="{{ asset('storage/user-manuals/ProfileImage_796066.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></td>
                <td><a href="{{ asset('storage/user-manuals/ProfileImage_874632.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></td>
              </tr>
              <tr>
                <td>8</td>
                <td>भागीदारी विलेख</td>
                <td> <a href="{{ asset('storage/user-manuals/ProfileImage_840312.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></td>
                <td><a href="{{ asset('storage/user-manuals/ProfileImage_195713.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></td>
              </tr>
              <tr>
                <td>9</td>
                <td>इच्छा पत्र</td>
                <td> <a href="{{ asset('storage/user-manuals/ProfileImage_129963.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></td>
                <td><a href="{{ asset('storage/user-manuals/ProfileImage_105848.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></td>
              </tr>
              <tr>
                <td>10</td>
                <td>हक विलेखों के निक्षेप का घोषणा पत्र</td>
                <td> <a href="{{ asset('storage/user-manuals/ProfileImage_528910.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></td>
                <td><a href="{{ asset('storage/user-manuals/ProfileImage_438620.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Mobile Card View -->
        <div class="mobile-cards d-md-none">
          <div class="document-card">
            <div class="card-header">
              <span class="serial-badge">1</span>
              <h3>अनुबंध एवं समझौते के संबंध में आवश्यक दिशा निर्देश</h3>
            </div>
            <div class="card-actions">
              <a href="{{ asset('storage/user-manuals/ProfileImage_376779.pdf') }}" target="_blank" class="">
                <img src="{{ asset('assets/img/pdf-icon.png') }}" width="35" alt="">
              </a>
            </div>
          </div>

          <div class="document-card">
            <div class="card-header">
              <span class="serial-badge">2</span>
              <h3>विक्रय पत्र (कृषि भूमि)</h3>
            </div>
            <div class="card-actions">
              <span class="action-item"> <a href="{{ asset('storage/user-manuals/ProfileImage_977938.pdf') }}"
                  target="_blank" class="">
                  <img src="{{ asset('assets/img/pdf-icon.png') }}" width="35" alt="">
                </a></span>
              <span class="action-item"> <a href="{{ asset('storage/user-manuals/ProfileImage_963681.docx') }}"
                  target="_blank" class="">
                  <img src="{{ asset('assets/img/doc-icon.png') }}" width="30" alt="">
                </a></span>


            </div>
          </div>

          <div class="document-card">
            <div class="card-header">
              <span class="serial-badge">3</span>
              <h3>विक्रय पत्र (भूखण्ड एवं भवन)</h3>
            </div>
            <div class="card-actions">
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_101799.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></span>
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_347898.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></span>
            </div>
          </div>

          <div class="document-card">
            <div class="card-header">
              <span class="serial-badge">4</span>
              <h3>विक्रय पत्र का प्रारूप</h3>
            </div>
            <div class="card-actions">
              <span class="action-item">
                <a href="{{ asset('storage/user-manuals/ProfileImage_950752.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></span>
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_517102.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></span>
            </div>
          </div>

          <div class="document-card">
            <div class="card-header">
              <span class="serial-badge">5</span>
              <h3>विनिमय का विलेख</h3>
            </div>
            <div class="card-actions">
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_115740.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></span>
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_855050.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></span>
            </div>
          </div>

          <div class="document-card">
            <div class="card-header">
              <span class="serial-badge">6</span>
              <h3>अचल संपत्ति के विक्रय के लिए करार</h3>
            </div>
            <div class="card-actions">
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_359456.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></span>
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_132059.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></span>
            </div>
          </div>

          <div class="document-card">
            <div class="card-header">
              <span class="serial-badge">7</span>
              <h3>भागीदारी विघटन का विलेख</h3>
            </div>
            <div class="card-actions">
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_796066.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></span>
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_874632.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></span>
            </div>
          </div>

          <div class="document-card">
            <div class="card-header">
              <span class="serial-badge">8</span>
              <h3>भागीदारी विलेख</h3>
            </div>
            <div class="card-actions">
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_840312.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></span>
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_195713.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></span>
            </div>
          </div>

          <div class="document-card">
            <div class="card-header">
              <span class="serial-badge">9</span>
              <h3>इच्छा पत्र</h3>
            </div>
            <div class="card-actions">
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_129963.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></span>
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_105848.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></span>
            </div>
          </div>

          <div class="document-card">
            <div class="card-header">
              <span class="serial-badge">10</span>
              <h3>हक विलेखों के निक्षेप का घोषणा पत्र</h3>
            </div>
            <div class="card-actions">
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_528910.pdf') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/pdf-icon.png') }}" width="40" alt="">
                  </a></span>
              <span class="action-item"><a href="{{ asset('storage/user-manuals/ProfileImage_438620.docx') }}" target="_blank" class="">
                    <img src="{{ asset('assets/img/doc-icon.png') }}" width="35" alt=""></a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script>
    document.addEventListener('DOMContentLoaded', function () {
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
    });
  </script>
@endsection