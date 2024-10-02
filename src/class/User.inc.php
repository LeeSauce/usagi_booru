<?php
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
    function createPost($context){

        require_once("Thread.inc.php");
        $title = $_POST['title'];
        $message = $_POST['message'];

        try{
            if(isset($title) && isset($message) !== null){
                $threadBuilder = new ThreadBuilder($title, $message, $this->id);
                if(isset($_FILES['file'])){
                    $threadBuilder->setFile($_FILES['file']);
                }

                $thread = $threadBuilder->build();
                $thread->sharer($context);
            }else{
                throw new Exception("Something went wrong");
            }
        }catch (Exception $e){
            echo ("<p>" .$e->getMessage() . "</p>\n");
            die();
        }
    }

    function createComment($context){
        require_once("Comment.inc.php");

        $comment = $_POST['comment'];
        try{
            if(isset($comment) !== null){
                $commentBuilder = new CommentBuilder($comment, $this->id);
                if(isset($_FILES['cFile'])){
                    $commentBuilder->setFile($_FILES['cFile']);
                }
                $comment = $commentBuilder->build();
                $comment->sharer($context);
            }
        }catch (Exception $e){
            echo ("<p>" .$e->getMessage() . "</p>\n");
            die();
        }
    }
    function deletePost(){}

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