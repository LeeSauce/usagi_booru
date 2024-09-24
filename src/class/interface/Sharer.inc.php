<?php
    interface Sharer {
        public function sharer();
    }

    class ThreadSharer implements Sharer {
        public function sharer() {

        }
    }

    class CommentSharer implements Sharer {
        public function sharer() {
            // TODO implement this after comments
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