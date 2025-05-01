<?php 
 
// Element Class 
class vc_zweigrad_video extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_zweigrad_video_mapping' ),12 );
        add_shortcode( 'vc_call_zweigrad_video', array( $this, 'vc_call_zweigrad_video_html' ) );
    }
     
    // Element Mapping
    public function vc_zweigrad_video_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
             
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Video', 'text-domain'),
                'base' => 'vc_call_zweigrad_video',
                'description' => __('Video', 'text-domain'), 
                'category' => __('zweigrad Custom Elements', 'text-domain'),   
                'icon' => get_template_directory_uri().'/library/images/vc_icons/element-icon-video.svg',
                 'params' => array(

                    array(
                    'type' => 'file_picker',
                    'class' => '',
                    'heading' => __( 'Video Auswählen', 'js_composer' ),
                    'param_name' => 'video_file',
                    'value' => '',
                    'group' => 'General',
                    ),

                   array(
                    'type' => 'attach_image',
                    'heading' => __( 'Fallback Image', 'js_composer' ),
                    'param_name' => 'vc_fallback_image',
                    'admin_label' => false,
                    'description' => __( '', 'js_composer' ),
                    'group' => 'General',
                  ), // end params                
              )
            )
        );                                       
    }
        
// Element HTML
public function vc_call_zweigrad_video_html( $atts ) {

    $atts = vc_map_get_attributes('vc_call_zweigrad_video', $atts);
    extract($atts);

    $video_file = wp_get_attachment_url( $atts['video_file'] );
    $image = wp_get_attachment_url( $atts['vc_fallback_image'] );

        $output = '<div class="video_wrapper">
        <video class="project_video" playsinline  poster="'. $image . '">

            <source src="'. $video_file . '" type="video/mp4">
            <img src="'. $image . '" title="Your browser does not support the <video> tag">

            Your browser does not support the video tag.

        </video>
            <div class="controls">

                <a href="#" class="play">play</a>
              <!-- <a href="#" class="sound">mute</a> -->

            </div>
        </div>';    
        
         
                  
    return $output;  
}
     
} // End Element Class
 
// Element Class Init
new vc_zweigrad_video(); 

?>