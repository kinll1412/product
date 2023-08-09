<!DOCTYPE html>
<?php session_start();?>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<header>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>
<?php include("include/top-nav-logined.php");  ?>
</header>
<body style="font-family: Sarabun, sans-serif;border-style: none;">           
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
               <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">บัญชีมาตรฐานครุภัณฑ์</p>
                        </div>
                       <div class="col" style="text-align: right;">
                            <a href="viweofficer_add.php"class="btn btn-outline-success"><span class="fas fa-plus-circle">   เพิ่มครุภัณฑ์</span></a>
                            
                        </div> 
                    </div>
                </div>
                <div class="card-body">
                    
                    <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr style="text-align: center;">
                <th>ลำดับ</th>
                <th>หมายเลข</th>
                <th>ชื่อรายการครุภัณฑ์</th>
                <th>ราคา (บาท)</th>
                <th>หน่วยนับ</th>
                <th>รายละเอียด</th>
                
            </tr>
        </thead>
        <tbody>
        <?php $no=0 ;
        foreach ($query as $data) {
            $no++;
            ?>
            <tr>
            <td><center><?=$no?></center></td>
            <td><center><?=$data['product_id']?></center></td>
            <td><?=$data['product_name']?></td>
            <td><center><?=$data['product_price']?></center></td>
            <td><center><?=$data['product_unit']?></center></td>            
            <td><center>
            <a href="officer_edit.php?product_id=<?=$data['product_id']?>" class="btn btn-outline-dark"><span class="fa fa-edit"></span></a>
            <a href="officer_del.php?product_id=<?=$data['product_id']?>" onclick="return confirm('คุณต้องการลบข้อมูลครุภัณฑ์ รหัส <?=$data['product_id']?> - <?=$data['product_name']?>')" class="btn btn-outline-danger"><span class="fa fa-trash"></span></a>
            <a href="#"onclick="window.open('view_pdf.php?product_pdf=<?=$data['product_pdf']?>')" class="btn btn-outline-primary"><span class="fa fa-book"></span></a>
            <a href="#"onclick="window.open('view_img.php?product_img=<?=$data['product_img']?>')" class="btn btn-outline-success"><span class="fas fa-images"></span></a>
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