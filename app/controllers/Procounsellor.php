<?php

class Procounsellor extends Controller
{


    private $userModel;
    private $pcModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel = $this->model('User');
        $this->pcModel = $this->model('PCounsellor');
    }

    public function dashboard()
    {
        $data = [];
        $this->view('procounsellor/dashboard', $data);
    }

    public function pc_home()
    {
        $data = [];
        $this->view('procounsellor/pc_home', $data);
    }

    public function pc_reviewq()
    {
        $data = [];
        $this->view('procounsellor/pc_reviewq', $data);
    }

    public function pc_undergrad()
    {
        $data = [];
        $this->view('procounsellor/pc_undergrad', $data);
    }

    public function pc_chats()
    {
        $data = [];
        $this->view('procounsellor/pc_chats', $data);
    }

    public function pc_counselors()
    {
        $data = [];
        $this->view('procounsellor/pc_counselors', $data);
    }

    public function pc_profileupdate()
    {
        $data = [
            'current_password_err' => '',
            'new_password_err' => '',
            'confirm_password_err' => '',
            'current_username_err' => '',
            'new_username_err' => ''
        ];
        $this->view('procounsellor/pc_profileupdate', $data);
    }

    public function pc_doctors()
    {
        $data = [];
        $this->view('procounsellor/pc_doctors', $data);
    }

    public function pc_timeslot()
    {
        $username = $this->userModel->getUsernameById($_SESSION['user_id']);
        $timeslot = $this->pcModel->getTimeslots($username);
        $data = [
            'slot_type' => '',
            'timeslot' => $timeslot,
        ];
        $this->view('procounsellor/pc_timeslot', $data);
    }

    public function pc_feedback()
    {
        $data = [];
        $this->view('procounsellor/pc_feedback', $data);
    }

    public function sentFeedback($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter the title';
            }
            if (empty($data['content'])) {
                $data['content_err'] = 'Please enter the content';
            }

            if (empty($data['title_err']) && empty($data['content_err'])) {
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
                $this->view('procounsellor/pc_feedback', $data);
            }
        }
    }

    public function changePwdProcounsellor($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'current_password' => trim($_POST['current_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'current_password_err' => '',
                'new_password_err' => '',
                'confirm_password_err' => ''
            ];

            if (empty($data['current_password'])) {
                $data['current_password_err'] = 'Please enter current password';
            }

            if (empty($data['new_password'])) {
                $data['new_password_err'] = 'Please enter new password';
            } elseif (strlen($data['new_password']) < 6) {
                $data['new_password_err'] = 'Password must be atleast 6 characters';
            }

            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please re-enter new password';
            } else {
                if ($data['new_password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'passwords do not match';
                }
            }



            if (empty($data['username_err']) && empty($data['email_err']) && empty($data['confirm_password_err'])) {
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
                        redirect('procounsellor/dashboard');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Load view with errors
                $this->view('procounsellor/pc_profileupdate', $data);
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

            $this->view('procounsellor/pc_profileupdate', $data);
        }

        $this->view('procounsellor/pc_profileupdate', $data);
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

            if ($this->pcModel->createTimeslots($data)) {
                redirect('procounsellor/pc_timeslot');
            } else {
                die('Something went wrong');
            }
        }
    }
}
