<!DOCTYPE html>
<?php session_start(); ?>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">

<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- <script src="assets/js/jquery-latest.min.js"></script> -->
    <?php include("include/head.php");  ?>
    <?php include("include/top-nav.php");  ?>
</header>


<body style="font-family: Sarabun, sans-serif;border-style: none;">


    <form class="form-horizontal text-nowrap" name="register-form" action="saveuser---page.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
        <div class="container">
            <div class="card shadow mb-12">
                <div class="card-header py-12">
                    <div class="row">
                        <div class="col-4">
                            <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">ลงทะเบียนใช้งาน
                            </p>
                        </div>
                        <div class="col" style="text-align: right;"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row profile-row">
                        <div class="col-mb-4 relative">
                            <div class="avatar">
                                <!--     <div class="row">
                        <div class="col d-lg-flex justify-content-lg-center align-items-lg-center mb-2">
                           <div class="mb-2">
                                <img src="upload/img/pic.png" id ="preview" class="d-lg-flex justify-content-lg-center align-items-lg-center" style="height: 330px" />
                            </div> 
                        </div>
                    </div>
                <div class="row">
                        <div class="col d-lg-flex justify-content-lg-center align-items-lg-center">
                            <input type="file" class="form-control form-control-sm" name= "user_img" id ="image" accept="image/png, image/jpg, image/jpeg"  style="display: none;">
                            <button id="" class="btn btn-sm btn-secondary" onclick="return triggerFile();">เลือกรูป</button>
                        </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row-mb-12">
                        <div class="row">
                            <div class="mb-3 col-2">
                                <label for="exampleFormControlInput1" class="form-label">ยศ</label>
                                <select class="form-select" NAME="user_rank" aria-label="Default select example">
                                    <option value="none">ระบุยศ</option>
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

                            <div class="col-5 mb-4">
                                <label for="exampleFormControlInput1" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" NAME="user_name" id="exampleFormControlInput1" value="" placeholder="">
                            </div>

                            <div class="col-5 mb-4">
                                <label for="exampleFormControlInput1" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" NAME="user_lastname" id="exampleFormControlInput1" value="" placeholder="">
                            </div>

                        </div>
                        <div class="row">

                            <div class="mb-4 col-6">
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
                                    <OPTION VALUE="ขส.ทอ."> กรมขนส่งทหารอากาศ </OPTION>
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
                            <div class="col-2 mb-2">
                                <label for="exampleFormControlInput1" class="form-label">เบอร์โทรติดต่อ (5 ตัว)</label>
                                <input type="text" class="form-control" NAME="phone" id="exampleFormControlInput1" placeholder="" maxlength="5" size="5" inputmode="numeric" value="" oninput="this.value = this.value.replace(/\D+/g, '')">
                            </div>

                            <div class="col-3 mb-2">
                                <label for="exampleFormControlInput1" class="form-label">สถานะ</label>
                                <select class="form-select" NAME="status" aria-label="Default select example">
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
                            <div class="col-4 mb-4">
                                <label for="exampleFormControlInput1" class="form-label">ชื่อผู้ใช้ (username)</label>
                                <input type="text" class="form-control" NAME="user_username" value="" id="user_username" placeholder="" onkeyup="validUsername(this.value)" onfocusout="hideDescript(this.id)" onmousedown="showDescript(this.id)">
                            </div>
                            <div class="col-4 mb-4">
                                <p></p>
                                <ul id="username-des" name="username-des" style="visibility:hidden;">
                                    <li>ความยาวอย่างน้อย 6-29 ตัวอักษร</li>
                                    <li>สามารถใช้ตัวอักษร a-z, A-Z, 0-9, และ (-), (_), (.)</li>
                                    <!-- <li>Milk</li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-4">
                                <label for="exampleFormControlInput1" style="display: block;" class="form-label">รหัสผ่าน (password)</label>
                                <input type="Password" style="display: inline-block;" class="form-control" NAME="user_password" value="" id="user_password" placeholder="" onkeyup="validPassword(this.value)" onfocusout="hideDescript(this.id)" onmousedown="showDescript(this.id)">
                                <i class="fa fa-eye" name="togglePassword" id="togglePassword" style="display:inline-block; cursor:pointer; margin-left:-30px" aria-hidden="true"></i>
                            </div>

                            <div class="col-4 mb-4">
                                <p></p>
                                <ul id="password-des" name="password-des" style="visibility:hidden;margin: left -50px;">
                                    <li>ความยาวอย่างน้อย 6-29 ตัวอักษร</li>
                                    <li>สามารถใช้ตัวอักษร a-z, A-Z, 0-9</li>
                                    <!-- <li>Milk</li> -->
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center;">
                        <button class="btn btn-sm btn-success" type="submit" style="width: 80px;">บันทึก</button>
                        <button class="btn btn-sm btn-danger" type="reset" style="width: 80px;">รีเซ็ต</button>
                        <button class="btn btn-sm btn-primary" type="button" onclick="window.location='index.php';" style="width: 80px;">ย้อนกลับ</button>
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
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#user_password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            document.getElementById("togglePassword").classList.toggle("fa-eye-slash");
        });

        function showDescript(name) {
            // console.log(name);
            switch (name) {
                case 'user_username':
                    document.getElementById("username-des").style.visibility = "visible";
                    break;
                case 'user_password':
                    document.getElementById("password-des").style.visibility = "visible";

                    break;

            }

        }

        function hideDescript(name) {
            // console.log(name);
            switch (name) {
                case 'user_username':
                    document.getElementById("username-des").style.visibility = "hidden";
                    break;
                case 'user_password':
                    document.getElementById("password-des").style.visibility = "hidden";
                    break;

            }

        }
        //check ตั้ง username และ password ตามเงื่อนไข
        function validUsername(input) {
            let regex_username = /^[A-Za-z0-9][A-Za-z0-9_.\-]{5,29}$/;
            if (regex_username.test(input)) {
                document.getElementById('user_username').style.borderColor = "green";;
            } else {
                document.getElementById('user_username').style.borderColor = "red";
            }
        }

        function validPassword(input) {
            let regex_password = /^[A-Za-z0-9][A-Za-z0-9]{5,29}$/;
            console.log(input)
            if (regex_password.test(input)) {
                document.getElementById('user_password').style.borderColor = "green";

            } else {
                document.getElementById('user_password').style.borderColor = "red";

            }
        }

        function validateForm() {
            let rank = document.forms["register-form"]["user_rank"].value;
            let name = document.forms["register-form"]["user_name"].value;
            let lastname = document.forms["register-form"]["user_lastname"].value;
            let email = document.forms["register-form"]["user_email"].value;
            let belong = document.forms["register-form"]["user_belong"].value;
            let phone = document.forms["register-form"]["phone"].value;
            let status = document.forms["register-form"]["status"].value;
            let username = document.forms["register-form"]["user_username"].value;
            let password = document.forms["register-form"]["user_password"].value;
            let count = 0;
            const validvalue = [];
            if (rank == "none") {
                validvalue.push("ระบุยศ");
                count = count + 1;

            }
            if (name == "") {
                validvalue.push("ระบุชื่อ");
                count = count + 1;

            }
            if (lastname == "") {
                validvalue.push("ระบุนามสกุล");
                count = count + 1;

            }
            if (email == "") {
                validvalue.push("ระบุอีเมล ทอ.");
                count = count + 1;
            }
            if (belong == "none") {
                validvalue.push("ระบุสังกัด");

                count = count + 1;

            }
            if (phone == "") {
                validvalue.push("ระบุเบอร์ติดต่อ");
                count = count + 1;

            }
            if (status == "none") {
                validvalue.push("ระบุสิทธิ์การใช้งาน");
                count = count + 1;

            }
            if (username == "") {
                validvalue.push("ระบุ Username");

                count = count + 1;

            }
            if (password == "") {
                validvalue.push("ระบุ Password");
                count = count + 1;

            }
            //check กรอกข้อมูลครบถ้วน
            if (count > 0) {
                alert("โปรดระบุข้อมูลให้ครบถ้วน\n" + validvalue.toString());
                return false;
            }
            //check username ซ่ำกับในระบบหรือไม่

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