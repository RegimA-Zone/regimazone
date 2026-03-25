/**
 * RZ Portal Sidebar — Injected on portal pages only
 * Targets: page-id-2540, 2541, 2542, 2543
 */
(function() {
  'use strict';

  var PORTAL_IDS = ['page-id-2540','page-id-2541','page-id-2542','page-id-2543'];
  var body = document.body;
  var isPortal = PORTAL_IDS.some(function(cls) { return body.classList.contains(cls); });
  if (!isPortal) return;

  var isMobile = function() { return window.innerWidth <= 820; };

  /* ─── Build sidebar HTML ─── */
  var sidebarHTML = [
    '<div class="rz-sidebar-backdrop" id="rzBackdrop"></div>',
    '<button class="rz-sidebar-trigger" id="rzMobileTrigger" aria-label="Open navigation">',
    '  <svg width="20" height="20" viewBox="0 0 20 20" fill="none">',
    '    <rect y="4" width="20" height="2" rx="1" fill="white"/>',
    '    <rect y="9" width="14" height="2" rx="1" fill="white"/>',
    '    <rect y="14" width="20" height="2" rx="1" fill="white"/>',
    '  </svg>',
    '</button>',
    '<div class="rz-sidebar-wrap">',
    '  <nav class="rz-sidebar" id="rzSidebar" aria-label="Portal navigation">',
    '    <a href="/" class="rz-sidebar__logo" title="RégimA Zone Home">',
    '      <span class="rz-sidebar__logo-icon">',
    '        <svg viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">',
    '          <circle cx="14" cy="14" r="13" stroke="#0066cc" stroke-width="1.5"/>',
    '          <path d="M8 9h7a4 4 0 0 1 0 8H8V9Z" fill="#0066cc" opacity="0.9"/>',
    '          <path d="M15 17l4 6" stroke="#00aaff" stroke-width="1.8" stroke-linecap="round"/>',
    '          <circle cx="14" cy="5" r="1.5" fill="#00aaff" opacity="0.6"/>',
    '        </svg>',
    '      </span>',
    '      <span class="rz-sidebar__logo-text">R\u00e9gimA<br>Zone</span>',
    '    </a>',
    '    <button class="rz-sidebar__toggle" id="rzToggle" aria-label="Toggle sidebar">',
    '      <span class="rz-sidebar__toggle-icon">',
    '        <svg width="10" height="10" viewBox="0 0 10 10" fill="none">',
    '          <path d="M3 2l4 3-4 3" stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>',
    '        </svg>',
    '      </span>',
    '    </button>',
    '    <div class="rz-sidebar__nav">',
    '      <div class="rz-sidebar__section-label">My Portals</div>',
    navItem('/customer-portal/', 'customer-portal', 'Customer Portal',
      '<circle cx="9" cy="6" r="3" stroke="currentColor" stroke-width="1.5"/><path d="M3 15c0-3.314 2.686-6 6-6s6 2.686 6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'),
    navItem('/training-portal/', 'training-portal', 'Training Portal',
      '<path d="M2 5l7-3 7 3-7 3-7-3Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M5 6.5v5l4 2 4-2V6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 5v4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'),
    navItem('/skintwin-ai/', 'skintwin-ai', 'SkinTwin AI',
      '<ellipse cx="9" cy="9" rx="4" ry="6" stroke="currentColor" stroke-width="1.5"/><path d="M5 9h8M9 3c-2 2-2 8 0 12M9 3c2 2 2 8 0 12" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>'),
    navItem('/distributor-portal/', 'distributor-portal', 'Distributor Portal',
      '<circle cx="9" cy="9" r="6" stroke="currentColor" stroke-width="1.5"/><path d="M3 9h12M9 3c-2.5 2-2.5 10 0 12M9 3c2.5 2 2.5 10 0 12" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>'),
    '      <div class="rz-sidebar__divider"></div>',
    '      <div class="rz-sidebar__section-label">Tools</div>',
    navItem('/slack-workspaces/', 'slack-workspaces', 'Slack Workspaces',
      '<rect x="2" y="2" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="10" y="2" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="2" y="10" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="10" y="10" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/>'),
    navItem('/products/', 'products', 'Products',
      '<path d="M3 4h12l-1.5 8H4.5L3 4Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><circle cx="6.5" cy="15" r="1" fill="currentColor"/><circle cx="12.5" cy="15" r="1" fill="currentColor"/><path d="M1 2h2l.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'),
    '      <div class="rz-sidebar__divider"></div>',
    '      <div class="rz-sidebar__section-label">Account</div>',
    navItem('/about-us/', 'about', 'About Us',
      '<circle cx="9" cy="9" r="6.5" stroke="currentColor" stroke-width="1.5"/><path d="M9 8v5M9 6v.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>'),
    navItem('/contact-us/', 'contact', 'Contact Us',
      '<path d="M2 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4Z" stroke="currentColor" stroke-width="1.5"/><path d="M2 5l7 5 7-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'),
    '    </div>',
    '    <div class="rz-sidebar__footer">',
    '      <a href="#logout" class="rz-sidebar__item" data-tip="Sign Out" style="color:#4a5a7a">',
    '        <span class="rz-sidebar__item-icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M7 3H3a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M12 6l3 3-3 3M7 9h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>',
    '        <span class="rz-sidebar__label">Sign Out</span>',
    '      </a>',
    '    </div>',
    '  </nav>',
    '</div>'
  ].join('\n');

  function navItem(href, page, label, svgInner) {
    return [
      '      <a href="' + href + '" class="rz-sidebar__item" data-tip="' + label + '" data-page="' + page + '">',
      '        <span class="rz-sidebar__item-icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none">' + svgInner + '</svg></span>',
      '        <span class="rz-sidebar__label">' + label + '</span>',
      '      </a>'
    ].join('\n');
  }

  /* ─── Inject into body ─── */
  var wrap = document.createElement('div');
  wrap.innerHTML = sidebarHTML;
  while (wrap.firstChild) {
    document.body.insertBefore(wrap.firstChild, document.body.firstChild);
  }

  /* ─── Wire up interactions ─── */
  var sidebar   = document.getElementById('rzSidebar');
  var toggle    = document.getElementById('rzToggle');
  var backdrop  = document.getElementById('rzBackdrop');
  var mobileTrg = document.getElementById('rzMobileTrigger');

  if (!sidebar) return;

  /* Active page highlight */
  var path = window.location.pathname.replace(/^\/|\/$/g, '');
  document.querySelectorAll('.rz-sidebar__item[data-page]').forEach(function(el) {
    var pg = el.getAttribute('data-page');
    if (path === pg || path.indexOf(pg) === 0) el.classList.add('is-active');
  });

  /* Body offset */
  function setBodyOffset() {
    if (isMobile()) return;
    body.classList.add('rz-sidebar-ready');
    if (sidebar.classList.contains('is-expanded')) {
      body.classList.add('rz-sidebar-open');
    } else {
      body.classList.remove('rz-sidebar-open');
    }
  }

  /* Hover */
  if (!isMobile()) {
    var sidebarWrap = sidebar.parentElement;
    sidebarWrap.addEventListener('mouseenter', function() { body.classList.add('rz-sidebar-open'); });
    sidebarWrap.addEventListener('mouseleave', function() {
      if (!sidebar.classList.contains('is-expanded')) body.classList.remove('rz-sidebar-open');
    });
  }

  /* Toggle */
  if (toggle) {
    toggle.addEventListener('click', function(e) {
      e.stopPropagation();
      sidebar.classList.toggle('is-expanded');
      setBodyOffset();
    });
  }

  /* Mobile */
  if (mobileTrg) {
    mobileTrg.addEventListener('click', function() {
      sidebar.classList.add('is-expanded');
      backdrop.classList.add('is-visible');
    });
  }
  if (backdrop) {
    backdrop.addEventListener('click', function() {
      sidebar.classList.remove('is-expanded');
      backdrop.classList.remove('is-visible');
    });
  }
  document.querySelectorAll('.rz-sidebar__item').forEach(function(el) {
    el.addEventListener('click', function() {
      if (isMobile()) {
        sidebar.classList.remove('is-expanded');
        backdrop.classList.remove('is-visible');
      }
    });
  });

  /* Persist */
  var stored = sessionStorage.getItem('rzSidebarExpanded');
  if (stored === 'true' && !isMobile()) sidebar.classList.add('is-expanded');
  setBodyOffset();

  sidebar.addEventListener('transitionend', function() {
    if (!isMobile()) {
      sessionStorage.setItem('rzSidebarExpanded', sidebar.classList.contains('is-expanded'));
      setBodyOffset();
    }
  });

})();
