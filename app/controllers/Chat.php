<?php

class Chat extends Controller{
    private $chatModel;
    private $userModel;
    private $adminModel;
    private $ugModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->chatModel = $this->model('ChatModel');
        $this->userModel = $this->model('User');
        $this->adminModel = $this->model('Administrator');
        $this->ugModel = $this->model('Undergraduate');
    }

    public function sendMessage(){
        $_POST = json_decode(file_get_contents('php://input'), true);
        if(!isset($_POST)){
            $array['Status']= "Post not set";
            echo json_encode($array);
            die();
        }
        $roomid = $_POST['roomid'];
        $sent_by = $_POST['sender'];
        $received_by = $_POST['receiver'];
        $message = $_POST['message'];

        $this->chatModel->storeMessage($roomid, $sent_by, $received_by, $message);

    }
}
?>