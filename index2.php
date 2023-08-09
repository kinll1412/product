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


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
      <div class="col-lg-3">
        <div class="" style="background-color: #4E6C9C;">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="far fa-clock text-info fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"></p>
                <p class="announcement-text"><font color="#ECE469"> รออนุมัติ</font></p>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  ดู
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class=""style="background-color: #4E6C9C;">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-check-square-o  fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"></p>
                <p class="announcement-text"><font color="#ECE469"> อนุมัติ</font></p>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  ดู
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="far fa-times-circle fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"></p>
                <p class="announcement-text">ไม่อนุมัติ</p>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  ดู
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel panel-success">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-comments fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"></p>
                <p class="announcement-text"> ติดต่อ
                </p>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  ดู
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div><!-- /.row -->
    </div>