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

$colname_konfirmasi = "-1";
if (isset($_POST['search'])) {
  $colname_konfirmasi = $_POST['search'];
}
mysql_select_db($database_hotel2, $hotel2);
$query_konfirmasi = sprintf("SELECT * FROM reservasi WHERE id_reservasi = %s", GetSQLValueString($colname_konfirmasi, "int"));
$konfirmasi = mysql_query($query_konfirmasi, $hotel2) or die(mysql_error());
$row_konfirmasi = mysql_fetch_assoc($konfirmasi);
$totalRows_konfirmasi = mysql_num_rows($konfirmasi);
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
<p>RESERVASI</p>
<p>&nbsp;</p>
<button onclick="print().window">PRINT</button>
<table width="200" border="0" align="center">
  <tr>
    <td bgcolor="#FFFFFF">ID Reservasi</td>
    <td bgcolor="#FFFFFF"><?php echo $row_konfirmasi['id_reservasi']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">Nomor Kamar</td>
    <td bgcolor="#FFFFFF"><?php echo $row_konfirmasi['nmr_kamar']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">ID Tamu</td>
    <td bgcolor="#FFFFFF"><?php echo $row_konfirmasi['id_tamu']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">Tipe Kamar</td>
    <td bgcolor="#FFFFFF"><?php echo $row_konfirmasi['tipe_kamar']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">Nama Tamu</td>
    <td bgcolor="#FFFFFF"><?php echo $row_konfirmasi['nama_tamu']; ?></td>
  </tr>
</table>
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
mysql_free_result($konfirmasi);
?>
