<!DOCTYPE html>
<?php session_start(); ?>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>


<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <header>
        <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top sb-topnav" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">
            <img src="upload/rtaf.png" style="display:scroll;left:px; position:fixed; top:-15px;width: 6%;position: fixed;">

            <div style="display:scroll;left:100px;position:fixed;top:25px;color:#FFFFFF;font-size: 22px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</div>
            <!--เมนู-->

            <ul class="navbar-nav flex-nowrap ms-auto">
                <li class="nav-item d-xxl-flex justify-content-xxl-center align-items-xxl-center dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="admin.php">
                            <!-- กลุ่มอักษร start -->
                            <div class="sidebar-brand-text mx-1" style="text-align: right;">
                                <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["name"]; ?></span>
                                <ul class="navbar-nav" style="margin-bottom: -5px;"></ul>
                                <span class="d-none d-lg-inline me-2" style="color: var(--bs-white);font-family: Sarabun, sans-serif;font-size: 14px;"><?php echo $_SESSION["status"]; ?></span>
                            </div>
                            <!-- กลุ่มอักษร end -->
                        </a>

                        <!--     <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                             <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;ออกจากระบบ</a>
                        </div> -->
                    </div>
                </li>
            </ul>
            </div>
        </nav>
    </header>


    <form class="form-horizontal text-nowrap" action="saveuser.php" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">เพิ่มข้อมูลผู้ใช้งานระบบ</p>
                        </div>
                        <div class="col" style="text-align: right;">


                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row profile-row">
                        <div class="col-md-12">
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
                                        <OPTION VALUE="พ.อ.อ"> พ.อ.อ. </OPTION>
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
                                    <input type="text" class="form-control" NAME="user_name" id="exampleFormControlInput1" placeholder="">
                                </div>

                                <div class="col-5 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" NAME="user_lastname" id="exampleFormControlInput1" placeholder="">
                                </div>
                            </div>
                            <div class="row">

                                <div class="mb-5 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">สังกัด</label>
                                    <select class="form-select" NAME="user_belong" aria-label="Default select example">

                                        <option disabled="disabled" style="background-color:gold;text-align:center;" value="none">เลือกสังกัด</option>

                                        <OPTION disabled="disabled" style="background-color:powderblue;text-align:center;" VALUE="ศูนย์อำนวยการเครื่องบินพระราชพาหนะ">กองทัพอากาศ (กองบัญชาการ) </OPTION>
                                        <OPTION VALUE="ศบพ.">
                                            ศูนย์อำนวยการเครื่องบินพระราชพาหนะ </OPTION>
                                        <OPTION VALUE="ศฮพ.">
                                            ศูนย์อำนวยการเฮลิคอปเตอร์พระราชพาหนะ </OPTION>
                                        <OPTION VALUE="ศกอ.">ศูนย์การสงครามทางอากาศ</OPTION>
                                        <OPTION VALUE="สพร.ทอ."> สำนักงานพัฒนาระบบราชการกองทัพอากาศ </OPTION>
                                        <OPTION VALUE="สยล.ทอ."> สำนักงานยุทธศาสตร์และหลักนิยมกองทัพอากาศ(เพื่อพลาง)
                                        </OPTION>
                                        <OPTION VALUE="สง.ปรมน.ทอ.">
                                            สำนักงานประสานภารกิจด้านความมั่นคงกับกองอำนวยการรักษาความมั่นคงภายในราชอาณาจักรกองทัพอากาศ
                                        </OPTION>


                                        <OPTION style="background-color:powderblue;text-align:center;" VALUE="ส่วนบัญชาการ">
                                            ส่วนบัญชาการ </OPTION>
                                        <OPTION VALUE="ลก.ทอ."> สำนักงานเลขานุการกองทัพอากาศ </OPTION>
                                        <OPTION VALUE="สบ.ทอ.">กรมสารบรรณทหารอากาศ</OPTION>
                                        <OPTION VALUE="กพ.ทอ."> กรมกำลังพลทหารอากาศ </OPTION>
                                        <OPTION VALUE="ขว.ทอ."> กรมข่าวหารอากาศ </OPTION>
                                        <OPTION VALUE="ยก.ทอ."> กรมยุทธการทหาอากาศ</OPTION>
                                        <OPTION VALUE="กบ.ทอ."> กรมส่งกำลังบำรุงทหารอากาศ</OPTION>
                                        <OPTION VALUE="กร.ทอ."> กรมกิจการพลเรือนทหารอากาศ </OPTION>
                                        <OPTION VALUE="ทสส.ทอ.">
                                            กรมเทคโนโลยีสารสนเทศและการสื่อสารทหารอากาศ </OPTION>
                                        <OPTION VALUE="สปช.ทอ."> สำนักงานปลัดบัญชีทหารอากาศ </OPTION>
                                        <OPTION VALUE="กง.ทอ."> กรมการเงินทหารอากาศ </OPTION>
                                        <OPTION VALUE="จร.ทอ."> กรมจเรทหารอากาศ </OPTION>
                                        <OPTION VALUE="สตน.ทอ."> สำนักงานตรวจสอบภายในประเทศ </OPTION>
                                        <OPTION VALUE="สนภ.ทอ."> สำนักงานนิรภัยทหารอากาศ </OPTION>
                                        <OPTION VALUE="สบน.ทอ."> สำนักงานการบินกองทัพอากาศ </OPTION>
                                        <OPTION VALUE="สธน.ทอ."> สำนักงานพระธรรมนูญกองทัพอากาศ
                                        </OPTION>
                                        <OPTION VALUE="ศซบ.ทอ."> ศูนย์ไซเบอร์กองทัพอากาศ </OPTION>

                                        <OPTION style="background-color:powderblue;text-align:center;" VALUE="ส่วนกำลังรบ">
                                            ส่วนกำลังรบ </OPTION>
                                        <OPTION VALUE="คปอ."> กรมควบคุมการปฏิบัติทางอากาศ </OPTION>
                                        <OPTION VALUE="อย."> หน่วยบัญชาการอากาศโยธิน </OPTION>
                                        <OPTION VALUE="ศปอว.ทอ.">
                                            ศูนย์ปฏิบัติการทางอากาศกองทัพอากาศ </OPTION>
                                        <OPTION VALUE="รร.การบิน"> โรงเรียนการบิน </OPTION>
                                        <OPTION VALUE="บน.1"> กองบิน 1 </OPTION>
                                        <OPTION VALUE="บน.2"> กองบิน 2 </OPTION>
                                        <OPTION VALUE="บน.3"> กองบิน 3 </OPTION>
                                        <OPTION VALUE="บน.4"> กองบิน 4 </OPTION>
                                        <OPTION VALUE="บน.5"> กองบิน 5 </OPTION>
                                        <OPTION VALUE="บน.6"> กองบิน 6 </OPTION>
                                        <OPTION VALUE="บน.7"> กองบิน 7 </OPTION>
                                        <OPTION VALUE="บน.21"> กองบิน 21 </OPTION>
                                        <OPTION VALUE="บน.23"> กองบิน 23 </OPTION>
                                        <OPTION VALUE="บน.41"> กองบิน 41 </OPTION>
                                        <OPTION VALUE="บน.46"> กองบิน 46 </OPTION>
                                        <OPTION VALUE="บน.56"> กองบิน 56 </OPTION>

                                        <OPTION style="background-color:powderblue;text-align:center;" VALUE="ส่วนส่งกำลังบำรุง">ส่วนส่งกำลังบำรุง </OPTION>
                                        <OPTION VALUE="ชอ."> กรมช่างอากาศ </OPTION>
                                        <OPTION VALUE="สอ.ทอ."> กรมสื่อสารอิเล็กทรอนิกส์ทหารอากาศ
                                        </OPTION>
                                        <OPTION VALUE="พอ."> กรมแพทย์ทหารอากาศ </OPTION>
                                        <OPTION VALUE="รพ.ภูมิพลอดุลยเดช"> โรงพยาบาลภูมิพลอดุลยเดช </OPTION>
                                        <OPTION VALUE="รพ.จันทรุเบกษา"> โรงพยาบาลจันทรุเบกษา </OPTION>
                                        <OPTION VALUE="รพ.ทอ.(สีกัน)"> โรงพยาบาลทหารอากาศ (สีกัน) </OPTION>
                                        <OPTION VALUE="พธ.ทอ."> กรมพลาธิการทหารอากาศ </OPTION>
                                        <OPTION VALUE="ชย.ทอ."> กรมช่างโยธาทหารอากาศ </OPTION>
                                        <OPTION VALUE="ขส.ทอ."> กกรมขนส่งทหารอากาศ </OPTION>
                                        <OPTION VALUE="ศซว.ทอ."> ศูนย์ซอฟต์แวร์กองทัพอากาศ </OPTION>

                                        <OPTION disabled="disabled" style="background-color:powderblue;text-align:center;" VALUE="ส่วนการศึกษา">
                                            ส่วนการศึกษา </OPTION>
                                        <OPTION VALUE="ยศ.ทอ."> กรมยุทธศึกษาทหารอากาศ </OPTION>
                                        <OPTION VALUE="รร.นนก.">
                                            โรงเรียนนายเรืออากาศนวมินทกษัตริยาธิราช </OPTION>
                                        <OPTION disabled="disabled" style="background-color:powderblue;text-align:center;" VALUE="ส่วนกิจการพิเศษ">ส่วนกิจการพิเศษ </OPTION>
                                        <OPTION VALUE="ศวอ.ทอ.">
                                            ศูนย์วิจัยพัฒนาวิทยาศาสตร์เทคโนโลยีการบินและอวกาศกองทัพอากาศ </OPTION>
                                        <OPTION VALUE="สก.ทอ."> กรมสวัสดิการทหารอากาศ </OPTION>
                                        <OPTION VALUE="สน.ผบ.ดม.">
                                            ส่วนสำนักงานผู้บังคับทหารอากาศดอนเมือง </OPTION>
                                        <OPTION VALUE="สวบ.ทอ."> สถาบันเวชศาสตร์การบินกองทัพอากาศ
                                        </OPTION>
                                    </select>
                                </div>

                                <div class="col-2 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">เบอร์โทรติดต่อ (5 ตัว)</label>
                                    <input type="text" class="form-control" NAME="phone" id="exampleFormControlInput1" placeholder="">
                                </div>

                                <div class="col-4 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">สถานะ</label>
                                    <select class="form-select" NAME="status" aria-label="Default select example">
                                        <OPTION VALUE="admin">ผู้ดูแลระบบ</OPTION>
                                        <OPTION VALUE="officer">เจ้าหน้าที่ ผจง.กพพ.พธ.ทอ.</OPTION>
                                        <OPTION VALUE="user">ผู้ใช้งานระบบ</OPTION>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-4 mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="text" class="form-control" NAME="user_email" value="" id="user_email" placeholder="ไม่ต้องเติม @rtaf.mi.th">
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-6 mb-6">
                                    <label for="exampleFormControlInput1" class="form-label">ชื่อผู้ใช้</label>
                                    <input type="text" class="form-control" NAME="user_username" id="exampleFormControlInput1" placeholder="">
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">รหัสผ่าน</label>
                                    <input type="Password" class="form-control" NAME="user_password" id="exampleFormControlInput1" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align: center;">
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
        function triggerFile() {
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