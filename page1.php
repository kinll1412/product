<!DOCTYPE html>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>
<style>
    .pointer {
        cursor: pointer;
    }
</style>


<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <header>
        <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">

            <div style="display:scroll;left:5px;position:fixed;top:1px;">
                <img src="upload/rtaf.png" alt="EasyJung" style="width: 6%;position: fixed; bottom: -32px;">
            </div>

            <!--<img src="upload/rtaf.png" alt="EasyJung" style="width: 5.5%;;position: fixed; bottom: 10px;">-->

            <div style="display:scroll;left:100px;position:fixed;top:25px;color:#FFFFFF;font-size: 22px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</div>
            <!--เมนู-->

            <ul class="navbar-nav flex-nowrap ms-auto">
                <li class="nav-item d-xxl-flex justify-content-xxl-center align-items-xxl-center dropdown no-arrow">
                    <span class="btn btn-outline-primary" style="display:scroll;right:20px;position:fixed;top:20px;color:#FFFFFF;font-size: 18px; " data-toggle="modal" data-target="#modallogin">เข้าสู่ระบบ</span>
                </li>
            </ul>
            </div>
        </nav>
    </header>



    <!-- Modal -->
    <div class="modal fade" id="modallogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span class="fas fa-fingerprint"></span> เข้าสู่ระบบ</h5>
                    <button type="button" onclick="$('#modallogin').modal('hide');" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal text-nowrap" action="checkuser.php" method="post" id="insert" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group mb-3"><label class="form-label">ชื่อผู้ใช้</label>
                                    <input type="text" class="form-control form-control-sm" name="username" />
                                </div>
                                <div class="form-group mb-3"><label class="form-label">รหัสผ่าน</label>
                                    <input type="password" class="form-control form-control-sm" name="password" />
                                </div>

                            </div>
                        </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <center>
                            
                            <a href="importuser---user.php" style="width: 120px;" class="btn btn-sm btn-primary">สมัครสมาชิก</a>
                            <button class="btn btn-sm btn-success" type="submit" name="submit" style="width: 80px;">เข้าสู่ระบบ</button>
                            <a href="forget-user.php" style="width: 120px;" class="btn btn-sm btn-primary">สมัครสมาชิก</a>

                            <button class="btn btn-danger btn-sm" type="button" onclick="$('#modallogin').modal('hide');" style="width: 80px;">ยกเลิก</button>
                        </center>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <?php

    $sql = "SELECT*FROM stock ORDER BY product_id ASC";
    $query = mysqli_query($connection, $sql);
    ?>


    <div class="container">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">บัญชีมาตรฐานครุภัณฑ์</p>
                        </div>
                        <div class="col" style="text-align: right;">
                            <a href="index.php" class="btn btn-outline-primary"><span class="fas fa-home"> หน้าหลัก</span></a>
                            <!--             <a href="importuser.php" class="btn btn-outline-success"><span class="fas fa-user-plus">  เพิ่มข้อมูลผู้ใช้</span></a> -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="row-border" style="width:100">

                        <thead>
                            <tr style="text-align: center;">
                                <th>ลำดับ</th>
                                <th>หมายเลข</th>
                                <th>ชื่อรายการครุภัณฑ์</th>
                                <th>ราคา (บาท)</th>
                                <th>หน่วยนับ</th>
                                <th>รายละเอียด<br>Spec.&nbsp;&nbsp;รูปภาพ</th>

                            </tr>

                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($query as $data) {
                                $no++;
                            ?>
                                <tr>
                                    <td>
                                        <center><?= $no ?></center>
                                    </td>
                                    <td>
                                        <center><?= $data['product_id'] ?></center>
                                    </td>
                                    <td><?= $data['product_name'] ?></td>
                                    <td>
                                        <div align="right"><?= number_format($data['product_price'], 2) ?></div>
                                    </td>
                                    <td>
                                        <center><?= $data['product_unit'] ?></center>
                                    </td>
                                    <td>
                                        <center>
                                            <!-- เปิดไฟล์คุณลักษณะจาก server -->
                                            <a href="#" onclick="window.open('view_pdf.php?product_pdf=<?= $data['product_pdf'] ?>','myWindow')" class="btn btn-outline-primary" img src="#" alt="image description" title="คุณลักษณะเฉพาะพัสดุ"><span class="fa fa-book" img src="#" alt="image description" title="คุณลักษณะเฉพาะพัสดุ"></span></a>

                                            <!-- <a href="#" name="<?= $data['product_pdf'] ?>" onclick="titlepath(this.name ,this.name)" class="btn btn-outline-primary" img src="#" alt="image description" title="คุณลักษณะเฉพาะพัสดุ"><span class="fa fa-book" img src="#" alt="image description" title="คุณลักษณะเฉพาะพัสดุ"></span></a> -->

                                            <!-- เปิดไฟล์ image จาก server -->
                                            &nbsp;&nbsp;<button data-toggle="modal" data-id="<?= $data['product_id'] ?>" data-prod-img="<?= $data['product_img'] ?>" title="ภาพประกอบ" class="show-ImagesProduct btn btn-outline-success" alt="image description" data-target="#showImages"><span class="fas fa-images" img src="#" alt="image description" title="ภาพครุภัณฑ์"></span></button>

                                            <!-- เปิดไฟล์คุณลักษณะจาก link -->
                                            <!-- <a href="</*?=$data['product_pdf']*/?>" target="_blank" class="btn btn-outline-primary"img src="#" alt="image description" title="คุณลักษณะเฉพาะพัสดุ"><span class="fa fa-book" img src="#" alt="image description" title="คุณลักษณะเฉพาะพัสดุ"></span></a> -->
                                        </center>
                                    </td>
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
                                            <a class="btn btn-outline-primary" class="next" onclick="plusSlides(1)">next</a>
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
    </div>





    <?php include("include/script.php");  ?>
    <?php include("include/slideshow.php");  ?>

    <script type="text/javascript">
        document.title = "บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ";
        function signup() {
            window.open('importuser---user.php',_self)
        }
        function titlepath(path, name) {

            //In this path defined as your pdf url and name (your pdf name)
            let filepath = "upload/pdf/"+path;
            var prntWin = window.open();
            prntWin.document.write("<html><head><title>" + name + "</title></head><body>" +
                '<embed width="100%" height="100%" name="plugin" src="' + filepath + '" ' +
                'type="application/pdf" "></body></html>');
            prntWin.document.close();
        }

        $(document).ready(function() {
            $('#example').DataTable({
                stateSave: true,
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "ทั้งหมด"]
                ],
                language: {
                    "decimal": "",
                    "emptyTable": "ไม่มีข้อมูล",
                    "info": "แสดง _START_ - _END_ จาก _TOTAL_ รายการ",
                    "infoEmpty": "แสดง 0 - 0 จาก 0 รายการ",
                    "infoFiltered": "(ค้นหาจากทั้งหมด _MAX_ รายการ)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "แสดง _MENU_ รายการ",
                    "loadingRecords": "Loading...",
                    "processing": "Processing...",
                    "search": "ค้นหา:",
                    "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "ถัดไป",
                        "previous": "ก่อนหน้า"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }

            });
        });
    </script>
</body>

</html>