<?php

//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);

class Users extends Controller
{
    public function __construct() {
        $this->userModel = $this->model('User');
    }



    public function register() {
        $data = [
            'title' => 'Register page',
            'subtitle' => '',
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => 'bu xatolik boshqattan urini ko\'ring'
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            // Validate username on letters/numbers
            if (empty($data['username'])) {
                $data['usernameError'] = "Iltimos usernamingizni kiriting.";
            } elseif(!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = "Username faqat harf va raqamlardan iborat bo'lishi kerak.";
            }

            // Validate email
            if (empty($data['email'])) {
                $data['emailError'] = "Iltimos emailingizni kiriting.";
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = "Iltimos pochta manzilingizni to'liq yozing.";
            } else {
                // Check if email exists
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = "Ushbu email allaqachon mavjud.";
                }
            }

            // Validate password and length and numeric values
            if (empty($data['password'])) {
                $data['passwordError'] = "Iltimos parolingizni kiriting.";
            } elseif (strlen($data['password']) <= 6) {
                $data['passwordError'] = "Parolingiz 6 ta belgidan kam bo'lmasligi kerak.";
            } elseif (!preg_match("#[0-9]+#", $data['password'])) {
                $data['passwordError'] = 'Parolda kamida bitta raqam bo\'lishi kerak.';
            }/*elseif (!preg_match("#[A-Z]+#", $data['password'])) {
                $data['passwordError'] = "Parolingizda kamida bitta katta harf bo'lishi kerak.";
            } */elseif (!preg_match("#[a-z]+#", $data['password'])) {
                $data['passwordError'] = "Parolingizda kamida bitta kichik harf qatnashishi kerak.";
            }


            // Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = "Iltimos parolni qayta kiriting.";
            } else {
                if ($data['password'] !== $data['confirmPassword']) {
                    $data['confirmPasswordError'] = "Parol mos kelmadi qayta urini ko'ring.";
                }
            }

            // Make sure that errors are empty
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register user from model function
                if ($this->userModel->register($data)) {
                    // Redirect to the login page
                    header('Location: /users/login');
                } else {
                    die("Nimadir notog'ri bajarildi.");
                }
            }
        }

        $this->view('users/register', $data);
    }

    public function login() {
        $data = [
            'title' => 'Login page',
            'subtitle' => '',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        // Chek for post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => ''
            ];

            // Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = "Iltimos usernamingizni kiriting.";
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password'] = "Iltimos parolingizni kiriting";
            }

            // Check if al errors are empty
            if (isset($data['username'], $data['password']) && !empty($data['username']) && !empty($data['password'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = "Parol yoki loginda xatolik bor. Iltimos qaytadan urinib ko'ring.";
                    $this->view('users/login', $data);
                }
            }
        }

        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        header('Location: /pages/index');
    }

    public function logout() {
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        session_destroy();
        header('Location: /pages/index');
    }
}