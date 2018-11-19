<?php get_header(); ?>


	<section class="hero hero--inner">
		<div class="blog-slider" style="background-image: url('<?php the_field('news-hero-img', 10); ?>');"></div><!-- slider -->

		<div class="container blog-newsletter">
			<h3 class="text-center">Stay Up To Date With Ujenzi</h3>
			<?php echo do_shortcode('[mc4wp_form id="123"]'); ?>

			<p class="text-center mb0"><small>
				Join the Ujenzi mailing list to get program updates from time to time and stay in the loop with the great work that we are doing!
			</small></p>
		</div>
	</section>

	<section class="page--inner__content">
		<div class="container container--blog">

			<h1 class="blog-index-title text-center">Recent News &amp Updates</h1>

				<?php
					the_archive_title('<h2 class="page-title">', '</h2>');
				?>

			<div class="row">
				<div class="col-lg-8 blog-index-main">
					<?php if (have_posts()) :
					while (have_posts()) : the_post(); ?>

					  	<article class="article--index">
					  		<a class="post_thumb post_thumb--index" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></a>

								<h2 class="entry-title entry-title--index"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

								<div class="entry-meta">
									<?php
								ugwps_posted_on();
								ugwps_posted_by();
								?>
								</div><!-- .entry-meta -->

								<div class="blog-content">
									<?php echo get_excerpt(309); ?>
								</div>

								<a href="<?php the_permalink(); ?>" class="btn btn--brand blog-index-read-more">Read More</a>

					  	</article>
							
						<?php endwhile;
					wp_pagenavi();
					else :
						get_template_part('template-parts/content', 'none');
					endif; ?>
				</div><!-- col -->
				<aside class="col-lg-4 aside">
					<?php get_template_part('template-parts/searchform'); ?>
					
					<?php dynamic_sidebar('blog-index-widget'); ?>
				</aside><!-- col -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- inner-content -->


<?php get_footer(); ?>
