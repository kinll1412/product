<!DOCTYPE html>
<?php session_start(); ?>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>

<header>
    <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top sb-topnav" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">
        <img src="upload/rtaf.png" alt="EasyJung" style="width: 6%;position: fixed; bottom: -32px;"></div>

        <div style="display:scroll;left:100px;position:fixed;top:25px;color:#FFFFFF;font-size: 22px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</div>
        <!--เมนู-->

        <ul class="navbar-nav flex-nowrap ms-auto">
            <li class="nav-item d-xxl-flex justify-content-xxl-center align-items-xxl-center dropdown no-arrow">
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="officer.php">
                        <!-- กลุ่มอักษร start -->
                        <div class="sidebar-brand-text mx-1" style="text-align: right;">
                            <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["name"]; ?></span>
                            <ul class="navbar-nav" style="margin-bottom: -5px;"></ul>
                            <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["status"]; ?></span>
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

<body style="font-family: Sarabun, sans-serif;border-style: none;">

    <!-- บาร์เมนู-->
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">

            <?php
            $sql = "SELECT*FROM stock ORDER BY product_id ASC";
            $query = mysqli_query($connection, $sql);
            ?>

            <div class="container">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-body">

                            <div class="amount-cart-container">
                                <p>รายการที่เลือก</p>
                                <div class="dropdown dropbtn" onclick="myFunction()">
                                    <a href="#" class="cart position-relative d-inline-flex" aria-label="View your shopping cart">
                                        <i class="fas fa fa-shopping-cart fa-lg" style="font-size:3vw"></i>
                                        <span id="amount-cart" class="cart-basket d-flex align-items-center justify-content-center">
                                            0
                                        </span>
                                    </a>
                                    <div id="myDropdown" class="dropdown-content">
                                        <table id="itemcart" class="table table-borderless">
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="container" style="margin-top: 20px;">
                                <button class="btn btn-info" style="float:right;margin-bottom: 25px;" onclick="sendCart()">ส่งรายการครุภัณฑ์</button>
                                <span></span>
                                <button onclick="clearCart()&window.location.reload();" class="btn btn-danger" style="float:right;margin-bottom: 25px;">clear</button>
                            </div>





                            <table id="example" class="row-border" style="width:100%">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>ลำดับ</th>
                                        <th>หมายเลข</th>
                                        <th>ชื่อรายการครุภัณฑ์</th>
                                        <th>ราคา (บาท)</th>
                                        <th>หน่วยนับ</th>
                                        <th>รายละเอียด<br>Spec.&nbsp;รูปภาพ&nbsp;เลือกรายการ</th>
                                        <html>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($query as $data) {
                                        $no++;
                                    ?>
                                        <tr class="product-data">
                                            <td>
                                                <center><?= $no ?><center>
                                            </td>
                                            <td>
                                                <center><?= $data['product_id'] ?></center>
                                            </td>
                                            <td><?= $data['product_name'] ?></td>
                                            <td align='right'><?= number_format($data['product_price'], 2) ?></td>
                                            <td>
                                                <center><?= $data['product_unit'] ?></center>
                                            </td>
                                            <td>
                                                <center>

                                                    <!-- เปิดไฟล์คุณลักษณะจาก server -->
                                                    <a href="#" onclick="window.open('view_pdf.php?product_pdf=<?= $data['product_pdf'] ?>','myWindow')" class="btn btn-outline-primary" img src="#" alt="image description" title="คุณลักษณะเฉพาะพัสดุ"><span class="fa fa-book" img src="#" alt="image description" title="คุณลักษณะเฉพาะพัสดุ"></span></a>

                                                    <!-- เปิดไฟล์ image จาก server -->
                                                    &nbsp;&nbsp;<a data-toggle="modal" data-id="<?= $data['product_id'] ?>" data-prod-img="<?= $data['product_img'] ?>" title="ภาพประกอบ" class="show-ImagesProduct btn btn-outline-secondary"" alt=" image description" data-target="#showImages"><span class="fas fa-images" img src="#" alt="image description" title="ภาพครุภัณฑ์"></span></a>

                                                    <!-- <a href="cart.php?product_id=<?/*= $data['product_id'] */ ?>*/&act=add" class="btn btn-outline-warning" img src="#" alt="image description" title="เลือกครุภัณฑ์"><span class="fas fa-shopping-cart" img src="#" alt="image description" title="เลือกครุภัณฑ์"></span></a> -->
                                                    &nbsp;&nbsp;<a id="<?= $data['product_id'] ?>" name="<?= $no ?>" onclick="addProduct(this);" class="btn btn-outline-success" img src="#" alt="image description" title="เลือกครุภัณฑ์"><span i class="fas fa-shopping-cart" img src="#" alt="image description" title="เลือกครุภัณฑ์"></span></a>

                                                    <!-- <a href="cart.php?product_id=<?= $data['product_id'] ?>&act=add"> เพิ่มลงตะกร้า </a> -->


                                                </center>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>

                        </div>
                        <!-- Modal ภาพตัวอย่างครุภัณฑ์-->
                        <div class="modal fade" id="showImages" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">ภาพตัวอย่างครุภัณฑ์</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <p style="text-align: center;" id="text-imgProduct">อยู่ระหว่างจัดทำรูปภาพประกอบ</p>
                                        <img id="image-product" class="image-product" alt="Image Product" style="width:50%;">

                                        <div class="slideshow-container">

                                            <div class="mySlides fade">
                                                <div class="numbertext">default</div>
                                                <img src="" style="width:100%">
                                                <div class="text">Caption Text</div>
                                            </div>

                                            <button class="prev" onclick="plusSlides(-1)">back</button>
                                            <button class="next" onclick="plusSlides(1)">next</button>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
        <?php include("include/cartStorage.php");  ?>
        <script>
            var text = document.getElementById('amount-cart');



            function myFunction() {
                if (CART.amount > 0) {
                    document.getElementById("myDropdown").classList.toggle("show");
                    var table = document.getElementById("itemcart");
                    const div = document.querySelector('.dropdown-content');
                    var products = CART.contents;
                    var total_sum = 0;
                    emptyRow();
                    for (i = 0; i < CART.amount; i++) {
                        let productPrice = parseFloat(products[i].price.replace(/,/g, ''));
                        let sumPrice = (products[i].qty * productPrice);
                        total_sum = total_sum + sumPrice;
                        let amount = parseFloat(sumPrice).toFixed(2);
                        let numberDecimal = amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        let sumText = numberDecimal.split(".")[0];
                        sumText = sumText + "  บาท";
                        var row = table.insertRow(i);
                        var cell_index = row.insertCell(0);
                        var cell_name = row.insertCell(1);
                        var cell_qty = row.insertCell(2);
                        var cell_unit = row.insertCell(3);
                        var cell_price = row.insertCell(4);
                        cell_index.innerHTML = i + 1;
                        cell_name.innerHTML = products[i].name;
                        cell_qty.innerHTML = "x" + products[i].qty;
                        cell_unit.innerHTML = products[i].unit;
                        cell_price.innerHTML = sumText;
                    }
                    let numberDecimal = total_sum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    let sumText = numberDecimal.split(".")[0];
                    if (document.getElementById('total-sum')) {
                        document.getElementById('total-sum').innerText = 'รวมราคา   ' + sumText + ' บาท'

                    } else {
                        div.innerHTML += `<p id="total-sum">รวมราคา ${sumText} บาท </p>`;
                    }

                }
            }

            function emptyRow() {
                var table = document.getElementById("itemcart");
                var rowlength = table.rows.length;
                if (rowlength > 0) {
                    for (i = 0; i < rowlength; i++) {
                        table.deleteRow(0);
                    }
                }


            }

            function clearCart() {
                showActiveBtn();
                CART.empty();
            }

            function addProduct(target_product) {
                let index = ((target_product.parentNode).parentNode).parentNode.rowIndex
                document.getElementsByName(target_product.name)[0].classList.add("active-cart");
                var table = document.getElementById('example');
                var itemtable = document.getElementById('itemcart');
                var itemLength = itemtable.rows.length;
                var rowLength = table.rows.length;
                if (index <= rowLength) {
                    var record = table.rows.item(index).cells;
                    var recordLength = record.length;
                    var id = record.item(1).innerText;
                    let name = record.item(2).innerText;
                    let price = record.item(3).innerText;
                    let unit = record.item(4).innerText;
                    if (CART.findProduct(id)) {
                        CART.remove(id);
                        document.getElementsByName(target_product.name)[0].classList.remove("active-cart");

                    } else {
                        CART.add(id, name, price, unit, 1);
                    }


                }
                // if(itemLength > 0){
                //     CART.contents.array.forEach(findIndexProduct);
                // }
            }

            function findIndexProduct(item, index) {


            }

            function errorMessage(err) {
                //display the error message to the user
                console.error(err);
            }

            function showActiveBtn() {
                //แสดง product ที่ถูกเลือกไปแล้วอยู่ในตระกร้า
                var cart_btn = document.getElementsByClassName('btn-outline-success');
                for (let i = 0; i < cart_btn.length; i++) {
                    if (CART.findProduct(cart_btn[i].id)) {
                        cart_btn[i].classList.add("active-cart");

                    }

                }
            }
            document.addEventListener('DOMContentLoaded', () => {
                //when the page is ready
                //getProducts(showProducts, errorMessage);
                //get the cart items from localStorage
                CART.init();
                showActiveBtn();
                //load the cart items
                //showCart();
            });

            function sendCart() {
                var _content = JSON.stringify(CART.contents);
                $.ajax({
                    url: "cart-officer.php",
                    type: "POST",
                    data: {
                        'product_id': _content
                    },
                    success: function(msg) {
                        clearCart();
                        window.open('editCart-officer.php', '_self');
                        //window.close()

                    }
                })

            }
        </script>
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