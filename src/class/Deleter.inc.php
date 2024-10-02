<?php
    require_once("DbConnect.inc.php");
    interface Deleter {
        const user = "root";
        const password = "xXDaTUiQQ123!?@";
        const Database = "USAGI_DB";

        public function delete($id);
    }

    class ThreadDeleter implements Deleter {
        public function delete($id) {
            $SQL = "DELETE FROM Thread WHERE ThreadID = ?";
            $connect = new DbConnect(Deleter::user, Deleter::password, Deleter::Database);

            $db = $connect->connect();
            $preparedStatement = $db->prepare($SQL);

            $preparedStatement->bind_param("i", $id);
            $preparedStatement->execute();
            $db->close();
        }
    }

    class commentDeleter implements Deleter {
        public function delete($id) {
            $SQL = "DELETE FROM Comment WHERE CommentID = ?";
            $connect = new DbConnect(Deleter::user, Deleter::password, Deleter::Database);

            $db = $connect->connect();
            $preparedStatement = $db->prepare($SQL);

            $preparedStatement->bind_param("i", $id);
            $preparedStatement->execute();
            $db->close();
        }
    }
?>