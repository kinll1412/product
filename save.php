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

    $product_id         = $_POST['product_id'];
    $product_name       = $_POST['product_name'];
    $product_price      = $_POST['product_price'];
    $product_unit       = $_POST['product_unit'];
    $product_date       = $_POST['product_date'];
    $product_time       = $_POST['product_time'];

// อัพรูป-----------------------------------------------------------------------
    if(isset($_FILES['product_img']['name']) && !empty($_FILES['product_img']['name'])){
    $extension = array("jpge","jpg","png");
    $target = 'upload/img/';
    $filename_img = $_FILES['product_img']['name'];
    $filetmp = $_FILES['product_img']['tmp_name'];
    $ext = pathinfo($filename_img,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)){
    if(!file_exists($target.$filename_img)) {
    if(move_uploaded_file($filetmp,$target.$filename_img)){
    $filename_img=$filename_img;
    }else{
    //echo 'เพิ่มไฟล์เข้า folder ไม่สำเร็จ 1';
    $alert ='<script type="text/javascript">';
    $alert .='alert("img เพิ่มไฟล์เข้า folder ไม่สำเร็จ 1");';
    $alert .='window.location.href = "add.php";';
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
    $alert .='window.location.href = "add.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    }
    }
    }else{
    //echo 'ประเภทไฟล์ไม่ถูกต้อง';
    $alert ='<script type="text/javascript">';
    $alert .='alert("img ประเภทไฟล์ไม่ถูกต้อง");';
    $alert .='window.location.href = "add.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    }
    }else{
    $filename_img = '';
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
    $alert .='window.location.href = "add.php";';
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
    $alert .='window.location.href = "add.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    }
    }
    }else{
    //echo 'ประเภทไฟล์ไม่ถูกต้อง';
    $alert ='<script type="text/javascript">';
    $alert .='alert("pdf ประเภทไฟล์ไม่ถูกต้อง");';
    $alert .='window.location.href = "add.php";';
    $alert .='</script>';
    echo $alert;
    exit();
    }
    }else{
    $filename_pdf = '';
    }
    //echo $filename_pdf;
    //exit();
    // -------------------------------------------------------------



  $sql = "INSERT INTO stock (product_id,product_name,product_price,product_unit,product_img,product_pdf,product_date,product_time)
          VALUES ('$product_id','$product_name','$product_price','$product_unit','$filename_img','$filename_pdf','$product_date','$product_time')";


    $query = mysqli_query($connection,$sql) or die ("Error in query: $sql " . mysqli_error($sql));
    if($query) {
        //echo 'บันทึกข้อมูลสำเร็จ';
        Header("Location: admin.php");
    }
    else
    {
        //echo 'บันทึกข้อมูล ไม่สำเร็จ!';
        Header("Location: add.php");
    }
    mysqli_close($connection);
?>