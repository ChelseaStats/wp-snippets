/* Refresh the tiny MCE version for WordPress */

function my_refresh_mce($ver) {
  $ver += 93; // random number
  return $ver;
}

add_filter( 'tiny_mce_version', 'my_refresh_mce');
