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
        'title' => 'Pizza Hut - Kierowcy',
        'description' => 'Portal do zarządzania kierowcami PH'
      ];
     
      $this->view('main/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('main/about', $data);
    }
  }