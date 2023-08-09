
<?php 

function getImages($var){
    foreach (glob('upload/product_img'+$var+'/เก้าอี้เหล็กชุบโครเมียม/*.*') as $filename) {
        echo $filename;
    }

}
getImages($path)
?>;