<?php
 
 function safari_stili_frontend() {
    wp_enqueue_style('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), $ver = '5.3.3');
 	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', array(), $ver = 5.7 );
 	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/main.min.css', array('bootstrap5'), $ver = 0.9 );
     
    wp_enqueue_script( 'bootstrap5','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', [], '5.3.3', ['in_footer' => true, 'strategy' => 'defer'] );

     // Add defer to other js
    $script_arr = ['jquery-core', 'jquery-migrate', 'post-views-counter-frontend', 'swv', 'contact-form-7'];
    foreach ($script_arr as $key => $script) {
        # Defer scripts...
        wp_script_add_data( $script, 'strategy', 'defer' );
    }
}
add_action( 'wp_enqueue_scripts', 'safari_stili_frontend', 25 );


function add_font_awesome_5_cdn_attributes( $html, $handle ) {
    if ( 'bootstrap5' == $handle ) {
        return str_replace( "media='all'", "media='all' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'", $html );
    }

    return $html;
}
add_filter( 'style_loader_tag', 'add_font_awesome_5_cdn_attributes', 10, 2 );

/**
 * Function for `script_loader_tag` filter-hook.
 * 
 * @param string $tag    The `<script>` tag for the enqueued script.
 * @param string $handle The script's registered handle.
 * @param string $src    The script's source URL.
 *
 * @return string
 */
function wr_script_loader_tag_filter( $tag, $handle, $src ){
    
    if ( 'bootstrap5' == $handle ) {
        return str_replace( 'type="text/javascript"', "type=\"text/javascript\" integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'", $tag );
    }
	return $tag;
}
add_filter( 'script_loader_tag', 'wr_script_loader_tag_filter', 10, 3 );

/**
 * This function postpone CSS files
 */
function my_style_loader_tag_filter($html, $handle) {
	if ($handle === 'style' || $handle === 'contact-form-7' || $handle === 'post-views-counter-frontend' || $handle === 'dashicons' ) {
		$html1 = str_replace("rel='stylesheet'", "rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet'\"", $html);
		$html1 = str_replace(" type='text/css' media='all'", "", $html1);
		$html = $html1 . "<noscript>" . $html . "</noscript>";
	}
	return $html;
}
add_filter('style_loader_tag', 'my_style_loader_tag_filter', 10, 2);