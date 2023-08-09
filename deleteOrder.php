<?php
session_start();
include("connection.php");
$filename = "log\logdelete.txt";


if (isset($_GET['order-id']) && !empty($_GET['order-id'])) {
    $order_id = $_GET['order-id'];
    //echo $_GET['order-id'];
    if (file_exists($filename)) {
        $message = "The file $filename exists";
        $myfile = fopen("log\logdelete.txt", "a") or die("Unable to delete data!");
        if ($myfile) {
            // Everything's fine
        } else {
            // Error happened
        }
        $sql = "SELECT * FROM product_order INNER JOIN order_detail ON product_order.order_id = order_detail.order_id WHERE product_order.order_id=$order_id;";
        $query = mysqli_query($connection, $sql);
        $txt_date = date("Y-m-d")." \n";
        fwrite($myfile,$txt_date);
        foreach ($query as $data) {
            $data_txt = $data['order_id'] ."\t".$data['order_name']."\t".$data['order_owner']."\t".$data['session_id']."\t".$data['detail_id']."\t".$data['product_id']."\t".$data['detail_qty']."\n";
            fwrite($myfile, $data_txt);

        }
        $txt = " \n";
        fwrite($myfile, $txt);
        fclose($myfile);
    } else {
        $alert = '<script type="text/javascript">';
        $alert .='alert("ลบข้อมูลไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");';
        $alert .= 'window.location.href = "user_order_status.php";';
        $alert .= '</script>';
        echo $alert;
        exit();
    }
    $sql_delete = "DELETE product_order , order_detail FROM product_order INNER JOIN order_detail ON product_order.order_id = order_detail.order_id WHERE product_order.order_id=$order_id;";
    if (mysqli_query($connection, $sql_delete)) {
        //echo 'อัพเดย์ข้อมูลสำเร็จ';
        $alert = '<script type="text/javascript">';
        //$alert .='alert("ลบข้อมูลสำเร็จ");';
        $alert .= 'window.location.href = "user_order_status.php";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql_delete . "<br>" . $connection->error;
    }
}
