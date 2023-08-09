<!DOCTYPE html>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <?php include("include/head.php");  ?>
    <?php include("include/top-nav.php");  ?>

</head>

<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <div class="container">
        <div class="banner-image">
            <div class="hero-text">
                <h1>บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</h1>
                <p>สามารถตรวจสอบข้อมูลครุภัณฑ์ สายพลาธิการ<br>
                    หากต้องการสร้างรายการประมาณการราคาครุภัณฑ์ เพื่อเป็นข้อมูลในการดำเนินการด้านงบประมาณ</p>
                <button onclick="window.location.href='login1.php';" class="btn btn-outline-light">เข้าสู่ระบบ</button>
                <p style="display: inline-block;">หรือ</p>
                <button onclick="window.location.href='importuser---user.php';" class="btn btn-link">ลงทะเบียน</button>

            </div>
        </div>
    </div>
<!-- HTML !-->



    <!-- <tr>
        <div class="col-12" style="text-align: center;">
            <a href="page1.php" class="btn btn-outline-primary"><i class='fas fa-box-open' style='font-size:200px'></i><br><br><b>&nbsp;&nbsp;ข้อมูลครุภัณฑ์</b></br></a>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="importuser---user.php" class="btn btn-outline-danger"><i class='fas fa-user-plus' style='font-size:200px'></i><br><br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงทะเบียนใช้งาน</b></br></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="login1.php" class="btn btn-outline-success"><i class='fas fa-sign-in-alt' style='font-size:200px'></i><br><br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เข้าสู่ระบบ</b></br></a>


            </br>
        </div>
    </tr> -->
    <?php
    $sql = "SELECT*FROM stock ORDER BY product_id ASC";
    $query = mysqli_query($connection, $sql);
    ?>


    <div class="container">
        <center>
            <div class="col-11 center">
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
                                            <a href="<?= $data['product_pdf'] ?>" target="_blank" class="btn btn-outline-primary" img src="#" alt="image description" title="คุณลักษณะเฉพาะพัสดุ"><span class="fa fa-book" img src="#" alt="image description" title="คุณลักษณะเฉพาะพัสดุ"></span></a>

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
        </center>

    </div>
    </div>





    <?php include("include/script.php");  ?>
    <?php include("include/slideshow.php");  ?>

    <script type="text/javascript">
        document.title = "บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ";

        function signup() {
            window.open('importuser---user.php', _self)
        }

        function titlepath(path, name) {

            //In this path defined as your pdf url and name (your pdf name)
            let filepath = "upload/pdf/" + path;
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