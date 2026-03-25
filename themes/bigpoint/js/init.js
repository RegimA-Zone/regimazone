(function($) {

"use strict";
/*global Modernizr, jQuery */
/*jslint bitwise: true */

var LOLLUM = {};

Modernizr.addTest('firefox', function () {
	return !!navigator.userAgent.match(/firefox/i);
});
Modernizr.addTest('safari', function () {
	return !!(navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1);
});

/*-----------------------------------------------------------------------------------*/
/*	Logo Retina
/*-----------------------------------------------------------------------------------*/
LOLLUM.logoRetina = function() {
	if ($("#retina-logo").length > 0) {
		var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1,
			desktopLogo = $('#desktop-logo'),
			retinaLogo = $('#retina-logo'),
			logoWidth = desktopLogo.width(),
			logoHeight = desktopLogo.height();
		if (pixelRatio > 1) {
			retinaLogo.attr({height: logoHeight, width: logoWidth});
			retinaLogo.css('display', 'inline-block');
			desktopLogo.hide();
		}
	}
};
/*-----------------------------------------------------------------------------------*/
/*	Navigation Menu
/*-----------------------------------------------------------------------------------*/
LOLLUM.submenu = function() {
	$('#nav-menu .sf-menu').find('.megamenu_wrap').find('ul').addClass('sub-mega');
	$('#nav-menu .sf-menu').superfish({
		popUpSelector: 'ul,.sf-mega,.megamenu_wrap',
		autoArrows: false,
		delay: 500,
		speed: 200,
		speedOut: 200,
		useClick: false
	});
};
/*-----------------------------------------------------------------------------------*/
/*	Sticky Header
/*-----------------------------------------------------------------------------------*/
LOLLUM.sticky = function() {
	var t = 30,
		body = $(document.documentElement);
	$(window).scroll(resizeHeader);
	$(window).resize(function(){
		resizeHeader();
	});
	function resizeHeader() {
		if ($(window).width() > 991) {
			var st = $(window).scrollTop();
			if (st > t) {
				body.addClass('fixed-yes');
			} else {
				body.removeClass('fixed-yes');
			}
		} else {
			body.removeClass('fixed-yes');
		}
	}
};
/*-----------------------------------------------------------------------------------*/
/*	Mobile Menu
/*-----------------------------------------------------------------------------------*/
LOLLUM.mobileMenu = function() {
	$('#mobile-primary-menu').customSelect({customClass:'mobile-select'});
	$('.mobile-nav-menu-inner').css('visibility', 'visible').animate({opacity: 1.0}, 200);
	$('#mobile-primary-menu').on('change', function() {
		window.location = $(this).val();
	});
};
/*-----------------------------------------------------------------------------------*/
/*	fitVids
/*-----------------------------------------------------------------------------------*/
LOLLUM.rVideos = function() {
	$(".entry-video, .video-widget, .entry-content").fitVids({
		customSelector: "iframe[src^='http://www.screenr.com']"
	});
};
/*-----------------------------------------------------------------------------------*/
/*	Flexslider
/*-----------------------------------------------------------------------------------*/
LOLLUM.flex = function() {
	if(jQuery().flexslider) {
		$('.flex-gallery').flexslider({
			controlNav: false,
			slideshowSpeed: 4000,
			animation: "fade",
			animationSpeed: 600,
			// smoothHeight:true,
			start: function(slider) {
				slider.find('.preloader').hide();
			}
		});
		$('.flex-testimonial').flexslider({
			controlNav: false,
			prevText: "",
			nextText: "",
			slideshowSpeed: 8000,
			animation: "slide",
			smoothHeight:true,
			animationSpeed: 600,
			start: function(slider) {
				slider.find('.preloader').hide();
			}
		});
		$('.flex-product').flexslider({
			manualControls: ".thumbnails-nav img",
			slideshow: false,
			animation: "fade",
			// smoothHeight:true,
			animationSpeed: 600,
			start: function(slider) {
				slider.find('.preloader').hide();
			}
		});
	}
};
/*-----------------------------------------------------------------------------------*/
/*	Toggles
/*-----------------------------------------------------------------------------------*/
LOLLUM.toggle = function() {
	var lolToggle = $('.lol-toggle'),
		toggleContents = $('.lol-toggle').find('.lol-toggle-content');
	toggleContents.not('[data-toggle="open"]').css('display', 'none');
	lolToggle.on('click', '.lol-toggle-header', function(){
		var toggleContent = $(this).next('.lol-toggle-content'),
			toggleIcon = $(this).find('.lol-icon-toggle'),
			iconOpen = '<i class="fa fa-chevron-down"></i>',
			iconClose = '<i class="fa fa-chevron-up"></i>';
		toggleContent.slideToggle();
		if (toggleIcon.hasClass('open')) {
			toggleIcon.removeClass('open');
			toggleIcon.html(iconOpen);
		} else {
			toggleIcon.addClass('open');
			toggleIcon.html(iconClose);
		}
	});
};
/*-----------------------------------------------------------------------------------*/
/*	FAQs
/*-----------------------------------------------------------------------------------*/
LOLLUM.faq = function() {
	var lolFaq = $('.lol-faq'),
		faqContents = $('.lol-faq').find('.lol-faq-content'),
		sortFaq = $('.faqs-select select');
	faqContents.css('display', 'none');
	lolFaq.on('click', '.lol-faq-header', function(){
		var faqContent = $(this).next('.lol-faq-content'),
			faqIcon = $(this).find('.lol-icon-faq'),
			iconOpen = 'Q',
			iconClose = 'A';
		faqContent.slideToggle();
		if ($(this).hasClass('open')) {
			$(this).removeClass('open');
			faqIcon.html(iconOpen);
		} else {
			$(this).addClass('open');
			faqIcon.html(iconClose);
		}
	});
	sortFaq.change(function(){
		var selector = $(this).val();
		if (selector !== '*') {
			$('.lol-faq-wrap .lol-faq').not('[data-filter~="'+selector+'"]').slideUp('normal', function(){
				$('.lol-faq-wrap .lol-faq').filter('[data-filter~="'+selector+'"]').slideDown();
			});
		} else {
			$('.lol-faq-wrap .lol-faq').slideDown();
		}
	});
	$('.faqs-tabs').find('a').on('click', function(e){
		e.preventDefault();
		var selector = $(this).attr('data-filter');
		if (selector !== '*') {
			$('.lol-faq-wrap .lol-faq').not('[data-filter="'+selector+' "]').slideUp('normal', function(){
				$('.lol-faq-wrap .lol-faq').filter('[data-filter="'+selector+' "]').slideDown();
			});
		} else {
			$('.lol-faq-wrap .lol-faq').slideDown();
		}
		$(this).parents('ul').find('li').removeClass('active');
		$(this).parent().addClass('active');
	});
	$('#lol-faq-topics li a, .back-faqs').on('click', function(e){
		e.preventDefault();
		var target = this.hash,
		$target = $(target);
		$('html, body').stop().animate({
		'scrollTop': $target.offset().top
		}, 600, 'easeOutCirc', function () {
			window.location.hash = target;
		});
	});
};
/*-----------------------------------------------------------------------------------*/
/*	Placeholder Support
/*-----------------------------------------------------------------------------------*/
LOLLUM.placeholder = function() {
	if(!Modernizr.input.placeholder){
		$('[placeholder]').focus(function() {
			var input = $(this);
			if (input.val() === input.attr('placeholder')) {
				input.val('');
				input.removeClass('placeholder');
			}
		}).blur(function() {
			var input = $(this);
			if (input.val() === '' || input.val() === input.attr('placeholder')) {
				input.addClass('placeholder');
				input.val(input.attr('placeholder'));
			}
		}).blur();
		$('[placeholder]').parents('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() === input.attr('placeholder')) {
					input.val('');
				}
			});
		});
	}
};
/*-----------------------------------------------------------------------------------*/
/*	Filterable Portfolio
/*-----------------------------------------------------------------------------------*/
LOLLUM.isotope = function() {
	if(jQuery().isotope) {
		var itemsContainer = $('.section-filterable'),
			portfolioFilter = $('.portfolio-filter select'),
			layoutMode = 'fitRows';
		if (itemsContainer.hasClass('full-portfolio-wrap')) {
			layoutMode = 'sloppyMasonry';
		}
		itemsContainer.isotope({
			itemSelector: '.portfolio-item',
			layoutMode: layoutMode
		});
		portfolioFilter.change(function(){
			var selector = $(this).val();
			itemsContainer.isotope({ filter: selector });
		});
		$('.portfolio-tabs').find('a').on('click', function(e){
			e.preventDefault();
			var selector = $(this).attr('data-filter');
			itemsContainer.isotope({ filter: selector });
			$(this).parents('ul').find('li').removeClass('active');
			$(this).parent().addClass('active');		
		});
	}
};
/*-----------------------------------------------------------------------------------*/
/* Back to Top
/*-----------------------------------------------------------------------------------*/
LOLLUM.backTop = function() {
	var windowWidth = $(window).width();
	if (windowWidth > 1023) {
		var didScroll = false;
		$(window).scroll(function () {
			didScroll = true;
		});
		setInterval(function () {
			if (didScroll) {
				didScroll = false;
				if ($(this).scrollTop() > 200) {
					$('#back-top').fadeIn();
				} else {
					$('#back-top').fadeOut();
				}
			}
		}, 250);
		$('#back-top').click(function() {
			$('body,html').animate({
				scrollTop: 0
			}, 300);
			return false;
		});
	}
};
/*-----------------------------------------------------------------------------------*/
/*	Timer
/*-----------------------------------------------------------------------------------*/
LOLLUM.timer = function() {
	var daysDiv = document.getElementById("days"),
		hoursDiv = document.getElementById("hours"),
		minutesDiv = document.getElementById("minutes"),
		secondsDiv = document.getElementById("seconds"),
		totalSeconds,
		days,
		hours,
		minutes,
		seconds;
	function pad(num, size) {
		var s = num + "";
		while (s.length < size) {
			s = "0" + s;
		}
		return s;
	}
	function updateTime(){
		days = Math.floor((totalSeconds) / 86400);
		hours = Math.floor((totalSeconds % 86400) / 3600);
		minutes = Math.floor(((totalSeconds % 86400) % 3600) / 60);
		seconds = Math.floor(((totalSeconds % 86400) % 3600) % 60);
	}
	function updateDisplay(){
		daysDiv.innerHTML = pad(days, 2);
		hoursDiv.innerHTML = pad(hours, 2);
		minutesDiv.innerHTML = pad(minutes, 2);
		secondsDiv.innerHTML = pad(seconds, 2);
	}
	function countdown(){
		updateTime();
		updateDisplay();
		if (totalSeconds === 0){
			$('#countdown-wrap').fadeOut('slow', function() {
			$('#count-end').fadeIn();

			});
		} else {
			totalSeconds -= 1;
			window.setTimeout(countdown, 1000);
		}
	}
	function initCountdown(tSeconds){
		totalSeconds = tSeconds;
		countdown();
	}
	$('#countdown').each(function() {
		var tSeconds = $(this).data('countdown');
		initCountdown(tSeconds);
	});
};
/*-----------------------------------------------------------------------------------*/
/*	Skills
/*-----------------------------------------------------------------------------------*/
LOLLUM.animationsA = function() {
	$('.lol-skill').find('.lol-bar').appear(function() {
		var currentSkill = $(this);
		var w = currentSkill.data("skill");
		$(this).animate({width: w + "%"}, 600, 'easeInOutCirc');
	});
	if(jQuery().countTo) {
		$('.progress-number').appear(function() {
			$('.timer').countTo();
		});
	}
};
/*-----------------------------------------------------------------------------------*/
/*	Image Animations
/*-----------------------------------------------------------------------------------*/
LOLLUM.animationsB = function() {
	$('.lol-item-heading, .lol-item-heading-small, .lol-item-heading-parallax').appear(function() {
		$(this).children('h2').addClass('animated bounceInLeft done');
		$(this).children('p').addClass('animated bounceInRight done');
	});
	var specialImgs = $('#logo, .lol-item-block-feature, .lol-item-block-banner, .map-canvas-wrapper, .entry-video, .entry-audio, .dribbble-widget, .dribbble-dribbble-widget, .flickr-widget, .footer-dribbble-widget, #payment').find('img'),
		imgs = $('#wrap').find('img').not(specialImgs);
	imgs.appear(function() {
		$(this).addClass('animated fadeIn img-done');
	});
	$('.service-icon').parents('.row').appear(function() {
		$(this).find('.service-icon').each(function(i){
			var currentIcon = $(this);
			setTimeout(function(){
				currentIcon.addClass('animated bounceIn done');
			}, i * 200);
		});
	});
	$('.mini-service-icon').appear(function() {
		$(this).addClass('animated bounceIn done');
	});
	$('.lol-item-block-feature').find('img').appear(function() {
		$(this).addClass('animated bounceIn done');
	});
	$('.lol-item-block-banner').appear(function() {
		$(this).find('img').addClass('animated bounceInLeft done');
		$(this).find('.block-banner-content').addClass('animated bounceInRight done');
	});
};
/*-----------------------------------------------------------------------------------*/
/*	Parallax
/*-----------------------------------------------------------------------------------*/
LOLLUM.bgParallax = function() {
	if(jQuery().parallax) {
		$('.parallax-yes').each(function() {
			$(this).parallax("49%", 0.3);
		});
		$(window).resize(function(){
			$('.parallax-yes').each(function() {
				$(this).parallax("49%", 0.3);
			});
		});
	}
};
/*-----------------------------------------------------------------------------------*/
/*	Preloader
/*-----------------------------------------------------------------------------------*/
LOLLUM.preloader = function() {
	if(jQuery().jpreLoader) {
		$('body').jpreLoader({
			showSplash: true,
			splashID: '#splash',
			showPercentage: false,
			splashFunction: function() {
				$('.spinner').animate({'opacity' : 1}, 800, 'easeOutExpo');
			}
		}, function() {
			$('.spinner').animate({'opacity' : 0}, 800, 'easeOutExpo', function() {
				$(this).hide();
				setTimeout(function() {
					$('#bgsplash').addClass('loaded');
				}, 300);
			});
		});
	}
};
/*-----------------------------------------------------------------------------------*/
/*	prettyPhoto
/*-----------------------------------------------------------------------------------*/
LOLLUM.pretty = function() {
	if(jQuery().prettyPhoto) {
		$('.lol-item-image').find('a[data-rel^="prettyPhoto"]').prettyPhoto({
			deeplinking: false,
			social_tools: false,
			show_title: false
		});
	}
};
/*-----------------------------------------------------------------------------------*/
/*	Slider Link
/*-----------------------------------------------------------------------------------*/
LOLLUM.sliderNav = function() {
	var sliderLink = $('.link-slider').find('a'),
		t = 0;
	if ($(document.documentElement).hasClass('lol-sticky-header-yes')) {
		t = $('#branding').height();
	}
	sliderLink.on('click', function() {
		var target = this.hash,
		$target = $(target);
		$('html, body').stop().animate({
			'scrollTop': $target.offset().top - t
		}, 1000, 'easeOutCirc');
		return false;
	});
};
/*-----------------------------------------------------------------------------------*/
/*	Checkout Height
/*-----------------------------------------------------------------------------------*/
LOLLUM.checkoutHeight = function() {
	var h = $('#order-review-wrap').height();
	$('form.checkout').css('min-height', h);
};
/*-----------------------------------------------------------------------------------*/
/*	Init Functions
/*-----------------------------------------------------------------------------------*/
$(document).ready(function() {
	if ($(document.documentElement).hasClass('lol-preloader-yes')) {
		LOLLUM.preloader();
	}
	LOLLUM.submenu();
	LOLLUM.mobileMenu();
	LOLLUM.rVideos();
	LOLLUM.flex();
	LOLLUM.toggle();
	LOLLUM.faq();
	LOLLUM.placeholder();
	LOLLUM.bgParallax();
	LOLLUM.timer();
	LOLLUM.pretty();
	LOLLUM.backTop();
	LOLLUM.sliderNav();
	LOLLUM.animationsA();
	LOLLUM.checkoutHeight();
	if ((!Modernizr.touch) && ($(document.documentElement).hasClass('lol-sticky-header-yes')) && ($(document.documentElement).hasClass('lol-top-header-yes'))) {
		LOLLUM.sticky();
	}
	if ($(document.documentElement).hasClass('lol-animations-yes')) {
		if (Modernizr.touch && $(document.documentElement).hasClass('lol-animations-touch-yes')) {
			LOLLUM.animationsB();
		} else if (!Modernizr.touch) {
			LOLLUM.animationsB();
		}
	}
});
$(window).load(function() {
	LOLLUM.logoRetina();
	if (!$(document.documentElement).hasClass('lt-ie9')) {
		LOLLUM.isotope();
	}
});

})(jQuery);

