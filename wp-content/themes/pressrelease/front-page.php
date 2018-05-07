<?php get_header(); ?>

	<article id="main">		
		<div class="container">			
			<div class="row">
				<div class="col-sm-12">

					<?php 
						if ( have_posts() ) : while ( have_posts() ) : the_post();

							get_template_part( 'content', get_post_format() );

						endwhile; endif; 
					?>

				</div> 
			</div>
		</div>	 	  	  
	</article>

<?php get_footer(); ?>