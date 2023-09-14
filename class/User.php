<?php


class User {
    private $id;
    private $name;
    private $surname;
    private $email;
    private $birthdate;

    
    public function __construct(
        int $id = null,
        string $name = "",
        string $surname = "",
        string $email = "",
        string $birthdate = ""
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->birthdate = $birthdate;

    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function setSurname($surname){
        $this->surname = $surname;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getBirthdate(){
        return $this->birthdate;
    }
    public function setBirthdate($birthdate){
        $this->birthdate = $birthdate;
    }
}