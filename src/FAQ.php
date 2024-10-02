<?php
    session_start();
    require("class/Retrieve.inc.php");
    require("class/User.inc.php");
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <title>&#x2764Usagi Booru&#x2764</title>
    <link rel="stylesheet" href="styles/webStyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>
    <h1>&#x2764Usagi Booru&#x2764</h1>
    <div class="flex-container">
        <div class="FAQ_boards">
            <button><a href="index.php">Home</a></button>
            <?php
                $user = null;
                if(isset($_SESSION["USER"])){
                    $user = unserialize($_SESSION["USER"]);
                }

                if($user instanceof User && $user->getRole() == "admin"){
                    echo("<div class='add_faq'>\n");
                    echo("<form action='addFAQ.php' method='post'>"
                        ."<textarea name='q' placeholder='Enter a question...' required aria-required='true'></textarea>"
                        ."<br><textarea name='a' placeholder='Enter answer...' required aria-required='true'></textarea>"
                        ."<br> <input type='submit' value='Add FAQ'>".
                        "</form>");
                    echo("</div>\n");
                    echo("<hr>\n");
                    echo("<br>");
                }
            ?>
            <h2>FAQs:</h2>
            <br>
            <?php
                $SQL = "SELECT * FROM FAQ;";
                $retriever = new Retrieve($SQL);
                $FAQs = $retriever->retrieve();
                foreach($FAQs as $FAQ){
                    echo("<div class='faq'>\n");
                    echo("<div class='question'>\n");
                    echo("<h3>Question:</h3>");
                    echo("<p>". $FAQ["Question"] ."</p>");
                    echo("</div>\n");

                    echo("<div class='answer'>\n");
                    echo("<h3>Answer:</h3>");
                    echo("<p>". $FAQ["Answer"] ."</p>");
                    echo("</div>\n");
                    if($user instanceof User && $user->getRole() == "admin"){
                        echo("<button><a href='deleteFAQ.php?id=" . $FAQ["fID"] ."'>Delete</a></button>");
                    }
                    echo("</div>\n");
                }
            ?>
        </div>
    </div>



</body>


</html>