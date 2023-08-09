<?php
date_default_timezone_set("Asia/Bangkok");
// echo date_default_timezone_get();
// echo "<br>";
// echo "The time is " . date("Y-m-d H:i:s");
// echo "<br>";

  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = '1234';
  $db_db = 'stock';


$connection = mysqli_connect($db_host,$db_user,$db_password,$db_db);

mysqli_set_charset($connection,'utf8');

if(mysqli_connect_errno()){
  echo 'Failed to Connect to MySQL : '.mysqli_connect_error();
exit();
}else{
//echo 'success';
}
?>