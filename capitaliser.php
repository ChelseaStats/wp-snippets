/* Capitalise for WordPress */


function TCR_CL_replace_content($content) { 

$content=preg_replace_callback( '|(?:.)(?:\s*)(\w{1})|Ui',
           create_function('$matches', 'return ". ".strtoupper($matches[1]);'),ucfirst($content)); 
return $content; 
} 

add_filter('the_content','TCR_CL_replace_content');
