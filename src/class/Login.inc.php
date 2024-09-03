<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    require("Retrieve.inc.php");
    require("User.inc.php");
    class Login {
        private $inputId;
        private $inputPassword;

        function __construct() {
            $this->setFields();
        }

        private function setFields(){
            if(isset($_POST["id"]) && isset($_POST["password"])){
                $this->inputId = $_POST["id"];
                $this->inputPassword = $_POST["password"];
            }else{
                die("\n");
            }
        }

        public function login(){
            try{
                $SQL = "CALL LOGIN_PROC('$this->inputId', '$this->inputPassword');";
                $ret = new Retrieve($SQL);
                $userCredentials = $ret->retrieve()[0];
                if($userCredentials != null){
                    $userID = $userCredentials["UserID"];
                    $userName = $userCredentials["Username"];
                    $email = $userCredentials["Email"];
                    $DOB = $userCredentials["DOB"];
                    $dateCreated = $userCredentials["DateCreated"];
                    $Role = $userCredentials["ROLE"];

                    $user = new User($userID, $userName, $email, $DOB, $dateCreated, $Role);
                    $_SESSION["USER"] = serialize($user);
                }else{
                    throw new Exception("Invalid username or password");
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }

?>