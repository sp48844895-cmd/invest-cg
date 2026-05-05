/**
 * Universal Breadcrumb Slider Functionality
 * Applies to all breadcrumb-nav elements on the page
 */
(function() {
  'use strict';

  function initBreadcrumbSlider(breadcrumbNav) {
    // Check if already initialized
    if (breadcrumbNav.dataset.sliderInitialized === 'true') {
      return;
    }

    const container = breadcrumbNav.querySelector('.breadcrumb-container');
    if (!container) return;

    // Create wrapper if it doesn't exist
    let wrapper = breadcrumbNav.querySelector('.breadcrumb-wrapper');
    if (!wrapper) {
      wrapper = document.createElement('div');
      wrapper.className = 'breadcrumb-wrapper';
      
      // Create navigation buttons
      const prevBtn = document.createElement('button');
      prevBtn.className = 'breadcrumb-nav-btn breadcrumb-nav-prev';
      prevBtn.setAttribute('aria-label', 'Previous');
      prevBtn.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
      
      const nextBtn = document.createElement('button');
      nextBtn.className = 'breadcrumb-nav-btn breadcrumb-nav-next';
      nextBtn.setAttribute('aria-label', 'Next');
      nextBtn.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
      
      // Wrap container
      container.parentNode.insertBefore(wrapper, container);
      wrapper.appendChild(prevBtn);
      wrapper.appendChild(container);
      wrapper.appendChild(nextBtn);
    }

    const prevBtn = wrapper ? wrapper.querySelector('.breadcrumb-nav-prev') : null;
    const nextBtn = wrapper ? wrapper.querySelector('.breadcrumb-nav-next') : null;

    // Force single row layout
    container.style.flexWrap = 'nowrap';
    container.style.whiteSpace = 'nowrap';
    // Always start from left to show first items, center only if content fits
    container.style.justifyContent = 'flex-start';
    // Reset scroll to 0 to ensure first items are visible
    container.scrollLeft = 0;

    // Ensure all items don't wrap (but skip dropdown items for startup-nav)
    const allItems = container.querySelectorAll('a, span, .tab-breadcrumb');
    allItems.forEach(item => {
      // Skip dropdown toggles and menu items to avoid interfering with dropdown functionality
      if (item.classList.contains('dropdown-toggle') || item.closest('.dropdown-menu')) {
        return;
      }
      item.style.whiteSpace = 'nowrap';
      item.style.flexShrink = '0';
      item.style.display = 'inline-block';
    });

    function updateButtons() {
      // Force scroll to 0 if it's at the start
      if (container.scrollLeft < 1) {
        container.scrollLeft = 0;
      }
      
      const scrollLeft = container.scrollLeft;
      const scrollWidth = container.scrollWidth;
      const clientWidth = container.clientWidth;
      const needsScroll = scrollWidth > clientWidth + 1;

      if (wrapper) {
        if (needsScroll) {
          wrapper.classList.add('has-scroll');
          // Enable/disable buttons based on scroll position
          if (prevBtn) {
            prevBtn.disabled = scrollLeft <= 1;
            prevBtn.style.opacity = scrollLeft <= 1 ? '0.3' : '1';
            prevBtn.style.pointerEvents = scrollLeft <= 1 ? 'none' : 'auto';
          }
          if (nextBtn) {
            const maxScroll = scrollWidth - clientWidth;
            nextBtn.disabled = scrollLeft >= maxScroll - 1;
            nextBtn.style.opacity = scrollLeft >= maxScroll - 1 ? '0.3' : '1';
            nextBtn.style.pointerEvents = scrollLeft >= maxScroll - 1 ? 'none' : 'auto';
          }
        } else {
          wrapper.classList.remove('has-scroll');
          if (prevBtn) {
            prevBtn.disabled = true;
            prevBtn.style.opacity = '0.3';
            prevBtn.style.pointerEvents = 'none';
          }
          if (nextBtn) {
            nextBtn.disabled = true;
            nextBtn.style.opacity = '0.3';
            nextBtn.style.pointerEvents = 'none';
          }
        }
      } else {
        // If no wrapper, add class directly to container
        if (needsScroll) {
          container.classList.add('has-scroll');
        } else {
          container.classList.remove('has-scroll');
        }
      }
    }

    function scrollBreadcrumbs(direction) {
      const scrollAmount = container.clientWidth * 0.6;
      const currentScroll = container.scrollLeft;
      const maxScroll = container.scrollWidth - container.clientWidth;
      const newScroll = direction === 'prev' 
        ? Math.max(0, currentScroll - scrollAmount)
        : Math.min(maxScroll, currentScroll + scrollAmount);
      
      container.scrollTo({
        left: newScroll,
        behavior: 'smooth'
      });
      
      // Update buttons after scroll
      setTimeout(() => {
        updateButtons();
      }, 100);
    }

    // Event listeners
    if (prevBtn) {
      prevBtn.addEventListener('click', () => scrollBreadcrumbs('prev'));
    }
    if (nextBtn) {
      nextBtn.addEventListener('click', () => scrollBreadcrumbs('next'));
    }
    
    container.addEventListener('scroll', updateButtons);
    
    // Reset scroll to 0 to show first items
    function resetScroll() {
      container.scrollLeft = 0;
      container.style.justifyContent = 'flex-start';
    }
    
    const resizeHandler = () => {
      // Reset scroll position to show first items
      resetScroll();
      // Re-check after a short delay to ensure layout is stable
      setTimeout(() => {
        updateButtons();
      }, 100);
      setTimeout(() => {
        updateButtons();
      }, 300);
    };
    window.addEventListener('resize', resizeHandler);
    
    // Initial check - multiple attempts to ensure it works
    resetScroll();
    requestAnimationFrame(() => {
      resetScroll();
      updateButtons();
    });
    setTimeout(() => {
      resetScroll();
      updateButtons();
    }, 50);
    setTimeout(() => {
      resetScroll();
      updateButtons();
    }, 200);
    setTimeout(() => {
      resetScroll();
      updateButtons();
    }, 500);
    setTimeout(() => {
      resetScroll();
      updateButtons();
    }, 1000);

    // Mark as initialized
    breadcrumbNav.dataset.sliderInitialized = 'true';
  }

  // Initialize on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.breadcrumb-nav').forEach(initBreadcrumbSlider);
    });
  } else {
    document.querySelectorAll('.breadcrumb-nav').forEach(initBreadcrumbSlider);
  }

  // Re-initialize on dynamic content changes
  const observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      mutation.addedNodes.forEach(function(node) {
        if (node.nodeType === 1) {
          if (node.classList && node.classList.contains('breadcrumb-nav')) {
            initBreadcrumbSlider(node);
          }
          const breadcrumbNavs = node.querySelectorAll && node.querySelectorAll('.breadcrumb-nav');
          if (breadcrumbNavs) {
            breadcrumbNavs.forEach(initBreadcrumbSlider);
          }
        }
      });
    });
  });

  observer.observe(document.body, {
    childList: true,
    subtree: true
  });
})();

