<?php
class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $genre;
    protected $permissions;


    public static function create($data)
    {
        $user = new User;

        $user->id           =    $data['id'];
        $user->name         =    $data['name'];
        $user->email        =    $data['email'];
        $user->password     =    $data['password'];
        $user->genre        =    $data['genre'];
        $user->permissions  =    $data['permissions'];

        return $user;
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