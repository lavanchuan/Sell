<?php 
    include($_SERVER['DOCUMENT_ROOT']."/Sell/model/handler/dbhandler.php");

    function getUserIpAddr()
    {
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
        $ip = $_SERVER['REMOTE_ADDR'];
      }
      return $ip;
    }

    // get logged form db
    function getLoggedByIp($ip){
        $query = "select logged from admin_login where ip = '$ip';";
        $data = query($query);
        foreach($data as $row){return $row[0];}
        return false;
    }

    // add or update logged admin
    function addOrUpdate($ip){
        $data = query("select count(ip) from admin_login where ip = '$ip';");
        $count = 0;
        foreach($data as $row){$count = $row[0]; break;}
        if($count == 0){
            $data = query("insert into admin_login(ip, logged) value('$ip', true);");
        } else {
            $data = query("update admin_login set logged = true where ip = '$ip';");
        }
    }

    // Logout admin
    function logoutAdmin($ip){
        $data = query("update admin_login set logged = 'false' where ip = '$ip';");
    }
?>