/* ─── RZ Portal Sidebar ──────────────────────────────────── */
(function(){
'use strict';
var PIDS=['page-id-2540','page-id-2541','page-id-2542','page-id-2543'];
var b=document.body;
if(!PIDS.some(function(c){return b.classList.contains(c);}))return;
var isMob=function(){return window.innerWidth<=820;};
/* Build HTML */
function ni(href,page,label,svg){return'<a href="'+href+'" class="rz-sidebar__item" data-tip="'+label+'" data-page="'+page+'"><span class="rz-sidebar__item-icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none">'+svg+'</svg></span><span class="rz-sidebar__label">'+label+'</span></a>';}
var html=[
'<div class="rz-sidebar-backdrop" id="rzBackdrop"></div>',
'<button class="rz-sidebar-trigger" id="rzMobileTrigger" aria-label="Open navigation"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect y="4" width="20" height="2" rx="1" fill="white"/><rect y="9" width="14" height="2" rx="1" fill="white"/><rect y="14" width="20" height="2" rx="1" fill="white"/></svg></button>',
'<div class="rz-sidebar-wrap"><nav class="rz-sidebar" id="rzSidebar" aria-label="Portal navigation">',
'<a href="/" class="rz-sidebar__logo" title="R\u00e9gimA Zone Home"><span class="rz-sidebar__logo-icon"><svg viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="13" stroke="#0066cc" stroke-width="1.5"/><path d="M8 9h7a4 4 0 0 1 0 8H8V9Z" fill="#0066cc" opacity=".9"/><path d="M15 17l4 6" stroke="#00aaff" stroke-width="1.8" stroke-linecap="round"/><circle cx="14" cy="5" r="1.5" fill="#00aaff" opacity=".6"/></svg></span><span class="rz-sidebar__logo-text">R\u00e9gimA<br>Zone</span></a>',
'<button class="rz-sidebar__toggle" id="rzToggle" aria-label="Toggle sidebar"><span class="rz-sidebar__toggle-icon"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M3 2l4 3-4 3" stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span></button>',
'<div class="rz-sidebar__nav">',
'<div class="rz-sidebar__section-label">My Portals</div>',
ni('/customer-portal/','customer-portal','Customer Portal','<circle cx="9" cy="6" r="3" stroke="currentColor" stroke-width="1.5"/><path d="M3 15c0-3.314 2.686-6 6-6s6 2.686 6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'),
ni('/training-portal/','training-portal','Training Portal','<path d="M2 5l7-3 7 3-7 3-7-3Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M5 6.5v5l4 2 4-2V6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 5v4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'),
ni('/skintwin-ai/','skintwin-ai','SkinTwin AI','<ellipse cx="9" cy="9" rx="4" ry="6" stroke="currentColor" stroke-width="1.5"/><path d="M5 9h8M9 3c-2 2-2 8 0 12M9 3c2 2 2 8 0 12" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>'),
ni('/distributor-portal/','distributor-portal','Distributor Portal','<circle cx="9" cy="9" r="6" stroke="currentColor" stroke-width="1.5"/><path d="M3 9h12M9 3c-2.5 2-2.5 10 0 12M9 3c2.5 2 2.5 10 0 12" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>'),
'<div class="rz-sidebar__divider"></div><div class="rz-sidebar__section-label">Tools</div>',
ni('/slack-workspaces/','slack-workspaces','Slack Workspaces','<rect x="2" y="2" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="10" y="2" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="2" y="10" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="10" y="10" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/>'),
ni('/products/','products','Products','<path d="M3 4h12l-1.5 8H4.5L3 4Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><circle cx="6.5" cy="15" r="1" fill="currentColor"/><circle cx="12.5" cy="15" r="1" fill="currentColor"/><path d="M1 2h2l.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'),
'<div class="rz-sidebar__divider"></div><div class="rz-sidebar__section-label">Account</div>',
ni('/about-us/','about','About Us','<circle cx="9" cy="9" r="6.5" stroke="currentColor" stroke-width="1.5"/><path d="M9 8v5M9 6v.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>'),
ni('/contact-us/','contact','Contact Us','<path d="M2 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4Z" stroke="currentColor" stroke-width="1.5"/><path d="M2 5l7 5 7-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'),
'</div>',
'<div class="rz-sidebar__footer"><a href="#logout" class="rz-sidebar__item" data-tip="Sign Out" style="color:#4a5a7a"><span class="rz-sidebar__item-icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M7 3H3a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M12 6l3 3-3 3M7 9h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span><span class="rz-sidebar__label">Sign Out</span></a></div>',
'</nav></div>'
].join('');
var d=document.createElement('div');d.innerHTML=html;
while(d.firstChild)b.insertBefore(d.firstChild,b.firstChild);
/* Interactions */
var sb=document.getElementById('rzSidebar');
var tg=document.getElementById('rzToggle');
var bk=document.getElementById('rzBackdrop');
var mt=document.getElementById('rzMobileTrigger');
if(!sb)return;
/* Active highlight */
var p=window.location.pathname.replace(/^\/|\/$/g,'');
document.querySelectorAll('.rz-sidebar__item[data-page]').forEach(function(el){
  if(p===el.getAttribute('data-page')||p.indexOf(el.getAttribute('data-page'))===0)el.classList.add('is-active');
});
/* Body offset */
function setOff(){
  if(isMob())return;
  if(sb.classList.contains('is-expanded')){b.classList.add('rz-sidebar-open');}
  else{b.classList.remove('rz-sidebar-open');}
}
if(!isMob()){
  var sw=sb.parentElement;
  sw.addEventListener('mouseenter',function(){b.classList.add('rz-sidebar-open');});
  sw.addEventListener('mouseleave',function(){if(!sb.classList.contains('is-expanded'))b.classList.remove('rz-sidebar-open');});
}
if(tg)tg.addEventListener('click',function(e){e.stopPropagation();sb.classList.toggle('is-expanded');setOff();});
if(mt)mt.addEventListener('click',function(){sb.classList.add('is-expanded');bk.classList.add('is-visible');});
if(bk)bk.addEventListener('click',function(){sb.classList.remove('is-expanded');bk.classList.remove('is-visible');});
document.querySelectorAll('.rz-sidebar__item').forEach(function(el){
  el.addEventListener('click',function(){if(isMob()){sb.classList.remove('is-expanded');bk.classList.remove('is-visible');}});
});
var st=sessionStorage.getItem('rzSidebarExpanded');
if(st==='true'&&!isMob())sb.classList.add('is-expanded');
setOff();
sb.addEventListener('transitionend',function(){if(!isMob()){sessionStorage.setItem('rzSidebarExpanded',sb.classList.contains('is-expanded'));setOff();}});
})();
/* ─── End RZ Portal Sidebar ──────────────────────────────── */
