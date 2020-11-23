<?php

class userTest
{
    private $name;
    private $surname;
    private $birthDate;
    private $cpf;
    private $gender;
    private $phone;
    private $email;
    private $password;
    private $interests;
    private $picture;
    private $addresses;

    function __construct($name, $surname, $birthDate, $cpf, $gender, $phone, $email, $password, $interests, $picture)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthDate = $birthDate;
        $this->cpf = $cpf;
        $this->gender = $gender;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->interests = $interests;
        $this->picture = $picture;
        $this->addresses = array();
        
    }

    public function registerUser()
    {

    }

    public function login()
    {
        
    }

    public function addAddress(Address $address)
    {
        $this->addresses[] = $address;
    }

    public function getAddresses()
    {
        return $this->addresses;
    }

}

?>