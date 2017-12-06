<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
ini_set('session.cookie_lifetime', 3600);
require 'partials/functions/start_session.php';
start_session();

require 'partials/functions/log_in.php';
require 'partials/log_in.php';
require 'partials/functions/register.php';
require 'partials/functions/date_replace.php';
require 'partials/functions/string_length.php';
require 'partials/database.php';
require 'partials/functions/fetch_all_from_table.php';
require 'partials/functions/fetch_all_where_condition.php';
require 'partials/functions/fetch_count_column_as.php';
require 'partials/functions/fetch_all_articles_by_user.php';
require 'partials/functions/fetch_all_comments_by_user.php';
require 'partials/functions/fetch_all_limit_5.php';

require 'actions/main_sql.php';
require 'partials/log_out.php';

?>