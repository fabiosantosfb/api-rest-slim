<?php
namespace Model{

  class Login {
    private $email;
    private $senha;

    public function __construct() {}

    public function __get() {return $this->email;}
    public function __get() {return $this->senha;}

    public function __set($senha) {$this->senha = $senha;}
    public function __set($email) {$this->email = $email;}
  }
}
