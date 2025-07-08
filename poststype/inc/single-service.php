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
							?>	
							<h1 class="title"><?php the_title(); ?></h1>
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