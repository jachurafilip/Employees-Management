<?php

class Driver
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;

    }

    public function getDriversOfUser()
    {
        $this->db->query('SELECT * FROM drivers where user_id='.$_SESSION['user_id']);
        //todo

        $results = $this->db->resultSet();

        return $results;
    }

    public function addDriver($data)
    {
        $this->db->query('INSERT INTO drivers (name, user_id) VALUES(:name, :user_id)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':user_id', $data['user_id']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}