<?php

class LoggedDrivers extends Controller
{
 public function __construct()
 {
     $this->loggedDriverModel = $this->model("LoggedDr");
 }

 public function login()
 {
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $data=[
            'login'=>trim($_POST['login']),
            'password'=>trim($_POST['password']),
            'login_err'=>'',
            'password_err'=>''
        ];

        //validate fields

        // Validate Login
        if (empty($data['login'])) {
            $data['login_err'] = 'Please enter login';
        }

        // Check for user

        if($this->loggedDriverModel->findDriverByLogin($data['login']))
        {
            //user found
        }
        else
        {
            $data['user_err'] = 'User not found';
        }
        if (empty($data['password'])) {
            $data['password_err'] = 'Please enter password';
        }
        if($this->loggedDriverModel->hasAccount($data['login']))
        {
        }
        else
        {
            $this->loggedDriverModel->createAccount($data['login'],$data['password']);
        }

        $loggedIn = $this->loggedDriverModel->login($data['login'],$data['password']);
        if($loggedIn)
        {
            $this->createUserSession($loggedIn);
        }
        else
        {
            $data['password_err'] = 'Password incorrect';
            $this->view('loggedDrivers/login',$data);
        }



    }
    else
    {
        $data=[
            'login'=>'',
            'login_err'=>'',
            'password'=>'',
            'password_err'
        ];
        $this->view('loggedDrivers/login',$data);
    }

 }
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_login'] = $user->login;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_type'] = 'driver';
        redirect('drivers');
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_login']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_type']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}
