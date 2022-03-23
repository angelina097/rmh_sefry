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
$query_reservasi = "SELECT * FROM reservasi";
$reservasi = mysql_query($query_reservasi, $hotel2) or die(mysql_error());
$row_reservasi = mysql_fetch_assoc($reservasi);
$totalRows_reservasi = mysql_num_rows($reservasi);
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
<table border="1">
  <tr>
    <td>id_reservasi</td>
    <td>nmr_kamar</td>
    <td>id_tamu</td>
    <td>tipe_kamar</td>
    <td>nama_tamu</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_reservasi['id_reservasi']; ?></td>
      <td><?php echo $row_reservasi['nmr_kamar']; ?></td>
      <td><?php echo $row_reservasi['id_tamu']; ?></td>
      <td><?php echo $row_reservasi['tipe_kamar']; ?></td>
      <td><?php echo $row_reservasi['nama_tamu']; ?></td>
    </tr>
    <?php } while ($row_reservasi = mysql_fetch_assoc($reservasi)); ?>
</table>
<p>FASILITAS KAMAR </p>
<form id="form1" name="form1" method="post" action="reservasicari.php">
  <label for="search"></label>
  <input type="text" name="search" id="search" />
  <input type="submit" name="button" id="button" value="Submit" />
</form>
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
mysql_free_result($reservasi);
?>
