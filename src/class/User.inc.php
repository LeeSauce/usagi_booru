<?php
require ("Thread.inc.php");
class User {
    private $id;
    private $username;
    private $email;
    private $dob;
    private $dateCreated;
    private $role;

    function __construct($id, $username, $email, $dob, $dateCreated, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->dob = $dob;
        $this->dateCreated = $dateCreated;
        $this->role = $role;

    }

    // TODO: need to add thread and comment functions
    function createThread(){
        $title = $_POST['title'];
        $message = $_POST['message'];
        $file = $_FILES['file'];
        try{
            if(isset($title) && isset($message) !== null){
                $sharer = new ThreadBuilder($title, $message, $this->id);
                if(isset($file)){
                    $sharer->setFile($file);
                }

                $sharer = $sharer->build();
                $sharer->sharer();
            }else{
                throw new Exception("You must provide a title and message");
            }
        }catch (Exception $e){
            echo $e->getMessage();
            die();
        }
    }
    function deleteThread(){}
    function createComment(){}
    function deleteComment(){}


    // access modifiers below

    function getId() {
        return $this->id;
    }
    function getUsername() {
        return $this->username;
    }
    function getEmail() {
        return $this->email;
    }
    function getDob() {
        return $this->dob;
    }
    function getDateCreated() {
        return $this->dateCreated;
    }
    function getRole() {
        return $this->role;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setUsername($username) {
        $this->username = $username;
    }
    function setEmail($email) {
        $this->email = $email;
    }
    function setDob($dob) {
        $this->dob = $dob;
    }
    function setDateCreated($dateCreated) {
        $this->dateCreated = $dateCreated;
    }

    function setRole($role) {
        $this->role = $role;
    }
}
?>