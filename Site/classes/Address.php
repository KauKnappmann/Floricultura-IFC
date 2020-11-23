<?php

class Address
{
    private $zipCode;
    private $street;
    private $district;
    private $number;
    private $city;
    private $state;

    public function __construct(int $zipCode, string $street, string $district, int $number, string $city, string $state)
    {
        $this->zipCode=$zipCode;
        $this->street=$street;
        $this->district=$district;
        $this->number=$number;
        $this->city=$city;
        $this->state=$state;
    }

    public function addAddress()
    {

    }

    public function searchAddress()
    {

    }

}

?>