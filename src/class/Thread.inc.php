<?php
require("DbConnect.inc.php");
class SharerThread{

    private $title;
    private $message;
    private $file;
    private $boardID;
    private $publisherID;


    private function __construct(ThreadBuilder $threadBuilder){
        $this->boardID = $threadBuilder->getBoardID();
        $this->publisherID = $threadBuilder->getPublisherID();
        $this->title = $threadBuilder->getTitle();
        $this->message = $threadBuilder->getMessage();
        $this->file = $threadBuilder->getFile();
    }

    // TODO: Share thread function

    public function sharer(){}

    public static function getSharer(ThreadBuilder $threadBuilder){
        return new SharerThread($threadBuilder);
    }


}
class ThreadBuilder{
    private $title;
    private $message;
    private $file;
    private $boardID;
    private $publisherID;
    public function __construct($title, $message, $publisherID){
        $this->title = $title;
        $this->message = $message;
        $this->publisherID = $publisherID;
        if(isset($_POST["boardID"])){
            $this->boardID = $_POST["boardID"];
        }else{
            die("\n");
        }

    }

    public function setFile($file){
        $this->file = $file;
        return $this;
    }

    public function build(){
        return SharerThread::getSharer($this);
    }


    // accessors
    public function getTitle(){
        return $this->title;
    }
    public function getMessage(){
        return $this->message;
    }
    public function getBoardID(){
        return $this->boardID;
    }
    public function getFile(){
        return $this->file;
    }
    public function getPublisherID(){
        return $this->publisherID;
    }
}

?>