<!DOCTYPE html>
<?php include("include/head.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
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
      width: 100vw;
      height: 100vh;
      background: #ecf0f3;
      display: flex;
      align-items: center;
      text-align: center;
      justify-content: center;
      place-items: center;
      overflow: hidden;
      font-family: sarabun;
    }
    .container {
      position: relative;
      width: 500px;
      height: 560px;
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

    .inputs {
      text-align: left;
      margin-top: 30px;
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
      background:#90EE90;
      margin-top: 10px;

    }
    .cancel-btn {
      background:#F08080;
      margin-top: 10px;

    }

  </style>
</head>

<body>
  <div class="container">
    <div id="img_container"><img src="upload/rtaf.png" /></div>
    <form class="form-horizontal text-nowrap" action="checkuser.php" method="post" id="insert" enctype="multipart/form-data">
      <div class="brand-title">บัญชีมาตรฐานครุภัณฑ์</div>
      <div class="inputs">

        <label for="username"><strong>Username</strong></label>
        <input type="text" name="username" placeholder="ชื่อผู้ใช้" id="username" />

        <label for="password"><strong>Password</strong></label>
        <input type="password" name="password" placeholder="รหัสผ่าน" id="password" />
        <button type="submit">เข้าสู่ระบบ</button>
      </div>
    </form>
    <button class="forgetpassword-btn" style="background:#F8C471"onclick="document.location='forget-user.php'">ลืมรหัสผ่าน</button>
    <button class="register-btn" onclick="document.location='importuser---user.php'">ลงทะเบียนเข้าใช้งาน</button>
    <button class="cancel-btn" onclick="document.location='index.php'">ยกเลิก</button>

  </div>
</body>

</html>