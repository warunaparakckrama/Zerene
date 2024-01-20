<?php
class Academic extends Controller{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
    }

    public function dashboard(){
        $data = [];
        $this->view('academic/dashboard', $data);
    }

    public function ac_home(){
        $data = [];
        $this->view('academic/ac_home', $data);
    }

    public function ac_opletters(){
        $data = [];
        $this->view('academic/ac_opletters', $data);
    }

    public function ac_undergrads(){
        $data = [];
        $this->view('academic/ac_undergrads', $data);
    }

    public function ac_chats(){
        $data = [];
        $this->view('academic/ac_chats', $data);
    }

    public function ac_counselors(){
        $data = [];
        $this->view('academic/ac_counselors', $data);
    }

    public function ac_doctors(){
        $data = [];
        $this->view('academic/ac_doctors', $data);
    }

    public function ac_timeslots(){
        $data = [];
        $this->view('academic/ac_timeslots', $data);
    }
    public function ac_undergraduate2(){
        $data = [];
        $this->view('academic/ac_undergraduate2', $data);
    }
    public function ac_undergraduate4(){
        $data = [];
        $this->view('academic/ac_undergraduate4',$data);
    }

}


?>