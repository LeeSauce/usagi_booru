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
    require("class/DbConnect.inc.php");

    $db = new DbConnect( "root",
        "xXDaTUiQQ123!?@", "USAGI_DB");
    $conn = $db->connect();
?>

<h1>&#x2764Usagi Booru&#x2764</h1>
<header>
    <a href="">log-in/sign-up</a>
</header>
<main>
    <div class="flex-container">
        <div class ="boards">
            <nav>
                <h2>Boards</h2>
                <ul>
                    <li>board list</li>
                </ul>
            </nav>
        </div>
        <div class = "display">
            <div class="info">
                <h2>What is Usagi Booru?</h2>
                <hr>
                <br>
                <p><strong>Usagi-Booru</strong> is a web application designed to host and facilitate communities centered around various subcultures. It features a series of interactive boards where users can share content, engage in discussions, and explore topics related to these subcultures. Each board is organized into threads, allowing users to dive into specific conversations and contribute to the community's collective knowledge and interests.</p>
            </div>
        </div>
    </div>

    <div class="featured-container">
        <img id="usagiL" alt="Usagi" src="./imgs/usagi.png">
        <div class="featured">
            <h2>Featured</h2>
            <hr>
            <br>
            <table>
                featured stuff goes here
            </table>
        </div>
        <img id="usagiR" alt="Usagi" src="./imgs/usagi.png">
    </div>
    <nav class="selection">
        <table>
            <tr>
                <td>Settings</td>
                <td>FAQ</td>
                <td>Contact</td>
                <td>Socials</td>
            </tr>
        </table>
    </nav>
</main>

</body>

</html>