<?php
session_start();
include("connection.php");


if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
  $user_id = $_GET['user_id'];
  //echo $_GET['product_id'];
  $sql = "DELETE FROM user WHERE user_id='$user_id'";
  if(mysqli_query($connection,$sql)){
    //echo 'อัพเดย์ข้อมูลสำเร็จ';
    $alert ='<script type="text/javascript">';
    //$alert .='alert("ลบข้อมูลสำเร็จ");';
    $alert .='window.location.href = "viwe_user.php";';
    $alert .='</script>';
    echo $alert;
    exit();
  }else{
    echo "Error: " . $sql . "<br>" . $connection->error;
  }
  mysql_close($connection);
}
?>