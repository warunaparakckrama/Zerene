<?php

class Procounsellor extends Controller
{
    private $userModel;
    private $pcModel;
    private $ugModel;
    private $adminModel;
    private $counsellorModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel = $this->model('User');
        $this->ugModel = $this->model('Undergraduate');
        $this->adminModel = $this->model('Administrator');
        $this->counsellorModel = $this->model('Counsellor');
        $this->pcModel = $this->model('PCounsellor');
    }

    //page view controllers

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

    public function pc_createq()
    {
        $data = [
            'quiz_name' => '',
            'quiz_type' => '',
            'num_questions' => '',
            'num_answers' => '',
            'quiz_name_err' => '',
            'quiz_type_err' => '',
            'num_questions_err' => '',
            'num_answers_err' => ''
        ];
        $this->view('procounsellor/pc_createq', $data);
    }

    public function pc_undergrad()
    {
        $data = [];
        $this->view('procounsellor/pc_undergrad', $data);
    }

    public function pc_chats()
    {   
        $id = $_SESSION['user_id'];
        $request = $this->ugModel->getMsgRequest();
        $counsellor = $this->userModel->getCounsellorById($id);
        $undergrad = $this->adminModel->getUndergrads();
        $data = [
            'request' => $request,
            'counsellor' => $counsellor,
            'undergrad' => $undergrad
        ];
        $this->view('procounsellor/pc_chats', $data);
    }

    public function pc_chatroom($user_id){
        $receiver = $this->userModel->findUserDetails($user_id);
        $data = [
            'user_id' => $user_id,
            'receiver' => $receiver
        ];
        $this->view('procounsellor/pc_chatroom', $data);
    }

    public function pc_professionals()
    {   
        $counsellor = $this->userModel->getCounsellors();
        $doctor = $this->adminModel->getDoctors();
        $data = [
            'counsellor' => $counsellor,
            'doctor' => $doctor
        ];
        $this->view('procounsellor/pc_professionals', $data);
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
            'slot_date_err' => '',
            'slot_start_err' => '',
            'slot_finish_err' => '',
            'slot_type_err' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->handleCreateTimeslot($data, $username);
        }

        $this->view('procounsellor/pc_timeslot', $data);
    }

    public function pc_feedback()
    {
        $data = [];
        $this->view('procounsellor/pc_feedback', $data);
    }

    //function controllers
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

    public function changeUsernameProcounsellor($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'current_username' => trim($_POST['current_username']),
                'new_username' => trim($_POST['new_username']),
                'current_username_err' => '',
                'new_username_err' => '',
            ];

            if (empty($data['current_username'])) {
                $data['current_username_err'] = 'Please enter current username';
            }

            if (empty($data['new_username'])) {
                $data['new_username_err'] = 'Please enter new username';
            } elseif (strlen($data['new_username']) < 6) {
                $data['new_username_err'] = 'Username must be atleast 6 characters';
            }

            if (empty($data['current_username_err']) && empty($data['new_username_err'])) {
                // Validated

                // Fetch the username from the database based on the user ID
                $current_username = $this->userModel->getUsernameById($user_id);

                // Verify if the entered current username matches the username from the database
                if ($data['current_username'] != $current_username) {
                    $data['current_username_err'] = 'Current username is incorrect';
                } else {
                    // Update the user's username
                    if ($this->userModel->updateUsername($user_id, $data['new_username'])) {
                        flash('user_message', 'Username updated successfully');
                        redirect('procounsellor/pc_profileupdate');
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
                'current_username' => '',
                'new_username' => '',
                'current_username_err' => '',
                'new_username_err' => ''
            ];

            $this->view('procounsellor/pc_profileupdate', $data);
        }

        $this->view('procounsellor/pc_profileupdate', $data);
    }

    public function createQuestionnaire($user_id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'quiz_name' => trim($_POST['quiz_name']),
                'quiz_type' => trim($_POST['quiz_type']),
                'num_questions' => trim($_POST['num_questions']),
                'num_answers' => trim($_POST['num_answers']),
                'quiz_name_err' => '',
                'quiz_type_err' => '',
                'num_questions_err' => '',
                'num_answers_err' => '',
            ];

            if (empty($data['quiz_name'])) {
                $data['quiz_name_err'] = 'Please enter questionnaire name';
            }

            if (empty($data['quiz_type'])) {
                $data['quiz_type_err'] = 'Please select questionnaire type';
            }

            if (empty($data['num_questions'])) {
                $data['num_questions_err'] = 'Please enter number of questions';
            }

            if (empty($data['num_answers'])) {
                $data['num_answers_err'] = 'Please enter number of answers';
            }


            if (empty($data['quiz_name_err']) && empty($data['quiz_type_err']) && empty($data['num_questions_err']) && empty($data['num_answers_err'])) {
                // Validated

                // Create the questionnaire
                if ($this->counsellorModel->addQuestionnaire($user_id, $data)) {
                    $questionnaire_id = $this->counsellorModel->getLastInsertedQuizId(); // Adjust this based on your actual method to get the last inserted quiz ID
                    // Loop through each question and insert into the database
                    for ($i = 1; $i <= $data['num_questions']; $i++) {
                        $questionKey = 'question' . $i;

                        if (!empty($_POST[$questionKey])) {
                            $questionText = trim($_POST[$questionKey]);

                            // Insert the question into the database
                            $this->counsellorModel->addQuestion($questionnaire_id, $questionText);
                        }
                    }

                    // Capture and insert answers for each question
                    $j = $data['num_answers'];
                    for ($i = 1; $i <= $j; $i++) {

                        $answerKey = 'answer' . $i;

                        if (!empty($_POST[$answerKey])) {
                            $answerText = trim($_POST[$answerKey]);

                            // Insert the answer into the database
                            $this->counsellorModel->addAnswer($questionnaire_id, $i, $answerText);
                        }
                    }

                    flash('user_message', 'Questionnaire created successfully');
                    redirect('procounsellor/pc_createq');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('procounsellor/pc_createq', $data);
            }
        } else {
            $data = [
                'quiz_name' => '',
                'quiz_type' => '',
                'num_questions' => '',
                'num_answers' => '',
                'quiz_name_err' => '',
                'quiz_type_err' => '',
                'num_questions_err' => '',
                'num_answers_err' => ''
            ];

            $this->view('procounsellor/pc_createq', $data);
        }

        $this->view('procounsellor/pc_createq', $data);
    }

    public function addTimeslots($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'slot_date' => trim($_POST['slot_date']),
                'slot_start' => trim($_POST['slot_start']),
                'slot_finish' => trim($_POST['slot_finish']),
                'slot_type' => trim($_POST['slot_type']),
                'slot_status' => '', // Add this line
                'created_by' => '', // Add this line
                'slot_date_err' => '',
                'slot_start_err' => '',
                'slot_finish_err' => '',
                'slot_type_err' => '',
            ];

            if (empty($data['slot_date'])) {
                $data['slot_date_err'] = 'Please select a date.';
            }

            if (empty($data['slot_start'])) {
                $data['slot_start_err'] = 'Please select a start time.';
            }

            if (empty($data['slot_finish'])) {
                $data['slot_finish_err'] = 'Please select a finish time.';
            }

            if (empty($data['slot_type'])) {
                $data['slot_type_err'] = 'Please select a slot type.';
            }
            $this->handleCreateTimeslot($data, $user_id);

            $username = $this->userModel->getUsernameById($user_id);
            $data['timeslot'] = $this->pcModel->getTimeslots($username);

            $this->view('procounsellor/pc_timeslot', $data);
        }
        $this->view('procounsellor/pc_timeslot');
    }

    public function editTimeslot($timeslotId)
    {
        $timeslot = $this->pcModel->getTimeslotById($timeslotId);

        if (!$timeslot) {
            die('Timeslot not found');
        }

        $data = [
            'timeslot' => $timeslot,
            'slot_date_err' => '',
            'slot_start_err' => '',
            'slot_finish_err' => '',
            'slot_type_err' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['timeslot']->slot_date = trim($_POST['slot_date']);
            $data['timeslot']->slot_start = trim($_POST['slot_start']);
            $data['timeslot']->slot_finish = trim($_POST['slot_finish']);
            $data['timeslot']->slot_type = trim($_POST['slot_type']);

            $this->handleEditTimeslot($data);
        }

        $this->view('procounsellor/pc_view_timeslot', $data);
    }


    private function handleEditTimeslot(&$data)
    {
        if (empty($data['slot_date_err']) && empty($data['slot_start_err']) && empty($data['slot_finish_err']) && empty($data['slot_type_err'])) {
            if ($this->pcModel->updateTimeslot($data['timeslot'])) {
                redirect('procounsellor/pc_timeslot');
            } else {
                die('Something went wrong');
            }
        }
    }

    private function handleCreateTimeslot(&$data, $user_id)
    {
        $current_username = $this->userModel->getUsernameById($user_id);
        $data['created_by'] = $current_username;

        if (empty($data['slot_date_err']) && empty($data['slot_start_err']) && empty($data['slot_finish_err']) && empty($data['slot_type_err'])) {
            if ($this->pcModel->createTimeslots($data)) {
                redirect('procounsellor/pc_timeslot');
            } else {
                die('Something went wrong');
            }
        }
    }

    public function deleteTimeslot($timeslotId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->pcModel->deleteTimeslot($timeslotId)) {
                redirect('procounsellor/pc_timeslot');
            } else {
                die('Something went wrong');
            }
        }
    }


    public function pc_view_timeslot($timeslotId)
    {
        $timeslot = $this->pcModel->getTimeslotById($timeslotId);

        if ($timeslot) {
            $data = [
                'timeslot' => $timeslot, 
                'slot_date_err' => '', 
                'slot_start_err' => '',
                'slot_finish_err' => '',
                'slot_type_err' => ''
            ];

            $this->view('procounsellor/pc_view_timeslot', $data);
        } else {
            die('Timeslot not found');
        }
    }
}
