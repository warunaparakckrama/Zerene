<?php

class Procounsellor extends Controller
{
    private $userModel;
    private $pcModel;
    private $ugModel;
    private $adminModel;
    private $counsellorModel;
    private $chatModel;

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
        $this->chatModel = $this->model('ChatModel');
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
        $undergrad = $this->adminModel->getUndergrads();
        $questionnaire = $this->ugModel->getQuestionnaireDetails();
        $response = $this->ugModel->getResponses();
        $data = [
            'undergrad' => $undergrad,
            'questionnaire' => $questionnaire,
            'response' => $response
        ];
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

    public function pc_createNotes($id)
    {
        $undergrad = $this->adminModel->getUgById($id);
        $coun_user_id = $_SESSION['user_id'];
        $note = $this->pcModel->getNotes($id, $coun_user_id);
        $data = [
            'undergrad' => $undergrad,
            'note' => $note,
        ];

        $this->view('procounsellor/pc_createNotes', $data);
    }

    public function pc_viewNote($noteID)
    {
        $note = $this->pcModel->getNotesFromID($noteID);
        $data = [
            'note' => $note,
        ];

        $this->view('procounsellor/pc_viewNote', $data);
    }

    public function pc_undergrad()
    {
        $id = $_SESSION['user_id'];
        $counsellor = $this->adminModel->getCounsellorById($id);
        $undergrad = $this->adminModel->getUndergrads();
        $request = $this->pcModel->getMsgRequestfromCounId($counsellor->coun_id);
        $data = [
            'undergrad' => $undergrad,
            'counsellor' => $counsellor,
            'request' => $request
        ];
        $this->view('procounsellor/pc_undergrad', $data);
    }

    public function pc_chats()
    {
        $id = $_SESSION['user_id'];
        $request = $this->ugModel->getMsgRequest();
        $counsellor = $this->adminModel->getCounsellorById($id);
        $all_counsellors = $this->adminModel->getCounselors();
        $all_doctors = $this->adminModel->getDoctors();
        $undergrad = $this->adminModel->getUndergrads();
        $connection = $this->chatModel->getChatConnection();
        $data = [
            'request' => $request,
            'counsellor' => $counsellor,
            'all_counsellors' => $all_counsellors,
            'all_doctors' => $all_doctors,
            'undergrad' => $undergrad,
            'connection' => $connection
        ];
        $this->view('procounsellor/pc_chats', $data);
    }

    public function pc_chatroom($user_id)
    {
        $id = $_SESSION['user_id'];
        $counsellor = $this->adminModel->getCounsellorById($id);
        $receiving_user = $this->userModel->findUserDetails($user_id);
        if ($receiving_user->user_type == 'undergraduate') {
            $msg_receiver = $this->adminModel->getUgById($user_id);
        } elseif ($receiving_user->user_type == 'pcounsellor' || $receiving_user->user_type == 'acounsellor') {
            $msg_receiver = $this->adminModel->getCounsellorById($user_id);
        } elseif ($receiving_user->user_type == 'doctor') {
            $msg_receiver = $this->adminModel->getDoctorById($user_id);
        }

        $receiver = $this->userModel->findUserDetails($user_id);
        $data = [
            'user_id' => $user_id,
            'counsellor' => $counsellor,
            'msg_receiver' => $msg_receiver,
            'receiver' => $receiver
        ];
        $this->view('procounsellor/pc_chatroom', $data);
    }

    public function pc_professionals()
    {
        $counsellor = $this->adminModel->getCounselors();
        $doctor = $this->adminModel->getDoctors();
        $data = [
            'counsellor' => $counsellor,
            'doctor' => $doctor
        ];
        $this->view('procounsellor/pc_professionals', $data);
    }

    public function pc_profile()
    {
        $id = $_SESSION['user_id'];
        $counsellor = $this->adminModel->getCounsellorById($id);
        $data = [
            'counsellor' => $counsellor,
        ];
        $this->view('procounsellor/pc_profile', $data);
    }

    public function pc_doctors()
    {
        $data = [];
        $this->view('procounsellor/pc_doctors', $data);
    }

    public function pc_timeslot()
    {
        $id = $_SESSION['user_id'];
        $timeslot = $this->pcModel->getTimeslots($id);
        $data = [
            'timeslot' => $timeslot,
        ];
        $this->view('procounsellor/pc_timeslot', $data);
    }

