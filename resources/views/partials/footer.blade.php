<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <h5 class="footer-title">Quick Links:</h5>
            <div class="quick-links d-flex justify-content-between flex-wrap">
                <a href="{{ route('pages.show', 'investment_promotion') }}">Investment Promotion</a>
                <a href="{{ route('calculator.index') }}">Subsidy Calculator</a>
                <a href="{{ route('focus-sectors.index') }}">Focus Sectors</a>
                <a href="{{ route('pages.show', 'one-click') }}">One Click - SWS</a>
                <a href="https://csidc.cgstate.gov.in/website/home" target="_blank" rel="noopener">Land Management</a>
                <a href="{{ route('media-updates.index') }}">Media Updates</a>
               
            </div>
        </div>

        <hr class="footer-divider" />

        <div class="footer-middle row justify-content-between">
            <div class="col-md-4">
                <h6 class="footer-subtitle">Office Address:</h6>
                <p>
                    Udyog Bhawan, Ring Road No.-1, Telibandha, Raipur, 492001, Chhattisgarh, India
                </p>
                <p class="footer-subtitle mt-3"><i class="fa fa-eye"></i> Total Visitors: {{ number_format($totalVisitors ?? 0) }}</p>
            </div>

            <div class="col-md-4">
                <h6 class="footer-subtitle">Contact:</h6>
                <ul class="contact-list">
                  <li><i class="fa-solid fa-face-smile"></i><a href="https://invest.cg.gov.in/oneclick/raise-query">Happy to Help</a></li>
                    <li><i class="fa fa-envelope"></i> invest-support@cg.gov.in</li>
                    <li><i class="fa fa-phone"></i> 0771-3101500 (10.00 AM - 5.30 PM) Mon - Fri</li>
                </ul>
            </div>

            <div class="col-md-4 follow">
                <h6 class="footer-subtitle">Follow Us:</h6>
                <div class="social-icons">
                    <a href="https://www.facebook.com/InvestChhattisgarh/" target="_blank" rel="noopener"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/investcg_india/" target="_blank" rel="noopener"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://x.com/InvestCG_India" target="_blank" rel="noopener"><i
                            class="fab fa-x-twitter"></i></a>
                    <a href="https://www.linkedin.com/company/investcgindia/" target="_blank" rel="noopener"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.youtube.com/@InvestCG_India" target="_blank" rel="noopener"><i
                            class="fab fa-youtube"></i></a>
                </div>
                          
            </div>
        </div>

        <hr class="footer-divider" />

        <div class="footer-bottom">
            © <?php echo date("Y"); ?> | <a href="#">Department of Commerce &amp; Industries, Chhattisgarh</a> All rights reserved. | <a href="{{ route('pages.show', 'privacy-policy') }}">Privacy Policy</a>
        </div>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const testimonialswiper = new Swiper(".testimonial-swiper", {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        slidesPerView: 1,
        spaceBetween: 30,
    });
</script>

<script>
    const keyFeaturesSwiper = new Swiper(".keyFeaturesSwiper", {
        slidesPerView: 4,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: ".keyNext",
            prevEl: ".keyPrev",
        },
        pagination: {
            el: ".keyPagination",
            clickable: true,
        },
            autoplay: {
            delay: 2000,
            disableOnInteraction: true,
        },

        speed: 1000,
        breakpoints: {
            0: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 4 },
        },
    });
</script>

<script>
    const instagramCreativeSwiper = new Swiper(".instagramCreativeSwiper", {
        slidesPerView: 8,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: ".keyNext",
            prevEl: ".keyPrev",
        },
        pagination: {
            el: ".instagramCreativeSwiperPagination",
            clickable: true,
        },
         autoplay: {
            delay: 2000,
            disableOnInteraction: true,
        },

        speed: 1000,
        breakpoints: {
            0: { slidesPerView: 1 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 6 },
        },
    });
</script>

