/* Author's twitter 'you should follow' for WordPress */

function auth_shortcode(){

  // We'll need this for using get_user_id_from_string()
	require_once(ABSPATH . WPINC . '/ms-functions.php');

	// Let's see if we want the current author, or someone else
	if (!empty($atts['id'])){ // We're going on ID
		$the_author_id = $atts['id'];
	}
	else if (!empty($atts['username'])){ // We're going on username
		$the_author_id = get_user_id_from_string($atts['username']);
	}
	else if (!empty($atts['email'])){ // We're going on e-mail address
		$the_author_id = get_user_id_from_string($atts['email']);
	}
	else { // Just use the current user
		global $post; // So we can grab the author ID of the current post
		$the_author_id = $post->post_author;
	}
	
	$author = get_the_author_meta('twitter', $the_author_id);
	return '<p style="text-align:justify;"><span class="label label-success">Twitter</span> You should follow <a href="http://twitter.com/'.$author.'">@'.$author.'</a> on Twitter.</p>';
}

add_shortcode( 'auth', 'auth_shortcode' );
