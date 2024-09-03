<!DOCTYPE html>
<HTML lang="en">
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
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        require("class/Contact.inc.php");
    ?>
    <div class="flex-container">
        <fieldset>
            <form method="post" action="contact.php">
                <input type="text" name="subject" id="subject "placeholder="Subject" required aria-required="true">
                <br>
                <input type="text" name="header" id="header" placeholder="Contact Email" required aria-required="true">
                <br>
                <textarea name="message" id="message" required aria-required="true" placeholder="write something..." rows="6" cols="60"></textarea>
                <br>
                <input type="submit" value="Mail">
            </form>
            <button ><a href="index.php">Home</a></button>
        </fieldset>
    </div>
    <?php
//    $contact = new Contact();
//    if($contact->sendMail()){
//        echo("<p>Mail sent!</p>");
//    }else{
//        echo("<p>Mail not sent!</p>");
//    }

        $contact = new Contact();
        $contact->sendMail();
    ?>
    </body>
</HTML>