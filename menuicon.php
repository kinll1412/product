<!DOCTYPE html>
<?php include("connection.php");  ?>
<html lang="th" style="font-family: Sarabun, sans-serif;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="assets/js/jquery-latest.min.js"></script> -->
<?php include("include/head.php");  ?>
<style>
.pointer {cursor: pointer;}
</style>


<body style="font-family: Sarabun, sans-serif;border-style: none;">
    <header>
        <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top" style="background-color: #000033;transform: translate(0px);opacity: 1;margin: 0px;margin-bottom: 0px;border-style: none;height: 82px;">
            <img src="upload/rtaf.png"style="width: 80px;" >

            <div class="container-fluid">
                <a class="navbar-brand d-xxl-flex justify-content-xxl-center align-items-xxl-center" href="index.php" style="color: rgba(255,255,255,0.9);font-family: Sarabun, sans-serif;font-weight: bold;text-align: left;margin: 0px;padding: 0px;">บัญชีมาตรฐานครุภัณฑ์ สายพลาธิการ</a>
                
                <!--เมนู-->
                
                <ul class="navbar-nav flex-nowrap ms-auto">
                    <li class="nav-item d-xxl-flex justify-content-xxl-center align-items-xxl-center dropdown no-arrow">
                        <span class="pointer" style="color: rgb(255,255,255);font-family: Sarabun, sans-serif;font-weight: bold;" data-bs-toggle="modal" data-bs-target="#modallogin">เข้าสู่ระบบ</span>
                    </li>
                </ul>
            </div>
        </nav>
    </header>



<!-- Modal -->
<div class="modal fade" id="modallogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span class="fas fa-fingerprint"></span>  เข้าสู่ระบบ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal text-nowrap" action="checkuser.php" method="post" id="insert" enctype= "multipart/form-data">
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control form-control-sm" name="username" />
                    </div>
                    <div class="form-group mb-3"><label class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control form-control-sm" name="password" />
                </div>
                
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <center>
            <button class="btn btn-sm btn-success" type="submit" name="add"  style="width: 80px;">เข้าสู่ระบบ</button>
            <button class="btn btn-danger btn-sm" type="button" onclick="$('#modallogin').modal('hide');" style="width: 80px;">ยกเลิก</button>
            </center>
        </div>
    </div>
</form>
</div>
</div>
</div>

<!-- Modal -->

    <?php

$sql="SELECT*FROM stock ORDER BY product_id ASC";
$query=mysqli_query($connection,$sql);
?>


    <div class="container">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <p class="text-dark m-0 fw-bold" style="font-weight: bold;font-size: 20px;">บัญชีมาตรฐานครุภัณฑ์</p>
                        </div>
                    </div>
                </div>

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="icon-bar">
  <a class="active" href="index.php"><i class="fa fa-search" style='font-size:200px'></i></a>
  <a href="adproduct.php"><i class="fas fa-file-import" style='font-size:200px'></i></a>
  <a href="aduser.php"><i class="fas fa-user-plus" style='font-size:200px'></i></a>
  <a href="viwe_user.php"><i class="fas fa-users" style='font-size:200px'></i></a>
  <a href="#"><i class="fas fa-clock" style='font-size:200px'></i></a>
</div>

</body>
</html>