<?php
class Academic extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel = $this->model('User');
        $this->adminModel = $this->model('Administrator');
        $this->acModel = $this->model('ACounsellor');
    }

    //page view controllers

    public function dashboard()
    {
        $data = [];
        $this->view('academic/dashboard', $data);
    }

    public function ac_home()
    {
        $data = [];
        $this->view('academic/ac_home', $data);
    }

    public function ac_opletters()
    {
        $data = [];
        $this->view('academic/ac_opletters', $data);
    }

    public function ac_undergrads()
    {
        $data = [];
        $this->view('academic/ac_undergrads', $data);
    }

    public function ac_chats()
    {
        $data = [];
        $this->view('academic/ac_chats', $data);
    }

    public function ac_counselors()
    {
        $data = [];
        $this->view('academic/ac_counselors', $data);
    }

    public function ac_doctors()
    {
        $data = [];
        $this->view('academic/ac_doctors', $data);
    }

    public function ac_timeslots()
    {   
        $username = $this->userModel->getUsernameById($_SESSION['user_id']);
        $timeslot = $this->acModel->getTimeslots($username);
        $data = [
            'slot_type' => '',
            'timeslot' => $timeslot,
        ];
        $this->view('academic/ac_timeslots', $data);
    }

    public function ac_undergraduate2()
    {
        $data = [];
        $this->view('academic/ac_undergraduate2', $data);
    }

    public function ac_undergraduate4()
    {
        $data = [];
        $this->view('academic/ac_undergraduate4', $data);
    }

    public function ac_profile()
    {
        $data = [];
        $this->view('academic/ac_profile', $data);
    }

    public function ac_feedback()
    {
        $data = [];
        $this->view('academic/ac_feedback', $data);
    }

    //function controllers

    public function changePwdAcademic($user_id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'current_password' => trim($_POST['current_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'current_password err' => '',
                'new_password_err' => '',
                'confirm_password_err' => ''
            ];

            if (empty($data['current_password'])) {
                $data['current_password_err'] = 'please enter the current password';
            }
            if (empty($data['new_password'])) {
                $data['new_password_err'] = 'please enter the new password';
            } elseif (strlen($data['new_password'] < 6)) {
                $data['new_password_err'] = 'please enter 6 or more characters';
            }
            if (empty($data['confirm_password_err'])) {
                $data['confirm_password_err'] = 'please re-enter new password';
            } else {
                if ($data['new_password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'password does not match';
                }
            }

            if (empty($data['current_password_err']) && empty($data['new_password_err']) && empty($data['confirm_password_err'])) {

                $hashed_pwd_from_db = $this->userModel->getPasswordById($user_id);

                if (!password_verify($data['current_password'], $hashed_pwd_from_db)) {
                    $data['current_password_err'] = 'current password is incorrect';
                } else {
                    $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

                    if ($this->userModel->updatePassword($user_id, $data['new_password'])) {
                        flash('user_message', 'Password updated successfully');
                        redirect('academic/ac_profile');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                $this->view('academic/ac_profile', $data);
            }
        } else {
            $data = [
                'current_password' => '',
                'new_password' => '',
                'confirm_password' => '',
                'current_password_err' => '',
                'new_password_err' => '',
                'confirm_password_err' => ''
            ];

            $this->view('academic/ac_profile', $data);
        }

        $this->view('academic/ac_profile', $data);
    }

    public function changeUsernameAcademic($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'current_username' => trim($_POST['current_username']),
                'new_username' => trim($_POST['new_username']),
                'current_username_err' => '',
                'new_username_err' => ''
            ];

            if (empty($data['current_username'])) {
                $data['current_username_err'] = 'Please enter current username';
            }
            if (empty($data['new_username'])) {
                $data['new_username_err'] = 'Please enter new username';
            }

            if (empty($data['current_username_err']) && empty($data['new_username_err'])) {
                // Validated

                // Fetch the current username from db
                $current_username = $this->userModel->getUsernameById($user_id);

                //
                if (($data['current_username'] != $current_username)) {
                    $data['current_username_err'] = 'Current username is incorrect';
                } else {

                    // Update the username
                    if ($this->userModel->updateUsername($user_id, $data['new_username'])) {
                        // flash('user_message', 'Username updated successfully');
                        redirect('academic/ac_profile');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Load view with errors
                $this->view('academic/ac_profile', $data);
            }
        } else {
            $data = [
                'current_username' => '',
                'new_username' => '',
                'current_username_err' => '',
                'new_username_err' => ''
            ];

            $this->view('academic/ac_profile', $data);
        }

        $this->view('academic/ac_profile', $data);
    }

    public function addTimeslots($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

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
                redirect('academic/ac_timeslots');
            } else {
                die('Something went wrong');
            }
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
                $this->view('academic/ac_feedback', $data);
            }
        }
    }
}
