<?php
abstract class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $genre;
    protected $permissions;


    public function __construct($id, $name, $email, $password, $genre)
    {
        $this->id           =    $id;
        $this->name         =    $name;
        $this->email        =    $email;
        $this->password     =    $password;
        $this->genre        =    $genre;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }
};
