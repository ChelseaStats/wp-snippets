<?php
/*
Plugin Name: TCR Clean Up & Settings
License: GPL
Version: 1.0.0
Plugin URI: http://thecellarroom.net
Author: The Cellar Room Limited
Author URI: http://www.thecellarroom.net

Description: Creates and options page to change WordPress settings, filters and options
*Removes and adds better fields to user profile
*Removes Admin bar
*Removes wp-pagenavi style
*Removes excess from wordpress head.
*Creates custom background and logo on wordpress admin page
*Compatible with WordPress 3.x+.
*Autocorrects page/post titles
*Changes default from name and from email address
*change to default cookie timeout setting
*Creates admin menu option to view 'all settings page'
*extends the default cookie time out for wordpress admin users

*/
defined( 'ABSPATH' ) or die();
###################################################################################

//First use the add_action to add onto the WordPress menu.

 if(function_exists('add_action'))
add_action('admin_menu', 'tcr_add_options');

//Make our function to call the WordPress function to add to the correct menu.
function tcr_add_options() {
             add_management_page('TCR Settings', 'TCR Settings', 8, 'coresetup', 'tcr_options_page');	
}

function tcr_options_page() {
    // variables for the field and option names 
    $opt_name = array(	      
	'tcr_email_from' 			=> 'tcr_email_from',
	'tcr_email_from_name' 	=> 'tcr_email_from_name',
	'tcr_activ_junk' 			=> 'tcr_activ_junk',
	'tcr_activ_junk2' 			=> 'tcr_activ_junk2',
	'tcr_activ_title' 			=> 'tcr_activ_title',
	'tcr_dereg_pagenavi' 		=> 'tcr_dereg_pagenavi',
	'tcr_custom_login' 			=> 'tcr_custom_login',
	'tcr_remember_me' 		=> 'tcr_remember_me',
	'tcr_activ_allset' 			=> 'tcr_activ_allset'
	);
				  
    $hidden_field_name = 'tcr_submit_hidden';

	// Read in existing option value from database
	$opt_val = array(
	 'tcr_email_from' 			=> get_option( $opt_name['tcr_email_from'] ),
  	 'tcr_email_from_name' 	=> get_option( $opt_name['tcr_email_from_name'] ),
  	 'tcr_activ_junk' 			=> get_option( $opt_name['tcr_activ_junk'] ),
	 'tcr_activ_junk2' 			=> get_option( $opt_name['tcr_activ_junk2'] ),
  	 'tcr_activ_title' 			=> get_option( $opt_name['tcr_activ_title'] ),
	 'tcr_activ_allset' 			=> get_option( $opt_name['tcr_activ_allset'] ),
  	 'tcr_dereg_pagenavi' 		=> get_option( $opt_name['tcr_dereg_pagenavi'] ),
	 'tcr_remember_me' 		=> get_option( $opt_name['tcr_remember_me'] ),
	);

// See if the user has posted us some information
// If they did, this hidden field will be set to 'Y'

if(isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
    // Read their posted value
    $opt_val = array(	
	'tcr_email_from'  			=> $_POST[ $opt_name['tcr_email_from'] ],
    	'tcr_email_from_name' 	=> $_POST[ $opt_name['tcr_email_from_name'] ],
    	'tcr_activ_junk'			=> $_POST[ $opt_name['tcr_activ_junk'] ],
    	'tcr_activ_junk2'			=> $_POST[ $opt_name['tcr_activ_junk2'] ],				
    	'tcr_activ_title'			=> $_POST[ $opt_name['tcr_activ_title'] ],
	'tcr_activ_allset'			=> $_POST[ $opt_name['tcr_activ_allset'] ],
    	'tcr_dereg_pagenavi'		=> $_POST[ $opt_name['tcr_dereg_pagenavi'] ],
	'tcr_remember_me'		=> $_POST[ $opt_name['tcr_remember_me'] ],
	);		

    // Save the posted value in the database
    	update_option( $opt_name['tcr_email_from']	    	, $opt_val['tcr_email_from'] );
	update_option( $opt_name['tcr_email_from_name']	, $opt_val['tcr_email_from_name'] );
	update_option( $opt_name['tcr_activ_junk']		, $opt_val['tcr_activ_junk'] );
	update_option( $opt_name['tcr_activ_junk2']		, $opt_val['tcr_activ_junk2'] );
	update_option( $opt_name['tcr_activ_title']		, $opt_val['tcr_activ_title'] );
	update_option( $opt_name['tcr_activ_allset']		, $opt_val['tcr_activ_allset'] );
	update_option( $opt_name['tcr_dereg_pagenavi']	, $opt_val['tcr_dereg_pagenavi'] );
	update_option( $opt_name['tcr_remember_me']	, $opt_val['tcr_remember_me'] );		
    // Put an options updated message on the screen
?>
<div id="message" class="updated fade"><p><strong><?php _e('Options saved.', 'tcr_trans_domain' ); ?></strong></p></div>

<?php
	}
?>

<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div>
<h2><?php _e( 'TCR Core Setup Options', 'tcr_trans_domain' ); ?></h2>
<p>A one size fits all utility plugin that does a little bit of everything you'd want from a standard wordpress install</p>

<form name="att_img_options" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<h3>General Options</h3>

<input id="tcr_activ_junk" name="tcr_activ_junk" type="checkbox" value="1" <?php checked( '1', get_option( 'tcr_activ_junk' ) ); ?> />
<label for="tcr_activ_junk">Remove junk from the header?</label>
<br/>

<input id="tcr_activ_junk2" name="tcr_activ_junk2" type="checkbox" value="1" <?php checked( '1', get_option( 'tcr_activ_junk2' ) ); ?> />
<label for="tcr_activ_junk2">Remove junk from the user page?</label>
<br/>

<input id="tcr_activ_title" name="tcr_activ_title" type="checkbox" value="1" <?php checked( '1', get_option( 'tcr_activ_title' ) ); ?> />
<label for="tcr_activ_title">Activate Title Autofix?</label>
<br/>

<input id="tcr_dereg_pagenavi" name="tcr_dereg_pagenavi" type="checkbox" value="1" <?php checked( '1', get_option( 'tcr_dereg_pagenavi' ) ); ?> />
<label for="tcr_dereg_pagenavi">Remove added PageNavi style?</label>
<br/>

<input id="tcr_remember_me" name="tcr_remember_me" type="checkbox" value="1" <?php checked( '1', get_option( 'tcr_remember_me' ) ); ?> />
<label for="tcr_remember_me">Custom login cookie?</label>
<br/>

<input id="tcr_activ_allset" name="tcr_activ_allset" type="checkbox" value="1" <?php checked( '1', get_option( 'tcr_activ_allset' ) ); ?> />
<label for="tcr_activ_allset">Activate All-settings Page?</label>
<br/>

<h3>Required Details</h3>

<table class="form-table">

<tbody>
<tr>
<th scope="row"><label>Email From Address:</label></th>
<td><input type="text" name="<?php echo $opt_name['tcr_email_from']?>" value="<?php echo $opt_val['tcr_email_from']; ?>" /></td>
</tr>

<tr>
<th scope="row"><label>Email From name:</label></th>
<td><input type="text" name="<?php echo $opt_name['tcr_email_from_name']?>" value="<?php echo $opt_val['tcr_email_from_name']; ?>" /></td>
</tr>

</tbody>
</table>

<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"  /></p>  
</form>
</div>
<?php
}
// Some filters

