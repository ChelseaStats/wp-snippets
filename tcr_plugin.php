<?php
/*
Plugin Name: TCR Utility plugin
License: GPL
Version: 5.0.0
Plugin URI: http://thecellarroom.net
Author: The Cellar Room Limited
Author URI: http://www.thecellarroom.net
Copyright (c) 2015 The Cellar Room Limited

Description: Wordpress settings, filters plus extras - no options
*Removes and adds better fields to user profile
*Removes Admin bar
*Removes wp-pagenavi style
*Removes excess from wordpress head.
*Creates custom background and logo on wordpress admin page
*Compatible with WordPress 3.x+.
*Autocorrects page/post titles
*Changes default from name and from email address
*change to default cookie timeout setting
*/
###################################################################################
defined( 'ABSPATH' ) or die();

// remove table height attrib from pasting from excel.

function replace_content($content) {
        
    $search = array
    (
    '<td align="right" height="14">',
    '<td align="right">', 
    '<td height="14">', 
    '<table width="450px;" class="tablesorter">', 
    '<table class="tablesorter" width="450">',
    '<th width="65">', 
    '<th width="285">',
    '<th width="385">',
    '<h2>The London League by home games</h2>', 
    '<h2>The London League by away games</h2>', 
    '<h2>London League</h2>'
    );  
    
    $replace = array
    (
    '<td class="text-align:right;">',
    '<td class="text-align:right;">',
    '<td>',
    '<table class="tablesorter">',
    '<table class="tablesorter">',
    '<th>',
    '<th>',
    '<th>',
    '<h3>The London League by home games</h3>',
    '<h3>The London League by away games</h3>',
    '<h3>London League</h3>'
    );
    
    $content = str_replace($search,$replace,$content);  
    return $content;
}
add_filter('the_content','replace_content');


###################################################################################


// Make twitter username stuff happy
function tcr_twitusername($content) {
	$content = preg_replace("/(^|\s)*(@([a-zA-Z0-9-_]{1,15}))(\.*[\n|\r|\t|\s|\<|\&]+?)/i", "$1<a href=\"http://twitter.com/$3\">$2</a>$4", $content);
	return $content;
}
add_filter('the_content','tcr_twitusername');

###################################################################################

// Make twitter hash stuff happy	
function tcr_twithash($content) {
	$content = preg_replace('/([^a-zA-Z0-9-_&])#([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/search?q=%23$2\" target=\"_blank\">#$2</a>",$content);
	return $content;
}	
add_filter('the_content','tcr_twithash');


###################################################################################

	// add author filter to wordpress posts admin



function author_filter() {
		$args = array('name' => 'author', 'show_option_all' => 'View all authors');
			if (isset($_GET['user'])) {
					$args['selected'] = $_GET['user'];
					}
				wp_dropdown_users($args);
}
add_action('restrict_manage_posts', 'author_filter');

###################################################################################

function lowertitle($title)  {
    $title = strtolower($title);
    return $title;
}
add_filter('title_save_pre'	, 'lowertitle');
add_filter('the_title'		, 'lowertitle');

###################################################################################

function fixtitle($title) {
    $smallwordsarray = array( 'of','a','the','and','an','or','nor','but','is','if','then','else','when', 'at','from','by','on','off','for','in','out','over','to','into','with' ); 
    $words = explode(' ', $title); 
    foreach ($words as $key => $word) {
            if ($key == 0 or !in_array($word, $smallwordsarray)) $words[$key] = ucwords($word); 
        } 
    $newtitle = implode(' ', $words); return $newtitle; 
}
add_filter('title_save_pre'	, 'fixtitle');
add_filter('the_title'		, 'fixtitle');


###################################################################################
  
// Adds a custom view all settings option to the admin page
function all_settings_link() {
    add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
}
add_action('admin_menu', 'all_settings_link');

###################################################################################

remove_action('init'    ,'wp_admin_bar_init');
remove_action('wp_head' ,'feed_links',2); 
remove_action('wp_head' ,'feed_links_extra',3); 
remove_action('wp_head' ,'rsd_link'); 
remove_action('wp_head' ,'wlwmanifest_link'); 
remove_action('wp_head' ,'index_rel_link'); 
remove_action('wp_head' ,'parent_post_rel_link',10,0); 
remove_action('wp_head' ,'start_post_rel_link',10,0); 
remove_action('wp_head' ,'adjacent_posts_rel_link_wp_head',10,0); 
remove_action('wp_head' ,'wp_generator'); 
// Some filters

add_filter('wp_mail_from'	,'website@thechels.co.uk');
add_filter('wp_mail_from_name'	,'website@thechels.co.uk');


###################################################################################

// remove plenty of wp_head actions and surplus nonsense not needed
// Remove and replace rubbish contact methods in user account
// the twitter one is key as this replaces the author.php pages

function TCR_extra_contact_info($contactmethods) {
    unset($contactmethods['aim']);
    unset($contactmethods['yim']);
    unset($contactmethods['jabber']);
    $contactmethods['websitename'] = 'Website Name';
    $contactmethods['twitter'] = 'Twitter URL';
    $contactmethods['twitterid'] = 'Twitter ID';
    $contactmethods['googleplus'] = 'Google Plus';

    return $contactmethods;
}
add_filter('user_contactmethods', 'TCR_extra_contact_info');


###################################################################################

// Remove default styling wp-pagenavi creates as these are already in my style sheet and saves using styling plugin
function CFC_deregister_styles() { 
    wp_deregister_style( 'wp-pagenavi' ); 
    wp_deregister_style( 'page-list-style' );
}
add_action( 'wp_print_styles', 'CFC_deregister_styles', 100 );

###################################################################################
function tcr_custom_login_logo() {
			  echo '<style type="text/css">
				body.login #login{padding-top:50px;}
				body.login h1 a{ 
				  display:none;
				}

				body.login{ 
				  background-image: url("http://www.thechels.co.uk/wp-content/uploads/abg.png");
				  background-size:cover;
				}

				body.login #nav{
				  /* Your styles */
				display:none;
				}

				body.login #backtoblog{
				  /* Your styles */
				display:none;
				}
			  </style>';
}
add_action('login_head', 'tcr_custom_login_logo');


function tcr_login_headerurl(){
			return home_url('/');
}
add_filter( 'login_headerurl', 'tcr_login_headerurl');


function tcr_login_headertitle() {
			return get_bloginfo('title', 'ChelseaStats' );
}
add_filter( 'login_headertitle', 'tcr_login_headertitle');
?>