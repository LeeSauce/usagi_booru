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


<h1>Usagi Booru</h1>
<main>
    <div class="flex-container">
        <div class ="boards">
            <nav>
                <h2>Boards</h2>
                <ul>
                    <?php
                    $ret = new Retrieve("SELECT BoardName, BoardID FROM BOARD;");
                    $boards = $ret ->retrieve();
                    foreach($boards as $board) {
                        echo("<li><a href='board.php?context=thread&b=". $board["BoardID"] ."'>"
                            . $board["BoardName"] . "</a></li> \n");
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <div class = "display">
            <div class="threads">
                <h2>Board Name</h2>
                <?php
                $board = null;
                if(isset($_GET["b"])){
                    $board = $_GET["b"];
                }
                echo("<button><a href='postThread.php?context=thread&b=$board'>Create Thread</a></button>\n");
                ?>
                <button><a href="index.php"">Home</a></button>
                <br>
                <table>
                    <?php
                        $SQL = "CALL SELECT_THREADS('$board');";
                        $retriever = new Retrieve($SQL);

                        $threads = $retriever ->retrieve();
                        foreach($threads as $thread) {
                            echo("<tr>");
                            foreach($thread as $key => $value) {
                                if($key == "File"){
                                    echo("<td>");
                                    echo ('<img src="data:image/jpeg;base64,' . base64_encode($value) . '" alt="Uploaded Image" style="max-width: 60%;">');
                                    echo("</td>\n");
                                }
                                else if($key == "Title" || $key == "Username" || $key == "DateCreate"){
                                    echo("<td>");
                                    echo ($value);
                                    echo("</td>\n");
                                }
                            }
                        }
                    ?>

                </table>
            </div>
        </div>
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
</body>
</html>