<?php

class Address
{
    private $zipCode;
    private $street;
    private $number;
    private $district;
    private $city;
    private $state;

    public function __construct($zipCode, $street, $number, $district, $city, $state)
    {
        $this->zipCode = $zipCode;
        $this->street = $street;
        $this->number = $number;
        $this->district = $district;
        $this->city = $city;
        $this->state = $state;
    }

    // public function listAddresses()
    // {
    //     echo '<br>';
    //     echo 'ZIP Code: '.$this->zipCode.'<br>';
    //     echo 'Street: '.$this->street.'<br>';
    //     echo 'Number: '.$this->number.'<br>';
    //     echo 'District: '.$this->district.'<br>';
    //     echo 'City: '.$this->city.'<br>';
    //     echo 'State: '.$this->state.'<br>';
    //     echo '-----------------------------------------------'.'<br>';
    // }

    public function searchAddress()
    {

    }

    public function deleteAddress()
    {

    }

    public function imprimir(){
        $texto = "<br>ZIP Code: ".$this->getzipCode(). "<br>Street: ".$this->getstreet()."<br>Number: ".$this->getnumber(). "<br>District: ".$this->getdistrict()."<br>City: ".$this->getcity(). "<br>State: ".$this->getstate();
        return $texto;
    }

    public function getzipCode(){
        return $this->zipCode;
    }

    public function getstreet(){
        return $this->street;
    }

    public function getnumber(){
        return $this->number;
    }

    public function getdistrict(){
        return $this->district;
    }

    public function getcity(){
        return $this->city;
    }

    public function getstate(){
        return $this->state;
    }
}

?>