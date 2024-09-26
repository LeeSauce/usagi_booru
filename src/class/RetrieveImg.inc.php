<?php
    include("Retrieve.inc.php");

    $SQL = "SELECT File FROM THREAD WHERE ThreadID = 22";
    $retriever = new Retrieve($SQL);
    $file = $retriever->retrieve();
    $img = $file[0]["File"];
    echo '<img src="data:image/jpeg;base64,' . base64_encode($img) . '" alt="Uploaded Image" style="max-width: 500px;">';

?>