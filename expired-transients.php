/* Delete expired transients from options table for WordPress */

// options table bloat
function tcr_delete_expired_db_transients() {
    global $wpdb, $_wp_using_ext_object_cache;
    if( $_wp_using_ext_object_cache )
        return;
    $time = isset ( $_SERVER['REQUEST_TIME'] ) ? (int)$_SERVER['REQUEST_TIME'] : time() ;
    $expired = $wpdb->get_col( "SELECT option_name FROM {$wpdb->options} WHERE option_name 
                              LIKE '_transient_timeout%' AND option_value < {$time};" );

    foreach( $expired as $transient ) {
        $key = str_replace('_transient_timeout_', '', $transient);
        delete_transient($key);
    }
}   
add_action( 'wp_scheduled_delete', 'tcr_delete_expired_db_transients' );
