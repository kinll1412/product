<?php
session_start();
include("connection.php");
?>

<?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $sql1 = "SELECT * FROM product_order WHERE order_id='$order_id'";
    $query1 = mysqli_query($connection, $sql1);
    $result = mysqli_fetch_assoc($query1);
    if (mysqli_num_rows($query1) == 1) {
        $order_name = $result['order_name'];
        $order_owner = $result['order_owner'];
        $_SESSION['order_id'] = $order_id;
        $_SESSION['order-name'] = $order_name;
        $_SESSION['order-owner'] = $order_owner;

        //เอาข้อมูล product_id ในฐานข้อมูลมาเก็บไว้ใน ssession cart
        $sql2 = "SELECT * FROM order_detail WHERE order_id='$order_id'";
        $query = mysqli_query($connection, $sql2);
        unset($_SESSION['cart']);
        foreach ($query as $data) {
            $product_id = $data['product_id'];
            $product_qty = $data['detail_qty'];
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id] += $product_qty;
            } else {
                $_SESSION['cart'][$product_id] = $product_qty;
            }
        }
    }
} else {
    if (isset($_SESSION['order_id'])) {
        $order_id = $_SESSION['order_id'];
        $order_name = $_SESSION['order-name'];
        $order_owner = $_SESSION['order-owner'];
    } else {
        //return okstatus_officer.php
    }
}
if (isset($_SESSION['order_id'])) {
    $order_id = $_SESSION['order_id'];
    $order_name = $_SESSION['order-name'];
    $order_owner = $_SESSION['order-owner'];
} else {
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>


<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <header>
        <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top sb-topnav" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">
            <img src="upload/rtaf.png" style="display:scroll;left:5px; position:fixed; top:5.5px;width: 5.5%;position: fixed; bottom: 10px;">

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

    <!-- บาร์เมนู-->
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">



            <div class="container">
                <p align="center"> <a class="text-warning" style="font-size:1.5em;">แก้ไขรายการครุภัณฑ์ของหน่วย</a> </p>
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <form class="frmcart" id="frmcart" name="frmcart" method="post" action="confirmEdit-officer.php">
                                <div class="table-responsive">

                                    <p align="center"> <a class="btn btn-primary" onclick="sendCart()">กลับไปเลือกครุภัณฑ์</a> </p>
                                    <form>
                                        <div align="center" style="margin-bottom:1rem;margin-top:1rem;">
                                            <label for="name-order" class="font-weight-bold" style="display:inline;">เรื่อง</label>
                                            <p id="name-order" name="name-order" style="display:inline;"><?php echo $order_name ?></p>
                                            <label for="order-owner" class="font-weight-bold" style="display:inline;">&emsp;หน่วย</label>
                                            <p id="owner-order" name="name-order" style="display:inline;"><?php echo $order_owner ?></p>
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
                                                            echo "<td><center><a href='editCart-officer.php?product_change=$product_id&status=remove' class='btn btn-danger btn-xs'>ลบ</a></center></td>";
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
                                            <a onclick="clearCart()" class="btn btn-danger"> ยกเลิกการแก้ไข </a>
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
                            url: "editCart-officer.php",
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

                    function clearCart() {
                        CART.empty();
                        window.open('okstatus_officer.php', '_self');
                        window.close();
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
                    document.addEventListener("DOMContentLoaded", function(event) {
                        ready();
                    });

                    function commaWithDecimals(num) {
                        var amount = parseFloat(num).toFixed(2);
                        var numberDecimal = amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        return numberDecimal;
                    }

                    function sendCart() {
                        let order_name = document.getElementById('name-order').innerHTML;
                        let order_owner = document.getElementById('owner-order').innerHTML;

                        let product_id = document.getElementsByClassName('product-id');
                        let product_name = document.getElementsByClassName('product-name');
                        let product_price = document.getElementsByClassName('product-price');
                        let product_unit = document.getElementsByClassName('product-unit');
                        let qtyRow = document.getElementsByClassName('qty');
                        // localStorage.setItem('order-name', order_name);
                        // localStorage.setItem('order-owner', order_owner);
                        CART.init();
                        CART.empty();
                        for (let i = 0; i < product_id.length; i++) {
                            CART.set(product_id[i].innerText, product_name[i].innerText, product_price[i].innerText, product_unit[i].innerText, qtyRow[i].value);
                        }
                        window.open('edit-officer.php', '_self');


                    }
                </script>

</body>

</html>