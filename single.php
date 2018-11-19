<?php get_header(); ?>

	<article class="blog-single">
	
		<?php while ( have_posts() ) : the_post(); ?>
			 <div class="post_thumb post_thumb--single" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
				<div class="container container--blog container--blog--single">
					<h1 class="entry-title entry-title--single"><?php the_title(); ?></h1>
					<div class="entry-meta entry-meta--single">
						<?php
						ugwps_posted_on();
						ugwps_posted_by();
						?>
					</div><!-- .entry-meta -->
					<hr>
					<div class="row">
						<div class="col-lg-8">
							<div class="blog-content blog-content--single">
								<?php the_content(); ?>
							</div>

							<?php 
							// If comments are open or we have at least one comment, load up the comment template.
							// if ( comments_open() || get_comments_number() ) :
								// comments_template();
							// endif; ?>
						</div><!-- col -->
						<aside class="col-lg-4 aside">
							<?php get_template_part( 'template-parts/searchform'); ?>

							<div class="widget recent-posts">
								<h2>Latest Posts</h2>
								<div>
									<?php get_5_recent_posts(); ?>
								</div>
							</div>
						</aside><!-- col -->
					</div><!-- row -->
			
						

						<?php the_post_navigation(); ?>
					</div><!-- container -->

		<?php endwhile; // End of the loop. ?>
	</article>

<?php get_footer(); ?>
