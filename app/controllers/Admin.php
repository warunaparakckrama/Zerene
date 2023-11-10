<?php

class Admin extends Controller{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel=$this->model('User');
        $this->adminModel=$this->model('Administrator');
    }

    public function ad_dashboard(){
        $data = [];
        $this->view('admin/ad_dashboard', $data);
    }

    public function ad_home(){
        $data = [];
        $this->view('admin/ad_home', $data);
    }

    public function ad_reg_admin(){
        //check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //sanitize data
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data=[
                'username'=>trim($_POST['username']),
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                'username_err'=>'',
                'email_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>'',
            ];

            if(empty($data['username'])){
                $data['username_err']='Please enter username';      
            }else {
                if($this->userModel->findUserByUsername($data['username'])){
                    $data['username_err']='Username is already taken'; 
                }
            }

            if(empty($data['email'])){
                $data['email_err']='Please enter email';      
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err']='Email is already taken'; 
                }
            }

            if(empty($data['password'])){
                $data['password_err']='Please enter password';      
            }elseif(strlen($data['password'])<6){
                $data['password_err']='Password must be atleast 6 characters'; 
            }

             if(empty($data['confirm_password'])){
                $data['confirm_password_err']='Please confirm password';      
            }else{
                if($data['password']!=$data['confirm_password']){
                    $data['confirm_password_err']='passwords do not match';
                }
            }

            if(empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){

                //hash password
                $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);

                if($this->userModel->reg_admin($data)){
                    // flash('register_success','You are registered and can login');
                    redirect('admin/ad_dashboard');
                }else{
                    die('Something went wrong');
                }

            }else{
                $this->view('admin/ad_reg_admin',$data);
            }
        } else{
            $data=[
                'username'=>'',
                'email'=>'',
                'password'=>'',
                'confirm_password'=>'',
                'username_err'=>'',
                'email_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>''
            ];

            $this->view('admin/ad_reg_admin', $data);
        }
    }

    public function ad_reg_counselor(){
        //check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
    
            //sanitize data
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            // $coun_type = $_POST['coun_type'];
            // $gender = $_POST['gender'];
            //inti data
            $data=[
                'coun_type'=>trim($_POST['coun_type']),
                'fname'=>trim($_POST['fname']),
                'lname'=>trim($_POST['lname']),
                'gender'=>trim($_POST['gender']),
                'dob'=>trim($_POST['dob']),
                'university'=>trim($_POST['university']),
                'faculty'=>trim($_POST['faculty']),
                'email'=>trim($_POST['email']),
                'username'=>trim($_POST['username']),
                'password'=>trim($_POST['password']),
                'coun_type_err'=>'',
                'fname_err'=>'',
                'lname_err'=>'',
                'gender_err'=>'',
                'dob_err'=>'',
                'university_err'=>'',
                'faculty_err'=>'',
                'email_err'=>'',
                'username_err'=>'',
                'password_err'=>'',
    
                ];
                
                if(empty($data['coun_type'])){
                    $data['coun_type_err']='Please select type';      
                }

                if(empty($data['fname'])){
                    $data['fname_err']='Please enter first name';      
                }
    
                if(empty($data['lname'])){
                    $data['lname_err']='Please enter last name';      
                }

                if(empty($data['gender'])){
                    $data['gender_err']='Please select gender';      
                }
                
                if(empty($data['dob'])){
                    $data['dob_err']='Please enter date of birth';      
                }

                if(empty($data['university'])){
                    $data['university_err']='Please enter university';      
                }

                if(empty($data['faculty'])){
                    $data['faculty_err']='Please enter faculty';      
                }
    
                if(empty($data['email'])){
                    $data['email_err']='Please enter email';      
                }else{
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err']='Email is already taken'; 
                    }
                }
    
                //validate username
                if(empty($data['username'])){
                    $data['username_err']='Please enter username';      
                }else {
                    if($this->userModel->findUserByUsername($data['username'])){
                        $data['username_err']='Username is already taken'; 
                    }
                }
    
                //validate password
                if(empty($data['password'])){
                    $data['password_err']='Please enter password';      
                }elseif(strlen($data['password'])<6){
                    $data['password_err']='Password must be atleast 6 characters'; 
                }
    
                //make sure errors are empty
                if(empty($data['coun_type_err']) && empty($data['fname_err']) && empty($data['lname_err']) && empty($data['gender_err']) && empty($data['dob_err']) && empty($data['university_err']) && empty($data['faculty_err']) && empty($data['email_err']) && empty($data['username_err']) && empty($data['password_err'])){
                    //validate
    
                    //hash password
                    $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
    
                    //regsiter user
                    if($this->userModel->reg_counselor($data)){
                        // flash('register_success','You are registered and can login');
                        redirect('admin/ad_dashboard');
                    }else{
                        die('Something went wrong');
                    }
    
                }else{
                    $this->view('admin/ad_reg_counselor',$data);
                }
    
            } else {
                //load form
                $data=[
                'coun_type'=>'',
                'fname'=>'',
                'lname'=>'',
                'gender'=>'',
                'dob'=>'',
                'university'=>'',
                'faculty'=>'',
                'email'=>'',
                'username'=>'',
                'password'=>'',
                'coun_type_err'=>'',
                'fname_err'=>'',
                'lname_err'=>'',
                'gender_err'=>'',
                'dob_err'=>'',
                'university_err'=>'',
                'faculty_err'=>'',
                'email_err'=>'',
                'username_err'=>'',
                'password_err'=>''
    
                ];
                $this->view('admin/ad_reg_counselor', $data);
            }
        
        // $data = [];
        $this->view('admin/ad_reg_counselor', $data);
    }

    public function ad_reg_doctor(){
        //check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
    
            //sanitize data
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            // $coun_type = $_POST['coun_type'];
            // $gender = $_POST['gender'];
            //inti data
            $data=[
                'fname'=>trim($_POST['fname']),
                'lname'=>trim($_POST['lname']),
                'gender'=>trim($_POST['gender']),
                'university'=>trim($_POST['university']),
                'hospital'=>trim($_POST['hospital']),
                'email'=>trim($_POST['email']),
                'contact_num'=>trim($_POST['contact_num']),
                'username'=>trim($_POST['username']),
                'password'=>trim($_POST['password']),
                'fname_err'=>'',
                'lname_err'=>'',
                'gender_err'=>'',
                'university_err'=>'',
                'hospital_err'=>'',
                'email_err'=>'',
                'contact_num_err'=>'',
                'username_err'=>'',
                'password_err'=>'',
    
                ];

                if(empty($data['fname'])){
                    $data['fname_err']='Please enter first name';      
                }
    
                if(empty($data['lname'])){
                    $data['lname_err']='Please enter last name';      
                }

                if(empty($data['gender'])){
                    $data['gender_err']='Please select gender';      
                }
                
                if(empty($data['university'])){
                    $data['university_err']='Please enter university';      
                }

                if(empty($data['hospital'])){
                    $data['hospital_err']='Please enter hospital';      
                }
    
                if(empty($data['email'])){
                    $data['email_err']='Please enter email';      
                }else{
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err']='Email is already taken'; 
                    }
                }

                if(empty($data['contact_num'])){
                    $data['contact_num_err']='Please enter contact_number';      
                }
    
                //validate username
                if(empty($data['username'])){
                    $data['username_err']='Please enter username';      
                }else {
                    if($this->userModel->findUserByUsername($data['username'])){
                        $data['username_err']='Username is already taken'; 
                    }
                }
    
                //validate password
                if(empty($data['password'])){
                    $data['password_err']='Please enter password';      
                }elseif(strlen($data['password'])<6){
                    $data['password_err']='Password must be atleast 6 characters'; 
                }
    
                //make sure errors are empty
                if(empty($data['fname_err']) && empty($data['lname_err']) && empty($data['gender_err']) && empty($data['university_err']) && empty($data['hospital_err']) && empty($data['email_err']) && empty($data['contact_num_err']) && empty($data['username_err']) && empty($data['password_err'])){
                    //validate
    
                    //hash password
                    $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
    
                    //regsiter user
                    if($this->userModel->reg_doctor($data)){
                        // flash('register_success','You are registered and can login');
                        redirect('admin/ad_dashboard');
                    }else{
                        die('Something went wrong');
                    }
    
                }else{
                    $this->view('admin/ad_reg_doctor',$data);
                }
    
            } else {
                //load form
                $data=[
                'fname'=>'',
                'lname'=>'',
                'gender'=>'',
                'university'=>'',
                'hospital'=>'',
                'email'=>'',
                'contact_num'=>'',
                'username'=>'',
                'password'=>'',

                'fname_err'=>'',
                'lname_err'=>'',
                'gender_err'=>'',
                'university_err'=>'',
                'hospital_err'=>'',
                'email_err'=>'',
                'contact_num_err'=>'',
                'username_err'=>'',
                'password_err'=>''
    
                ];
                $this->view('admin/ad_reg_doctor', $data);
            }
        
        $this->view('admin/ad_reg_doctor', $data);
    }

    public function ad_users(){

        //get counsellors
        $undergrads = $this->adminModel->getUndergrads();
        $counselors = $this->adminModel->getCounselors();
        $doctors = $this->adminModel->getDoctors();
        $admins = $this->adminModel->getAdmins();
        $data = [
            'undergrads' => $undergrads,
            'counselors' => $counselors,
            'doctors' => $doctors,
            'admins' => $admins
        ];
        $this->view('admin/ad_users', $data);
    }

    public function ad_edit_user($user_id){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
        $data = [
          'user_id' => '$user_id',
          'username' => trim($_POST['username']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => $_SESSION['confirm_password'],
          'username_err'=>'',
          'email_err'=>'',
          'password_err'=>'',
          'confirm_password_err'=>'',
          
        ];

        if($this->userModel->findUserByUsername($data['username'])){
            $data['username_err']='Username is already taken'; 
        }

        if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err']='Email is already taken'; 
        }

        if($data['password']!=$data['confirm_password']){
            $data['confirm_password_err']='passwords do not match';
        }

        if(empty($data['username_err']) && empty($data['email_err'])&& empty($data['confirm_password_err'])){
            // Validated

            //hash password
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);

            if($this->userModel->updateUser($data)){
              flash('user_message', 'user Updated');
              redirect('admin/ad_dashboard');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('admin/ad_edit_user', $data);
          }
        
        }   
    
        else {
            $user=$this->userModel->findUserDetails($user_id);

            $data = [
            'user_id' => '$user_id',
            'username' => $user->username,
            'email'=>$user->email,
            'password_err'=>'',
          ];
    
          $this->view('admin/ad_edit_user', $data);
        }

        $this->view('admin/ad_edit_user', $data);
    }
}