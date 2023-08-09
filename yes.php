
<?php session_start();
include("connection.php");
$d=date("Y-m-d");
$t=date("H:i:s");
  $order_id = $_GET['order_id'];
  $admin_id=  $_SESSION["id"];
  $admin_name=  $_SESSION["name"];
  //$order_id = 1 ;

 $sql1 = "UPDATE `product_order` SET  `order_status`=1 ,admin_id='$admin_id',admin_name='$admin_name',conferm_date='$d',conferm_time='$t' WHERE  order_id=$order_id ";
     $query1 = mysqli_query($connection, $sql1) or die ("Error in query: $sql1 " . mysqli_error($sql1));

    //echo 'อัพเดตข้อมูลสำเร็จ';
    $alert ='<script type="text/javascript">';
    //$alert .='alert("ลบข้อมูลสำเร็จ");';
    $alert .='window.location.href = "okstatus.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    ?>