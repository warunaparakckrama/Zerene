<?php

class Chat extends Controller
{
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

    // Encryption function
    public function encryptMessage($message, $key)
    {
        // Use AES encryption with CBC mode and PKCS7 padding
        $cipher = "aes-256-cbc";
        $iv_length = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($iv_length);
        $encrypted = openssl_encrypt($message, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($iv . $encrypted);
    }


    public function sendMessage()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        if (!isset($_POST)) {
            $array['Status'] = "Post not set";
            echo json_encode($array);
            die();
        }
        $roomid = $_POST['roomid'];
        $sent_by = $_POST['sender'];
        $received_by = $_POST['receiver'];
        $message = $_POST['message'];

        $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
        $encryptedMessage = $this->encryptMessage($message, $key);

        $this->chatModel->storeMessage($roomid, $sent_by, $received_by, $encryptedMessage);
    }
}
