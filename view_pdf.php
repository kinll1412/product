
<?php
include("connection.php");
echo '<head><title>Page Title</title></head>';
echo '<head><title>Title</title></head>';

$file = $_GET['product_pdf'];

$filepath = "upload/pdf/" . $file;
// Header content type
header("Content-type: application/pdf");
// Send the file to the browser.
readfile($filepath);

?>
