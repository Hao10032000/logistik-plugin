<?php
class Button_Form_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'button_form_widget',
            'TF Button Form',
            array( 'description' => 'A customizable button form widget with SVG icon.' )
        );
    }

    public function widget( $args, $instance ) {
        $button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : 'Jetzt kostenloses & unverbindliches Angebot einholen';
        $button_link = ! empty( $instance['button_link'] ) ? $instance['button_link'] : '#anfrageformular';
        $button_icon_svg = ! empty( $instance['button_icon_svg'] ) ? $instance['button_icon_svg'] : '<svg height="1792" viewBox="0 0 1792 1792" width="1792" xmlns="http://www.w3.org/2000/svg"><path d="M888 1184l116-116-152-152-116 116v56h96v96h56zm440-720q-16-16-33 1l-350 350q-17 17-1 33t33-1l350-350q17-17 1-33zm80 594v190q0 119-84.5 203.5t-203.5 84.5h-832q-119 0-203.5-84.5t-84.5-203.5v-832q0-119 84.5-203.5t203.5-84.5h832q63 0 117 25 15 7 18 23 3 17-9 29l-49 49q-14 14-32 8-23-6-45-6h-832q-66 0-113 47t-47 113v832q0 66 47 113t113 47h832q66 0 113-47t47-113v-126q0-13 9-22l64-64q15-15 35-7t20 29zm-96-738l288 288-672 672h-288v-288zm444 132l-92 92-288-288 92-92q28-28 68-28t68 28l152 152q28 28 28 68t-28 68z"/></svg>';

        echo $args['before_widget'];
        wp_enqueue_style( 'tf-whapapp' );

        ?>
        <a class="tf-btn-form" href="<?php echo esc_url( $button_link ); ?>" >
            <?php if (!empty($button_icon_svg)) : ?>
                <span class="tf-icon-svg"><?php echo $button_icon_svg; ?></span>
            <?php endif; ?>
            <?php echo esc_html( $button_text ); ?>
        </a>
        <?php
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : 'Jetzt kostenloses & unverbindliches Angebot einholen';
        $button_link = ! empty( $instance['button_link'] ) ? $instance['button_link'] : '#anfrageformular';
        $button_icon_svg = ! empty( $instance['button_icon_svg'] ) ? $instance['button_icon_svg'] : '';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'button_link' ); ?>"><?php _e( 'Button Link (URL):' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_link' ); ?>" name="<?php echo $this->get_field_name( 'button_link' ); ?>" type="text" value="<?php echo esc_attr( $button_link ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'button_icon_svg' ); ?>"><?php _e( 'Button Icon (SVG):' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'button_icon_svg' ); ?>" name="<?php echo $this->get_field_name( 'button_icon_svg' ); ?>" rows="3"><?php echo esc_textarea( $button_icon_svg ); ?></textarea>
            <small><?php _e('Enter SVG or Icon'); ?></small>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? strip_tags( $new_instance['button_text'] ) : '';
        $instance['button_link'] = ( ! empty( $new_instance['button_link'] ) ) ? strip_tags( $new_instance['button_link'] ) : '';
        $instance['button_icon_svg'] = ( ! empty( $new_instance['button_icon_svg'] ) ) ? $new_instance['button_icon_svg'] : '';
        return $instance;
    }
}

function register_button_form_widget() {
    register_widget( 'Button_Form_Widget' );
}
add_action( 'widgets_init', 'register_button_form_widget' );

?>