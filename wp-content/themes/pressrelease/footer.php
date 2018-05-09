<section id="footer">
	<div class="container">			
		<div class="row">			
			<div class="col-xs-12">
				<p>
					<a href="https://twitter.com/CRFHeart" target="_blank"><img class="social" src="<?php echo get_bloginfo('template_directory'); ?>/images/social-twitter.png" alt="Twitter" /></a>
					<a href="https://www.facebook.com/CRFheart/" target="_blank"><img class="social" src="<?php echo get_bloginfo('template_directory'); ?>/images/social-facebook.png" alt="Facebook" /></a>
					<a href="#" target="_blank"><img class="social" src="<?php echo get_bloginfo('template_directory'); ?>/images/social-instagram.png" alt="Instagram" /></a>
					<a href="https://www.linkedin.com/company/20767/" target="_blank"><img class="social" src="<?php echo get_bloginfo('template_directory'); ?>/images/social-linkedin.png" alt="LinkedIn" /></a>
					<a href="#" target="_blank"><img class="social" src="<?php echo get_bloginfo('template_directory'); ?>/images/social-youtube.png" alt="YouTube" /></a>
				</p>
				<p>© Transcatheter Cardiovascular Therapeutics (TCT) 2018 &nbsp;&nbsp; | &nbsp;&nbsp; All Rights Reserved &nbsp;&nbsp; | &nbsp;&nbsp; All Activity is Monitored and Recorded</p>
			</div>				
		</div>
	</div>
</section>


<div id="site-terms">

	<p>By clicking here, I acknowledge that I have read and agree to abide by all media and embargo policies governing CRF Meetings.</p>
	<p>Your use of the TCT press room website signifies that you have read, understand, acknowledge and agree to be bound by the terms and conditions of CRF media and embargo policies.</p>
	<p>You must expressly agree to these terms and conditions before you can gain access to this website.</p>
	<p>To protect your security, please do not share your password. Accounts that appear to have multiple users will be shut down. Thank you in advance.</p>

	<a class="accept" href="#">Accept</a>

	<a class="decline" href="#">Decline</a>

</div>

<div id="popup-bg"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="<?php echo get_bloginfo('template_directory'); ?>/js/script.js"></script>
	
	<script>
		
		$(document).ready(function() {		

			Carousel.init({

				carouselID			: 'carousel',
				carouselSlideClass	: 'slide',
				carouselButtonClass	: 'dot',
				numOfSlides			: 3,
				timeBtwnSlides		: 5000

			});
			
			Popup.init({
				
				popupID			: 'site-terms',
				backgroundID	: 'popup-bg',
				acceptClass		: 'accept',
				declineClass	: 'decline',
				cookieName		: 'PR-Agree',
				cookieExp		: 365
				
			});
			
			DaySwitcher.init();

		});
			
		$(window).on('beforeunload', function(){

			$(window).scrollTop(0);

		});	
	
	</script> 


	<?php wp_footer(); ?>

  </body>
</html>