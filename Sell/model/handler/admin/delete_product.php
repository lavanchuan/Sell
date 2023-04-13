<?php 
    session_start();
    include_once($_SERVER['DOCUMENT_ROOT']."/Sell/model/handler/get_product.php");
    
    // load info data
    $id = $_GET['id'];

    // delete session
    deleteProduct($id);

    // update session
    $_SESSION['products'] = getProductList();

    // load page
    header("location:../../../admin/");
?>