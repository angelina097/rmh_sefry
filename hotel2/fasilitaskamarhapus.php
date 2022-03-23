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

if ((isset($_GET['nmr_kamar'])) && ($_GET['nmr_kamar'] != "")) {
  $deleteSQL = sprintf("DELETE FROM kamar WHERE nmr_kamar=%s",
                       GetSQLValueString($_GET['nmr_kamar'], "int"));

  mysql_select_db($database_hotel2, $hotel2);
  $Result1 = mysql_query($deleteSQL, $hotel2) or die(mysql_error());

  $deleteGoTo = "fasilitaskamar.php?nmr_kamar=" . $row_fasilitaskamarhapus['nmr_kamar'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_fasilitaskamarhapus = "-1";
if (isset($_GET['nmr_kamar'])) {
  $colname_fasilitaskamarhapus = $_GET['nmr_kamar'];
}
mysql_select_db($database_hotel2, $hotel2);
$query_fasilitaskamarhapus = sprintf("SELECT * FROM kamar WHERE nmr_kamar = %s", GetSQLValueString($colname_fasilitaskamarhapus, "int"));
$fasilitaskamarhapus = mysql_query($query_fasilitaskamarhapus, $hotel2) or die(mysql_error());
$row_fasilitaskamarhapus = mysql_fetch_assoc($fasilitaskamarhapus);
$totalRows_fasilitaskamarhapus = mysql_num_rows($fasilitaskamarhapus);
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
 <p>&nbsp;</p>
 <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
</body>
</html>
<?php
mysql_free_result($fasilitaskamarhapus);

mysql_free_result($logintamu);
?>
