<?php

class usersController extends Controller
{
    private $userModel;
    function __construct()
    {
        $this->userModel = $this->model('user');
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $data = json_decode(file_get_contents("php://input"));
            $data = [
                'email' => trim($data->email),
                'password' => trim($data->password)
            ];

            if (!$this->userModel->getUserByEmail($data['email'])) {
                echo json_encode(
                    array('message' => 'email or password not exist')
                );
            }


            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
            if ($loggedInUser) {
                // set The sessions
                echo json_encode(
                    array('message' => 'welcome back')
                );
                // redirect('pages/home');
            } else {
                // password incorrect
                echo json_encode(
                    array('message' => 'invalid password')
                );
            }
        }
    }

    // public function createUserSession($user)
    // {
    //     $_SESSION['Id'] = $user->Id;
    //     $_SESSION['email'] = $user->email;
    //     $_SESSION['name'] = $user->name;
    //     $_SESSION['role'] = $user->role;
    // }

    // public function logOut()
    // {

    //     $_SESSION['Id'] = null;
    //     $_SESSION['email'] = null;
    //     $_SESSION['name'] = null;
    //     $_SESSION['role'] = null;

    //     session_destroy();

    //     $this->view('login');
    // }


    /////////////////////////////////////////////////////////////////


    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = json_decode(file_get_contents("php://input"));

            //init data
            $data = [
                'name' => trim($data->username),
                'email' => trim($data->email),
                'password' => trim($data->password),
                'confirm_password' => trim($data->confirm_password)

            ];

            if ($this->userModel->getUserByEmail($data['email'])) {
                echo json_encode(
                    array('message' => 'account already taken')
                );
            }

            // Hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            // Register User
            if ($this->userModel->register($data)) {
                echo json_encode(
                    array('message' => 'account Created')
                );
            } else {
                echo json_encode(
                    array('message' => 'account Not Created')
                );
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm-password' => ''
            ];

            echo json_encode(
                array('message' => 'account Not Created')
            );
        }
    }










    public function index()
    {
        $this->view('home');
    }
}
