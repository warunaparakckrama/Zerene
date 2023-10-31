<?php

class Doctor extends Controller{
    public function __construct()
    {
        
    }

    public function dashboard(){
        $data = [];
        $this->view('doctor/dashboard', $data);
    }

    public function home(){
        $data = [];
        $this->view('doctor/home', $data);
    }

    public function questionnaires(){
        $data = [];
        $this->view('doctor/questionnaires', $data);
    }
}