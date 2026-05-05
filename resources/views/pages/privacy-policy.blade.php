@extends('layouts.app')

@section('content')
<!-- Hero Banner with Image -->
<section class="sector-hero">
    <img src="assets/img/sectors/export-banner.jpg" class="hero-video" alt="">
    <div class="hero-gradient-overlay"></div>
    <div class="container">
        <div class="hero-content-wrapper">
            <div class="hero-text">
                <h1 class="hero-title">Privacy & Terms</h1>
            </div>
        </div>
    </div>
</section>
<div class="breadcrumb-nav">
    <div class="container breadcrumb-container">
        <a href="./" class="privacy-tab-btn" >Home</a>
        <span>›</span>
        <a href="#" class="privacy-tab-btn active" data-tab="terms">Terms & Conditions</a>
        <span>›</span>
        <a href="#" class="privacy-tab-btn" data-tab="privacy">Privacy Policy</a>
        <span>›</span>
        <a href="#" class="privacy-tab-btn" data-tab="cookies">Cookie Policy</a>
        <span>›</span>
        <a href="#" class="privacy-tab-btn" data-tab="refund">Refund Policy</a>
        <span>›</span>
        <a href="{{ asset('storage/pdfs/Pricing Policy.pdf') }}" target="_blank" class="privacy-tab-btn">Pricing Policy</a>
  
     
    </div>
</div>
<style>
    /* ============================================
   Privacy Policy Page Styles
   ============================================ */

.privacy-policy-section {
    padding: 60px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #e8f3ff 100%);
}

.privacy-policy-card {
    background: #fff;
    border-radius: 20px;
    padding: 0;
    box-shadow: 0 20px 60px -28px rgba(15, 23, 42, 0.15),
                0 10px 30px -20px rgba(15, 23, 42, 0.08);
    border: 1px solid rgba(15, 23, 42, 0.06);
    overflow: hidden;
}

/* Policy Header */
.privacy-policy-header {
    background: linear-gradient(135deg, #0077ff, #00b8a9);
    padding: 48px 44px;
    text-align: center;
    position: relative;
}

.privacy-policy-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity="0.1"/></svg>');
    opacity: 0.3;
}

.privacy-policy-title {
    font-size: 42px;
    font-weight: 800;
    color: #fff;
    margin: 0 0 12px 0;
    letter-spacing: -0.03em;
    position: relative;
}

.privacy-policy-subtitle {
    font-size: 16px;
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
    font-weight: 500;
    position: relative;
}

/* Policy Tabs */
.privacy-policy-tabs {
    display: flex;
    gap: 0;
    background: #f8fafc;
    border-bottom: 2px solid #e2e8f0;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.privacy-tab-btn {
    flex: 1;
    min-width: 160px;
    padding: 18px 24px;
    background: transparent;
    border: none;
    font-size: 15px;
    font-weight: 600;
    color: #64748b;
    cursor: pointer;
    position: relative;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.privacy-tab-btn:hover {
    background: rgba(0, 119, 255, 0.05);
    color: #0077ff;
}

.privacy-tab-btn.active {
    color: #0077ff;
    background: #fff;
}

.privacy-tab-btn.active::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, #0077ff, #00b8a9);
}

/* Tab Content */
.privacy-tab-content {
    display: none;
    padding: 44px;
    animation: privacyFadeIn 0.5s ease;
}

.privacy-tab-content.active {
    display: block;
}

