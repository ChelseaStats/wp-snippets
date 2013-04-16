<?php

// Remove expired transients

add_action( 'wp_scheduled_delete', 'delete_expired_db_transients' );

function delete_expired_db_transients() {

    global $wpdb, $_wp_using_ext_object_cache;

    if( $_wp_using_ext_object_cache )
        return;

    $time = isset ( $_SERVER['REQUEST_TIME'] ) ? (int)$_SERVER['REQUEST_TIME'] : time() ;
    $expired = $wpdb->get_col( "SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout%' AND option_value < {$time};" );

    foreach( $expired as $transient ) {

        $key = str_replace('_transient_timeout_', '', $transient);
        delete_transient($key);
    }
}
/***************************************************************************/

// Remove headers
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rel_canonical');

/***************************************************************************/

// Profile page cleaner for WordPress Remove crap from the WordPress profile pages
function extra_contact_info($contactmethods) { 
 unset($contactmethods['aim']); 
 unset($contactmethods['yim']); 
 unset($contactmethods['jabber']); 
 $contactmethods['twitter'] = 'Twitter'; 
return $contactmethods; 
} 

add_filter('user_contactmethods', 'extra_contact_info');

/***************************************************************************/

// Title case fixer for WordPress  Convert all post titles to the proper case
function lowertitle($title) { 
 $title = strtolower($title); return $title; 
}

function fixtitle($title) { 
$smallwordsarray = array( 'of','a','the','and','an','or','nor','but','is','if','then','else','when', 
                         'at','from','by','on','off','for','in','out','over','to','into','with' );

$words = explode(' ', $title); foreach ($words as $key => $word) { 
           if ($key == 0 or !in_array($word, $smallwordsarray)) $words[$key] = ucwords($word); 
} 
$newtitle = implode(' ', $words); return $newtitle; 
}

add_filter('title_save_pre' , 'lowertitle'); 
add_filter('the_title' , 'lowertitle'); 
add_filter('title_save_pre' , 'fixtitle'); 
add_filter('the_title' , 'fixtitle');

/***************************************************************************/
// Twitter Usernames for WordPress 
function tcr_twitusername($content) { 

$content = preg_replace("/(^|\s)*(@([a-zA-Z0-9-_]{1,15}))(.*[\n|\r|\t|\s|<|&]+?)/i", "$1$2$4", $content); 
return $content; 
} 

add_filter('the_content','tcr_twitusername');

/***************************************************************************/
// Twitter search for WordPress - Make #hashtags a link to a twitter search of said tag
function tcr_twithash($content) { 

$content = preg_replace('/([^a-zA-Z0-9-_&])#([0-9a-zA-Z_]+)/',"$1#$2",$content);
return $content; 
} 

add_filter('the_content','tcr_twithash');

/***************************************************************************/
// Emails for WordPress  set the from name and from email address

add_filter('wp_mail_from' ,'name name'); 
add_filter('wp_mail_from_name' ,'name@domain.tld');
/***************************************************************************/
// compressions for WordPress
if(extension_loaded("zlib") && (ini_get("output_handler") != "ob_gzhandler"))
   add_action('wp', create_function('', '@ob_end_clean();
   @ini_set("zlib.output_compression", 1);'));
/***************************************************************************/
// All settings for WordPress Add an all options admin page to wordpress
function all_settings_link() {
   add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php'); 
} 

add_action('admin_menu', 'all_settings_link');

/***************************************************************************/

/***************************************************************************/

/***************************************************************************/