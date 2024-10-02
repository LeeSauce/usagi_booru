<?php
    session_start();
    require("class/User.inc.php");
    require("class/DBConnect.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>&#x2764Usagi Booru&#x2764</title>
    <link rel="stylesheet" href="styles/webStyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">

</head>

<body>

    <h1>&#x2764Usagi Booru&#x2764</h1>
    <div class="flex-container">
        <div class="login">
            <fieldset>
                <h2>Change Password</h2>
                <form method="post" action="change_password.php">
                    <input type="password" placeholder="Old Password..." name="Old" required aria-required="true">
                    <br>
                    <input type="password" placeholder="New Password..." name="New" required aria-required="true">
                    <br>
                    <input name="submit" type="submit" value="Change" required aria-required="true">
                    <br>
                    <button><a href="settings.php">Back</a></button>
                    <button><a href="index.php">Home</a></button>
                </form>
            </fieldset>
        </div>
    </div>
    <?php
        if(isset($_POST['submit'])) {
            $user = null;
            if(isset($_SESSION['USER'])) {
                $user = unserialize($_SESSION['USER']);
            }
            if($user instanceof User && isset($_POST['Old']) && isset($_POST['New'])){
                $SQL ="SELECT Password FROM PASSWORD WHERE UserID = ? AND Password = ? LIMIT 1";
                $conn = new DBConnect("root", "xXDaTUiQQ123!?@", "USAGI_DB");
                $db = $conn->connect();
                $preparedStatement = $db->prepare($SQL);

                $oldPwd = $_POST["Old"];
                $id = $user->getId();

                $preparedStatement->bind_param("is", $id, $_POST['Old']);
                $preparedStatement->execute();

                $preparedStatement->bind_result($qPWD);
                $preparedStatement->fetch();

                if($qPWD == $oldPwd){
                    $db->close();
                    $db = $conn->connect();
                    $newPwd = $_POST["New"];
                    $SQL = "UPDATE PASSWORD SET Password = '".$newPwd."' WHERE UserID = ? LIMIT 1";
                    $prepared = $db->prepare($SQL);

                    $prepared->bind_param("i",  $id);
                    $prepared->execute();

                    $db->close();
                    header("Location: index.php");
                }

                $db->close();
                header("Location: change_password.php");
            }
        }
    ?>
</body>
</html>
