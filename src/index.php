<?php
    session_start();
    require("class/Retrieve.inc.php");
    require("class/User.inc.php");

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

<h1>&#x2764Usagi Booru&#x2764</h1>
<?php
if(isset($_SESSION["USER"])){

    $user = unserialize($_SESSION["USER"]);
    $uName = $user->getUsername();
    echo("<p>Heya $uName!</p>");
}
?>
<header>
    <?php
        if(isset($_SESSION["USER"])){
            echo("<a href='class/Logout.inc.php'>Logout</a>");
        }else{
            echo("<a href='login.php'>log-in/sign-up</a>");
        }
    ?>
</header>
<main>
    <div class="flex-container">
        <div class ="boards">
            <nav>
                <h2>Boards</h2>
                <ul>
                   <?php
                    $ret = new Retrieve("SELECT BoardName FROM BOARD;");
                    $boards = $ret ->retrieve();
                    foreach($boards as $board) {
                        foreach($board as $key => $value) {
                            echo("<li><a href=''>" . $value . "</a></li> \n");
                        }
                    }
                   ?>
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
                <td><a href="">Settings</a></td>
                <td><a href="">FAQ</a></td>
                <td><a href="contact.php">Contact</a></td>
                <td><a href="">Socials</a></td>
            </tr>
        </table>
    </nav>
</main>

</body>

</html>