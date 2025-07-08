<?php 
class WhatsApp_Button_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'whatsapp_button_widget', 
            'TF WhatsApp Button', 
            array( 'description' => 'A WhatsApp button widget.' ) 
        );
    }

    public function widget( $args, $instance ) {
        $phone = ! empty( $instance['phone'] ) ? $instance['phone'] : '4915224620155';
        $image_url = ! empty( $instance['image_url'] ) ? $instance['image_url'] : 'https://www.atu-logistik.de/wp-content/uploads/2015/11/stefan_andres.jpg';
        $name = ! empty( $instance['name'] ) ? $instance['name'] : 'Stefan Andres';
        $status = ! empty( $instance['status'] ) ? $instance['status'] : 'Online';
        $button_title = ! empty( $instance['button_title'] ) ? $instance['button_title'] : 'Beratung oder Live-Besichtigung? Jetzt WhatsApp starten!';

        echo $args['before_widget'];

        wp_enqueue_style( 'tf-whapapp' );
        ?>
        
        <div class="tf-whatapp" >
            <a target="_blank" href="https://web.whatsapp.com/send?phone=<?php echo esc_attr( $phone ); ?>" class="tf-btn-whatapp">
                <div class="featured-image">
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="image">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 478.165 478.165" style="enable-background:new 0 0 478.165 478.165;" xml:space="preserve" width="512px" height="512px">
                        <g>
                            <path id="WhatsApp" d="M478.165,232.946c0,128.567-105.057,232.966-234.679,232.966c-41.102,0-79.814-10.599-113.445-28.969   L0,478.165l42.437-125.04c-21.438-35.065-33.77-76.207-33.77-120.159C8.667,104.34,113.763,0,243.485,0   C373.108,0,478.165,104.34,478.165,232.946z M243.485,37.098c-108.802,0-197.422,87.803-197.422,195.868   c0,42.915,13.986,82.603,37.576,114.879l-24.586,72.542l75.849-23.968c31.121,20.481,68.457,32.296,108.583,32.296   c108.723,0,197.323-87.843,197.323-195.908C440.808,124.921,352.208,37.098,243.485,37.098z M361.931,286.62   c-1.395-2.331-5.22-3.746-10.898-6.814c-5.917-2.849-34.089-16.497-39.508-18.37c-5.16-1.913-8.986-2.849-12.811,2.829   c-4.005,5.638-14.903,18.629-18.23,22.354c-3.546,3.785-6.854,4.264-12.552,1.435c-5.618-2.809-24.267-8.866-46.203-28.391   c-17.055-15.042-28.67-33.711-31.997-39.508c-3.427-5.758-0.398-8.826,2.471-11.635c2.69-2.59,5.778-6.734,8.627-10.041   c2.969-3.287,3.905-5.638,5.798-9.424c1.913-3.905,0.936-7.192-0.478-10.141c-1.415-2.849-13.01-30.881-17.752-42.337   c-4.841-11.416-9.543-9.523-12.871-9.523c-3.467,0-7.212-0.478-11.117-0.478c-3.785,0-10.041,1.395-15.381,7.192   c-5.2,5.658-20.123,19.465-20.123,47.597c0,28.052,20.601,55.308,23.55,59.053c2.869,3.785,39.747,63.197,98.303,86.07   c58.476,22.872,58.476,15.321,69.115,14.365c10.38-0.956,34.069-13.867,38.811-27.096   C363.345,300.307,363.345,288.991,361.931,286.62z" fill="#2DB742"/>
                        </g>

                    </svg>

                </div>
                <div class="content">
                    <div class="infor">
                        <div class="name"><?php echo esc_html( $name ); ?></div>
                        <div class="status"><?php echo esc_html( $status ); ?></div>
                    </div>
                    <div class="text-btn"><?php echo esc_html( $button_title ); ?></div>
                </div>
            </a>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $phone = ! empty( $instance['phone'] ) ? $instance['phone'] : '4915224620155';
        $image_url = ! empty( $instance['image_url'] ) ? $instance['image_url'] : 'https://www.atu-logistik.de/wp-content/uploads/2015/11/stefan_andres.jpg';
        $name = ! empty( $instance['name'] ) ? $instance['name'] : 'Stefan Andres';
        $status = ! empty( $instance['status'] ) ? $instance['status'] : 'Online';
        $button_title = ! empty( $instance['button_title'] ) ? $instance['button_title'] : 'Beratung oder Live-Besichtigung? Jetzt WhatsApp starten!';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image_url' ); ?>"><?php _e( 'Image URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" type="text" value="<?php echo esc_attr( $image_url ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'status' ); ?>"><?php _e( 'Status:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'status' ); ?>" name="<?php echo $this->get_field_name( 'status' ); ?>" type="text" value="<?php echo esc_attr( $status ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'button_title' ); ?>"><?php _e( 'Button Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_title' ); ?>" name="<?php echo $this->get_field_name( 'button_title' ); ?>" type="text" value="<?php echo esc_attr( $button_title ); ?>" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
        $instance['image_url'] = ( ! empty( $new_instance['image_url'] ) ) ? strip_tags( $new_instance['image_url'] ) : '';
        $instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : '';
        $instance['status'] = ( ! empty( $new_instance['status'] ) ) ? strip_tags( $new_instance['status'] ) : '';
        $instance['button_title'] = ( ! empty( $new_instance['button_title'] ) ) ? strip_tags( $new_instance['button_title'] ) : '';

        return $instance;
    }
}

function register_whatsapp_button_widget() {
    register_widget( 'WhatsApp_Button_Widget' );
}
add_action( 'widgets_init', 'register_whatsapp_button_widget' );

?>