<?php

class Undergrad extends Controller{

    public function __construct()
    {
        
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

}