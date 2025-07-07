<?php

get_header();
wp_enqueue_script( 'owl-carousel');
wp_enqueue_style( 'owl-carousel');
wp_enqueue_style( 'tf-service');
wp_enqueue_script( 'tf-service');

$term_slug = $wp_query->tax_query->queries[0]['terms'][0];

$service_number_post = -1;

$args = array(
    'post_type'      => 'service',
    'paged'          => $paged,
    'posts_per_page' => $service_number_post,
    'tax_query'      => array(
        array(
            'taxonomy' => 'service_category',
            'field'    => 'slug',
            'terms'    => $term_slug
        ),
    ),
);

$query = new WP_Query($args);
?>

<div class="themesflat-service-taxonomy service-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-content-area">
                    <div id="primary" class="content-area">
                        <main id="main" class="main-content" role="main">

                            <div class="group-archive-service">

                            <div class="tf-service-wrap">
    <div class="wrap-service-post">
        <div  class="swiper slider-service">
            <div class="owl-carousel" data-bullets="yes" data-spacer="8" data-loop="false" data-auto="false" data-column="2" data-column2="2" data-column3="2">
                <?php 
                if ($query->have_posts()) {
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="swiper-slide">
                            <div class="item">
                                <div class="service-post scale-hover">
                                    <div class="featured-post">
                                        <a href="<?php echo get_the_permalink(); ?>">
                                            <?php 
                                            if (has_post_thumbnail()) {
                                                $themesflat_thumbnail = "full";
                                                the_post_thumbnail($themesflat_thumbnail);
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="content"> 
                                        <div class="service-category">
                                            <?php 
                                            echo get_the_term_list( get_the_ID(), 'service_category', '', ', ' ); 
                                            ?>
                                        </div>
                                        <h5 class="title border_eff">
                                            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                        </h5>
                                        <div class="description"><?php echo wp_trim_words( get_the_content(), 4, '' ); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                } else {
                    get_template_part('template-parts/content', 'none');
                }
                ?>
            </div>
        </div>
    </div>
    <?php 
    themesflat_pagination_posttype($query);
    wp_reset_postdata();
    ?>
</div>


                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
