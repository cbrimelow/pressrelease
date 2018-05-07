'use strict';

var Carousel = (function() {

	var $carouselID,
		$carouselSlideClass,
		$carouselButtonClass,
		theCarouselTimer,
		fadeCounter,
		numOfSlides,
		debug = false
	;
	
	function init(opts) {

		$carouselID = $('#' + opts.carouselID);
		$carouselSlideClass = $carouselID.find('.' + opts.carouselSlideClass);
		$carouselButtonClass = $carouselID.find('.' + opts.carouselButtonClass);

		theCarouselTimer = setInterval(changeBackground, opts.timeBtwnSlides);
		fadeCounter = 1;
		numOfSlides = opts.numOfSlides;

		$carouselButtonClass.on('click', forceSlideChange);
		
	}

	function changeBackground() {

		if (debug) {
			console.log('changeBackground ' + fadeCounter);
		}		

		$carouselSlideClass.each(function() {

			var num = $(this).data('slide-num');			

			if (num !== fadeCounter) {
				$(this).fadeOut(1000);					
			} else {
				$(this).fadeIn(1000);					
			}			

		});

		if ((numOfSlides - 1) === fadeCounter) {			
			fadeCounter = 0;				
		} else {
			fadeCounter = fadeCounter + 1;			
		}

	}
	
	function forceSlideChange() {
		
		var num = $(this).data('num');

		clearInterval(theCarouselTimer);
		fadeCounter = num;
		changeBackground();
		//setInterval(changeBackground, 5000);		
		
	}
	
	return {
		init: init
	};
	
})();

var Popup = (function() {
	
	var $popupID,
		$backgroundID,
		$acceptBtn,
		$declineBtn,
		cookieName,
		cookieExp
	;
	
	function setAgreeCookie(name, value, days) {
		
		if (days) {
			
			var date = new Date(),
				expires;
			
			date.setTime(date.getTime()+(days * 24 * 60 * 60 * 1000));
			expires = '; expires=' + date.toGMTString();
			
		} else {			
			var expires = '';			
		}
		
		document.cookie = name + '=' + value + expires + '; path=/';	
		
	}
	
	function checkAgreeCookie(name) {
		
		var nameEQ = name + '=',
			ca = document.cookie.split(';');
		
		for (var i = 0; i < ca.length; i++) {
			
			var c = ca[i];			
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			
			if (c.indexOf(nameEQ) == 0) {				
				return c.substring(nameEQ.length, c.length);				
			}
			
		}
		
		return null;
		
	}
	
	function init(opts) {
		
		$popupID = $('#' + opts.popupID);
		$backgroundID = $('#' + opts.backgroundID);
		$acceptBtn = $popupID.find('.' + opts.acceptClass);
		$declineBtn = $popupID.find('.' + opts.declineClass);
		cookieName = opts.cookieName;
		cookieExp = opts.cookieExp;
		
		if (!checkAgreeCookie(cookieName)) {
		   		
			$popupID.fadeIn(1000);
			$backgroundID.fadeIn(1000);

			$(document).scrollTop(0);
			$('body').addClass('noScroll');

			$acceptBtn.on('click', function() {

				$popupID.fadeOut(1000);
				$backgroundID.fadeOut(1000);
				$('body').removeClass('noScroll');
				setAgreeCookie(cookieName, 'yes', cookieExp);

			});

			$declineBtn.on('click', function() {

				alert('You will not be able to use this website unless you agree to these terms.');

			});
			
		}
		
	}
	
	return {
		init: init
	};

})();