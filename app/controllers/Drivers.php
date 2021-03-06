<?php

    class Drivers extends Controller
    {

        public function __construct()
        {
            if(!isLoggedIn())
            {
                redirect('users/login');
            }

            $this->driverModel = $this->model('Driver');
        }

        public function index()
        {
            //Get drivers

            $drivers = $this->driverModel->getDriversOfUser();
            $data =[
                'drivers' => $drivers
            ];
            $this->view('drivers/index', $data);
        }

        public function add()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                //SANITIZE POST array
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['name']),
                    'user_id' => $_SESSION['user_id'],
                    'rate'  => trim($_POST['rate']),
                    'rate_err'=>'',
                    'name_err' => '',
                    'login'=>substr(md5(rand()),0,6),
                    ];

                //Validate name

                if(empty($data['name']))
                {
                    $data['name_err'] = 'Please fill the field';
                }
                if(empty($data['rate']))
                {
                    $data['rate_err'] = 'Please fill the field';
                }
                if($data['rate']<0)
                {
                    $data['rate_err'] = 'Hourly rate cannot be negative';
                }

                //Make sure no errors
                if(empty($data['name_err']) && empty($data['rate_err']))
                {
                    if($this->driverModel->addDriver($data))
                    {
                        flash('driver_message', 'Driver Added');
                        redirect('drivers');
                    }else
                    {
                        die('Something went wrong');
                    }

                } else
                {
                    //Load view with errors
                    $this ->view('drivers/add',$data);
                }

            } else
            {
                $data = ['name' => ''];
                $this->view('drivers/add', $data);
            }
        }

        public function show($id)
        {
            $driver = $this->driverModel->getDriverById($id);
            $shifts = $this->driverModel->getShiftsOfDriver($id);

            $data = [
                'driver' => $driver,
                'shifts' => $shifts
            ];
            $this->view('drivers/show',$data);
        }

        public function end()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $driver = $_POST['driver'];
                $timein = $_POST['timein'];
                $timeout = $_POST['timeout'];


                $check = false;
                foreach ($driver as $key => $name)
                {
                    $id = $this->driverModel->getIdByDriver($name);
                    $data=[
                        'date'=>$_POST['date'],
                        'driver' => $id->id,
                        'timein' => $timein[$key],
                        'timeout'=> $timeout[$key],
                        'dateerr'=>'',
                        'timeinerr'=>'',
                        'timeouterr'=>''
                    ];

                    if(empty($data['date']))
                    {
                        $data['dateerr'] = 'Please fill in the date';
                    }

                    if(empty($data['timein']))
                    {
                        $data['timeinerr'] = 'Please fill in time in';
                    }
                    if(empty($data['timeout']))
                    {
                        $data['timeouterr'] = 'Please fill in time out';
                    }
                    if(empty($data['dateerr'])&&empty($data['timeinerr'])&&empty($data['timeouterr']))
                    {

                    if(!$this->driverModel->addShift($data))
                    {
                        $check = true;
                    }

                    }
                    else
                    {
                        //Load view with errors
                        flash('driver_message', 'Try again - please fill in all the data','alert alert-danger');
                        redirect('drivers');

                    }
                }

                if(!$check)
                {
                    flash('driver_message', 'Saved!');
                    redirect('drivers');
                }else
                {
                    die('Something went wrong');
                }



            }
            else {
                $drivers = $this->driverModel->getDriversOfUser();
                $data = [
                    'drivers' =>$drivers
                ];
                $this->view('drivers/end', $data);
            }
        }

        public function summarycompleted()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data = [
                    'from' => $_POST['from'],
                    'to' => $_POST['to'],
                    'from_err' => '',
                    'to_err' => ''
            ];

                if(empty($data['from']))
                {
                    $data['from_err'] = 'Please fill the field';
                }
                if(empty($data['to']))
                {
                    $data['to_err'] = 'Please fill the field';
                }
                if(empty($data['to_err']) && empty($data['from_err']))
                {
                    $row = $this->driverModel->getSummary($data);
                    $data['row'] = $row;

                        $this->view('drivers/summarycompleted',$data);


                } else
                {
                    //Load view with errors
                    $this ->view('drivers/summary',$data);
                }

            }else {
                $data = [];
                $this->view('drivers/summary', $data);
            }

        }


    public function summary()
{
    $data = [];
    $this->view('drivers/summary', $data);
}
    }