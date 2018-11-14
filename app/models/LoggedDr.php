<?php

class LoggedDr
{
    private $db;
    public function __construct()
    {
        $db = new Database;
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

}