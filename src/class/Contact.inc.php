<?php
    class Contact  {
        private $mailTo = "usagibooru@gmail.com";
        private $subject;

        private $message;
        private $mailFrom;

        public function __construct() {
            $this->setFields();
        }

        private function setFields(){
            if(isset($_POST["subject"]) && isset($_POST["message"]) && isset($_POST["header"])){
                $this->subject = $_POST["subject"];
                $this->message = $_POST["message"];
                $this->mailFrom = $_POST["mailFrom"];
            }else{
                die("\n");
            }
        }

        function sendMail() {
            if(mail($this->mailTo, $this->subject, $this->message, "From: " . $this->mailFrom)){
                return true;
            }
            return false;
        }
    }
?>