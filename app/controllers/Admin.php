<?php

class Admin extends Controller{
    public function __construct()
    {
        
    }

    public function ad_dashboard(){
        $data = [];
        $this->view('admin/ad_dashboard', $data);
    }

    public function ad_home(){
        $data = [];
        $this->view('admin/ad_home', $data);
    }

    public function ad_registrations(){
        $data = [];
        $this->view('admin/ad_registrations', $data);
    }
}