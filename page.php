<?php get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>

	<section class="hero hero--inner">
		<div class="container">
			<h1><?php the_title(); ?></h1>
		</div><!-- container -->
	</section>
	
	<section class="page--inner__content">
		<div class="container">
			<?php the_content(); ?>
		</div><!-- container -->
	</section>

	<?php endwhile; // End of the loop. ?>

	
<?php get_footer(); ?>