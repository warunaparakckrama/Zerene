<?php

class Pages extends Controller{

    //modifide code: created postModel
    // private $postModel;

    public function __construct()
    {
        
    }

    public function index(){
        // $this->view('Hello');
        $data = [
            'title' => 'Zerene',
        ];


        $this->view('pages/index', $data);
    }

    public function about(){

        $data = [
            'title' => 'About us'
        ];

        $this->view('pages/about', $data);
    }
}