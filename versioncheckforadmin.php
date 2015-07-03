/*
 Plugin Name:  Remove version checking
 Description: Remove version check from non-admins
*/
/* Admin version check for WordPress */

defined( 'ABSPATH' ) or die();

/*************************************************************************/
if ( ! class_exists( 'tcr_remove_version_for_nonadmins' ) ) :

    class tcr_remove_version_for_nonadmins {
    
        function __construct() {
            // remove version check from non-admins
            if ( !current_user_can('administrator') ) {
                add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
                add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
            }
        }
        
}      
    
endif;
