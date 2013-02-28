/* Twitter search for WordPress */

// Make #hashtags a link to a twitter search of said tag
function tcr_twithash($content) { 

$content = preg_replace('/([^a-zA-Z0-9-_&])#([0-9a-zA-Z_]+)/',"$1#$2",$content);
return $content; 
} 

add_filter('the_content','tcr_twithash');
