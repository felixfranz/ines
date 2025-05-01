<?php 
 
// Element Class 
class vc_services_list extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_services_list_mapping' ),12 );
        add_shortcode( 'vc_call_services_list', array( $this, 'vc_call_services_list_html' ) );
    }
     
    // Element Mapping
    public function vc_services_list_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
             
        // Map the block with vc_map()
         vc_map( 
            array(
                'name' => __('Service Liste', ''),
                'base' => 'vc_call_services_list',
                'description' => __('Service Liste anzeigen lassen', ''), 
                'category' => __('zweigrad Custom Elements', 'text-domain'),   
                'group' => 'General',
                'icon' => get_template_directory_uri().'/library/images/vc_icons/element-icon-fakten.svg',
            )
        );                                
    }
        
// Element HTML
public function vc_call_services_list_html( $atts ) {

    // Get the taxonomy's terms
$terms = get_terms(
    array(
        'taxonomy'   => 'service',
        'hide_empty' => false,
    )
);
$html = '<div class="services_list">';
// Check if any term exists
if ( ! empty( $terms ) && is_array( $terms ) ) {
    // Run a loop and print them all
    foreach ( $terms as $term ) { 
		$desc = $term->description;
		$service_name = $term->name;
        $hauptservice = '';

        if(get_field("hauptservice", $term)){
            $hauptservice = 'mainservice';
        }
		
       $html .= '<article class="'. $hauptservice .'"><a href="#">'. $service_name .'<span></span></a>';

        $html .= '<div><p>'. $desc .'</p></div></article>';

      

    }
}  


$html .= '</div>';
                  
    return $html;  
}
     
} // End Element Class
 
// Element Class Init
new vc_services_list(); 

?>