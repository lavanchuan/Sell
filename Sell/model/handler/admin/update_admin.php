<?php 
    session_start();

    include($_SERVER['DOCUMENT_ROOT']."/Sell/model/handler/dbhandler.php");

    $address_admin = $_POST['txtAddress'];
    $found_day = $_POST['txtFoundDay'];

    $data = updateAdmin($_SESSION['username'], $found_day, $address_admin);

    $_SESSION['foundday'] = getFoundDay($_SESSION['username']);
    $_SESSION['address_admin'] = getAddressAdmin($_SESSION['username']);

    header("location:../../../admin/");
?>