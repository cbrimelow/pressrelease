<?php

/**
 * Template Name: Right Sidebar
 **/

get_header(); ?>

<div class="right-sidebar-main clearfix">

<header class="entry-header">
	<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
</header><!-- .entry-header -->

<div class="col-sm-8 col-xs-12 content-main">
	<div id="primary" class="content-area page-content-area">
		<main id="main" class="site-main" role="main" >

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!--col-sm-12 col-xs-12 -->	

<?php get_sidebar(); ?>

</div>

<?php
get_footer();
