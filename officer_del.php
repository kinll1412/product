<?php
session_start();
include("connection.php");


if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
  $product_id = $_GET['product_id'];
  //echo $_GET['product_id'];
  $sql = "DELETE FROM stock WHERE product_id='$product_id'";
  if(mysqli_query($connection,$sql)){
    //echo 'อัพเดย์ข้อมูลสำเร็จ';
    $alert ='<script type="text/javascript">';
    //$alert .='alert("ลบข้อมูลสำเร็จ");';
    $alert .='window.location.href = "officer.php";';
    $alert .='</script>';
    echo $alert;
    exit();
  }else{
    echo "Error: " . $sql . "<br>" . $connection->error;
  }
  mysql_close($connection);
}
?>