<?php

//base controller
// loads the models and views

class Controller{
    //load model
    public function model($model){
        //require model file
        require_once '../app/models/' . $model . '.php';

        //instatiate model
        return new $model();
    }

    //load view
    public function view($view, $data = []){
        //check for view files
        if (file_exists('../app/views/'.$view.'.php')) {
            require_once '../app/views/'.$view.'.php';
        }
        else {
            //view does not exist
            die('view does not exist');
        }
    }
}