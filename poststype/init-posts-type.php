<?php 

/* Custom Post Type

===================================*/

if ( ! class_exists( 'themesflat_custom_post_type' ) ) {

    class themesflat_custom_post_type {

        function __construct() {

            require_once THEMESFLAT_PATH . '/poststype/register-service.php';
            add_filter( 'single_template', array( $this,'themesflat_single_service' ) );
            add_filter( 'taxonomy_template', array( $this,'themesflat_taxonomy_service' ) ); 
            add_filter( 'archive_template', array( $this,'themesflat_archive_service' ) );  

        }        

        /* Temlate service */
        function themesflat_single_service( $single_template ) {
            global $post;
            if ( $post->post_type == 'service' ) $single_template = THEMESFLAT_PATH . '/poststype/inc/single-service.php';
            return $single_template;

        }

        function themesflat_taxonomy_service( $taxonomy_template ) {

            global $post;

            if ( $post->post_type == 'service' ) $taxonomy_template = THEMESFLAT_PATH . '/poststype/inc/taxonomy-service_category.php';

            return $taxonomy_template;

        }

        function themesflat_archive_service( $archive_template ) {

            global $post;

            if ( is_post_type_archive ( 'service' ) ) $archive_template = THEMESFLAT_PATH . '/poststype/inc/archive-service.php';

            return $archive_template;

        }

    }

    

}

new themesflat_custom_post_type;





function themesflat_fix_custom_posttype_posts_per_page( $query_string ){

    if( is_admin() || ! is_array( $query_string ) )

        return $query_string;



    $service_number_post =  6;


    $post_types_to_fix = array(
        array(
            'post_type' => 'service',
            'posts_per_page' => $service_number_post

        ),

    );

 

    foreach( $post_types_to_fix as $fix ) {

        if( array_key_exists( 'post_type', $query_string ) && $query_string['post_type'] == $fix['post_type'] ) {

            $query_string['posts_per_page'] = $fix['posts_per_page'];

            return $query_string;

        }

    } 

    return $query_string;

} 

add_filter( 'request', 'themesflat_fix_custom_posttype_posts_per_page' );





/* Custom Pagination Shortcodes

===================================*/

function themesflat_pagination_posttype( $query = '' , $paging_style = '' ) {    

    $prev_arrow = 'icon-proty-angle-left';

    $next_arrow = 'icon-proty-angle-right';

    

    // Get global $query

    if ( ! $query ) {

        global $wp_query;

        $query = $wp_query;

    }

    $post_type = $query->query["post_type"];



    // Set vars

    $total  = $query->max_num_pages;

    $big    = 999999999;



    // Display pagination

    if ( $total > 1 ) {



        // Get current page

        if ( $current_page = get_query_var( 'paged' ) ) {

            $current_page = $current_page;

        } elseif ( $current_page = get_query_var( 'page' ) ) {

            $current_page = $current_page;

        } else {

            $current_page = 1;

        }



        // Get permalink structure

        if ( get_option( 'permalink_structure' ) ) {

            if ( is_page() ) {

                $format = 'page/%#%/';

            } else {

                $format = '/%#%/';

            }

        } else {

            $format = '&paged=%#%';

        }



        $links = array(

            'base'      => str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),

            'format'    => $format,

            'current'   => max( 1, $current_page ),

            'total'     => $total,

            'mid_size'  => 3,

            'prev_text' => '<i class="'. $prev_arrow .'"></i>',

            'next_text' => '<i class="'. $next_arrow .'"></i>',

        );

        $more_link = get_next_posts_link( esc_html__('Load More','themesflat-core'), $query->max_num_pages );



        // Output pagination        

        ?>

        <?php if( $paging_style == 'loadmore' ) : ?>    

            <nav class="navigation paging-navigation loadmore <?php echo esc_attr($post_type); ?>" role="navigation">

                <div class="pagination loop-pagination text-center draw-border">

                    <?php echo wp_kses( $more_link, themesflat_kses_allowed_html() ); ?>

                </div>

            </nav>

        <?php else : ?>

            <nav class="navigation  paging-navigation pager-numeric <?php echo esc_attr($post_type); ?>" role="navigation">

                <div class="pagination loop-pagination">

                    <?php echo paginate_links( $links ); ?>

                </div>

            </nav>

        <?php endif; ?>

    <?php

    }

}