<?php 
    session_start();
    // include($_SERVER['DOCUMENT_ROOT']."/Sell/model/handler/dbhandler.php");
    include($_SERVER['DOCUMENT_ROOT']."/Sell/model/handler/admin/get_ip_client.php");
    include($_SERVER['DOCUMENT_ROOT']."/Sell/model/handler/get_product.php");
    
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];

    if(checkLoginAdmin($username, $password)){
        $_SESSION['authentific'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['fullname'] = getFullNameAdmin($username);
        $_SESSION['foundday'] = getFoundDay($username);
        $_SESSION['address_admin'] = getAddressAdmin($username);
        
        // update admin_login
        addOrUpdate(getUserIpAddr());

        // load entity
        $_SESSION['products'] = getProductList();

        header("location:../../../admin/");
    }
?>