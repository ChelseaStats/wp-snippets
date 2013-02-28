/* Add a widget for WordPress */

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
  	'name' => __( 'Sidebar' ),
		'id' => 'sidebar',
		'description' => __( '' ),
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
	));
}
