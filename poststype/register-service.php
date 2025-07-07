<?php

add_action('init', 'themesflat_register_service_post_type');

/**

  * Register service post type

*/

function themesflat_register_service_post_type() {

    $service_slug = 'umzugsservice-atu';

    $labels = array(
        'name'                  => esc_html__( 'Umzugsservice', 'themesflat-core' ),
        'singular_name'         => esc_html__( 'Umzugsservice', 'themesflat-core' ),
        'menu_name'             => esc_html__( 'Umzugsservice', 'themesflat-core' ),
        'add_new'               => esc_html__( 'New Umzugsservice', 'themesflat-core' ),
        'add_new_item'          => esc_html__( 'Add New Umzugsservice', 'themesflat-core' ),
        'new_item'              => esc_html__( 'New Umzugsservice Item', 'themesflat-core' ),
        'edit_item'             => esc_html__( 'Edit Umzugsservice Item', 'themesflat-core' ),
        'view_item'             => esc_html__( 'View Umzugsservice', 'themesflat-core' ),
        'all_items'             => esc_html__( 'All Umzugsservice', 'themesflat-core' ),
        'search_items'          => esc_html__( 'Search Umzugsservice', 'themesflat-core' ),
        'not_found'             => esc_html__( 'No Umzugsservice Items Found', 'themesflat-core' ),
        'not_found_in_trash'    => esc_html__( 'No Umzugsservice Items Found In Trash', 'themesflat-core' ),
        'parent_item_colon'     => esc_html__( 'Parent Umzugsservice:', 'themesflat-core' ),
        'not_found'             => esc_html__( 'No Umzugsservice found', 'themesflat-core' ),
        'not_found_in_trash'    => esc_html__( 'No Umzugsservice found in Trash', 'themesflat-core' )

    );

    $args = array(

        'labels'      => $labels,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor','excerpt'  ),
        'rewrite'       => array( 'slug' => $service_slug ),
        'public'      => true,   
        'show_in_rest' => true,  
        'has_archive' => true 

    );

    register_post_type( 'service', $args );

    flush_rewrite_rules();

}



add_filter( 'post_updated_messages', 'themesflat_service_updated_messages' );

/**

  * service update messages.

*/

