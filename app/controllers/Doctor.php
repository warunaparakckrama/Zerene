<?php

class Doctor extends Controller{

    private $userModel;
    private $adminModel;
    private $acModel;
    private $docModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel=$this->model('User'); 
        $this->adminModel = $this->model('Administrator');  
        $this->acModel=$this->model('ACounsellor');
        $this->docModel=$this->model('psychiatrist');
        
    
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
        $username = $this->userModel->getUsernameById($_SESSION['user_id']);
        $prescription = $this->docModel->getPrescription($username);
        $data = [
            'gender' => '',
            'prescription' => $prescription,
        ];
       
        $this->view('doctor/prescription', $data);
    } 
    
    public function doc_timeslots(){
        $username = $this->userModel->getUsernameById($_SESSION['user_id']);
        $timeslot = $this->acModel->getTimeslots($username);
        $data = [
            'slot_type' => '',
            'timeslot' => $timeslot,
        ];
       
        $this->view('doctor/doc_timeslots', $data);
    }
    
    public function doc_profile(){
        $data = [];
        $this->view('doctor/doc_profile', $data);
    }
    public function changeUsernameDoc($user_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'current_username' => trim($_POST['current_username']),
                'new_username' => trim($_POST['new_username']),
                'current_username_err'=>'',
                'new_username_err'=>''
            ];
        
            if(empty($data['current_username'])){
                $data['current_username_err']='Please enter current username';  
            }
            if(empty($data['new_username'])){
                $data['new_username_err']='Please enter new username';  
            }

            if(empty($data['current_username_err']) && empty($data['new_username_err'])){
                // Validated
    
                // Fetch the current username from db
                $current_username = $this->userModel->getUsernameById($user_id);
    
                // Verify if the entered current password matches the hashed password from the database
                if (($data['current_username'] != $current_username)) {
                    $data['current_username_err'] = 'Current username is incorrect';
                } else {

                    // Update the username
                    if ($this->userModel->updateUsername($user_id, $data['new_username'])) {
                    flash('user_message', 'Username updated successfully');
                    redirect('doctor/doc_profile');
                    } else {
                    die('Something went wrong');
                    }
                }

            } else {
                // Load view with errors
                $this->view('doctor/doc_profile', $data);
            }
        } 
        
        else {
            $data = [
            'current_username' => '',
            'new_username' => '',
            'current_username_err'=>'',
            'new_username_err'=>''
          ];
    
          $this->view('doctor/doc_profile', $data);
        }

        $this->view('doctor/doc_profile', $data);
    }

    public function changePwdDoc($user_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
        $data = [
          'current_password' => trim($_POST['current_password']),
          'new_password' => trim($_POST['new_password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'current_password_err'=>'',
          'new_password_err'=>'',
          'confirm_password_err'=>''
        ];

        if(empty($data['current_password'])){
            $data['current_password_err']='Please enter current password';      
        }

        if(empty($data['new_password'])){
            $data['new_password_err']='Please enter new password';      
        }elseif(strlen($data['new_password'])<6){
            $data['new_password_err']='Password must be atleast 6 characters'; 
        }

        if(empty($data['confirm_password'])){
            $data['confirm_password_err']='Please re-enter new password';      
        }else{
            if($data['new_password']!=$data['confirm_password']){
                $data['confirm_password_err']='passwords do not match';
            }
        }

        

        if(empty($data['username_err']) && empty($data['email_err'])&& empty($data['confirm_password_err'])){
            // Validated

            // Fetch the hashed password from the database based on the user ID
            $hashed_password_from_db = $this->userModel->getPasswordById($user_id);

            // Verify if the entered current password matches the hashed password from the database
            if (!password_verify($data['current_password'], $hashed_password_from_db)) {
                $data['current_password_err'] = 'Current password is incorrect';
            } else {
                // Hash the new password
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

                // Update the user's password
                if ($this->userModel->updatePassword($user_id, $data['new_password'])) {
                flash('user_message', 'Password updated successfully');
                redirect('doctor/doc_profile');
                } else {
                die('Something went wrong');
                }
            }

          } else {
            // Load view with errors
            $this->view('doctor/doc_profile', $data);
          }
        
        }   
    
        else {
            $data = [
            'current_password' => '',
            'new_password' => '',
            'confirm_password' => '',
            'current_password_err'=>'',
            'new_password_err'=>'',
            'confirm_password_err'=>''
          ];
    
          $this->view('doctor/doc_profile', $data);
        }

        $this->view('doctor/doc_profile', $data);

    }

    public function doc_template(){
        
        $session_id=$_SESSION['user_id'];
        $prescription= $this->docModel->getPrescription($session_id);
        $data = ['prescription'=> $prescription];
        $this->view('doctor/doc_template', $data);
    }  
   
    public function doc_undergrad2(){
        $data = [];
        $this->view('doctor/doc_undergrad2', $data);
    }  
    public function doc_undergrad3(){
        $data = [];
        $this->view('doctor/doc_undergrad3', $data);
    }  
    public function doc_undergrad4(){
        $data = [];
        $this->view('doctor/doc_undergrad4', $data);
    } 
    
    public function addTimeslotsDoc($user_id){
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = [
                'slot_date' => trim($_POST['slot_date']),
                'slot_start' => trim($_POST['slot_start']),
                'slot_finish' => trim($_POST['slot_finish']),
                'slot_type' => trim($_POST['slot_type']),
                'slot_status' => trim($_POST['slot_status']),
                'created_by' => trim($_POST['created_by']),
            ];
           $current_username = $this->userModel->getUsernameById($user_id);
           $data['created_by'] = $current_username;

           if ($this->acModel->createTimeslots($data)) {
            redirect('doctor/doc_timeslots');
            # code...
           }else{
            die('Something went wrong');
           }


        }
    }


    public function addMedicine($user_id){
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            

            $data = [
                'pres_date' => trim($_POST['pres_date']),
                'ug_name' => trim($_POST['ug_name']),
                'age' => trim($_POST['age']),
                'gender' => trim($_POST['gender']),
                'diagnosis_with' => trim($_POST['diagnosis_with']),
                'created_by' => trim($_POST['created_by']),
            ];

            $current_username = $this->userModel->getUsernameById($user_id);
            $data['created_by'] = $current_username;
 
            if ($this->docModel->createPrescription($data)) {
                redirect('doctor/doc_template');
                # code...
               } else{
                die('Something went wrong');
               }


                //insert data into 'medicine' table

                $drug = $_POST['drug'];
                $unit = $_POST['unit'];
                $dosage = $_POST['dosage'];
                var_dump($drug, $unit, $dosage);
    
                $numRecords = count($drug);
                for ($i = 0; $i < $numRecords; $i++) {
                    
                    $data = [
                        
                        'drug' => $_POST['drug'][$i],
                        'unit' => $_POST['unit'][$i],
                        'dosage' => $_POST['dosage'][$i],
                        
                    ];

                    $current_username = $this->userModel->getUsernameById($user_id);
                    $data['created_by'] = $current_username;
         
                    if ($this->docModel->addMedicineToTable($data)) {

             redirect('doctor/doc_template');
             # code...
            } else{
             die('Something went wrong');
            }
            
        }
    }
}


    public function doc_feedback()
    {
        $data = [];
        $this->view('doctor/doc_feedback', $data);
    }

    public function sentFeedback($user_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'type' => trim($_POST['type']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'title_err' => '',
                'content_err' => '',
            ];
        
            if(empty($data['title'])){
                $data['title_err']='Please enter the title';  
            }
            if(empty($data['content'])){
                $data['content_err']='Please enter the content';  
            }

            if(empty($data['title_err']) && empty($data['content_err'])){
                // Validated
    
                // Fetch the current username from db
                $username = $this->userModel->getUsernameById($user_id);
                $email = $this->userModel->getEmailById($user_id);
                $data['username'] = $username;
                $data['email'] = $email;

                // post notifications
                if ($this->userModel->addFeedback($data)) {
                    redirect('undergrad/feedback');
                    } else {
                    die('Something went wrong');
                    }

            } else {
                // Load view with errors
                $this->view('academic/ac_feedback', $data);
            }
        }
    }

    

}