<?php

class Users extends Controller{
    private $userModel;

    public function __construct()
    {
        $this->userModel=$this->model('User'); 
    }

    //function controllers

    public function signup(){
        //check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form

            //sanitize data
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            //inti data
            $data=[
                'age'=>trim($_POST['age']),
                'gender'=>trim($_POST['gender']),
                'email'=>trim($_POST['email']),
                'university'=>trim($_POST['university']),
                'faculty'=>trim($_POST['faculty']),
                'year'=>trim($_POST['year']),
                'username'=>trim($_POST['username']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                'signup_alert'=>'',
            ];

            // Check if the age is within the specified range
            if ($data['age'] < 18 || $data['age'] > 25) {
                $data['signup_alert'] = 'Age must be between 18 and 25';
            }

            elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['signup_alert'] = 'Invalid email format';
            } 
            
            else {
                    // Extract domain from the email address
                    $emailParts = explode('@', $data['email']);
                    $domain = isset($emailParts[1]) ? $emailParts[1] : '';
            
                    // Define allowed domain names
                    $allowedDomains = [
                        'stu.ucsc.cmb.ac.lk',
                        'fos.uoc.cmb.ac.lk',
                        'foa.uoc.cmb.ac.lk'
                        // Add more allowed domains if needed
                    ];
            
                    // Check if the extracted domain is in the allowed list
                    if (!in_array($domain, $allowedDomains)) {
                        $data['signup_alert'] = 'Email domain is not allowed';
                    } else {
                        // Check if the email is already taken
                        if ($this->userModel->findUserByEmail($data['email'])) {
                            $data['signup_alert'] = 'Email is already taken';
                        }
                    }
                }
            

            if($this->userModel->findUserByUsername($data['username'])){
                $data['signup_alert']='Username is already taken'; 
            }
            
            elseif(strlen($data['password'])<8){
                $data['signup_alert']='Password must be atleast 8 characters'; 
            }

            elseif($data['password']!=$data['confirm_password']){
                $data['signup_alert']='passwords do not match';
            }
            
            //make sure errors are empty
            if(empty($data['signup_alert'])){
                //validate

                //hash password
                $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);

                //regsiter user
                if($this->userModel->register($data)){
                    flash('register_success','You are registered and can login');
                    redirect('users/login');
                }else{
                    die('Something went wrong');
                }

            }else{
                $this->view('users/signup',$data);
            }

        } else {
            //load form
            $data=[
                'age'=>'',
                'gender'=>'',
                'email'=>'',
                'university'=>'',
                'faculty'=>'',
                'year'=>'',
                'username'=>'',
                'password'=>'',
                'confirm_password'=>'',
            ];
            $this->view('users/signup', $data);
        }
    } 
    
    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //process form
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            //init data
            $data=[
                
                'username'=>trim($_POST['username']),
                'password'=>trim($_POST['password']),
                'username_err'=>'',
                'password_err'=>'',

            ];
             //validate email
             if(empty($data['username'])){
                $data['username_err']='Please enter username';      
            }
             //validate password
            if(empty($data['password'])){
                $data['password_err']='Please enter password';      
            }

            //check for username
            if($this->userModel->findUserByUsername($data['username'])){
                //user found
            }else{
                $data['username_err']='No user found';
            }
            
            //make sure errors are empty
            if(empty($data['username_err']) && empty($data['password_err'])){
                //validate
                //chek and set logged in user
                $loggedInUser=$this->userModel->login($data['username'],$data['password']);

                if($loggedInUser){
                    //create session
                    // die('SUCCESS');
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_err']='Password incorrect';
                    $this->view('users/login',$data);
                }
            }else{
                $this->view('users/login',$data);
            }
        }else{
            //init data
            $data=[
                'username'=>'',
                'password'=>'',
                'username_err'=>'',
                'password_err'=>'',

            ];
            $this->view('users/login',$data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['user_name'] = $user->username;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_type'] = $user->user_type;

        if ($user->user_type === 'undergraduate') {
            redirect('undergrad/home');
        } elseif ($user->user_type === 'admin') {
            redirect('admin/ad_home');
        } elseif ($user->user_type === 'pcounsellor') {
            redirect('procounsellor/pc_home');
        } elseif ($user->user_type === 'acounsellor') {
            redirect('academic/ac_home');
        } elseif ($user->user_type === 'doctor'){
            redirect('doctor/doc_home');
        }
    }
    
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_type']);
        session_destroy();
        redirect('');
    }

    public function isLoggedIn(){
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUG($id){
        
  
        if($this->userModel->deleteUndergrad($id)){
        //   flash('post_message', 'user Removed');
          redirect('admin/ad_users');
        } else {
          die('Something went wrong');
        }
    }

    public function deleteCoun($id){
        
  
        if($this->userModel->deleteCounselor($id)){
        //   flash('post_message', 'user Removed');
          redirect('admin/ad_users');
        } else {
          die('Something went wrong');
        }
    }
    
    public function deleteDoc($id){
        
  
        if($this->userModel->deleteDoctor($id)){
        //   flash('post_message', 'user Removed');
          redirect('admin/ad_users');
        } else {
          die('Something went wrong');
        }
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
                $this->view('undergrad/feedback', $data);
            }
        }
    }
}