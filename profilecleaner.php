/* Profile page cleaner for WordPress */


// Remove crap from the WordPress profile pages
function extra_contact_info($contactmethods) { 
 unset($contactmethods['aim']); 
 unset($contactmethods['yim']); 
 unset($contactmethods['jabber']); 
 $contactmethods['twitter'] = 'Twitter'; 

return $contactmethods; 
} 

add_filter('user_contactmethods', 'extra_contact_info');
