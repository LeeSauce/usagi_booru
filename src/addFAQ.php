
<?php
    require("class/DbConnect.inc.php");

    $conn = new DbConnect("root", "xXDaTUiQQ123!?@", "USAGI_DB");
    $db = $conn->connect();
    $SQL = "CALL ADD_FAQ(?,?);";

    if(isset($_POST["q"]) && $_POST["a"]){
        $question = $_POST["q"];
        $answer = $_POST["a"];

        $preparedStatement = $db->prepare($SQL);
        $preparedStatement->bind_param("ss", $question, $answer);
        $preparedStatement->execute();
    }

    $db->close();
    header("Location:FAQ.php");
?>