<?php 
    session_start();
    include_once($_SERVER['DOCUMENT_ROOT']."/Sell/model/handler/get_product.php");

    // update product
    $id = $_POST['productId'];
    $name = $_POST['productName'];
    $color = $_POST['productColor'];
    $size = $_POST['productSize'];
    $quantity = $_POST['productQuantity'];
    $price = $_POST['productPrice'];
    $descript = $_POST['productDescript'];
    $image = $_POST['productImage'];
    $imageDefault = $_POST['imageDefault'];

    if($image == null){
       $image = $imageDefault;
    }

    updateProduct($id, $name, $color, $size, $quantity, $price, $descript, $image);

    // update session
    $_SESSION['products'] = getProductList();

    header("location:../../../admin");
?>