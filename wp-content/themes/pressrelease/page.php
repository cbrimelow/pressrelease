<?php get_header(); ?>

	<article id="main">		
		<div class="container">			
			<div class="row">	
				
					
			<?php

			if (is_page('resources') || is_page('contacts') || is_page('home')) {

			?>
				
				<div class="col-xs-12 col-sm-8">	
				
			<?php

			} else {

			?>	
				<div class="col-xs-12">
				
			<?php

			}

			?>	

					<?php 
					
						if (is_user_logged_in()) {

							if ( have_posts() ) : while ( have_posts() ) : the_post();

								get_template_part( 'content', get_post_format() );

							endwhile; endif; 

						} else {
							echo "<h2>Sorry!</h2> <p>You must be logged in to view site content.</p>";
						}
					
					?>	
					<div class="row">			
						<div class="col-xs-12 col-md-6 col-md-offset-6 twitter">						

						</div>
					</div>					
				</div>	

					
			<?php

			if (is_page('resources') || is_page('contacts') || is_page('home')) {

			?>
				
				<div class="col-xs-12 col-sm-4">
<a class="twitter-timeline" data-width="420" data-height="420" data-theme="light" href="https://twitter.com/crfheart?ref_src=twsrc%5Etfw">Tweets by ACCmediacenter</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div> 
				
			<?php

			}

			?>				
			</div>
		</div>	 	  	  
	</article>


<?php get_footer(); ?>