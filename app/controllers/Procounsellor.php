<?php

class Procounsellor extends Controller{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel=$this->model('User');
    }

    public function dashboard(){
        $data = [];
        $this->view('procounsellor/dashboard', $data);
    }

    public function pc_home(){
        $data = [];
        $this->view('procounsellor/pc_home', $data);
    }

    public function pc_reviewq(){
        $data = [];
        $this->view('procounsellor/pc_reviewq', $data);
    }

    public function pc_undergrad(){
        $data = [];
        $this->view('procounsellor/pc_undergrad', $data);
    }

    public function pc_chats(){
        $data = [];
        $this->view('procounsellor/pc_chats', $data);
    }

    public function pc_counselors(){
        $data = [];
        $this->view('procounsellor/pc_counselors', $data);
    }

    public function pc_doctors(){
        $data = [];
        $this->view('procounsellor/pc_doctors', $data);
    }
}