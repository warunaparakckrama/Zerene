<?php

class Doctor extends Controller{
    public function __construct()
    {
        
    }

    public function dashboard(){
        $data = [];
        $this->view('doctor/dashboard', $data);
    }

    public function doc_home(){
        $data = [];
        $this->view('doctor/doc_home', $data);
    }

    public function doc_questionnaires(){
        $data = [];
        $this->view('doctor/doc_questionnaires', $data);
    }

    public function doc_doctors(){
        $data = [];
        $this->view('doctor/doc_doctors', $data);
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