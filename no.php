<?php
include("connection.php");

  $order_id = $_GET['order_id'];
  //$order_id = 1 ;

 $sql1 = "UPDATE `product_order` SET  `order_status`=2 WHERE  order_id=$order_id ";
     $query1 = mysqli_query($connection, $sql1) or die ("Error in query: $sql1 " . mysqli_error($sql1));

    //echo 'อัพเดตข้อมูลสำเร็จ';
    $alert ='<script type="text/javascript">';
    //$alert .='alert("ลบข้อมูลสำเร็จ");';
    $alert .='window.location.href = "okstatus.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    ?>