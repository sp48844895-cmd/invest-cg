@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
    <img src="{{ asset('assets/img/sectors/startup-banner.jpg') }}" class="hero-video" alt="Startup Chhattisgarh Banner">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
        <div class="hero-content-wrapper">
            <div class="hero-text">
                <h1 class="hero-title">Startup Chhattisgarh</h1>
            </div>
        </div>
    </div>
</section>

@include('partials.startup-tabs', ['active' => 'startup'])
 
<div class="container startup-page py-5">
    <!-- Definition Section -->
    <section id="definition" class="startup-card">
        <div class="startup-card-head">
            <div class="startup-icon"><i class="fa-solid fa-rocket"></i></div>
            <div>
                <h2 class="startup-title">An entity shall be considered as a Startup</h2>
           
            </div>
        </div>
        <div class="startup-card-body">
            <ul class="startup-list">
                  
                    <li>
                        Up to a period of ten years from the date of incorporation/ registration, if it is
                        incorporated as a private
                        limited company (as defined in the Companies Act, 2013) or registered as a partnership
                        firm
                        (registered
                        under section 59 of the Partnership Act, 1932) or a limited liability partnership (under
                        the
                        Limited Liability
                        Partnership Act, 2008) in India.
                    </li>

                    <li>
                        Turnover of the entity for any of the financial years since incorporation/ registration
                        has
                        not exceeded one
                        hundred crore rupees.
                    </li>
                    <li>

                        Entity is working towards innovation, development or improvement of products or
                        processes or
                        services,
                        or if it is a scalable business model with a high potential of employment generation or
                        wealth creation.
                    </li>
                    <li>

                        Provided that an entity formed by splitting up or reconstruction of an existing business
                        shall not
                        be considered a ‘Startup’.
                    </li>
                

            </ul>
        </div>
    </section>

        <!-- Priority Sectors Section -->
    <section id="eligibility" class="startup-card">
        <div class="startup-card-head">
            <div class="startup-icon"><i class="fa-solid fa-bullseye"></i></div>
            <div>
                <h2 class="startup-title">Eligibility</h2>
              <div class="startup-info-block_1">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                       To obtain State Startup recognition, an entity must fulfill the following conditions
                    </h4>
                    <ul class="startup-bullets">
                        <li>An entity shall satisfy the definition of a 'Startup' as outlined in Clause 5 (1) of this Policy, or as per the latest applicable definition issued by the Department for Promotion of Industry and Internal Trade (DPIIT), Ministry of Commerce and Industry, Government of India, including any subsequent revisions or amendments there to; and</li>
                        <li> The entity shall hold a valid startup recognition certificate issued by the Department for Promotion of Industry and Internal Trade (DPIIT) under the Ministry of Commerce and Industry, Government of India; and</li>
                        <li>The entity shall have its registered office and having operations in Chhattisgarh to avail any benefits under this policy; and</li>
                        <li>The entity should not fall under the list of ineligible industries as per Annexure-3 of the Industrial Development Policy 2024-2030 issued by the Commerce and Industries Department, Government of Chhattisgarh.</li>
                        <li>Startups operating in sectors or activities that are limited to replication of already established conventional business units shall not be eligible for benefits under this policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Priority Sectors Section -->
    <section id="priority-sectors" class="startup-card">
        <div class="startup-card-head">
            <div class="startup-icon"><i class="fa-solid fa-bullseye"></i></div>
            <div>
                <h2 class="startup-title">Priority Sectors</h2>
             
            </div>
        </div>
        <div class="startup-card-body">
            <p class="startup-paragraph">
                The government of Chhattisgarh, is considering priority sectors as inclusive of thrust sectors provided in
                the Industrial Development Policy 2024–30 and few more emerging sectors:
            </p>
            <div class="row g-3 mt-3">
                <div class="col-lg-6">
                    <div class="startup-subcard">
                        <div class="startup-subcard-head">
                            <i class="fa-solid fa-industry"></i>
                            <h3>Thrust Sectors</h3>
                        </div>
                        <p class="mb-0">Thrust sectors as identified in Annexure (II) of Industrial Development Policy (2024-30).</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="startup-subcard">
                        <div class="startup-subcard-head">
                            <i class="fa-solid fa-lightbulb"></i>
                            <h3>Emerging Sectors</h3>
                        </div>
                        <div class="startup-tags">
                            <span>Fintech</span><span>Enterprise Technologies</span><span>E-Commerce</span><span>Travel-Tech</span>
                            <span>Consumer Services</span><span>Edtech</span><span>Health-tech</span><span>Assistive-Tech</span><span>Green Technologies</span>
                        </div>
                        <p class="startup-note mb-0">
                            With emerging technologies (inclusive of but not limited to Artificial Intelligence/Machine Learning,
                            Internet of Things, Augmented Reality/Virtual Reality, Big Data, Blockchain)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Startup Recognition Section -->
    <section id="recognition" class="startup-card">
        <div class="startup-card-head">
            <div class="startup-icon"><i class="fa-solid fa-certificate"></i></div>
            <div>
                <h2 class="startup-title_1">  A Startup must register itself with Startup Chhattisgarh to attain full benefit of the Chhattisgarh Innovation
                and Startup Promotion Policy <br> 2025-30.</h2>
         
            </div>
        </div>
        <div class="startup-card-body">

            <div class="recognition-actions">
                <a href="h#" target="_blank" class="startup-btn primary">
                    <i class="fa-solid fa-file-signature me-2"></i>
                   Download Startup Registration Manual
                </a>
                <a href="https://swsportal.cgstate.gov.in/website/registration" target="_blank" class="startup-btn primary">
                    <i class="fa-solid fa-file-signature me-2"></i>
               Register Your Startup
                </a>
                <a href="#" target="_blank" class="startup-btn primary">
                    <i class="fa-solid fa-file-signature me-2"></i>
                Dashboard
                </a>
                <a href="#" target="_blank" class="startup-btn primary">
                    <i class="fa-solid fa-file-signature me-2"></i>
                  Apply for Fundings
                </a>
            </div>
        </div>
    </section>


      <!-- Funding Overview Section -->
    <section id="fundings" class="startup-card">
        <div class="startup-card-head">
            <div class="startup-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
            <div>
                <h2 class="startup-title">Funding</h2>
            
            </div>
        </div>
        <div class="startup-card-body">
            <p class="mb-0">
                Startups are funded to fuel innovation, solve real-world problems, and drive economic growth. Early-stage
                support helps founders turn ideas into impactful solutions by reducing financial barriers. Funding also
                encourages risk-taking, fosters job creation, and builds a vibrant entrepreneurial ecosystem. It's an
                investment in the future of technology, society, and opportunity.
            </p>
        </div>
    </section>



    <!-- Startup Approval Section -->
    {{-- <section id="approval" class="startup-card">
        <div class="startup-card-head">
            <div class="startup-icon"><i class="fa-solid fa-clipboard-check"></i></div>
            <div>
                <h2 class="startup-title">Startup Approval and Clearances</h2>
            
            </div>
        </div>
        <div class="startup-card-body">
            <p>Dashboard – to be designed by CSM team, content to be imported from registration form.</p>
            <a href="https://swsportal.cgstate.gov.in/login" target="_blank" class="startup-btn outline">
                <i class="fa-solid fa-arrow-right me-2"></i>
                Apply for Fundings
            </a>
        </div>
    </section> --}}

  

    <!-- All Funding Schemes -->
    <section class="startup-card">
        <!-- <div class="startup-card-head mb-3">
            <div class="startup-icon"><i class="fa-solid fa-list-check"></i></div>
            <div></div>
        </div> -->

        <div class="row g-3 funding-schemes-grid">
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="01" data-title="Special Category Funding" data-content="#scheme-content-01">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">01</span>
                            <div>
                                <h3 class="h6 mb-0">Special Category Funding</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="02" data-title="Chhattisgarh Seed Fund Assistance" data-content="#scheme-content-02">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">02</span>
                            <div>
                                <h3 class="h6 mb-0">Chhattisgarh Seed Fund Assistance</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="03" data-title="Chhattisgarh Startup (Capital) Fund" data-content="#scheme-content-03">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">03</span>
                            <div>
                                <h3 class="h6 mb-0">Chhattisgarh Startup (Capital) Fund</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="04" data-title="Chhattisgarh State Credit Risk Fund" data-content="#scheme-content-04">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">04</span>
                            <div>
                                <h3 class="h6 mb-0">Chhattisgarh State Credit Risk Fund</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="05" data-title="Interest Subsidy on Loans" data-content="#scheme-content-05">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">05</span>
                            <div>
                                <h3 class="h6 mb-0">Interest Subsidy on Loans</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="06" data-title="Event Participation Assistance" data-content="#scheme-content-06">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">06</span>
                            <div>
                                <h3 class="h6 mb-0">Event Participation Assistance</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="07" data-title="Online Advertising Assistance" data-content="#scheme-content-07">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">07</span>
                            <div>
                                <h3 class="h6 mb-0">Online Advertising Assistance</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="08" data-title="Financial Incentive for Successful Fundraising" data-content="#scheme-content-08">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">08</span>
                            <div>
                                <h3 class="h6 mb-0">Financial Incentive for Successful Fundraising</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="09" data-title="Public Procurement Relaxation" data-content="#scheme-content-09">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">09</span>
                            <div>
                                <h3 class="h6 mb-0">Public Procurement Relaxation</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="10" data-title="Stamp Duty Exemption" data-content="#scheme-content-10">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">10</span>
                            <div>
                                <h3 class="h6 mb-0">Stamp Duty Exemption</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="11" data-title="Reimbursement of Rental Expenses" data-content="#scheme-content-11">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">11</span>
                            <div>
                                <h3 class="h6 mb-0">Reimbursement of Rental Expenses</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="12" data-title="Fixed Capital Investment" data-content="#scheme-content-12">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">12</span>
                            <div>
                                <h3 class="h6 mb-0">Fixed Capital Investment</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="13" data-title="Reimbursement of Quality Certification Fee" data-content="#scheme-content-13">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">13</span>
                            <div>
                                <h3 class="h6 mb-0">Reimbursement of Quality Certification Fee</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="14" data-title="Project Report Subsidy" data-content="#scheme-content-14">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">14</span>
                            <div>
                                <h3 class="h6 mb-0">Project Report Subsidy</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="15" data-title="Technical Patent Subsidy" data-content="#scheme-content-15">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">15</span>
                            <div>
                                <h3 class="h6 mb-0">Technical Patent Subsidy</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="16" data-title="Technology Purchase Subsidy" data-content="#scheme-content-16">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">16</span>
                            <div>
                                <h3 class="h6 mb-0">Technology Purchase Subsidy</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="17" data-title="Employment Generation Subsidy" data-content="#scheme-content-17">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">17</span>
                            <div>
                                <h3 class="h6 mb-0">Employment Generation Subsidy</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="18" data-title="Subsidy for Employment to Special Category Person" data-content="#scheme-content-18">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">18</span>
                            <div>
                                <h3 class="h6 mb-0">Subsidy for Employment to Special Category Person</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="19" data-title="Training Stipend Reimbursement" data-content="#scheme-content-19">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">19</span>
                            <div>
                                <h3 class="h6 mb-0">Training Stipend Reimbursement</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <button type="button" class="card h-100 text-start hover-effect" data-scheme="20" data-title="Environmental Project Management Subsidy" data-content="#scheme-content-20">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <span class="scheme-pill">20</span>
                            <div>
                                <h3 class="h6 mb-0">Environmental Project Management Subsidy</h3>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>

        <div class="d-none">
            <div id="scheme-content-01">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>Startups with women founders and special category founders will get 10% of seats reserved from state-supported incubators and an additional 10% on all subsidies and incentives.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>A startup must have a woman or special category founder with more than 51% of the shareholding.</p>
                </div>
            </div>

            <div id="scheme-content-02">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>A grant of up to ₹10 lakhs is available for startups with a validated Proof of Concept (PoC) to develop Minimum Viable Product (MVP).</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>To qualify, the startup must be incubated in a state-recognized incubator for at least three months and should have received a formal recommendation from the state-recognized incubator for the PoC.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <ul class="startup-bullets">
                        <li>Seed fund assistance shall be granted based on the presentation by the startup and subsequent evaluation by the designated State Startup Promotion Committee.</li>
                        <li>The fund shall not be utilized for expenses related to construction, land acquisition, or building infrastructure.</li>
                        <li>This fund assistance will be extended only to eligible startups those are not covered under the Student Startup Innovation Policy (SSIP) 2025 issued by the Department of Technical Education, Government of Chhattisgarh.</li>
                    </ul>
                </div>
            </div>

            <div id="scheme-content-03">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>This fund is backed by an initial ₹100 Crore corpus from the State to boost startup capital access. Through a co-investment model, up to ₹50 Crores will be matched with SEBI-registered AIFs, enabling a 50:50 partnership to support promising ventures.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
            </div>

            <div id="scheme-content-04">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>The State is launching a ₹50 Crore Credit Risk Fund to empower startups with collateral-free loans up to ₹1 Crore. By partnering with national mechanisms, this initiative offers guarantees that help early-stage ventures access vital financial support for scaling.</p>
                </div>
            </div>

            <div id="scheme-content-05">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>Startups shall receive a 100% interest subsidy on loans up to ₹50 Lakhs at a maximum interest rate of 10% for five years, in accordance with Notification No. GENS/1105/1/2025-COMM.&INDUS dated 25 April 2025 under the Industrial Development Policy, 2024–2030, issued by the Department of Commerce and Industries.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
            </div>

            <div id="scheme-content-06">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <div class="startup-stack">
                        <div class="startup-subcard minimal">
                            <h5>
                                <i class="fa-solid fa-flag"></i>
                                National Events
                            </h5>
                            <p>Reimbursement of 50% of the expenditure for participating in startup-focused events within the country, subject to a maximum limit of ₹2,00,000 per year. This support shall be extended for up to three events annually, with the cumulative reimbursement not exceeding ₹2,00,000.</p>
                        </div>
                        <div class="startup-subcard minimal">
                            <h5>
                                <i class="fa-solid fa-globe"></i>
                                International Events
                            </h5>
                            <p>Reimbursement of 50% of the expenditure for participating in startup-focused events outside the country, subject to a maximum limit of ₹3,00,000 per year. This support shall be extended for up to three events annually, with the cumulative reimbursement not exceeding ₹3,00,000.</p>
                        </div>
                        <div class="startup-subcard minimal">
                            <h5>
                                <i class="fa-solid fa-calendar-check"></i>
                                Definition of Startup-Focused Event
                            </h5>
                            <p>A Startup-Focused Event shall refer to events organized with the objective of providing startups access to market opportunities, funding avenues, networking platforms, and promoting the startup ecosystem.</p>
                        </div>
                    </div>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Recognized Startups from Startup Chhattisgarh</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <ul class="startup-bullets">
                        <li>Travel limited to public transport, including economy class airfare. Claims for travel by private or premium modes of transport shall not be admissible under the policy.</li>
                        <li>Participation fees (including registration charges, entry fees, delegate passes)</li>
                        <li>In cases where payments are made in foreign currency, the application must be accompanied by a valid currency conversion receipt or documentary proof of the applicable conversion rate.</li>
                        <li>A maximum of two founders/directors/partners per startup shall be eligible to claim reimbursement for travel and participation fees for each event.</li>
                        <li>Only the charges incurred for stall/pod/booth rental at approved events shall be eligible for reimbursement. Expenses related to stall decoration, setup, or any other ancillary costs shall not be considered for reimbursement under this policy.</li>
                        <li>Startups availing this assistance shall be required to display the Startup Chhattisgarh Initiative Logo during the event to acknowledge the partnership and support received under the scheme.</li>
                        <li>Reimbursement of travel expenses will only be applicable for international events up to 2 members of the startup team.</li>
                    </ul>
                </div>
            </div>

            <div id="scheme-content-07">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>Startup units shall get financial assistance through reimbursement of expenses up to a maximum of ₹3 lakhs per startup unit for advertising expenses incurred on digital advertising. Eligible platforms include Meta (Facebook/Instagram), YouTube Ads, LinkedIn, Microsoft Ads, Google Ads, or any other platforms as may be notified by the Department from time to time.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <ul class="startup-bullets">
                        <li>A detailed statement of expenditure must be submitted along with copies of all receipts and invoices, issuing and clearly indicating the name of the startup and the date of each expense. Additionally, the startup shall submit its bank statement highlighting the corresponding payments made.</li>
                        <li>Startups availing incentives under this scheme shall not be eligible to claim similar benefits under any other State or Central Government policy. Furthermore, startups that have already availed similar incentives under any other State or Central Government policy shall not be eligible to apply under this scheme.</li>
                        <li>Startups shall be eligible to claim reimbursement for expenses incurred on digital advertising only twice during the policy period.</li>
                    </ul>
                </div>
            </div>

            <div id="scheme-content-08">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>A performance-based incentive of 20% of the amount raised, up to a maximum of ₹10 lakhs. This incentive excludes funds raised through grants or angel investments.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startups who raised funds from SEBI registered Alternative Investment Funds (AIFs) or Venture Capitalists (VCs) and recognized by Startup Chhattisgarh.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <ul class="startup-bullets">
                        <li>Assistance shall be extended only upon receipt of investment from SEBI registered Alternative Investment Funds (AIFs), or Venture Capitalists.</li>
                        <li>Startups raised investment from any of the state or central Government schemes will not be considered for this assistance.</li>
                        <li>The investment must be sanctioned and disbursed to the startup after the notification of this policy.</li>
                        <li>A startup shall be eligible to avail this financial assistance only once during its lifecycle.</li>
                        <li>The shareholding pattern of the startup must remain unchanged from the date of investment sanction to the date of submission of the assistance application.</li>
                        <li>The startup must submit its application for financial assistance within six (6) months from the date of receipt of investment/disbursement in its bank account. In exceptional cases, relaxation of the time limit may be considered by the Implementing Agency, subject to justification and approval.</li>
                    </ul>
                </div>
            </div>

            <div id="scheme-content-09">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>If eligible you will be exempted from the requirements of prior turnover and prior experience provided under sub-clause 4.2 and from the submission of Earnest Money Deposit (EMD) as provided under sub-clause 4.7 of the Chhattisgarh Store Purchase Rules, 2002 (as amended in 2025).</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <p class="mb-0">As provided under sub-clause 4.7 of the Chhattisgarh Store Purchase Rules, 2002 (as amended in 2025).</p>
                </div>
            </div>

            <div id="scheme-content-10">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>100% exemption from stamp duty on the purchase of land/ leased land with a minimum 11 years of lease term. Startups will also get exemption from stamp duty on term loans for up to three years.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <p class="mb-0">As per Official Notification No. एफ 10-40/2024/वा.क.(पं.)/पांच (16) dated 14 February 2025 under the Industrial Development Policy, 2024–2030, issued by the Department of Commerce and Industries.</p>
                </div>
            </div>

            <div id="scheme-content-11">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>If you have workspaces leased or rented, you are eligible to receive 50% assistance on the rent/lease paid each month for a period of 3 years, subject to a maximum of ₹15,000 per month, from the date of issuance of the state startup recognition certificate. This reimbursement is also applicable for workspace/seat rental fees paid by startups in incubation centers and co-working spaces.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <ul class="startup-bullets">
                        <li>Recognized startup units established or operating in Chhattisgarh will be eligible for reimbursement of 50% of the monthly rent, up to a maximum of ₹15,000 per month, for a period of three years.</li>
                        <li>Startup units working in the field of public welfare and startup units in the circular economy will be eligible for an additional 5% subsidy.</li>
                        <li>The rent agreement must be in the name of the startup entity.</li>
                        <li>GIS location/geo-tagged picture of the rented premises is required.</li>
                        <li>The rented premises should be commercially diverted.</li>
                        <li>Payments must be made through bank transactions and should be in sync with the terms of the agreement. Cash transactions will not be eligible for the assistance.</li>
                    </ul>
                </div>
            </div>

            <div id="scheme-content-12">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>You may avail a subsidy of up to 35% of the fixed capital investment, subject to a maximum limit of ₹35 lakhs during the policy period.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <ul class="startup-bullets">
                        <li>If you have received seed fund assistance/fund raising assistance and rental subsidy, it shall be adjusted against the eligible FCI subsidy.</li>
                        <li>List of eligible fixed capital investment items is provided at Annexure.</li>
                    </ul>
                </div>
            </div>

            <div id="scheme-content-13">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>You are eligible for reimbursement of 75% of the expenses incurred for obtaining quality certifications, subject to a maximum limit of ₹10 lakhs, whichever is lower.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <p class="mb-0">As per Notification No. GENS/32/2025-COMM.&INDUS dated 14 February 2025 under the Industrial Development Policy, 2024–2030, issued by the Department of Commerce and Industries.</p>
                </div>
            </div>

            <div id="scheme-content-14">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>You are eligible to get 1% of the approved fixed capital investment, up to a maximum of ₹5 lakhs.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <p class="mb-0">As per Notification No. GENS/32/2025-COMM.&INDUS dated 14 February 2025 under the Industrial Development Policy, 2024–2030, issued by the Department of Commerce and Industries.</p>
                </div>
            </div>

            <div id="scheme-content-15">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>You are eligible to get 75% of the expenses incurred for obtaining a patent, up to a maximum of ₹10 lakhs in case of national and a maximum of ₹20 lakhs for international patents.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <p class="mb-0">As per Notification No. GENS/32/2025-COMM.&INDUS dated 14 February 2025 under the Industrial Development Policy, 2024–2030, issued by the Department of Commerce and Industries.</p>
                </div>
            </div>

            <div id="scheme-content-16">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>You are eligible to get 50% of the expenses incurred for technology purchase from government research institution, up to a maximum of ₹10 lakhs.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <p class="mb-0">As per Notification No. GENS/32/2025-COMM.&INDUS dated 14 February 2025 under the Industrial Development Policy, 2024–2030, issued by the Department of Commerce and Industries.</p>
                </div>
            </div>

            <div id="scheme-content-17">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>If you are creating over 10 on-roll, you are eligible for a monthly subsidy of ₹6,000 per female and ₹5,000 per male employee for Chhattisgarh domiciles for up to five years from the start of operations.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <p class="mb-0">As per Notification No. RULE-5/5/2025/COMM.&INDUS dated 25 February 2025 under the Industrial Development Policy, 2024–2030, issued by the Department of Commerce and Industries.</p>
                </div>
            </div>

            <div id="scheme-content-18">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>If you are offering permanent employment to differently abled individuals, retired Agniveer personnel, and surrendered Naxalites from Chhattisgarh, you shall be supported through a reimbursement of 40% of their net salary or wages, up to ₹5 lakhs per annum, for a duration of five years.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <p class="mb-0">As per Notification No. RULE-5/5/2025/COMM.&INDUS dated 25 February 2025 under the Industrial Development Policy, 2024–2030, issued by the Department of Commerce and Industries.</p>
                </div>
            </div>

            <div id="scheme-content-19">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>If you are a product-based entity, you are eligible for reimbursement for training stipends equivalent to one month's salary, or the maximum permissible amount per person, whichever is lower, for one-time training, for employees who are domicile of Chhattisgarh and earn less than ₹50,000 per month.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <p class="mb-0">As per Notification no. GENS-2101/1167/2025- COMM. & INDUS. dated 19 August 2025 of Department of Commerce and Industries, under Industrial Development Policy, 2024–2030.</p>
                </div>
            </div>

            <div id="scheme-content-20">
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-info-circle"></i>
                        About
                    </h4>
                    <p>You are eligible to get Environmental Project Management Subsidy if you are adopting technologies that reduce carbon footprints and generate carbon credits, subsidy shall be 50% of the machinery cost, subject to a maximum of ₹25 lakhs.</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-clipboard-check"></i>
                        Eligibility
                    </h4>
                    <p>Startup Chhattisgarh recognized Startups</p>
                </div>
                <div class="startup-info-block">
                    <h4>
                        <i class="fa-solid fa-list-check"></i>
                        Conditions
                    </h4>
                    <p class="mb-0">To be updated</p>
                </div>
            </div>
        </div>

        <div class="modal fade" id="schemeDetailsModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="schemeDetailsModalTitle"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="schemeDetailsModalBody"></div>
                </div>
            </div>
        </div>
    </section>
        <!-- Idea Submission Section -->
    <section id="idea-submission" class="startup-card">
        <div class="startup-card-head">
            <div class="startup-icon"><i class="fa-solid fa-lightbulb"></i></div>
            <div>
                <h2 class="startup-title">Idea Submission</h2>
            </div>
        </div>
        <div class="startup-card-body">
            <p>
                At Startup Chhattisgarh, we believe that the best solutions often come from those who experience real world problems firsthand. Whether it's a challenge faced by a government department, a community issue, or a broader societal need — your idea could be the seed of the next big startup.
            </p>
            <p>
                We invite you to share innovative, practical, and impactful ideas that address real-life problems. If your idea resonates with us, we’ll help you transform it into a startup by providing the mentorship, resources, and support you need to bring it to life.
            </p>
            <p class="mb-2">This is your chance to:</p>
            <ul class="idea-bullets">
                <li>Solve real problems that matter</li>
                <li>Get recognized and supported by Startup Chhattisgarh</li>
                <li>Build a startup that creates meaningful impact</li>
            </ul>
            <a href="#" class="startup-btn primary mt-4">
                <i class="fa-solid fa-paper-plane me-2"></i>
                Submit your idea
            </a>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        (function () {
            const modalEl = document.getElementById('schemeDetailsModal');
            const modalTitleEl = document.getElementById('schemeDetailsModalTitle');
            const modalBodyEl = document.getElementById('schemeDetailsModalBody');

            if (!modalEl || !modalTitleEl || !modalBodyEl || typeof bootstrap === 'undefined') {
                return;
            }

            const modal = new bootstrap.Modal(modalEl);

            document.querySelectorAll('[data-content][data-title]').forEach((btn) => {
                btn.addEventListener('click', () => {
                    const title = btn.getAttribute('data-title') || '';
                    const contentSelector = btn.getAttribute('data-content');
                    const contentEl = contentSelector ? document.querySelector(contentSelector) : null;

                    modalTitleEl.textContent = title;
                    modalBodyEl.innerHTML = contentEl ? contentEl.innerHTML : '';
                    modal.show();
                });
            });
        })();
    </script>
