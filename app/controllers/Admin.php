<?php


class Admin extends Controller
{
    private $userModel;
    private $adminModel;


    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->userModel = $this->model('User');
        $this->adminModel = $this->model('Administrator');
    }

    //page view controllers

    public function ad_dashboard()
    {
        $data = [];
        $this->view('admin/ad_dashboard', $data);
    }

    public function ad_home()
    {
        $data = [];
        $this->view('admin/ad_home', $data);
    }

    public function ad_reg_admin()
    {
        $usernames = $this->userModel->getUsernames();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //sanitize data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'origin_password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'signup_alert' => '',
                'usernames' => $usernames,
            ];

            if (strlen($data['username']) < 8) {
                $data['signup_alert'] = '*Username must be atleast 8 characters';
            } else {
                // Convert the new_username to lowercase
                $newUsernameLower = strtolower($data['username']);

                foreach ($data['usernames'] as $usernames) {
                    // Convert each username in the array to lowercase
                    $existingUsernameLower = strtolower($usernames->username);

                    // Compare the lowercase versions of the usernames
                    if ($newUsernameLower === $existingUsernameLower) {
                        // If there is a match, set the alert message
                        $data['signup_alert'] = '*Username has already taken';
                        break; // Exit the loop as soon as a match is found
                    }
                }
            }

            if ($this->userModel->findUserByEmail($data['email'])) {
                $data['signup_alert'] = '*Email is already taken';
            } elseif (strlen($data['password']) < 8) {
                $data['signup_alert'] = '*Password must be atleast 8 characters';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['signup_alert'] = '*Passwords do not match';
                }
            }

            if (empty($data['signup_alert'])) {

                //hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->reg_admin($data)) {
                    $this->sendRegisteremail($data);
                    redirect('admin/ad_reg_admin');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/ad_reg_admin', $data);
            }
        } else {
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'signup_alert' => '',
            ];

            $this->view('admin/ad_reg_admin', $data);
        }
    }

    public function ad_reg_counsellor()
    {
        $usernames = $this->userModel->getUsernames();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'coun_type' => trim($_POST['coun_type']),
                'fname' => trim($_POST['fname']),
                'lname' => trim($_POST['lname']),
                'gender' => trim($_POST['gender']),
                'dob' => trim($_POST['dob']),
                'university' => trim($_POST['university']),
                'faculty' => trim($_POST['faculty']),
                'email' => trim($_POST['email']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'origin_password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'signup_alert' => '',
                'usernames' => $usernames,
            ];


            if ($this->userModel->findUserByEmail($data['email'])) {
                $data['signup_alert'] = '*Email has already taken';
            }

            if (strlen($data['username']) < 8) {
                $data['signup_alert'] = '*Username must be atleast 8 characters';
            } else {
                // Convert the new_username to lowercase
                $newUsernameLower = strtolower($data['username']);

                foreach ($data['usernames'] as $usernames) {
                    // Convert each username in the array to lowercase
                    $existingUsernameLower = strtolower($usernames->username);

                    // Compare the lowercase versions of the usernames
                    if ($newUsernameLower === $existingUsernameLower) {
                        // If there is a match, set the alert message
                        $data['signup_alert'] = '*Username has already taken';
                        break; // Exit the loop as soon as a match is found
                    }
                }
            }

            if (strlen($data['password']) < 8) {
                $data['signup_alert'] = '*Password must be atleast 8 characters';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['signup_alert'] = '*Passwords do not match';
            }


            //make sure errors are empty
            if (empty($data['signup_alert'])) {

                //hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->reg_counselor($data)) {
                    $this->sendRegisteremail($data);
                    redirect('admin/ad_reg_counsellor');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/ad_reg_counsellor', $data);
            }
        } else {
            //load form
            $data = [
                'coun_type' => '',
                'fname' => '',
                'lname' => '',
                'gender' => '',
                'dob' => '',
                'university' => '',
                'faculty' => '',
                'email' => '',
                'username' => '',
                'password' => '',
                'confirm_password' => '',
                'signup_alert' => '',

            ];
            $this->view('admin/ad_reg_counsellor', $data);
        }

        // $data = [];
        $this->view('admin/ad_reg_counsellor', $data);
    }

    public function ad_reg_doctor()
    {
        $usernames = $this->userModel->getUsernames();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'fname' => trim($_POST['fname']),
                'lname' => trim($_POST['lname']),
                'gender' => trim($_POST['gender']),
                'university' => trim($_POST['university']),
                'hospital' => trim($_POST['hospital']),
                'email' => trim($_POST['email']),
                'contact_num' => trim($_POST['contact_num']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'origin_password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'signup_alert' => '',
                'usernames' => $usernames,
            ];

            if ($this->userModel->findUserByEmail($data['email'])) {
                $data['signup_alert'] = '*Email has already taken';
            }

            if (strlen($data['username']) < 8) {
                $data['signup_alert'] = '*Username must be atleast 8 characters';
            } else {
                // Convert the new_username to lowercase
                $newUsernameLower = strtolower($data['username']);

                foreach ($data['usernames'] as $usernames) {
                    // Convert each username in the array to lowercase
                    $existingUsernameLower = strtolower($usernames->username);

                    // Compare the lowercase versions of the usernames
                    if ($newUsernameLower === $existingUsernameLower) {
                        // If there is a match, set the alert message
                        $data['signup_alert'] = '*Username has already taken';
                        break; // Exit the loop as soon as a match is found
                    }
                }
            }

            if (strlen($data['password']) < 8) {
                $data['signup_alert'] = '*Password must be atleast 8 characters';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['signup_alert'] = '*Passwords do not match';
                }
            }

            //make sure errors are empty
            if (empty($data['signup_alert'])) {

                //hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //regsiter user
                if ($this->userModel->reg_doctor($data)) {
                    $this->sendRegisteremail($data);
                    redirect('admin/ad_reg_doctor');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/ad_reg_doctor', $data);
            }
        } else {
            //load form
            $data = [
                'fname' => '',
                'lname' => '',
                'gender' => '',
                'university' => '',
                'hospital' => '',
                'email' => '',
                'contact_num' => '',
                'username' => '',
                'password' => '',
                'confirm_password' => '',
                'signup_alert' => '',

            ];
            $this->view('admin/ad_reg_doctor', $data);
        }

        $this->view('admin/ad_reg_doctor', $data);
    }

    public function ad_users()
    {

        //get counsellors
        $undergrads = $this->adminModel->getUndergrads();
        $counselors = $this->adminModel->getCounselors();
        $doctors = $this->adminModel->getDoctors();
        $admins = $this->adminModel->getAdmins();
        $data = [
            'undergrads' => $undergrads,
            'counselors' => $counselors,
            'doctors' => $doctors,
            'admins' => $admins
        ];
        $this->view('admin/ad_users', $data);
    }

    public function ad_profile()
    {
        $admin = $this->adminModel->getAdminfromId($_SESSION['user_id']);
        $data = [
            'admin' => $admin
        ];
        $this->view('admin/ad_profile', $data);
    }

    public function ad_edit_user($user_id)
    {
        //get user data
        $user = $this->userModel->findUserDetails($user_id);

        $data = [
            'user' => $user,
            'password_alert' => '',
            'username_alert' => ''
        ];

        $this->view('admin/ad_edit_user', $data);
    }

    public function newsletters()
    {
        $data = [];
        $this->view('admin/newsletters', $data);
    }

    public function newsletter_view()
    {
        $data = [];
        $this->view('admin/newsletter_view', $data);
    }

    public function ad_notifications()
    {
        $notifications = $this->adminModel->getNotifications();
        $data = [
            'user_type' => '',
            'notifications' => $notifications
        ];
        $this->view('admin/ad_notifications', $data);
    }

    public function notifications_view($notification_id)
    {
        $notification = $this->adminModel->getNotificationsfromId($notification_id);
        $data = [
            'user_type' => '',
            'notification' => $notification
        ];
        $this->view('admin/notifications_view', $data);
    }

    public function ad_support()
    {
        $feedback = $this->adminModel->getFeedback();
        $complaint = $this->adminModel->getComplaint();
        $data = [
            'feedback' => $feedback,
            'complaint' => $complaint
        ];
        $this->view('admin/ad_support', $data);
    }

    public function support_view($feedback_id)
    {
        $feedback = $this->adminModel->getFeedbackGeneral($feedback_id);
        $data = [
            'feedback' => $feedback
        ];
        $this->view('admin/support_view', $data);
    }

    public function verifications()
    {
        $data = [];
        $this->view('admin/verifications', $data);
    }

    //function controllers

    public function changeUsernameAdmin($user_id)
    {
        $admin = $this->adminModel->getAdminfromId($user_id);
        $current_username = $this->userModel->getUsernameById($user_id);
        $username = $this->userModel->getUsernames();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'admin' => $admin,
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
                    redirect('admin/ad_profile');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('admin/ad_profile', $data);
            }
        }

        $this->view('admin/ad_profile', $data);
    }

    public function changeUsernameUser($user_id)
    {
        $id = $_SESSION['user_id'];
        $admin = $this->adminModel->getAdminfromId($id);
        $user = $this->userModel->findUserDetails($user_id);
        $usernames = $this->userModel->getUsernames();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'new_username' => trim($_POST['new_username']),
                'admin_password' => trim($_POST['admin_password']),
                'username_alert' => '',
                'admin' => $admin,
                'user' => $user,
                'usernames' => $usernames
            ];

            if (strlen($data['new_username']) < 8) {
                $data['username_alert'] = '*Username must be atleast 8 characters';
                $this->view('admin/ad_edit_user', $data);
            } else {
                // Convert the new_username to lowercase
                $newUsernameLower = strtolower($data['new_username']);

                foreach ($data['usernames'] as $usernames) {
                    // Convert each username in the array to lowercase
                    $existingUsernameLower = strtolower($usernames->username);

                    // Compare the lowercase versions of the usernames
                    if ($newUsernameLower === $existingUsernameLower) {
                        // If there is a match, set the alert message
                        $data['username_alert'] = '*Username already exists/ is a variation of current username';
                        $this->view('admin/ad_edit_user', $data);
                        break; // Exit the loop as soon as a match is found
                    }
                }
            }

            // Fetch the hashed password from the database based on the user ID
            $hashed_password_from_db = $this->userModel->getPasswordById($id);

            // Verify if the entered admin password matches the hashed password from the database
            if (!password_verify($data['admin_password'], $hashed_password_from_db)) {
                $data['username_alert'] = '*Incorrect Password';
                $this->view('admin/ad_edit_user', $data);
            }

            if (empty($data['username_alert'])) {
                // Update the username
                if ($this->userModel->updateUsername($user_id, $data['new_username'])) {
                    flash('user_message', 'Username updated successfully');
                    redirect('admin/ad_edit_user/' . $user_id);
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('admin/ad_edit_user/' . $user_id);
            }
        } else {
            $data = [
                'new_username' => '',
                'admin_password' => '',
                'username_alert' => '',
                'admin' => $admin,
                'user' => $user,
            ];
        }

        $this->view('admin/ad_edit_user', $data);
    }

    public function changePwdAdmin($user_id)
    {
        $admin = $this->adminModel->getAdminfromId($user_id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'admin' => $admin,
                'current_password' => trim($_POST['current_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'password_alert' => '',
            ];

            if (strlen($data['new_password']) < 8) {
                $data['password_alert'] = '*Password must be atleast 8 characters';
            } else {
                if ($data['new_password'] != $data['confirm_password']) {
                    $data['password_alert'] = '*passwords do not match';
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
                        redirect('admin/ad_profile');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Load view with errors
                $this->view('admin/ad_profile', $data);
            }
        }

        $this->view('admin/ad_profile', $data);
    }

    public function changePwdUser($user_id)
    {
        $id = $_SESSION['user_id'];
        $admin = $this->adminModel->getAdminfromId($id);
        $user = $this->userModel->findUserDetails($user_id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'admin_password' => trim($_POST['admin_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'password_alert' => '',
                'admin' => $admin,
                'user' => $user
            ];

            if (strlen($data['new_password']) < 8) {
                $data['password_alert'] = '*Password must be atleast 8 characters';
                $this->view('admin/ad_edit_user', $data);
            } else {
                if ($data['new_password'] != $data['confirm_password']) {
                    $data['password_alert'] = '*passwords do not match';
                    $this->view('admin/ad_edit_user', $data);
                }
            }

            if (empty($data['password_alert'])) {
                // Validated

                // Fetch the hashed password from the database based on the user ID
                $hashed_password_from_db = $this->userModel->getPasswordById($id);

                // Verify if the entered current password matches the hashed password from the database
                if (!password_verify($data['admin_password'], $hashed_password_from_db)) {
                    $data['password_alert'] = '*Current password is incorrect';
                } else {
                    // Hash the new password
                    $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

                    // Update the user's password
                    if ($this->userModel->updatePassword($user_id, $data['new_password'])) {
                        flash('user_message', 'Password updated successfully');
                        redirect('admin/ad_edit_user/' . $user_id);
                        return; // Ensure no further code execution after redirect
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Load view with errors
                $this->view('admin/ad_edit_user/' . $user_id);
            }
        } else {
            $data = [
                'admin_password' => '',
                'new_password' => '',
                'confirm_password' => '',
                'password_alert' => '',
                'admin' => $admin,
                'user' => $user
            ];
        }

        $this->view('admin/ad_edit_user', $data);
    }

    public function submitNotifications($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'author' => trim($_POST['author']),
                'subject' => trim($_POST['subject']),
                'user_type' => trim($_POST['user_type']),
                'content' => trim($_POST['content']),
            ];

            // Fetch the current username from db
            $current_username = $this->userModel->getUsernameById($user_id);
            $data['author'] = $current_username;

            // post notifications
            if ($this->adminModel->addNotifications($data)) {
                redirect('admin/ad_notifications');
            } else {
                die('Something went wrong');
            }
        }

        $this->view('admin/ad_notifications', $data);
    }

    public function editNotifications($notification_id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'notification_id' => $notification_id,
                'subject' => trim($_POST['subject']),
                'user_type' => trim($_POST['user_type']),
                'content' => trim($_POST['content']),
            ];

            // post notifications
            if ($this->adminModel->updateNotifications($data)) {
                redirect('admin/notifications_view/' . $notification_id);
            } else {
                die('Something went wrong');
            }
        }

        $this->view('admin/notifications_view', $data);
    }

    public function deleteNotifications($notify_id)
    {
        if ($this->adminModel->deleteNotify($notify_id)) {
            //   flash('post_message', 'user Removed');
            redirect('admin/ad_notifications');
        } else {
            die('Something went wrong');
        }
    }

    public function delFeedback($feedback_id)
    {
        if ($this->adminModel->deleteFeedback($feedback_id)) {
            //   flash('post_message', 'user Removed');
            redirect('admin/ad_support');
        } else {
            die('Something went wrong');
        }
    }

    public function resolveFeedback($feedback_id)
    {
        if ($this->adminModel->solveFeedback($feedback_id)) {
            //   flash('post_message', 'user Removed');
            redirect('admin/ad_support');
        } else {
            die('Something went wrong');
        }
    }

    public function sendRegisteremail($data){
        
        

        $receiver = $data['email'];
        $subject = "Registration Successful!";
        $username = $data['username'];
        $password = $data['origin_password'];
        $sender = "From: zerenecounselor@gmail.com";

        $filePath = __DIR__ . '/../views/admin/ad_email_signup.php';
        $date = date('Y-m-d');
        $emailContent = file_get_contents($filePath);

        $emailContent = str_replace('{username_here}', $username, $emailContent);
        $emailContent = str_replace('{password_here}', $password, $emailContent);
        $emailContent = str_replace('{date}', $date, $emailContent);

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= $sender;

        $body = $emailContent;

        if(mail($receiver, $subject, $body, $headers)){
            return true;
        }else{
            return false;
        }
    }

}
