<?php
$request_raw = file_get_contents('php://input');
$json_object = json_decode($request_raw);
$product_id = $json_object->product_id;
$action = $json_object->action;
switch ($action) {
    case 'get-product-detail':
        getProductDetail($product_id);
        break;
    case '':
        $myobj = array('error'=>'No action');
        $myJSON = json_encode($myobj);
        break;
}
function getProductDetail($product_id)
{
    include("connection.php");
    $sql = "select * from stock where product_id=$product_id";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_array($query);
    $array = array(
        'id'=>$result['product_id'],
        'name'=>$result['product_name'],
        'price'=>$result['product_price'],
        'unit' =>$result['product_unit'],
        'attribute'=>$result['product_pdf'],
        'num_image'=>$result['product_img']
    );
    $json = json_encode($array);
    echo $json;
    
    // ** debug **
    // $myobj = array('product-id'=>$product_id);
    // $myJSON = json_encode($myobj);
    // echo $myJSON;
}
?>