 <!-- <?php
      session_start();

      include("connection.php");
      //check login
      if (!isset($_SESSION["name"]) && !isset($_SESSION["status"])) {
        Header("Location: login1.php");
      }
      echo "<pre>";
      print_r($_SESSION);
      echo "<hr>";
      print_r($_POST);
      echo "<hr>";
      print_r($_GET);
      echo "</pre>";
      //exit();
      ?> -->
 <?php
 if (isset($_POST['name-order'])) {
  $_SESSION['order-name'] =  $_POST['name-order'];
}
?>
<!--------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<header>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include("include/head.php");  ?>
<?php include("include/top-nav-logined.php");  ?>
</header>
<body style="font-family: Sarabun, sans-serif;border-style: none;">
  <!-- บาร์เมนู-->
  <div id="layoutSidenav">
    <?php include("include/menu.user.php");  ?>
    <div id="layoutSidenav_content">



      <div class="container">
        <div class="col">
          <div class="card shadow mb-3">
            <div class="card-body">
              <form id="frmcart" name="frmcart" method="post" action="saveorder.php">

                <table class="table table-bordered table-sm align-middle" id="">
                  <thead>
                    <tr style="background: #f8f9fc;">
                      <th style="text-align:center;" width="5%">ลำดับ</th>
                      <th style="text-align:center;" width="15%">หมายเลขพัสดุ</th>
                      <th style="text-align:center;">รายการ</th>
                      <th style="text-align:center;" width="10%">ราคา</th>
                      <th style="text-align:center;" width="10%">จำนวน</th>
                      <th style="text-align:center;" width="10%">หน่วยนับ</th>
                      <th style="text-align:center;" width="10%">รวม</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    if (empty($_SESSION['cart'])) {
                      echo "<script>";
                      echo "Swal.fire({
                                        icon: 'error',
                                        title: 'ไม่พบรายการที่เลิอก',
                                        showConfirmButton: false,
                                        timer: 1000
                                        }).then((result) => {
                                        if (result){
                                        window.location.href='user.php';
                                        }
                                        })";
                      echo "</script>";
                      exit();
                    }

                    $total = 0;
                    $no = 0;
                    
                    if (isset($_SESSION['order-name'])) {
                      $order_name2 =$_SESSION['order-name'];
                      echo "<h4 align='center'>ชื่อเรื่อง    " . $order_name2 . "</h4>";
                    }
                    foreach ($_SESSION['cart'] as $product_id => $qty) {
                      $sql = "SELECT*FROM stock WHERE product_id=$product_id";
                      $query  = mysqli_query($connection, $sql);
                      $row  = mysqli_fetch_array($query);
                      $sum  = $row['product_price'] * $qty;
                      $no++;

                      $total  += $sum;
                      echo "<tr>";
                      echo "<td align='center'>" . $no . "</td>";
                      echo "<td align='center'>" . $row["product_id"] . "</td>";
                      echo "<td>" . $row["product_name"] . "</td>";
                      echo "<td align='right'>" . number_format($row['product_price'], 2) . "</td>";
                      echo "<td align='center'>$qty</td>";
                      echo "<td align='center'>" . $row["product_unit"] . "</td>";
                      echo "<td align='right'>" . number_format($sum, 2) . "</td>";
                      echo "</tr>";
                      echo "</tbody>";
                    }
                    echo "<tfoot>";
                    echo "<tr style='background: #f8f9fc;'>";
                    echo "<td colspan='3' align='center'><b>ราคารวม</b></td>";
                    echo "<td colspan='4' align='center'>" . "<b>" . number_format($total, 2) . "</b>" . "   <b>บาท</b></td>";
                    echo "</tr>";
                    ?>
                    </tfoot>
                </table>
                <center>

                  <!-- <input type="submit" name="Submit2" value="สั่งซื้อ" /> -->
                  <input type="hidden" name="order_date" value="<?php echo date("Y-m-d"); ?>">
                  <input type="hidden" name="order_time" value="<?php echo date("H:i:s"); ?>">
                  <input type="hidden" name="total" value="<?php echo $total; ?>">

                  <input type="button" class="btn btn-primary btn-sm" name="back" value="ย้อนกลับ" onclick="window.location='cart.php';" style="width: 80px;" />
                  <input type="submit" class="btn btn-sm btn-success" name="Submit2" id="button" value="ยืนยัน" style="width: 80px;" />

                </center>

              </form>

              <?php include("include/script.php");  ?>
</body>

</html>