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

    public function d_doctor(){
        $data = [];
        $this->view('doctor/d_doctor', $data);
    }

    public function doc_chats(){
        $data = [];
        $this->view('doctor/doc_chats', $data);
    }

    public function doc_counselors(){
        $data = [];
        $this->view('doctor/doc_counselors', $data);
    }

    public function doc_undergrad(){
        $data = [];
        $this->view('doctor/doc_undergrad', $data);
    }

    

    
    public function prescription(){
        $data = [];
        $this->view('doctor/prescription', $data);
    } 
    public function doc_timeslots(){
        $data = [];
        $this->view('doctor/doc_timeslots', $data);
    } 


    



}