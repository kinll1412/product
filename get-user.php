<?php
include("connection.php");

$user_firstname = $_POST['firstname'];
$user_lastname = $_POST['lastname'];
$user_email = $_POST['email'];
#$sql1 = "SELECT * FROM `user` WHERE user_email = '$user_email';";
$sql1 = "SELECT * FROM `user` WHERE user_name = '$user_firstname'AND user_lastname = '$user_lastname' AND (user_email = '$user_email' or user_email = 'code#1');";
$no=0;
$query1 = mysqli_query($connection, $sql1) or die ("Error in query: $sql1 " . $connection($sql1));
foreach ($query1 as $data) {
        echo $data['user_username'];
        echo ",";
        echo $data['user_password'];
}
?>