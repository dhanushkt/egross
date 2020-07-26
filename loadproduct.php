<?php

// configuration
include 'access/useraccesscontrol.php';
$row = $_POST['row'];;
$pagelength = 3;

$getalldata ="SELECT * FROM itemmaster order by itmid asc limit 0,$pagelength";
$result = mysqli_query($con,$getalldata);

$html = '';

while($row = mysqli_fetch_assoc($result)){
    
    $id = $row['itmid'];
    $image = $row['iimg'];
    $price = $row['iprice'];
    $name = $row['iname'];

    // Creating HTML structure
    // $html .= '<div class="col-md-4 col-sm-4 col-xs-12 product-category relative effect-hover-boxshadow animate-default post" id="post_'.$id.'">';
    // $html .= '<div class="col-md-4 col-sm-4 col-xs-12 product-category relative effect-hover-boxshadow animate-default">';
    // $html .= '<div class="image-product relative overfollow-hidden">';
    // $html .= '<div class="center-vertical-image">';
    // $html .= '<img src="uploads/item/'.$image.'" alt="Product">';
    // $html .= '</div>';
    // $html .= '</div>';
    // $html .= '<a href="#"></a>';
    // $html .= '<h3 class="title-product clearfix full-width title-hover-black">';
    // $html .= '<a href="product.php?product='.$id.'"></a>'.$name.'</h3>';
    // $html .= '<p class="clearfix price-product">'.$price.'</p>';
    // $html .= '</div>';
    // $html .= '</div>';
    $html .= 'hello';
}

echo $html;								