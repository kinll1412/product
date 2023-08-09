<!DOCTYPE html>
<?php session_start();?>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<header>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>
<?php include("include/top-nav-logined.php");  ?>

</header>


<body style="font-family: Sarabun, sans-serif;border-style: none;">

 <form class="form-horizontal text-nowrap" action="officer_save.php" method="post" enctype= "multipart/form-data">
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