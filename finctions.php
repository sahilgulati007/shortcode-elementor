<?php
add_shortcode( 'display_reports', 'reports_display_func' );
function reports_display_func( $atts ) {
    $args = array( 'post_type' => 'reports', 'posts_per_page' => 3);
    $the_query = new WP_Query( $args );
 
    $sthtml='';
    if ( $the_query->have_posts() ) : 
        $sthtml.='<div class="row row-reports">';
            if(isset($atts['heading_text'])){ 
                $sthtml.='<h1 style="text-align: center;">'. $atts['heading_text'] .'</h1>';
            } 
            foreach($the_query->posts as $cats){
                
                $sthtml.='<div class="column">';
                $sthtml.=get_the_post_thumbnail($cats->ID);
                $sthtml .= '<h3>' . $cats->post_title . '</h3>';
                $sthtml.='</div>';
            }
            

            
            $sthtml.='<div>my title</div>';
        $sthtml.='</div>';
    
    endif;
    return $sthtml;
    
}
