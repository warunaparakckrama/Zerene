<?php

class Users extends Controller{


    public function __construct()
    {
        $this->userModel=$this->model('User'); 
    }

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
                'age_err'=>'',
                'gender_err'=>'',
                'email_err'=>'',
                'university_err'=>'',
                'faculty_err'=>'',
                'year_err'=>'',
                'username_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>''

            ];
            //validate age
            if(empty($data['age'])){
                $data['age_err']='Please enter age';      
            }

            //validate gender
            if(empty($data['gender'])){
                $data['gender_err']='Please enter gender';      
            }

            //validate email
            if(empty($data['email'])){
                $data['email_err']='Please enter email';      
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err']='Email is already taken'; 
                }
            }

            //validate university
            if(empty($data['university'])){
                $data['university_err']='Please enter university';      
            }

            //validate faculty
            if(empty($data['faculty'])){
                $data['faculty_err']='Please enter faculty';      
            }

            //validate year
            if(empty($data['year'])){
                $data['year_err']='Please enter year';      
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

             //validate confirm password
             if(empty($data['confirm_password'])){
                $data['confirm_password_err']='Please confirm password';      
            }else{
                if($data['password']!=$data['confirm_password']){
                    $data['confirm_password_err']='password not matching';
                }
            }

            //make sure errors are empty
            if(empty($data['age_err']) && empty($data['gender_err']) && empty($data['email_err']) && empty($data['university_err']) && empty($data['faculty_err']) && empty($data['year_err']) && empty($data['username_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
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
                'age_err'=>'',
                'gender_err'=>'',
                'email_err'=>'',
                'university_err'=>'',
                'faculty_err'=>'',
                'year_err'=>'',
                'username_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>''

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
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        redirect('undergrad/dashboard');
    }
    
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
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
}