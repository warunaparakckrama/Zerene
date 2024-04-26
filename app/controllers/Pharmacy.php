<?php

class Pharmacy extends Controller
{

    private $userModel;
    private $adminModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel = $this->model('User');
        $this->adminModel = $this->model('Administrator');
    }

    public function pharm_home(){
        $data = [
            'currentPage' => 'pharm_home'
        ];
        $this->view('pharmacy/pharm_home', $data);
    }
    
}
