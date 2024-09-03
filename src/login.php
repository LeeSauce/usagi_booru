<?php
    session_start();
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
<?php
require("class/Login.inc.php");
?>

<div class="flex-container">
    <div class="login">
        <fieldset>
            <h1>Log-in</h1>
            <form method="post">
                <input type="text" name="id" id="id" placeholder="username or email" required aria-required="true">
                <br>
                <input type="password" name="password" id="password" placeholder="password" required aria-required="true">
                <br>
                <input type="submit" value="Login">
            </form>
            <div class="return">
                <button><a href="register.php"">Register</a></button>
                <button><a href="index.php"">Home</a></button>
            </div>
        </fieldset>
    </div>
</div>
<?php
    $auth = new Login();
    $auth->login();
    if(isset($_SESSION['USER'])){
        header("Location: index.php");
        die("\n");
    }
?>
</body>
</html>