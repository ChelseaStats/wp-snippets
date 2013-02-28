// Google Charts API
/* [chart type="pie" title="Example Pie Chart" data="41.12,32.35,21.52,5.01" labels="First+Label|Second+Label|Third+Label|Fourth+Label" background_color="FFFFFF" colors="D73030,329E4A,415FB4,DFD32F" size="450x180"]
 *  
 *	[chart data="10" bg="F7F9FA" labels="unlikely" colors="00ff40,009d27,ffc22f,d89b07,ffa346,d89b07,ff6666,ff0f0f" 
 *	size="450x200" title="Torres to score vs Liverpool" type="gom"]
*/
function chart_function( $atts ) {
   extract(shortcode_atts(array(
       'data' => '',
       'chart_type' => 'pie',
       'title' => 'Chart',
       'labels' => '',
       'size' => '450x250',
       'background_color' => 'FFFFFF',
       'colors' => '',
   ), $atts));

	switch ($type) {
		case 'line' :
			$charttype = 'lc'; break;
		case 'xyline' :
			$charttype = 'lxy'; break;
		case 'sparkline' :
			$charttype = 'ls'; break;
		case 'meter' :
			$charttype = 'gom'; break;
		case 'scatter' :
			$charttype = 's'; break;
		case 'venn' :
			$charttype = 'v'; break;
		case 'pie' :
			$charttype = 'p3'; break;
		case 'pie2d' :
			$charttype = 'p'; break;
		default :
			$charttype = $type;
		break;
   }

   $attributes = '';
   $attributes .= '&chd=t:'.$data.'';
   $attributes .= '&chtt='.$title.'';
   $attributes .= '&chl='.$labels.'';
   $attributes .= '&chs='.$size.'';
   $attributes .= '&chf='.$background_color.'';
   $attributes .= '&chco='.$colors.'';

   return '<img title="'.$title.'" src="http://chart.apis.google.com/chart?cht='.$chart_type.''.$attributes.'" alt="'.$title.'" />';
}
add_shortcode('chart', 'chart_function');
