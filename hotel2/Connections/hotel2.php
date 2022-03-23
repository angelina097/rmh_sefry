<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_hotel2 = "localhost";
$database_hotel2 = "hotel2";
$username_hotel2 = "root";
$password_hotel2 = "";
$hotel2 = mysql_pconnect($hostname_hotel2, $username_hotel2, $password_hotel2) or trigger_error(mysql_error(),E_USER_ERROR); 
?>