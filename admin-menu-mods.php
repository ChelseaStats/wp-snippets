<?php
/* Admin modifications for WordPress */

// Remove the WP logo
function remove_wp_logo() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('wp-logo');  
}  
add_action( 'wp_before_admin_bar_render', 'remove_wp_logo' );  

// Remove the Howdy
function remove_my_account() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('my-account');  
}  
add_action( 'wp_before_admin_bar_render', 'remove_my_account' );  

// Remove comment bubble
function remove_comment_bubble() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('comments');  
}  
add_action( 'wp_before_admin_bar_render', 'remove_comment_bubble' ); 

// Remove my sites menu
function remove_my_sites() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('my-sites');  
}  
add_action( 'wp_before_admin_bar_render', 'remove_my_sites' );

// Remove the current Site Name menu
function remove_this_site() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('site-name');  
}  
add_action( 'wp_before_admin_bar_render', 'remove_this_site' );  

// Remove add new content menu
function disable_new_content() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('new-content');  
}  
add_action( 'wp_before_admin_bar_render', 'disable_new_content' );  

// Remove Search Bar
function disable_bar_search() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('search');  
}  
add_action( 'wp_before_admin_bar_render', 'disable_bar_search' );  

// Remove admin bar updates
function disable_bar_updates() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('updates');  
}  
add_action( 'wp_before_admin_bar_render', 'disable_bar_updates' );  

// Remove footer
function replace_footer_admin ()   
{  
    echo '<span id="footer-thankyou"></span>';  

}  
add_filter('admin_footer_text', 'replace_footer_admin');
function replace_footer_version() 
{
    return ' ';
}
add_filter( 'update_footer', 'replace_footer_version', '1234');

// Remove help tabs
function wpse50787_remove_contextual_help() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
}
add_action( 'admin_head', 'wpse50787_remove_contextual_help' );

// add display none styles to some admin elements

function admin_register_head() {
    $siteurl = get_option('siteurl');
    $url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/yourstyle.css';
    echo "<style> #wpfooter {display:none;}</style>";
}
add_action('admin_head', 'admin_register_head');


?>
