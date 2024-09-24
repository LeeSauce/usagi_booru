<?php
require ("interface/Sharer.inc.php");
class SharerThread{

    private $title;
    private $message;
    private $file;
    private $boardID;
    private $publisherID;

    private $sharer;
    private function __construct(ThreadBuilder $threadBuilder){
        $this->boardID = $threadBuilder->getBoardID();
        $this->publisherID = $threadBuilder->getPublisherID();
        $this->title = $threadBuilder->getTitle();
        $this->message = $threadBuilder->getMessage();
        $this->file = $threadBuilder->getFile();
    }

    public function sharer($context){

        $factory = new SharerFactory($context);
        $this->sharer = $factory->sharerFactory();
        $this->sharer->sharer();
    }

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
        try{
            $this->setBoardID();
        }catch(Exception $e){
            die("<p>" .$e->getMessage() . "</p>\n");
        }

    }

    /**
     * @throws Exception
     */
    private function setBoardID(){
        if(isset($_GET["b"])){
            $this->boardID = $_GET["b"];
        }else{
            throw new Exception('Board ID not provided');
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