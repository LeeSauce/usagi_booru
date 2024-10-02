<?php
session_start();
require("class/Retrieve.inc.php");
require("class/User.inc.php");

?>
<?php
if(isset($_POST["post"])){
    if(!isset($_SESSION["USER"])){
        header("location: login.php");
    }
    else{
        $user = unserialize($_SESSION["USER"]);
        if($user instanceof User && isset($_GET["context"])){
            $context = $_GET["context"];
            $user->createComment($context);
        }
    }
}
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
                <button><a href="index.php">Home</a></button>
                <hr>
                <?php
                    $thread = null;
                    if(isset($_GET["t"])) {
                        $threadID = $_GET["t"];
                        $SQL = "CALL SELECT_THREAD('$threadID')";

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
                    <form action="thread.php?context=comment&t=<?php echo($threadID)?>" method="post" enctype="multipart/form-data">
                        <textarea placeholder="Add a comment..." aria-required="true" required name="comment" rows="3" cols="45"></textarea>
                        <br>
                        <input name="cFile" type="file" aria-required="true">
                        <br>
                        <input name="post" type="submit" value="Post" required aria-required="true">
                    </form>
                    <hr>
                    <h2>Comments</h2>
                    <?php
                        $SQL ="SELECT * FROM COMMENT_VIEW;";
                        $retriever = new Retrieve($SQL);
                        $comments = $retriever ->retrieve();
                        foreach($comments as $comment) {
                            echo("<div class='comment'>\n");
                            echo("<p><strong>Username:</strong> " . $comment["Username"] . "</p>");
                            echo("<img src='data:image/jpeg;base64,". base64_encode($comment["File"])
                                ."' alt='comment image' style='max-height: 200px;'>\n");
                            echo("<p><strong>Message:</strong> " . $comment["Comment"] . "</p>\n");
                            echo("<p><strong>Date:</strong> " . $comment["Date_created"] . "</p>\n");
                            echo("</div>\n");
                            echo("<br>\n");
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
