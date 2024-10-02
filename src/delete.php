<?php
    session_start();
    require("class/User.inc.php");

    if(isset($_SESSION["USER"])){
        $user = unserialize($_SESSION["USER"]);
        if($user instanceof User){
            if(isset($_GET["t"])){
                $id = $_GET["t"];
                $user->deletePost($id);
            }
            if(isset($_GET["c"])){
                $id = $_GET["c"];
                $user->deleteComment($id);
            }
        }
    }
    header("Location: index.php");

    //change header directions later
?>