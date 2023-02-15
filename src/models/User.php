<?php

namespace models;

class User {
    private $email;
    private $password;
    private $name;
    private $surname;

    public function __construct(string $email, string $password, string $name, string $surname) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getEmail(): string {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }

    public function getName(): string {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

    public function getSurname(): string {
        return $this->surname;
    }
    public function setSurname($surname) {
        $this->surname = $surname;
    }
}