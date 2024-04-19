<?php

class Doctor extends Controller
{

    private $userModel;
    private $adminModel;
    private $acModel;
    private $docModel;
    private $ugModel;

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
        $undergrad = $this->adminModel->getUndergrads();
        $questionnaire = $this->ugModel->getQuestionnaireDetails();
        $response = $this->ugModel->getResponses();
        $data = [
            'undergrad' => $undergrad,
            'questionnaire' => $questionnaire,
            'response' => $response
        ];
        $this->view('doctor/doc_questionnaires', $data);
    }

    public function doc_professionals()
    {
        $data = [];
        $this->view('doctor/doc_professionals', $data);
    }

    public function doc_chats()
    {
        $data = [];
        $this->view('doctor/doc_chats', $data);
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

    public function prescription()
    {
        $username = $this->userModel->getUsernameById($_SESSION['user_id']);
        $prescription = $this->docModel->getPrescription($username);
        $data = [
            'gender' => '',
            'prescription' => $prescription,
        ];

        $this->view('doctor/prescription', $data);
    }

    public function doc_timeslots()
    {
        $username = $this->userModel->getUsernameById($_SESSION['user_id']);
        $timeslot = $this->acModel->getTimeslots($username);
        $data = [
            'slot_type' => '',
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

    public function doc_template()
    {

        $session_id = $_SESSION['user_id'];
        $prescription = $this->docModel->getPrescription($session_id);
        $data = ['prescription' => $prescription];
        $this->view('doctor/doc_template', $data);
    }

    public function doc_undergrad2()
    {
        $data = [];
        $this->view('doctor/doc_undergrad2', $data);
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
                redirect('doctor/doc_timeslots');
                # code...
            } else {
                die('Something went wrong');
            }
        }
    }

    public function addMedicine($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);



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
            } else {
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
                } else {
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
