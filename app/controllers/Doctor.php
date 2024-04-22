<?php

class Doctor extends Controller
{

    private $userModel;
    private $adminModel;
    private $acModel;
    private $docModel;
    private $ugModel;
    private $pcModel;
    private $chatModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel = $this->model('User');
        $this->adminModel = $this->model('Administrator');
        $this->acModel = $this->model('ACounsellor');
        $this->docModel = $this->model('psychiatrist');
        $this->ugModel = $this->model('Undergraduate');
        $this->pcModel = $this->model('PCounsellor');
        $this->chatModel = $this->model('ChatModel');
    }

    public function dashboard()
    {
        $data = [];
        $this->view('doctor/dashboard', $data);
    }

    public function doc_home()
    {
        $data = [];
        $this->view('doctor/doc_home', $data);
    }

    public function doc_questionnaires()
    {   
        $id = $_SESSION['user_id'];
        $doctor = $this->adminModel->getDoctorById($id);
        $undergrad = $this->adminModel->getUndergrads();
        $questionnaire = $this->ugModel->getQuestionnaireDetails();
        $response = $this->ugModel->getResponses();
        $direct = $this->pcModel->getUgDirectsforDoctor($id);
        $data = [
            'doctor' => $doctor,
            'undergrad' => $undergrad,
            'questionnaire' => $questionnaire,
            'response' => $response,
            'direct' => $direct
        ];
        $this->view('doctor/doc_questionnaires', $data);
    }

    public function doc_quiz_review($id)
    {   
        $response = $this->ugModel->getResponseByResponseId($id);
        $questionnaire = $this->ugModel->getQuestionnairesfromId($response->questionnaire_id);
        require_once APPROOT.'/controllers/Procounsellor.php';
        $PCController = new Procounsellor();
        $results = $PCController->quizResults($id);
        $data = [
            'response' => $response,
            'questionnaire' => $questionnaire,
            'results' => $results
        ];
        $this->view('doctor/doc_quiz_review', $data);
    }

    public function doc_professionals()
    {
        $counsellor = $this->adminModel->getCounselors();
        $doctor = $this->adminModel->getDoctors();
        $data = [
            'counsellor' => $counsellor,
            'doctor' => $doctor
        ];
        $this->view('doctor/doc_professionals', $data);
    }

    public function doc_chats()
    {   
        $id = $_SESSION['user_id'];
        $request = $this->ugModel->getMsgRequest();
        $doctor = $this->adminModel->getDoctorById($id);
        $all_counsellors = $this->adminModel->getCounselors();
        $all_doctors = $this->adminModel->getDoctors();
        $undergrad = $this->adminModel->getUndergrads();
        $connection = $this->chatModel->getChatConnection();
        $data = [
            'request' => $request,
            'doctor' => $doctor,
            'all_counsellors' => $all_counsellors,
            'all_doctors' => $all_doctors,
            'undergrad' => $undergrad,
            'connection' => $connection
        ];
        $this->view('doctor/doc_chats', $data);
    }

    public function doc_chatroom($user_id)
    {
        $id = $_SESSION['user_id'];
        $doctor = $this->adminModel->getDoctorById($id);
        $receiving_user = $this->userModel->findUserDetails($user_id);
        if ($receiving_user->user_type == 'undergraduate') {
            $msg_receiver = $this->adminModel->getUgById($user_id);
        } elseif ($receiving_user->user_type == 'pcounsellor') {
            $msg_receiver = $this->adminModel->getCounsellorById($user_id);
        } elseif ($receiving_user->user_type == 'doctor') {
            $msg_receiver = $this->adminModel->getDoctorById($user_id);
        }

        $receiver = $this->userModel->findUserDetails($user_id);
        $data = [
            'user_id' => $user_id,
            'doctor' => $doctor,
            'msg_receiver' => $msg_receiver,
            'receiver' => $receiver
        ];
        $this->view('doctor/doc_chatroom', $data);
    }

   

    public function doc_undergrad()
    {   
        $id = $_SESSION['user_id'];
        $direct = $this->docModel->getDirectedUndergrads($id);
        $undergrad = $this->adminModel->getUndergrads();
        $counsellor = $this->adminModel->getCounselors();
        $data = [
            'direct' => $direct,
            'undergrad' => $undergrad,
            'counsellor' => $counsellor
        ];
        $this->view('doctor/doc_undergrad', $data);
    }

    public function doc_prescription()
    {   
        $id = $_SESSION['user_id'];
        $direct = $this->docModel->getDirectedUndergrads($id);
        $undergrad = $this->adminModel->getUndergrads();
        $counsellor = $this->adminModel->getCounselors();
        $data = [
            'direct' => $direct,
            'undergrad' => $undergrad,
            'counsellor' => $counsellor
        ];
        $this->view('doctor/doc_prescription', $data);
    }

    public function doc_create_prescription($ug_user_id)
    {   
        $id = $_SESSION['user_id'];
        $doctor = $this->adminModel->getDoctorById($id);
        $undergrad = $this->adminModel->getUgById($ug_user_id);
        $data = [
            'doctor' => $doctor,
            'undergrad' => $undergrad,
            
        ];

        $this->view('doctor/doc_create_prescription', $data);
    }

    public function doc_timeslots()
    {
        $id = $_SESSION['user_id'];
        $timeslot = $this->docModel->getTimeslotsdoc($id);

        $data = [
            'timeslot' => $timeslot,
        ];

        $this->view('doctor/doc_timeslots', $data);
    }


    public function doc_profile()
    {   
        $id = $_SESSION['user_id'];
        $doctor = $this->adminModel->getDoctorById($id);
        $data = [
            'doctor' => $doctor
        ];
        $this->view('doctor/doc_profile', $data);
    }
    
    public function doc_view_profile($id){
        $doctor = $this->adminModel->getDoctorById($id);
        $data = [
            'doctor' => $doctor
        ];
        $this->view('doctor/doc_view_profile', $data);
    }

    public function changeUsernameDoc($user_id)
    {
        $doctor = $this->adminModel->getDoctorById($user_id);
        $current_username = $this->userModel->getUsernameById($user_id);
        $username = $this->userModel->getUsernames();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'doctor' => $doctor,
                'current_username' => $current_username,
                'username' => $username,
                'new_username' => trim($_POST['new_username']),
                'password' => trim($_POST['password']),
                'username_alert' => ''
            ];

            if (strlen($data['new_username']) < 8) {
                $data['username_alert'] = '*Username must be atleast 8 characters';
            } elseif ($data['new_username'] == $data['current_username']) {
                $data['username_alert'] = '*New username cannot be same as the current username';
            } else {
                // Convert the new_username to lowercase
                $newUsernameLower = strtolower($data['new_username']);

                foreach ($data['username'] as $username) {
                    // Convert each username in the array to lowercase
                    $existingUsernameLower = strtolower($username->username);

                    // Compare the lowercase versions of the usernames
                    if ($newUsernameLower === $existingUsernameLower) {
                        // If there is a match, set the alert message
                        $data['username_alert'] = '*Username already exists/ is a variation of current username';
                        break; // Exit the loop as soon as a match is found
                    }
                }
            }

            // Fetch the hashed password from the database based on the user ID
            $hashed_password_from_db = $this->userModel->getPasswordById($user_id);

            // Verify if the entered current password matches the hashed password from the database
            if (!password_verify($data['password'], $hashed_password_from_db)) {
                $data['username_alert'] = '*Incorrect Password';
            }

            if (empty($data['username_alert'])) {
                // Update the username
                if ($this->userModel->updateUsername($user_id, $data['new_username'])) {
                    flash('user_message', 'Username updated successfully');
                    redirect('doctor/doc_profile'); 
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('doctor/doc_profile', $data);
            }
        }

        $this->view('doctor/doc_profile', $data);
    }

    public function changePwdDoc($user_id)
    {

        $doctor = $this->adminModel->getDoctorById($user_id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'doctor' => $doctor,
                'current_password' => trim($_POST['current_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'password_alert' => '',
            ];

            if (strlen($data['new_password']) < 8) {
                $data['alert'] = '*Password must be atleast 8 characters';
            } else {
                if ($data['new_password'] != $data['confirm_password']) {
                    $data['alert'] = '*passwords do not match';
                }
            }

            if (empty($data['password_alert'])) {
                // Validated

                // Fetch the hashed password from the database based on the user ID
                $hashed_password_from_db = $this->userModel->getPasswordById($user_id);

                // Verify if the entered current password matches the hashed password from the database
                if (!password_verify($data['current_password'], $hashed_password_from_db)) {
                    $data['password_alert'] = '*Current password is incorrect';
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

        $this->view('undergrad/ug_profile', $data);
    }

    public function doc_template($id)
    {
        $prescription = $this->docModel->getPrescriptionById($id);
        $session_id = $_SESSION['user_id'];
        // $prescription = $this->docModel->getPrescription($session_id);
        $data = [
            'prescription'=> $prescription

        ];
        $this->view('doctor/doc_template', $data);
    }

    public function doc_ug_profile($id)
    {   
        $undergrad = $this->adminModel->getUgById($id);
        $data = [
            'undergrad' => $undergrad
        ];
        $this->view('doctor/doc_ug_profile', $data);
    }

    public function doc_undergrad3()
    {
        $data = [];
        $this->view('doctor/doc_undergrad3', $data);
    }

    public function doc_undergrad4()
    {
        $data = [];
        $this->view('doctor/doc_undergrad4', $data);
    }

    public function addTimeslotsDoc($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'slot_date' => trim($_POST['slot_date']),
                'slot_start' => trim($_POST['slot_start']),
                'slot_finish' => trim($_POST['slot_finish']),
                'slot_interval' => trim($_POST['slot_interval']),
                'slot_type' => trim($_POST['slot_type']),
                'slot_status' => '', // Add this line
                'created_by' => '', // Add this line
                'slot_date_err' => '',
                'slot_start_err' => '',
                'slot_finish_err' => '',
                'slot_interval_err' => '',
                'slot_type_err' => '',
            ];

            $data['created_by'] = $_SESSION['user_id'];

            if ($this->docModel->createTimeslotsDoc($data)) {
                redirect('doctor/doc_timeslots');
            } else {
                die('Something went wrong');
            }

            $username = $this->userModel->getUsernameById($user_id);
            $data['timeslot'] = $this->docModel->getTimeslotsDoc($username);
            $this->view('doctor/doc_timeslot', $data);
        }
        $this->view('doctor/doc_timeslots');
    }

    public function editTimeslotDoc($timeslotId)
    {
        $timeslot = $this->docModel->getTimeslotByIdDoc($timeslotId);

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

            $this->handleEditTimeslotDoc($data);
        }

        $this->view('doctor/doc_view_timeslot', $data);
    }


    private function handleEditTimeslotDoc(&$data)
    {
        if (empty($data['slot_date_err']) && empty($data['slot_start_err']) && empty($data['slot_finish_err']) && empty($data['slot_type_err'])) {
            if ($this->docModel->updateTimeslotDoc($data['timeslot'])) {
                redirect('doctor/doc_timeslot');
            } else {
                die('Something went wrong');
            }
        }
    }

    public function deleteTimeslotDoc($timeslotId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->docModel->deleteTimeslotDoc($timeslotId)) {
                redirect('doctor/doc_timeslot');
            } else {
                die('Something went wrong');
            }
        }
    }


    public function doc_view_timeslot($timeslotId)
    {
        $timeslot = $this->docModel->getTimeslotByIdDoc($timeslotId);

        if ($timeslot) {
            $data = [
                'timeslot' => $timeslot,
                'slot_date_err' => '',
                'slot_start_err' => '',
                'slot_finish_err' => '',
                'slot_type_err' => ''
            ];

            $this->view('doctor/doc_view_timeslot', $data);
        } else {
            die('Timeslot not found');
        }
    }

    public function addPrescription($doc_user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'ug_name' => trim($_POST['ug_name']),
                'age' => trim($_POST['age']),
                'gender' => trim($_POST['gender']),
                'diagnosed_with' => trim($_POST['diagnosed_with']),
                'diagnosed_by' => trim($_POST['diagnosed_by']),
                'doc_user_id' => $doc_user_id,
            ];

            //insert data into 'medicine' table
            $drug = $_POST['drug'];
            $unit = $_POST['unit'];
            $dosage = $_POST['dosage'];
            $unitType = $_POST['unit_type']; // Added
            $dosageType = $_POST['dosage_type']; // Added
            $numRecords = count($drug);

            // Initialize an empty array to store medicine data
            $medicine_data = [];

            for ($i = 0; $i < $numRecords; $i++) {
                $medicine_data[] = [
                    'drug' => $drug[$i],
                    'unit' => $unit[$i],
                    'dosage' => $dosage[$i],
                    'unit_type' => $unitType[$i], // Added
                    'dosage_type' => $dosageType[$i], // Added
                ];

            }

            if ($this->docModel->createPrescription($data, $medicine_data)) {
                $pres_id = $this->docModel->getLastCreatedPrescription();
                redirect('doctor/doc_template/' . $pres_id);
            } else {
                die('Something went wrong');
            }
        }
    }

    public function createTemplate()
    {
        $session_id = $_SESSION['user_id'];
        $data = $this->docModel->getprescription($session_id);
        $this->view('doctor/doc_template', $data);
    }

    public function doc_feedback()
    {
        $data = [];
        $this->view('doctor/doc_feedback', $data);
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
                $this->view('academic/ac_feedback', $data);
            }
        }
    }
}
