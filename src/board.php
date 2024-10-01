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
                <hr>
                <table class="thread_table">
                    <?php
                        $SQL = "CALL SELECT_THREADS('$board');";
                        $retriever = new Retrieve($SQL);

                        $threads = $retriever ->retrieve();
                        echo("<tr>");
                        $count = 0;
                        foreach($threads as $thread) {
                            echo("<td>");
                            foreach($thread as $key => $value) {

                                echo("<div class = 'image-container'>");
                                if($key == "File"){
                                    echo ('<a href="thread.php?context=comment&t='. $thread["ThreadID"]
                                        .'"><img src="data:image/jpeg;base64,' . base64_encode($value) .
                                        '" alt="Uploaded Image" style="max-width: 60%;"></a>');
                                }
                                if($key == "Title" || $key == "DateCreated"){
                                    echo ("<p>".$value . "</p>\n");
                                }
                            }
                            echo("</div></td>\n");
                            $count ++;
                            if($count > 1){
                                $count = 0;
                                echo("</tr>\n");
                                echo("<tr>\n");
                            }
                        }
                    ?>

                </table>
            </div>
        </div>
    </div>
</body>
</html>