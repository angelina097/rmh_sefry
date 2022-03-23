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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE kamar SET tipe_kamar=%s, harga=%s, lantai=%s WHERE nmr_kamar=%s",
                       GetSQLValueString($_POST['tipe_kamar'], "text"),
                       GetSQLValueString($_POST['harga'], "text"),
                       GetSQLValueString($_POST['lantai'], "text"),
                       GetSQLValueString($_POST['nmr_kamar'], "int"));

  mysql_select_db($database_hotel2, $hotel2);
  $Result1 = mysql_query($updateSQL, $hotel2) or die(mysql_error());

  $updateGoTo = "fasilitaskamar.php?nmr_kamar=" . $row_fasilitaskamaredit['nmr_kamar'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_fasilitaskamaredit = "-1";
if (isset($_GET['nmr_kamar'])) {
  $colname_fasilitaskamaredit = $_GET['nmr_kamar'];
}
mysql_select_db($database_hotel2, $hotel2);
$query_fasilitaskamaredit = sprintf("SELECT * FROM kamar WHERE nmr_kamar = %s", GetSQLValueString($colname_fasilitaskamaredit, "int"));
$fasilitaskamaredit = mysql_query($query_fasilitaskamaredit, $hotel2) or die(mysql_error());
$row_fasilitaskamaredit = mysql_fetch_assoc($fasilitaskamaredit);
$totalRows_fasilitaskamaredit = mysql_num_rows($fasilitaskamaredit);
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
 <p>TAMBAH FASILITAS KAMAR </p>
 <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
   <table align="center">
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">Nmr_kamar:</td>
       <td><?php echo $row_fasilitaskamaredit['nmr_kamar']; ?></td>
     </tr>
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">Tipe_kamar:</td>
       <td><input type="text" name="tipe_kamar" value="<?php echo htmlentities($row_fasilitaskamaredit['tipe_kamar'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
     </tr>
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">Harga:</td>
       <td><input type="text" name="harga" value="<?php echo htmlentities($row_fasilitaskamaredit['harga'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
     </tr>
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">Lantai:</td>
       <td><input type="text" name="lantai" value="<?php echo htmlentities($row_fasilitaskamaredit['lantai'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
     </tr>
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">&nbsp;</td>
       <td><input type="submit" value="Update record" /></td>
     </tr>
   </table>
   <input type="hidden" name="MM_update" value="form1" />
   <input type="hidden" name="nmr_kamar" value="<?php echo $row_fasilitaskamaredit['nmr_kamar']; ?>" />
 </form>
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
mysql_free_result($fasilitaskamaredit);

mysql_free_result($logintamu);
?>
