/* Creare a shortcode for WordPress */

// change xxx for each shortcode, must be unique, ideally add a unique prefix to the function e.g. TCR_name_shorcode
function xxx_shortcode( $atts, $content = null ){
return '<p style="text-align:justify;"><span class="label label-success">Did You Know?</span> '.$content.'.</p>';
}
add_shortcode( 'xxx', 'xxx_shortcode' );

// usage: 
[xxx]content[/xxx]

