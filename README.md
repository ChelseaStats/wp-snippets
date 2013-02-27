##wp##

wp snippets including but not limited to certain template types such as archive pages to functions.php tweaks

### menu coming soon ###





### Convert all @usernames to links to their twitter profiles ###
  
> function tcr_twitusername($content) {
> $content = preg_replace("/(^|\s)*(@([a-zA-Z0-9-_]{1,15}))(\.*[\n|\r|\t|\s|\<|\&]+?)/i", "$1<a href=\"http://twitter.com/$3\">$2</a>$4", $content);
> return $content;
> }
> add_filter('the_content','tcr_twitusername');
	
### Convert all lower case words appearing after a full stop to a capital ###

> function TCR_CL_replace_content($content)
> {
> $content=preg_replace_callback( '|(?:\.)(?:\s*)(\w{1})|Ui',create_function('$matches', 'return ". ".strtoupper($matches[1]);'),ucfirst($content)); 
> return $content;
> }
> add_filter('the_content','TCR_CL_replace_content');


### Convert all post titles to the proper case ###

> function lowertitle($title)  {
> $title = strtolower($title);
> return $title;
> }
> 
> function fixtitle($title) {
> $smallwordsarray = array( 'of','a','the','and','an','or','nor','but','is','if','then','else','when', 'at','from','by','on','off','for','in','out','over','to','into','with' ); 
> $words = explode(' ', $title); 
> foreach ($words as $key => $word) {
> if ($key == 0 or !in_array($word, $smallwordsarray)) $words[$key] = ucwords($word); 
> } 
> $newtitle = implode(' ', $words); return $newtitle; }
>
> add_filter('title_save_pre'	, 'lowertitle');
> add_filter('the_title'		, 'lowertitle');
> add_filter('title_save_pre'	, 'fixtitle');
> add_filter('the_title'		, 'fixtitle');


### Remove crap from the WordPress header ###

> remove_action('init'	,'wp_admin_bar_init');
> remove_action('wp_head'	,'feed_links',2);
> remove_action('wp_head'	,'feed_links_extra',3);
> remove_action('wp_head'	,'rsd_link');
> remove_action('wp_head'	,'wlwmanifest_link');
> remove_action('wp_head'	,'index_rel_link');
> remove_action('wp_head'	,'parent_post_rel_link',10,0);
> remove_action('wp_head'	,'start_post_rel_link',10,0);
> remove_action('wp_head'	,'adjacent_posts_rel_link_wp_head',10,0);
> remove_action('wp_head'	,'wp_generator');
> remove_action('init'	,'wp_admin_bar_init');

### Remove crap from the WordPress profile pages ###
> function extra_contact_info($contactmethods) {
> unset($contactmethods['aim']);
> unset($contactmethods['yim']);
> unset($contactmethods['jabber']);
> $contactmethods['twitter'] = 'Twitter';
> return $contactmethods;
> }
> add_filter('user_contactmethods', 'extra_contact_info');

### Make #hashtags a link to a twitter search of said tag ###
> function tcr_twithash($content) {
> $content = preg_replace('/([^a-zA-Z0-9-_&])#([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/search?q=%23$2\" target=\"_blank\">#$2</a>",$content);
> return $content;
> }
> add_filter('the_content','tcr_twithash');


### Add an author dropdown to the all posts admin page ###
> function author_filter() {
> $args = array('name' => 'author', 'show_option_all' => 'View all authors');
> if (isset($_GET['user'])) {
> $args['selected'] = $_GET['user'];
> }
> wp_dropdown_users($args);
> }
> add_action('restrict_manage_posts', 'author_filter');		

### Add an all options admin page to wordpress ###
> function all_settings_link() {
> add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
> }
> add_action('admin_menu', 'all_settings_link');

### set the from name and fro email address ###
> add_filter('wp_mail_from'		,'');
> add_filter('wp_mail_from_name'	,'']));






