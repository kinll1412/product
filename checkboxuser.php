<!DOCTYPE html>
<?php session_start();?>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>


<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <header>
        <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top sb-topnav" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">
        <img src="upload/rtaf.png"alt="EasyJung" style="width: 6%;position: fixed; bottom: -32px;"></div>

<div style="display:scroll;left:100px;position:fixed;top:25px;color:#FFFFFF;font-size: 22px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</div>
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
            
    <?php

$sql="SELECT*FROM stock ORDER BY product_id ASC";
$query=mysqli_query($connection,$sql);
?>

    <div class="container">
        <div class="col">
            <div class="card shadow mb-3">
  <!--               <div class="card-header py-3">
                    <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">บัญชีมาตรฐานครุภัณฑ์</p>
                </div> -->
     <!--           <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">บัญชีมาตรฐานครุภัณฑ์</p>
                        </div>
                       
                    </div>
                </div>   -->
                <div class="card-body">
                    
                    <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr style="text-align: center;">
            <th><button type="submit" name="เพิ่ม" class="btn btn-warning">เพิ่ม</th>
                <th>ลำดับ</th>
                <th>หมายเลข</th>
                <th>ชื่อรายการครุภัณฑ์</th>
                <th>ราคา (บาท)</th>
                <th>หน่วยนับ</th>
                <th>รายละเอียด</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $connection = mysqli_connect("localhot","root","","Stock2");
            $query = "SELECT * FORM order_detail";
            $query_run = mysqli_query($connection, $query);

            if(mysqli_num_rows($sqli_run)>0)
            {
                foreach($query_run as $row)
                {
                    ?>
                     <tr>
                            <td style="width:10px; text-align:center;"><input Type="checkbox" name="เลือก[]" value="<?=$row['product_id']; ?>"></td>
                            <td><?=$no?></td>
                            <td><?=$row['product_id']; ?></td>
                            <td><?=$row['product_name']; ?></td>
                            <td><?=$row['product_price']; ?></td>
                            <td><?=$row['product_unit']; ?></td>
                            <td><?=$row['product_attribute']; ?></td>
                     </tr>
                    <?php
                }
            }
            else
            {
                ?>
                <tr>
                    <td colspan="7">ยังไม่ได้เลือกรายการ</td>
            </tr>
                <?php
            }
            ?>
            <tr>
                <td></td>
            </tr>
        </tbody>
        
    </table>
                </div>
            </div>
        </div>
    </div>


<?php include("include/script.php");  ?>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable({
        stateSave: true,
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