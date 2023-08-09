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
                <a class="navbar-brand d-xxl-flex justify-content-xxl-center align-items-xxl-center" href="admin.php" style="color: rgba(255,255,255,0.9);font-family: Sarabun, sans-serif;font-weight: bold;text-align: left;margin: 0px;padding: 0px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</a>
                
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
    $user_id  = $_GET['user_id'];
    $sql="SELECT * FROM user WHERE user_id ='$user_id'";
    $query=mysqli_query($connection,$sql);
    $data = mysqli_fetch_assoc($query);
    ?>
 <form class="form-horizontal text-nowrap" action="updateuser.php" method="post" enctype= "multipart/form-data">
    <div class="container">
        <div class="card shadow mb-4">
   <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">แก้ไขข้อมูลบัญชีมาตรฐานครุภัณฑ์</p>
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
                                <img src="upload/img/<?php if(empty($data['user_img'])){echo "pic.png";} echo $data['user_img']; ?>" id ="preview" class="d-lg-flex justify-content-lg-center align-items-lg-center" style="height: 330px" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-lg-flex justify-content-lg-center align-items-lg-center">
                            <input type="hidden" name="old_product_img" value="<?php echo $data['user_img']; ?>">
                            <input type="file" class="form-control form-control-sm" name= "user_img" id ="image" accept="image/png, image/jpg, image/jpeg"  style="display: none;">
                            <button id="" class="btn btn-sm btn-secondary" onclick="return triggerFile();">เลือกรูป</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                <div class="mb-3 col-2">
                            <label for="exampleFormControlInput1" class="form-label">ยศ</label>
                            <select class="form-select" NAME="user_rank" aria-label="Default select example">
                                   
                                    <OPTION VALUE="น.อ."> น.อ. </OPTION>
                                    <OPTION VALUE="น.ท."> น.ท. </OPTION>
                                    <OPTION VALUE="น.ต."> น.ต. </OPTION>
                                    <OPTION VALUE="ร.อ."> ร.อ. </OPTION>
                                    <OPTION VALUE="ร.ท."> ร.ท. </OPTION>
                                    <OPTION VALUE="ร.ต."> ร.ต. </OPTION>
                                    <OPTION VALUE="พ.อ.อ."> พ.อ.อ. </OPTION>
                                    <OPTION VALUE="พ.อ.ท."> พ.อ.ท. </OPTION>
                                    <OPTION VALUE="พ.อ.ต."> พ.อ.ต. </OPTION>
                                    <OPTION VALUE="จ.อ."> จ.อ. </OPTION>
                                    <OPTION VALUE="จ.ท."> จ.ท. </OPTION>
                                    <OPTION VALUE="จ.ต."> จ.ต. </OPTION>

                                    <OPTION VALUE="น.อ.หญิง"> น.อ.หญิง </OPTION>
                                    <OPTION VALUE="น.ท.หญิง"> น.ท.หญิง </OPTION>
                                    <OPTION VALUE="น.ต.หญิง"> น.ต.หญิง </OPTION>
                                    <OPTION VALUE="ร.อ.หญิง"> ร.อ.หญิง </OPTION>
                                    <OPTION VALUE="ร.ท.หญิง"> ร.ท.หญิง </OPTION>
                                    <OPTION VALUE="ร.ต.หญิง"> ร.ต.หญิง </OPTION>
                                    <OPTION VALUE="พ.อ.อ.หญิง"> พ.อ.อ.หญิง </OPTION>
                                    <OPTION VALUE="พ.อ.ท.หญิง"> พ.อ.ท.หญิง </OPTION>
                                    <OPTION VALUE="พ.อ.ต.หญิง"> พ.อ.ต.หญิง </OPTION>
                                    <OPTION VALUE="จ.อ.หญิง"> จ.อ.หญิง </OPTION>
                                    <OPTION VALUE="จ.ท.หญิง"> จ.ท.หญิง </OPTION>
                                    <OPTION VALUE="จ.ต.หญิง"> จ.ต.หญิง </OPTION>
                                    </select>
                    </div>  
                    
                    <div class="col-5 mb-3">                               
                                <label for="exampleFormControlInput1" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" NAME="user_name" value="<?=$data['user_name']?>">
                            </div> 
                                    
                            <div class="col-5 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" NAME="user_lastname" value="<?=$data['user_lastname']?>">
                            </div> 
                </div>
                <div class="row">
                        
                            <div class="col-6 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">สังกัด</label>
                                <input type="text" class="form-control" NAME="user_belong" value="<?=$data['user_belong']?>">
                            </div> 
                            <div class="col-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">สถานะ</label>
                            <select class="form-select" NAME="status" aria-label="Default select example">                                   
                                    <OPTION VALUE="admin">ผู้ดูแลระบบ</OPTION>
                                    <OPTION VALUE="officer">เจ้าหน้าที่</OPTION>
                                    <OPTION VALUE="user">ผู้ใช้งานระบบ</OPTION>
                                    </select>
                            </div> 
                </div>

                <div class="row">
                            <div class="col-6 mb-6">                               
                                <label for="exampleFormControlInput1" class="form-label">ชื่อผู้ใช้</label>
                                <input type="text" class="form-control" NAME="user_username" value="<?=$data['user_username']?>">
                            </div> 
                                    
                            <div class="col-6 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">รหัสผ่าน</label>
                                <input type="Password" class="form-control" NAME="user_password" value="<?=$data['user_password']?>">
                            </div> 
                </div>   
            </div>
        </div>
                <div class="row">
                    <div class="col" style="text-align: center;">
                        <button class="btn btn-sm btn-success" type="submit" onclick="window.location='viwe_user.php';" style="width: 80px;">บันทึก</button>
                        <button class="btn btn-sm btn-danger" type="reset" style="width: 80px;">รีเซ็ต</button>
                        <button class="btn btn-sm btn-primary" type="button" onclick="window.location='viwe_user.php';" style="width: 80px;">ย้อนกลับ</button>
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