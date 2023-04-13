<?php 
    class DB{
        private $dbName;
        private $user;
        private $pass;
        private $connect;

        public function __construct(){
            $this->dbName = "dbquanao";
            $this->user = "root";
            $this->pass = "";
            try{
                $this->connect = new PDO("mysql:host=localhost;dbname=$this->dbName",
                $this->user, $this->pass);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e){}
        }

        public function query($query){
            try{
                $stmt = $this->connect->prepare($query);
                $stmt->execute();
                $row = $stmt;
                return $row;
            } catch(Exception $e){}
        }
    }

    function query($sql){
		$db = new DB();
		$row = $db->query($sql);
		return $row;
	}

    // admin
    //login admin
    function checkLoginAdmin($username, $password){
		$data  = query("select username, password from account where username = '$username';");
		foreach($data as $row){
			if($row[0] == $username && $row[1] == $password)
				return true;
		}
		return false;
	}

    function getFullNameAdmin($username){
        $query = "select fullname from admin where username = '$username';";
        $data = query($query);
        foreach($data as $row){
            return $row[0];
        }
        return null;
    }

    function getFoundDay($username){
        $query = "select foundday from admin where username = '$username';";
        $data = query($query);
        foreach($data as $row){
            return $row[0];
        }
        return null;
    }

    function getAddressAdmin($username){
        $query = "select address from admin where username = '$username';";
        $data = query($query);
        foreach($data as $row){
            return $row[0];
        }
        return null;
    }

    function updateAdmin($username, $foundDay, $address){
        $query = "update admin set foundday = '$foundDay', address = '$address' where username = '$username';";
        $data = query($query);
        return $data;
    }

    // user
?>