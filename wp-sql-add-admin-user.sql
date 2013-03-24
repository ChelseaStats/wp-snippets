/* to add an a dummy admin user with SQL, ideal on a localhost from a live site database import. */
/* change details to suit, where X is the id number (choose next number depending on count of your current users */

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) 
VALUES ('X', 'root, MD5('root'), author name, email@domain.tld, domain.tld', '2012-01-20 00:00:00', '', '0', My name)
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (NULL, 'X', 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}')
INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (NULL, 'X', 'wp_user_level', '10')
