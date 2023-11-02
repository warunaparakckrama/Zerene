<?php

class Timeslot extends Controller{

    private $timeslotModel;
    private $userModel;


    public function __construct()
    {
        $this->timeslotModel = $this->model('TimeslotModel');
    }

    public function pc_timeslot(){
        $pc_timeslot = $this->timeslotModel->viewTimeSlot();

        $this->view('procounsellor/pc_timeslot' , $pc_timeslot);
    }

    public function timeslotCreate(){
        //check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form

                //sanitize data
                $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                //inti data
                $data=[
                    'date'=>trim($_POST['date']),
                    'time'=>trim($_POST['time']),
                    'place'=>trim($_POST['place']),
                    'err'=>''
                ];
                //validate age
                if(empty($data['date'])){
                    $data['err']='Please enter date';
                }

                //validate gender
                if(empty($data['time'])){
                    $data['err']='Please enter time';
                }

                //validate email
                if(empty($data['place'])){
                    $data['err']='Please select place';
                }

                //make sure errors are empty
                if(empty($data['err'])){
                    //validate
                    if($this->timeslotModel->createTimeslot($data)){
                        // $this->view('procounsellor/pc_timeslot',$data);
                        $this->pc_timeslot();
                    }else{
                        die('Something went wrong');
                    }

                }else{
                    $this->view('procounsellor/pc_timeslot',$data);
                }

            } else {
                //load form
                $data=[
                    'date'=>'',
                    'time'=>'',
                    'place'=>'',
                    'err'=>''
                ];

                //load view
                $this->view('procounsellor/pc_timeslot' , $data);
            }

    }

   public function timeslotDelete(){
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data=[
                'slot_id'=>trim($_POST['slot_id'])
            ];

               if($this->timeslotModel->deleteTimeslot($data)){
                   redirect('procounsellor/pc_timeslot');
               }
               else {
                   die('Something went wrong');
               }
       }
   }

   public function timeslotUpdateform(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data=[
            'date'=>trim($_POST['date']),
            'time'=>trim($_POST['time']),
            'place'=>trim($_POST['place']),
            'err'=>''
        ];

        $this->view('procounsellor/pc_timeslot', $data);
    }
}

public function timeslotUpdate(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Submitted form data
        // input data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data=[
            'date'=>trim($_POST['date']),
            'old_date'=>trim($_POST['old_date']),
            'time'=>trim($_POST['time']),
            'old_time'=>trim($_POST['old_time']),
            'place'=>trim($_POST['place']),
            'old_place'=>trim($_POST['old_place']),
            'err'=>''
        ];
        //validate age
        if(empty($data['date'])){
            $data['err']='Please enter date';
        }

        //validate gender
        if(empty($data['time'])){
            $data['err']='Please enter time';
        }

        //validate email
        if(empty($data['place'])){
            $data['err']='Please select place';
        }


        // Validation is completed and no error found
        if (empty($data['err'])){
            if ($this->timeslotModel->timeslotUpdate($data)){
                $this->view('procounsellor/pc_timeslot',$data);
            } else {
                die('Something went wrong');
            }
        } else {
            // Load view with errors
            $this->view('procounsellor/pc_timeslot',$data);
        }
    }
}


} 