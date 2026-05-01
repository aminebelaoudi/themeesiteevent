/**
 * EasyEvents Group — Main JS
 * Vanilla JavaScript (no React/Vue/heavy frameworks)
 */
(function () {
  'use strict';

  /* ── Navbar scroll detection ─────────────────────── */
  const header = document.querySelector('.site-header');
  if (header) {
    const toggle = () => {
      header.classList.toggle('site-header--scrolled', window.scrollY > 20);
      header.classList.toggle('glass-nav', window.scrollY > 20);
    };
    window.addEventListener('scroll', toggle, { passive: true });
    toggle();
  }

  /* ── Mobile menu ─────────────────────────────────── */
  const burger = document.querySelector('.mobile-toggle');
  const mobileMenu = document.querySelector('.mobile-menu');
  const body = document.body;
  if (burger && mobileMenu) {
    const closeMobileMenu = () => {
      mobileMenu.classList.remove('mobile-menu--open');
      body.classList.remove('menu-open');
      burger.setAttribute('aria-expanded', 'false');
    };

    const openMobileMenu = () => {
      mobileMenu.classList.add('mobile-menu--open');
      body.classList.add('menu-open');
      burger.setAttribute('aria-expanded', 'true');
    };

    burger.addEventListener('click', (e) => {
      e.stopPropagation();
      const expanded = mobileMenu.classList.contains('mobile-menu--open');
      if (expanded) {
        closeMobileMenu();
      } else {
        openMobileMenu();
      }
    });

    // Close on link click
    mobileMenu.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', closeMobileMenu);
    });

    // Close when clicking outside menu/header
    document.addEventListener('click', (e) => {
      if (!mobileMenu.classList.contains('mobile-menu--open')) return;
      const target = e.target;
      if (!target) return;
      if (!mobileMenu.contains(target) && !burger.contains(target)) {
        closeMobileMenu();
      }
    });

    // Escape key support
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeMobileMenu();
    });

    // Ensure clean state when switching to desktop
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 768) closeMobileMenu();
    });

    // Keep aria state synchronized if menu class is changed elsewhere
    const syncExpanded = () => {
      const expanded = mobileMenu.classList.contains('mobile-menu--open');
      burger.setAttribute('aria-expanded', String(expanded));
    };
    syncExpanded();
  }

  /* ── Scroll-triggered animations (IntersectionObserver) ── */
  var scrollObserver = null;
  const animEls = document.querySelectorAll('.animate-on-scroll');
  if (animEls.length && 'IntersectionObserver' in window) {
    scrollObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            scrollObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );
    animEls.forEach((el) => scrollObserver.observe(el));
  }

  /* ── Blog horizontal scroll (prev/next buttons) ──── */
  const blogTrack = document.querySelector('.blog-track');
  const blogPrev = document.querySelector('[data-blog-prev]');
  const blogNext = document.querySelector('[data-blog-next]');
  if (blogTrack) {
    const scrollAmount = 504; // card width + gap
    if (blogPrev) blogPrev.addEventListener('click', () => blogTrack.scrollBy({ left: -scrollAmount, behavior: 'smooth' }));
    if (blogNext) blogNext.addEventListener('click', () => blogTrack.scrollBy({ left: scrollAmount, behavior: 'smooth' }));
  }

  /* ── Cross-sell services slider (single post) ── */
  const crosssellTrack = document.querySelector('[data-crosssell-track]');
  const crosssellPrev = document.querySelector('[data-crosssell-prev]');
  const crosssellNext = document.querySelector('[data-crosssell-next]');
  if (crosssellTrack) {
    const scrollAmount = 380;
    if (crosssellPrev) crosssellPrev.addEventListener('click', () => crosssellTrack.scrollBy({ left: -scrollAmount, behavior: 'smooth' }));
    if (crosssellNext) crosssellNext.addEventListener('click', () => crosssellTrack.scrollBy({ left: scrollAmount, behavior: 'smooth' }));
  }

  /* ── Showcase filter tabs ────────────────────────── */
  const filterBtns = document.querySelectorAll('[data-filter]');
  const showcaseItems = document.querySelectorAll('[data-category]');
  if (filterBtns.length && showcaseItems.length) {
    filterBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        const filter = btn.getAttribute('data-filter');
        filterBtns.forEach((b) => b.classList.remove('filter-tab--active'));
        btn.classList.add('filter-tab--active');
        showcaseItems.forEach((item) => {
          const cat = item.getAttribute('data-category');
          if (filter === 'all' || cat === filter) {
            item.style.display = '';
            item.style.opacity = '0';
            item.style.transform = 'scale(0.94)';
            requestAnimationFrame(() => {
              item.style.transition = 'all .3s ease';
              item.style.opacity = '1';
              item.style.transform = 'scale(1)';
            });
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  }

  /* ── Smooth scroll for anchor links ──────────────── */
  document.querySelectorAll('a[href^="#"]').forEach((a) => {
    a.addEventListener('click', (e) => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  /* ── FAQ accordion ───────────────────────────────── */
  document.querySelectorAll('.faq-trigger').forEach((trigger) => {
    trigger.addEventListener('click', () => {
      const item = trigger.closest('.faq-item');
      if (!item) return;
      const isOpen = item.classList.contains('faq-item--open');
      // Close all siblings
      const parent = item.parentElement;
      if (parent) {
        parent.querySelectorAll('.faq-item--open').forEach((el) => el.classList.remove('faq-item--open'));
      }
      // Toggle current
      if (!isOpen) item.classList.add('faq-item--open');
    });
  });

  /* ── Generic accordion blocks ────────────────────── */
  document.querySelectorAll('.accordion-trigger').forEach((trigger) => {
    trigger.addEventListener('click', () => {
      const block = trigger.closest('.accordion-block');
      if (block) block.classList.toggle('is-open');
    });
  });

  /* ── Product tabs (EasyFlash / EasyChallenge) ────── */
  document.querySelectorAll('.product-tab').forEach((tab) => {
    tab.addEventListener('click', () => {
      // Support both current markup (data-panel + panel id)
      // and legacy markup (data-tab + panel data-panel).
      const panelId = tab.getAttribute('data-panel') || tab.getAttribute('data-tab');
      if (!panelId) return;
      const container = tab.closest('.svc-section') || tab.closest('section');
      if (!container) return;
      // Deactivate all tabs & panels
      container.querySelectorAll('.product-tab').forEach((t) => t.classList.remove('product-tab--active'));
      container.querySelectorAll('.product-panel').forEach((p) => p.classList.remove('product-panel--active'));
      // Activate
      tab.classList.add('product-tab--active');
      let panel = null;
      try {
        panel = container.querySelector('#' + panelId);
      } catch (e) {
        panel = null;
      }
      if (!panel) {
        panel = container.querySelector('.product-panel[data-panel="' + panelId + '"]');
      }
      if (panel) panel.classList.add('product-panel--active');
    });
  });

  /* ── Hero parallax + fade on scroll ─────────────── */
  var heroSection = document.querySelector('.service-hero--parallax');
  if (heroSection) {
    var heroBg = heroSection.querySelector('.service-hero__bg');
    var heroContent = heroSection.querySelector('.service-hero__content');
    var heroImg = heroSection.querySelector('.service-hero__img');
    var ticking = false;

    function updateHeroParallax() {
      var rect = heroSection.getBoundingClientRect();
      var sectionH = heroSection.offsetHeight;
      var scrolled = Math.max(0, -rect.top);
      var progress = Math.min(1, scrolled / sectionH);

      // Image: translateY 0→18% and scale 1→1.1
      var imgY = progress * 18;
      var imgScale = 1 + progress * 0.1;
      if (heroImg) {
        heroImg.style.transform = 'translateY(' + imgY + '%) scale(' + imgScale + ')';
      }

      // Content: fade out as user scrolls (opacity 1→0 at ~55% scroll)
      var fadeProgress = Math.min(1, progress / 0.55);
      var contentOpacity = Math.max(0, 1 - fadeProgress);
      if (heroContent) {
        heroContent.style.opacity = contentOpacity;
      }

      ticking = false;
    }

    window.addEventListener('scroll', function () {
      if (!ticking) {
        requestAnimationFrame(updateHeroParallax);
        ticking = true;
      }
    }, { passive: true });
    updateHeroParallax();
  }

  /* ── Main tabs with animation (EasyFlair) ──────── */
  document.querySelectorAll('.main-tab').forEach((tab) => {
    tab.addEventListener('click', () => {
      const panelId = tab.getAttribute('data-tab') || tab.getAttribute('data-panel');
      if (!panelId) return;
      const container = tab.closest('.svc-section') || tab.closest('section');
      if (!container) return;
      const tabsBar = tab.closest('.main-tabs');
      const beforeTop = tabsBar ? tabsBar.getBoundingClientRect().top : null;
      container.querySelectorAll('.main-tab').forEach((t) => t.classList.remove('main-tab--active'));
      container.querySelectorAll('.main-panel').forEach((p) => p.classList.remove('main-panel--active'));
      tab.classList.add('main-tab--active');
      let panel = null;
      try {
        panel = container.querySelector('#' + panelId);
      } catch (e) {
        panel = null;
      }
      if (!panel) {
        panel = container.querySelector('.main-panel[data-panel="' + panelId + '"]');
      }
      if (panel) {
        panel.classList.add('main-panel--active');
        // Instantly reveal animate-on-scroll children so they don't replay entrance animation
        panel.querySelectorAll('.animate-on-scroll').forEach(function (el) {
          el.classList.add('is-visible');
          if (scrollObserver) scrollObserver.unobserve(el);
        });
      }
      if (tabsBar && beforeTop !== null) {
        requestAnimationFrame(() => {
          const afterTop = tabsBar.getBoundingClientRect().top;
          const delta = afterTop - beforeTop;
          if (Math.abs(delta) > 1) {
            window.scrollBy(0, delta);
          }
        });
      }
    });
  });

  /* ── Sub-tabs (EasyFlair Ateliers) ───────────────── */
  document.querySelectorAll('.sub-tab').forEach((tab) => {
    tab.addEventListener('click', () => {
      const panelId = tab.getAttribute('data-subtab') || tab.getAttribute('data-panel');
      if (!panelId) return;
      const container = tab.closest('.main-panel') || tab.closest('section');
      if (!container) return;
      const tabsBar = tab.closest('.sub-tabs');
      const beforeTop = tabsBar ? tabsBar.getBoundingClientRect().top : null;
      container.querySelectorAll('.sub-tab').forEach((t) => t.classList.remove('sub-tab--active'));
      container.querySelectorAll('.sub-panel').forEach((p) => p.classList.remove('sub-panel--active'));
      tab.classList.add('sub-tab--active');
      let panel = null;
      try {
        panel = container.querySelector('#' + panelId);
      } catch (e) {
        panel = null;
      }
      if (!panel) {
        panel = container.querySelector('.sub-panel[data-panel="' + panelId + '"]');
      }
      if (panel) {
        panel.classList.add('sub-panel--active');
        // Instantly reveal animate-on-scroll children so they don't replay entrance animation
        panel.querySelectorAll('.animate-on-scroll').forEach(function (el) {
          el.classList.add('is-visible');
          if (scrollObserver) scrollObserver.unobserve(el);
        });
      }
      if (tabsBar && beforeTop !== null) {
        requestAnimationFrame(() => {
          const afterTop = tabsBar.getBoundingClientRect().top;
          const delta = afterTop - beforeTop;
          if (Math.abs(delta) > 1) {
            window.scrollBy(0, delta);
          }
        });
      }
    });
  });

  /* ── Intro image parallax (EasyRelax) ─────────── */
  var introParallaxImg = document.querySelector('.intro-image--parallax');
  if (introParallaxImg) {
    var introSection = introParallaxImg.closest('.svc-section') || introParallaxImg.closest('section');
    var introTicking = false;
    function updateIntroParallax() {
      if (!introSection) { introTicking = false; return; }
      var rect = introSection.getBoundingClientRect();
      var wh = window.innerHeight;
      var secH = introSection.offsetHeight;
      // progress 0 when section enters bottom, 1 when it leaves top
      var raw = (wh - rect.top) / (wh + secH);
      var progress = Math.max(0, Math.min(1, raw));
      // map 0→50px, 1→-50px (spring-like smooth via CSS or rAF)
      var yPx = 50 - progress * 100;
      introParallaxImg.style.transform = 'translateY(' + yPx + 'px)';
      introTicking = false;
    }
    window.addEventListener('scroll', function () {
      if (!introTicking) { requestAnimationFrame(updateIntroParallax); introTicking = true; }
    }, { passive: true });
    updateIntroParallax();
  }

  /* ── Gallery scroll-driven parallax (EasyRelax – desktop) ── */
  var gallerySec = document.querySelector('.gallery-section');
  var galleryTrack = document.querySelector('.gallery-track');
  if (gallerySec && galleryTrack) {
    // Desktop: scroll-driven horizontal parallax
    var galleryTicking = false;
    function updateGalleryParallax() {
      if (window.innerWidth < 768) { galleryTrack.style.transform = ''; galleryTicking = false; return; }
      var rect = gallerySec.getBoundingClientRect();
      var wh = window.innerHeight;
      var secH = gallerySec.offsetHeight;
      // progress 0 when section enters viewport bottom, 1 when it leaves top
      var raw = (wh - rect.top) / (wh + secH);
      var progress = Math.max(0, Math.min(1, raw));
      // map 0→40%, 0.5→0%, 1→-40%
      var xPercent = 40 - progress * 80;
      galleryTrack.style.transform = 'translateX(' + xPercent + '%)';
      galleryTicking = false;
    }
    window.addEventListener('scroll', function () {
      if (!galleryTicking) { requestAnimationFrame(updateGalleryParallax); galleryTicking = true; }
    }, { passive: true });
    window.addEventListener('resize', function () { requestAnimationFrame(updateGalleryParallax); }, { passive: true });
    updateGalleryParallax();

    // Mobile: drag to scroll
    let isDown = false, startX, scrollLeft;
    galleryTrack.addEventListener('mousedown', (e) => { isDown = true; startX = e.pageX - galleryTrack.offsetLeft; scrollLeft = galleryTrack.scrollLeft; });
    galleryTrack.addEventListener('mouseleave', () => { isDown = false; });
    galleryTrack.addEventListener('mouseup', () => { isDown = false; });
    galleryTrack.addEventListener('mousemove', (e) => { if (!isDown) return; e.preventDefault(); const x = e.pageX - galleryTrack.offsetLeft; galleryTrack.scrollLeft = scrollLeft - (x - startX) * 1.5; });
  }

  /* ── Restaurant auto-fade slider ──────────────────── */
  document.querySelectorAll('.restaurant-slider').forEach(function (slider) {
    var imgs = slider.querySelectorAll('.restaurant-slider__img');
    if (imgs.length <= 1) return;
    var idx = 0;
    var interval = parseInt(slider.getAttribute('data-interval') || '5000', 10);
    setInterval(function () {
      imgs[idx].style.opacity = '0';
      imgs[idx].classList.remove('restaurant-slider__img--active');
      idx = (idx + 1) % imgs.length;
      imgs[idx].style.opacity = '1';
      imgs[idx].classList.add('restaurant-slider__img--active');
    }, interval);
  });

})();
