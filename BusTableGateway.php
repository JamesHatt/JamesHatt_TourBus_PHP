<?php

class BusTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getBuses() {
        // execute a query to get all buses
        $sqlQuery = "SELECT b . * , g.name
                    FROM buses b
                    LEFT JOIN garage g ON g.garageID = b.garageID";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve users");
        }

        return $statement;
    }

    public function getBusById($bID) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM buses WHERE busesID = :busesID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "busesID" => $bID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve user");
        }

        return $statement;
    }

    public function insertBus($rn, $mk, $md, $nos, $es, $dbb, $ns, $gID) {
        $sqlQuery = "INSERT INTO buses " .
                "(regNo, Make, Model, NoOfSeats, engineSize, dateBusBought, nextService, garageID) " .
                "VALUES (:regNo, :make, :model, :noOfSeats, :engineSize, :dateBusBought, :nextService, :garageID)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "regNo" => $rn,
            "make" => $mk,
            "model" => $md,
            "noOfSeats" => $nos,
            "engineSize" => $es,
            "dateBusBought" => $dbb,
            "nextService" => $ns,
            "garageID" => $gID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert user");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }
    
    public function deleteBus ($bID) {
        $sqlQuery = "DELETE FROM buses WHERE busesID = :busesID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "busesID" => $bID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete user");
        }
        
        return ($statement->rowCount() == 1);
    }
    
    public function updateBus($bID, $rn, $mk, $md, $nos, $es, $dbb, $ns){
                
        $sqlQuery =
                "UPDATE buses SET " .
                "regNo = :regNo, " .
                "make = :make, " .
                "model = :model, " .
                "noOfSeats = :noOfSeats, " .
                "engineSize = :engineSize, " .
                "dateBusBought = :dateBusBought, " .
                "nextService = :nextService " .
                "WHERE busesID = :busesID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array
            (
            "busesID" => $bID,
            "regNo" => $rn,
            "make" => $mk,
            "model" => $md,
            "noOfSeats" => $nos,
            "engineSize" => $es,
            "dateBusBought" => $dbb,
            "nextService" => $ns             
            );
        
        $status = $statement->execute($params);
        
        return ($statement->rowCount() == 1);

    }   

}