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

    public function getDriverById($id)
    {
        $this->db->query('SELECT * FROM drivers WHERE id = :id');
        $this->db->bind(':id',$id);

        $row = $this->db->single();

        return $row;
    }

    public function getShiftsOfDriver($id)
    {
        $this->db->query('SELECT * FROM shifts WHERE driver_id=:id');
        $this->db->bind(':id',$id);
        $row = $this->db->resultSet();

        return $row;
    }

    public function getIdByDriver($driver)
    {
        $this->db->query('SELECT * FROM drivers where name=:driver');
        $this->db->bind(':driver',$driver);
        $row = $this->db->single();

        return $row;
    }

    public function addShift($data)
    {
        $this->db->query('INSERT INTO shifts (date,hours,driver_id) VALUES(:date,:hours,:driver_id)');
        // Bind values
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':driver_id', $data['driver']);
        $this->db->bind(':hours', $data['hours']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


}