    public function pc_view_timeslot($timeslotId)
    {
        $reserve = $this->pcModel->getReserveDetails($timeslotId);
        $timeslot = $this->pcModel->getTimeslotById($timeslotId);
        if ($timeslot) {
            $data = [
                'reserve' => $reserve,
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

    public function pc_feedback()
    {
        $data = [];
        $this->view('procounsellor/pc_feedback', $data);
    }

    public function pc_ug_profile($id)
    {
        $coun_user_id = $_SESSION['user_id'];
        $direct = $this->pcModel->checkUgDirects($id, $coun_user_id);
        $undergrad = $this->adminModel->getUgById($id);
        $note = $this->pcModel->getNotes($id, $coun_user_id);
        $data = [
            'undergrad' => $undergrad,
            'direct' => $direct,
            'note' => $note
        ];
        $this->view('procounsellor/pc_ug_profile', $data);
    }

    public function pc_quiz_review($id)
    {
        $response = $this->ugModel->getResponseByResponseId($id);
        $questionnaire = $this->ugModel->getQuestionnairesfromId($response->questionnaire_id);
        $range = $this->pcModel->getRangesfromQuizId($response->questionnaire_id);
        $results = $this->quizResults($id);

        $data = [
            'response' => $response,
            'questionnaire' => $questionnaire,
            'results' => $results,
            'range' => $range
        ];
        $this->view('procounsellor/pc_quiz_review', $data);
    }

    public function pc_view_quiz_response($id)
    {
        $response = $this->ugModel->getResponseByResponseId($id);
        $questionnaire = $this->ugModel->getQuestionnairesfromId($response->questionnaire_id);
        $question = $this->ugModel->getQuestionsfromQuestionnaireId($response->questionnaire_id);
        $answer = $this->ugModel->getAnswersfromQuestionnaireId($response->questionnaire_id);
        $undergrad = $this->adminModel->getUgById($response->user_id);

        $data =[
            'response' =>$response,
            'questionnaire' =>$questionnaire,
            'question' => $question,
            'answer' => $answer,
            'undergrad' =>$undergrad
        ];

        $this->view('procounsellor/pc_view_quiz_response', $data);
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
                    redirect('procounsellor/pc_feedback');
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
        $counsellor = $this->adminModel->getCounsellorById($user_id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'counsellor' => $counsellor,
                'current_password' => trim($_POST['current_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'password_alert' => '',
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
                        redirect('procounsellor/pc_profile');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Load view with errors
                $this->view('procounsellor/pc_profile', $data);
            }
        }

        $this->view('procounsellor/pc_profile', $data);
    }

    public function changeUsernameProcounsellor($user_id)
    {
        $counsellor = $this->adminModel->getCounsellorById($user_id);
        $current_username = $this->userModel->getUsernameById($user_id);
        $username = $this->userModel->getUsernames();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'counsellor' => $counsellor,
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
                    redirect('procounsellor/pc_profile');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('procounsellor/pc_profile', $data);
            }
        }

        $this->view('procounsellor/pc_profile', $data);
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
                'num_ranges' => trim($_POST['num_ranges']),
                'm_factor' => trim($_POST['m_factor']),
            ];

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

                // Capture and insert ranges for the marking scheme
                $numRanges = $data['num_ranges'];
                $m_factor = $data['m_factor'];
                for ($i = 1; $i <= $numRanges; $i++) {
                    $minRangeKey = 'min_range' . $i;
                    $maxRangeKey = 'max_range' . $i;
                    $rangeNameKey = 'range_name' . $i;

                    if (!empty($_POST[$minRangeKey]) && !empty($_POST[$maxRangeKey]) && !empty($_POST[$rangeNameKey])) {
                        $minRange = trim($_POST[$minRangeKey]);
                        $maxRange = trim($_POST[$maxRangeKey]);
                        $rangeName = trim($_POST[$rangeNameKey]);

                        // Insert the range into the database
                        $this->counsellorModel->addRange($questionnaire_id, $minRange, $maxRange, $rangeName, $m_factor);
                    }
                }

                redirect('procounsellor/pc_createq');
            } else {
                die('Something went wrong');
            }
        } else {
            $data = [
                'quiz_name' => '',
                'quiz_type' => '',
                'num_questions' => '',
                'num_answers' => '',
                'num_ranges' => '',
            ];
        }

