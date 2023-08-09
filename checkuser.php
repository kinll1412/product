<?php
include("connection.php");

session_start();
if (isset($_POST['username'])) {
  //connection
  //รับค่า user & password
  $username = $_POST['username'];
  $password = $_POST['password'];
  //query 
  $sql = "SELECT * FROM user Where user_username='" . $username . "' and user_password='" . $password . "' ";

  $result = mysqli_query($connection, $sql);

  if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_array($result);

    $_SESSION["id"] = $row["user_id"];
    $_SESSION["name"] = $row["user_rank"] . $row["user_name"] . '  ' . $row["user_lastname"];
    $_SESSION["status"] = $row["status"];
    $_SESSION['belong'] = $row['user_belong'];

    if ($_SESSION["status"] == "admin") { //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

      Header("Location: admin.php");
    }
    if ($_SESSION["status"] == "officer") { //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

      Header("Location: officer.php");
    }
    if ($_SESSION["status"] == "user") { //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

      Header("Location: user.php");
    }
  } else {
    echo "<script>";
    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
  }
} else {

if(isset($_SESSION["name"]) && isset($_SESSION["status"])){
  $status = $_SESSION["status"];
  switch($status){
    case"user":
      Header("Location: user.php");
      break;
    case"officer":
      Header("Location: officer.php");

      break;
    case"admin":
      Header("Location: admin.php");
      break;
  }

}else{
  Header("Location: index.php"); //user & password incorrect back to login again

}

}
?>
