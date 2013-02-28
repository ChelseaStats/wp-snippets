// [qrcode url=?http://domain.tld/?]
function google_qr_code($atts) {
  extract(shortcode_atts(array(
    'url' => 'http://domain.tld/',
    'widthHeight' => '75',
    'error' => 'L',
    'margin' => '0',
    'alt' => 'QR Code'
  ), $atts));

  $url = urlencode($url); 
  return '<img src="http://chart.apis.google.com/chart?chs='.$widthHeight.'x'.$widthHeight.'&cht=qr&chld='.$error.'|'.$margin.'&chl='.$url.'" alt="'.$alt.'" widthHeight="'.$widthHeight.'" widthHeight="'.$widthHeight.'" class="img-polaroid"/>';
}
add_shortcode('qr', 'google_qr_code');
