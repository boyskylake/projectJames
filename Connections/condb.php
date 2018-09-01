<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
// $hostname_condb = "localhost";
// $database_condb = "library_11";
// $username_condb = "root";
// $password_condb = "";

$hostname_condb = "127.0.0.1:51335";
$username_condb = "azure";
$password_condb = "6#vWHD_$";
$database_condb = "library_11";

$condb = mysql_pconnect($hostname_condb, $username_condb, $password_condb) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES UTF8")
?>