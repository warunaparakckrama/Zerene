<?php

class Users extends Controller{


    public function __construct()
    {
        
    }

    public function signup(){
        $data = ['title'=>'Zerene - signup',];
        $this->view('users/signup', $data);
    } 
    
    public function login(){
        $data = ['title'=> 'Zerene - login'];
        $this->view('users/login', $data);
    }
}