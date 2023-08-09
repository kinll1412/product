<?php
include("connection.php");
isset($_GET['product-id']) ? $product_id = $_GET['product-id'] : $product_id = "";
if ($product_id != "") {
    $sql = "select * from stock where product_id=$product_id";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_array($query);
    $id = $result['product_id'];
    $name = $result['product_name'];
    $price = $result['product_price'];
    $unit = $result['product_unit'];
    $attribute = $result['product_pdf'];
    $num_image = $result['product_img'];
}
?>
<!DOCTYPE html>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>กรมพลาธิการทหารอากาศ</title>
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sarabun&amp;display=swap">
<link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css">
<link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
<link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css">
<link rel="stylesheet" href="/assets/css/Navigation-with-Button.css">
<link rel="stylesheet" type="/text/css" href="assets/css/styles.css">
<link rel="stylesheet" href="/assets/css/Tamplate-SB-Admin-on-BSS.css">
<link rel="stylesheet" href="/assets/css/label.css">
<script src="/assets/js/jquery-3.6.0.min.js"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="/assets/css/jquery.dataTables.css">
<script src='/assets/js/webviewer.min.js'></script>
<script src="/assets/js/theme.js"></script>
<script src="/assets/js/jquery-3.6.0.min.js"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
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
        <img src="/upload/rtaf.png" style="display:scroll;left:5px; position:fixed; top:5.5px;width: 5.5%;position: fixed; bottom: 10px;">

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
                <img class="img-fluid w-100 pb-1" src="/upload/product_img/7105357101080/7105357101080_1.jpg" id="mainImg" alt="product image">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="/upload/product_img/7105357101080/7105357101080_1.jpg" width="100%" name="product-img" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="/upload/product_img/7105357101080/7105357101080_2.jpg" width="100%" name="product-img" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="/upload/product_img/7105357101080/7105357101080_2.jpg" width="100%" name="product-img" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="/upload/product_img/7105357101080/7105357101080_2.jpg" width="100%" name="product-img" class="small-img" alt="">
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-md-12 col-12">

                <?php
                include("connection.php");
                isset($_GET['product-id']) ? $product_id = $_GET['product-id'] : $product_id = "";
                if ($product_id != "") {
                    $sql = "select * from stock where product_id=$product_id";
                    $query = mysqli_query($connection, $sql);
                    $result = mysqli_fetch_array($query);
                    $result['product_id'];
                    $result['product_name'];
                    $result['product_price'];
                    $result['product_unit'];
                    $result['product_pdf'];
                    $result['product_img'];
                }
                ?>
                <h3 id="tx-proId">หมายเลขพัสดุ <?php $product_id ?></h3>
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
                    initialDoc: '/viewpdf.pdf',
                    // initialDoc: '/path/to/my/file.pdf',  // You can also use documents on your server
                }, document.getElementById('viewer'))
                .then(instance => {
                    // now you can access APIs through the WebViewer instance

                    const {
                        Core,
                        UI
                    } = instance;

                    // adding an event listener for when a document is loaded
                    Core.documentViewer.addEventListener('documentLoaded', () => {});

                    // adding an event listener for when the page number has changed
                    Core.documentViewer.addEventListener('pageNumberUpdated', (pageNumber) => {});
                });
        </script>
        </div>
    </section>
    <section id="featured" class="my-5 py-5">

    </section>
    <footer class="mt-5 py-5">

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script>
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
<?php
isset($_GET['product-id']) ? $product_id2 = $_GET['product-id'] : $product_id2 = "";
echo $product_id2

?>