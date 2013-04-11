/* delete WordPress post revisions and meta */

DELETE a,b,c
FROM wp_{id}_posts a
LEFT JOIN wp_{id}_term_relationships b ON (a.ID = b.object_id)
LEFT JOIN wp_{id}_postmeta c ON (a.ID = c.post_id)
WHERE a.post_type = 'revision'

/* add this to your config.php to stop collecting them: define('WP_POST_REVISIONS', 0); */


DELETE pm FROM wp_postmeta pm LEFT JOIN wp_posts wp ON wp.ID = pm.post_id WHERE wp.ID IS NULL;
  
DELETE FROM wp_postmeta WHERE NOT EXISTS ( SELECT * FROM wp_posts WHERE wp_postmeta.post_id = wp_posts.ID );	
	
DELETE FROM wp_commentmeta WHERE comment_id NOT IN (SELECT comment_id FROM wp_comments);
	
DELETE FROM wp_term_relationships WHERE term_taxonomy_id=1 AND object_id NOT IN (SELECT id FROM wp_posts);
	
DELETE FROM wp_options WHERE option_name LIKE '_site_transient_browser_%' 
OR option_name LIKE '_site_transient_timeout_browser_%' OR option_name LIKE '_transient_feed_%' 
OR option_name LIKE '_transient_timeout_feed_%';
