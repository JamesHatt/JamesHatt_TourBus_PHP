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
        $sqlQuery = "SELECT * FROM garages WHERE garagesID = :garagesID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "garagesID" => $gID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve garage");
        }

        return $statement;
    }

    public function insertGarage($rn, $mk, $md, $nos, $es, $dbb, $ns) {
        $sqlQuery = "INSERT INTO garages " .
                "(regNo, Make, Model, NoOfSeats, engineSize, dateBusBought, nextService) " .
                "VALUES (:regNo, :make, :model, :noOfSeats, :engineSize, :dateBusBought, :nextService)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "regNo" => $rn,
            "make" => $mk,
            "model" => $md,
            "noOfSeats" => $nos,
            "engineSize" => $es,
            "dateBusBought" => $dbb,
            "nextService" => $ns
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert garage");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }
    
    public function deleteGarage ($gID) {
        $sqlQuery = "DELETE FROM garages WHERE garagesID = :garagesID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "garagesID" => $gID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete garage");
        }
        
        return ($statement->rowCount() == 1);
    }
    
    public function updateGarage($gID, $rn, $mk, $md, $nos, $es, $dbb, $ns){
                
        $sqlQuery =
                "UPDATE garages SET " .
                "regNo = :regNo, " .
                "make = :make, " .
                "model = :model, " .
                "noOfSeats = :noOfSeats, " .
                "engineSize = :engineSize, " .
                "dateBusBought = :dateBusBought, " .
                "nextService = :nextService " .
                "WHERE garagesID = :garagesID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array
            (
            "garagesID" => $gID,
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
