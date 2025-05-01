<?php 
 
// Element Class 
class vc_zweigrad_quote extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_zweigrad_quote_mapping' ),12 );
        add_shortcode( 'vc_call_zweigrad_quote', array( $this, 'vc_call_zweigrad_quote_html' ) );
    }
     
    // Element Mapping
    public function vc_zweigrad_quote_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
             
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Zitat', 'text-domain'),
                'base' => 'vc_call_zweigrad_quote',
                'description' => __('Zitat Block', 'text-domain'), 
                'category' => __('zweigrad Custom Elements', 'text-domain'),   
                'icon' => get_template_directory_uri().'/library/images/vc_icons/element-icon-zitat.svg',
                 'params' => array(

                    array(
                    'type' => 'textarea',
                    'heading' => __( 'Zitat', 'js_composer' ),
                    'param_name' => 'vc_quote',
                    'description' => __( '', 'js_composer' ),
                    'admin_label' => true,
                    'group' => 'General',
                  ),

                  array(
                    'type' => 'textfield',
                    'heading' => __( 'Author', 'js_composer' ),
                    'param_name' => 'vc_author',
                    'description' => __( '', 'js_composer' ),
                    'admin_label' => true,
                    'group' => 'General',
                  ),

                    array(
                        "type" => "dropdown",
                        "heading" => __("Hintergrundfarbe", 'text-domain') ,
                        "param_name" => "vc_quote_style",
                        'group' => 'General',
                        "value" => array(
                            "Bitte Auswählen" => "bitte Auswählen",
                            "Grün" => "green",
                            "Grau" => "gray"
                            
                            ) ,
                            "description" => __("", 'text-domain')

                    ), // end params                
              )
            )
        );                                       
    }
        
// Element HTML
public function vc_call_zweigrad_quote_html( $atts ) {

    $atts = vc_map_get_attributes('vc_call_zweigrad_quote', $atts);
    extract($atts);

        $output = '<div class="case_zitat quote_block  '. $vc_quote_style .'">
        <blockquote class="zweigrad_quote"><p>'. $vc_quote .'</p>
        </blockquote>
        <p>'. $vc_author .'</p></div>';              
                  
    return $output;  
}
     
} // End Element Class
 
// Element Class Init
new vc_zweigrad_quote(); 

?>