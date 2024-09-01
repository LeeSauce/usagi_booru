<?php
    require ("DbConnect.inc.php");
    class Retrieve{

        private $SQL;
        private $connect;

        private $rows = array();

        public function __construct($SQL){
            $this->SQL = $SQL;
        }
        public function retrieve(){
            $this->connect = new DbConnect("root", "xXDaTUiQQ123!?@", "USAGI_DB");
            $conn = $this->connect->connect();
            try{
                if($result = $conn->query($this->SQL)){
                    while($row = $result->fetch_assoc()){
                        $this->rows[] = $row;
                    }
                    $result->close();
                    return $this->rows;
                }
                else{
                    throw new Exception($conn->error);
                }
            }catch(Exception $e){
                echo $e->getMessage();
                return null;
            }

        }

    }

//    $ret = new Retreive("SELECT BOARD.BoardName FROM BOARD;");
//    $myArray = $ret->retrieve();
//    var_dump($myArray);
?>