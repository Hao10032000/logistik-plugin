<?php
wp_enqueue_style( 'tf-service');

get_header(); 

?>

<div class="container">

	<div class="row">

		<div class="col-md-12">

			<div class="wrap-content-area">

				<div id="primary" class="content-area">	

					<main id="main" class="main-content" role="main">

						<div class="entry-content">	

						<?php while ( have_posts() ) : the_post(); 
								$image_data = themesflat_get_opt_elementor('image_service');
    							if ( !empty($image_data) && !empty($image_data['url']) ) {
    							    $image_service = esc_url($image_data['url']);
								} else {
    							    $image_service = esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' ) );
    							}
							?>	

								<div class="single-feature" style="background: url('<?php echo esc_url($image_service); ?>'); background-size: cover; background-position: center;">

									<div class="group-title">
										<h1 class="title">
											<?php echo get_the_title(); ?>
										</h1>
										<?php if(!empty(themesflat_get_opt_elementor('description_service'))): ?>
											<div class="service-desc">
												<?php echo themesflat_get_opt_elementor('description_service'); ?>
											</div>
										<?php endif; ?>
									</div>
										
								</div>
										
								<?php the_content(); ?>
							<?php endwhile; ?>


						</div><!-- ./entry-content -->

					</main><!-- #main -->

				</div><!-- #primary -->

			</div>

		</div>

	</div>

</div>



<?php get_footer(); ?>