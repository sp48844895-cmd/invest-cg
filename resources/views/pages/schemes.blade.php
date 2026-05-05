@extends('layouts.app')

@section('content')
  <!-- Hero Banner -->
  <section class="sector-hero">
    <img src="assets/img/sectors/schemes-banner.jpg" class="hero-video" alt="Schemes">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
      <div class="hero-content-wrapper">
        <div class="hero-text">
          <h1 class="hero-title">Schemes</h1>
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
        <a href="#" class="tab-breadcrumb active" data-tab="ramp">RAMP</a>
        <span class="breadcrumb-separator">›</span>
        <a href="#" class="tab-breadcrumb" data-tab="pm-gati-shakti">PM Gati Shakti</a>
        <span class="breadcrumb-separator">›</span>
        <a href="#" class="tab-breadcrumb" data-tab="pmegp">PMEGP</a>
        <span class="breadcrumb-separator">›</span>
        <a href="#" class="tab-breadcrumb" data-tab="pmfme">PMFME</a>
        <span class="breadcrumb-separator">›</span>
        <a href="#" class="tab-breadcrumb" data-tab="pm-vishwakarma">PM Vishwakarma</a>
      </div>
      <button class="breadcrumb-nav-btn breadcrumb-nav-next" id="breadcrumbNext" aria-label="Next">
        <i class="fa-solid fa-chevron-right"></i>
      </button>
    </div>
  </div>

  <!-- Tab Content -->
  <div class="department-content-area">
    <!-- RAMP Tab -->
    <div class="tab-panel active" id="ramp">
      <div class="container">
        <section class="schemes-content-section">
          <div class="content-card">
            <h2 class="content-title">RAMP - Raising and Accelerating MSME Performance</h2>

            <div class="content-text">
              <p>
                "Raising and Accelerating MSME Performance" (RAMP) is a World Bank supported Central Sector Scheme being
                implemented by the Ministry of MSME, Government of India. The Programme aims to increase MSME's access to
                market, technology and credit. The Programme has two Key Result Areas and Six Disbursement Linked
                Indicators as mentioned below:
              </p>
            </div>

            <!-- Key Result Areas -->
            <div class="schemes-section">
              <h3 class="section-subtitle">Key Result Areas</h3>
              <div class="schemes-list">
                <div class="scheme-item">
                  <i class="fa-solid fa-check-circle"></i>
                  <span>Strengthen Institutions and Governance of MSME programmes.</span>
                </div>
                <div class="scheme-item">
                  <i class="fa-solid fa-check-circle"></i>
                  <span>Support to market access, firm capabilities, and access to finance.</span>
                </div>
              </div>
            </div>

            <!-- Disbursement Linked Indicators -->
            <div class="schemes-section">
              <h3 class="section-subtitle">Six Disbursement Linked Indicators</h3>
              <p class="content-text">The achievement of which shall trigger disbursement of funds by the World Bank
                include the following:</p>
              <div class="schemes-list">
                <div class="scheme-item">
                  <i class="fa-solid fa-circle-check"></i>
                  <span>Implementing the National MSME Reform Agenda</span>
                </div>
                <div class="scheme-item">
                  <i class="fa-solid fa-circle-check"></i>
                  <span>Accelerating MSME Sector Centre-State collaboration</span>
                </div>
                <div class="scheme-item">
                  <i class="fa-solid fa-circle-check"></i>
                  <span>Enhancing effectiveness of MSME Champions Scheme</span>
                </div>
                <div class="scheme-item">
                  <i class="fa-solid fa-circle-check"></i>
                  <span>Strengthening Receivable Financing Market for MSMEs</span>
                </div>
                <div class="scheme-item">
                  <i class="fa-solid fa-circle-check"></i>
                  <span>Enhancing Effectiveness of CGTMSE and "Greening and Gender" delivery</span>
                </div>
                <div class="scheme-item">
                  <i class="fa-solid fa-circle-check"></i>
                  <span>Reducing the incidence of delayed payments</span>
                </div>
              </div>
            </div>

            <!-- Sub Schemes -->
            <div class="schemes-section">
              <h3 class="section-subtitle">Sub Schemes under RAMP</h3>
              <p class="content-text">
                The Ministry of MSME has also designed and launched four new sub schemes under the RAMP programme, which
                include:
              </p>
              <div class="sub-schemes-grid">
                <div class="sub-scheme-card">
                  <h4>MSE GIFT</h4>
                  <p>MSE Green Investment and Financing for Transformation</p>
                </div>
                <div class="sub-scheme-card">
                  <h4>MSE SPICE</h4>
                  <p>MSE Scheme for Promotion and Investment in Circular Economy</p>
                </div>
                <div class="sub-scheme-card">
                  <h4>MSE ODR</h4>
                  <p>MSE Scheme on Online Dispute Resolution for Delayed Payments</p>
                </div>
                <div class="sub-scheme-card">
                  <h4>MSME TEAM</h4>
                  <p>MSME Trade Enablement and Marketing Initiative</p>
                </div>
              </div>
              <p class="content-text">
                In addition, under the Centre State engagement, grants were given to the States / UTs for the gap funding
                for selected projects proposed under their Strategic Investment Plans (SIPs).
              </p>
            </div>

            <!-- Strategic Investment Plan -->
            <div class="schemes-section">
              <h3 class="section-subtitle">Strategic Investment Plan – RAMP Chhattisgarh</h3>
              <p class="content-text">
                A diagnostic study of the existing MSME sector was conducted as part of preparation of Strategic
                Investment Plan (SIP) under the RAMP scheme in which consultations and interactions with relevant
                stakeholders like government departments, agencies, industry associations, support institutions,
                individual enterprises etc. A field survey of MSMEs were conducted and about 20 Focussed group discussions
                were also held. Following is a brief on the SIP prepared:
              </p>

              <div class="schemes-highlight-box">
                <p><strong>Chhattisgarh has more than 4.5 lakhs Udyam registered MSMEs</strong> with almost 97% of them
                  belonging to the micro enterprises category. Raipur, Durg and Bilaspur are the districts with
                  significant number of MSMEs accounting to nearly 42% of the total UR MSMEs in the State. Other districts
                  with major MSME concentration include Raigarh, Janjgir-Champa, Rajnandagaon, Korba, Balod bazar,
                  Mahasamund, Surguja and Dhamtari. These 8 districts together account for about 30% of UR MSMEs</p>
              </div>

              <p class="content-text">
                Manufacture of food products (about 18%), Fabrication of metal products, except machinery and equipment
                (9%), manufacture of other non-metallic mineral products (8%), manufacture of furniture (6%), manufacture
                of chemical products (4%) are the major activities in which significant number of Udyam registered
                enterprises are engaged in manufacturing. During the study following major challenges faced by the MSMEs
                were observed:
              </p>
            </div>

            <!-- Challenges -->
            <div class="schemes-section">
              <h3 class="section-subtitle">Major Challenges</h3>

              <div class="challenge-category">
                <h4 class="challenge-title"><i class="fa-solid fa-money-bill-wave"></i> Access to Finance</h4>
                <ul class="challenge-list">
                  <li>Collaterals being asked for availing loans above Rs.10 lakhs</li>
                  <li>Cumbersome loan availing process</li>
                  <li>Experience delays in loan sanctions, and receiving less funding than availed</li>
                  <li>Delayed payments</li>
                  <li>Inadequate awareness on invoice discounting</li>
                  <li>Additional cost associated with availing loans under CGTMSE scheme</li>
                </ul>
              </div>

              <div class="challenge-category">
                <h4 class="challenge-title"><i class="fa-solid fa-store"></i> Access to Market</h4>
                <ul class="challenge-list">
                  <li>Lack of export market information</li>
                  <li>Less utilization of online platforms for marketing.</li>
                  <li>The need for more B2B Connect programmes</li>
                  <li>Strong call from small MSE preference for priority as local suppliers in the public procurements.
                  </li>
                  <li>Inadequate awareness on invoice discounting</li>
                  <li>Need to move up the value chain to explore market opportunities outside State.</li>
                </ul>
              </div>

              <div class="challenge-category">
                <h4 class="challenge-title"><i class="fa-solid fa-venus"></i> Promoting Women Entrepreneurship</h4>
                <p class="content-text">
                  The participation of women entrepreneurs in the organised MSME sector is only 14%, lower than national
                  average of 18%. There are potential sectors like Food processing, Minor Forest produce, handloom &
                  textiles, and handicrafts. were presence of women workforce and entrepreneurs can have a high share.
                </p>
              </div>

              <div class="challenge-category">
                <h4 class="challenge-title"><i class="fa-solid fa-industry"></i> Factor Conditions</h4>
                <ul class="challenge-list">
                  <li>Gap in the demand and supply of workforce with required skills.</li>
                  <li>Need for optimising the courses offered and capacity building of instructors</li>
                  <li>High rate of attrition of workforce in search of better wages</li>
                  <li>Weak linkage of technical institutions in the State with the MSMEs</li>
                  <li>Inadequate value addition of produces within the State</li>
                  <li>Scope for promoting green packaging Industry was identified.</li>
                </ul>
              </div>
            </div>

            <!-- Interventions -->
            <div class="schemes-section">
              <h3 class="section-subtitle">Interventions</h3>
              <p class="content-text">
                Total budget of <strong>Rs.67 crores</strong> has been approved by the Ministry for the interventions
                proposed in the SIP by Chhattisgarh. The interventions approved to address some of the challenges
                identified can be categorised into 5 thematic areas: Capacity enhancement/ Fostering entrepreneurship,
                Sectoral interventions, Access to Market, Access to Finance and Institutional Strengthening. The
                interventions approved are as below:
              </p>

              <div class="table-responsive">
                <table class="schemes-table">
                  <thead>
                    <tr>
                      <th>Sl. No.</th>
                      <th>Intervention</th>
                      <th>Component</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>CG1(A)</td>
                      <td>Comprehensive Entrepreneurship Promotion Initiative (CEPI)</td>
                      <td>Sensitisation programmes, EDP/ESDP, Advanced Training, Exposure visits</td>
                    </tr>
                    <tr>
                      <td>CG1(B)</td>
                      <td>Lady Entrepreneurs Augmentation Programme (LEAP)</td>
                      <td>EDP, Market development programme</td>
                    </tr>
                    <tr>
                      <td>CG2(A)</td>
                      <td>Development of Focus Sectors</td>
                      <td>Sector experts, training, incubation hub</td>
                    </tr>
                    <tr>
                      <td>CG2(B)</td>
                      <td>Green Packaging Industry</td>
                      <td>Enterprise sensitisation</td>
                    </tr>
                    <tr>
                      <td>CG3(A)</td>
                      <td>Export Enhancement</td>
                      <td>Export training, directory, facilitation centre</td>
                    </tr>
                    <tr>
                      <td>CG3(B)</td>
                      <td>GI Product Marketing</td>
                      <td>Branding, marketplace, onboarding bootcamps</td>
                    </tr>
                    <tr>
                      <td>CG3(C)</td>
                      <td>Market Linkage</td>
                      <td>B2B connects, digital literacy, seminars</td>
                    </tr>
                    <tr>
                      <td>CG4</td>
                      <td>Access to Finance</td>
                      <td>Workshops, banker connect, SME onboarding</td>
                    </tr>
                    <tr>
                      <td>CG5(A)</td>
                      <td>MSME Facilitation Centres</td>
                      <td>District-level MFCs</td>
                    </tr>
                    <tr>
                      <td>CG5(B)</td>
                      <td>Official Capacity Building</td>
                      <td>Training for CSIDC, DICs, etc.</td>
                    </tr>
                    <tr>
                      <td>CG5(C)</td>
                      <td>Digital Infrastructure</td>
                      <td>State portals and IT infra for MSME and RAMP monitoring</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Expected Outcome -->
            <div class="schemes-section">
              <h3 class="section-subtitle">Expected Outcome</h3>
              <div class="outcome-grid">
                <div class="outcome-item">
                  <i class="fa-solid fa-chart-line"></i>
                  <span>Balanced regional growth of MSME sector in State</span>
                </div>
                <div class="outcome-item">
                  <i class="fa-solid fa-briefcase"></i>
                  <span>Improved employment generation</span>
                </div>
                <div class="outcome-item">
                  <i class="fa-solid fa-handshake"></i>
                  <span>Better MSME Facilitation</span>
                </div>
                <div class="outcome-item">
                  <i class="fa-solid fa-link"></i>
                  <span>Better market linkages outside the State</span>
                </div>
                <div class="outcome-item">
                  <i class="fa-solid fa-sync"></i>
                  <span>Convergence & uptake of government schemes</span>
                </div>
                <div class="outcome-item">
                  <i class="fa-solid fa-wallet"></i>
                  <span>Improved access to finance</span>
                </div>
              </div>
            </div>

            <!-- MSE Sustainable & Digital Support Schemes -->
            <div class="schemes-section">
              <h3 class="section-subtitle">MSE Sustainable & Digital Support Schemes</h3>

              <!-- MSE GIFT -->
              <div class="sub-scheme-detail-card">
                <h4 class="sub-scheme-detail-title">a. MSE GIFT Scheme</h4>
                <p class="content-text">
                  MSE Green Investment and Financing for Transformation Scheme (MSE GIFT) is a scheme providing support to
                  MSEs for adoption of sustainable and eco-friendly practices and technologies through interest subvention
                  and a risk-sharing facility.
                </p>
                <div class="scheme-highlights">
                  <h5>Highlights:</h5>
                  <ul>
                    <li>Promote sustainable, eco-friendly practices in the MSE sector.</li>
                    <li>Concessional finance with 2% interest subvention and risk sharing facility.</li>
                    <li>Eligible technologies: energy efficiency, renewable energy, clean transportation, resource
                      efficiency, carbon capture, pollution control, etc.</li>
                    <li>Duration: 2023–2026; Target: ₹5,800 crore green credit to 5,800 MSEs.</li>
                    <li>Implementing Agency: Small Industries Development Bank of India (SIDBI).</li>
                    <li>For more information, visit <a href="https://www.green.msme.gov.in"
                        target="_blank">www.green.msme.gov.in</a>.</li>
                  </ul>
                </div>
                <div class="scheme-contact">
                  <p><strong>Contact Details:</strong></p>
                  <p>SIDBI PMU — <a href="mailto:spice_gcfv@sidbi.in">spice_gcfv@sidbi.in</a></p>
                  <p>Telephone: 011-23448398; 011-23448338</p>
                </div>
              </div>

              <!-- MSE SPICE -->
              <div class="sub-scheme-detail-card">
                <h4 class="sub-scheme-detail-title">b. MSE SPICE Scheme</h4>
                <p class="content-text">
                  MSE Scheme for Promotion and Investment in Circular Economy (MSE SPICE) supports existing MSEs to adopt
                  circular economy solutions through a capital subsidy for plant & machinery.
                </p>
                <div class="scheme-highlights">
                  <h5>Highlights:</h5>
                  <ul>
                    <li>Promote circular economy and waste-management projects; incentivize adoption of CE technologies.
                    </li>
                    <li>Enable compliance with Extended Producer Responsibility (EPR) and recycling targets.</li>
                    <li>25% Credit Linked Capital Subsidy (up to ₹12.5 lakh).</li>
                    <li>Eligible sectors: plastics, rubber, e-waste, municipal solid & liquid waste, biogas, lithium-ion
                      battery recycling, scrap metal, solar panel recycling, hazardous industrial waste.</li>
                    <li>Duration: 2024–2027; Target: 3,400 MSEs.</li>
                    <li>Implementing Agency: Small Industries Development Bank of India (SIDBI).</li>
                    <li>For more information, visit <a href="https://www.green.msme.gov.in"
                        target="_blank">www.green.msme.gov.in</a>.</li>
                  </ul>
                </div>
                <div class="scheme-contact">
                  <p><strong>Contact Details:</strong></p>
                  <p>SIDBI PMU — <a href="mailto:spice_gcfv@sidbi.in">spice_gcfv@sidbi.in</a></p>
                  <p>Telephone: 011-23448398; 011-23448338</p>
                </div>
              </div>

              <!-- MSE ODR -->
              <div class="sub-scheme-detail-card">
                <h4 class="sub-scheme-detail-title">c. MSE ODR</h4>
                <p class="content-text">
                  MSE ODR (Online Dispute Resolution for Delayed Payments) covers development, operation and maintenance
                  of an ODR platform, readiness support for MSEFCs and financial assistance to MSEs for legal support
                  related to delayed payments.
                </p>
                <div class="scheme-highlights">
                  <h5>Highlights:</h5>
                  <ul>
                    <li>Develop an ODR platform to address delayed payments for MSMEs.</li>
                    <li>Speedier, cost-effective dispute resolution in local languages.</li>
                    <li>Two stages under MSMED Act: negotiation/mediation and arbitration.</li>
                    <li>Financial assistance to MSMEs for documentation and fees.</li>
                    <li>Duration: 2023–2027.</li>
                    <li>Implementing Agency: National Informatics Centre Services Inc. (NICSI).</li>
                    <li>For more information, visit <a href="https://www.msme.gov.in" target="_blank">www.msme.gov.in</a>.
                    </li>
                  </ul>
                </div>
              </div>

              <!-- MSE TEAM -->
              <div class="sub-scheme-detail-card">
                <h4 class="sub-scheme-detail-title">d. MSE TEAM</h4>
                <p class="content-text">
                  MSE TEAM enables digital empowerment of MSEs — supporting onboarding to e-commerce platforms and ONDC,
                  plus incentives for digital catalogues, AI tools, packaging and logistics.
                </p>
                <div class="scheme-highlights">
                  <h5>Highlights:</h5>
                  <ul>
                    <li>Expand MSME participation in digital commerce via ONDC.</li>
                    <li>Outlay: ₹277.35 crore; Duration: 2024–2027.</li>
                    <li>Implemented by NSIC with ONDC as technical partner.</li>
                    <li>Incentives: onboarding support, catalogue creation, AI-based tools, packaging subsidies, logistics
                      support, digital demand generation.</li>
                    <li>Target: digitally empower 5 lakh MSMEs (50% women-owned).</li>
                    <li>Implementing Agency: National Small Industries Corporation (NSIC).</li>
                    <li>For more information, visit <a href="https://team.msme.gov.in"
                        target="_blank">team.msme.gov.in</a>.</li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- QR Code Section -->
            <div class="schemes-section">
              <div class="qr-code-section">
                <div class="qr-content">
                  <h3 class="section-subtitle">Get Involved</h3>
                  <p class="content-text">
                    Those interested to avail the benefits of the RAMP Scheme through awareness programmes, capacity
                    building programmes, and workshops on market linkage, alternative financing, green packaging, etc. may
                    register on the link below
                  </p>
                  <a href="https://docs.google.com/forms/d/e/1FAIpQLSc19-tFS9e75IDn1ZcIIBY-qlbqAKa6A8vOfRQcdZ_QDpoxcg/viewform?pli=1" target="_blank"
                    style="text-decoration: none; font-size: 1rem; font-weight: 600; color: #0077ff;">
                    <div class="qr-code-box">
                      <div class="qr-placeholder">
                        <img src="assets/img/registration_icon.png" width="100" alt="">
                        RAMP Registration Form
                      </div>
                    </div>
                    </a>
                    <p class="content-text">
                      For any query, you can connect with the District Trade and Industry Centre of the concerned district
                      or the SPIU Team, Udyog Bhawan, Raipur.
                    </p>
                </div>
              </div>
            </div>

          </div>
        </section>
      </div>
    </div>

    <!-- PM Gati Shakti Tab -->
    <div class="tab-panel" id="pm-gati-shakti">
      <div class="container">
        <section class="schemes-content-section">
          <div class="content-card">
            <h2 class="content-title">PM Gati Shakti</h2>

            <div class="content-text">
              <p>
                PM Gati Shakti is a transformative initiative for economic growth and sustainable development, uniting
                Ministries, and States through a digital platform. It enables integrated planning, coordinated
                infrastructure implementation, and seamless multi-modal connectivity, with a focus on last-mile
                connectivity.
              </p>
              <p>
                The CG State Master Plan portal is set to streamline approvals and NoCs, reducing delays and ensuring
                smooth execution while optimizing costs. By expediting decision-making and implementation, it will
                significantly reduce project timelines and promote ease of doing business by simplifying compliance,
                enhancing logistics, and attracting investments.
              </p>
            </div>

            <!-- Progress Section -->
            <div class="schemes-section">
              <!-- External Links Buttons -->
              <div style="display: flex; gap: 20px; margin-bottom: 40px; flex-wrap: wrap;">
                <a href="https://cggis.cgstate.gov.in/geocg/" target="_blank" class="btn btn-primary"
                  style="padding: 12px 24px; background: linear-gradient(135deg, #0077ff 0%, #00b8a9 100%); border: none; border-radius: 8px; color: white; text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px; transition: transform 0.2s, box-shadow 0.2s;"
                  onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,119,255,0.3)';"
                  onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                  <i class="fa-solid fa-external-link"></i>
                  CG Geo Portal
                </a>
                <a href="https://pmgatishakti.gov.in/pmgatishakti/login" target="_blank" class="btn btn-primary"
                  style="padding: 12px 24px; background: linear-gradient(135deg, #0077ff 0%, #00b8a9 100%); border: none; border-radius: 8px; color: white; text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px; transition: transform 0.2s, box-shadow 0.2s;"
                  onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,119,255,0.3)';"
                  onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                  <i class="fa-solid fa-external-link"></i>
                  PM Gati Shakti State Master Plan
                </a>
              </div>

              <h3 class="section-subtitle">Chhattisgarh's Progress</h3>

              <div class="progress-highlights">
                <div class="highlight-card">
                  <div class="highlight-icon">
                    <i class="fa-solid fa-layer-group"></i>
                  </div>
                  <div class="highlight-content">
                    <h3 class="highlight-number">27/30</h3>
                    <p class="highlight-text">Mandatory Layers Mapped</p>
                  </div>
                </div>

                <div class="highlight-card">
                  <div class="highlight-icon">
                    <i class="fa-solid fa-map"></i>
                  </div>
                  <div class="highlight-content">
                    <h3 class="highlight-number">511/569</h3>
                    <p class="highlight-text">Additional Layers Mapped</p>
                  </div>
                </div>

                <div class="highlight-card">
                  <div class="highlight-icon">
                    <i class="fa-solid fa-tools"></i>
                  </div>
                  <div class="highlight-content">
                    <h3 class="highlight-number">23</h3>
                    <p class="highlight-text">Planning Tools Developed</p>
                  </div>
                </div>
              </div>

              <!-- Charts Section -->
              <div class="charts-section">
                <!-- Mandatory Layers Chart -->
                <div class="chart-card">
                  <div class="chart-header">
                    <h3 class="chart-title">Fully + Partially Mapped Layers by State</h3>
                  </div>
                  <div class="chart-container">
                    <canvas id="mandatoryLayersChart"></canvas>
                  </div>
                </div>

                <!-- Additional Layers Chart -->
                <div class="chart-card">
                  <div class="chart-header">
                    <h3 class="chart-title">Additional Layers Identified by State</h3>
                  </div>
                  <div class="chart-container">
                    <canvas id="additionalLayersChart"></canvas>
                  </div>
                </div>

                <!-- Tools Developed Chart -->
                <div class="chart-card">
                  <div class="chart-header">
                    <h3 class="chart-title">Planning Tools Developed by State</h3>
                  </div>
                  <div class="chart-container">
                    <canvas id="toolsChart"></canvas>
                  </div>
                </div>
              </div>
            </div>


            <!-- Use Cases Section -->
            <div class="schemes-section">
              <h3 class="section-subtitle">Identification of Use Cases and Compendium</h3>

              <div class="use-cases-grid">
                <div class="use-case-card">
                  <div class="use-case-icon">
                    <i class="fa-solid fa-lightbulb"></i>
                  </div>
                  <div class="use-case-content">
                        <a href="storage/pdfs/Compendium of Suggested Use cases of Chhattisgarh.pdf"  style="text-decoration: none" target="_blank">
                    <h4 class="use-case-title">Suggested Use Cases <img src="assets/img/pdf-icon.png" width="20" alt=""></h4>
                    <p class="use-case-description">
                      A list of suggested use cases has been identified and shared with stakeholder departments for
                      reference to develop their own use cases and potential implementation via the PM Gati Shakti SMP
                      portal.
                    </p>
                
         
                    </a>
                  </div>
                </div>

                <div class="use-case-card">
                  <div class="use-case-icon">
                    <i class="fa-solid fa-book"></i>
                  </div>
                  <div class="use-case-content">
                    <a href="storage/pdfs/Compendium of Developed Use cases of Chhattisgarh.pdf" style="text-decoration: none" target="_blank" >
                 
                    <h4 class="use-case-title">Use Cases Compendium <img src="assets/img/pdf-icon.png" width="20" alt=""></h4>
                    <p class="use-case-description">
                      A compendium of developed use cases has been circulated to guide departments in utilizing the PM
                      Gati Shakti SMP portal for integrated, GIS-based planning.
                    </p>
           
        
                    </a>
                  </div>
                </div>

                <div class="use-case-card">
                  <div class="use-case-icon">
                    <i class="fa-solid fa-map-marked-alt"></i>
                  </div>
                  <div class="use-case-content">
                               <a href="storage/pdfs/SOP of Mandatory & Additional Geospatial layers of Chhattisgarh v2.pdf"  style="text-decoration: none" target="_blank">
                    <h4 class="use-case-title">GIS-Based Planning Guide        <img src="assets/img/pdf-icon.png" width="20" alt=""></h4>
                    <p class="use-case-description">
                      A compendium of developed use cases has been circulated to guide departments in utilizing the PM
                      Gati Shakti SMP portal for integrated, GIS-based planning.
                    </p>
         
              
           
                    </a>
                  </div>
                </div>
              </div>
            </div>

          
            <!-- Meeting Notice Section -->
            <div class="schemes-section">
              <h3 class="section-subtitle">Meeting Notice</h3>

              @php
                $meetingNotices = [
                  'egos' => [
                    'label' => 'Empowered Group of Secretaries (EGoS)',
                    'dates' => [
                      '10-Jun-25',
                      '31-Jan-23',
                      '16-Dec-22',
                      '17-Nov-22',
                      '06-Oct-22',
                      '28-Jun-22',
                      '07-Jun-22',
                    ],
                  ],
                  'tsu' => [
                    'label' => 'Technical Support Unit (TSU)',
                    'dates' => [
                      '28-Jul-25',
                      '09-May-25',                
                    ],
                  ],
                  'npg' => [
                    'label' => 'Network Planning Group (NPG)',
                    'dates' => [
                      '08-Sep-25',
                      '13-Sep-23',
                      '22-Jul-25',
                    ],
                  ],
                ];
              @endphp

              <div class="row g-3 mt-3">
                @foreach ($meetingNotices as $key => $group)
                  <div class="col-12 col-lg-4">
                    <details class="meeting-notice-dd">
                      <summary class="meeting-notice-btn">
                        {{ $group['label'] }}
                        <span class="meeting-notice-caret" aria-hidden="true"></span>
                      </summary>
                      <div class="meeting-notice-menu">
                        @foreach ($group['dates'] as $date)
                          @php
                            $pdfName = str_replace([' ', '/'], ['-', '-'], $date) . '.pdf';
                            $pdfUrl = asset('storage/pdfs/pm-gati-shakti/meeting-notice/' . $key . '/' . $pdfName);
                          @endphp
                          <a class="meeting-notice-item" href="{{ $pdfUrl }}" download>
                            {{ $date }}
                          </a>
                        @endforeach
                      </div>
                    </details>
                  </div>
                @endforeach
              </div>
            </div>
