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
