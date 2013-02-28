/* Register a post type for WordPress */


// code for adding a custom post type
register_post_type('post_type_name', array(
    'label' => __('Label plural'),
    'singular_label' => __('label singular'),
    'public' => true,
    'exclude_from_search' => false,
    'show_ui' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array('title', 'author', 'excerpt', 'editor', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes')
));
