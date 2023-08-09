<!DOCTYPE html>
<?php session_start(); ?>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("include/head.php");  ?>
    <?php include("include/top-nav-logined.php");  ?>
</header>
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->



<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <!-- บาร์เมนู-->
    <div id="layoutSidenav">
        <?php include("include/menu.user.php");  ?>
        <div id="layoutSidenav_content">

            <?php

            $s_id = $_SESSION['id'];
            $sql = "SELECT * FROM product_order WHERE session_id=$s_id";
            $query = mysqli_query($connection, $sql);
            ?>

            <div class="container">
                <div class="col">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col">
                                <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">
                                    ผลการตรวจสอบ</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example" class="row-border" style="width:100%">
                            <thead>
                                <tr style="text-align: center;">
                                    <th width="5%">ลำดับ</th>
                                    <th width="10%">เลขที่เอกสาร</th>
                                    <th>ชื่อรายการ</th>
                                    <th width="10%">รายละเอียด</th>
                                    <th width="15%">วันที่</th>
                                    <th width="15%">ราคารวม</th>
                                    <th width="8%">พิมพ์</th>
                                    <th width="8%">ลบ</th>


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
                                        <td><?= $data['order_name'] ?></td>
                                        <td>
                                            <center><a href="#" target="_blank" onclick="window.open('user_check.php?order_id=<?= $data['order_id'] ?>')" class="btn btn-outline-primary" img src="#" alt="image description" title="รายละเอียด"><span class="fas fa-book-open" img src="#" alt="image description" title="รายละเอียด"></span></a></center>
                                        </td>
                                        <td>
                                            <center><?= $data['order_date'] ?> <?= $data['order_time'] ?><center>
                                        </td>
                                        <td align="right"><?= number_format($data['order_total'], 2) ?></td>

                                        <!-- <td><center>     <?php
                                                                if ($data['order_status'] == 0) {
                                                                    echo '<center><span class="label label-primary">รอผล</span></center>';
                                                                } else if ($data['order_status'] == 1) {
                                                                    echo '<center><span class="label label-success">เรียบร้อย</span></center>';
                                                                } else if ($data['order_status'] == 2) {
                                                                    echo '<center><span class="label label-danger">ไม่</span></center>';
                                                                }
                                                                ?></center></td> -->


                                        <td>
                                            <center> <?php
                                                        echo ' <a href="print.php?order_id=' . $data['order_id'] . '&print=print" target="_blank" class="btn btn-outline-success"
                       img src="#" alt="image description" title="พิมพ์"><span class="fas fa-print"img src="#" alt="image description" title="พิมพ์" 
                       style="font-size: 16px;width: 16px;height: 16px;"></span></a>';
                                                        ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="deleteOrder.php?order-id=<?= $data['order_id'] ?>" onclick="return confirm('คุณต้องการลบรายการครุภัณฑ์ เลขที่ <?= $data['order_id'] ?>   <?= $data['order_name'] ?> หรือไม่')" class="btn btn-outline-danger" img src="#" alt="image description" title="ลบรายการ"><span class="fa fa-trash" img src="#" alt="image description" title="ลบรายการ" style="font-size: 16px;width: 16px;height: 16px;"></span></a>
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

            function confirmDelete() {
                let text = "Press a button!\nEither OK or Cancel.";
                if (confirm(text) == true) {
                    text = "You pressed OK!";
                } else {
                    text = "You canceled!";
                }

            }
        </script>


</body>

</html>