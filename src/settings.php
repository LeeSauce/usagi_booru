<?php
    session_start();
    require("class/User.inc.php");
    require("class/DbConnect.inc.php");

    $user = null;
    if(!isset($_SESSION["USER"])){
        header("Location: login.php");
    }else{
        $user = unserialize($_SESSION["USER"]);
    }
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <title>&#x2764Usagi Booru&#x2764</title>
    <link rel="stylesheet" href="styles/webStyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>
<h1>&#x2764Usagi Booru&#x2764</h1>

<fieldset>
    <h2>Change user info:</h2>
    <?php

    ?>
    <form method="post" action="settings.php">
        <?php
            $username = null;
            $email = null;

            if($user instanceof User){
                $username = $user->getUsername();
                $email = $user->getEmail();
            }
        echo("<input type='text' name='username' value='" .$username."' required aria-required='true'>");
            echo("<input type='text' name='email' value='" .$email."' required aria-required='true'>");
        ?>
        <input type="submit" name="submit" value="Change" required aria-required="true">
        <br>
        <button><a href="change_password.php">Change Password</a></button>
        <button><a href="index.php">Home</a></button>
    </form>
</fieldset>
<?php
    if(isset($_POST["submit"])){
        $conn = new DbConnect("root", "xXDaTUiQQ123!?@", "USAGI_DB");

        if(isset($_POST["username"]) && isset($_POST["email"]) && $user instanceof User){
            $username = $_POST["username"];
            $email = $_POST["email"];
            $id = $user->getId();
            $SQL = "UPDATE USER SET Username = '" .$username. "', Email = '" .$email. "' WHERE UserID = ?";

            $db = $conn->connect();
            $preparedStatement = $db->prepare($SQL);
            $preparedStatement -> bind_param("i", $id);
            $preparedStatement -> execute();
            $db->close();
            $user->setUsername($username);
            $user->setEmail($email);
            $_SESSION["USER"] = serialize($user);
            header("Location: index.php");
        }
    }
?>

</body>


</html>