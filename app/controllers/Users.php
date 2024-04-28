<?php

class Users extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    //function controllers

    public function signup()
    {
        //check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form

            //sanitize data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //inti data
            $data = [
                'age' => trim($_POST['age']),
                'gender' => trim($_POST['gender']),
                'email' => trim($_POST['email']),
                'university' => trim($_POST['university']),
                'faculty' => trim($_POST['faculty']),
                'year' => trim($_POST['year']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'signup_alert' => '',
            ];

            // Check if the age is within the specified range
            if ($data['age'] < 18 || $data['age'] > 25) {
                $data['signup_alert'] = 'Age must be between 18 and 25';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['signup_alert'] = 'Invalid email format';
            } else {
                // Extract domain from the email address
                $emailParts = explode('@', $data['email']);
                $domain = isset($emailParts[1]) ? $emailParts[1] : '';

                // Define allowed domain names
                $allowedDomains = [
                    'stu.ucsc.cmb.ac.lk',
                    'fos.uoc.cmb.ac.lk',
                    'foa.uoc.cmb.ac.lk'
                    // Add more allowed domains if needed
                ];

                // Check if the extracted domain is in the allowed list
                if (!in_array($domain, $allowedDomains)) {
                    $data['signup_alert'] = 'Email domain is not allowed';
                } else {
                    // Check if the email is already taken
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        $data['signup_alert'] = 'Email is already taken';
                    }
                }
            }


            if ($this->userModel->findUserByUsername($data['username'])) {
                $data['signup_alert'] = 'Username is already taken';
            } elseif (strlen($data['password']) < 8) {
                $data['signup_alert'] = 'Password must be atleast 8 characters';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['signup_alert'] = 'passwords do not match';
            }

            //make sure errors are empty
            if (empty($data['signup_alert'])) {
                //validate

                //hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //register user
                $user_id = $this->userModel->register($data);

                $emaildata = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'user_id' => $user_id
                ];

                if (!empty($emaildata['username']) && !empty($emaildata['email'])) {
                    $this->sendVerifyEmail($emaildata);
                    redirect('users/email_verify/' . $user_id);
                } else {
                    die('Username or email is missing');
                }
            } else {
                $this->view('users/signup', $data);
            }
        } else {
            //load form
            $data = [
                'age' => '',
                'gender' => '',
                'email' => '',
                'university' => '',
                'faculty' => '',
                'year' => '',
                'username' => '',
                'password' => '',
                'confirm_password' => '',
            ];
            $this->view('users/signup', $data);
        }
    }

    public function login()
    {
        $usernames = $this->userModel->getUsernames();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'login_alert' => '',
                'usernames' => $usernames,
                'login_alert' => '',
            ];


            if ($this->userModel->findUserByUsername($data['username'])) {
                $data['login_alert'] = '';
            } else {
                $data['login_alert'] = 'No user found';
            }

            // Check and set logged-in user
            $loggedInUser = $this->userModel->login($data['username'], $data['password']);

            if ($loggedInUser === 'incorrect_password') {
                $data['login_alert'] = '*Incorrect password';
                $this->view('users/login', $data);
            } elseif ($loggedInUser === 'no_user_found') {
                $data['login_alert'] = '*No user found';
                $this->view('users/login', $data);
            } elseif ($loggedInUser) {
                // Create session
                $this->createUserSession($loggedInUser);
                $user_id = $_SESSION['user_id'];
                $user_type = $_SESSION['user_type'];

                if ($user_type == 'undergraduate') {
                    $verify_Status = $this->userModel->checkVerifyStatus($user_id);
                    if ($verify_Status == '1') {
                        $this->userRedirect($user_type);
                    } else {
                        $this->resendVerifyEmail($user_id);
                        redirect('users/email_verify/' . $user_id);
                    }
                } else {
                    $this->userRedirect($user_type);
                }
            } else {
                // Redisplay form with error messages
                $this->view('users/login', $data);
            }
        } else {
            // Initialize data
            $data = [
                'username' => '',
                'password' => '',
                'login_alert' => '',
            ];
            $this->view('users/login', $data);
        }
    }

    public function email_verify($user_id)
    {
        $email = $this->userModel->getEmailById($user_id);
        $masked_email = $this->emailHide($email);
        $data = [
            'user_id' => $user_id,
            'email' => $masked_email,
            'verify_alert' => ''
        ];

        $this->view('users/email_verify', $data);
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['user_name'] = $user->username;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_type'] = $user->user_type;

    }

    public function userRedirect($user_type)
    {
        if ($user_type === 'undergraduate') {
            redirect('undergrad/home');
        } elseif ($user_type === 'admin') {
            redirect('admin/ad_home');
        } elseif ($user_type === 'pcounsellor') {
            redirect('procounsellor/pc_home');
        } elseif ($user_type === 'acounsellor') {
            redirect('academic/ac_home');
        } elseif ($user_type === 'doctor') {
            redirect('doctor/doc_home');
        } elseif ($user_type === 'pharmacy') {
            redirect('pharmacy/pharm_home');
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_type']);
        session_destroy();
        redirect('');
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUG($id)
    {


        if ($this->userModel->deleteUndergrad($id)) {
            redirect('admin/ad_users');
        } else {
            die('Something went wrong');
        }
    }

    public function deleteCoun($id)
    {


        if ($this->userModel->deleteCounselor($id)) {
            redirect('admin/ad_users');
        } else {
            die('Something went wrong');
        }
    }

    public function deleteDoc($id)
    {


        if ($this->userModel->deleteDoctor($id)) {
            redirect('admin/ad_users');
        } else {
            die('Something went wrong');
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
                $this->view('undergrad/feedback', $data);
            }
        }
    }

    public function sendVerifyEmail($data)
    {
        $receiver = $data['email'];
        $subject = "Email Verification";
        $username = $data['username'];
        $user_id = $data['user_id'];
        $code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $sender = "From: zerenecounselor@gmail.com";

        $modeldata = [
            'user_id' => $user_id,
            'verify_code' => $code
        ];

        $this->userModel->addVerifyCode($modeldata);

        $filePath = __DIR__ . '/../views/admin/ad_email_verify.php';
        $date = date('Y-m-d');
        $emailContent = file_get_contents($filePath);

        $emailContent = str_replace('{username_here}', $username, $emailContent);
        $emailContent = str_replace('{code_here}', $code, $emailContent);
        $emailContent = str_replace('{date}', $date, $emailContent);

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= $sender;

        $body = $emailContent;

        if (mail($receiver, $subject, $body, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    public function resendVerifyEmail($user_id)
    {

        $receiver = $this->userModel->getEmailById($user_id);
        $subject = "Email Verification";
        $username = $this->userModel->getUsernameById($user_id);
        $code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $sender = "From: zerenecounselor@gmail.com";

        $modeldata = [
            'user_id' => $user_id,
            'verify_code' => $code
        ];

        $this->userModel->addVerifyCode($modeldata);

        $filePath = __DIR__ . '/../views/admin/ad_email_verify.php';
        $date = date('Y-m-d');
        $emailContent = file_get_contents($filePath);

        $emailContent = str_replace('{username_here}', $username, $emailContent);
        $emailContent = str_replace('{code_here}', $code, $emailContent);
        $emailContent = str_replace('{date}', $date, $emailContent);

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= $sender;

        $body = $emailContent;

        if (mail($receiver, $subject, $body, $headers)) {
            redirect('users/email_verify/' . $user_id);
        } else {
            return false;
        }
    }

    public function verifyEmailcode($user_id)
    {
        $code = $this->userModel->getVerifyCode($user_id);
        $email = $this->userModel->getEmailById($user_id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'user_id' => $user_id,
                'code' => $code,
                'email' => $email,
                'verify_code' => trim($_POST['verify_code']),
                'verify_alert' => ''
            ];

            // Check if verification code is empty
            if (empty($data['verify_code'])) {
                $data['verify_alert'] = 'Please enter a verification code.';
            } elseif ($data['verify_code'] !== $data['code']) {
                $data['verify_alert'] = 'Invalid verification code';
            } else {
                // Verification code matches, update status and redirect
                $this->userModel->setVerifyStatus($user_id);
                redirect('users/login');
            }
        }

        $this->view('users/email_verify', $data);
    }

    public function emailHide($email)
    {
        // Get the position of "@" symbol in the email address
        $at_position = strpos($email, '@');

        // Get the length of the email address
        $email_length = strlen($email);

        // Extract the username part of the email
        $username = substr($email, 0, $at_position);

        // Mask characters in the username with asterisks
        $masked_username = str_repeat('*', strlen($username));

        // Extract the domain part of the email
        $domain = substr($email, $at_position);

        // Combine masked username and domain
        $masked_email = $masked_username . $domain;

        return $masked_email;
    }
}
