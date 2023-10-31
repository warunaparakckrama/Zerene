<?php
class Academic extends Controller{
    public function __construct()
    {
        
    }
    public function dashboard(){
        $data = [];
        $this->view('academic/dashboard', $data);
    }

    public function home(){
        $data = [];
        $this->view('academic/home', $data);
    }

    public function opletter(){
        $data = [];
        $this->view('academic/opletter', $data);
    }

    public function acundergraduate(){
        $data = [];
        $this->view('academic/acundergraduate', $data);
    }

    public function acchat(){
        $data = [];
        $this->view('academic/acchat', $data);
    }

    public function acprofessionals(){
        $data = [];
        $this->view('academic/acprofessionals', $data);
    }

    public function acprofessionals3(){
        $data = [];
        $this->view('academic/acprofessionals3', $data);
    }

    public function actimeslot(){
        $data = [];
        $this->view('academic/actimeslot', $data);
    }
}


?>