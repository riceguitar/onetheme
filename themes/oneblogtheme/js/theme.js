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
		maxWidth	: 500,
		maxHeight	: 800,
		fitToView	: false,
		width		: '50%',
		height		: '90%',
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
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

	$('#search-trigger').click(function() {
		$('.search-overlay').toggleClass('search-on');
		$('body').toggleClass('search-fixed');
		var attr = jQuery('#search-frame').attr('src');
		if (typeof attr !== typeof undefined && attr !== false) {

		} else {
			jQuery('#search-frame').attr('src', '/?s=');	
		}
		//$( '#search-frame' ).attr( 'src', function ( i, val ) { return val; });
		return false;
	});

	$('.search-close').click(function() {
		closeSearch();
	});

	$(document).keyup(function(e) {
	    if (e.keyCode == 27) { // escape key maps to keycode `27`
	    	console.log('esc');
			// if (jQuery('.search-overlay').hasClass('search-on')) {
			// 	console.log('true');
			// } else {
				
			// }
	    }
	});

	function closeSearch() {
		$('.search-overlay', window.parent.document).toggleClass('search-on');
		$('body', window.parent.document).toggleClass('search-fixed');
		jQuery('#search-frame').focus();
		jQuery('input#search[type=search]', jQuery('#search-frame').contents()).focus();
		return false;
	}

	$('#menu-trigger-mobile').click(function() {
		$('body', window.parent.document).toggleClass('search-fixed');
		$('.global-nav-mobile-search').toggleClass('show');
		return false;
	});

	$('#podcast-trigger').click(function() {
		$('body', window.parent.document).toggleClass('search-fixed');
		$('.mobile-podcast-player').toggleClass('show');
		return false;
	});

	$(window).on("resize", function () {
		viewportWidth = $(window).width();
		viewportHeight = $(window).height();

		if (viewportWidth > 767) {
			// Fixed Sharing Bar
			var waypointss = $('.single .post-body').waypoint(
				function(direction) {
					if (direction === 'up') {
						$('.single .post-sharing').removeClass('fixed');
					}
					if (direction === 'down') {
						$('.single .post-sharing').addClass('fixed');
					}
				}, {
					offset: '50px'
				}
			);
			// Fixed Widget Bar
			var waypointsa = $('.home.fixed-widget .sidebar-mid .widget:last-child').waypoint(
				function(direction) {
					if (direction === 'down') {
						$('.home.fixed-widget .sidebar-mid .widget:last-child').addClass('fixed');
						$('.home.fixed-widget .sidebar-mid .widget:last-child').width(
							$('.home.fixed-widget .sidebar-mid .widget:last-child').parent().width()
						);
					}
					if (direction === 'up') {
						$('.home.fixed-widget .sidebar-mid .widget:last-child').removeClass('fixed');
					}
				}, {
					offset: '35px'
				}
			);

			var waypointsb = $('.home.fixed-widget .sidebar-right .widget:last-child').waypoint(
				function(direction) {
					if (direction === 'down') {
						$('.home.fixed-widget .sidebar-right .widget:last-child').addClass('fixed');
						$('.home.fixed-widget .sidebar-right .widget:last-child').width(
							$('.home.fixed-widget .sidebar-right .widget:last-child').parent().width()
						);
					}
					if (direction === 'up') {
						$('.home.fixed-widget .sidebar-right .widget:last-child').removeClass('fixed');
					}
				}, {
					offset: '35px'
				}
			);

		} else {
			if (waypointss) { waypointss.destroy(); }
			if (waypointsa) { waypointsa.destroy(); }
			if (waypointsb) { waypointsb.destroy(); }
      // Waypoint.refreshAll();

      $('.global-footer').waypoint(
        function(direction) {
          if (direction === 'down') {
            jQuery('.post-sharing').addClass('remove-social');
          }
          if (direction === 'up') {
            jQuery('.post-sharing').removeClass('remove-social');
          }
        }, {
            offset: 'bottom-in-view'
        }
      );
		}
	}).resize();

});

