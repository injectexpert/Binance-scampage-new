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
$sorgu = $connect->query("SELECT ip FROM icq");
$xsorgu = $sorgu->fetch(PDO::FETCH_ASSOC);
if($_SESSION["ipx"] == $xsorgu["ip"]){
    header("location:log.php"); 
 }
if(isset($_POST["login"]))  
      {  
           if(empty($_POST["ma12dasd"]) || empty($_POST["211212das"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM icq WHERE mail = :mrx AND password = :prx";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'mrx'     =>     $_POST["ma12dasd"],  
                          'prx'     =>     $_POST["211212das"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["ma12dasd"];  
                     $_SESSION["ipx"] = $ipcik ;
                     header("location:log.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      } 


?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Wbot 1.3 W_W</title>
  <meta name="robots" content="noindex">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
  <link type="text/css" href="assets/css/style.min.css" rel="stylesheet">
</head>

<body class="login" style="background-color: black;">

  <div class="row">
    <div class="col-sm-10 col-sm-push-1 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
      <h2 class="text-primary center m-a-2">
          
       <img style="max-height: 90px;" src="assets/images/logo.png">
      </h2>
      <div class="card-group">
        <div class="card bg-transparent">
          <div class="card-block">
           
            <form  method="post">
              <div class="form-group">
                <input name="ma12dasd" type="text" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <input name="211212das" type="password" class="form-control" placeholder="">
                <div class="clearfix"></div>
              </div>
              <div class="center">
                  <p style="color:red;"><?php echo $ipcik; ?></p>
                <button style="color:red;" name="login" type="submit" class="btn  btn-primary-outline btn-circle-large">
                  <i style="color: red;" class="material-icons">lock</i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/vendor/jquery.min.js"></script>
  <script src="assets/vendor/tether.min.js"></script>
  <script src="assets/vendor/bootstrap.min.js"></script>
  <script src="assets/vendor/adminplus.js"></script>
  <script src="assets/js/main.min.js"></script>
</body>
</html>