        $this->view('procounsellor/pc_createq', $data);
    }

    public function createNotes($id)
    {
        $coun_user_id = $_SESSION['user_id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'by_user_id' => $coun_user_id,
                'of_user_id' => $id,
                'heading' => trim($_POST['heading']),
                'content' => trim($_POST['content']),
                'heading_err' => '',
                'content_err' => '',
            ];

            if ($this->pcModel->addNotes($data)) {
                redirect('procounsellor/pc_ug_profile/' . $id);
            } else {
                die('Something went wrong');
            }
            $this->view('procounsellor/pc_createNotes/' . $id);
        }

        $data['note'] = $this->pcModel->getNotes($id, $coun_user_id);
        $this->view('procounsellor/pc_createNotes', $data);
    }

    public function editNote($noteID)
    {
        $note = $this->pcModel->getNotesFromID($noteID);

        if (!$note) {
            die('Note not found');
        }

        $data = [
            'note' => $note,
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['note']->heading = trim($_POST['heading']);
            $data['note']->content = trim($_POST['content']);

            if ($this->pcModel->updateNote($noteID)) {
                redirect('procounsellor/pc_ug_profile/' . $noteID);
            } else {
                die('Something went wrong');
            }
        }

        $this->view('procounsellor/pc_viewNote', $data);
    }

    public function deleteNote($noteID)
    {   
        $note = $this->pcModel->getNotesFromID($noteID);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->pcModel->deleteNote($noteID)) {
                redirect('procounsellor/pc_ug_profile/'. $note->of_user_id);
            } else {
                die('Something went wrong');
            }
        }
    }


    public function addTimeslots($user_id)
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

            if ($this->pcModel->createTimeslots($data)) {
                redirect('procounsellor/pc_timeslot');
            } else {
                die('Something went wrong');
            }

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

    public function changeSlotStatus($slotID)
    {
        $timeslot = $this->pcModel->getTimeslotById($slotID);
        $reserve =$this->pcModel->getReserveDetails($slotID);

        $data = [
            'timeslot' => $timeslot,
            'reserve' => $reserve
        ];
                    
            if ($this->pcModel->updateSlotStatus($slotID) && $this->pcModel->updateReserveCancel($reserve->reserve_id)) {
                redirect('procounsellor/pc_view_timeslot/'. $slotID);
            } else {
                die('Something went wrong');
            }
        

        $this->view('procounsellor/pc_view_timeslot', $data);
    }

    public function quizResults($id)
    {
        $response = $this->ugModel->getResponseByResponseId($id);
        $questionnaire = $this->ugModel->getQuestionnairesfromId($response->questionnaire_id);
        $range = $this->pcModel->getRangesfromQuizId($response->questionnaire_id);

        if ($questionnaire->questionnaire_name === 'DASS-21') {
            $Depression = '';
            $Anxiety = '';
            $Stress = '';
            $data = [
                'depression' => $Depression,
                'anxiety' => $Anxiety,
                'stress' => $Stress,
                'mark1' => 0,
                'mark2' => 0,
                'mark3' => 0
            ];
            $i = 1;
            $mark1 = 0;
            $mark2 = 0;
            $mark3 = 0;
            for ($i = 1; $i <= 7; $i++) {
                $mark1 = $response->{'q' . $i . '_response'} * 2 + $mark1;
            }

            for ($i = 8; $i <= 14; $i++) {
                $mark2 = $response->{'q' . $i . '_response'} * 2 + $mark2;
            }

            for ($i = 15; $i <= 21; $i++) {
                $mark3 = $response->{'q' . $i . '_response'} * 2 + $mark3;
            }
            $data['mark1'] = $mark1;
            $data['mark2'] = $mark2;
            $data['mark3'] = $mark3;

            //Depression
            if ($mark1 >= 28) {
                $Depression = 'Extremely Severe';
            } elseif ($mark1 >= 21) {
                $Depression = 'Severe';
            } elseif ($mark1 >= 14) {
                $Depression = 'Moderate';
            } elseif ($mark1 >= 10) {
                $Depression = 'Mild';
            } else {
                $Depression = 'Normal';
            }
            $data['depression'] = $Depression;

            //Anxiety
            if ($mark2 >= 20) {
                $Anxiety = 'Extremely Severe';
            } elseif ($mark2 >= 15) {
                $Anxiety = 'Severe';
            } elseif ($mark2 >= 10) {
                $Anxiety = 'Moderate';
            } elseif ($mark2 >= 8) {
                $Anxiety = 'Mild';
            } else {
                $Anxiety = 'Normal';
            }
            $data['anxiety'] = $Anxiety;

            //Stress
            if ($mark3 >= 34) {
                $Stress = 'Extremely Severe';
            } elseif ($mark3 >= 26) {
                $Stress = 'Severe';
            } elseif ($mark3 >= 19) {
                $Stress = 'Moderate';
            } elseif ($mark3 >= 15) {
                $Stress = 'Mild';
            } else {
                $Stress = 'Normal';
            }
            $data['stress'] = $Stress;

            return $data;
        } else {
            $i = 1;
            $mark = 0;
            $final_mark = '';
            $result = '';
            $data = [
                'final_mark' => $final_mark,
                'result' => $result,
            ];

            $num_of_quiz = $questionnaire->num_of_questions;
            for ($i = 1; $i <= $num_of_quiz; $i++) {
                $mark = $response->{'q' . $i . '_response'} + $mark;
            }

            foreach ($range as $range) {
                if ($mark >= $range->min_value && $mark <= $range->max_value) {
                    $final_mark = $mark * $range->multiply_by;
                    $result = $range->range_name;
                    $data['final_mark'] = $final_mark;
                    $data['result'] = $result;
                    break;
                }
            }

            return $data;
        }
    }

    public function ugDirects($ug_user_id)
    {
        $coun_user_id = $_SESSION['user_id'];
        $counsellor = $this->adminModel->getCounsellorById($coun_user_id);
        $doctor = $this->adminModel->getDoctors();

        foreach ($doctor as $doc) {
            if ($doc->uni_in_charge === $counsellor->university) {
                $doc_user_id = $doc->user_id;
            }
        }

        $data = [
            'coun_user_id' => $coun_user_id,
            'ug_user_id' => $ug_user_id,
            'doc_user_id' => $doc_user_id
        ];

        if ($this->pcModel->addUgDirects($data)) {
            redirect('procounsellor/pc_ug_profile/' . $ug_user_id);
        } else {
            die('Something went wrong');
        }
    }
}
