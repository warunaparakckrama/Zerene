<?php

class Pharmacy extends Controller
{

    private $userModel;
    private $adminModel;
    private $pharmModel;
    private $docModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel = $this->model('User');
        $this->adminModel = $this->model('Administrator');
        $this->pharmModel = $this->model('PharmModel');
        $this->docModel = $this->model('psychiatrist');
    }

    public function pharm_home(){
        $data = [
            'currentPage' => 'pharm_home'
        ];
        $this->view('pharmacy/pharm_home', $data);
    }

    public function pharm_profile(){
        $user_id = $_SESSION['user_id'];
        $pharmacy = $this->adminModel->getPharmacyById($user_id);
        $user_details = $this->userModel->findUserDetails($user_id);
        $data = [
            'pharmacy' => $pharmacy,
            'user_details' => $user_details,
        ];
        $this->view('pharmacy/pharm_profile', $data);
    }

    public function pharm_prescriptions(){
        $prescription = $this->pharmModel->getPrescriptions();
        $doctor = $this->adminModel->getDoctors();
        $data = [
            'prescription' => $prescription,
            'doctor' => $doctor,
        ];
        $this->view('pharmacy/pharm_prescriptions', $data);
    }

    public function pharm_feedback(){
        $data = [
            'currentPage' => 'pharm_feedback'
        ];
        $this->view('pharmacy/pharm_feedback', $data);
    }

    public function pharm_pres_view($pres_id){
        $prescription = $this->docModel->getPrescriptionById($pres_id);
        $medicine = $this->docModel->getMedicine($pres_id);
        $doctor = $this->adminModel->getDoctorById($prescription->doc_user_id);
        $data = [
            'prescription' => $prescription,
            'medicine' => $medicine,
            'doctor' => $doctor,
        ];
        $this->view('pharmacy/pharm_pres_view', $data);
    }

    public function changePwdPharm($user_id){
        $pharmacy = $this->adminModel->getPharmacyById($user_id);
        $user_details = $this->userModel->findUserDetails($user_id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'pharmacy' => $pharmacy,
                'user_details' => $user_details,
                'current_password' => trim($_POST['current_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'password_alert' => ''
            ];

            if (strlen($data['new_password']) < 8) {
                $data['password_alert'] = '*Password must be atleast 8 characters';
            } elseif ($data['new_password'] != $data['confirm_password']) {
                $data['password_alert'] = '*Passwords do not match';
            } elseif (empty($data['password_alert'])) {
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
                        redirect('pharmacy/pharm_profile');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                $this->view('pharmacy/pharm_profile', $data);
            }
        }

        $this->view('pharmacy/pharm_profile', $data);
    }

    public function changeUsernamePharm($user_id){

        $pharmacy = $this->adminModel->getPharmacyById($user_id);
        $user_details = $this->userModel->findUserDetails($user_id);
        $current_username = $this->userModel->getUsernameById($user_id);
        $username = $this->userModel->getUsernames();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'pharmacy' => $pharmacy,
                'user_details' => $user_details,
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
                    $_SESSION['user_name'] = $data['new_username'];
                    redirect('pharmacy/pharm_profile');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/pharm_profile', $data);
            }
        }

        $this->view('pharmacy/pharm_profile', $data);
    }

    public function markIssueStatus($pres_id){
        $this->pharmModel->markAsIssued($pres_id);
        redirect('pharmacy/pharm_prescriptions');
    }
    
}
