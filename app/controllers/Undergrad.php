<?php

class Undergrad extends Controller{

    public function __construct()
    {
        
    }

    public function dashboard(){
        $data = [];
        $this->view('undergrad/dashboard', $data);
    }

}