@extends('layouts.app')

@section('content')
  <!-- Hero Banner -->
  <section class="sector-hero">
    <img src="assets/img/sectors/dept-of-ci-banner.jpg" class="hero-video" alt="Department of Commerce and Industries">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
      <div class="hero-content-wrapper">
        <div class="hero-text">
          <h1 class="hero-title">Department of Commerce & Industries</h1>
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
        <a href="#" class="tab-breadcrumb active" data-tab="overview">Overview</a>
        <span class="breadcrumb-separator">›</span>
        <a href="#" class="tab-breadcrumb" data-tab="contact">Contact Information</a>
      </div>
      <button class="breadcrumb-nav-btn breadcrumb-nav-next" id="breadcrumbNext" aria-label="Next">
        <i class="fa-solid fa-chevron-right"></i>
      </button>
    </div>
  </div>

  <!-- Tab Content -->
  <div class="department-content-area">
    <!-- Overview Tab -->
    <div class="tab-panel active" id="overview">
      <div class="container">
        <!-- Department Introduction -->
        <section class="department-intro">
          <div class="intro-card">
            <h2 class="content-title">Department of Commerce and Industries</h2>
            <div class="intro-text">
              <p>
                The Department of Commerce and Industries, Government of Chhattisgarh is a pivotal body responsible for
                the promotion and development of trade, commerce, and industrial growth within the state of Chhattisgarh,
                India. Established with the aim of enhancing the economic landscape of the state, the department focuses
                on creating a conducive environment for businesses and industries to thrive, thereby contributing to the
                overall prosperity and employment generation for the people of Chhattisgarh. Our five bodies are:
              </p>


              <div class="bodies-grid">
                <a href="{{ route('pages.show', 'directorate-of-industries') }}" class="body-card">
                  <div class="body-icon">
                    <i class="fa-solid fa-industry"></i>
                  </div>
                  <h3 class="body-name">The Directorate of Industries</h3>
                  <span class="body-arrow">→</span>
                </a>

                <a href="{{ route('pages.show', 'state-investment-promotion-board') }}" class="body-card">
                  <div class="body-icon">
                    <i class="fa-solid fa-chart-line"></i>
                  </div>
                  <h3 class="body-name">State Investment Promotion Board</h3>
                  <span class="body-arrow">→</span>
                </a>

                <a href="{{ route('pages.show', 'boiler-inspectorate') }}" class="body-card">
                  <div class="body-icon">
                    <i class="fa-solid fa-fire"></i>
                  </div>
                  <h3 class="body-name">Boiler Inspectorate</h3>
                  <span class="body-arrow">→</span>
                </a>

                <a href="{{ route('pages.show', 'registrar-firms-societies') }}" class="body-card">
                  <div class="body-icon">
                    <i class="fa-solid fa-file-signature"></i>
                  </div>
                  <h3 class="body-name">Registrar, Firms & Societies</h3>
                  <span class="body-arrow">→</span>
                </a>

                <a href="{{ route('pages.show', 'csidc') }}" class="body-card">
                  <div class="body-icon">
                    <i class="fa-solid fa-building"></i>
                  </div>
                  <h3 class="body-name">Chhattisgarh State Industrial Development Corporation</h3>
                  <span class="body-arrow">→</span>
                </a>
              </div>
              <p>
                The department undertakes a variety of initiatives to attract investment, support entrepreneurship, and
                facilitate the establishment and expansion of industrial units. It plays a critical role in policy
                formulation, offering incentives, and providing necessary infrastructure to bolster industrial activities.
                The Department of Commerce and Industries also collaborates with Central Government, other government
                agencies, private sector partners, and national/ international organizations among others, to drive
                sustainable industrial development and elevate Chhattisgarh's position as a competitive and attractive
                destination for industrial and commercial ventures.
              </p>
            </div>
          </div>
        </section>




        <!-- Key Functions -->
        <section class="key-functions-section">
          <h2 class="section-title">Key Functions</h2>
          <div class="functions-grid">
            <div class="function-card">
              <div class="function-card-icon">
                <i class="fa-solid fa-scroll"></i>
              </div>
              <div class="function-card-content">
                <h3 class="function-card-title">Policy Formulation:</h3>
                <p class="function-card-description">Crafting policies that align with the state's vision for industrial
                  growth and economic development.</p>
              </div>
            </div>

            <div class="function-card">
              <div class="function-card-icon">
                <i class="fa-solid fa-hand-holding-dollar"></i>
              </div>
              <div class="function-card-content">
                <h3 class="function-card-title">Investment Promotion:</h3>
                <p class="function-card-description">Encouraging both domestic and foreign investment through
                  investor-friendly policies and initiatives.</p>
              </div>
            </div>

            <div class="function-card">
              <div class="function-card-icon">
                <i class="fa-solid fa-building-columns"></i>
              </div>
              <div class="function-card-content">
                <h3 class="function-card-title">Infrastructure Development:</h3>
                <p class="function-card-description">Establishing industrial areas, parks, and corridors equipped with
                  modern facilities to support industrial activities.</p>
              </div>
            </div>

            <div class="function-card">
              <div class="function-card-icon">
                <i class="fa-solid fa-user-graduate"></i>
              </div>
              <div class="function-card-content">
                <h3 class="function-card-title">Skill Development:</h3>
                <p class="function-card-description">Enhancing the skills of the workforce to meet the demands of various
                  industries through training programs and partnerships with educational institutions.</p>
              </div>
            </div>

            <div class="function-card">
              <div class="function-card-icon">
                <i class="fa-solid fa-clipboard-check"></i>
              </div>
              <div class="function-card-content">
                <h3 class="function-card-title">Regulatory Facilitation:</h3>
                <p class="function-card-description">Simplifying procedures and providing a single-window clearance system
                  to ease the process of setting up and running businesses.</p>
              </div>
            </div>

            <div class="function-card">
              <div class="function-card-icon">
                <i class="fa-solid fa-rocket"></i>
              </div>
              <div class="function-card-content">
                <h3 class="function-card-title">Supporting MSMEs and Startups:</h3>
                <p class="function-card-description">Offering support to Micro, Small, and Medium Enterprises (MSMEs) and
                  startups through various schemes and subsidies to promote entrepreneurship and innovation.</p>
              </div>
            </div>
          </div>

          <div class="key-functions-closing">
            <p class="function-closing-text">
              The Department of Commerce and Industries, Government of Chhattisgarh is committed to fostering a dynamic
              industrial ecosystem that is inclusive, sustainable, and progressive, ensuring that the state continues to
              be a beacon of economic growth and opportunity in the region.
            </p>
          </div>
        </section>
      </div>

      <!-- Important Links Section -->
      <section class="info-shortcuts">
        <div class="info-shortcuts-inner">
          <div class="section-header-modern text-center mb-5">
            <h2 class="section-title-modern">Important Links</h2>
            <p class="section-desc-modern">Quick access to essential resources and information</p>
          </div>
          <div class="shortcut-grid">
            <a class="shortcut-card" href="{{ asset('storage/pdfs/RightInformationact2005.pdf') }}" target="_blank"
              rel="noopener">
              <div class="shortcut-icon"><i class="fa-solid fa-file-lines"></i></div>
              <div class="shortcut-content">
                <span class="shortcut-title">RTI</span>
                <span class="shortcut-desc">View the RTI document (opens in new tab)</span>
              </div>
              <span class="shortcut-arrow">→</span>
            </a>

            <a class="shortcut-card" href="{{ route('pages.show', 'criminal-provision') }}">
              <div class="shortcut-icon"><i class="fa-solid fa-scale-balanced"></i></div>
              <div class="shortcut-content">
                <span class="shortcut-title">Criminal Provision</span>
                <span class="shortcut-desc">Detailed provisions and references</span>
                {{-- <span class="shortcut-badge">View</span> --}}
              </div>
              <span class="shortcut-arrow">→</span>
            </a>

            <a class="shortcut-card" href="{{ route('pages.show', 'ease-of-doing-business') }}">
              <div class="shortcut-icon"><i class="fa-solid fa-handshake-simple"></i></div>
              <div class="shortcut-content">
                <span class="shortcut-title">Ease of Doing Business</span>
                <span class="shortcut-desc">Guidelines, processes, and support</span>
              </div>
              <span class="shortcut-arrow">→</span>
            </a>

            <a class="shortcut-card" href="{{ route('pages.show', 'facilitation-council') }}">
              <div class="shortcut-icon"><i class="fa-solid fa-people-group"></i></div>
              <div class="shortcut-content">
                <span class="shortcut-title">Facilitation Council</span>
                <span class="shortcut-desc">Reach out for MSME facilitation</span>
              </div>
              <span class="shortcut-arrow">→</span>
            </a>

            <a class="shortcut-card" href="{{ route('pages.show', 'odop') }}">
              <div class="shortcut-icon"><i class="fa-solid fa-seedling"></i></div>
              <div class="shortcut-content">
                <span class="shortcut-title">ODOP</span>
                <span class="shortcut-desc">One District One Product initiatives</span>
              </div>
              <span class="shortcut-arrow">→</span>
            </a>
          </div>
        </div>
      </section>
    </div>

    <!-- Contact Information Tab -->
    <div class="tab-panel" id="contact">
      <div class="container">
        <!-- Category Navigation Bar -->
        {{-- <div class="contact-category-nav">
          <div class="category-nav-grid">
            <button class="category-nav-btn" data-category="dept-commerce">
              <i class="fa-solid fa-building"></i>
              <span>Department</span>
            </button>
            <button class="category-nav-btn" data-category="directorate">
              <i class="fa-solid fa-industry"></i>
              <span>Directorate</span>
            </button>
            <button class="category-nav-btn" data-category="sipb">
              <i class="fa-solid fa-chart-line"></i>
              <span>SIPB</span>
            </button>
            <button class="category-nav-btn" data-category="csidc">
              <i class="fa-solid fa-building"></i>
              <span>CSIDC</span>
            </button>
            <button class="category-nav-btn" data-category="boiler">
              <i class="fa-solid fa-fire"></i>
              <span>Boilers</span>
            </button>
            <button class="category-nav-btn" data-category="registrar">
              <i class="fa-solid fa-file-signature"></i>
              <span>Registrar</span>
            </button>

            <button class="category-nav-btn" data-category="investment-commissioner">
              <i class="fa-solid fa-briefcase"></i>
              <span>Investment Commissioner</span>
            </button>
            <button class="category-nav-btn" data-category="dtic">
              <i class="fa-solid fa-map-marked-alt"></i>
              <span>DTIC</span>
            </button>
          </div>
        </div> --}}

        <!-- Contact Information Section -->
        <div class="contact-layout">

          <!-- LEFT: Category Nav -->
          <div class="contact-sidebar">
            <div class="category-nav-grid">
              <button class="category-nav-btn active" data-category="dept-commerce">Department <i
                  class="fa-solid fa-chevron-right"></i></button>
              <button class="category-nav-btn" data-category="directorate">Directorate <i
                  class="fa-solid fa-chevron-right"></i></button>
              <button class="category-nav-btn" data-category="sipb">SIPB <i
                  class="fa-solid fa-chevron-right"></i></button>
              <button class="category-nav-btn" data-category="csidc">CSIDC <i
                  class="fa-solid fa-chevron-right"></i></button>
              <button class="category-nav-btn" data-category="boiler">Boilers <i
                  class="fa-solid fa-chevron-right"></i></button>
              <button class="category-nav-btn" data-category="registrar">Registrar <i
                  class="fa-solid fa-chevron-right"></i></button>
              <button class="category-nav-btn" data-category="investment-commissioner">Investment Commissioner <i
                  class="fa-solid fa-chevron-right"></i></button>
              <button class="category-nav-btn" data-category="dtic">DTIC <i
                  class="fa-solid fa-chevron-right"></i></button>
            </div>
          </div>

          <!-- RIGHT: Cards -->
          <div class="contact-content">
            <!-- Category 1: Department of Commerce and Industries -->
            <div class="contact-category-section" data-category="dept-commerce">
              <div class="contact-cards-grid">
                @foreach($contactPersons['dept-commerce'] ?? [] as $person)
                  <div class="contact-person-card">
                    <div class="person-avatar">
                      @if($person->image)
                        <img src="{{ asset('storage/' . $person->image) }}" alt="{{ $person->name }}">
                      @else
                        <i class="fa-solid fa-user-tie"></i>
                      @endif
                      <h3 class="person-name">{{ $person->name }}</h3>
                    </div>
                    
                    <p class="person-designation">{{ $person->designation }}</p>
                    @if($person->location)
                      <p class="person-district">{{ $person->location }}</p>
                    @endif
                    @if($person->sectors)
                      <p class="person-sectors"><i class="fa-solid fa-tags"></i> {{ $person->sectors }}</p>
                    @endif
                    <div class="person-contact-info">
                      @if($person->email)
                        <a href="mailto:{{ $person->email }}" class="contact-link"><i
                            class="fa-solid fa-envelope"></i><span>{{ $person->email }}</span></a>
                      @endif
                      @if($person->mobile)
                        <a href="tel:{{ $person->mobile }}" class="contact-link"><i
                            class="fa-solid fa-phone"></i><span>{{ $person->mobile }}</span></a>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>


            <!-- Category 2: Directorate of Industries -->
            <div class="contact-category-section" data-category="directorate">
              <div class="contact-cards-grid">
                @foreach($contactPersons['directorate'] ?? [] as $person)
                  <div class="contact-person-card">
                    <div class="person-avatar">
                      @if($person->image)
                        <img src="{{ asset('storage/' . $person->image) }}" alt="{{ $person->name }}">
                      @else
                        <i class="fa-solid fa-user-tie"></i>
                      @endif
                    </div>
                    <h3 class="person-name">{{ $person->name }}</h3>
                    <p class="person-designation">{{ $person->designation }}</p>
                    @if($person->location)
                      <p class="person-district">{{ $person->location }}</p>
                    @endif
                    @if($person->sectors)
                      <p class="person-sectors"><i class="fa-solid fa-tags"></i> {{ $person->sectors }}</p>
                    @endif
                    <div class="person-contact-info">
                      @if($person->email)
                        <a href="mailto:{{ $person->email }}" class="contact-link"><i
                            class="fa-solid fa-envelope"></i><span>{{ $person->email }}</span></a>
                      @endif
                      @if($person->mobile)
                        <a href="tel:{{ $person->mobile }}" class="contact-link"><i
                            class="fa-solid fa-phone"></i><span>{{ $person->mobile }}</span></a>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>


            <!-- Category 3: State Investment Promotion Board -->
            <div class="contact-category-section" data-category="sipb">
              <div class="contact-cards-grid">
                @foreach($contactPersons['sipb'] ?? [] as $person)
                  <div class="contact-person-card">
                    <div class="person-avatar">
                      @if($person->image)
                        <img src="{{ asset('storage/' . $person->image) }}" alt="{{ $person->name }}">
                      @else
                        <i class="fa-solid fa-user-tie"></i>
                      @endif
                    </div>
                    <h3 class="person-name">{{ $person->name }}</h3>
                    <p class="person-designation">{{ $person->designation }}</p>
                    @if($person->location)
                      <p class="person-district">{{ $person->location }}</p>
                    @endif
                    @if($person->sectors)
                      <p class="person-sectors"><i class="fa-solid fa-tags"></i> {{ $person->sectors }}</p>
                    @endif
                    <div class="person-contact-info">
                      @if($person->email)
                        <a href="mailto:{{ $person->email }}" class="contact-link"><i
                            class="fa-solid fa-envelope"></i><span>{{ $person->email }}</span></a>
                      @endif
                      @if($person->mobile)
                        <a href="tel:{{ $person->mobile }}" class="contact-link"><i
                            class="fa-solid fa-phone"></i><span>{{ $person->mobile }}</span></a>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>


            <!-- Category 4: CSIDC -->
            <div class="contact-category-section" data-category="csidc">
              <div class="contact-cards-grid">
                @foreach($contactPersons['csidc'] ?? [] as $person)
                  <div class="contact-person-card">
                    <div class="person-avatar">
                      @if($person->image)
                        <img src="{{ asset('storage/' . $person->image) }}" alt="{{ $person->name }}">
                      @else
                        <i class="fa-solid fa-user-tie"></i>
                      @endif
                    </div>
                    <h3 class="person-name">{{ $person->name }}</h3>
                    <p class="person-designation">{{ $person->designation }}</p>
                    @if($person->location)
                      <p class="person-district">{{ $person->location }}</p>
                    @endif
                    @if($person->sectors)
                      <p class="person-sectors"><i class="fa-solid fa-tags"></i> {{ $person->sectors }}</p>
                    @endif
                    <div class="person-contact-info">
                      @if($person->email)
                        <a href="mailto:{{ $person->email }}" class="contact-link"><i
                            class="fa-solid fa-envelope"></i><span>{{ $person->email }}</span></a>
                      @endif
                      @if($person->mobile)
                        <a href="tel:{{ $person->mobile }}" class="contact-link"><i
                            class="fa-solid fa-phone"></i><span>{{ $person->mobile }}</span></a>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>


            <!-- Category 5: Inspectorate of Boilers -->
            <div class="contact-category-section" data-category="boiler">
              <div class="contact-cards-grid">
                @foreach($contactPersons['boiler'] ?? [] as $person)
                  <div class="contact-person-card">
                    <div class="person-avatar">
                      @if($person->image)
                        <img src="{{ asset('storage/' . $person->image) }}" alt="{{ $person->name }}">
                      @else
                        <i class="fa-solid fa-user-tie"></i>
                      @endif
                    </div>
                    <h3 class="person-name">{{ $person->name }}</h3>
                    <p class="person-designation">{{ $person->designation }}</p>
                    @if($person->location)
                      <p class="person-district">{{ $person->location }}</p>
                    @endif
                    @if($person->sectors)
                      <p class="person-sectors"><i class="fa-solid fa-tags"></i> {{ $person->sectors }}</p>
                    @endif
                    <div class="person-contact-info">
                      @if($person->email)
                        <a href="mailto:{{ $person->email }}" class="contact-link"><i
                            class="fa-solid fa-envelope"></i><span>{{ $person->email }}</span></a>
                      @endif
                      @if($person->mobile)
                        <a href="tel:{{ $person->mobile }}" class="contact-link"><i
                            class="fa-solid fa-phone"></i><span>{{ $person->mobile }}</span></a>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>


            <!-- Category 6: Registrar Firms and Society -->
            <div class="contact-category-section" data-category="registrar">
              <div class="contact-cards-grid">
                @foreach($contactPersons['registrar'] ?? [] as $person)
                  <div class="contact-person-card">
                    <div class="person-avatar">
                      @if($person->image)
                        <img src="{{ asset('storage/' . $person->image) }}" alt="{{ $person->name }}">
                      @else
                        <i class="fa-solid fa-user-tie"></i>
                      @endif
                    </div>
                    <h3 class="person-name">{{ $person->name }}</h3>
                    <p class="person-designation">{{ $person->designation }}</p>
                    @if($person->location)
                      <p class="person-district">{{ $person->location }}</p>
                    @endif
                    @if($person->sectors)
                      <p class="person-sectors"><i class="fa-solid fa-tags"></i> {{ $person->sectors }}</p>
                    @endif
                    <div class="person-contact-info">
                      @if($person->email)
                        <a href="mailto:{{ $person->email }}" class="contact-link"><i
                            class="fa-solid fa-envelope"></i><span>{{ $person->email }}</span></a>
                      @endif
                      @if($person->mobile)
                        <a href="tel:{{ $person->mobile }}" class="contact-link"><i
                            class="fa-solid fa-phone"></i><span>{{ $person->mobile }}</span></a>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <!-- Category 8: Investment Commissioner -->
            <div class="contact-category-section" data-category="investment-commissioner">
              <div class="contact-cards-grid">
                @foreach($contactPersons['investment-commissioner'] ?? [] as $person)
                  <div class="contact-person-card">
                    <div class="person-avatar">
                      @if($person->image)
                        <img src="{{ asset('storage/' . $person->image) }}" alt="{{ $person->name }}">
                      @else
                        <i class="fa-solid fa-user-tie"></i>
                      @endif
                    </div>
                    <h3 class="person-name">{{ $person->name }}</h3>
                    <p class="person-designation">{{ $person->designation }}</p>
                    @if($person->location)
                      <p class="person-district">{{ $person->location }}</p>
                    @endif
                    @if($person->sectors)
                      <p class="person-sectors"><i class="fa-solid fa-tags"></i> {{ $person->sectors }}</p>
                    @endif
                    <div class="person-contact-info">
                      @if($person->email)
                        <a href="mailto:{{ $person->email }}" class="contact-link"><i
                            class="fa-solid fa-envelope"></i><span>{{ $person->email }}</span></a>
                      @endif
                      @if($person->mobile)
                        <a href="tel:{{ $person->mobile }}" class="contact-link"><i
                            class="fa-solid fa-phone"></i><span>{{ $person->mobile }}</span></a>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <!-- Category 7: DTIC -->
            <div class="contact-category-section" data-category="dtic">
              <div class="contact-cards-grid">
                @foreach($contactPersons['dtic'] ?? [] as $person)
                  <div class="contact-person-card">
                    <div class="person-avatar">
                      @if($person->image)
                        <img src="{{ asset('storage/' . $person->image) }}" alt="{{ $person->name }}">
                      @else
                        <i class="fa-solid fa-user-tie"></i>
                      @endif
                    </div>
                    <h3 class="person-name">{{ $person->name }}</h3>
                    <p class="person-designation">{{ $person->designation }}</p>
                    @if($person->location)
                      <p class="person-district">{{ $person->location }}</p>
                    @endif
                    @if($person->sectors)
                      <p class="person-sectors"><i class="fa-solid fa-tags"></i> {{ $person->sectors }}</p>
                    @endif
                    <div class="person-contact-info">
                      @if($person->email)
                        <a href="mailto:{{ $person->email }}" class="contact-link"><i
                            class="fa-solid fa-envelope"></i><span>{{ $person->email }}</span></a>
                      @endif
                      @if($person->mobile)
                        <a href="tel:{{ $person->mobile }}" class="contact-link"><i
                            class="fa-solid fa-phone"></i><span>{{ $person->mobile }}</span></a>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {

        const buttons = document.querySelectorAll(".category-nav-btn");
        const sections = document.querySelectorAll(".contact-category-section");

        // Safety check
        if (!buttons.length || !sections.length) return;

        buttons.forEach((btn) => {
          btn.addEventListener("click", function () {

            const category = this.getAttribute("data-category");

            // 🔹 Remove active from all buttons
            buttons.forEach((b) => b.classList.remove("active"));

            // 🔹 Add active to clicked
            this.classList.add("active");

            // 🔹 Hide all sections
            sections.forEach((section) => {
              section.classList.remove("active");
            });

            // 🔹 Show matching section
            const target = document.querySelector(
              `.contact-category-section[data-category="${category}"]`
            );

            if (target) {
              target.classList.add("active");

            }
          });
        });

        // ✅ Default load (first category auto open)
        buttons[0].classList.add("active");

        const firstCategory = buttons[0].getAttribute("data-category");
        const firstSection = document.querySelector(
          `.contact-category-section[data-category="${firstCategory}"]`
        );

        if (firstSection) {
          firstSection.classList.add("active");
        }

      });

      // Tab Switching Functionality
      document.addEventListener('DOMContentLoaded', function () {
        const tabBreadcrumbs = document.querySelectorAll('.tab-breadcrumb');
        const tabPanels = document.querySelectorAll('.tab-panel');
        const bodyCards = document.querySelectorAll('.body-card');
        const breadcrumbContainer = document.getElementById('breadcrumbContainer');
        const breadcrumbPrev = document.getElementById('breadcrumbPrev');
        const breadcrumbNext = document.getElementById('breadcrumbNext');

        // Function to switch tabs
        function switchTab(targetTab) {
          tabBreadcrumbs.forEach(b => b.classList.remove('active'));
          tabPanels.forEach(p => p.classList.remove('active'));

          const activeBreadcrumb = document.querySelector(`[data-tab="${targetTab}"]`);
          const activePanel = document.getElementById(targetTab);

          if (activeBreadcrumb && activePanel) {
            activeBreadcrumb.classList.add('active');
            activePanel.classList.add('active');

            // Scroll active breadcrumb into view
            setTimeout(() => {
              activeBreadcrumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            }, 100);

            window.scrollTo({ top: 0, behavior: 'smooth' });
          }

          updateBreadcrumbButtons();
        }

        // Breadcrumb navigation functions
        function updateBreadcrumbButtons() {
          if (!breadcrumbContainer) return;

          // Force single row layout
          breadcrumbContainer.style.flexWrap = 'nowrap';
          breadcrumbContainer.style.whiteSpace = 'nowrap';

          // Check if scrolling is needed
          const scrollLeft = breadcrumbContainer.scrollLeft;
          const scrollWidth = breadcrumbContainer.scrollWidth;
          const clientWidth = breadcrumbContainer.clientWidth;
          const needsScroll = scrollWidth > clientWidth + 1; // Add 1px tolerance

          const wrapper = breadcrumbContainer.closest('.breadcrumb-wrapper');

          if (needsScroll) {
            wrapper.classList.add('has-scroll');
            breadcrumbPrev.disabled = scrollLeft <= 1;
            breadcrumbNext.disabled = scrollLeft >= scrollWidth - clientWidth - 1;
          } else {
            wrapper.classList.remove('has-scroll');
            breadcrumbPrev.disabled = true;
            breadcrumbNext.disabled = true;
          }
        }

        function scrollBreadcrumbs(direction) {
          if (!breadcrumbContainer) return;

          const scrollAmount = breadcrumbContainer.clientWidth * 0.6;
          const currentScroll = breadcrumbContainer.scrollLeft;
          const newScroll = direction === 'prev'
            ? Math.max(0, currentScroll - scrollAmount)
            : Math.min(breadcrumbContainer.scrollWidth - breadcrumbContainer.clientWidth, currentScroll + scrollAmount);

          breadcrumbContainer.scrollTo({
            left: newScroll,
            behavior: 'smooth'
          });
        }

        // Breadcrumb scroll event
        if (breadcrumbContainer) {
          breadcrumbContainer.addEventListener('scroll', updateBreadcrumbButtons);
          updateBreadcrumbButtons();
        }

        // Navigation button handlers
        if (breadcrumbPrev) {
          breadcrumbPrev.addEventListener('click', () => scrollBreadcrumbs('prev'));
        }

        if (breadcrumbNext) {
          breadcrumbNext.addEventListener('click', () => scrollBreadcrumbs('next'));
        }

        // Breadcrumb click handler
        tabBreadcrumbs.forEach(breadcrumb => {
          breadcrumb.addEventListener('click', function (e) {
            e.preventDefault();
            const targetTab = this.getAttribute('data-tab');
            switchTab(targetTab);
          });
        });


        // Update buttons on window resize
        window.addEventListener('resize', updateBreadcrumbButtons);

        // Force single row on all breadcrumb items
        if (breadcrumbContainer) {
          const allItems = breadcrumbContainer.querySelectorAll('.tab-breadcrumb, .breadcrumb-separator');
          allItems.forEach(item => {
            item.style.whiteSpace = 'nowrap';
            item.style.flexShrink = '0';
            item.style.display = 'inline-block';
          });
        }

        // Reset scroll position to show first tabs (works for both mobile and desktop)
        function resetScroll() {
          if (breadcrumbContainer) {
            breadcrumbContainer.scrollLeft = 0;
            breadcrumbContainer.style.justifyContent = 'flex-start';
          }
        }

        // Update layout on resize
        function updateLayout() {
          resetScroll();
          updateBreadcrumbButtons();
        }

        // Initial check - run multiple times to ensure layout is correct
        resetScroll();
        requestAnimationFrame(() => {
          resetScroll();
          updateBreadcrumbButtons();
        });
        setTimeout(() => {
          resetScroll();
          updateBreadcrumbButtons();
        }, 50);
        setTimeout(() => {
          resetScroll();
          updateBreadcrumbButtons();
        }, 200);
        setTimeout(() => {
          resetScroll();
          updateBreadcrumbButtons();
        }, 500);
        setTimeout(() => {
          resetScroll();
          updateBreadcrumbButtons();
        }, 1000);

        // Reset on window resize
        window.addEventListener('resize', updateLayout);
      });
    </script>
@endsection