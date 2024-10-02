<?php
    require("class/DbConnect.inc.php");

    $SQL ="DELETE FROM FAQ WHERE fID = ?;";
    $conn = new DbConnect("root", "xXDaTUiQQ123!?@", "USAGI_DB");

    if(isset($_GET["id"])){
        $faqID = $_GET["id"];
        $db = $conn->connect();
        $preparedStatement = $db->prepare($SQL);

        $preparedStatement->bind_param("i", $faqID);
        $preparedStatement->execute();
        $db->close();
    }
    header("Location:FAQ.php");
?>