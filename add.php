<!DOCTYPE html>
<?php session_start();?>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>


<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <header>
        <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top sb-topnav" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">
        <img src="upload/rtaf.png"style="display:scroll;left:px; position:fixed; top:-15px;width: 6%;position: fixed;">
        

<div style="display:scroll;left:100px;position:fixed;top:25px;color:#FFFFFF;font-size: 22px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</div>
                <!--เมนู-->

                <ul class="navbar-nav flex-nowrap ms-auto">
                    <li class="nav-item d-xxl-flex justify-content-xxl-center align-items-xxl-center dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="index.php">
                            <!-- กลุ่มอักษร start -->
                            <div class="sidebar-brand-text mx-1" style="text-align: right;">
                             <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["name"];?></span>
                            <ul class="navbar-nav" style="margin-bottom: -5px;"></ul>
                            <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["status"];?></span>
                            </div>
                             <!-- กลุ่มอักษร end -->
                    </a> 

                  <!--      <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                            <a class="dropdown-item" href="logout.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;ออกจากระบบ</a>
                        </div>  -->
                    </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

 <form class="form-horizontal text-nowrap" action="save.php" method="post" enctype= "multipart/form-data">
    <div class="container">
        <div class="card shadow mb-4">
   <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">เพิ่มข้อมูลบัญชีมาตรฐานครุภัณฑ์</p>
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
                                <img src="upload/img/pic.png" id ="preview" class="d-lg-flex justify-content-lg-center align-items-lg-center" style="height: 330px" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-lg-flex justify-content-lg-center align-items-lg-center">
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
                            <input type="text" name="product_id" class="form-control form-control-sm" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group mb-3"><label class="form-label">ชื่อรายการครุภัณฑ์</label>
                            <input type="text" name="product_name" class="form-control form-control-sm" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group mb-3"><label class="form-label">ราคา</label>
                            <input type="text" name="product_price" class="form-control form-control-sm" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group mb-3"><label class="form-label">หน่วยนับ</label>
                            <input type="text" name="product_unit" class="form-control form-control-sm" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group mb-3"><label class="form-label">รายละเอียด</label>
                            <input type="file" name="product_pdf" accept=".pdf" class="form-control form-control-sm" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="row">
                    <div class="col" style="text-align: center;">
                        <input type="hidden" name="product_date" value="<?php echo date("Y-m-d"); ?>">
                        <input type="hidden" name="product_time" value="<?php echo date("H:i:s"); ?>">
                        <button class="btn btn-sm btn-success" type="submit" style="width: 80px;">บันทึก</button>
                        <button class="btn btn-sm btn-danger" type="reset" style="width: 80px;">รีเซ็ต</button>
                        <button class="btn btn-sm btn-primary" type="button" onclick="window.location='admin.php';" style="width: 80px;">ย้อนกลับ</button>
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