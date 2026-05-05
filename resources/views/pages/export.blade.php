@extends('layouts.app')

@section('content')
    <!-- Hero Banner with Image -->
    <section class="sector-hero">
        <img src="assets/img/sectors/export-banner.jpg" class="hero-video" alt="">
        <div class="hero-gradient-overlay"></div>
        <div class="container">
            <div class="hero-content-wrapper">
                <div class="hero-text">
                    <h1 class="hero-title">Export</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb/Tabs Navigation -->
    <div class="breadcrumb-nav">
        <div class="container breadcrumb-container">
            <a href="#" class="tab-breadcrumb active" data-tab="chhattisgarh-export">Chhattisgarh Export</a>
            <span>›</span>
            <a href="#" class="tab-breadcrumb" data-tab="gi-products">Registered GI Products</a>
            <span>›</span>
            <a href="#" class="tab-breadcrumb" data-tab="facilitation-centres">Export Facilitation Centres</a>
            <span>›</span>
            <a href="#" class="tab-breadcrumb" data-tab="faqs">FAQs on SPS & TBT</a>
            <span>›</span>
            <a href="#" class="tab-breadcrumb" data-tab="niryat-mitra">Niryat Mitra</a>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="export-content-area">
        <!-- Chhattisgarh Export Tab -->
        <div class="tab-panel active" id="chhattisgarh-export">
            <div class="container">
                <!-- Introduction -->
                <section class="export-introduction">
                    <h2 class="content-title">Chhattisgarh Export Overview</h2>
                    <div class="intro-text-block">
                        <p>
                            Chhattisgarh, the <strong>"Rice Bowl of Central India,"</strong> is fast emerging as a major
                            export hub. With rich natural resources, strong industries, and strategic connectivity, the
                            state plays a vital role in India's trade network. Its key exports include iron and steel,
                            aluminium, coal, engineering goods, and rice.
                        </p>
                        <p>
                            Industrial cities like Raipur, Bhilai, and Korba drive mineral-based exports, while agro and
                            forest products such as lac, tendu leaves, and processed foods add diversity. Backed by
                            proactive policies, logistics parks, and digital export centres, Chhattisgarh is building a
                            sustainable, globally competitive trade ecosystem.
                        </p>
                    </div>
                </section>

                <!-- Two Column Layout -->
                <section class="export-data-section">
                    <div class="data-columns">
                        <!-- Left Column: Top Products -->
                        <div class="data-card">
                            <div class="card-header">
                                <h3 class="card-title">Top 10 Exported Products (FY April, 24 To March, 25)</h3>
                                <span class="card-subtitle"></span>
                            </div>
                            <div class="data-table-container">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Commodity Description</th>
                                            <th class="text-right">Value (USD M)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>RICE PARBOILED</td>
                                            <td class="text-right"><strong>101.57</strong></td>
                                        </tr>
                                        <tr>
                                            <td>FERRO-SILICO-MANGANESE</td>
                                            <td class="text-right"><strong>156.24</strong></td>
                                        </tr>
                                        <tr>
                                            <td>OTHR IRON/NON ALOY STEEL IN PRMRY FRMS NES</td>
                                            <td class="text-right"><strong>135.01</strong></td>
                                        </tr>
                                        <tr>
                                            <td>ALUMINIUM INGOTS-NOT ALLOYED</td>
                                            <td class="text-right"><strong>125.95</strong></td>
                                        </tr>
                                        <tr>
                                            <td>BROKEN RICE</td>
                                            <td class="text-right"><strong>123.87</strong></td>
                                        </tr>
                                        <tr>
                                            <td>RICE EXCPTG PARBOILED (EXCL BASMATI RICE)</td>
                                            <td class="text-right"><strong>65.84</strong></td>
                                        </tr>
                                        <tr>
                                            <td>OTHER RAILS</td>
                                            <td class="text-right"><strong>48.02</strong></td>
                                        </tr>
                                        <tr>
                                            <td>SMARTPHONES</td>
                                            <td class="text-right"><strong>47.9</strong></td>
                                        </tr>
                                        <tr>
                                            <td>FERO-MANGANESE,CARBON CONTNG>2% BY WEIGHT</td>
                                            <td class="text-right"><strong>47.67</strong></td>
                                        </tr>
                                        <tr>
                                            <td>OTHR FXD VEG OILS OF EDBLE GRADE</td>
                                            <td class="text-right"><strong>38.46</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Right Column: Top Destinations -->
                        <div class="data-card">
                            <div class="card-header">
                                <h3 class="card-title">Top 10 Export Destinations (Apr-2024 To Mar-2025)</h3>
                           
                            </div>
                            <div class="data-table-container">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th class="text-right">Value (USD M)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="rank"><img src="{{ asset('assets/img/flags/benin.png') }}" width="20"
                                                        alt=""></span> BENIN</td>
                                            <td class="text-right"><strong>242.3</strong></td>
                                        </tr>
                                        <tr>
                                            <td><span class="rank"><img src="{{ asset('assets/img/flags/cote-d-ivoire.png') }}" width="20"
                                                        alt=""></span> COTE D' IVOIRE</td>
                                            <td class="text-right"><strong>150.98</strong></td>
                                        </tr>
                                        <tr>
                                            <td><span class="rank"><img src="{{ asset('assets/img/flags/togo.png') }}" width="20"
                                                        alt=""></span> TOGO</td>
                                            <td class="text-right"><strong>150.53</strong></td>
                                        </tr>
                                        <tr>
                                            <td><span class="rank"><img src="{{ asset('assets/img/flags/italy.png') }}" width="20"
                                                        alt=""></span> ITALY</td>
                                            <td class="text-right"><strong>135.01</strong></td>
                                        </tr>
                                        <tr>
                                            <td><span class="rank"><img src="{{ asset('assets/img/flags/senegal-flag.png') }}" width="20"
                                                        alt=""></span> SENEGAL</td>
                                            <td class="text-right"><strong>96.31</strong></td>
                                        </tr>
                                        <tr>
                                            <td><span class="rank"><img src="{{ asset('assets/img/flags/liberia.png') }}" width="20"
                                                        alt=""></span> LIBERIA</td>
                                            <td class="text-right"><strong>91.54</strong></td>
                                        </tr>
                                        <tr>
                                            <td><span class="rank"><img src="{{ asset('assets/img/flags/guinea.png') }}" width="20"
                                                        alt=""></span> GUINEA</td>
                                            <td class="text-right"><strong>76.96</strong></td>
                                        </tr>
                                        <tr>
                                            <td><span class="rank"><img src="{{ asset('assets/img/flags/sierra-leone.png') }}" width="20"
                                                        alt=""></span> SIERRA LEONE</td>
                                            <td class="text-right"><strong>71.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td><span class="rank"><img src="{{ asset('assets/img/flags/turkey.png') }}" width="20"
                                                        alt=""></span> TURKEY</td>
                                            <td class="text-right"><strong>50.26</strong></td>
                                        </tr>
                                        <tr>
                                            <td><span class="rank"><img src="{{ asset('assets/img/flags/uae.png') }}" width="20"
                                                        alt=""></span> UAE</td>
                                            <td class="text-right"><strong>47.90</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-note">
                                Exports from Chhattisgarh are concentrated highly towards Africa and Asia
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <section class="export-trend-section py-5">
                <div class="container">
                    <h2 class="content-title text-center text-white mb-4">
                        Export Trend from FY 2014–15 to 2024–25
                    </h2>

                    <div class="trend-card bg-white shadow rounded-4 p-4">
                        <div class="chart-container" style="position: relative; height:400px; width:100%;">
                            <canvas id="exportTrendChart"></canvas>
                        </div>

                        <div class="trend-summary mt-4">
                            <p class="text-muted">
                             The export trends for Chhattisgarh reflect strategic expansion interspersed with short-term volatility. Beginning at <strong>US$ 1,182 million in FY 2014–15</strong>, the State's exports have
                                grown to
                                <strong>US$ 2,189 million in FY 2024–25</strong>, reflecting a
                                <span class="growth-badge bg-success text-white px-2 py-1 rounded">85% increase</span>
                                over the period.
                            </p>
                        </div>
                    </div>
                </div>
            </section>



            <div class="container">
                <!-- Resources -->
                <section class="export-resources-section">
                    <h2 class="content-title ">Export Resources & Guidelines</h2>
                    <div class="resources-list">
                        <a href="storage/pdfs/Scheme Literature.pdf" target="_blank" class="resource-link">
                            <span class="resource-text">Export Promotion Scheme</span>
                            <span class="resource-arrow"><img src="assets/img/pdf-icon.png" width="30" alt=""></span>
                        </a>
                        <a href="storage/pdfs/RELIEF Scheme.pdf" target="_blank" class="resource-link">
                            <span class="resource-text">Resilience & Logistics Intervention for Export Facilitation (RELIEF)</span>
                            <span class="resource-arrow"><img src="assets/img/pdf-icon.png" width="30" alt=""></span>
                        </a>
                        <a href="storage/pdfs/Export Guide.pdf" target="_blank" class="resource-link">
                            <span class="resource-text">Chhattisgarh Export Guide</span>
                            <span class="resource-arrow"><img src="assets/img/pdf-icon.png" width="30" alt=""></span>
                        </a>
                        <a href="storage/pdfs/Export Guide - Rice.pdf" target="_blank" class="resource-link">
                            <span class="resource-text">Chhattisgarh Export Guide - Rice</span>
                            <span class="resource-arrow"><img src="assets/img/pdf-icon.png" width="30" alt=""></span>
                        </a>
                        <a href="storage/pdfs/Export Guide_Iron  Steel.pdf" target="_blank" class="resource-link">
                            <span class="resource-text">Chhattisgarh Export Guide - Iron and Steel</span>
                            <span class="resource-arrow"><img src="assets/img/pdf-icon.png" width="30" alt=""></span>
                        </a>
                        <a href="storage/pdfs/NABL accredited Testing & Calibration Labs in Chhattisgarh_v3.pdf"
                            target="_blank" class="resource-link">
                            <span class="resource-text">NABL Accredited Testing Labs in Chhattisgarh</span>
                            <span class="resource-arrow"><img src="assets/img/pdf-icon.png" width="30" alt=""></span>
                        </a>
                        <a href="storage/pdfs/Jan Sunwai Access Guide.pdf" target="_blank" class="resource-link">
                            <span class="resource-text">Jan Sunwai Access Guide</span>
                            <span class="resource-arrow"><img src="assets/img/pdf-icon.png" width="30" alt=""></span>
                        </a>
                        <a href="https://www.dgft.gov.in/CP/?opt=ra-vclinks" target="_blank" class="resource-link ">
                            <span class="resource-text">Jan Sunwai Facility of DGFT</span>
                            <span class="resource-arrow"><i class="fas fa-link"></i></span>
                        </a>
                        <a href="{{ route('pages.show', 'deap') }}" class="resource-link">
                            <span class="resource-text">District Export Action Plan (DEAP)</span>
                            <span class="resource-arrow"><i class="fas fa-link"></i></span>
                        </a>
                    </div>
                </section>
            </div>



        </div>

        <!-- GI Products Tab -->
        <div class="tab-panel" id="gi-products">
            <div class="container">
                <section class="gi-products-section">
                    <h2 class="content-title">Registered GI Products</h2>
                    <p class="section-description">
                        Geographical Indication (GI) is a sign used on products that have a specific geographical origin and
                        possess qualities or a reputation that are due to that origin. Chhattisgarh's rich cultural heritage
                        is reflected in its registered GI products.
                    </p>

                    <div class="gi-products-grid">
                        <!-- GI Product 1 -->
                        <div class="gi-product-card">
                            <div class="gi-badge">
                                <span class="gi-number">01</span>
                            </div>
                            <div class="gi-content">
                                <h3 class="gi-product-name">
                                    <a href="https://search.ipindia.gov.in/GIRPublic/Application/Details/83"
                                        target="_blank">Bastar Dhokra</a>
                                </h3>
                                <div class="gi-meta">
                                    <span class="gi-category"><i class="fa-solid fa-tag"></i> Handicraft</span>
                                    <span class="gi-applicant">Chhattisgarh Hastshilp Vikas Board</span>
                                </div>
                            </div>
                        </div>

                        <!-- GI Product 2 -->
                        <div class="gi-product-card">
                            <div class="gi-badge">
                                <span class="gi-number">02</span>
                            </div>
                            <div class="gi-content">
                                <h3 class="gi-product-name">
                                    <a href="https://search.ipindia.gov.in/GIRPublic/Application/Details/84"
                                        target="_blank">Bastar Wooden Craft</a>
                                </h3>
                                <div class="gi-meta">
                                    <span class="gi-category"><i class="fa-solid fa-tag"></i> Handicraft</span>
                                    <span class="gi-applicant">Chhattisgarh Hastshilp Vikas Board</span>
                                </div>
                            </div>
                        </div>

                        <!-- GI Product 3 -->
                        <div class="gi-product-card">
                            <div class="gi-badge">
                                <span class="gi-number">03</span>
                            </div>
                            <div class="gi-content">
                                <h3 class="gi-product-name">
                                    <a href="https://search.ipindia.gov.in/GIRPublic/Application/Details/82"
                                        target="_blank">Bastar Iron Craft</a>
                                </h3>
                                <div class="gi-meta">
                                    <span class="gi-category"><i class="fa-solid fa-tag"></i> Handicraft</span>
                                    <span class="gi-applicant">Chhattisgarh Hastshilp Vikas Board</span>
                                </div>
                            </div>
                        </div>

                        <!-- GI Product 4 -->
                        <div class="gi-product-card">
                            <div class="gi-badge">
                                <span class="gi-number">04</span>
                            </div>
                            <div class="gi-content">
                                <h3 class="gi-product-name">
                                    <a href="https://search.ipindia.gov.in/GIRPublic/Application/Details/611"
                                        target="_blank">Jeeraphool Rice</a>
                                </h3>
                                <div class="gi-meta">
                                    <span class="gi-category"><i class="fa-solid fa-seedling"></i> Agricultural</span>
                                    <span class="gi-applicant">Jaivik Krishi Utpadak Sahkari Samiti Maryadit</span>
                                </div>
                            </div>
                        </div>

                        <!-- GI Product 5 -->
                        <div class="gi-product-card">
                            <div class="gi-badge">
                                <span class="gi-number">05</span>
                            </div>
                            <div class="gi-content">
                                <h3 class="gi-product-name">
                                    <a href="https://search.ipindia.gov.in/GIRPublic/Application/Details/669"
                                        target="_blank">Nagri Dubraj</a>
                                </h3>
                                <div class="gi-meta">
                                    <span class="gi-category"><i class="fa-solid fa-seedling"></i> Agricultural</span>
                                    <span class="gi-applicant">Maa Durga Swayam Sahayata Samooh</span>
                                </div>
                            </div>
                        </div>

                        <!-- GI Product 6 -->
                        <div class="gi-product-card">
                            <div class="gi-badge">
                                <span class="gi-number">06</span>
                            </div>
                            <div class="gi-content">
                                <h3 class="gi-product-name">
                                    <a href="https://search.ipindia.gov.in/GIRPublic/Application/Details/172"
                                        target="_blank">Champa Silk Saree And Fabrics</a>
                                </h3>
                                <div class="gi-meta">
                                    <span class="gi-category"><i class="fa-solid fa-tag"></i> Handicraft</span>
                                    <span class="gi-applicant">Champa Raigarh Hathkargha Kosa Bunkar Kalyan Samiti</span>
                                </div>
                            </div>
                        </div>

                        <!-- GI Product 7 -->
                        <div class="gi-product-card">
                            <div class="gi-badge">
                                <span class="gi-number">07</span>
                            </div>
                            <div class="gi-content">
                                <h3 class="gi-product-name">
                                    <a href="https://search.ipindia.gov.in/GIRPublic/Application/Details/387"
                                        target="_blank">Bastar Dhokra (Logo)</a>
                                </h3>
                                <div class="gi-meta">
                                    <span class="gi-category"><i class="fa-solid fa-tag"></i> Handicraft</span>
                                    <span class="gi-applicant">Chhattisgarh Hastshilp Vikas Board</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- Facilitation Centres Tab -->
        <div class="tab-panel" id="facilitation-centres">
            <div class="container">
                <section class="facilitation-section">
                    <h2 class="content-title">Export Facilitation Centre</h2>

                    <div class="efc-intro-card">
                        <div class="efc-intro-content">
                            <p>
                                The Export Facilitation Centre (EFC), Chhattisgarh, has been established by the
                                <strong>Indian Institute of Foreign Trade (IIFT), Kolkata</strong> in collaboration with the
                                <strong>Chhattisgarh State Industrial Development Corporation (CSIDC)</strong> and the
                                <strong>Department of Industries & Commerce, Government of Chhattisgarh</strong>. Located at
                                Udyog Bhavan, Raipur, the Centre plays a pivotal role in empowering both budding and
                                prosperous entrepreneurs of the state to thrive in international business.
                            </p>
                            <p>
                                The EFC is committed to enhancing exports from Chhattisgarh by working across promotional,
                                developmental and policy-related fronts. It acts as a frontline support system, helping
                                entrepreneurs realize their dream of becoming successful exporters through handholding,
                                strategic guidance and export-oriented information.
                            </p>
                            <p>
                                This Centre offers comprehensive assistance and counselling to potential exporters on both
                                domestic and international trade practices, contributing significantly to the export growth
                                of the state.
                            </p>
                        </div>
                    </div>

                    <!-- Deliverables -->
                    <div class="deliverables-section">
                        <h3 class="subsection-title">Our Deliverables</h3>
                        <div class="deliverables-grid">
                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-file-lines"></i>
                                </div>
                                <p>Assistance on export procedures</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-handshake"></i>
                                </div>
                                <p>Handholding support for necessary registrations like Trade License, Obtaining IEC Code
                                </p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-barcode"></i>
                                </div>
                                <p>Identification of products in international market through proper 6-digit HS Code</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-globe"></i>
                                </div>
                                <p>Identification of the top five and potential markets for products</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-chart-line"></i>
                                </div>
                                <p>Export trend analysis of the products in the global market</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-scale-balanced"></i>
                                </div>
                                <p>Comparative advantage of the product in the global market</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-shield-halved"></i>
                                </div>
                                <p>Necessary information on tariff obligation and non-tariff barriers faced by exporters</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-clipboard-check"></i>
                                </div>
                                <p>Process of obtaining export orders</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-file-contract"></i>
                                </div>
                                <p>Basic information about the matter of export contract</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-truck"></i>
                                </div>
                                <p>Information on documentations required for shipping & logistics</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-gift"></i>
                                </div>
                                <p>Necessary information on export related schemes, trade fairs, important events</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-sitemap"></i>
                                </div>
                                <p>Development of export plan</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-money-bill-trend-up"></i>
                                </div>
                                <p>Financing export transactions</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-boxes-stacked"></i>
                                </div>
                                <p>Methods of handling orders and shipments</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-industry"></i>
                                </div>
                                <p>Sourcing of input material for exportable product manufacturing</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-ship"></i>
                                </div>
                                <p>Location of freight forwarders</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-credit-card"></i>
                                </div>
                                <p>Procedures of export financing letter of credit</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-building-columns"></i>
                                </div>
                                <p>Customs procedure</p>
                            </div>

                            <div class="deliverable-item">
                                <div class="deliverable-icon">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </div>
                                <p>Tariff and non-tariff obligations, training, trade promotion and personalized mentoring
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="contact-section">
                        <h3 class="subsection-title">Contact Us</h3>
                        <div class="contact-card">
                            <div class="contact-person">
                                <div class="person-icon">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="person-details">
                                    <h4>Pawan Kumar Thakur</h4>
                                    <p>Export Counsellor, Chhattisgarh</p>
                                </div>
                            </div>

                            <div class="contact-info-grid">
                                <div class="contact-item">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <div>
                                        <strong>Address</strong>
                                        <p>Export Facilitation Centre (EFC), Udyog Bhavan, Raipur, Chhattisgarh</p>
                                    </div>
                                </div>

                                <div class="contact-item">
                                    <i class="fa-solid fa-phone"></i>
                                    <div>
                                        <strong>Phone</strong>
                                        <p><a href="tel:+918839395556">+91-88393-95556</a></p>
                                    </div>
                                </div>

                                <div class="contact-item">
                                    <i class="fa-solid fa-envelope"></i>
                                    <div>
                                        <strong>Email</strong>
                                        <p><a href="mailto:efcchhattisgarh@iift.edu">efcchhattisgarh@iift.edu</a></p>
                                    </div>
                                </div>

                                <div class="contact-item">
                                    <i class="fa-solid fa-globe"></i>
                                    <div>
                                        <strong>Website</strong>
                                        <p><a href="https://efccg.cgstate.gov.in/" target="_blank">efccg.cgstate.gov.in</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- FAQs Tab -->
        <div class="tab-panel" id="faqs">
            <div class="container">
                <section class="faqs-section">
                    <h2 class="content-title">Frequently Asked Questions on SPS & TBT</h2>
                    <p class="section-description">
                        Understanding Sanitary and Phytosanitary (SPS) measures and Technical Barriers to Trade (TBT) is
                        essential for successful international trade.
                    </p>

                    <!-- SPS Section -->
                    <div class="faq-category">
                        <h3 class="category-title">
                            <span class="category-badge sps">SPS</span>
                            Sanitary and Phytosanitary Measures
                        </h3>

                        <div class="faq-accordion">
                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>What are SPS measures?</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>SPS measures are regulations or procedures countries use to protect human, animal,
                                        and plant life or health from risks arising from the introduction of pests,
                                        diseases, or contaminants in food and agricultural products.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>What is the main purpose of SPS measures?</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>To ensure food safety and prevent the spread of pests and diseases across borders,
                                        protecting public health and ecosystems.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>Which international body sets guidelines for SPS measures?</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>The World Trade Organization's (WTO) Agreement on the Application of Sanitary and
                                        Phytosanitary Measures provides the framework, supported by specialized
                                        organizations like the Codex Alimentarius Commission (food safety), the
                                        International Plant Protection Convention (IPPC), and the World Organisation for
                                        Animal Health (OIE).</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>How do SPS measures affect international trade?</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>They can restrict trade if countries impose strict health and safety standards, but
                                        they are essential to prevent harmful biological risks.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>Can SPS measures be used as trade barriers?</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>While SPS measures can be misused as disguised protectionism, WTO rules require them
                                        to be based on scientific evidence and risk assessments to prevent unfair barriers.
                                    </p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>What is risk assessment in SPS measures?</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>It's the scientific evaluation of potential health risks posed by food or
                                        agricultural products, which helps determine appropriate SPS standards.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>How can exporters comply with SPS measures?</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>By meeting the importing country's health and safety requirements, obtaining
                                        necessary certifications, and ensuring their products are free from pests, diseases,
                                        and contaminants.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>What types of products are regulated under SPS?</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>Mainly food products, live animals, plants, seeds, and related agricultural inputs
                                        that could pose health risks.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>What happens if a shipment fails SPS inspection?</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>The shipment can be rejected, destroyed, or sent back to the exporting country,
                                        causing economic losses.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>How do SPS measures balance trade facilitation and health protection?</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>By encouraging countries to base their measures on scientific risk assessments and
                                        harmonize standards using international guidelines.</p>
                                </div>
                            </div>
                        </div>
                        </div< /div>

                        <!-- TBT Section -->
                        <div class="faq-category">
                            <h3 class="category-title">
                                <span class="category-badge tbt">TBT</span>
                                Technical Barriers to Trade
                            </h3>

                            <div class="faq-accordion">
                                <div class="faq-item">
                                    <button class="faq-question">
                                        <span>What are TBT measures?</span>
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </button>
                                    <div class="faq-answer">
                                        <p>TBT measures are technical regulations, standards, and conformity assessment
                                            procedures that countries apply to products to ensure safety, quality, and
                                            performance.</p>
                                    </div>
                                </div>

                                <div class="faq-item">
                                    <button class="faq-question">
                                        <span>How are TBT measures different from SPS measures?</span>
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </button>
                                    <div class="faq-answer">
                                        <p>TBT measures focus on product characteristics and technical standards (e.g.,
                                            labeling, packaging), while SPS measures are specifically about protecting
                                            health from biological risks.</p>
                                    </div>
                                </div>

                                <div class="faq-item">
                                    <button class="faq-question">
                                        <span>What types of products are affected by TBT measures?</span>
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </button>
                                    <div class="faq-answer">
                                        <p>Industrial and manufactured goods, electronics, machinery, chemicals, and food
                                            products with technical standards.</p>
                                    </div>
                                </div>

                                <div class="faq-item">
                                    <button class="faq-question">
                                        <span>Why do countries implement TBT measures?</span>
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </button>
                                    <div class="faq-answer">
                                        <p>To protect consumers, ensure product quality, and meet environmental or safety
                                            standards.</p>
                                    </div>
                                </div>

                                <div class="faq-item">
                                    <button class="faq-question">
                                        <span>Can TBT measures act as trade barriers?</span>
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </button>
                                    <div class="faq-answer">
                                        <p>Yes, if they are overly strict, discriminatory, or unnecessary, they can restrict
                                            market access and trade.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>

        <!-- Niryat Mitra Tab -->
        <div class="tab-panel" id="niryat-mitra">
            <div class="container">
                <section class="export-introduction">
                    <h2 class="content-title">Niryat Mitra</h2>
                    <div class="intro-text-block">
                        <p>
                            To ensure efficient facilitation, clear communication, and reduced in-person interactions with
                            existing and prospective exporters, the Department of Commerce and Industry, Government of
                            Chhattisgarh, has introduced a dedicated Video Conference facility. Registered/ prospective
                            exporters across the state can log in via the link below on any working day to consult with
                            experts and discuss their export-related challenges or issues.
                        </p>
                        <p style="margin-top: 20px;">
                            कुशल सुविधा, स्पष्ट संचार सुनिश्चित करने और वर्तमान एवं संभावित निर्यातकों के साथ प्रत्यक्ष
                            संपर्क को कम करने के उद्देश्य से, छत्तीसगढ़ शासन के वाणिज्य एवं उद्योग विभाग ने एक समर्पित
                            वीडियो कॉन्फ्रेंस सुविधा शुरू की है। राज्य भर में पंजीकृत/ संभावित निर्यातक किसी भी कार्य दिवस
                            में नीचे दिए गए लिंक के माध्यम से लॉग-इन कर विशेषज्ञों से परामर्श कर सकते हैं और निर्यात से
                            संबंधित अपनी चुनौतियों या समस्याओं पर चर्चा कर सकते हैं।
                        </p>
                        <div
                            style="background: #f8fafc; padding: 30px; border-radius: 12px; margin-top: 30px; border-left: 4px solid #0077ff;">
                            <p style="margin-bottom: 15px;"><strong>Date:</strong> Any working day</p>
                            <p style="margin-bottom: 20px;"><strong>Time:</strong> 3 PM – 4 PM</p>
                            <a href="https://teams.microsoft.com/dl/launcher/launcher.html?url=%2F_%23%2Fl%2Fmeetup-join%2F19%3Ameeting_NDk3Mjg3YzQtNjc3OS00ZmJlLWE5YmUtMzlkYTc4OWQwMTYy%40thread.v2%2F0%3Fcontext%3D%257b%2522Tid%2522%253a%252236da45f1-dd2c-4d1f-af13-5abe46b99921%2522%252c%2522Oid%2522%253a%252252bda88f-42cc-48b5-ba6a-fa3acc29edc8%2522%257d%26anon%3Dtrue&type=meetup-join&deeplinkId=2abcb2c1-8e06-4a44-b217-5c8ffbd16b0a&directDl=true&msLaunch=true&enableMobilePage=true&suppressPrompt=true"
                                target="_blank" class="btn btn-primary"
                                style="padding: 12px 24px; background: linear-gradient(135deg, #0077ff 0%, #00b8a9 100%); border: none; border-radius: 8px; color: white; text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px; transition: transform 0.2s, box-shadow 0.2s;"
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,119,255,0.3)';"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                <i class="fa-solid fa-video"></i>
                                Join the meeting now
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        // Tab Switching via Breadcrumb
        document.addEventListener('DOMContentLoaded', function () {
            const tabBreadcrumbs = document.querySelectorAll('.tab-breadcrumb');
            const tabPanels = document.querySelectorAll('.tab-panel');

            tabBreadcrumbs.forEach(breadcrumb => {
                breadcrumb.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetTab = this.getAttribute('data-tab');

                    // Remove active class from all breadcrumbs and panels
                    tabBreadcrumbs.forEach(b => b.classList.remove('active'));
                    tabPanels.forEach(p => p.classList.remove('active'));

                    // Add active class to clicked breadcrumb and corresponding panel
                    this.classList.add('active');
                    document.getElementById(targetTab).classList.add('active');

                    // Smooth scroll to top
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            });

            // FAQ Accordion
            const faqQuestions = document.querySelectorAll('.faq-question');

            faqQuestions.forEach(question => {
                question.addEventListener('click', function () {
                    const faqItem = this.parentElement;
                    const isActive = faqItem.classList.contains('active');

                    // Close all FAQ items in the same category
                    const category = this.closest('.faq-accordion');
                    category.querySelectorAll('.faq-item').forEach(item => {
                        item.classList.remove('active');
                    });

                    // Toggle current item
                    if (!isActive) {
                        faqItem.classList.add('active');
                    }
                });
            });
        });
    </script>
@endsection