@endpush

@push('head')
    <style>
        .funding-schemes-grid > [class*='col-'] {
            display: flex;
        }

        .funding-schemes-grid > [class*='col-'] > .card {
            width: 100%;
        }

        .funding-schemes-grid button.card {
            text-align: left !important;
        }

        .funding-schemes-grid button.card .card-body,
        .funding-schemes-grid button.card .card-body * {
            text-align: left !important;
        }

        .funding-schemes-grid .card {
            display: flex;
            flex-direction: column;
        }

        .funding-schemes-grid button.card {
            transition: background-color 0.15s ease, background-image 0.15s ease, color 0.15s ease, border-color 0.15s ease;
        }

        .funding-schemes-grid button.card:hover,
        .funding-schemes-grid button.card:focus-visible {
            background: linear-gradient(135deg, #0077ff, #00b8a9);
            color: #ffffff !important;
        }

        .funding-schemes-grid button.card:hover .scheme-pill,
        .funding-schemes-grid button.card:focus-visible .scheme-pill {
            color: #ffffff !important;
            border-color: rgba(255, 255, 255, 0.55) !important;
            background: rgba(255, 255, 255, 0.15) !important;
        }

        .funding-schemes-grid button.card:hover .card-body,
        .funding-schemes-grid button.card:hover .card-body *,
        .funding-schemes-grid button.card:focus-visible .card-body,
        .funding-schemes-grid button.card:focus-visible .card-body * {
            color: #ffffff !important;
        }

        .funding-schemes-grid .card-body .d-flex {
            align-items: center !important;
        }

        @media (max-width: 768px) {
            .funding-schemes-grid .scheme-pill {
                margin: 0 !important;
            }

            .funding-schemes-grid .card-body .d-flex {
                justify-content: flex-start !important;
                align-items: center !important;
            }
        }

        #recognition .recognition-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        @media (min-width: 769px) {
            #recognition .recognition-actions .startup-btn {
                flex: 0 0 auto;
            }
        }

        @media (max-width: 768px) {
            #recognition .recognition-actions {
                flex-direction: column;
                gap: 10px;
            }

            #recognition .recognition-actions .startup-btn {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                padding: 14px 16px;
                text-align: left;
            }
        }

        #eligibility .startup-card-head {
            text-align: left;
            align-items: flex-start;
        }

        #eligibility .startup-card-head > div {
            text-align: left;
        }

        #eligibility .startup-info-block_1,
        #eligibility .startup-info-block_1 * {
            text-align: left;
        }

        @media (max-width: 768px) {
            #eligibility .startup-card-head {
                flex-direction: column;
                text-align: left !important;
                align-items: flex-start !important;
            }

            #eligibility .startup-card-head .startup-icon {
                margin: 0 !important;
            }
        }
    </style>
@endpush
@endsection
