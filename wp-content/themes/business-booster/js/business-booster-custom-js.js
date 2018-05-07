jQuery( document ).ready( function( $ ) {

	//for adding class on scroll
	jQuery(window).scroll(function(){
		
		var scroll = jQuery(window).scrollTop();
		
		if (scroll > 150){
			jQuery('header.site-header').addClass('opacity');
		}
		else {
			jQuery('header.site-header').removeClass('opacity');
		}
		
	});
	
	// for submenu dropdown on tab and mobile
		if(jQuery(window).width()<=1024){ 
			
			$( ".main-navigation ul li.menu-item-has-children" ).prepend( '<span class="fa fa-plus"></span>' );
			
			$('.main-navigation ul li.menu-item-has-children .fa.fa-plus').click(function(){
				
				$(this).next().next().slideToggle();
				
				$(this).toggleClass('fa-plus fa-minus');
				
			});

		}
		
	// for blog slider
		jQuery('.business_booster_recent_post_wrap').slick({
		  dots: false,
		  arrows: false,
		  infinite: false,
		  speed: 300,
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 3000,
		  responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
			  }
			},
			{
			  breakpoint: 601,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		  ]
		});	
	
});