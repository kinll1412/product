<!DOCTYPE html>
<html lang="en">
<?php include("include/head.php");  ?>

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>บัญชีมาตรฐานครุภัณฑ์</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');

        input {
            caret-color: red;
        }

        body {
            margin: 0;
        
            background: #ecf0f3;
            align-items: center;
            text-align: center;
            justify-content: center;
            place-items: center;
            overflow: scroll;
            font-family: sarabun;
        }

        .container {
            position: relative;
            margin-top: 30px;
            width: 500px;
            height: 750px;
            border-radius: 20px;
            padding: 5px;
            box-sizing: border-box;
            background: #ecf0f3;
            box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
        }

        #img_container {
            height: 100px;
            width: 100px;
            background: url("upload/rtaf.png");
            margin: auto;
            border-radius: 50%;
            box-sizing: border-box;

        }

        #img_container img {
            height: 150px;
            margin-right: auto;
            margin-left: auto;
        }



        .brand-title {
            margin-top: 10px;
            font-weight: 1200;
            font-size: 1.8rem;
            color: #1DA1F2;
            letter-spacing: 1px;
        }
        .description {
            margin-top: 5px;
            color: red;
            text-align: left;
            font-weight: 1200;
            font-size: 1.3rem;


        }
        .inputs {
            text-align: left;
            margin-top: 10px;
        }

        label,
        input,
        button {
            display: block;
            width: 100%;
            padding: 0;
            border: none;
            outline: none;
            box-sizing: border-box;
        }

        label {
            margin-bottom: 4px;
        }

        label:nth-of-type(2) {
            margin-top: 12px;
        }

        input::placeholder {
            color: gray;
        }

        input {
            background: #ecf0f3;
            padding: 10px;
            padding-left: 20px;
            height: 50px;
            font-size: 14px;
            border-radius: 50px;
            box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
        }

        button {
            color: white;
            margin-top: 30px;
            background: #1DA1F2;
            height: 40px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 1000;
            box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
            transition: 0.5s;
        }

        button:hover {
            box-shadow: none;
        }

        #brand-link a {
            position: absolute;
            font-size: 8px;
            bottom: 4px;
            right: 4px;
            text-decoration: none;
            color: black;
            background: yellow;
            border-radius: 10px;
            padding: 2px;
        }

        h1 {
            position: absolute;
            top: 0;
            left: 0;
        }

        .register-btn {
            background: #90EE90;
            margin-top: 10px;

        }

        .cancel-btn {
            background: #F08080;
            margin-top: 10px;

        }

        .forget-btn {
            background: #28a745;
            margin-top: 10px;

        }
    </style>
</head>

<body>
    <div class="container">
        <div id="img_container"><img src="upload/rtaf.png" /></div>
        <div class="brand-title">บัญชีมาตรฐานครุภัณฑ์</div>
        <div class="description"><p>กรุณากรอกข้อมูลที่ใช้ในการลงทะเบียน</p></div>
        <div class="inputs">
            <label for="firstname"><strong>ชื่อจริง</strong></label>
            <input type="text" name="firstname" placeholder="ชื่อจริง" id="firstname" />
            <label for="lastname"><strong>นามสกุล</strong></label>
            <input type="text" name="lastname" placeholder="นามสกุล" id="lastname" />
            <label for="email"><strong>Email</strong></label>
            <input type="text" name="email" placeholder="ไม่ต้องเติม @rtaf.mi.th" id="email" />
            <button type="submit" onclick="getUser()">Submit</button>
        </div>
        <div class="row">
            <div class="col mt-4">
                <p><strong>Username : </strong><span id="username"></span></p>
                <p><strong>Password : <strong><span id="password"></span></p>
            </div>
        </div>
        <button class="forget-btn" onclick="document.location='login1.php'">กลับหน้าเข้าสู่ระบบ</button>
        <button class="cancel-btn" onclick="document.location='page1.php'">ยกเลิก</button>

    </div>
</body>
<script>
    function getUser() {
        let firstnameltxt = document.getElementById("firstname").value;
        let lastnametxt = document.getElementById("lastname").value;
        let emailtxt = document.getElementById("email").value;
        $.ajax({
            type: "POST",
            url: "get-user.php",
            data: {
                firstname:firstnameltxt,
                lastname:lastnametxt,     
                email:emailtxt     
     
            },
            success: function(data) {
                let parts = data.split(",");
                let username = parts[0];
                let password = parts[1];
                document.getElementById('username').innerText = username;
                document.getElementById('password').innerText = password;
            }
        });
    }
</script>

</html>