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

	$sql1	= "INSERT INTO product_order VALUES(null,'$order_name','$order_owner','$order_date','$order_time','$order_total','$order_status','$session_id','$session_name','$admin_id','$admin_name','$conferm_date','$conferm_time')";
	$query1	= mysqli_query($connection, $sql1) or die ("Error in query: $sql1 " . $connection($sql1));
	echo $sql1;
	echo "<br>";

  //exit();



	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "SELECT MAX(order_id) as order_id FROM product_order";

	$query2	= mysqli_query($connection, $sql2) or die ("Error in query: $sql2 " . $connection($sql2));
	$row = mysqli_fetch_array($query2);
	$order_id = $row["order_id"];

	// echo $sql2;
	// echo "<br>";
	// echo $order_id;
	// echo "<br>";
	 //exit();


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

//ตัดสต๊อก
		// 	for($i=0; $i<$count; $i++){  
		//   	$have =  $row3['Pharmacy_item']; 
		//   	$stc = $have - $qty;  
		//  	$sql5 = "UPDATE Pharmacy SET  Pharmacy_item=$stc WHERE  product_id=$product_id ";
		//   	$query5 = mysqli_query($connection, $sql5) or die ("Error in query: $sql5 " . mysqli_error($sql5));
		// }
//stock 
	}
	// echo $sql3;
	// echo "<br>";
	// echo $sql4;
	// echo "<br>";
//exit();

	if($query1 && $query4){
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
	window.location ='officer_order_status.php';
</script>

