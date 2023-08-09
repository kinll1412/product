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
        <img src="upload/rtaf.png"style="display:scroll;left:px; position:fixed; top:-15px;width: 6%;position: fixed;">
            

            <div style="display:scroll;left:100px;position:fixed;top:25px;color:#FFFFFF;font-size: 22px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</div>

                
                <!--เมนู-->

                <ul class="navbar-nav flex-nowrap ms-auto">
                    <li class="nav-item d-xxl-flex justify-content-xxl-center align-items-xxl-center dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="admin.php">
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

$sql="SELECT*FROM stock ORDER BY product_id ASC";
$query=mysqli_query($connection,$sql);
?>

    <div class="container">
        <div class="col">
            <div class="card shadow mb-3">
  <!--               <div class="card-header py-3">
                    <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">บัญชีมาตรฐานครุภัณฑ์</p>
                </div> -->
   <!--            <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">บัญชีมาตรฐานครุภัณฑ์</p>
                        </div>
                       <div class="col" style="text-align: right;">
                            <a href="add.php"class="btn btn-outline-success"><span class="fas fa-plus-circle">   เพิ่มครุภัณฑ์</span></a>
                            
                        </div> 
                    </div>
                </div>  -->
                <div class="card-body">
                    
                    <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr style="text-align: center;">
                <th>ลำดับ</th>
                <th>หมายเลข</th>
                <th>ชื่อรายการครุภัณฑ์</th>
                <th>ราคา (บาท)</th>
                <th>หน่วยนับ</th>
                <th>เครื่องมือ</th>
                
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
            <td align="right"><?=number_format($data['product_price'],2)?></td>
            <td><center><?=$data['product_unit']?></center></td>            
            <td><center>
            <a href="edit.php?product_id=<?=$data['product_id']?>" class="btn btn-outline-dark"img src="#" alt="image description" title="แก้ไข"><span class="fa fa-edit"img src="#" alt="image description" title="แก้ไข"></span></a>
            <a href="del.php?product_id=<?=$data['product_id']?>" onclick="return confirm('คุณต้องการลบข้อมูลครุภัณฑ์ รหัส <?=$data['product_id']?> - <?=$data['product_name']?>')" class="btn btn-outline-danger"img src="#" alt="image description" title="ลบ"><span class="fa fa-trash" img src="#" alt="image description" title="ลบ"></span></a>
            <a href="<?= $data['product_pdf'] ?>" target="_blank" class="btn btn-outline-primary"img src="#" alt="image description" title="คุณลักษณะเฉพาะพัสดุ"><span class="fa fa-book"img src="#" alt="image description" title="คุณลักษณะเฉพาะพัสดุ"></span></a>
            <button data-toggle="modal" data-id="<?= $data['product_id'] ?>" data-prod-img="<?= $data['product_img'] ?>" title="ภาพประกอบ" class="show-ImagesProduct btn btn-outline-success" alt="image description" data-target="#showImages"><span class="fas fa-images" img src="#" alt="image description" title="ภาพครุภัณฑ์"></span></button>
            </center></td>  
            </tr>
        <?php } ?>
        </tbody>
        
    </table>

     <!-- Modal -->
     <div align="center" class="modal fade" id="showImages" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">ภาพตัวอย่างครุภัณฑ์</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <p style="text-align: center;" id="text-imgProduct">อยู่ระหว่างจัดทำรูปภาพประกอบ</p>
                                    <img id="image-product" class="image-product" alt="Image Product" style="width:50%;height:50%;">

                                    <div class="slideshow-container">

                                        <div class="mySlides fade">
                                            <div class="numbertext">default</div>
                                            <img src="" style="width:100%">
                                            <div class="text">Caption Text</div>
                                        </div>

                                        <center><a class="btn btn-outline-primary" class="prev" onclick="plusSlides(-1)">back</a>
                                            <a class="btn btn-outline-success" class="next" onclick="plusSlides(1)">next</a>
                                        </center>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include("include/script.php");  ?>
<?php include("include/slideshow.php");  ?>

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