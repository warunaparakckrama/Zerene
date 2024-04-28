<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

class Academic extends Controller
{
    private $userModel;
    private $adminModel;
    private $acModel;
    private $ugModel;
    private $chatModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel = $this->model('User');
        $this->adminModel = $this->model('Administrator');
        $this->acModel = $this->model('ACounsellor');
        $this->ugModel = $this->model('Undergraduate');
        $this->chatModel = $this->model('ChatModel');
    }


    //page view controllers

    public function dashboard()
    {
        $data = [];
        $this->view('academic/dashboard', $data);
    }

    public function ac_home()
    {
        $newRequestCount = $this->acModel->countNewRequestLetters();
        $data = [
            'newRequestCount' => $newRequestCount
        ];
        $this->view('academic/ac_home', $data);
    }

    public function ac_opletters()
    {
        $id = $_SESSION['user_id'];

        // Get completed request letters
        $completedRequests = $this->acModel->getCompletedRequestLetters($id);

        // Get yet to complete request letters
        $yetToCompleteRequests = $this->acModel->getYetToCompleteRequestLetters($id);

        // Get opinion letters
        $letter = $this->acModel->getOpLetter($id);

        // Get undergrad data
        $undergrad = $this->adminModel->getUndergrads();

        $request = $this->acModel->getRequestLetterforCounsellor($id);

        $newRequestCount = $this->acModel->countNewRequestLetters();

        // Pass the data to the view
        // Sort yet to complete requests by date in descending order
        usort($yetToCompleteRequests, function ($a, $b) {
            return strtotime($b->sent_at) - strtotime($a->sent_at);
        });

        // Sort opinion letters by date in descending order
        usort($letter, function ($a, $b) {
            return strtotime($b->date) - strtotime($a->date);
        });


        $data = [
            'completedRequests' => $completedRequests,
            'yetToCompleteRequests' => $yetToCompleteRequests,
            'letter' => $letter,
            'undergrad' => $undergrad,
            'request' => $request,
            'newRequestCount' => $newRequestCount
        ];

        // Load the view and pass the data to it
        $this->view('academic/ac_opletters', $data);
    }

    public function ac_undergrads()
    {
        $id = $_SESSION['user_id'];
        $counsellor = $this->adminModel->getCounsellorById($id);
        $undergrad = $this->adminModel->getUndergrads();
        $data = [
            'undergrad' => $undergrad,
            'counsellor' => $counsellor,
        ];

        $this->view('academic/ac_undergrads', $data);
    }

    public function ac_chats()
    {
        $id = $_SESSION['user_id'];
        $request = $this->ugModel->getMsgRequest();
        $counsellor = $this->adminModel->getCounsellorById($id);
        $all_counsellors = $this->adminModel->getCounselors();
        $undergrad = $this->adminModel->getUndergrads();
        $connection = $this->chatModel->getChatConnection();
        $data = [
            'request' => $request,
            'counsellor' => $counsellor,
            'all_counsellors' => $all_counsellors,
            'undergrad' => $undergrad,
            'connection' => $connection
        ];
        $this->view('academic/ac_chats', $data);
    }

    public function ac_chatroom($user_id)
    {
        $id = $_SESSION['user_id'];
        $counsellor = $this->adminModel->getCounsellorById($id);
        $receiving_user = $this->userModel->findUserDetails($user_id);
        if ($receiving_user->user_type == 'undergraduate') {
            $msg_receiver = $this->adminModel->getUgById($user_id);
        } elseif ($receiving_user->user_type == 'pcounsellor' || $receiving_user->user_type == 'acounsellor') {
            $msg_receiver = $this->adminModel->getCounsellorById($user_id);
        }

        $receiver = $this->userModel->findUserDetails($user_id);
        $data = [
            'user_id' => $user_id,
            'counsellor' => $counsellor,
            'msg_receiver' => $msg_receiver,
            'receiver' => $receiver
        ];
        $this->view('academic/ac_chatroom', $data);
    }

    public function ac_professionals()
    {
        $counsellor = $this->adminModel->getCounselors();
        $doctor = $this->adminModel->getDoctors();
        $data = [
            'counsellor' => $counsellor,
            'doctor' => $doctor
        ];
        $this->view('academic/ac_professionals', $data);
    }

    public function ac_doctors()
    {
        $data = [];
        $this->view('academic/ac_doctors', $data);
    }

    public function ac_timeslots()
    {
        $id = $_SESSION['user_id'];
        $timeslot = $this->acModel->getTimeslots($id);
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

    public function ac_create_op_letter($id)
    {
        $req_letter_id = $id;
        $counsellor = $this->adminModel->getCounsellorById($_SESSION['user_id']);
        $request = $this->acModel->getReqLetterbyletterid($id);


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'subject' => trim($_POST['subject']),
                'content' => trim($_POST['content']),
                'req_letter_id' => $req_letter_id,
                'coun_user_id' => $_SESSION['user_id'],
                'coun_fname' => $counsellor->first_name,
                'coun_lname' => $counsellor->last_name,
                'coun_email' => $counsellor->email,
            ];

            if ($this->acModel->insertOpLetter($data)) {
                $this->sendEmail1($data, $request);
                $this->acModel->updateRequestLetterStatus($req_letter_id, 'completed');
                redirect('academic/ac_opletters');
            } else {
                die('Something went wrong');
            }

            // Load view with errors
            $this->view('academic/ac_create_op_letter', $data);
        } else {

            $data = [
                'subject' => '',
                'content' => '',
                'req_letter_id' => $req_letter_id,
                'coun_user_id' => $_SESSION['user_id'],

            ];
            $this->view('academic/ac_create_op_letter', $data);
        }
    }

    public function ac_profile()
    {
        $id = $_SESSION['user_id'];
        $counselor = $this->adminModel->getCounsellorById($id);
        $data = [
            'counselor' => $counselor
        ];
        $this->view('academic/ac_profile', $data);
    }

    public function ac_feedback()
    {
        $data = [];
        $this->view('academic/ac_feedback', $data);
    }

    public function req_letter($letter_id)
    {
        $data['letter details'] = $this->acModel->get_req_letter($letter_id);
        // die(var_dump($data));


        $this->view('academic/req_letter', $data);
    }

    public function ac_undergraduate_profile($id)
    {
        $undergraduate = $this->adminModel->getUgById($id);
        $data = [
            'undergraduate' => $undergraduate,
            'id' => $id
        ];
        $this->view('academic/ac_undergraduate_profile', $data);
    }

    public function ac_req_letter_view($letter_id)
    {
        $letter = $this->acModel->get_req_letter($letter_id);
        $data = [
            'letter' => $letter,
        ];
        //set notifi status to 1
        $this->acModel->updateRequestLetterNotifyStatus($letter_id, 1);

        $this->view('academic/ac_req_letter_view', $data);
    }

    public function ac_req_view_op($id)
    {
        $letter = $this->acModel->get_req_letter($id);

        $data = [
            'letter' => $letter,
        ];
        $this->view('academic/ac_req_view_op', $data);
    }

    public function ac_opletter_view($id)
    {
        $letter = $this->acModel->getOpLetterbyid($id);

        $data = [
            'letter' => $letter,
        ];
        $requestId = $data['letter']->req_letter_id;
        $request = $this->acModel->getReqLetterbyletterid($requestId);
        $data['request'] = $request;
        $this->view('academic/ac_opletter_view', $data);
    }

    public function ac_view_timeslot($id)
    {
        $timeslot = $this->acModel->getTimeslotById($id);
        $reserve = $this->acModel->getReserveDetails($id);
        if($timeslot){
            $data = [
                'timeslot' => $timeslot,
                'reserve' => $reserve
            ];
            $this->view('academic/ac_view_timeslot', $data);
        }else{
            die('Timeslot not found');
        }
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
                'slot_interval' => trim($_POST['slot_interval']),
                'slot_status' => '',
                'created_by' => trim($_POST['created_by']),
            ];
            
            $data['created_by'] = $user_id;
            
            if ($this->acModel->createTimeslots($data)) {
                // If timeslot creation is successful, redirect to the same page
                redirect('academic/ac_timeslots');
            } else {
                // If something went wrong, display an error message
                die('Something went wrong');
            }
            
            // Fetch timeslots regardless of the outcome of the creation attempt
            $current_username = $this->userModel->getUsernameById($user_id);
            $data['timeslot'] = $this->acModel->getTimeslots($current_username);
            $this->view('academic/ac_timeslots', $data);
            
        }
        $this->view('academic/ac_timeslots');
    }

    public function changeSlotStatus($slotID)
    {
        $timeslot = $this->acModel->getTimeslotById($slotID);
        $reserve = $this->acModel->getReserveDetails($slotID);

        $data = [
            'timeslot' => $timeslot,
            'reserve' => $reserve
        ];

        if ($this->acModel->updateSlotStatus($slotID) && $this->acModel->updateReserveCancel($reserve->reserve_id)) {
            redirect('academic/ac_view_timeslot/' . $slotID);
        } else {
            die('Something went wrong');
        }


        $this->view('academic/ac_view_timeslot', $data);
    }

    public function editTimeslot($timeslotId)
    {
        $timeslot = $this->acModel->getTimeslotById($timeslotId);

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

        $this->view('academic/ac_view_timeslot', $data);
    }

    private function handleEditTimeslot(&$data)
    {
        if (empty($data['slot_date_err']) && empty($data['slot_start_err']) && empty($data['slot_finish_err']) && empty($data['slot_type_err'])) {
            if ($this->acModel->updateTimeslot($data['timeslot'])) {
                redirect('academic/ac_timeslot');
            } else {
                die('Something went wrong');
            }
        }
    }

    public function deleteTimeslot($timeslotId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->acModel->deleteTimeslot($timeslotId)) {
                redirect('academic/ac_timeslot');
            } else {
                die('Something went wrong');
            }
        }
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

    public function sendEmail1($data, $request)
    {
        $receiver = "111ashanpraboda@gmail.com";
        $sender = "From: zerenecounselor@gmail.com";
        $subject = $data['subject'];
        $filePath = __DIR__ . '/../views/academic/ac_emails.php';
        $date = date('Y-m-d');

        $emailContent = file_get_contents($filePath);
        $emailContent = str_replace('{subject_here}', $data['subject'], $emailContent);
        $emailContent = str_replace('{body_here}', $data['content'], $emailContent);
        $emailContent = str_replace('{sender_fname}', $data['coun_fname'], $emailContent);
        $emailContent = str_replace('{sender_lname}', $data['coun_lname'], $emailContent);
        $emailContent = str_replace('{sender_email}', $data['coun_email'], $emailContent);
        $emailContent = str_replace('{date}', $date, $emailContent);
        $emailContent = str_replace('{document_link}', $request->document_path, $emailContent);

        // Set the Content-Type header to indicate that the email content is HTML
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= $sender;

        $body = $emailContent;

        if (mail($receiver, $subject, $body, $headers)) {
            echo "Email sent successfully to $receiver";
        } else {
            echo "Sorry, failed while sending mail!";
        }
    }

    public function getOpDetails()
    {
        $session_id = $_SESSION['user_id'];
        $data['op details'] = $this->acModel->getOpDetails($session_id);
        $this->view('academic/ac_opletters', $data);
    }
}
