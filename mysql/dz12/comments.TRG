TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`%` TRIGGER add_comment AFTER INSERT ON `comments` \n        FOR EACH ROW\n        UPDATE `posts` SET comments = comments +1 WHERE id = NEW.post_id;' 'CREATE DEFINER=`root`@`%` TRIGGER deleted_comment AFTER DELETE ON `comments` \n        FOR EACH ROW\n        UPDATE `posts` SET comments = comments -1 WHERE id = OLD.post_id'
sql_modes=1436549152 1436549152
definers='root@%' 'root@%'
client_cs_names='utf8mb4' 'utf8mb4'
connection_cl_names='utf8mb4_unicode_ci' 'utf8mb4_unicode_ci'
db_cl_names='latin1_swedish_ci' 'latin1_swedish_ci'
created=157071027866 157071027873
