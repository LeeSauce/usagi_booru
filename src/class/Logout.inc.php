<?php
session_start();
    class LogOut{
        function __construct(){

        }

        function destroy(){
            if(isset($_SESSION["USER"])){
                session_destroy();
                header("Location: ../index.php");
            }
        }
    }

    $logOut  = new LogOut();
    $logOut->destroy();
?>