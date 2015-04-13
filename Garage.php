<?php
class Garage {
    private $garageID;
    private $name;
    private $address;
    private $phoneNo;
    private $nameOfGarage;
    private $manager;
    /* This is the visability of my private method. It is declared as private,
       meaning can only be accessed by myself and CANNOT  be altered by somebody else*/
    
    public function __construct($gID, $n, $a, $pn, $nog, $m) {
        $this->garageID = $gID;
        $this->regNo = $n;
        $this->make = $a;
        $this->model = $pn;
        $this->noOfSeats = $nog;
        $this->engineSize = $m;
    }
    /* Declaring Variable here using '$this'. 
     *  It's a reference to the current object. */ 
    
    public function getgarageID() { return $this->garageID; }
    public function getName() { return $this->name; }
    public function getAddress() { return $this->address; }
    public function getPhoneNo() { return $this->phoneNo; }
    public function getNameOfGarage() { return $this->nameOfGarage; }
    public function getManager() { return $this->manager; }
}
