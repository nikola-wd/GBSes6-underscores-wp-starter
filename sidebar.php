<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ugwps
 */

if ( ! is_active_sidebar( 'footer-left-widget' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'footer-left-widget' ); ?>
</aside><!-- #secondary -->
