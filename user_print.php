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
?>
 -->
<!--------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>


<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <header>
        <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top sb-topnav" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">
            <img src="upload/rtaf.png"style="width: 80px;" >

            <div class="container-fluid">
                <a class="navbar-brand d-xxl-flex justify-content-xxl-center align-items-xxl-center" href="user.php" style="color: rgba(255,255,255,0.9);font-family: Sarabun, sans-serif;font-weight: bold;text-align: left;margin-left: 15px;padding: 0px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</a>
                
                <!--เมนู-->

                <ul class="navbar-nav flex-nowrap ms-auto">
                    <li class="nav-item d-xxl-flex justify-content-xxl-center align-items-xxl-center dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="user.php">
                            <!-- กลุ่มอักษร start -->
                            <div class="sidebar-brand-text mx-1" style="text-align: right;">
                             <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["name"];?></span>
                            <ul class="navbar-nav" style="margin-bottom: -5px;"></ul>
                            <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["status"];?></span>
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

                             if(empty($_SESSION['cart'])){
                                        echo "<script>";
                                        echo "Swal.fire({
                                        icon: 'error',
                                        title: 'ไม่พบรายการสังซื้อ',
                                        showConfirmButton: false,
                                        timer: 1000
                                        }).then((result) => {
                                        if (result){
                                        window.location.href='product_pos.php';
                                        }
                                        })";
                                        echo "</script>";
                                        exit();
                              }

                      $total=0;
                      foreach($_SESSION['cart'] as $product_id=>$qty)
                      {
                      $sql = "SELECT*FROM stock WHERE product_id=$product_id";
                      $query  = mysqli_query($connection, $sql);
                      $row  = mysqli_fetch_array($query);
                      $sum  = $row['product_price']*$qty;
                      $no = 0;
                 
                      $total  += $sum;
                      echo "<tr>";
                        echo "<td align='center'>" . $no. "</td>";
                        echo "<td align='center'>" . $row["product_id"] . "</td>";
                        echo "<td>" . $row["product_name"] . "</td>";
                        echo "<td align='right'>" .number_format($row['product_price'],2) ."</td>";
                        echo "<td align='center'>$qty</td>";
                        echo "<td align='center'>" . $row["product_unit"] . "</td>";
                        echo "<td align='right'>".number_format($sum,2)."</td>";
                      echo "</tr>";
                      echo "</tbody>";
                      }
                      echo "<tfoot>";
                      echo "<tr style='background: #f8f9fc;'>";
                        echo "<td colspan='3' align='center'><b>ราคารวม</b></td>";
                        echo "<td colspan='4' align='center'>"."<b>".number_format($total,2)."</b>"."   <b>บาท</b></td>";
                      echo "</tr>";
                      ?>
                      </tfoot>
                    </table>
                    <center>
                    
                    <!-- <input type="submit" name="Submit2" value="สั่งซื้อ" /> -->
                    <input type="hidden" name="order_date" value="<?php echo date("Y-m-d"); ?>">
                    <input type="hidden" name="order_time" value="<?php echo date("H:i:s"); ?>">
                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                    
                    <input type="submit" class="btn btn-sm btn-success" name="Submit2" id="button" value="ยืนยัน" style="width: 80px;"/>
                    <input type="button" class="btn btn-primary btn-sm" name="back" value="ย้อนกลับ" onclick="window.location='cart.php';" style="width: 80px;"/>
                    </center>
                    
                  </form>

<?php include("include/script.php");  ?>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable({
        
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "ทั้งหมด"]],
                                language : {
                                "decimal":        "",
                                "emptyTable":     "ไม่มีข้อมูล",
                                "info":           "แสดง _START_ - _END_ จาก _TOTAL_ รายการ",
                                "infoEmpty":      "แสดง 0 - 0 จาก 0 รายการ",
                                "infoFiltered":   "(ค้นหาจากทั้งหมด _MAX_ รายการ)",
                                "infoPostFix":    "",
                                "thousands":      ",",
                                "lengthMenu":     "แสดง _MENU_ รายการ",
                                "loadingRecords": "Loading...",
                                "processing":     "Processing...",
                                "search":         "ค้นหา:",
                                "zeroRecords":    "ไม่พบข้อมูลที่ค้นหา",
                                "paginate": {
                                "first":      "First",
                                "last":       "Last",
                                "next":       "ถัดไป",
                                "previous":   "ก่อนหน้า"
                                },
                                "aria": {
                                "sortAscending":  ": activate to sort column ascending",
                                "sortDescending": ": activate to sort column descending"
                                }
                                }

    });
} );
</script>


</body>
</html>