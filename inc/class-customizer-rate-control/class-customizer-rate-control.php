<?php
if ( ! class_exists( 'Noa_Customize_Rate_Control' ) ) :
class Noa_Customize_Rate_Control extends WP_Customize_Control {
    public $settings = 'noa';
    public $description = '';
  
 
    public function render_content() {?>

        <span ><?php echo esc_html__( 'If you like the theme, give us your stars. ', 'noa' ) ?></span><br>

        <a style="color:#a80054;font-weight:800" href="https://wordpress.org/support/theme/noa/reviews/#new-post">Review noa theme</a>

    <?php
    }

    

}
endif;