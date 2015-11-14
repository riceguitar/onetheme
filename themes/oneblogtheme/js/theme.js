// theme.js

jQuery(function($){
	$('.one-share-facebook, .one-share-twitter, .one-share-linkedin').click(function() {
		window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
		return false;
	});

	if (window.location.hash == "#print") {
	    window.print();
	}

	if (window.location.hash == "#respond") {
	    $('.comment-respond').addClass('expand');
	}

	if (window.location.search.indexOf('replytocom') > -1) {
		$('.comment-respond').addClass('expand');
		$('.comment-reply-title').addClass('show');
	}

	$('.says').text(' - ');

	$('.single .one-share-print').click(function() {
		window.print();
	});

	// Scroll to Top
  var offset = 220;
  var duration = 500;
  jQuery(window).scroll(function() {
      if (jQuery(this).scrollTop() > offset) {
          jQuery('.crunchify-top').fadeIn(duration);
      } else {
          jQuery('.crunchify-top').fadeOut(duration);
      }
  });
  jQuery('.back-to-top').click(function(event) {
      event.preventDefault();
      jQuery('html, body').animate({scrollTop: 0}, duration);
      return false;
  })

  // Expand Comments
  $('.comment-head').click(function() {
  	$(this).addClass('hide-head');
  	$('.comment-respond').toggleClass('expand');
  });

  // Share Fancybox
  $(".one-share-image").fancybox({
    padding: 0
	});

  if (window.location.hash == "#sharetrigger") {
    jQuery(".one-share-trigger").fancybox({
  		maxWidth	: 500,
  		maxHeight	: 800,
  		fitToView	: false,
  		width		: '50%',
  		height		: '90%',
  		autoSize	: true,
  		closeClick	: false,
  		openEffect	: 'none',
  		closeEffect	: 'none'
  	}).trigger('click');
	}

	$('.search-trigger').click(function() {
		$('.search-overlay').toggleClass('search-on');
		$('body').toggleClass('search-fixed');
		jQuery('#search-frame').focus();
		jQuery('input#search[type=search]', jQuery('#search-frame').contents()).focus();
		var attr = jQuery('#search-frame').attr('src');
		if (typeof attr !== typeof undefined && attr !== false) {

		} else {
			jQuery('#search-frame').attr('src', '/?s=');	
		}
		//$( '#search-frame' ).attr( 'src', function ( i, val ) { return val; });

    $('#podcast-trigger').removeClass('on');
    $('#menu-trigger-mobile').removeClass('on');

    $('.mobile-podcast-player').removeClass('show');
    $('.global-nav-mobile-search').removeClass('show');

		return false;
	});

	$('.search-close').click(function() {
		closeSearch();
	});

	function closeSearch() {
		$('.search-overlay', window.parent.document).toggleClass('search-on');
		$('body', window.parent.document).toggleClass('search-fixed');
		jQuery('#search-frame').focus();
		jQuery('input#search[type=search]', jQuery('#search-frame').contents()).focus();
		return false;
	}

	$('#menu-trigger-mobile').click(function() {
    	$(this).toggleClass('on');
    	if (!$('#podcast-trigger').hasClass('on')) {
			$('body').toggleClass('search-fixed');
    	}
    	$('#podcast-trigger').removeClass('on');
		$('.global-nav-mobile-search').toggleClass('show');

    	// Hide Podcast
    	$('.mobile-podcast-player').removeClass('show');
		return false;
	});

	$('#podcast-trigger').click(function() {
    	$(this).toggleClass('on');
    	if (!$('#menu-trigger-mobile').hasClass('on')) {
			$('body').toggleClass('search-fixed');
    	}
    	$('#menu-trigger-mobile').removeClass('on');
		$('.mobile-podcast-player').toggleClass('show');

	    // Hide Menu
    	$('.global-nav-mobile-search').removeClass('show');

    	// Toggle Player Sound Bars
		jQuery('.spp-play').click(function() {
			jQuery('.bar').toggleClass('on');
		});
		return false;
	});

	jQuery('#social-block').sticky({bottomSpacing:200, getWidthFrom: 'body'});

	// Fix Hover Stick on Mobile
	function hoverTouchUnstick() {
	  // Check if the device supports touch events
	  if('ontouchstart' in document.documentElement) {
	    // Loop through each stylesheet
	    for(var sheetI = document.styleSheets.length - 1; sheetI >= 0; sheetI--) {
	      var sheet = document.styleSheets[sheetI];
	      // Verify if cssRules exists in sheet
	      if(sheet.cssRules) {
	        // Loop through each rule in sheet
	        for(var ruleI = sheet.cssRules.length - 1; ruleI >= 0; ruleI--) {
	          var rule = sheet.cssRules[ruleI];
	          // Verify rule has selector text
	          if(rule.selectorText) {
	            // Replace hover psuedo-class with active psuedo-class
	            rule.selectorText = rule.selectorText.replace(":hover", ":active");
	          }
	        }
	      }
	    }
	  }
	}

	var KEYCODE_ESC = 27;
	$(document).keyup(function(e) {
		if (e.keyCode == KEYCODE_ESC) {
			console.log('esc');
			//$('.search-close').click();
			if ($('body', window.parent.document).hasClass('search-fixed')) {
				$('.search-overlay', window.parent.document).removeClass('search-on');
				$('body', window.parent.document).removeClass('search-fixed');
				return false;
			}
		}
	});

});