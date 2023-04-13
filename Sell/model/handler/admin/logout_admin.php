<?php
    include($_SERVER['DOCUMENT_ROOT']."/Sell/model/handler/admin/get_ip_client.php");

    logoutAdmin(getUserIpAddr());

    header("location:../../../admin");
?>