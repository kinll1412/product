<!DOCTYPE html>
<?php session_start();?>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>


<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <header>
        <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">
            <img src="upload/rtaf.png"style="width: 80px;" >

            <div class="container-fluid">
                <a class="navbar-brand d-xxl-flex justify-content-xxl-center align-items-xxl-center" href="officer.php" style="color: rgba(255,255,255,0.9);font-family: Sarabun, sans-serif;font-weight: bold;text-align: left;margin: 0px;padding: 0px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</a>
                
                <!--เมนู-->

                <ul class="navbar-nav flex-nowrap ms-auto">
                    <li class="nav-item d-xxl-flex justify-content-xxl-center align-items-xxl-center dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="viweofficer_index.php">
                            <!-- กลุ่มอักษร start -->
                            <div class="sidebar-brand-text mx-1" style="text-align: right;">
                             <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["name"];?></span>
                            <ul class="navbar-nav" style="margin-bottom: -5px;"></ul>
                            <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["status"];?></span>
                            </div>
                             <!-- กลุ่มอักษร end -->
                    </a> 

                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                            <a class="dropdown-item" href="logout.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;ออกจากระบบ</a>
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
   <?php
    $product_id = $_GET['product_id'];
    $sql="SELECT * FROM stock WHERE product_id='$product_id'";
    $query=mysqli_query($connection,$sql);
    $data = mysqli_fetch_assoc($query);
    $old_product_pdf=$data['product_pdf'];
    ?>
 <form class="form-horizontal text-nowrap" action="officer_update.php" method="post" enctype= "multipart/form-data">
    <div class="container">
        <div class="card shadow mb-4">
   <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">แก้ไขข้อมูลพัสดุ</p>
                        </div>
                        <div class="col" style="text-align: right;">
                            
                        </div>
                    </div>
                </div>
            <div class="card-body">
        <div class="row profile-row">
            <div class="col-md-4 relative">
                <div class="avatar">
                    <div class="row">
                        <div class="col d-lg-flex justify-content-lg-center align-items-lg-center mb-2">
                            <div class="mb-2">
                                <img src="upload/img/<?php if(empty($data['product_img'])){echo "pic.png";} echo $data['product_img']; ?>" id ="preview" class="d-lg-flex justify-content-lg-center align-items-lg-center" style="height: 330px" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-lg-flex justify-content-lg-center align-items-lg-center">
                            <input type="hidden" name="old_product_img" value="<?php echo $data['product_img']; ?>">
                            <input type="file" class="form-control form-control-sm" name= "product_img" id ="image" accept="image/png, image/jpg, image/jpeg"  style="display: none;">
                            <button id="" class="btn btn-sm btn-secondary" onclick="return triggerFile();">เลือกรูป</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group mb-3"><label class="form-label">หมายเลข</label>
                            <input type="text" name="product_id" class="form-control form-control-sm" value="<?=$data['product_id']?>" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group mb-3"><label class="form-label">ชื่อรายการครุภัณฑ์</label>
                            <input type="text" name="product_name" class="form-control form-control-sm" value="<?=$data['product_name']?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group mb-3"><label class="form-label">ราคา</label>
                            <input type="text" name="product_price" class="form-control form-control-sm" value="<?=$data['product_price']?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group mb-3"><label class="form-label">หน่วยนับ</label>
                            <input type="text" name="product_unit" class="form-control form-control-sm" value="<?=$data['product_unit']?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group mb-3"><label class="form-label">รายละเอียด</label>
                            <input type="hidden" name="old_product_pdf" value="<?php echo $old_product_pdf; ?> ?>">
                            <input type="file" name="product_pdf" accept=".pdf" class="form-control form-control-sm" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="row">
                    <div class="col" style="text-align: center;">
                        <button class="btn btn-sm btn-success" type="submit" style="width: 80px;">บันทึก</button>
                        <button class="btn btn-sm btn-danger" type="reset" style="width: 80px;">รีเซ็ต</button>
                        <button class="btn btn-sm btn-primary" type="button" onclick="window.location='officer.php';" style="width: 80px;">ย้อนกลับ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include("include/script.php");  ?>
<script type="text/javascript">
                function triggerFile(){
                    console.log()
                    $('#image').trigger("click");
                    return false;
                }

                function readURL(input) {
                if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                }
                }
                $("#image").change(function() {
                readURL(this);
                });
</script>

</body>
</html>