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
            <img src="upload/rtaf.png"style="width: 80px;" >

            <div class="container-fluid">
                <a class="navbar-brand d-xxl-flex justify-content-xxl-center align-items-xxl-center" href="officer.php" style="color: rgba(255,255,255,0.9);font-family: Sarabun, sans-serif;font-weight: bold;text-align: left;margin-left: 15px;padding: 0px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</a>
                
                <!--เมนู-->

                <ul class="navbar-nav flex-nowrap ms-auto">
                    <li class="nav-item d-xxl-flex justify-content-xxl-center align-items-xxl-center dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="officer.php">
                            <!-- กลุ่มอักษร start -->
                            <div class="sidebar-brand-text mx-1" style="text-align: right;">
                             <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["name"];?></span>
                            <ul class="navbar-nav" style="margin-bottom: -5px;"></ul>
                            <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["status"];?></span>
                            </div>
                             <!-- กลุ่มอักษร end -->
                    </a> 

                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                             <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;ออกจากระบบ</a>
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
 
            
    <?php

$sql="SELECT*FROM user ORDER BY user_id ASC";
$query=mysqli_query($connection,$sql);
?>

    <div class="container">
        <div class="col">
            <div class="card shadow mb-3">
  <!--               <div class="card-header py-3">
                    <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">บัญชีมาตรฐานครุภัณฑ์</p>
                </div> -->
               <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">รายชื่อผู้ใช้งานระบบ</p>
                        </div>
                       <div class="col" style="text-align: right;">
                       <a href="officer.php" class="btn btn-outline-primary"><span class="fas fa-home">  หน้าหลัก</span></a>
                      
                        </div> 
                    </div>
                </div>
                <div class="card-body">
                    
                    <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr style="text-align: center;">
                <th>ลำดับ</th>
                <th>รูปภาพ</th>
                <th>ยศ</th>
                <th>ชื่อ-นามสกุล</th>
                <th>สังกัด</th>
                <th>สถานะ</th>
              
                
                
            </tr>
        </thead>
        <tbody>
        <?php $no=0 ;
        foreach ($query as $data) {
            $no++;
            ?>
            <tr>   
            <td><center><?=$no?></center></td>
            <td><center><img class="rounded-circle my-n1" src="upload/user/<?php if(empty($data['user_img'])){echo "avatar.png";} echo $data['user_img']; ?>" width="32" height="32"></center></td>
            <td><center><?=$data['user_rank']?></center></td>
            <td><center><?=$data['user_name']?> <?=$data['user_lastname']?></center></td>
            <td><center><?=$data['user_belong']?></center></td>
            <td><center><?=$data['status']?></center></td>            
            <td><center>
           
            </center></td>  
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