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
    <div class="flex-container">
        <div class ="thread_boards">
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
                <h2>Thread</h2>
                <hr>
                <?php
                    $thread = null;
                    if(isset($_GET["t"])) {
                        $thread = $_GET["t"];
                        $SQL = "CALL SELECT_THREAD('$thread')";

                        $retriever = new Retrieve($SQL);
                        $thread = $retriever ->retrieve();
                        $thread = $thread[0];
                    }

                    echo("<h2>" . $thread["Title"] . "</h2>\n");
                    echo("<p>".$thread["Message"]."</p>");
                    $img = $thread["File"];

                    echo("<img src='data:image/jpeg;base64,"
                    . base64_encode($img) . "' alt= 'thread image' style='max-width: 60%;'>\n");

                    echo("<p><strong>Posted by:</strong> " . $thread["Username"]."</p>");
                    echo("<p><strong>Posted on:</strong> " . $thread["DateCreated"] . "</p>");

                ?>
                <hr>
                <div class="comment_section">

                </div>
            </div>
        </div>
    </div>
    </body>
</html>