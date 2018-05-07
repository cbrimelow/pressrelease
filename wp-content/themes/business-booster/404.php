<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package business_booster
 */

get_header(); ?>

<div class="row">
<div class="col-sm-12 col-xs-12">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'business-booster' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'The Requested Page was not found on this Site', 'business-booster' ); ?></p>
					<span class="fa fa-frown-o"></span>
					</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!--col-sm-12 col-xs-12 -->	

<?php
get_footer();