<!-- contact us -->
            <div class="schemes-section">
              <h3 class="section-subtitle">Contact Us</h3>

              <div class="row g-3">
                <div class="col-12 col-md-4 col-lg-4">
                  <div class="scheme-item">                
                    <span>
                      <i class="fa-solid fa-user"></i> Maushmee Raha<br>
                      <i class="fa-solid fa-briefcase"></i> Deputy Director<br>
                      <i class="fa-solid fa-mobile"></i> 8109632620<br>
                      <i class="fa-solid fa-envelope"></i> mausamee.raha92@gmail.com
                    </span>
                  </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                  <div class="scheme-item">
              
                    <span>
                      <i class="fa-solid fa-user"></i> Sheetal Verma<br>
                      <i class="fa-solid fa-briefcase"></i> Manager (PMU, PMGS Team)<br>
                      <i class="fa-solid fa-mobile"></i> 9669044401<br>
                      <i class="fa-solid fa-envelope"></i> sheeverma@deloitte.com
                    </span>
                  </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                  <div class="scheme-item">
                 
                    <span>
                      <i class="fa-solid fa-user"></i> Anubhuti Shreya<br>
                      <i class="fa-solid fa-briefcase"></i> Consultant (PMU, PMGS Team)<br>
                      <i class="fa-solid fa-mobile"></i> 7276677919<br>
                      <i class="fa-solid fa-envelope"></i> anushreya@deloitte.com
                    </span>
                  </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                  <div class="scheme-item">
              
                    <span>
                      <i class="fa-solid fa-user"></i> Priya Sharma<br>
                      <i class="fa-solid fa-briefcase"></i> Consultant (PMU, PMGS Team)<br>
                      <i class="fa-solid fa-mobile"></i> 8965050957<br>
                      <i class="fa-solid fa-envelope"></i> priyasharma.ext@deloitte.com
                    </span>
                  </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                  <div class="scheme-item">
                   
                    <span>
                      <i class="fa-solid fa-user"></i> Alok Sharma<br>
                      <i class="fa-solid fa-briefcase"></i> Consultant (PMU, PMGS Team)<br>
                      <i class="fa-solid fa-mobile"></i> 9755591776<br>
                      <i class="fa-solid fa-envelope"></i> aloksharma.ext@deloitte.com
                    </span>
                  </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                  <div class="scheme-item">
              
                    <span>
                      <i class="fa-solid fa-user"></i> Rakesh Ahiwar<br>
                      <i class="fa-solid fa-briefcase"></i> Consultant (PMU, PMGS Team)<br>
                      <i class="fa-solid fa-mobile"></i> 8517064017<br>
                      <i class="fa-solid fa-envelope"></i> rakahirwar.ext@deloitte.com
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- PMEGP Tab -->
    <div class="tab-panel" id="pmegp">
      <div class="container">
        <section class="schemes-content-section">
          <div class="content-card">
            <h2 class="content-title">PMEGP - Prime Minister's Employment Generation Programme</h2>

            <div class="content-text">
              <h3 class="section-subtitle">Objectives:</h3>
              <div class="schemes-list">
                <div class="scheme-item">
                  <i class="fa-solid fa-check-circle"></i>
                  <span>To generate employment opportunities in rural as well as urban areas of the country through
                    setting up of new self-employment ventures/projects/micro enterprises.</span>
                </div>
                <div class="scheme-item">
                  <i class="fa-solid fa-check-circle"></i>
                  <span>To bring together widely dispersed traditional artisans/ rural and urban unemployed youth and give
                    them self-employment opportunities to the extent possible, at their place.</span>
                </div>
                <div class="scheme-item">
                  <i class="fa-solid fa-check-circle"></i>
                  <span>To provide continuous and sustainable employment to a large segment of traditional and prospective
                    artisans and rural and urban unemployed youth in the country, so as to help arrest migration of rural
                    youth to urban areas.</span>
                </div>
                <div class="scheme-item">
                  <i class="fa-solid fa-check-circle"></i>
                  <span>To increase the wage-earning capacity of workers and artisans and contribute to increase in the
                    growth rate of rural and urban employment.</span>
                </div>
              </div>

              <div class="scheme-link-section">
                <a href="https://www.kviconline.gov.in/pmegpeportal/pmegphome/index.jsp" target="_blank"
                  class="scheme-link-btn">
                  <i class="fa-solid fa-external-link"></i>
                  <span>Click here to know about this scheme</span>
                </a>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- PMFME Tab -->
    <div class="tab-panel" id="pmfme">
      <div class="container">
        <section class="schemes-content-section">
          <div class="content-card">
            <h2 class="content-title">PMFME - Pradhan Mantri Formalisation of Micro Food Processing Enterprises</h2>

            <div class="content-text">
              <p>
                This scheme enhances the competitiveness of micro-enterprises in the unorganized segment of the food
                processing industry and promote formalization of the sector and Supports Farmer Producer Organizations
                (FPOs), Self Help Groups (SHGs) and Producers Cooperatives along their entire value chain.
              </p>

              <div class="scheme-link-section">
                <a href="https://www.pmfme.org/" target="_blank" class="scheme-link-btn">
                  <i class="fa-solid fa-external-link"></i>
                  <span>Click here to know about this scheme</span>
                </a>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- PM Vishwakarma Tab -->
    <div class="tab-panel" id="pm-vishwakarma">
      <div class="container">
        <section class="schemes-content-section">
          <div class="content-card">
            <h2 class="content-title">PM Vishwakarma</h2>

            <div class="content-text">
              <p>
                PM Vishwakarma is a Central Sector Scheme launched by Ministry of Micro, Small and Medium Enterprises to
                provide holistic and end-to-end support to artisans and craftspeople through access to collateral free
                credit, skill training, modern tools, incentive for digital transactions and market linkage support.
              </p>

              <div class="scheme-link-section">
                <a href="https://pmvishwakarma.gov.in/" target="_blank" class="scheme-link-btn">
                  <i class="fa-solid fa-external-link"></i>
                  <span>Click here to know about this scheme</span>
                </a>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- Add Chart.js Library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Tab Switching via Breadcrumb
      const tabBreadcrumbs = document.querySelectorAll('.tab-breadcrumb');
      const tabPanels = document.querySelectorAll('.tab-panel');

      // Store chart instances
      window.chartInstances = window.chartInstances || {};

      // Function to initialize charts (only when PM Gati Shakti tab is active)
      function initializeCharts() {
        const pmGatiShaktiTab = document.getElementById('pm-gati-shakti');
        if (!pmGatiShaktiTab || !pmGatiShaktiTab.classList.contains('active')) {
          return;
        }

        // Destroy existing charts if they exist
        if (window.chartInstances.mandatoryLayersChart) {
          window.chartInstances.mandatoryLayersChart.destroy();
        }
        if (window.chartInstances.additionalLayersChart) {
          window.chartInstances.additionalLayersChart.destroy();
        }
        if (window.chartInstances.toolsChart) {
          window.chartInstances.toolsChart.destroy();
        }

        // Common chart options
        const commonOptions = {
          responsive: true,
          maintainAspectRatio: false,
          indexAxis: 'y',
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              backgroundColor: 'rgba(15, 23, 42, 0.9)',
              padding: 12,
              titleFont: {
                size: 14,
                weight: '600'
              },
              bodyFont: {
                size: 13
              },
              borderColor: 'rgba(0, 119, 255, 0.3)',
              borderWidth: 1,
              cornerRadius: 8
            }
          },
          scales: {
            x: {
              beginAtZero: true,
              grid: {
                display: false
              },
              ticks: {
                font: {
                  size: 11,
                  weight: '500'
                },
                color: '#64748b'
              }
            },
            y: {
              grid: {
                color: 'rgba(0, 0, 0, 0.05)',
                drawBorder: false
              },
              ticks: {
                font: {
                  size: 11,
                  weight: '500'
                },
                color: '#64748b'
              }
            }
          }
        };

        // Chart 1: Mandatory Layers
        const ctx1 = document.getElementById('mandatoryLayersChart');
        if (ctx1) {
          const gradient1 = ctx1.getContext('2d').createLinearGradient(0, 0, 0, 400);
          gradient1.addColorStop(0, 'rgba(0, 119, 255, 0.8)');
          gradient1.addColorStop(1, 'rgba(0, 184, 169, 0.8)');

          window.chartInstances.mandatoryLayersChart = new Chart(ctx1, {
            type: 'bar',
            data: {
              labels: ['MH', 'Goa', 'Guj', 'TN', 'Karnataka', 'MP', 'CG', 'AP', 'Kerala', 'RJ'],
              datasets: [{
                label: 'Layers Mapped',
                data: [30, 30, 30, 30, 30, 29, 27, 28, 25, 23],
                backgroundColor: gradient1,
                borderRadius: 8,
                borderSkipped: false,
                maxBarThickness: 14
              }]
            },
            options: {
              ...commonOptions,
              plugins: {
                ...commonOptions.plugins,
                tooltip: {
                  ...commonOptions.plugins.tooltip,
                  callbacks: {
                    label: function (context) {
                      return 'Layers Mapped: ' + context.parsed.y + '/30';
                    }
                  }
                }
              }
            }
          });
        }

        // Chart 2: Additional Layers
        const ctx2 = document.getElementById('additionalLayersChart');
        if (ctx2) {
          const gradient2 = ctx2.getContext('2d').createLinearGradient(0, 0, 0, 400);
          gradient2.addColorStop(0, 'rgba(0, 184, 169, 0.8)');
          gradient2.addColorStop(1, 'rgba(0, 119, 255, 0.8)');

          window.chartInstances.additionalLayersChart = new Chart(ctx2, {
            type: 'bar',
            data: {
              labels: ['Guj', 'MP', 'CG', 'MH', 'AP', 'Goa', 'Karnataka', 'Kerala', 'RJ'],
              datasets: [{
                label: 'Additional Layers',
                data: [1570, 664, 511, 282, 271, 146, 116, 16, 11],
                backgroundColor: gradient2,
                borderRadius: 8,
                borderSkipped: false,
                maxBarThickness: 14
              }]
            },
            options: {
              ...commonOptions,
              plugins: {
                ...commonOptions.plugins,
                tooltip: {
                  ...commonOptions.plugins.tooltip,
                  callbacks: {
                    label: function (context) {
                      return 'Additional Layers: ' + context.parsed.y;
                    }
                  }
                }
              }
            }
          });
        }

        // Chart 3: Tools Developed
        const ctx3 = document.getElementById('toolsChart');
        if (ctx3) {
          const gradient3 = ctx3.getContext('2d').createLinearGradient(0, 0, 0, 400);
          gradient3.addColorStop(0, 'rgba(0, 119, 255, 0.8)');
          gradient3.addColorStop(1, 'rgba(0, 184, 169, 0.8)');

          window.chartInstances.toolsChart = new Chart(ctx3, {
            type: 'bar',
            data: {
              labels: ['Guj', 'CG', 'MP', 'MH', 'Goa', 'RJ'],
              datasets: [{
                label: 'Tools Developed',
                data: [28, 23, 20, 2, 1, 2],
                backgroundColor: gradient3,
                borderRadius: 8,
                borderSkipped: false,
                maxBarThickness: 14
              }]
            },
            options: {
              ...commonOptions,
              plugins: {
                ...commonOptions.plugins,
                tooltip: {
                  ...commonOptions.plugins.tooltip,
                  callbacks: {
                    label: function (context) {
                      return 'Tools Developed: ' + context.parsed.x;
                    }
                  }
                }
              }
            }
          });
        }
      }

      tabBreadcrumbs.forEach(breadcrumb => {
        breadcrumb.addEventListener('click', function (e) {
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

            // Initialize charts if PM Gati Shakti tab is opened
            if (targetTab === 'pm-gati-shakti') {
              setTimeout(() => {
                initializeCharts();
              }, 100);
            }
          }
        });
      });

      // Initialize charts on page load if PM Gati Shakti is active
      if (document.getElementById('pm-gati-shakti')?.classList.contains('active')) {
        setTimeout(() => {
          initializeCharts();
        }, 100);
      }

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