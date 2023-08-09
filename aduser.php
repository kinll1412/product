<!DOCTYPE html>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>


<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <header>
        <nav class="navbar navbar-light navbar-expand shadow mb-6 topbar static-top" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">
        <img src="upload/rtaf.png"style="width: 80px; 10px;border-style: 3px;border-radius: 25px;" >
            <div class="container-fluid">
                <a class="navbar-brand d-xxl-flex justify-content-xxl-center align-items-xxl-center" href="index.php" style="color: rgba(255,255,255,0.9);font-family: Sarabun, sans-serif;font-weight: bold;text-align: left;margin: 0px;padding: 0px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</a>
                <ul class="navbar-nav flex-nowrap ms-auto">
                    <li class="nav-item d-xxl-flex justify-content-xxl-center align-items-xxl-center dropdown no-arrow">
                <!--         <span style="color: rgb(255,255,255);font-family: Sarabun, sans-serif;font-weight: bold;">เข้าสู่ระบบ</span> -->
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
                <div class="card-header py-3">
                    <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">ระบบเบิก - จ่ายพัสดุสายพลาธิการ กรมพลาธิการทหารอากาศ</p>
                </div>
                <div class="card-body">
                    <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr style="text-align: center;">
                
                <th>ยศ</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>สังกัด</th>
                <th>ชื่อผู้ใช้</th>
                <th>รหัสผ่าน</th>
               
                
            </tr>
        </thead>
        <tbody>
        <?php foreach ($query as $data) {?>
            <tr>
            
            <td><center><?=$data['user_id']?></center></td>
            <td><center><?=$data['user_rank']?></center></td>
            <td><?=$data['user_name']?></td>
            <td><center><?=$data['user_lastname']?></center></td>
            <td><center><?=$data['user_belong']?></center></td>            
            <td><center>
            <a href="#"onclick="window.open('view_img.php?product_id=<?=$data['product_id']?>" class="btn btn-outline-primary"><span class="fas fa-images"></span></a>
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