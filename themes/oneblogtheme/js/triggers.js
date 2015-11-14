
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
			var waypointsa = $('.fixed-widget.sidebar-mid .widget:last-child').waypoint(
				function(direction) {
					if (direction === 'down') {
						$('.fixed-widget.sidebar-mid .widget:last-child').addClass('fixed');
						$('.fixed-widget.sidebar-mid .widget:last-child').width(
							$('.fixed-widget.sidebar-mid .widget:last-child').parent().width()
						);
					}
					if (direction === 'up') {
						$('.fixed-widget.sidebar-mid .widget:last-child').removeClass('fixed');
					}
				}, {
					offset: '35px'
				}
			);

			var waypointsb = $('.fixed-widget.sidebar-right .widget:last-child').waypoint(
				function(direction) {
					if (direction === 'down') {
						$('.fixed-widget.sidebar-right .widget:last-child').addClass('fixed');
						$('.fixed-widget.sidebar-right .widget:last-child').width(
							$('.fixed-widget.sidebar-right .widget:last-child').parent().width()
						);
					}
					if (direction === 'up') {
						$('.fixed-widget.sidebar-right .widget:last-child').removeClass('fixed');
					}
				}, {
					offset: '35px'
				}
			);

		} else {
			if (waypointss) { waypointss.destroy(); }
			if (waypointsa) { waypointsa.destroy(); }
			if (waypointsb) { waypointsb.destroy(); }

      var lastScrollTop = 0;
      $(window).scroll(function(event){
         var st = $(this).scrollTop();
         if (st > lastScrollTop){
            jQuery('.single .post-sharing').removeClass('remove-social');
         } else {
            jQuery('.single .post-sharing').addClass('remove-social');
         }
         lastScrollTop = st;
      });
		}
	}).resize();