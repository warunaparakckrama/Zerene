<?php

class Undergrad extends Controller
{

    private $userModel;
    private $adminModel;
    private $ugModel;
    private $timeslotModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel = $this->model('User');
        $this->adminModel = $this->model('Administrator');
        $this->ugModel = $this->model('Undergraduate');
        $this->timeslotModel = $this->model('Timeslot');
    }

    //user view controllers

    public function dashboard()
    {
        $data = [];
        $this->view('undergrad/dashboard', $data);
    }

    public function home()
    {
        $data = [];
        $this->view('undergrad/home', $data);
    }

    public function questionnaires()
    {   
        $questionnaire = $this->ugModel->getQuestionnaireDetails();
        $data = [
            'questionnaire' => $questionnaire
        ];
        $this->view('undergrad/questionnaires', $data);
    }

    public function quiz_view($questionnaire_id)
    {   
        $questionnaire = $this->ugModel->getQuestionnairesfromId($questionnaire_id);
        $question = $this->ugModel->getQuestionsfromQuestionnaireId($questionnaire_id);
        $answer = $this->ugModel->getAnswersfromQuestionnaireId($questionnaire_id);
        $data = [
            'questionnaire' => $questionnaire,
            'question' => $question,
            'answer' => $answer
        ];
        $this->view('undergrad/quiz_view', $data);
    }

    public function professionalcounsellors()
    {
        $data = [];
        $this->view('undergrad/professionalcounsellors', $data);
    }

    public function professionals()
    {   
        $id = $_SESSION['user_id'];
        $undergrad= $this->adminModel->getUgById($id);
        $counsellor = $this->adminModel->getCounselors();
        $doctor = $this->adminModel->getDoctors();
        $data = [
            'counsellor' => $counsellor,
            'undergrad' => $undergrad,
            'doctor' => $doctor
        ];
        $this->view('undergrad/professionals', $data);
    }

    public function view_timeslotpc()
    {
        $timeslot = $this->ugModel->getTimeslotsForUndergrad();
        $data = [
            'timeslot' => $timeslot
        ];
        $this->view('undergrad/view_timeslotpc', $data);

    }

    public function professional_profile($id)
    {
        $counsellor = $this->adminModel->getcounselors();
        $data = [
            'coun_id' => $id,
            'counsellor' => $counsellor
        ];
        $this->view('undergrad/professional_profile', $data);
    }

    public function doctors()
    {
        $data = [];
        $this->view('undergrad/doctors', $data);
    }

    public function doctorprofile()
    {
        $data = [];
        $this->view('undergrad/doctorprofile', $data);
    }

    public function chats()
    {
        $id = $_SESSION['user_id'];
        $request = $this->ugModel->getMsgRequest();
        $undergrad = $this->adminModel->getUgById($id);
        $counsellor = $this->adminModel->getCounselors();
        $data = [
            'request' => $request,
            'undergrad' => $undergrad,
            'counsellor' => $counsellor
        ];
        $this->view('undergrad/chats', $data);
    }

    public function resources()
    {
        $data = [];
        $this->view('undergrad/resources', $data);
    }

    public function ug_profile()
    {

        $undergrads = $this->adminModel->getUndergrads();
        $data = [
            'undergrads' => $undergrads,
            'current_password_err' => '',
            'new_password_err' => '',
            'confirm_password_err' => '',
            'current_username_err' => '',
            'new_username_err' => ''
        ];
        $this->view('undergrad/ug_profile', $data);
    }

    public function dass21_review()
    {
        $data = [];
        $this->view('undergrad/dass21_review', $data);
    }

    public function feedback()
    {
        $data = [];
        $this->view('undergrad/feedback', $data);
    }

    public function chatroom($user_id)
    {
        $receiver = $this->userModel->findUserDetails($user_id);
        $counsellor = $this->adminModel->getCounsellorById($user_id);
        $data = [
            'user_id' => $user_id,
            'receiver' => $receiver,
            'counsellor' => $counsellor
        ];
        $this->view('undergrad/chatroom', $data);
    }

    //function controllers

    public function changeUsernameUG($user_id)
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

                // Verify if the entered current password matches the hashed password from the database
                if (($data['current_username'] != $current_username)) {
                    $data['current_username_err'] = 'Current username is incorrect';
                } else {

                    // Update the username
                    if ($this->userModel->updateUsername($user_id, $data['new_username'])) {
                        flash('user_message', 'Username updated successfully');
                        redirect('undergrad/ug_profile');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Load view with errors
                $this->view('undergrad/ug_profile', $data);
            }
        } else {
            $data = [
                'current_username' => '',
                'new_username' => '',
                'current_username_err' => '',
                'new_username_err' => ''
            ];

            $this->view('undergrad/ug_profile', $data);
        }

        $this->view('undergrad/ug_profile', $data);
    }

    public function changePwdUG($user_id)
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
                        redirect('undergrad/ug_profile');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Load view with errors
                $this->view('undergrad/ug_profile', $data);
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

            $this->view('undergrad/ug_profile', $data);
        }

        $this->view('undergrad/ug_profile', $data);
    }

    public function viewTimeslots()
    {
        $data['timeslots'] = $this->userModel->getTimeslotsForUndergrad();

        if (isset($data['timeslots']) && is_array($data['timeslots'])) {
            $this->view('undergrad/view_timeslotpc', $data);
        } else {
            $defaultData = ['timeslots' => []];
            $this->view('undergrad/view_timeslotpc', $defaultData);
        }
    }

    public function reserveTimeslot($timeslotId)
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }

        $timeslotModel = new Timeslot();

        $timeslot = $timeslotModel->getTimeslotById($timeslotId);

        if (!$timeslot) {
            redirect('undergrad/view_timeslotpc');
        }

        $isReserved = $timeslotModel->isTimeslotReserved($timeslotId, $_SESSION['user_id']);

        if ($isReserved) {
            $result = $timeslotModel->cancelReservation($timeslotId, $_SESSION['user_id']);
        } else {
            $result = $timeslotModel->reserveTimeslot($timeslotId, $_SESSION['user_id']);
        }

        if ($result) {
            $_SESSION['success_message'] = $isReserved ? 'Reservation canceled successfully' : 'Timeslot reserved successfully';
        } else {
            $_SESSION['error_message'] = 'Failed to reserve or cancel timeslot';
        }

        redirect('undergrad/view_timeslotpc');
    }

    public function submitResponses($user_id) //questionnaire_id need to be resolved
    {
        $questionnaire_id = trim($_POST['questionnaire_id']);
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $user_id,
                'questionnaire_id' => $questionnaire_id,
                'responses' => []
            ];


            // Loop through each question and capture user responses
            for ($i = 1; $i <= 21; $i++) {
                $responseKey = 'q' . $i . '_response';

                if (isset($_POST[$responseKey])) {
                    // Assuming radio button values are integers (0, 1, 2, 3)
                    $data['responses'][$i] = intval($_POST[$responseKey]);
                }
            }

            // Validate and store responses
            if ($this->ugModel->storeResponses($data)) {
                flash('user_message', 'Responses stored successfully');
                redirect('undergrad/dass21_review'); // Adjust the redirect URL accordingly
            } else {
                die('Something went wrong');
            }
        }
        else {
            redirect('undergrad/quiz_view/' . $questionnaire_id);
        } 
    }

    public function MsgRequest($counsellor_id){
        $id = $_SESSION['user_id'];
        $undergrad= $this->adminModel->getUgById($id);
        $ug_id = $undergrad->ug_id;
        if ($this->ugModel->sendMsgRequest($ug_id, $counsellor_id)) {
            redirect('undergrad/counsellors');
        } else {
            die('Something went wrong');
        }
    }


}