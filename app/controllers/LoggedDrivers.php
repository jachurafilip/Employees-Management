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

        // Validate Password
        if (empty($data['password'])) {
            $data['password_err'] = 'Please enter password';
        }
        // Check for user

        if($this->loggedDriverModel->findDriverByEmail($data['login']))
        {
            //user found
        }
        else
        {
            $data['user_err'] = 'User not found';
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
}
