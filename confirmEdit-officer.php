 <!-- <?php
      session_start();

      include("connection.php");
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
  if (isset($_POST['order-owner'])) {
    $_SESSION['order-owner'] =  $_POST['order-owner'];
  }
  ?>
 <!--------------------------------------------------------------------------------------------->
 <!DOCTYPE html>
 <html lang="th" style="font-family: Sarabun, sans-serif;">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <!-- <script src="assets/js/jquery-latest.min.js"></script> -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <?php include("include/head.php");  ?>


 <body style="font-family: Sarabun, sans-serif;border-style: none;">
   <header>
     <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top sb-topnav" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">
       <img src="upload/rtaf.png" style="width: 80px;">

       <div class="container-fluid">
         <a class="navbar-brand d-xxl-flex justify-content-xxl-center align-items-xxl-center" href="officer.php" style="color: rgba(255,255,255,0.9);font-family: Sarabun, sans-serif;font-weight: bold;text-align: left;margin-left: 15px;padding: 0px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</a>

         <!--เมนู-->

         <ul class="navbar-nav flex-nowrap ms-auto">
           <li class="nav-item d-xxl-flex justify-content-xxl-center align-items-xxl-center dropdown no-arrow">
             <div class="nav-item dropdown no-arrow">
               <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="officer.php">
                 <!-- กลุ่มอักษร start -->
                 <div class="sidebar-brand-text mx-1" style="text-align: right;">
                   <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["name"]; ?></span>
                   <ul class="navbar-nav" style="margin-bottom: -5px;"></ul>
                   <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["status"]; ?></span>
                 </div>
                 <!-- กลุ่มอักษร end -->
               </a>

               <!--        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                            <a class="dropdown-item" href="viwe_user.php"><i class="fas fa-user-friends fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;รายชื่อผู้ใช้งานระบบ</a>
                            <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;ออกจากระบบ</a>
                        </div> -->
             </div>
           </li>
         </ul>
       </div>
     </nav>
   </header>

   <!-- บาร์เมนู-->
   <div id="layoutSidenav">
     <div id="layoutSidenav_content">
       <div class="container">
         <div class="row">
           <center>
             <h3 class="text-success" style="margin-top: 10px;">ยืนยันการแก้ไขรายการ</h3>
           </center>
         </div>
         <div class="col">
           <div class="card shadow mb-3">

             <div class="card-body">
               <form id="frmcart" name="frmcart" method="post" action="updateOrder-officer.php">

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
                                        window.location.href='officer.php';
                                        }
                                        })";
                        echo "</script>";
                        exit();
                      }

                      $total = 0;
                      $no = 0;

                      if (isset($_SESSION['order-name']) && isset($_SESSION['order-owner'])) {
                        $order_name2 = $_SESSION['order-name'];
                        $order_owner = $_SESSION['order-owner'];
                        echo "<h4 align='center'><span style=font-weight:bold>ชื่อเรื่อง</span>    " . $order_name2 . "&emsp;&emsp;หน่วย " . $order_owner . "</h4>";
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



                   <input type="button" class="btn btn-primary btn-sm" name="back" value="ย้อนกลับ" onclick="window.location='editCart-officer.php';" style="width: 80px;" />

                   <input type="submit" class="btn btn-sm btn-success" name="Submit2" id="button" value="ยืนยัน" style="width: 80px;" />
                 </center>
                 <center>
                   <a href=okstatus_officer.php class="btn btn-danger" style="margin-top: 20px;"> ยกเลิกการแก้ไข </a>
                 </center>


               </form>

               <?php include("include/script.php");  ?>
 </body>

 </html>