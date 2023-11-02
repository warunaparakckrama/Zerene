<?php

class Undergrad extends Controller{

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel=$this->model('User');  
    }

    public function dashboard(){
        $data = [];
        $this->view('undergrad/dashboard', $data);
    }

    public function home(){
        $data = [];
        $this->view('undergrad/home', $data);
    }

    public function questionnaires(){
        $data = [];
        $this->view('undergrad/questionnaires', $data);
    }

    public function ac(){
        $data = [];
        $this->view('undergrad/ac', $data);
    }

    public function pc(){
        $data = [];
        $this->view('undergrad/pc', $data);
    }

    public function doctors(){
        $data = [];
        $this->view('undergrad/doctors', $data);
    }

    public function chats(){
        $data = [];
        $this->view('undergrad/chats', $data);
    }

    public function resources(){
        $data = [];
        $this->view('undergrad/resources', $data);
    }

    public function ug_profile(){
        $data = [];
        $this->view('undergrad/ug_profile', $data);
    }

}