<?php
abstract class User
{
   protected $id;
   protected $name;
   protected $email;
   protected $password;
   protected $genre;
   protected $permissions;


   public function __construct($user) {
      $this->id = $user['id'];
      $this->name = $user['name'];
      $this->email = $user['email'];
      $this->password = $user['password'];
      $this->genre = $user['genre'];
   }


   public function getId() {
      return $this->id;
   }

   public function getName() {
      return $this->name;
   }

   public function getEmail() {
      return $this->email;
   }

   public function getPassword() {
      return $this->password;
   }

   public function getGenre() {
      return $this->genre;
 
   }

   public function getOffice(){
      return get_class($this);
   }

   public function getPermissions() {
      return $this->permissions;
   }

   public function hasPermissions($permissions) {
      if (is_array($permissions))
         return (array_intersect($permissions, $this->permissions) == $permissions);
      else
         return in_array($permissions, $this->permissions);
   }
}