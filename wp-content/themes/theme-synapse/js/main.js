$(document).ready(function(){
	
	
	//CLICKING MAIN MENU AND CONTENT WITH HASH VALUE REDIRECTING TO THE SECTION
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			  
			setTimeOut(function(){
				$('html,body').animate({
				  scrollTop: target.offset().top
				}, 1000);
				return false;
			});
		  }
		}
	});
	
	//SLIDE INDICATORS 
	$('.home-banner .carousel-indicators li').click(function(){
		var dataUrl = $(this).data('url');
		console.log(dataUrl);
		window.location.href = dataUrl;
	});
	
	/* MOBILE MENU */
	$('.sidepanel .menu > .menu-item-has-children').append('<span class="glyphicon glyphicon-plus toggle-submenu"></span>');
	$('.sidepanel .menu > .menu-item-has-children').each(function(){
		var dataItem = $(this).attr('id');
		$(this).find('.sub-menu')
				.first()
				.attr('data-item', '#'+dataItem)
				.clone()
				.appendTo('.custom-submenu');
		$(this).find('.sub-menu').remove().end().find('.toggle-submenu').attr('data-target', '#'+dataItem);
	});
	
	/* TOGGLE MENU CLICK */
	$('.toggle-submenu').on('click', function(e){
		var dataTarget = $(this).data('target');
		$('.sidepanel .menu')
			.hide()
			.closest('.sidepanel')
				.find('.sub-menu[data-item="'+dataTarget+'"]')
				.show()
			.end()
				.find('.bck-to-menu')
				.show();
	});
	
	/* BACK TO MENU CLICK */
	$('.bck-to-menu').click(function() {
		$(this).hide();
		$('.sidepanel .menu').show();
		$('.custom-submenu .sub-menu').hide();
	});
	
	
	//MOBILE MENU
	$('.mobile-menu-btn').click(function(){
		$('.mainpanel').stop().animate({
				marginRight: '-300px',
				paddingLeft: '300px'
			},'fast');
		$('.sidepanel').stop().animate({
				left: 0
		},'fast');
		
		$('.mobile-menu-btn').css('display', 'none');
	});
	$('.toggle-mobile-menu').click(function(){
		$('.mainpanel').stop().animate({
				marginRight: '0px',
				paddingLeft: '0px'
			},'fast');
		$('.sidepanel').stop().animate({
				left: '-300px'
		},'fast');
		
		$('.mobile-menu-btn').css('display', 'inline-block');
	});
	
	$(window).on('resize', function(){
			
		//PRODUCTS SLIDE 
		var slideItem = 0;
		if( Modernizr.mq('(min-width: 768px)') ) { 
			slideItem = 2;
		}
		if( Modernizr.mq('(min-width: 992px)') ) {
			slideItem = 3;
		}
		$('.slide-products').carouFredSel({
			height: 290,
			items: slideItem,
			responsive: true,
			direction: "left",
			auto: 5000,
			scroll : {
				items: 1,
				easing: "linear",
				duration: 1000,
				pauseOnHover: true
			}
		});
		
		if( Modernizr.mq('(min-width: 768px)') ) {
			
			$('.roundabout-list').roundabout({
				autoplay: true,
				autoplayDuration: 11000,
				autoplayPauseOnHover: true,
				maxScale: 1,
				minScale: .85,
				enableDrag: true,
				responsive: true
			});
			
			if( Modernizr.mq('(min-width: 320px)') ) {
				//EQUALIZE
				var maxHeight = 0;
				$('.equalize').each(function(){
					maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
				}).css('height', maxHeight + 'px');	
			} 
			else {
				$('.equalize').css('height', 'auto');
			}
			
		}
		
			
	});
	
	var mobileMenuLoc = $('.mobile-menu-btn').offset().top;
	$(window).scroll(function(){
		//MOBILE MENU BTN
		var windowScroll = $(window).scrollTop();
	
		if( windowScroll > mobileMenuLoc ) {
			$('.mobile-menu-btn').addClass('sticky');
		}
		else {
			$('.mobile-menu-btn').removeClass('sticky');
		}
		
		//BACK TO TOP BTN
		if( windowScroll > 400 ) {
			$('.bck-to-top').fadeIn();
		}
		else {
			$('.bck-to-top').fadeOut();
		}
		
	});
	
	//BACK TO TOP BTN
	$('.bck-to-top').click(function(){
		$('html, body').animate({
			scrollTop: 0
		})
	});
	
	$(window).load(function(){
		
		//ADD CLASS TO CONTENT IMAGES
		$('.content img').addClass('img-responsive');
		
		//CONTACT FORMS
		$('.wpcf7 .wpcf7-form-control').addClass('form-control');
		$('.wpcf7 .wpcf7-textarea').attr('rows', '8');
		
		$('.roundabout-loader').hide(400);
		$('.roundabout-list').fadeIn(400);
		
		$(window).resize();
		
	});
	
	
});
