<?php 

include 'inc/config.php';

$ipcik=$_GET["ip"];



$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '1'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  1; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '2'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  2; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '3'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  3; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '4'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  4; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '5'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  5; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '6'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  6; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '7'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  7; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '8'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  8; }


$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '9'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  9; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '10'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  10; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '11'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  11; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '12'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  12; }


$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '13'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  13; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '14'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  14; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '15'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  15; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '16'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  16; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '17'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  17; }

$query = $connect->query("SELECT * FROM gtm WHERE ip = '$ipcik' AND durum = '18'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ echo  18; }


?>