<?php 
 
// Element Class 
class vc_impuls_intro extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_impuls_intro_mapping' ),12 );
        add_shortcode( 'vc_call_impuls_intro', array( $this, 'vc_call_impuls_intro_html' ) );
    }
     
    // Element Mapping
    public function vc_impuls_intro_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
             
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Impuls Intro', 'text-domain'),
                'base' => 'vc_call_impuls_intro',
                'description' => __('Display Impuls Intro', 'text-domain'), 
                'category' => __('zweigrad Custom Elements', 'text-domain'),   
                'icon' => get_template_directory_uri().'/library/images/vc_icons/element-icon-impuls-intro.svg',
                 'params' => array(

                  array(
                    'type' => 'attach_image',
                    'heading' => __( 'Hero Image', 'js_composer' ),
                    'param_name' => 'vc_intro_image',
                    'admin_label' => false,
                    'description' => __( '', 'js_composer' ),
                    'group' => 'General',
                  ), // end params                
              )
            )
        );                                       
    }
        
// Element HTML
public function vc_call_impuls_intro_html( $atts ) {

    $atts = vc_map_get_attributes('vc_call_impuls_intro', $atts);
    extract($atts);

    $image =  wp_get_attachment_url($vc_intro_image);

    $post = get_queried_object();
    $postType = get_post_type_object(get_post_type($post));
    if ($postType) {
     $post_type_name =   esc_html($postType->labels->singular_name);
    }

    if($post_type_name == 'Post'){
        $post_type_name = "News";
    }

    if($post_type_name == 'Beitrag'){
        $post_type_name = "News";
    }

    $title = get_the_title();

        $output = '<header class="single_intro">
                    <div class="inner_single_intro wrap">';    
        
        $output .= '<div>
                        <h3>'. $post_type_name .'</h3>
                        <h2 class="'. $vc_headline_style . '">'. $title.'</h2>
                    </div>

                </div></header>';

        $output .= '<div class="single_hero_image_container">

						<div class="single_hero_image" style="background-image: url('. $image .') "></div>

					</div>';
                  
    return $output;  
}
     
} // End Element Class
 
// Element Class Init
new vc_impuls_intro(); 

?>