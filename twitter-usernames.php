/* Twitter Usernames for WordPress */


function tcr_twitusername($content) { 

$content = preg_replace("/(^|\s)*(@([a-zA-Z0-9-_]{1,15}))(.*[\n|\r|\t|\s|<|&]+?)/i", "$1$2$4", $content); 
return $content; 
} 

add_filter('the_content','tcr_twitusername');
