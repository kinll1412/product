<!DOCTYPE html>
<?php session_start();?>
<?php include("connection.php");  
   if (!isset($_SESSION["name"]) && !isset($_SESSION["status"])) {
    Header("Location: login1.php");
}?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>


<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <header>
        <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top sb-topnav" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">
        <img src="upload/rtaf.png"style="display:scroll;left:px; position:fixed; top:-15px;width: 6%;position: fixed;">

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
        <?php include("include/menu.php");  ?>
        <div id="layoutSidenav_content">
            
    <?php

$sql="SELECT*FROM product_order";
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
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">รายละเอียด</p>
                        </div>
                       <div class="col" style="text-align: right;">
                       <a href="admin.php" class="btn btn-outline-primary"><span class="fas fa-home">  หน้าหลัก</span></a>
          <!--             <a href="importuser.php" class="btn btn-outline-success"><span class="fas fa-user-plus">  เพิ่มข้อมูลผู้ใช้</span></a> -->
                        </div> 
                    </div>
                </div>
                <div class="card-body">
                    
                    <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr style="text-align: center;">
                <th>ลำดับ</th>
                <th>เลขที่เอกสาร</th>
                <th>ชื่อรายการ</th>
                <th>รายละเอียด</th>
                <th>วันที่</th>
                <th>ราคารวม</th>
                <th>พิมพ์</th>
                <!-- <th>ดำเนินการ</th> -->
                
            </tr>
        </thead>
        <tbody>
        <?php $no=0 ;
        foreach ($query as $data) {
            $no++;
            ?>
            <tr>
            <td><center><?=$no?></center></td>
            <td><center><?=$data['order_id']?></center></td>
            <td><?=$data['order_name']?></td>
            <td><center><a href="#" target="_blank" onclick="window.open('admin_check.php?order_id=<?=$data['order_id']?>')" class="btn btn-outline-primary"img src="#" alt="image description" title="รายละเอียด"><span class="fas fa-book-open"img src="#" alt="image description" title="รายละเอียด"></span></a></center></td>
            <td><center><?=$data['order_date']?> <?=$data['order_time']?><center></td>
            <td align='right'><?=number_format($data['order_total'],2)?></td>

<!--  <td><center>     <?php
                if($data['order_status'] == 0){
                echo '<center><span class="label label-primary">รอผล</span></center>';
                }
                else if ($data['order_status'] ==1){
                echo '<center><span class="label label-success">เรียบร้อย</span></center>';
            }
                else if ($data['order_status'] ==2){
                echo '<center><span class="label label-danger">ไม่อนุมัติ</span></center>'; 
            }
               ?></center></td> -->
                  <td><center> <?php            
                echo ' <a href="print---admin.php?order_id='.$data['order_id'].'&print=print" target="_blank" class="btn btn-outline-success"
                       img src="#" alt="image description" title="พิมพ์"><span class="fas fa-print"img src="#" alt="image description" title="พิมพ์" 
                       style="font-size: 16px;width: 16px;height: 16px;"></span></a>';
                   ?>
          </center>
       </td>
            </tr>
        <?php } ?>
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