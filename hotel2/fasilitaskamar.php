<?php require_once('Connections/hotel2.php'); ?>
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

$maxRows_fasilitaskamar = 10;
$pageNum_fasilitaskamar = 0;
if (isset($_GET['pageNum_fasilitaskamar'])) {
  $pageNum_fasilitaskamar = $_GET['pageNum_fasilitaskamar'];
}
$startRow_fasilitaskamar = $pageNum_fasilitaskamar * $maxRows_fasilitaskamar;

mysql_select_db($database_hotel2, $hotel2);
$query_fasilitaskamar = "SELECT * FROM kamar";
$query_limit_fasilitaskamar = sprintf("%s LIMIT %d, %d", $query_fasilitaskamar, $startRow_fasilitaskamar, $maxRows_fasilitaskamar);
$fasilitaskamar = mysql_query($query_limit_fasilitaskamar, $hotel2) or die(mysql_error());
$row_fasilitaskamar = mysql_fetch_assoc($fasilitaskamar);

if (isset($_GET['totalRows_fasilitaskamar'])) {
  $totalRows_fasilitaskamar = $_GET['totalRows_fasilitaskamar'];
} else {
  $all_fasilitaskamar = mysql_query($query_fasilitaskamar);
  $totalRows_fasilitaskamar = mysql_num_rows($all_fasilitaskamar);
}
$totalPages_fasilitaskamar = ceil($totalRows_fasilitaskamar/$maxRows_fasilitaskamar)-1;
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
 <p>FASILITAS KAMAR </p>
 <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<table border="1">
  <tr>
    <td>nmr_kamar</td>
    <td>tipe_kamar</td>
    <td>harga</td>
    <td>lantai</td>
    <td colspan="3">TOOLS</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_fasilitaskamar['nmr_kamar']; ?></td>
      <td><?php echo $row_fasilitaskamar['tipe_kamar']; ?></td>
      <td><?php echo $row_fasilitaskamar['harga']; ?></td>
      <td><?php echo $row_fasilitaskamar['lantai']; ?></td>
      <td><a href="fasilitaskamartambah.php">ADD</a></td>
      <td><a href="fasilitaskamaredit.php?nmr_kamar=<?php echo $row_fasilitaskamar['nmr_kamar']; ?>">EDIT</a></td>
      <td><a href="fasilitaskamarhapus.php?nmr_kamar=<?php echo $row_fasilitaskamar['nmr_kamar']; ?>">DELETE</a></td>
    </tr>
    <?php } while ($row_fasilitaskamar = mysql_fetch_assoc($fasilitaskamar)); ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
</body>
</html>
<?php
mysql_free_result($fasilitaskamar);
?>
