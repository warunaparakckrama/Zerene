<?php

class Pages extends Controller{

    //modifide code: created postModel
    // private $postModel;

    public function __construct()
    {
        
    }

    public function index(){
        // $this->view('Hello');
        $data = [
            'title' => 'Zerene',
        ];


        $this->view('pages/index', $data);
    }

    public function Contactus(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'subject' => trim($_POST['form_subject']),
                'message' => trim($_POST['message']),
            ];

            $this->sendContactusMail($data);
            redirect('pages/index');
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'subject' => '',
                'message' => '',
            ];
            $this->view('pages/index', $data);
        }

    }

    public function sendContactusMail($data){
        $receiver = 'contactmeuz1325@gmail.com';
        $subject = 'Homepage Contact';
        $name = $data['name'];
        $email = $data['email'];
        $form_subject = $data['form_subject'];
        $message = $data['message'];
        $sender = "From: zerenecounselor@gmail.com";

        $filePath = __DIR__ . '/../views/pages/contact_us.php';
        $date = date('Y-m-d');
        $emailContent = file_get_contents($filePath);

        $emailContent = str_replace('{name_here}', $name, $emailContent);
        $emailContent = str_replace('{email_here}', $email, $emailContent);
        $emailContent = str_replace('{subject_here}', $form_subject, $emailContent);
        $emailContent = str_replace('{message_here}', $message, $emailContent);
        $emailContent = str_replace('{date}', $date, $emailContent);

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= $sender;

        $body = $emailContent;

        mail($receiver, $subject, $body, $headers);
    }

}