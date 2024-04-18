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
        $id = $_SESSION['user_id'];
        $response = $this->ugModel->getResponsesById($id);
        $questionnaire = $this->ugModel->getQuestionnaireDetails();
        $data = [
            'questionnaire' => $questionnaire,
            'response' => $response
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

    public function professional_profile($id)
    {
        $counsellor = $this->adminModel->getcounsellorById($id);
        $doctor = $this->adminModel->getDoctorById($id);
        $data = [
            'counsellor' => $counsellor,
            'doctor' => $doctor,
            'id' => $id
        ];
        $this->view('undergrad/professional_profile', $data);
    }

    public function send_req_letter($id){
        $undergrad = $this->adminModel->getUgById($_SESSION['user_id']);
        $data = [
            'id' => $id,
            'undergrad' => $undergrad
        ];
        $this->view('undergrad/send_req_letter', $data);
    }

    public function view_timeslotpc()
    {
        $timeslot = $this->ugModel->getTimeslotsForUndergrad();
        $data = [
            'timeslot' => $timeslot
        ];
        $this->view('undergrad/view_timeslotpc', $data);

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
        $user_id = $_SESSION['user_id'];
        $request = $this->ugModel->getMsgRequest();
        $counsellor = $this->adminModel->getCounselors();
        $data = [
            'user_id' => $user_id,
            'request' => $request,
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
        $id = $_SESSION['user_id'];
        $undergrad = $this->adminModel->getUgById($id);
        $data = [
            'undergrad' => $undergrad
        ];
        $this->view('undergrad/ug_profile', $data);
    }

    public function quiz_review($quiz_id)
    {   
        $undergrad = $this->adminModel->getUgById($_SESSION['user_id']);
        $questionnaire = $this->ugModel->getQuestionnairesfromId($quiz_id);
        $counsellor = $this->adminModel->getCounselors();
        $data = [
            'id' => $_SESSION['user_id'],
            'questionnaire_id' => $quiz_id,
            'undergrad' => $undergrad,
            'questionnaire' => $questionnaire,
            'counsellor' => $counsellor

        ];
        $this->view('undergrad/quiz_review', $data);
    }

    public function feedback()
    {
        $data = [];
        $this->view('undergrad/feedback', $data);
    }

    public function chatroom($user_id)
    {
        $receiver = $this->userModel->findUserDetails($user_id);

        if ($receiver->user_type === 'acounsellor' || $receiver->user_type === 'pcounsellor') {
            $professional = $this->adminModel->getCounsellorById($user_id);
        }
        elseif ($receiver->user_type === 'doctor') {
            $professional = $this->adminModel->getDoctorById($user_id);
        }

        $counsellor = $this->adminModel->getCounsellorById($user_id);
        $data = [
            'user_id' => $user_id,
            'receiver' => $receiver,
            'professional' => $professional,
            'counsellor' => $counsellor
        ];
        $this->view('undergrad/chatroom', $data);
    }

    public function ug_view_profile($id){
        $undergrad = $this->adminModel->getUgById($id);
        $data = [
            'undergrad' => $undergrad
        ];
        $this->view('undergrad/ug_view_profile', $data);
    }

    //function controllers

    public function changeUsernameUG($user_id)
    {   
        $undergrad = $this->adminModel->getUgById($user_id);
        $current_username = $this->userModel->getUsernameById($user_id);
        $username = $this->userModel->getUsernames();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'undergrad' => $undergrad,
                'current_username' => $current_username,
                'username' => $username,
                'new_username' => trim($_POST['new_username']),
                'password' => trim($_POST['password']),
                'username_alert' => ''
            ];

            if (strlen($data['new_username']) < 8) {
                $data['username_alert'] = '*Username must be atleast 8 characters';
            }

            elseif($data['new_username'] == $data['current_username']) {
                $data['username_alert'] = '*New username cannot be same as the current username';
            }

            else {
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
                    redirect('undergrad/ug_profile'); 
                } else {
                    die('Something went wrong');
                }    
            } 

            else {
                // Load view with errors
                $this->view('undergrad/ug_profile', $data);
            }

        } 
        
        $this->view('undergrad/ug_profile', $data);
    }

    public function changePwdUG($user_id)
    {   
        $undergrad = $this->adminModel->getUgById($user_id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'undergrad' => $undergrad,
                'current_password' => trim($_POST['current_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'password_alert' => '',
            ];

            if (strlen($data['new_password']) < 8) {
                $data['alert'] = '*Password must be atleast 8 characters';
            }

            else {
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
                        redirect('undergrad/ug_profile');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Load view with errors
                $this->view('undergrad/ug_profile', $data);
            }
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
                redirect('undergrad/quiz_review/'. $questionnaire_id); // Adjust the redirect URL accordingly
            } else {
                die('Something went wrong');
            }
        }
        else {
            redirect('undergrad/quiz_view/' . $questionnaire_id);
        } 
    }

    public function MsgRequest($id){
        $ug_id = $_SESSION['user_id'];
        if ($this->ugModel->sendMsgRequest($ug_id, $id)) {
            redirect('undergrad/professionals');
        } else {
            die('Something went wrong');
        }
    }

    public function submitRequestLetter($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'from' => $id,
                'coun_id' => trim($_POST['coun_id']),
                'subject' => trim($_POST['subject']),
                'content' => trim($_POST['content']),
                'document_path' => null
            ];

            // Handle file upload
            if (isset($_FILES['document']) && $_FILES['document']['error'] === UPLOAD_ERR_OK) {
                $document = $_FILES['document'];

                $allowedMimeType = 'application/pdf';
                $maxFileSize = 2 * 1024 * 1024; // 2MB

                if ($document['type'] === $allowedMimeType && $document['size'] <= $maxFileSize) {
                    $fileName = time() . '_' . basename($document['name']);
                    $filePath = UPLOAD . 'documents/'.$fileName;
                    
                    // Move the uploaded file to the upload directory
                    if (move_uploaded_file($document['tmp_name'], $filePath)) {
                        // File uploaded successfully, set document_path
                        $data['document_path'] = $filePath;
                    } else {
                        // Handle file upload error
                        $data['upload_error'] = 'File upload failed';
                    }
                }   else {
                    // Handle file size exceeding maximum limit
                    $data['upload_error'] = 'File size exceeds the allowed limit';
                }
            }

            $coun_id = $data['coun_id'];

            if ($this->ugModel->addRequestLetter($data)) {
                redirect('undergrad/send_req_letter/'.$coun_id);
            } 
            else {
                die('something went wrong');
            }    
        }
    }


}