// Transformicons
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD module
    define(factory);
  } else if (typeof exports === 'object') {
    // CommonJS-like environment (i.e. Node)
    module.exports = factory();
  } else {
    // Browser global
    root.transformicons = factory();
  }
}(this || window, function () {

  // ####################
  // MODULE TRANSFORMICON
  // ####################
  'use strict';

  var
    tcon = {}, // static class
    _transformClass = 'tcon-transform',

    // const
    DEFAULT_EVENTS = {
      transform : ['click'],
      revert : ['click']
    };

  // ##############
  // private methods
  // ##############

  /**
  * Normalize a selector string, a single DOM element or an array of elements into an array of DOM elements.
  * @private
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements
  * @returns {array} Array of DOM elements
  */
  var getElementList = function (elements) {
    if (typeof elements === 'string') {
      return Array.prototype.slice.call(document.querySelectorAll(elements));
    } else if (typeof elements === 'undefined' || elements instanceof Array) {
      return elements;
    } else {
      return [elements];
    }
  };

  /**
  * Normalize a string with eventnames separated by spaces or an array of eventnames into an array of eventnames.
  * @private
  *
  * @param {(string|array)} elements - String with eventnames separated by spaces or array of eventnames
  * @returns {array} Array of eventnames
  */
  var getEventList = function (events) {
    if (typeof events === 'string') {
      return events.toLowerCase().split(' ');
    } else {
      return events;
    }
  };

  /**
  * Attach or remove transformicon events to one or more elements.
  * @private
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements to be toggled
  * @param {object} [events] - An Object containing one or more special event definitions
  * @param {boolean} [remove=false] - Defines wether the listeners should be added (default) or removed.
  */
  var setListeners = function (elements, events, remove) {
    var
      method = (remove ? 'remove' : 'add') + 'EventListener',
      elementList = getElementList(elements),
      currentElement = elementList.length,
      eventLists = {};

    // get events or use defaults
    for (var prop in DEFAULT_EVENTS) {
      eventLists[prop] = (events && events[prop]) ? getEventList(events[prop]) : DEFAULT_EVENTS[prop];
    }
    
    // add or remove all events for all occasions to all elements
    while(currentElement--) {
      for (var occasion in eventLists) {
        var currentEvent = eventLists[occasion].length;
        while(currentEvent--) {
          elementList[currentElement][method](eventLists[occasion][currentEvent], handleEvent);
        }
      }
    }
  };

  /**
  * Event handler for transform events.
  * @private
  *
  * @param {object} event - event object
  */
  var handleEvent = function (event) {
    tcon.toggle(event.currentTarget);
  };

  // ##############
  // public methods
  // ##############

  /**
  * Add transformicon behavior to one or more elements.
  * @public
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements to be toggled
  * @param {object} [events] - An Object containing one or more special event definitions
  * @param {(string|array)} [events.transform] - One or more events that trigger the transform. Can be an Array or string with events seperated by space.
  * @param {(string|array)} [events.revert] - One or more events that trigger the reversion. Can be an Array or string with events seperated by space.
  * @returns {transformicon} transformicon instance for chaining
  */
  tcon.add = function (elements, events) {
    setListeners(elements, events);
    return tcon;
  };

  /**
  * Remove transformicon behavior from one or more elements.
  * @public
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements to be toggled
  * @param {object} [events] - An Object containing one or more special event definitions
  * @param {(string|array)} [events.transform] - One or more events that trigger the transform. Can be an Array or string with events seperated by space.
  * @param {(string|array)} [events.revert] - One or more events that trigger the reversion. Can be an Array or string with events seperated by space.
  * @returns {transformicon} transformicon instance for chaining
  */
  tcon.remove = function (elements, events) {
    setListeners(elements, events, true);
    return tcon;
  };

  /**
  * Put one or more elements in the transformed state.
  * @public
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements to be transformed
  * @returns {transformicon} transformicon instance for chaining
  */
  tcon.transform = function (elements) {
    getElementList(elements).forEach(function(element) {
      element.classList.add(_transformClass);
    });
    return tcon;
  };

  /**
  * Revert one or more elements to the original state.
  * @public
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements to be reverted
  * @returns {transformicon} transformicon instance for chaining
  */
  tcon.revert = function (elements) {
    getElementList(elements).forEach(function(element) {
      element.classList.remove(_transformClass);
    });
    return tcon;
  };
  
  /**
  * Toggles one or more elements between transformed and original state.
  * @public
  *
  * @param {(string|element|array)} elements - Selector, DOM element or Array of DOM elements to be toggled
  * @returns {transformicon} transformicon instance for chaining
  */
  tcon.toggle = function (elements) {
    getElementList(elements).forEach(function(element) {
      tcon[element.classList.contains(_transformClass) ? 'revert' : 'transform'](element);
    });
    return tcon;
  };

  return tcon;
}));