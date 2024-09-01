<!DOCTYPE = html>
<html lang="en">
<head>
    <title>Usagi Booru</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/webStyle.css">
</head>
<body>
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
</body>
</html>