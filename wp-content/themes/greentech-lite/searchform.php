<?php
/**
 * The template for displaying custom search form
 *
 * @package GreenTech Lite
 */

?>

<form class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET">
	<input class="form-control" type="text" name="s" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'Enter your Keyword', 'greentech-lite' ); ?>"/>
</form>
