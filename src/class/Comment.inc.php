<?php
    require("DbConnect.inc.php");
    require("interface/Sharer.inc.php");

    class SharerComment{
        private $comment;
        private $file;
        private $commenterID;
        private $threadID;

        private function __construct(CommentBuilder $commentBuilder){
            $this->comment = $commentBuilder->getComment();
            $this->file = $commentBuilder->getFile();
            $this->commenterID = $commentBuilder->getCommenterID();
            $this->threadID = $commentBuilder->getThreadID();
        }

        public static function getSharrer(CommentBuilder $commentBuilder){
            return new SharerComment($commentBuilder);
        }

        public function sharer($context){
            $factory = new SharerFactory($context);
            $sharer = $factory->sharerFactory();
            $sharer->sharer($this);
        }

        /**
         * @return mixed
         */
        public function getComment()
        {
            return $this->comment;
        }

        /**
         * @return mixed
         */
        public function getFile()
        {
            return $this->file;
        }

        /**
         * @return mixed
         */
        public function getCommenterID()
        {
            return $this->commenterID;
        }

        /**
         * @return mixed
         */
        public function getThreadID()
        {
            return $this->threadID;
        }
    }

    class CommentBuilder{
        private $comment;
        private $file;
        private $commenterID;
        private $threadID;

        public function __construct($comment, $commenterID){
            $this->comment = $comment;
            $this->commenterID = $commenterID;
            try{
                $this->setThreadID();
            }catch (exception $ex){
                die($ex->getMessage());
            }
        }

        /**
         * @throws exception
         */
        public function setThreadID(){
            if(isset($_GET["t"])){
                $this->threadID = $_GET["t"];
            }else{
                throw new exception("No ThreadID provided");
            }
        }

        public function setFile($file){
            $this->file = $file;
            return $this;
        }

        public function build(){
            return SharerComment::getSharrer($this);
        }
    }
?>