/* Add a custom login logo for WordPress */

function tcr_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/login_logo.png) !important; }
    </style>';
}
add_action('login_head', 'tcr_login_logo');
