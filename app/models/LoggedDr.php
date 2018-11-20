<?php

class LoggedDr
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function findDriverByLogin($login)
    {
        $this->db->query('SELECT * FROM drivers where login = :login');
        $this->db->bind(':login', $login);

        $row = $this->db->single();
        if ($this->db->rowCount())
        {
            return true;

        }
        return false;
    }
    public function hasAccount($login)
    {
        $this->db->query('SELECT * from drivers where login =:login and password is not NULL');
        $this->db->bind(':login',$login);
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
    public function createAccount($login, $pass)
    {
        $this->db->query('UPDATE drivers set password =:pass where login =:login');
        $this->db->bind(':login',$login);
        $this->db->bind(':pass',password_hash($pass,PASSWORD_DEFAULT));
        if($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function login($login, $password){
        $this->db->query('SELECT * FROM drivers where login =:login');
        $this->db->bind(':login', $login);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }

}