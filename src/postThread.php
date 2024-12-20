<?php
    session_start();
    require ("class/User.inc.php");

    $user = null;

    if (!isset($_SESSION['USER'])){
        header ("location: login.php");
    }else{
       $user = unserialize($_SESSION['USER']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>&#x2764Usagi Booru&#x2764</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/webStyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">

</head>
<body>
<div class="flex-container">
    <fieldset>
        <form method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Title" name="title" required aria-required="true">
            <br>
            <input type="file" aria-required="false" name="file">
            <br>
            <textarea name="message" placeholder="write something..." rows="6" cols="60" required aria-required="true"></textarea>
            <br>
            <input name="post" type="submit" value="Post">
            <?php
            $board = null;
            if(isset($_GET["b"])){
                $board = $_GET["b"];
            }
            echo("<button><a href='board.php?context=thread&b=$board'>Back</a></button>\n");
            ?>
        </form>
    </fieldset>

    <?php
        if(!isset($_POST["post"])){
            die();
        }

        if($user instanceof User){

            if(isset($_GET["context"])){
                $context = $_GET["context"];
                $user->createPost($context);
                header ("location: board.php?context=$context&b=$board");
            }
        }

    ?>
</div>
</body>
</html>