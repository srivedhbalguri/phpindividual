<?php 

define('DB_USER', 'srivedh');
define('DB_PASSWORD', 'srivedh');
define('DB_HOST', 'localhost');
define('DB_NAME', 'bookstore');

$connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

mysqli_set_charset($connection, 'utf8');

?>