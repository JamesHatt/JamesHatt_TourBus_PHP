<?php

class GarageTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getGarages() {
        // execute a query to get all buses
        $sqlQuery = "SELECT * FROM garages";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve garages");
        }

        return $statement;
    }

    public function getGarageById($gID) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM garages WHERE garageID = :garageID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "garageID" => $gID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve garage");
        }

        return $statement;
    }

    public function insertGarage($n, $a, $pn, $nog, $m) {
        $sqlQuery = "INSERT INTO garages " .
                "(name, address, phoneNo, nameOfGarage, manager) " .
                "VALUES (:name, :address, :phoneNo, :nameOfGarage, :manager)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "address" => $a,
            "phoneNo" => $pn,
            "nameOfGarage" => $nog,
            "manager" => $m
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert garage");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }
    
    public function deleteGarage ($gID) {
        $sqlQuery = "DELETE FROM garages WHERE garageID = :garageID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "garageID" => $gID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete garage");
        }
        
        return ($statement->rowCount() == 1);
    }
    
    public function updateGarage($gID, $n, $a, $pn, $nog, $m){
                
        $sqlQuery =
                "UPDATE garages SET " .
                "name = :name, " .
                "address = :address, " .
                "phoneNo = :phoneNo, " .
                "nameOfGarage = :nameOfGarage, " .
                "manager = :manager, " .
                "WHERE garageID = :garageID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array
            (
            "garageID" => $gID,
            "name" => $n,
            "address" => $a,
            "phoneNo" => $pn,
            "nameOfGarage" => $nog,
            "manager" => $m        
            );
        
        $status = $statement->execute($params);
        
        return ($statement->rowCount() == 1);
    }   

}
