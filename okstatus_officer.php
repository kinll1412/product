<!DOCTYPE html>
<?php session_start(); ?>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- <script src="assets/js/jquery-latest.min.js"></script> -->
    <?php include("include/head.php");  ?>
    <?php include("include/top-nav-logined.php");  ?>
</header>



<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <!-- บาร์เมนู-->
    <div id="layoutSidenav">
        <?php include("include/menu.officer.php");  ?>
        <div id="layoutSidenav_content">

            <?php

            $sql = "SELECT * FROM product_order INNER JOIN user ON product_order.session_id = user.user_id WHERE user.status = 'user'";
            $query = mysqli_query($connection, $sql);
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
                                    <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">รายการพัสดุของหน่วยอื่น</p>
                                </div>
                                <div class="col" style="text-align: right;">
                                    <a href="officer.php" class="btn btn-outline-primary"><span class="fas fa-home"> หน้าหลัก</span></a>
                                    <!--             <a href="importuser.php" class="btn btn-outline-success"><span class="fas fa-user-plus">  เพิ่มข้อมูลผู้ใช้</span></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="example" class="row-border" style="width:100%">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th style="width:3%">ลำดับ</th>
                                        <th style="width:10%">เลขที่เอกสาร</th>
                                        <th style="width:10%">หน่วย</th>
                                        <th>ชื่อรายการ</th>
                                        <th style="width:10%">รายละเอียด</th>
                                        <th style="width:15%">วันที่</th>
                                        <th style="width:13%">ราคารวม</th>
                                        <th style="width:8%">แก้ไข</th>
                                        <th style="width:8%">พิมพ์</th>

                                        <!-- <th>ดำเนินการ</th> -->

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
                                                <center><?= $data['order_id'] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $data['user_belong'] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $data['order_name'] ?></center>
                                            </td>
                                            <td>
                                                <center><a href="#" target="_blank" onclick="window.open('officer_check.php?order_id=<?= $data['order_id'] ?>')" class="btn btn-outline-primary" img src="#" alt="image description" title="รายละเอียด"><span class="fas fa-book-open" img src="#" alt="image description" title="รายละเอียด"></span></a></center>
                                            </td>
                                            <td>
                                                <center><?= $data['order_date'] ?> <?= $data['order_time'] ?><center>
                                            </td>
                                            <td align='right'><?= number_format($data['order_total'], 2) ?></td>

                                            <!--  <td><center>     <?php
                                                                    if ($data['order_status'] == 0) {
                                                                        echo '<center><span class="label label-primary">รอผล</span></center>';
                                                                    } else if ($data['order_status'] == 1) {
                                                                        echo '<center><span class="label label-success">เรียบร้อย</span></center>';
                                                                    } else if ($data['order_status'] == 2) {
                                                                        echo '<center><span class="label label-danger">ไม่อนุมัติ</span></center>';
                                                                    }
                                                                    ?></center></td> -->
                                            <td>
                                                <center> <?php
                                                            echo ' <a href="editCart-officer.php?order_id=' . $data['order_id'] . '" target="_self" class="btn btn-outline-warning"
                       img src="#" alt="image description" title="แก้ไขรายการ"><span class="fas fa-edit"img src="#" alt="image description" title="แก้ไขรายการ" 
                       style="font-size: 16px;width: 16px;height: 16px;"></span></a>';
                                                            ?>
                                                </center>
                                            </td>
                                            <td>
                                                <center> <?php
                                                            echo ' <a href="print---officer.php?order_id=' . $data['order_id'] . '&print=print" target="_blank" class="btn btn-outline-success"
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