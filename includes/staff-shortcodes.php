<?php
	
/**
 * Shortcodes for use in our themes
 */
 
// Add Shortcode
function staff_list_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'campus' => '',
		), $atts )
	);
	
	$args = array (
		'post_type'              => 'staff',
		'campus'          		 => $campus,
		'order'                  => 'ASC',
		'orderby'                => 'rand',
	);
	
	$staff_query = new WP_Query( $args );
	
	$output = '';
	
	if ( $staff_query->have_posts() ) {
		while ( $staff_query->have_posts() ) {
			$staff_query->the_post();
			
			$staff_name = get_the_title();
		    $staff_title = esc_html( get_post_meta( get_the_ID(), 'staff_title', true ) );
		    $staff_email = esc_html( get_post_meta( get_the_ID(), 'staff_email', true ) );
		    $staff_facebook = esc_html( get_post_meta( get_the_ID(), 'staff_facebook', true ) );
		    $staff_twitter = esc_html( get_post_meta( get_the_ID(), 'staff_twitter', true ) );
		    $staff_blog = esc_html( get_post_meta( get_the_ID(), 'staff_blog', true ) );
		    $staff_instagram = esc_html( get_post_meta( get_the_ID(), 'staff_instagram', true ) );
		    $staff_thumb = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

			$output .= '<div class="spb_icon_box col-sm-3">';
			$output .= '<div class="spb_wrapper box-wrap">';
			/*
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( array(250, 250) );
			}
			*/			
			
			$output .= '<img src="' . $staff_thumb . '" />';
			$output .= '<h4 style="margin-bottom: 0;">' . $staff_name . '</h4>';

			$output .= '<p>';
		    if($staff_title) {
			    $output .= $staff_title;
			    $output .= '<br />';
			}
		    if($staff_email) {
			    $output .= '<a href="mailto:' . $staff_email . '" class="staff-icon" id="staff-icon-mail">mail</a>';
			}
		    if($staff_facebook) {
			    $output .= ' | <a href="' . $staff_facebook . '" class="staff-icon" id="staff-icon-facebook">facebook</a>';
			}
		    if($staff_twitter) {
			    $output .= ' | <a href="' . $staff_twitter . '" class="staff-icon" id="staff-icon-twitter">twitter</a>';
			}
		    if($staff_instagram) {
			    $output .=  ' | <a href="' . $staff_instagram . '" class="staff-icon" id="staff-icon-instagram">instagram</a>';
			}
		    if($staff_blog) {
			    $output .=  ' | <a href="' . $staff_blog . '" class="staff-icon" id="staff-icon-blog">blog</a>';
			}
			$output .=  '</p>';
			$output .=  '</div>';
			$output .=  '</div>';
			
		    
		}
	} else {
		$output = '<p>no staff found</p>';
	}
	return $output;
	
	wp_reset_postdata();
	
}
add_shortcode( 'campus_staff_list', 'staff_list_shortcode' );
