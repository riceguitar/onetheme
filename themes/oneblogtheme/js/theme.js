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

	// Remove Fixed
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
		closeEffect	: 'none'
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
		return false;
	});

	$('.search-close').click(function() {
		$('.search-overlay').toggleClass('search-on');
		$('body').toggleClass('search-fixed');
		return false;
	});

});