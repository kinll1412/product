    <?php
    session_start();
    include("connection.php");


    ?>


    <?php
    if (!empty($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $sql_check = "SELECT*FROM stock WHERE product_id='$product_id'";
        $query_check = mysqli_query($connection, $sql_check);
        $row_check = mysqli_num_rows($query_check);
        if ($row_check < 1) {
            echo "<script>";
            echo "Swal.fire({
icon: 'error',
title: 'ไม่พบข้อมูล กรุณากรอกใหม่อีกครั้ง',
showConfirmButton: true
}).then((result) => {
if (result.isConfirmed){
window.location.href='product_pos.php';
}
})";
            echo "</script>";
            exit();
        }
    }
    //เคลียร์ ssession cart เดิม และสร้างใหม่
    if (!empty($_POST['product_id'])) {
        unset($_SESSION['cart']);
        $arrays = $_POST['product_id'];
        $decoded_json = json_decode($arrays, true);
        foreach ($decoded_json as $product) {
            $product_id = $product['id'];
            $product_qty = $product['qty'];
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id] += $product_qty;
            } else {
                $_SESSION['cart'][$product_id] = $product_qty;
            }
        }
    }
    //update session 'cart' เมื่อมีการเปลี่ยนแปลง input
    if (!empty($_GET['status'])) {
        $status = $_GET['status'];
        if (isset($_GET['product_change'])) {
            $product = $_GET['product_change'];
        }
        if ($status == 'update') {
            $qty = $_GET['qty_change'];
            if (isset($_SESSION['cart'][$product])) {
                $_SESSION['cart'][$product] = $qty;
            }
        }
        if ($status == 'remove') {
            unset($_SESSION['cart'][$product]);
        }
        if ($status == 'cancel') {
            unset($_SESSION['cart']);
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="th" style="font-family: Sarabun, sans-serif;">

    <!-- <script src="assets/js/jquery-latest.min.js"></script> -->
    <header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("include/head.php");  ?>
    <?php include("include/top-nav-logined.php");  ?>
    </header>
   
    <body style="font-family: Sarabun, sans-serif;border-style: none;">

        <!-- บาร์เมนู-->
        <div id="layoutSidenav">
            <?php include("include/menu.officer.php");  ?>
            <div id="layoutSidenav_content">



                <div class="container">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <form class="frmcart" id="frmcart" name="frmcart" method="post" action="confirm-officer.php">
                                    <div class="table-responsive">
                                        <p align="center"> <a class="btn btn-primary" onclick="sendCart()">กลับไปเลือกครุภัณฑ์</a> </p>
                                        <form>
                                            <div align="center" style="margin-bottom:1rem;margin-top:1rem;">
                                                <label for="name-order" class="font-weight-bold" style="display:inline;">ชื่อเรื่อง</label>
                                                <input id="name-order" name="name-order" style="margin-left:1rem;" type="text" size="50"></input>
                                                <label for="order-owner" class="font-weight-bold" style="display:inline;">&emsp;หน่วย</label>
                                                <input id="order-owner" name="order-owner" style="margin-left:1rem;" type="text" size="30"></input>
                                            </div>

                                            <row>
                                                <table class="table table-bordered table-sm align-middle text-nowrap">
                                                    <tbody>
                                                        <tr style="background: #f8f9fc;">
                                                            <th style="text-align:center;" width="5%">ลำดับ</th>
                                                            <th style="text-align:center;" width="15%">หมายเลขพัสดุ</th>
                                                            <th style="text-align:center;">รายการ</th>
                                                            <th style="text-align:center;" width="8%">ราคา</th>
                                                            <th style="text-align:center;" width="4%">จำนวน</th>
                                                            <th style="text-align:center;" width="8%">หน่วยนับ</th>
                                                            <th style="text-align:center;" width="8%">รวม</th>
                                                            <th style="text-align:center;" width="8%">ลบ</th>
                                                        </tr>

                                                        <?php
                                                        $total = 0;
                                                        $no = 0;
                                                        if (!empty($_SESSION['cart'])) {
                                                            include("connection.php");
                                                            foreach ($_SESSION['cart'] as $product_id => $qty) {
                                                                $sql = "select * from stock where product_id=$product_id";
                                                                $query = mysqli_query($connection, $sql);
                                                                $row = mysqli_fetch_array($query);
                                                                $sum = $row['product_price'] * $qty;
                                                                $no++;
                                                                $total += $sum;

                                                                echo "<tr>";
                                                                echo "<td align='center'>" . $no . "</td>";
                                                                echo "<td class='product-id' align='center'>" . $row["product_id"] . "</td>";
                                                                echo "<td class='product-name'>" . $row["product_name"] . "</td>";
                                                                echo "<td class = 'product-price' align='right'>" . number_format($row["product_price"], 2) . "</td>";
                                                                echo "<td align='right'>";
                                                                // จำนวน
                                                                echo "<input class='qty' id='$product_id'type='number' size='1' name='amount[$product_id]' value='$qty'/>";
                                                                //
                                                                echo "</td>";
                                                                echo "<td class='product-unit' align='center'>" . $row["product_unit"] . "</td>";
                                                                // sum รวมราคาสินค้า
                                                                echo "<td class = 'sumPrice' align='right'>" . number_format($sum, 2) . "</td>";
                                                                //remove product
                                                                echo "<td><center><a href='cart-officer.php?product_change=$product_id&status=remove' class='btn btn-danger btn-xs'>ลบ</a></center></td>";
                                                                echo "</tr>";
                                                            }
                                                            echo "<tr style='background: #f8f9fc;'>";
                                                            echo "<td colspan='4' align='center'><b>ราคารวม</b></td>";
                                                            echo "<td colspan='4' align='center'>" . "<b class = 'sum_total' id = 'total'>" . number_format($total, 2) . "</b>" . "   <b>บาท</b></td>";

                                                            echo "</tr>";
                                                        }
                                                        ?>
                                                </table>
                                            </row>
                                            <center>
                                                <a href=officer.php class="btn btn-danger"> ยกเลิกรายการพัสดุที่เลือก </a>
                                                <button type="submit" name="Submit" class="btn btn-primary">
                                                    <span class="glyphicon glyphicon-shopping-cart"> </span> ยืนยัน </button>
                                            </center>

                                    </div>
                            </div>
                        </div>
                    </div>

                    </form>
                    <?php include("include/script.php");  ?>
                    <?php include("include/cartStorage.php");  ?>
                    <script type="text/javascript">
                        function updateValue(id, qty) {
                            $.ajax({
                                url: "cart-officer.php",
                                type: "GET",
                                data: {
                                    'status': 'update',
                                    'product_change': id,
                                    'qty_change': qty


                                },
                                success: function() {
                                    //when success output
                                }
                            })
                        }

                        function emtryOrderDetail() {
                            let order_name = document.forms["frmcart"]["name-order"].value;
                            let order_owner = document.forms["frmcart"]["order-owner"].value;

                            if (order_name = "" || order_name.length <= 0) {
                                alert("กรุณาตั้งชื่อเรื่องหรือชื่อรายการ");
                                return false;

                            }
                            return true;

                        }

                        function ready() {
                            var qtyInputs = document.getElementsByClassName('qty');
                            for (var i = 0; i < qtyInputs.length; i++) {
                                var input = qtyInputs[i]
                                input.addEventListener('change', qtyChanged)
                            }
                        }

                        function qtyChanged(event) {
                            var input = event.target;
                            if (isNaN(input.value) || input.value <= 0) {
                                input.value = 1
                            }
                            findTotal();
                            updateValue(event.target.id, input.value);
                        }

                        function findTotal() {
                            let qtyRow = document.getElementsByClassName('qty');
                            let priceRow = document.getElementsByClassName('product-price');
                            let sum_priceRow = document.getElementsByClassName('sumPrice');
                            let total = 0;
                            for (let i = 0; i < qtyRow.length; i++) {
                                let productQTY = qtyRow[i].value;
                                qtyRow[i].value = productQTY;
                                qtyRow[i].setAttribute("value", productQTY)
                                let productPrice = parseFloat(priceRow[i].innerText.replace(/,/g, ''));
                                let sum = (productQTY * productPrice);
                                total = total + sum;
                                let numDecimal = commaWithDecimals(sum);
                                sum_priceRow[i].innerText = numDecimal;
                            }
                            var totalDecimal = commaWithDecimals(total);
                            document.getElementById('total').innerText = totalDecimal;
                            //console.log(document.getElementById('total').innerText);

                        };
                        var text_orderName = document.getElementById('name-order');
                        document.addEventListener("DOMContentLoaded", function(event) {
                            ready();
                        });
                        if (text_orderName.value === '' & text_orderName.value.length === 0) {
                            if (localStorage.getItem('order-name') != null) {
                                text_orderName.value = localStorage.getItem('order-name')
                            }
                        }

                        function commaWithDecimals(num) {
                            var amount = parseFloat(num).toFixed(2);
                            var numberDecimal = amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            return numberDecimal;
                        }

                        function sendCart() {
                            let product_id = document.getElementsByClassName('product-id');
                            let product_name = document.getElementsByClassName('product-name');
                            let product_price = document.getElementsByClassName('product-price');
                            let product_unit = document.getElementsByClassName('product-unit');
                            let qtyRow = document.getElementsByClassName('qty');
                            order_name = text_orderName.value;
                            if (order_name != '' && order_name.length > 0) {
                                localStorage.setItem('order-name', order_name);
                            }
                            CART.init();
                            CART.empty();
                            for (let i = 0; i < product_id.length; i++) {
                                CART.set(product_id[i].innerText, product_name[i].innerText, product_price[i].innerText, product_unit[i].innerText, qtyRow[i].value);
                            }
                            window.open('officer.php', '_self');
                            window.close()


                        }

                        function submitOrder() {
                            let name = document.getElementById('name-order');

                        }
                    </script>

    </body>

    </html>