@keyframes privacyFadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.privacy-content-intro {
    background: linear-gradient(135deg, #f8fafc, #e8f3ff);
    padding: 24px;
    border-radius: 12px;
    margin-bottom: 32px;
    border-left: 4px solid #0077ff;
}

.privacy-content-intro p {
    margin: 0;
    font-size: 16px;
    color: #334155;
    line-height: 1.6;
}

/* Policy Section */
.privacy-policy-section-item {
    display: flex;
    gap: 20px;
    margin-bottom: 32px;
    padding-bottom: 32px;
    border-bottom: 1px solid #f1f5f9;
}

.privacy-policy-section-item:last-of-type {
    border-bottom: none;
    padding-bottom: 0;
}

.privacy-section-number {
    flex-shrink: 0;
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #0077ff, #00b8a9);
    color: #fff;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    font-weight: 700;
    box-shadow: 0 4px 12px rgba(0, 119, 255, 0.2);
}

.privacy-section-icon {
    flex-shrink: 0;
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #f8fafc, #e8f3ff);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.privacy-section-content {
    flex: 1;
}

.privacy-section-content h3 {
    font-size: 20px;
    font-weight: 700;
    color: #1e293b;
    margin: 0 0 12px 0;
    letter-spacing: -0.01em;
}

.privacy-section-content p {
    font-size: 15px;
    color: #475569;
    line-height: 1.7;
    margin: 0;
}

/* Highlight Box */
.privacy-highlight-box {
    background: linear-gradient(135deg, #ecfdf5, #d1fae5);
    border: 1px solid #a7f3d0;
    border-radius: 12px;
    padding: 24px;
    display: flex;
    gap: 16px;
    margin-top: 32px;
}

.privacy-highlight-icon {
    flex-shrink: 0;
    width: 40px;
    height: 40px;
    background: #10b981;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    font-weight: 700;
}

.privacy-highlight-content h4 {
    font-size: 18px;
    font-weight: 700;
    color: #065f46;
    margin: 0 0 8px 0;
}

.privacy-highlight-content p {
    font-size: 14px;
    color: #047857;
    margin: 0;
    line-height: 1.6;
}

/* Info Box */
.privacy-info-box {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    border: 1px solid #fcd34d;
    border-radius: 12px;
    padding: 20px;
    display: flex;
    gap: 16px;
    margin-top: 32px;
    align-items: flex-start;
}

.privacy-info-icon {
    flex-shrink: 0;
    width: 32px;
    height: 32px;
    background: #f59e0b;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: 700;
}

.privacy-info-content {
    flex: 1;
    font-size: 14px;
    color: #78350f;
    line-height: 1.6;
}

.privacy-info-content strong {
    color: #92400e;
}

/* Contact Section */
.privacy-contact-section {
    background: linear-gradient(135deg, #f8fafc, #e8f3ff);
    padding: 32px;
    border-radius: 12px;
    text-align: center;
    margin-top: 40px;
    border: 1px solid #e2e8f0;
}

.privacy-contact-section h3 {
    font-size: 22px;
    font-weight: 700;
    color: #1e293b;
    margin: 0 0 12px 0;
}

.privacy-contact-section p {
    font-size: 15px;
    color: #64748b;
    margin: 0;
    line-height: 1.6;
}

/* Responsive Styles */
@media (max-width: 992px) {
    .privacy-policy-tabs {
        flex-wrap: nowrap;
        justify-content: flex-start;
    }

  
}

@media (max-width: 768px) {
    .privacy-policy-section {
        padding: 40px 0;
    }

    .privacy-policy-card {
        border-radius: 12px;
    }

    .privacy-policy-header {
        padding: 36px 24px;
    }

    .privacy-policy-title {
        font-size: 32px;
        margin-bottom: 8px;
    }

    .privacy-policy-subtitle {
        font-size: 14px;
    }

    .privacy-policy-tabs {
        gap: 0;
    }



    .privacy-tab-content {
        padding: 28px 24px;
    }

    .privacy-content-intro {
        padding: 20px;
        margin-bottom: 24px;
    }

    .privacy-content-intro p {
        font-size: 14px;
    }

    .privacy-policy-section-item {
        flex-direction: column;
        gap: 16px;
        margin-bottom: 24px;
        padding-bottom: 24px;
    }

    .privacy-section-number,
    .privacy-section-icon {
        width: 40px;
        height: 40px;
        font-size: 18px;
    }

    .privacy-section-content h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .privacy-section-content p {
        font-size: 14px;
    }

    .privacy-highlight-box,
    .privacy-info-box {
        flex-direction: column;
        gap: 12px;
        padding: 20px;
    }

    .privacy-highlight-content h4 {
        font-size: 16px;
    }

    .privacy-contact-section {
        padding: 24px;
        margin-top: 32px;
    }

    .privacy-contact-section h3 {
        font-size: 20px;
    }

    .privacy-contact-section p {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .privacy-policy-section {
        padding: 30px 0;
    }

    .privacy-policy-header {
        padding: 28px 20px;
    }

    .privacy-policy-title {
        font-size: 26px;
    }

    .privacy-policy-subtitle {
        font-size: 13px;
    }



    .privacy-tab-content {
        padding: 20px 16px;
    }

    .privacy-content-intro {
        padding: 16px;
    }

    .privacy-section-number,
    .privacy-section-icon {
        width: 36px;
        height: 36px;
        font-size: 16px;
    }

    .privacy-section-content h3 {
        font-size: 16px;
    }

    .privacy-section-content p {
        font-size: 13px;
    }

    .privacy-highlight-box,
    .privacy-info-box {
        padding: 16px;
    }

    .privacy-highlight-icon,
    .privacy-info-icon {
        width: 32px;
        height: 32px;
        font-size: 16px;
    }

    .privacy-highlight-content h4 {
        font-size: 15px;
    }

    .privacy-highlight-content p,
    .privacy-info-content {
        font-size: 13px;
    }

    .privacy-contact-section {
        padding: 20px;
    }

    .privacy-contact-section h3 {
        font-size: 18px;
    }

    .privacy-contact-section p {
        font-size: 13px;
    }
}

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* Custom Scrollbar for Tabs */
.privacy-policy-tabs::-webkit-scrollbar {
    height: 4px;
}

.privacy-policy-tabs::-webkit-scrollbar-track {
    background: #f1f5f9;
}

.privacy-policy-tabs::-webkit-scrollbar-thumb {
    background: #0077ff;
    border-radius: 4px;
}

.privacy-policy-tabs::-webkit-scrollbar-thumb:hover {
    background: #0056b3;
}
</style>
<section class="privacy-policy-section">
    <div class="container">
        <div class="privacy-policy-card">
            <div class="privacy-policy-header">
                <h1 class="privacy-policy-title">Privacy & Terms</h1>
                <p class="privacy-policy-subtitle">Last Updated: February 2026</p>
            </div>
         

            <!-- Terms & Conditions Content -->
            <div class="privacy-tab-content active" id="terms">
                <div class="privacy-content-intro">
                    <p>This website is designed, developed and maintained by the <strong>Department of Commerce and Industries, Government of Chhattisgarh ("Invest CG")</strong>.</p>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-number">1</div>
                    <div class="privacy-section-content">
                        <h3>User Agreement</h3>
                        <p>The term "User" refers to any person browsing this website. By accessing or using the website, the User agrees to be bound by these Terms & Conditions.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-number">2</div>
                    <div class="privacy-section-content">
                        <h3>Modification of Terms</h3>
                        <p>Invest CG reserves the right to revise these Terms & Conditions and modify or discontinue any aspect of the website, including content or features, at any time without prior notice.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-number">3</div>
                    <div class="privacy-section-content">
                        <h3>Intellectual Property Rights</h3>
                        <p>All content on this website, including software, text, images, graphics, audio and video, is the exclusive property of or licensed to Invest CG. Unauthorized use may violate copyright, trademark and other applicable laws and may result in civil or criminal liability.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-number">4</div>
                    <div class="privacy-section-content">
                        <h3>Limited Use of Content</h3>
                        <p>Users may print or download content for personal, non-commercial use only. No material may be reproduced, stored, transmitted, disseminated, or included in any database or retrieval system—electronic or otherwise—without prior written permission from Invest CG.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-number">5</div>
                    <div class="privacy-section-content">
                        <h3>Disclaimer of Warranties</h3>
                        <p>The information on this website is provided on an "as is" basis. Invest CG makes no warranties, express or implied, including warranties of accuracy, completeness, merchantability or fitness for a particular purpose.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-number">6</div>
                    <div class="privacy-section-content">
                        <h3>Limitation of Liability</h3>
                        <p>Invest CG shall not be liable for any direct, indirect, incidental or consequential damages, including loss of data, profits or business interruption, arising out of the use of or inability to use the website or its content.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-number">7</div>
                    <div class="privacy-section-content">
                        <h3>System Security</h3>
                        <p>Invest CG shall not be responsible for any damage to the User's computer system or loss of data resulting from downloading materials from the website. Unauthorized attempts to upload, modify or delete information are strictly prohibited and punishable under the Indian Information Technology Act.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-number">8</div>
                    <div class="privacy-section-content">
                        <h3>Third-Party Links</h3>
                        <p>This website may contain links to third-party websites for user convenience. Invest CG does not endorse, control or take responsibility for the content, availability, or compliance of such websites and shall not be liable for any loss or damage arising from their use.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-number">9</div>
                    <div class="privacy-section-content">
                        <h3>Indemnity</h3>
                        <p>The User agrees to indemnify and hold harmless Invest CG from any losses, damages, expenses or costs arising due to misuse of the website or violation of these Terms & Conditions.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-number">10</div>
                    <div class="privacy-section-content">
                        <h3>Governing Law & Jurisdiction</h3>
                        <p>These Terms & Conditions shall be governed by and construed in accordance with the laws of India. Any disputes shall be subject to the jurisdiction of the Indian courts where the concerned owner department of the website is located.</p>
                    </div>
                </div>
            </div>

            <!-- Privacy Policy Content -->
            <div class="privacy-tab-content" id="privacy">
                <div class="privacy-content-intro">
                    <p><strong>Invest CG</strong> respects the privacy of its website visitors.</p>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-icon">🔒</div>
                    <div class="privacy-section-content">
                        <h3>Data Collection</h3>
                        <p>The website uses only framework cookies, which do not automatically collect any personally identifiable information that could identify a user individually. No cookies are placed on the user's system during a visit to the Invest CG website.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-icon">🛡️</div>
                    <div class="privacy-section-content">
                        <h3>Data Sharing</h3>
                        <p>Invest CG does not sell, share, or disclose any personally identifiable information to any third party. However, Invest CG reserves the right to identify individual users solely for the purpose of law enforcement, as required under applicable laws.</p>
                    </div>
                </div>

                <div class="privacy-highlight-box">
                    <div class="privacy-highlight-icon">✓</div>
                    <div class="privacy-highlight-content">
                        <h4>Your Privacy Matters</h4>
                        <p>We are committed to protecting your personal information and maintaining the highest standards of data privacy.</p>
                    </div>
                </div>
            </div>

            <!-- Cookie Policy Content -->
            <div class="privacy-tab-content" id="cookies">
                <div class="privacy-content-intro">
                    <p>Using websites and applications may involve storing and retrieving information on your device, including cookies and other identifiers, to enable certain functionalities.</p>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-icon">🍪</div>
                    <div class="privacy-section-content">
                        <h3>What are Cookies?</h3>
                        <p>Cookies are small text files stored on your device to help websites function properly and provide a better user experience.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-icon">⚙️</div>
                    <div class="privacy-section-content">
                        <h3>Cookie Management</h3>
                        <p>Invest CG provides a simple tool that allows users to manage and customise their cookie preferences. Users may review or change their consent choices at any time.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-icon">📤</div>
                    <div class="privacy-section-content">
                        <h3>Third-Party Sharing</h3>
                        <p>Information collected may be shared with third parties solely for operational purposes to ensure smooth functioning of the website.</p>
                    </div>
                </div>
            </div>

            <!-- Refund Policy Content -->
            <div class="privacy-tab-content" id="refund">
                <div class="privacy-policy-section-item">
                    <div class="privacy-section-icon">💳</div>
                    <div class="privacy-section-content">
                        <h3>Cancellation / Refund Policy</h3>
                        <p>Fees once paid shall not be refunded for applications successfully submitted or for successful bill payment services. Cancellation of submitted applications or bill payments is not permitted.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-icon">🔄</div>
                    <div class="privacy-section-content">
                        <h3>Settlement of Amounts</h3>
                        <p>Any settlement of amounts, where applicable, shall be subject to the policies of the concerned department.</p>
                    </div>
                </div>

                <div class="privacy-policy-section-item">
                    <div class="privacy-section-icon">⚠️</div>
                    <div class="privacy-section-content">
                        <h3>Failed Transactions</h3>
                        <p>In case of a failed transaction, the amount shall be automatically refunded to the user as per the timelines of the respective bank or payment gateway. Neither the Government nor the banks/payment gateways shall be liable for delays beyond their respective processing timelines.</p>
                    </div>
                </div>

                <div class="privacy-info-box">
                    <div class="privacy-info-icon">ℹ️</div>
                    <div class="privacy-info-content">
                        <strong>Important Note:</strong> Please ensure all information is correct before submitting your application or making payments, as cancellations and refunds are not permitted once successfully processed.
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="privacy-contact-section">
                <h3>Need Help?</h3>
                <p>If you have any questions regarding these policies, please contact the Department of Commerce and Industries, Government of Chhattisgarh.</p>
            </div>
        </div>
    </div>
</section>

<script>
// Tab Switching Functionality
document.addEventListener('DOMContentLoaded', function() {
    const tabBtns = document.querySelectorAll('.privacy-tab-btn');
    const tabContents = document.querySelectorAll('.privacy-tab-content');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');

            // Remove active class from all buttons and contents
            tabBtns.forEach(b => b.classList.remove('active'));
            tabContents.forEach(c => c.classList.remove('active'));

            // Add active class to clicked button and corresponding content
            this.classList.add('active');
            document.getElementById(targetTab).classList.add('active');

            // Smooth scroll to top of content
            document.querySelector('.privacy-policy-card').scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start' 
            });
        });
    });
});
</script>
@endsection