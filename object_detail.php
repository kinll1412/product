<?php
session_start();
include("connection.php");
if (!isset($_SESSION["name"]) && !isset($_SESSION["status"])) {
    Header("Location: login1.php");
}
?>
<?php

//เคลียร์ ssession cart เดิม และสร้างใหม่
if (!empty($_POST['product_id'])) {
    unset($_SESSION['product_id']);
    $product_id = $_POST['product_id'];
    if (isset($_SESSION['product_id'])) {
        $_SESSION['product_id'] = $product_id;
    } else {
        $_SESSION['product_id'] = $product_id;
    }
}

?>

<!DOCTYPE html>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>
<script src='/assets/js/webviewer.min.js'></script>
<style>
    .pointer {
        cursor: pointer;
    }

    .small-img-group {
        display: flex;
        justify-content: space-between;
    }

    .small-img-col {
        flex-basis: 24%;
        cursor: pointer;
    }

    .sporduct select {
        display: block;
        padding: 5px 10px;

    }

    .sporduct input {
        width: 50px;
        height: 40px;
        padding-left: 10px;
        font-size: 16px;
        margin-right: 10px;
    }

    .sporduct input:focus {
        outline: none;
    }
</style>
<header>
    <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top sb-topnav" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">
        <img src="upload/rtaf.png" style="display:scroll;left:5px; position:fixed; top:5.5px;width: 5.5%;position: fixed; bottom: 10px;">

        <div style="display:scroll;left:100px;position:fixed;top:25px;color:#FFFFFF;font-size: 22px;">
            บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</div>
        <!--เมนู-->

        <ul class="navbar-nav flex-nowrap ms-auto">
            <li class="nav-item d-xxl-flex justify-content-xxl-center align-items-xxl-center dropdown no-arrow">
                <div class="nav-item dropdown no-arrow">
                </div>
            </li>
        </ul>
        </div>
    </nav>
</header>

<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <section class="container sproduct my-5 pt-5">
        <div class="row mt-8">
            <div class="col-lg-4 col-md-12 col-12">
                <img class="img-fluid w-100 pb-1" src="upload/product_img/7105357101080/7105357101080_1.jpg" id="mainImg" alt="product image">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="upload/product_img/7105357101080/7105357101080_1.jpg" width="100%" name="product-img" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="upload/product_img/7105357101080/7105357101080_2.jpg" width="100%" name="product-img" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="upload/product_img/7105357101080/7105357101080_2.jpg" width="100%" name="product-img" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="upload/product_img/7105357101080/7105357101080_2.jpg" width="100%" name="product-img" class="small-img" alt="">
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-md-12 col-12">

                
                <h3 id="tx-proId">หมายเลขพัสดุ 7105357101080</h3>
                <h3 id="tx-proName">เก้าอี้เหล็กชุบโครเมียม บุหนังเทียม</h3>
                <h3 id="tx-proPrice">ราคา 1380</h3>
                <h3 id="tx-proPriceRef" style="display:inline;">แหล่งอ้างอิง</h3>&emsp;<p style="display:inline;">ราคาตามบัญชีมาตราฐานครุภัณฑ์ กรมบัญชีกลาง</p><br>
                <h3 id="tx-proType" style="display:inline;">ประเภทพัสดุ</h3>&emsp;&emsp;<h3 id="tx-proGPSC" style="display:inline;">GPSC</h3><br>
            </div>
        </div>

        <div class="row mt-8">
            <h3 <div id='viewer' style="width:1024px;height:600px;margin:0 auto">
        </div>
        <script>
            WebViewer({
                    path: '/assets/js', // path to the PDF.js Express'lib' folder on your server
                    licenseKey: 'OzZ8q6rAWPBKPbo3BYpN',
                    initialDoc: 'viewpdf.pdf',
                    // initialDoc: '/path/to/my/file.pdf',  // You can also use documents on your server
                }, document.getElementById('viewer'))
                .then(instance => {
                    // now you can access APIs through the WebViewer instance

                    const {
                        Core,
                        UI
                    } = instance;

                    // adding an event listener for when a document is loaded
                    Core.documentViewer.addEventListener('documentLoaded', () => {
                        console.log('document loaded');
                    });

                    // adding an event listener for when the page number has changed
                    Core.documentViewer.addEventListener('pageNumberUpdated', (pageNumber) => {
                        console.log(`Page number is: ${pageNumber}`);
                    });
                });
        </script>
        </div>
    </section>
    <section id="featured" class="my-5 py-5">

    </section>
    <footer class="mt-5 py-5">

    </footer>
    <?php include("include/script.php");  ?>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script>
        let product_id = sessionStorage.getItem("product_id");
        document.getElementById("tx-proId").innerText = product_id;
        let mainImg = document.getElementById("mainImg");
        let smalling = document.getElementsByClassName('small-img');

        var myFunction = function(event) {
            var message = event.target.name;
            mainImg.src = event.target.src;
        }
        for (var i = 0; i < smalling.length; i++) {
            smalling[i].addEventListener('click', myFunction, false);
        }
    </script>
</body>

</html>