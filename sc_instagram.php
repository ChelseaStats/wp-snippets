/* Instagram shortcode for WordPress */

// Shortcode for embedding instagrams
function TCR_instagram($atts, $content = null) {
  extract(shortcode_atts(array(
		'instagram' => 'http://instagr.am/p/',
		'id' => 'xxxxxxx', 
		'alt' => '',
		'size' => 'm' // m,t or l 
	), $atts));

	return '<img class="instagram" src="' . $instagram . $id . '/media?size=' . $size . '" alt="' . $alt . '" />';
}
add_shortcode('instagram', 'tcr_instagram');

// use the shortcode like this :
[instagram id='xxxxxxx' size='l']
