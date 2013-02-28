/* Title case fixer for WordPress */



// Convert all post titles to the proper case
function lowertitle($title) { 
 $title = strtolower($title); return $title; 
}

function fixtitle($title) { 
$smallwordsarray = array( 'of','a','the','and','an','or','nor','but','is','if','then','else','when', 
                         'at','from','by','on','off','for','in','out','over','to','into','with' );

$words = explode(' ', $title); foreach ($words as $key => $word) { 
           if ($key == 0 or !in_array($word, $smallwordsarray)) $words[$key] = ucwords($word); 
} 
$newtitle = implode(' ', $words); return $newtitle; 
}

add_filter('title_save_pre' , 'lowertitle'); 
add_filter('the_title' , 'lowertitle'); 
add_filter('title_save_pre' , 'fixtitle'); 
add_filter('the_title' , 'fixtitle');
