<?php
  class Main extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
        if(isLoggedIn())
        {
            redirect('drivers');
        }
      $data = [
        'title' => 'Pizza Hut - Drivers',
        'description' => 'Log in or register'
      ];
     
      $this->view('main/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => ''
      ];

      $this->view('main/about', $data);
    }
  }