<script>
    window.addEventListener("scroll", function () {
        const navbar = document.querySelector(".navbar");
        if (navbar) {
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        }
    });

    const desktopMenuBtn = document.getElementById("desktopMenuBtn");
    const megaMenu = document.getElementById("megaMenu");

    document.addEventListener("click", (e) => {
        if (desktopMenuBtn && desktopMenuBtn.contains(e.target)) {
            megaMenu?.classList.toggle("open");
        } else if (megaMenu && !megaMenu.contains(e.target)) {
            megaMenu.classList.remove("open");
        }
    });
</script>

<script>
    const scrollWithOffset = (target) => {
        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
        window.scrollTo({
            top: targetPosition - 160,
            behavior: "smooth"
        });
    };

    document.querySelectorAll('a[href^=\"#\']').forEach(anchor => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                setTimeout(() => scrollWithOffset(target), 100);
            }
        });
    });

    window.addEventListener('load', () => {
        if (window.location.hash) {
            const target = document.querySelector(window.location.hash);
            if (target) {
                setTimeout(() => scrollWithOffset(target), 200);
            }
        }
    });

    window.scrollWithOffset = scrollWithOffset;
</script>

<script>
    const newsswiper = new Swiper(".news-swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: false,
        grabCursor: true,
        pagination: {
            el: ".news-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        breakpoints: {
            992: {
                slidesPerView: 4,
                spaceBetween: 24,
                allowTouchMove: false,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            }
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.innerWidth <= 991) {
            const reformCards = document.querySelectorAll('.reform-card');

            reformCards.forEach(card => {
                card.addEventListener('click', function () {
                    this.classList.toggle('flipped');
                });
            });
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        new Swiper(".sectorsSwiper", {
            slidesPerView: 5,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: ".sectors-next",
                prevEl: ".sectors-prev",
            },
            watchSlidesProgress: true,
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 20 },
                768: { slidesPerView: 4, spaceBetween: 25 },
                1024: { slidesPerView: 6, spaceBetween: 30 },
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const startupNav = document.querySelector('.startup-nav');
        if (!startupNav) return;

        const closeAll = () => {
            startupNav.querySelectorAll('.startup-nav-item.show').forEach(item => {
                item.classList.remove('show');
                const toggle = item.querySelector('.dropdown-toggle');
                if (toggle) {
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });
        };

        startupNav.querySelectorAll('.dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', (event) => {
                event.preventDefault();
                event.stopPropagation(); // Prevent breadcrumb slider from interfering
                const parent = toggle.closest('.startup-nav-item');
                const isOpen = parent?.classList.contains('show');
                closeAll();
                if (parent && !isOpen) {
                    parent.classList.add('show');
                    toggle.setAttribute('aria-expanded', 'true');
                    
                    // Position dropdown menu - use absolute positioning relative to button
                    const dropdown = parent.querySelector('.dropdown-menu');
                    if (dropdown) {
                        const rect = toggle.getBoundingClientRect();
                        const viewportWidth = window.innerWidth;
                        const viewportHeight = window.innerHeight;
                        const isMobile = viewportWidth <= 768;
                        
                        // Responsive width calculation
                        let dropdownWidth;
                        if (isMobile) {
                            dropdownWidth = Math.min(Math.max(200, rect.width), viewportWidth - 20);
                        } else {
                            dropdownWidth = Math.max(280, rect.width);
                        }
                        
                        // Use fixed positioning but calculate from button position
                        dropdown.style.position = 'fixed';
                        
                        // Very small gap - directly below button (2px for visibility)
                        const gapFromTop = 2;
                        dropdown.style.top = (rect.bottom + gapFromTop) + 'px';
                        
                        // Responsive positioning
                        if (isMobile) {
                            // On mobile, center the dropdown using left: 0 and right: 0
                            dropdown.style.left = '0';
                            dropdown.style.right = '0';
                            dropdown.style.marginLeft = 'auto';
                            dropdown.style.marginRight = 'auto';
                            dropdown.style.width = Math.min(dropdownWidth, viewportWidth - 20) + 'px';
                            dropdown.style.maxWidth = (viewportWidth - 20) + 'px';
                        } else {
                            // Desktop: align to left edge of button
                            let leftPos = rect.left;
                            if (leftPos + dropdownWidth > viewportWidth - 10) {
                                leftPos = viewportWidth - dropdownWidth - 10;
                            }
                            if (leftPos < 10) {
                                leftPos = 10;
                            }
                            dropdown.style.left = leftPos + 'px';
                            dropdown.style.right = 'auto';
                            dropdown.style.marginLeft = '0';
                            dropdown.style.marginRight = '0';
                            dropdown.style.minWidth = dropdownWidth + 'px';
                            dropdown.style.maxWidth = (viewportWidth - 20) + 'px';
                        }
                        
                        dropdown.style.transform = 'none';
                        
                        // Check if dropdown would overflow bottom and adjust
                        // Wait for dropdown to render to get actual height
                        setTimeout(() => {
                            const dropdownHeight = dropdown.offsetHeight;
                            const dropdownTop = parseFloat(dropdown.style.top);
                            
                            if (dropdownTop + dropdownHeight > viewportHeight - 10) {
                                // Position above button if it would overflow bottom
                                dropdown.style.top = (rect.top - dropdownHeight - gapFromTop) + 'px';
                            }
                        }, 0);
                    }
                }
            });
        });

        startupNav.querySelectorAll('.dropdown-menu a').forEach(link => {
            link.addEventListener('click', (event) => {
                event.stopPropagation(); // Prevent event bubbling
                const linkUrl = new URL(link.href, window.location.href);
                const samePath = linkUrl.pathname === window.location.pathname;
                if (samePath && linkUrl.hash) {
                    event.preventDefault();
                    const target = document.querySelector(linkUrl.hash);
                    if (target) {
                        const scrollFn = window.scrollWithOffset || ((el) => el.scrollIntoView({ behavior: 'smooth', block: 'start' }));
                        setTimeout(() => scrollFn(target), 50);
                        if (window.history && history.replaceState) {
                            history.replaceState(null, '', linkUrl.hash);
                        }
                    }
                }
                closeAll();
            });
        });

        document.addEventListener('click', (event) => {
            if (!event.target.closest('.startup-nav')) {
                closeAll();
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const exportTrendCanvas = document.getElementById("exportTrendChart");
    if (exportTrendCanvas) {
        const ctx = exportTrendCanvas.getContext("2d");
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, "rgba(76, 175, 80, 0.4)");
        gradient.addColorStop(1, "rgba(76, 175, 80, 0)");

        new Chart(ctx, {
            type: "line",
            data: {
                labels: [
                    "2014-2015",
                    "2015-2016",
                    "2016-2017",
                    "2017-2018",
                    "2018-2019",
                    "2019-2020",
                    "2020-2021",
                    "2021-2022",
                    "2022-2023",
                    "2023-2024",
                    "2024-2025",
                ],
                datasets: [
                    {
                        label: "Export Value (US$ Million)",
                        data: [1182, 571, 943, 1523, 1244, 1279, 2320, 3389, 2675, 2017, 2189],
                        borderColor: "#2E7D32",
                        backgroundColor: gradient,
                        pointBackgroundColor: "#4CAF50",
                        pointBorderColor: "#fff",
                        pointHoverRadius: 8,
                        pointRadius: 6,
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        title: {
                            display: true,
                            text: "Export Value (US$ Million)",
                            color: "#555",
                            font: { size: 14 },
                        },
                        grid: { color: "rgba(0,0,0,0.05)" },
                        ticks: { color: "#666", font: { size: 13 } },
                    },
                    x: {
                        title: {
                            display: true,
                            text: "Financial Year",
                            color: "#555",
                            font: { size: 14 },
                        },
                        grid: { display: false },
                        ticks: { color: "#666", font: { size: 13 } },
                    },
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: "#2E7D32",
                        titleFont: { size: 14, weight: "bold" },
                        bodyFont: { size: 13 },
                        cornerRadius: 8,
                        padding: 12,
                        callbacks: {
                            label: (context) => `US$ ${context.formattedValue} Million`,
                        },
                    },
                },
                animation: {
                    duration: 2000,
                    easing: "easeInOutQuart",
                },
            },
        });
    }
</script>


