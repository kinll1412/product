<?php
include("connection.php");

            // echo '<pre>';
            // print_r ($_POST);
            // echo "<br>";
            // print_r ($_FILES);
            // echo "<br>";
            // var_dump($_POST);
            // echo '</pre>';
            // echo "<br>";
            //exit();



    $user_id          = $_POST['user_id'];
    $user_rank       = $_POST['user_rank'];
    $user_name      = $_POST['user_name'];
    $user_lastname       = $_POST['user_lastname'];
    $user_belong       = $_POST['user_belong'];
    $status       = $_POST['status'];
    $user_img    =  $_POST['user_img'];
    $user_username    =  $_POST['user_username'];
    $user_password    =  $_POST['user_password'];

// อัพรูป-----------------------------------------------------------------------
    if(isset($_FILES['user_img']['name']) && !empty($_FILES['user_img']['name'])){
    $extension = array("jpge","jpg","png");
    $target = 'upload/img/';
    $filename_img = $_FILES['user_img']['name'];
    $filetmp = $_FILES['user_img']['tmp_name'];
    $ext = pathinfo($filename_img,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)){
    if(!file_exists($target.$filename_img)) {
    if(move_uploaded_file($filetmp,$target.$filename_img)){
    $filename_img=$filename_img;
    }else{
    //echo 'เพิ่มไฟล์เข้า folder ไม่สำเร็จ 1';
    $alert ='<script type="text/javascript">';
    $alert .='alert("img เพิ่มไฟล์เข้า folder ไม่สำเร็จ 1");';
    $alert .='window.location.href = "edit_user.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    }
    }else{
    $newfilename_img= time().$filename_img;
    if(move_uploaded_file($filetmp,$target.$newfilename_img)){
    $filename_img=$newfilename_img;
    }else{
    //echo 'เพิ่มไฟล์เข้า folder ไม่สำเร็จ 2';
    $alert ='<script type="text/javascript">';
    $alert .='alert("img เพิ่มไฟล์เข้า folder ไม่สำเร็จ 2");';
    $alert .='window.location.href = "edit_user.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    }
    }
    }else{
    //echo 'ประเภทไฟล์ไม่ถูกต้อง';
    $alert ='<script type="text/javascript">';
    $alert .='alert("img ประเภทไฟล์ไม่ถูกต้อง");';
    $alert .='window.location.href = "edit_user.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    }
    }else{
    $filename_img = $old_user_img;
    }
    //echo $filename_img;
    //exit();
    // -------------------------------------------------------------

    // อัพ pdf-----------------------------------------------------------------------
    if(isset($_FILES['product_pdf']['name']) && !empty($_FILES['product_pdf']['name'])){
    $extension = array("pdf");
    $target = 'upload/pdf/';
    $filename_pdf = $_FILES['product_pdf']['name'];
    $filetmp = $_FILES['product_pdf']['tmp_name'];
    $ext = pathinfo($filename_pdf,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)){
    if(!file_exists($target.$filename_pdf)) {
    if(move_uploaded_file($filetmp,$target.$filename_pdf)){
    $filename_pdf=$filename_pdf;
    }else{ 
    //echo 'เพิ่มไฟล์เข้า folder ไม่สำเร็จ 1';
    $alert ='<script type="text/javascript">';
    $alert .='alert("pdf เพิ่มไฟล์เข้า folder ไม่สำเร็จ 1");';
    $alert .='window.location.href = "edit_user.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    }
    }else{
    $newfilename_pdf= time().$filename_pdf;
    if(move_uploaded_file($filetmp,$target.$newfilename_pdf)){
    $filename_pdf=$newfilename_pdf;
    }else{
    //echo 'เพิ่มไฟล์เข้า folder ไม่สำเร็จ 2';
    $alert ='<script type="text/javascript">';
    $alert .='alert("pdf เพิ่มไฟล์เข้า folder ไม่สำเร็จ 2");';
    $alert .='window.location.href = "edit_user.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    }
    }
    }else{
    //echo 'ประเภทไฟล์ไม่ถูกต้อง';
    $alert ='<script type="text/javascript">';
    $alert .='alert("pdf ประเภทไฟล์ไม่ถูกต้อง");';
    $alert .='window.location.href = "edit_user.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    }
    }else{
    $filename_pdf = $old_product_pdf;
    }
    //echo $filename_pdf;
    //exit();
    // -------------------------------------------------------------



$sql = "UPDATE user SET user_rank='$user_rank',user_name='$user_name',user_lastname='$user_lastname',user_belong='$user_belong',status='$status,user_img='$user_img=',user_username='$user_username,user_password='$user_password',phone='$phone'WHERE user_id ='$user_id '";




    $query = mysqli_query($connection,$sql) or die ("Error in query: $sql " . mysqli_error($sql));
    if($query) {
        //echo 'บันทึกข้อมูลสำเร็จ';
        Header("Location: viwe_user.php");
    }
    else
    {
        //echo 'บันทึกข้อมูล ไม่สำเร็จ!';
        Header("Location: edit_user.php");
    }
    mysqli_close($connection);
?>