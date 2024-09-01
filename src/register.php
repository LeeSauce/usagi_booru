<!DOCTYPE = html>
<html lang="en">
<head>
    <title>Usagi Booru</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/webStyle.css">
</head>
<body>
<div class="flex-container">
    <div class="register">
        <fieldset>
            <h1>register</h1>
            <form method="post" action="register.php">
                <input type="text" name="username" id="username" placeholder="username" required aria-required="true">
                <br>
                <input type="email" name="email" id="email" placeholder="email" required aria-required="true">
                <br>
                <input type="password" name="password" id="password" placeholder="password" required aria-required="true">
                <br>
                <label for="date">Date of Birth:</label>
                <input type="date" name="date" id="date" required aria-required="true">
                <br>
                <input type="submit" value="Register">
            </form>
            <div class="return">
                <button><a href="login.php"">Back to log-in</a></button>
            </div>
        </fieldset>
    </div>
</div>
</body>
</html>