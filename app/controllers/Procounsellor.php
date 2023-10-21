<?php

class Procounsellor extends Controller{
    public function __construct()
    {
        
    }

    public function dashboard(){
        $data = [];
        $this->view('procounsellor/dashboard', $data);
    }

    public function home(){
        $data = [];
        $this->view('procounsellor/home', $data);
    }

    public function reviewq(){
        $data = [];
        $this->view('procounsellor/reviewq', $data);
    }
}