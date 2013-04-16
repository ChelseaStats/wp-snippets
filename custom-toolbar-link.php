<?php

// add a link to the WP Toolbar
function custom_toolbar_link($wp_admin_bar) {
  $args = array(
		'id' => 'gmail',
		'title' => 'Gmail', 
		'href' => '##sumurl##', 
		'meta' => array(
			'class' => 'gmail', 
			'title' => 'sales@digwp.com'
			)
	);
	$wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'custom_toolbar_link', 999);

?>
