<?php
    require("DbConnect.inc.php");
    class Register{
        private $username;
        private $email;
        private $password;
        private $date;
        private $connect;
        function __construct(){
           $this->setFields();
        }

        private function setFields(){
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $date = $_POST["date"];

            if(isset($username) && isset($email) && isset($password) && isset($date)){
                $this->username = $username;
                $this->email = $email;
                $this->password = $password;
                $this->date = $date;
            }else{
                die("\n");
            }
        }

        public function register(){
            if($this->username != null && $this->email != null && $this->password != null && $this->date != null){
                $this->connect = new DbConnect("root", "xXDaTUiQQ123!?@", "USAGI_DB");
                $conn = $this->connect->connect();
                $sql = "CALL REGISTER_PROC('$this->username', '$this->email', '$this->password', '$this->date');";
                try{
                    if($conn->query($sql)){
                        $conn->close();
                    }else{
                        throw new Exception($conn->error);
                    }
                }catch (Exception $e){
                    echo ($e->getMessage()." This is a DB Error\n");
                }
            }
        }

    }
?>