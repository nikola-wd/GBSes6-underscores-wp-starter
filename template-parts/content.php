<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ugwps
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else : ?>

			<a class="post_thumb post_thumb--index" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></a>
			
			<?php the_title( '<h2 class="entry-title entry-title--index"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				ugwps_posted_on();
				ugwps_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php ugwps_post_thumbnail(); ?>



	<footer class="entry-footer">
		<?php ugwps_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
