<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'mail/vendor/autoload.php';
    class Contact  {
        private $mail;
        public function __construct() {
            $this->mail = new PHPMailer(true);

        }

        /**
         * @throws Exception
         */
        public function sendMail(){
            $this->mail->isSMTP();
            $this->mail->SMTPAuth = true;
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->Username = "usagibooru@gmail.com";
            $this->mail->Password = "vzgo zltn xyrv ngmd";
            $this->mail->SMTPSecure = "ssl";
            $this->mail->Port = 465;

            $this->mail->setFrom('usagibooru@gmail.com', 'UsagiBooru!');
            $this->mail->addAddress("usagibooru@gmail.com", "UsagiBooru!");

            $this->mail->isHTML(true);
            if(isset($_POST["subject"]) && isset($_POST["message"]) && isset($_POST["header"])){
                $this->mail->Subject = $_POST["subject"];
                $this->mail->Body = $_POST["message"] . "<br> from: " . $_POST["header"];
                try{
                    $this->mail->send();
                    echo("<p>Mail sent!</p>\n");
                }catch (Exception $e){
                    $this->mail->ErrorInfo = $e->getMessage();
                }
            }

        }

        // BC local host is way too hard to config just for sending mail with the standard PHP library, I ended up having to use an outsourced one
//        private $mailTo = "usagibooru@gmail.com";
//        private $subject;
//
//        private $message;
//        private $mailFrom;
//
//        public function __construct() {
//            $this->setFields();
//        }
//
//        private function setFields(){
//            if(isset($_POST["subject"]) && isset($_POST["message"]) && isset($_POST["header"])){
//                $this->subject = $_POST["subject"];
//                $this->message = $_POST["message"];
//                $this->mailFrom = $_POST["mailFrom"];
//            }else{
//                die("\n");
//            }
//        }
//
//        function sendMail() {
//            if(mail($this->mailTo, $this->subject, $this->message, "From: " . $this->mailFrom)){
//                return true;
//            }
//            return false;
//        }

    }
    // reference in case I forget: https://github.com/PHPMailer/PHPMailer
?>