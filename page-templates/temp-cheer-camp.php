<?php // Template Name: Cheer Camp Page Template ?>


<?php get_header(); ?>

	<?php get_template_part( 'template-parts/hero-inner', 'none' ); ?>
	
	<?php $below_hero = get_field('below_hero'); ?>
	<section class="below-hero below-hero--2">
		<div class="container">
			<?php echo $below_hero['image']; ?>
			<?php echo $below_hero['text']; ?>
		</div> <!-- cont -->
	</section>



	<section class="sec-cta sec-cta--register bg-brand">
		<div class="container">
			<div class="d-flex">
				<h2>Register & Pay</h2>
				
				<a href="#" class="btn btn--sec btn--pad2">pay now</a>
			</div>
		</div> <!-- cont -->
	</section>


<?php get_footer(); ?>