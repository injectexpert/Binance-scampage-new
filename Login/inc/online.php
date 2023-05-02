<?php 
include 'config.php';
$ipcik = $_GET["ip"];
$zaman = time();
$drc = "1";
$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ $sorgu = $connect->prepare("UPDATE gtm SET ww = ?, ping = ? WHERE ip = ?");
$sorgu->bindParam(1, $drc, PDO::PARAM_STR);
$sorgu->bindParam(2, $zaman, PDO::PARAM_STR);
$sorgu->bindParam(3, $ipcik, PDO::PARAM_STR);
$sorgu->execute();
 echo  0; } else { echo 1;}
?>