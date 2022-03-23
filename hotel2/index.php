<?php require_once('Connections/hotel2.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_hotel2, $hotel2);
$query_logintamu = "SELECT * FROM tamu";
$logintamu = mysql_query($query_logintamu, $hotel2) or die(mysql_error());
$row_logintamu = mysql_fetch_assoc($logintamu);
$totalRows_logintamu = mysql_num_rows($logintamu);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	background-image: url(img/877723.jpg);
	background-attachment:fixed;
	background-position:center;
	background-size:cover;
	background-repeat;
	
}
</style>
</head>

<body>
<div align="center">
  <p>SELAMAT DATANG DI WEBSITE HOTEL HALO</p>
  <p>&nbsp;</p>
  <form id="form1" name="form1" method="post" action="">
    <table width="254" border="0">
      <tr>
        <td colspan="3">LOGIN</td>
      </tr>
      <tr>
        <td width="5" rowspan="3">&nbsp;</td>
        <td width="165">USERNAME</td>
        <td width="70"><label for="username"></label>
        <input type="text" name="username" id="username" /></td>
      </tr>
      <tr>
        <td>PASSWORD</td>
        <td><label for="password"></label>
        <input type="text" name="password" id="password" /></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="button" id="button" value="Submit" /></td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($logintamu);
?>
