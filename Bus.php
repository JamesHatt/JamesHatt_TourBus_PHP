<?php
class Bus {
    private $busesID;
    private $regNo;
    private $make;
    private $model;
    private $noOfSeats;
    private $engineSize;
    private $dateBusBought;
    private $nextService;
    /* This is the visability of my private method. It is declared as private,
       meaning can only be accessed by myself and CANNOT  be altered by somebody else*/
    
    public function __construct($bID, $rn, $mk, $md, $nos, $es, $dbb, $ns) {
        $this->busesID = $bID;
        $this->regNo = $rn;
        $this->make = $mk;
        $this->model = $md;
        $this->noOfSeats = $nos;
        $this->engineSize = $es;
        $this->dateBusBought = $dbb;
        $this->nextService = $ns;
    }
    /* Declaring Variable here using '$this'. 
     *  It's a reference to the current object. */ 
    
    public function getbusesID() { return $this->busesID; }
    public function getRegNo() { return $this->regNo; }
    public function getMake() { return $this->make; }
    public function getModel() { return $this->model; }
    public function getNoOfSeats() { return $this->noOfSeats; }
    public function getEngineSize() { return $this->engineSize; }
    public function getDateBusBought() { return $this->dateBusBought; }
    public function getNextService() { return $this->nextService; }
}
