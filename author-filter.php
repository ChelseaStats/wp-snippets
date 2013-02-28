/* Author filter for WordPress */

// Add an author dropdown to the all posts admin page

function author_filter() { 

$args = array('name' => 'author', 'show_option_all' => 'View all authors'); 

     if (isset($_GET['user'])) { 
               $args['selected'] = $_GET['user']; 
    } 

wp_dropdown_users($args); 
} 

add_action('restrict_manage_posts', 'author_filter');
