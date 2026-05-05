@extends('layouts.app')

@section('content')
<!-- Hero Banner -->
<section class="sector-hero">
  <img src="assets/img/sectors/facilitation-counsil.jpg" class="hero-video" alt="Facilitation Council">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">Facilitation Council</h1>
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
      <a href="#" class="tab-breadcrumb active" data-tab="odr">Online Dispute Resolution (ODR)</a>
      <span class="breadcrumb-separator">›</span>
      <a href="#" class="tab-breadcrumb" data-tab="cg-msefc">CG MSEFC</a>
      <span class="breadcrumb-separator">›</span>
      <a href="#" class="tab-breadcrumb" data-tab="samadhaan">MSME SAMADHAAN</a>
    </div>
    <button class="breadcrumb-nav-btn breadcrumb-nav-next" id="breadcrumbNext" aria-label="Next">
      <i class="fa-solid fa-chevron-right"></i>
    </button>
  </div>
</div>

<!-- Tab Content -->
<div class="fc-content-area">
  <!-- ODR Tab -->
  <div class="tab-panel active" id="odr">
    <div class="container">
      <section class="fc-content-section">
        <div class="fc-intro-section">
          <h2 class="content-title">Online Dispute Resolution (ODR)</h2>
          <h3 class="fc-subtitle">Introduction</h3>
          <p class="fc-text">
            The Ministry of MSME has pioneered the development of the first-of-its-kind Online Dispute Resolution (ODR) portal, developed and owned by any Government of India Ministry/ Department. The ODR portal facilitates the speedy and efficacious resolution of delayed payment disputes through the comfort of the home or office of micro or small enterprises. The portal has been developed under the MSE Scheme on Online Dispute Resolution for Delayed Payments. The Online Dispute Resolution portal provides an end-to-end dispute resolution process in two stages:
          </p>
          
          <div class="fc-stages-list">
            <div class="fc-stage-item">
              <div class="fc-stage-number">1</div>
              <div class="fc-stage-content">
                <h4 class="fc-stage-title">Pre-MSEFC</h4>
                <p class="fc-stage-text">The pre-MSEFC stage is a voluntary, out-of-court solution that shall be undertaken based on consent provided by both parties. In case any or all of the parties opt out of the pre-MSEFC process, the parties will enter the MSEFC stage, which shall be undertaken as per the procedure defined under the MSMED Act, 2006. The pre-MSEFC stage envisages two processes:</p>
                <ul class="fc-process-list">
                  <li><strong>Digital Guided Pathway</strong></li>
                  <li><strong>Unmanned Negotiation</strong></li>
                </ul>
              </div>
            </div>

            <div class="fc-stage-item">
              <div class="fc-stage-number">2</div>
              <div class="fc-stage-content">
                <h4 class="fc-stage-title">MSEFC</h4>
                <p class="fc-stage-text">The MSEFC stage is the legal procedure mandated for the resolution of delayed payment applications under the MSMED Act, 2006. As mandated under the Act, the MSEFC stage envisages two processes:</p>
                <ul class="fc-process-list">
                  <li><strong>Conciliation/ Mediation</strong></li>
                  <li><strong>Arbitration</strong></li>
                </ul>
                <p class="fc-stage-text">Both the processes under the MSEFC stage are mandatory as per the MSMED Act and are conducted in a tiered manner.</p>
              </div>
            </div>
          </div>

          <div class="fc-features-section">
            <h3 class="fc-subtitle">Key Features</h3>
            <p class="fc-text">
              The Online Dispute Resolution Portal is designed and developed with the objective of providing easy access to justice delivery. The portal will provide end-to-end digitized resolution of the delayed payment cases. The portal provides the functionality of the entire lifecycle of a case - e-filing, scrutiny, listing, payment of application fees (if any) charged by MSEFCs, case management, scheduling of hearings, evidence, settlement agreements, hearings, awards, orders, etc. The portal will eliminate the need to travel long distances to present the case and physical documentation, provide easy access to information, flexibility, convenience, and transparency in the dispute resolution process.
            </p>
          </div>

          <div class="fc-link-section">
            <a href="https://odr.msme.gov.in/#/" target="_blank" class="fc-external-link">
              <i class="fa-solid fa-external-link"></i>
              <span>Visit Website: MSME ODR Portal</span>
            </a>
          </div>
        </div>
      </section>
    </div>
  </div>

  <!-- CG MSEFC Tab -->
  <div class="tab-panel" id="cg-msefc">
    <div class="container">
      <section class="fc-content-section">
        <div class="fc-intro-section">
          <h2 class="content-title">Chhattisgarh Micro and Small Enterprises Facilitation Council</h2>
          <p class="fc-text">
            The Micro, Small and Medium Enterprise Development (MSMED) Act, 2006 contains provisions of Delayed Payment to Micro and Small Enterprise (MSEs). (Section 15- 24).
          </p>
          <p class="fc-text">
            In exercise of the powers conferred by sub section (1) and (2) of Section 30 read with sub section (3) of Section 21 of Micro, Small and Medium Enterprises Development Act 2006 (27 of 2006 ) and in supersession of Chhattisgarh, MSEFC Rules 2006, State Government makes "Chhattisgarh Micro and Small Enterprises Facilitation Council Rules, 2017" which extend to the whole state of Chhattisgarh and shall come into force from the date of its publication in the Official Gazette through No. F- 20-10/2007/11/(6) Naya Raipur, Dated 17 July 2017.
          </p>
          <p class="fc-text">
            MSEFC of the Chhattisgarh after examining the case filed by supplier MSE unit will issue directions to the buyer unit for payment of due amount along with interest as per the provisions under the MSMED Act 2006. Any Micro or small enterprise having valid Udyam Registration can apply.
          </p>
        </div>

        <div class="fc-features-section">
          <h3 class="fc-subtitle">Salient Features</h3>
          <div class="fc-feature-list">
            <div class="fc-feature-item">
              <div class="fc-feature-icon">
                <i class="fa-solid fa-percent"></i>
              </div>
              <div class="fc-feature-content">
                <p class="fc-text">
                  The buyer is liable to pay compound interest with the monthly rests to the supplier on the amount at the three times of the bank rate notified by RBI in case he does not make payment to the supplier for his supplies of goods or services within 45 days of the acceptance of the goods/service rendered. <strong>(Section 16)</strong>
                </p>
              </div>
            </div>

            <div class="fc-feature-item">
              <div class="fc-feature-icon">
                <i class="fa-solid fa-scale-balanced"></i>
              </div>
              <div class="fc-feature-content">
                <p class="fc-text">
                  If the Appellant (not being the supplier) wants to file an appeal, no application for setting aside any decree or award by the MSEFC shall be entertained by any court unless the appellant (not being supplier) has deposited with it, the 75% of the award amount. <strong>(Section 19)</strong>
                </p>
              </div>
            </div>

            <div class="fc-feature-item">
              <div class="fc-feature-icon">
                <i class="fa-solid fa-users"></i>
              </div>
              <div class="fc-feature-content">
                <p class="fc-text">
                  <strong>Implementation</strong> - The provisions under the Act are implemented by MSEFC chaired by Director of Industries of the Chhattisgarh having administrative control of the MSE units. State Government ensure that the MSE Facilitation Council hold meetings regularly as stipulated in the MSMED Act, 2006.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="fc-process-section">
          <h3 class="fc-subtitle">Application Process</h3>
          <p class="fc-text">
            MSEFC view Applications filed by Supplier MSE unit in "MSME SAMADHAAN –Delayed payment Monitoring system" portal for further actions.
          </p>
          <p class="fc-text">
            MSEFC examines the documents filed before it by supplier MSE unit based on checklist and assign Case number after successful verification of documents. Checklist is as under -
          </p>

          <div class="fc-checklist">
            <div class="fc-checklist-item">
              <i class="fa-solid fa-check-circle"></i>
              <span>Offline Schedule 1 ( given in Rules)</span>
            </div>
            <div class="fc-checklist-item">
              <i class="fa-solid fa-check-circle"></i>
              <span>Brief Summary of the claim</span>
            </div>
            <div class="fc-checklist-item">
              <i class="fa-solid fa-check-circle"></i>
              <span>Copy of Bills, Delivery receipts or related evidences.</span>
            </div>
            <div class="fc-checklist-item">
              <i class="fa-solid fa-check-circle"></i>
              <span>Agreement of Period of supplying goods or Purchase order/Work order/Verbal order with affidavit</span>
            </div>
            <div class="fc-checklist-item">
              <i class="fa-solid fa-check-circle"></i>
              <span>Udyam Aadhar Registration certificate</span>
            </div>
            <div class="fc-checklist-item">
              <i class="fa-solid fa-check-circle"></i>
              <span>Delivery date against Purchase order and related invoices</span>
            </div>
            <div class="fc-checklist-item">
              <i class="fa-solid fa-check-circle"></i>
              <span>Interest calculation sheet containing outstanding claim amount along with interest</span>
            </div>
            <div class="fc-checklist-item">
              <i class="fa-solid fa-check-circle"></i>
              <span>Fees payment through Challan in the Budget head - 0852 Industry [08] Consumer Industry {800} Other Receipts (0674) Other Receipts</span>
            </div>
            <div class="fc-checklist-item">
              <i class="fa-solid fa-check-circle"></i>
              <span>Affidavit which is notarised.</span>
            </div>
            <div class="fc-checklist-item">
              <i class="fa-solid fa-check-circle"></i>
              <span>All above documents to be self attested</span>
            </div>
          </div>

          <div class="fc-fees-table">
            <h4 class="fc-table-title">Fees Structure</h4>
            <div class="fc-table-wrapper">
              <table class="fc-table">
                <thead>
                  <tr>
                    <th>Claim Amount</th>
                    <th>Fees</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>0 to 1 lac</td>
                    <td>₹1,000/-</td>
                  </tr>
                  <tr>
                    <td>1 to 5 lacs</td>
                    <td>₹1,500/-</td>
                  </tr>
                  <tr>
                    <td>5 to 10 lacs</td>
                    <td>₹2,000/-</td>
                  </tr>
                  <tr>
                    <td>10 lacs onwards</td>
                    <td>₹3,000/-</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="fc-arbitration-section">
            <h4 class="fc-subtitle-small">Conciliation and Arbitration</h4>
            <p class="fc-text">
              After assignment of Case number, Conciliation proceedings start under Section 18(2) and provisions of section 65 to 81 of Arbitration and Conciliation Act 1996 apply to it, failing which Arbitration proceedings start under Section 18(3) and provisions of Arbitration and Conciliation Act 1996 apply to it.
            </p>
          </div>
        </div>
      </section>
    </div>
  </div>

  <!-- MSME SAMADHAAN Tab -->
  <div class="tab-panel" id="samadhaan">
    <div class="container">
      <section class="fc-content-section">
        <div class="fc-intro-section">
          <h2 class="content-title">MSME SAMADHAAN</h2>
          <p class="fc-section-subtitle" style="font-size: 18px; color: #64748b; margin-bottom: 24px;">Delayed Payment Monitoring System</p>
          <p class="fc-text">
            It is an Initiative from Ministry of MSME, Govt. of India launched on 30.10.2017. MSME Samadhaan Portal provides Ease of filing application under MSEFC
          </p>
          <p class="fc-text">
            Ministry of MSME has taken an initiative for filing online application by the supplier MSE unit against the buyer of goods/services before the concerned MSEFC of his/her State. These will be viewed by MSEFC Council for their actions.
          </p>
          <p class="fc-text">
            These will be also visible to Concerned Central Ministries, Departments, CPSEs, State Government, etc for pro-active actions. <a href="https://samadhaan.msme.gov.in" target="_blank" class="fc-link">MSME SAMADHAAN - Delayed Payment Monitoring System</a>
          </p>
        </div>

        <div class="fc-features-section">
          <h3 class="fc-subtitle">Key Features</h3>
          <div class="fc-feature-list">
            <div class="fc-feature-item">
              <div class="fc-feature-icon">
                <i class="fa-solid fa-file-circle-check"></i>
              </div>
              <div class="fc-feature-content">
                <p class="fc-text">Applications and case status of MSE units are accessible through it.</p>
              </div>
            </div>

            <div class="fc-feature-item">
              <div class="fc-feature-icon">
                <i class="fa-solid fa-book"></i>
              </div>
              <div class="fc-feature-content">
                <p class="fc-text">It contains Hon. Supreme court judgement related to delayed payment and also related Acts, Notifications and Address of the concerned MSEFC</p>
              </div>
            </div>

            <div class="fc-feature-item">
              <div class="fc-feature-icon">
                <i class="fa-solid fa-building"></i>
              </div>
              <div class="fc-feature-content">
                <p class="fc-text">It facilitates MSE Facilitation Council also to directly file cases after 01.08.2018. Earlier only MSE units are filing it.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="fc-link-section">
          <a href="https://samadhaan.msme.gov.in" target="_blank" class="fc-external-link">
            <i class="fa-solid fa-external-link"></i>
            <span>Visit Website: MSME SAMADHAAN- Delayed Payment Monitoring System</span>
          </a>
        </div>
      </section>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const tabBreadcrumbs = document.querySelectorAll('.tab-breadcrumb');
  const tabPanels = document.querySelectorAll('.tab-panel');

  tabBreadcrumbs.forEach(breadcrumb => {
    breadcrumb.addEventListener('click', function(e) {
      // Skip if it's a navigation link (has href and no data-tab)
      if (this.getAttribute('href') && !this.getAttribute('data-tab')) {
        return; // Let the link work normally
      }
      
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
