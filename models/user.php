<?php
class Category
{
    private $id;
    private $username;
    private $password;
    private $fullname;
    private $note;
    private $role;

    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function __construct($id, $username, $fullname)
    {
        $this->id = $id;
        $this->username = $username;
        $this->fullname = $fullname;
        $this->role = $role;
    }

    public function __toString()
    {
        return "$this->fullname";
    }
}
