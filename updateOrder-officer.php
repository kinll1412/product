<?php
	session_start();
    include("connection.php");  
   echo "<pre>";
  print_r($_SESSION);
  echo "<hr>";
  print_r($_POST);
  echo "</pre>";
  //exit();
?>

<!--------------------------------------------------------------------------------------------->
<?php
    $order_id = $_SESSION['order_id'];
	$order_date  = $_POST["order_date"];
	$order_time  = $_POST["order_time"];
	$order_total = $_POST["total"];
	$order_status = '0';
	$session_id = $_SESSION['id'];
	$session_name = $_SESSION['name'];
	$order_name = $_SESSION['order-name'];
	$order_owner = $_SESSION['order-owner'];

	$admin_id ='';
	$admin_name ='';
	$conferm_date ='';
	$conferm_time ='';
	//บันทึกการสั่งซื้อลงใน order_detail


mysqli_query($connection, "BEGIN");

  //exit();	

	$sql1	= "UPDATE product_order SET order_date='$order_date', order_time='$order_time',order_total=$order_total WHERE order_id= $order_id";
	$update	= mysqli_query($connection, $sql1) or die ("Error in query: $sql1 " . $connection($sql1));
//	echo $sql1;
//	echo "<br>";

//exit();


// ลบข้อมูล detail_order เดิมทิ้งทั้งหมด
$sql2	= "DELETE FROM order_detail WHERE order_id = $order_id";
$delete	= mysqli_query($connection, $sql2) or die ("Error in query: $sql2 " . $connection($sql2));

//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach($_SESSION['cart'] as $product_id=>$qty)
	{
		$sql3	= "SELECT * FROM stock WHERE product_id=$product_id";
		$query3	= mysqli_query($connection, $sql3)or die ("Error in query: $sql3 " . $connection($sql3));
		$row3	= mysqli_fetch_array($query3);
		$total	= $row3['product_price']*$qty;
		$count  = mysqli_num_rows($query3);

		$sql4	= "INSERT INTO order_detail VALUES(null,'$qty','$total','$order_id','$product_id')";
		$query4	= mysqli_query($connection, $sql4) or die ("Error in query: $sql4 " . $connection($sql4));


	}


	if($update && $query4){
		mysqli_query($connection, "COMMIT");
		// $alert = "alert=success";
		foreach($_SESSION['cart'] as $product_id)
		{	
			//unset($_SESSION['cart'][$product_id]);
			// unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($connection, "ROLLBACK");  
		// $alert = "alert=error";
	}
?>
<script type="text/javascript">
	window.location ='okstatus_officer.php';
</script>

