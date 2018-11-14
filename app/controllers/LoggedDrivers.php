<?php

class LoggedDrivers extends Controller
{
 public function __construct()
 {
     if(!isLoggedIn())
     {
         redirect('loggedDrivers/login');
     }
     $this->loggedDriverModel = $this->model("LoggedDriver");
 }

}
