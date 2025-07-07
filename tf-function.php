<?php 
if(!function_exists('flat_get_post_page_content')){
    function flat_get_post_page_content( $slug ) {
        $content_post = get_posts(array(
            'name' => $slug,
            'posts_per_page' => 1,
            'post_type' => 'elementor_library',
            'post_status' => 'publish'
        ));
        if (array_key_exists(0, $content_post) == true) {
            $id = $content_post[0]->ID;
            return $id;
        }
    }
}

if(!function_exists('tf_header_enabled')){
    function tf_header_enabled() {
        $header_id = ThemesFlat_Addon_For_Elementor_proty::get_settings( 'type_header', '' );
        $status    = false;

        if ( '' !== $header_id ) {
            $status = true;
        }

        return apply_filters( 'tf_header_enabled', $status );
    }
}

if(!function_exists('tf_footer_enabled')){
    function tf_footer_enabled() {
        $header_id = ThemesFlat_Addon_For_Elementor_proty::get_settings( 'type_footer', '' );
        $status    = false;

        if ( '' !== $header_id ) {
            $status = true;
        }

        return apply_filters( 'tf_footer_enabled', $status );
    }
}

if(!function_exists('get_header_content')){
    function get_header_content() {
        $tf_get_header_id = ThemesFlat_Addon_For_Elementor_proty::tf_get_header_id();
        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($tf_get_header_id);
    }
}

if(!function_exists('tf_get_template_widget')){
    function tf_get_template_widget($template_name, $args = null, $return = false){
        $template_file = $template_name . '.php';
        $default_folder = plugin_dir_path(__FILE__) . 'templates/';
        $theme_folder = apply_filters('tf_templates_folder', dirname(plugin_basename(__FILE__)));
        $template = locate_template($theme_folder . '/' . $template_file);
        if (!$template) {
            $template = $default_folder . $template_file;
        }
        if ($args && is_array($args)) {
            extract($args);
        }
        if ($return) {
            ob_start();
        }
        if (file_exists($template)) {
            include $template;
        }
        if ($return) {
            return ob_get_clean();
        }
        return null;
    }
}

// Hide render sidebar container css
remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );

add_filter( 'render_block', function( $block_content, $block ) {
    if ( $block['blockName'] === 'core/group' ) {
        return $block_content;
    }

    return wp_render_layout_support_flag( $block_content, $block );
}, 10, 2 );

add_filter('wpcf7_autop_or_not', '__return_false'); 
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});

add_action('admin_enqueue_scripts', function() {
    wp_enqueue_media();
});

function postype_image_sizes() {
    add_image_size('service-size', 486, 365, true);
}

add_action('after_setup_theme', 'postype_image_sizes');



