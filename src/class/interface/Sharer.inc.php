<?php
    interface Sharer {
        public function sharer(SharerThread $thread);
    }

    class ThreadSharer implements Sharer {
        public function sharer(SharerThread $thread) {
            $conn = new DbConnect("root", "xXDaTUiQQ123!?@", "USAGI_DB");
            $db = $conn->connect();
            $sql = "CALL ADD_THREAD(?,?,?,?,?,@statusMsg)";
            $prepare = $db->prepare($sql);

            $bID = $thread->getBoardID();
            $pubID = $thread->getPublisherID();
            $title = $thread->getTitle();
            $msg = $thread->getMessage();
            $file = $thread->getFile();

            $prepare -> bind_Param("ssssb", $bID, $pubID, $title, $msg, $file);

            $prepare -> execute();
        }
    }

    class CommentSharer implements Sharer {
        public function sharer(SharerThread $thread) {

        }
    }

    class SharerFactory{
        private $context = null;

        public function __construct($context) {
            $this->context = $context;
        }

        public function sharerFactory(){
            switch(strtolower($this->context)){
                case "thread" :
                    return new ThreadSharer;
                break;
                case "comment" :
                    return new CommentSharer;
                    break;
                default:
                    return null;
            }

        }
    }
?>