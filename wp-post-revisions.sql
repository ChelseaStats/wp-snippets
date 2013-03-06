/* delete WordPress post revisions and meta */

DELETE a,b,c
FROM wp_{id}_posts a
LEFT JOIN wp_{id}_term_relationships b ON (a.ID = b.object_id)
LEFT JOIN wp_{id}_postmeta c ON (a.ID = c.post_id)
WHERE a.post_type = 'revision'

/* add this to your config.php to stop collecting them: define('WP_POST_REVISIONS', 0); */
