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
            // exit();
            
            $user_rank        = $_POST['user_rank'];
            $user_name        = $_POST['user_name'];
            $user_lastname    = $_POST['user_lastname'];
            $user_email       = $_POST['user_email'];
            $user_belong      = $_POST['user_belong'];
            $status           = $_POST['status'];
            $user_username    = $_POST['user_username'];
            $user_password    = $_POST['user_password'];
            $phone            = $_POST['phone'];
           

// อัพรูป-----------------------------------------------------------------------
if(isset($_FILES['user_img']['name']) && !empty($_FILES['user_img']['name'])){
    $extension = array("jpge","jpg","png");
    $target = 'upload/user/';
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
    $alert .='window.location.href = "importuser.php";';
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
    $alert .='window.location.href = "importuser.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    }
    }
    }else{
    //echo 'ประเภทไฟล์ไม่ถูกต้อง';
    $alert ='<script type="text/javascript">';
    $alert .='alert("img ประเภทไฟล์ไม่ถูกต้อง");';
    $alert .='window.location.href = "importuser.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    }
    }else{
    $filename_img = '';
    }
    
    
   


  $sql = "INSERT INTO user (user_rank,user_name,user_lastname,user_email,user_belong,status,user_img,user_username,user_password,user_phone) 
                    VALUES ('$user_rank','$user_name','$user_lastname','$user_email ','$user_belong','$status','$filename_img','$user_username','$user_password','$phone')";


    $query = mysqli_query($connection,$sql) or die ("Error in query: $sql " . $connection($sql));
    if($query) {
        //echo 'บันทึกข้อมูลสำเร็จ';
        Header("Location: viwe_user.php");
    }
    else
    {
        //echo 'บันทึกข้อมูล ไม่สำเร็จ!';
        Header("Location: importuser.php");
    }
    mysqli_close($connection);
?>