add_filter('wp_mail_from'		,get_option( $opt_name['tcr_email_from']));
add_filter('wp_mail_from_name'	,get_option( $opt_name['tcr_email_from_name']));

###################################################################################

if(!get_option('tcr_activ_title') ) {
// no nothing here
} else {
function lowertitle($title)  {
$title = strtolower($title);
return $title;
}

function fixtitle($title) {
$smallwordsarray = array( 'of','a','the','and','an','or','nor','but','is','if','then','else','when', 'at','from','by','on','off','for','in','out','over','to','into','with' ); 
$words = explode(' ', $title); 
foreach ($words as $key => $word) {
if ($key == 0 or !in_array($word, $smallwordsarray)) $words[$key] = ucwords($word); 
} 
$newtitle = implode(' ', $words); return $newtitle; }

add_filter('title_save_pre'	, 'lowertitle');
add_filter('the_title'		, 'lowertitle');
add_filter('title_save_pre'	, 'fixtitle');
add_filter('the_title'		, 'fixtitle');

}
###################################################################################


if(!get_option('tcr_activ_allset') ) {
// no nothing here
} else { 

// Adds a custom view all settings option to the admin page
   function all_settings_link() {
    add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
   }
   add_action('admin_menu', 'all_settings_link');
}
   
###################################################################################

if(!get_option('tcr_activ_junk') ) {
// no nothing here
} else {
// remove plenty of wp_head actions and surplus nonsense not needed
remove_action('init'	,'wp_admin_bar_init');
remove_action('wp_head'	,'feed_links',2);
remove_action('wp_head'	,'feed_links_extra',3);
remove_action('wp_head'	,'rsd_link');
remove_action('wp_head'	,'wlwmanifest_link');
remove_action('wp_head'	,'index_rel_link');
remove_action('wp_head'	,'parent_post_rel_link',10,0);
remove_action('wp_head'	,'start_post_rel_link',10,0);
remove_action('wp_head'	,'adjacent_posts_rel_link_wp_head',10,0);
remove_action('wp_head'	,'wp_generator');
}


###################################################################################
if(!get_option('tcr_activ_junk2') ) {
// no nothing here
} else {
// remove plenty of wp_head actions and surplus nonsense not needed
// Remove and replace rubbish contact methods in user account
// the twitter one is key as this replaces the author.php pages
function extra_contact_info($contactmethods) {
    unset($contactmethods['aim']);
    unset($contactmethods['yim']);
    unset($contactmethods['jabber']);
    $contactmethods['twitter'] = 'Twitter';
    return $contactmethods;
}
add_filter('user_contactmethods', 'extra_contact_info');

}

###################################################################################

// Remove default styling wp-pagenavi creates as these are already in my style sheet and saves using styling plugin

if(!get_option('tcr_dereg_pagenavi') ) {
// no nothing here
} else {

function CFC_deregister_styles() { wp_deregister_style( 'wp-pagenavi' ); }
add_action( 'wp_print_styles', 'CFC_deregister_styles', 100 );
}


###################################################################################
if(!get_option('tcr_remember_me') ) {
// no nothing here
} else {

// Hook stuff in
function tcr_remember_init() {
	add_filter( 'login_footer',           'tcr_remember_js' );
	add_filter( 'auth_cookie_expiration', 'tcr_remember_cookie' );
}
add_action( 'init', 'tcr_remember_init' );

// JS that checks the checkbox
function tcr_remember_js() {
	echo <<<JS
	<script>
	document.getElementById('rememberme').checked = true;
	document.getElementById('user_login').focus();
	</script>
JS;
}

function tcr_remember_cookie() {
	return 31536000; // one year: 60 * 60 * 24 * 365
}
}
?>
