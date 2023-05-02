<?php
$dsn = 'mysql:host=localhost;dbname=injectexp_binancex';

$user = 'injectexp_binancex';

$password = 'db?YpfDls-,*';
 
try {

    $connect = new PDO($dsn, $user, $password);

} catch (PDOException $e) {

    echo 'Connection failed: ' . $e->getMessage();
}
$v1 = "1";
$sorgu = $connect->prepare("SELECT * FROM icq WHERE id = ?");
$sorgu->bindParam(1, $v1, PDO::PARAM_INT);
$sorgu->execute();
$cikti = $sorgu->fetch(PDO::FETCH_ASSOC);
$site = $cikti["ip"];
date_default_timezone_get("Europe/İstanbul");


?>