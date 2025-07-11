<?php
/**
 * The template for displaying archive service.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package saylo
 */
wp_enqueue_script( 'owl-carousel');
wp_enqueue_style( 'owl-carousel');
wp_enqueue_style( 'tf-service');
wp_enqueue_script( 'tf-service');
get_header(); ?>

<?php 

$terms_slug = wp_list_pluck(get_terms('service_category', 'hide_empty=0'), 'slug');

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$orderby = '';

$service_number_post = -1;

$query_args = array(
    'post_type' => 'service',
    'orderby'   => $orderby,
    'order'     => $order,
    'paged'     => $paged,
    'posts_per_page' => $service_number_post,
    // 'tax_query' => array(
    //     array(
    //         'taxonomy' => 'service_category',
    //         'field'    => 'slug',
    //         'terms'    => $terms_slug,
    //     ),
    // ),
);

if (!empty($exclude)) {
    if (!is_array($exclude)) {
        $exclude = explode(',', $exclude);
    }
    $query_args['post__not_in'] = $exclude;
}

$query = new WP_Query($query_args);
?>

<div class="themesflat-service-taxonomy service-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-content-area">
                    <div id="primary" class="content-area">
                        <main id="main" class="main-content" role="main">
                            <div class="tf-services-wrap no-carousel">
                                <div class="wrap-services-post column-4 lap-column-3 tablet-column-2 mobile-column-1">
                                    <?php 
                                    if ($query->have_posts()) {
                                        while ($query->have_posts()) : $query->the_post(); ?>
                                            <div class="item">
                                                <div class="services-post">
                                                    <div class="featured-post">
                                                        <a href="<?php echo get_the_permalink(); ?>">
                                                            <?php 
                                                            if (has_post_thumbnail()) {
                                                                $themesflat_thumbnail = "service-size";
                                                                the_post_thumbnail($themesflat_thumbnail);
                                                            }
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <div class="content">                                                        
                                                        <h5 class="title ">
                                                            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                        </h5>
                                                        <div class="description"><?php echo get_the_excerpt(); ?></div>
                                                        <a href="<?php echo get_the_permalink(); ?>" class="tf-btn-service">
                                                            <?php echo esc_html('mehr erfahren');?>
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM12 20.25C10.3683 20.25 8.77326 19.7661 7.41655 18.8596C6.05984 17.9531 5.00242 16.6646 4.378 15.1571C3.75358 13.6496 3.5902 11.9908 3.90853 10.3905C4.22685 8.79016 5.01259 7.32015 6.16637 6.16637C7.32016 5.01259 8.79017 4.22685 10.3905 3.90852C11.9909 3.59019 13.6497 3.75357 15.1571 4.37799C16.6646 5.00242 17.9531 6.05984 18.8596 7.41655C19.7661 8.77325 20.25 10.3683 20.25 12C20.2475 14.1873 19.3775 16.2843 17.8309 17.8309C16.2843 19.3775 14.1873 20.2475 12 20.25ZM16.2806 11.4694C16.3504 11.539 16.4057 11.6217 16.4434 11.7128C16.4812 11.8038 16.5006 11.9014 16.5006 12C16.5006 12.0986 16.4812 12.1962 16.4434 12.2872C16.4057 12.3783 16.3504 12.461 16.2806 12.5306L13.2806 15.5306C13.1399 15.6714 12.949 15.7504 12.75 15.7504C12.551 15.7504 12.3601 15.6714 12.2194 15.5306C12.0786 15.3899 11.9996 15.199 11.9996 15C11.9996 14.801 12.0786 14.6101 12.2194 14.4694L13.9397 12.75H8.25C8.05109 12.75 7.86033 12.671 7.71967 12.5303C7.57902 12.3897 7.5 12.1989 7.5 12C7.5 11.8011 7.57902 11.6103 7.71967 11.4697C7.86033 11.329 8.05109 11.25 8.25 11.25H13.9397L12.2194 9.53063C12.0786 9.38989 11.9996 9.19902 11.9996 9C11.9996 8.80098 12.0786 8.61011 12.2194 8.46937C12.3601 8.32864 12.551 8.24958 12.75 8.24958C12.949 8.24958 13.1399 8.32864 13.2806 8.46937L16.2806 11.4694Z" fill="currentColor"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile;
                                    } else {
                                        get_template_part('template-parts/content', 'none');
                                    }
                                    ?>
                                </div>
                                <?php 
                                themesflat_pagination_posttype($query);
                                wp_reset_postdata();
                                ?>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
