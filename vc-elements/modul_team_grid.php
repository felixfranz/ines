<?php 
/*
Element Description: VC Recent Projects Mix
*/
 
// Element Class 
class vcMitarbeiterGrid extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_mitarbeiter_grid_mapping' ),12 );
        add_shortcode( 'vc_call_to_mitarbeiter_grid', array( $this, 'vc_call_to_mitarbeiter_grid_html' ) );
    }
     
    // Element Mapping
    public function vc_mitarbeiter_grid_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
             
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Team Grid', 'text-domain'),
                'base' => 'vc_call_to_mitarbeiter_grid',
                'description' => __('Team Grid', 'text-domain'), 
                'category' => __('zweigrad Custom Elements', 'text-domain'),   
                'icon' => get_template_directory_uri().'/assets/img/icon-media-grid.svg'                
            )
        );                                       
    }
        
// Element HTML
public function vc_call_to_mitarbeiter_grid_html( $atts ) {

    $count_posts = wp_count_posts( 'team' )->publish;

    $count_posts = $count_posts / 2;


    $html = '<div id="team_grid" class="wrap">';
     
    // LOOP LAUFEN LASSEN
    $args = array( 
            'post_type' => 'team',
            'post_status' => 'publish',
            'order' => 'ASC',
            'orderby' => 'menu_order' 
          );

    $i = 0;
    $total_i = 0;

        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); 

        $team_image  = get_field('team_image');
        $team_name   = get_the_title();
        $team_title   = get_field('team_title');
        $team_text   = get_field('team_text');
        $team_phone  = get_field('team_phone');
        $team_email  = get_field('team_email');

        $team_xing  = get_field('team_xing');
        $team_facebook  = get_field('team_facebook');
        $team_insta  = get_field('team_instagram');
        $team_linkedin  = get_field('team_linkedin');
        $team_id = get_the_ID();

        $thumb = $team_image['url'];

        $i++;
        $total_i++;

        if($total_i == 4){
           $html .= '<div class="team_more_container">';
            }


        if($i == 1){
                $html .= '<div class="row_container">';
            }


        
        $html .= '
            <a class="team_toggle" id="team-id-' . $team_id . '" rel="' . $team_id . '" href="#'. $team_name .'" data-target="#team-infos-'. $team_id .' ">

            <div class="image_container">

                 <img src="'. $thumb .'"  />

            </div>     

            <p><strong>'. $team_name .'</strong>
            <br>
            '. $team_title .'</p>

            </a>

            <div class="team_infos_container" id="team-infos-'. $team_id .'">   
                <a href="#" class="close_button"><span></span></a>

                <div class="team_infos_header">
                    
                    <h3>'. $team_title .'</h3>  
                    <h2>'. $team_name .'</h2>

                </div>

                <div class="infos_text_container">
                
                     <p>'. $team_text .'</p>

                </div>     

                <div class="team_contact">
                    <p>   
                        <a href="mailto:'. $team_email .'">'. $team_email .'</a><br>
                        <a href="tel:'. $team_phone .'">'. $team_phone .' </a>
                    </p>';

                    $html .= ' <div class="social_container">';

                    if ($team_facebook) {
                        $html .=  '<a href="' . $team_facebook .' " target="_blank"><span class="social_icon"><i class="fa fa-facebook" aria-hidden="true"></i></span></a>';
                    }

                    if ($team_linkedin) {
                        $html .=   '<a href="' . $team_linkedin .' " target="_blank"><span class="social_icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span></a>';
                    } 	

                    if ($team_xing) {
                        $html .=   '<a href="' . $team_xing .' " target="_blank"><span class="social_icon"><i class="fa fa-xing" aria-hidden="true"></i></span></a>';
                    } 	

                    if ($team_insta) {
                        $html .=   '<a href="' . $team_insta .' " target="_blank"><span class="social_icon"><i class="fa fa-instagram" aria-hidden="true"></i></span></a>';
                    } 

        			$html .= '</div>'; // end social container
                    $html .= '</div> '; //   end contact

                     $html .= '</div> ';

            if($i == 3 || $total_i == $count_posts){

                if($total_i == $count_posts){
                        $missing_element_count = 3 - $i;

                        for ($i=0; $i < $missing_element_count; $i++) { 
                             $html .= '<a class="team_toggle hide"></a>';
                        }
                    }

                $html .= '</div>';
                $i = 0;
            }


        endwhile; 
         // Fill $html var with data
        $html .= '</div>';
        $html .= '<a href="#" class="button btn_green team_more">
        <span class="closed">'. __('Ganzes Team ansehen', 'zweigrad') .' </span>
        <span class="open">'. __('Weniger ansehen', 'zweigrad') .' </span>
        </a>';
        $html .= '</div>';

    wp_reset_postdata();
    return $html;  
}
     
} // End Element Class
 
// Element Class Init
new vcMitarbeiterGrid(); 

?>