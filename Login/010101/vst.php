<?php
session_start();
include 'config.php';
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


if($_SESSION["ipx"] != $ipcik)  { 
   header("location:cikis.php"); 
 }


$gtc = $_SESSION["username"];
$sorgu = $connect->prepare("SELECT * FROM icq WHERE mail = ?");
$sorgu->bindParam(1, $gtc, PDO::PARAM_INT);
$sorgu->execute();
$cikti = $sorgu->fetch(PDO::FETCH_ASSOC);



?>
<html class="bootstrap-layout">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Wbot 1.3 W_W</title>
  <meta name="robots" content="noindex">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
  <link type="text/css" href="assets/css/style.min.css" rel="stylesheet">
  <link rel="stylesheet" href="examples/css/morris.min.css">
  <link rel="stylesheet" href="assets/vendor/jquery-jvectormap.css">
  <link rel="stylesheet" href="examples/css/jvectormap.min.css">
</head>

<body class="layout-content top-navbar">
  
  <nav class="navbar navbar-dark navbar-full navbar-fixed-top" style="background-color: black;">
    <div class="container">
      <button class="navbar-toggler hidden-md-up pull-xs-right" type="button" data-toggle="collapse" data-target="#navbarMenu">
      <span class="material-icons">menu</span></button>

      <a class="navbar-brand" href="http://t.me/wildwhisky">
       <img style="max-height: 45px;" src="assets/images/logo.png">
      </a>

      <div class="collapse navbar-toggleable-xs" id="navbarMenu">
        <ul class="nav navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="log.php">Log</a>
          </li>
         
        </ul>
      </div>

    </div>
  </nav>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    gonder();
    var int=self.setInterval("gonder()",6000);
});
 
function gonder(){
    $.ajax({
        type:'POST',
        url:'assets/visitor.php',
        data:{
          krx: '283127161617283812112811',
        },
        success: function (msg) {
            $("#sonuc").html(msg);
        }
    });
}
</script>

  <!-- Content -->
  
    
      <div id="sonuc"></div>
                  

  <script src="assets/vendor/jquery.min.js"></script>
  <script src="assets/vendor/tether.min.js"></script>
  <script src="assets/vendor/bootstrap.min.js"></script>
  <script src="assets/vendor/adminplus.js"></script>
  <script src="assets/js/main.min.js"></script>
  <script src="assets/js/colors.js"></script>
  <script src="assets/vendor/raphael.min.js"></script>
  <script src="assets/vendor/morris.min.js"></script>
  <script src="assets/vendor/jquery.jvectormap.min.js"></script>
  <script src="assets/data/vector-maps/custom/jquery-jvectormap-world-mill-en.js"></script>
  <script src="examples/js/vector-maps.min.js"></script>
  <script src="examples/js/chart.min.js"></script>

</body>

</html>