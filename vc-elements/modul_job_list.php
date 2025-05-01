<?php 
/*
Element Description: VC Recent Projects Mix
*/
 
// Element Class 
class vc_job_list extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_job_list_mapping' ),12 );
        add_shortcode( 'vc_call_to_job_list', array( $this, 'vc_call_to_job_list_html' ) );
    }
     
    // Element Mapping
    public function vc_job_list_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
             
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Job Liste', 'text-domain'),
                'base' => 'vc_call_to_job_list',
                'description' => __('Job Liste', 'text-domain'), 
                'category' => __('zweigrad Custom Elements', 'text-domain'),   
                'icon' => get_template_directory_uri().'/assets/img/icon-media-grid.svg',
                 'params' => array(

                  array(
                    'type' => 'textarea',
                    'heading' => __( 'Text', 'js_composer' ),
                    'param_name' => 'vc_joblist_text',
                    'description' => __( 'Text unter den Jobs', 'js_composer' ),
                    'admin_label' => true,
                    'group' => 'General',
                  ), // end params                
              )                
            )
        );                                       
    }
        
// Element HTML
public function vc_call_to_job_list_html( $atts ) {

    // Params extraction
    $atts = vc_map_get_attributes('vc_call_to_job_list', $atts);
    extract($atts);


    $html = '<div id="job_list">';
     
    // LOOP LAUFEN LASSEN
    $args = array( 
            'post_type' => 'job'
          );


        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); 

        
        $job_title   = get_the_title();
        $excerpt = get_the_excerpt();
        $job_file  = get_field('job_file');
        $link = get_the_permalink();



        $html .= '<article><h3><a href="#" class="job_toggle">'. $job_title.  '<i class="vc_tta-controls-icon vc_tta-controls-icon-chevron"></i></a></h3>

        <div>
            <p>' . $excerpt . '</p>
            <a href="'. $link .'" class="button btn_white">'. __('Mehr erfahren', 'zweigrad')  .'</a>
          
        </div>
        </article>';


        endwhile; 
    
    $html .= '</div><p>'. $vc_joblist_text .'</p>'; // close job list

    wp_reset_postdata();
    return $html;  
}
     
} // End Element Class
 
// Element Class Init
new vc_job_list(); 

?>