function themesflat_service_updated_messages ( $messages ) {

    Global $post, $post_ID;

    $messages[esc_html__( 'service' )] = array(

        0  => '',

        1  => sprintf( esc_html__( 'Umzugsservice Updated. <a href="%s">View Umzugsservice</a>', 'themesflat-core' ), esc_url( get_permalink( $post_ID ) ) ),

        2  => esc_html__( 'Custom Field Updated.', 'themesflat-core' ),

        3  => esc_html__( 'Custom Field Deleted.', 'themesflat-core' ),

        4  => esc_html__( 'Umzugsservice Updated.', 'themesflat-core' ),

        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'Umzugsservice Restored To Revision From %s', 'themesflat-core' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,

        6  => sprintf( esc_html__( 'Umzugsservice Published. <a href="%s">View Umzugsservice</a>', 'themesflat-core' ), esc_url( get_permalink( $post_ID ) ) ),

        7  => esc_html__( 'Umzugsservice Saved.', 'themesflat-core' ),

        8  => sprintf( esc_html__('Umzugsservice Submitted. <a target="_blank" href="%s">Preview Umzugsservice</a>', 'themesflat-core' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),

        9  => sprintf( esc_html__( 'Umzugsservice Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Umzugsservice</a>', 'themesflat-core' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'themesflat-core' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),

        10 => sprintf( esc_html__( 'Umzugsservice Draft Updated. <a target="_blank" href="%s">Preview Umzugsservice</a>', 'themesflat-core' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),

    );

    return $messages;

}



add_action( 'init', 'themesflat_register_service_taxonomy' );

/**

  * Register service taxonomy

*/

function themesflat_register_service_taxonomy() {

    /*service Categories*/    

    $service_cat_slug = 'umzugsservice-atu-category'; 

    $labels = array(

        'name'                       => esc_html__( 'Umzugsservice Categories', 'themesflat-core' ),

        'singular_name'              => esc_html__( 'Categories', 'themesflat-core' ),

        'search_items'               => esc_html__( 'Search Categories', 'themesflat-core' ),

        'menu_name'                  => esc_html__( 'Categories', 'themesflat-core' ),

        'all_items'                  => esc_html__( 'All Categories', 'themesflat-core' ),

        'parent_item'                => esc_html__( 'Parent Categories', 'themesflat-core' ),

        'parent_item_colon'          => esc_html__( 'Parent Categories:', 'themesflat-core' ),

        'new_item_name'              => esc_html__( 'New Categories Name', 'themesflat-core' ),

        'add_new_item'               => esc_html__( 'Add New Categories', 'themesflat-core' ),

        'edit_item'                  => esc_html__( 'Edit Categories', 'themesflat-core' ),

        'update_item'                => esc_html__( 'Update Categories', 'themesflat-core' ),

        'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'themesflat-core' ),

        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'themesflat-core' ),

        'not_found'                  => esc_html__( 'No Categories found.' ),

        'menu_name'                  => esc_html__( 'Categories' ),

    );

    $args = array(

        'labels'        => $labels,

        'rewrite'       => array('slug'=>$service_cat_slug),

        'hierarchical'  => true,

        'show_in_rest'  => true,

    );

    register_taxonomy( 'service_category', 'service', $args );

    flush_rewrite_rules();

}

function service_custom_meta() {

    add_meta_box(

		'service_custom_field',       

		'Information service',                  

		'service_custom_metabox',  

		'service',                 

		'side',                

		'high'                     

	);

}

// add_action('add_meta_boxes', 'service_custom_meta');

function service_custom_metabox() {
    global $post;

    $data_desc = get_post_meta($post->ID, 'desc_service_value', true);
    $image_url = get_post_meta($post->ID, 'image_service_url', true);

    // Use nonce for verification to secure data sending
    wp_nonce_field( basename( __FILE__ ), 'service_nonce' );
    ?>

    <div class="group-custom-metabox-contianer">
        <div class="inner-full group-custom-metabox" style="margin-bottom: 30px;">
            <label for="desc_service" style="display: block; font-size: 18px; font-weight: 600; color: #3C210E; text-transform: capitalize; margin-bottom: 20px;">
                <?php esc_html_e( 'Description', 'themesflat-core' ) ?>
            </label>
            <textarea id="desc_service" name="desc_service_value" rows="5" style="width: 100%; border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 10px 25px;"><?php echo esc_textarea($data_desc); ?></textarea>
        </div>
    </div>

    <!-- Image Upload -->
        <div class="inner-full group-custom-metabox" style="margin-bottom: 30px;">
            <label for="image_service" style="display: block; font-size: 18px; font-weight: 600; color: #3C210E; margin-bottom: 10px;">
                <?php esc_html_e( 'service Single Image', 'themesflat-core' ) ?>
            </label>
            <input type="hidden" name="image_service_url" id="image_service_url" value="<?php echo esc_url($image_url); ?>" />
            <img id="image_preview" src="<?php echo esc_url($image_url); ?>" style="max-width: 200px; display: <?php echo $image_url ? 'block' : 'none'; ?>; margin-bottom: 10px;" />
            <button type="button" class="button" id="upload_image_button"><?php esc_html_e( 'Choose Image', 'themesflat-core' ); ?></button>
            <button type="button" class="button" id="remove_image_button" style="display: <?php echo $image_url ? 'inline-block' : 'none'; ?>;"><?php esc_html_e( 'Remove Image', 'themesflat-core' ); ?></button>
        </div>

        <script>
        jQuery(document).ready(function($){
            var mediaUploader;

            $('#upload_image_button').click(function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media({
                    title: 'Choose Image',
                    button: { text: 'Choose Image' },
                    multiple: false
                });
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#image_service_url').val(attachment.url);
                    $('#image_preview').attr('src', attachment.url).show();
                    $('#remove_image_button').show();
                });
                mediaUploader.open();
            });

            $('#remove_image_button').click(function(e) {
                e.preventDefault();
                $('#image_service_url').val('');
                $('#image_preview').hide();
                $(this).hide();
            });
        });
    </script>

    <?php
}


function service_save_meta_fields($post_id) {

	// Verify nonce
	if (!isset($_POST['service_nonce']) || !wp_verify_nonce($_POST['service_nonce'], basename(__FILE__)))
		return;

	// Check autosave
	if (wp_is_post_autosave($post_id))
		return;

	// Check post revision
	if (wp_is_post_revision($post_id))
		return;

	// Check permissions
	if (isset($_POST['post_type']) && $_POST['post_type'] == 'service') {
		if (!current_user_can('edit_page', $post_id))
			return;
	} elseif (!current_user_can('edit_post', $post_id)) {
		return;
	}

	
    if (isset($_POST['desc_service_value'])) {
		update_post_meta($post_id, 'desc_service_value', sanitize_text_field($_POST['desc_service_value']));
	}else {
		update_post_meta($post_id, 'desc_service_value', 'GIFFORDS is a nationwide organization led by former Congresswoman Gabrielle Giffords that is dedicated to saving lives from gun violence.');
	}

    if (isset($_POST['image_service_url'])) {
    	update_post_meta($post_id, 'image_service_url', esc_url_raw($_POST['image_service_url']));
    } else {
    	delete_post_meta($post_id, 'image_service_url');
    }
   
}

// add_action('save_post', 'service_save_meta_fields');
