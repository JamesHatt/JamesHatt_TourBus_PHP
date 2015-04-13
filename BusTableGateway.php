<?php

class BusTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getBuses($sortOrder) {
        // execute a query to get all buses
        $sqlQuery = "SELECT b . * , g.name AS garageName
                    FROM buses b
                    LEFT JOIN garages g ON g.garageID = b.garageID
                    ORDER BY " . $sortOrder;

        $statement = $this->connection->prepare($sqlQuery);

        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve bus");
        }

        return $statement;
    }

    public function getBusesByGarageId($garageID) {
        // execute a query to get all buses
        $sqlQuery = "SELECT b . * , g.name AS garageName
                FROM buses b
                LEFT JOIN garages g ON g.garageID = b.garageID
                WHERE b.garageID = :garageID";

        $params = array(
            'garageID' => garageID
        );

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve bus");
        }

        return $statement;
    }

    public function getBusById($bID) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT b . * , g.name AS garageName
                    FROM buses b
                    LEFT JOIN garages g ON g.garageID = b.garageID
                    WHERE busesID = :bID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "busesID" => $bID
        );

        $status = $statement->execute($params);

        if (!$status) {
            echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';
            die("Could not retrieve bus");
        }
        
        
        

        return $statement;
    }

    // related to the create bus form, here is the method
    public function insertBus($rn, $mk, $md, $nos, $es, $dbb, $ns, $gID) {
        $sqlQuery = "INSERT INTO buses " .
                "(regNo, Make, Model, NoOfSeats, engineSize, dateBusBought, nextService, garageID)" .
                "VALUES (:regNo, :Make, :Model, :NoOfSeats, :engineSize, :dateBusBought, :nextService, :garageID)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "regNo" => $rn,
            "Make" => $mk,
            "Model" => $md,
            "NoOfSeats" => $nos,
            "engineSize" => $es,
            "dateBusBought" => $dbb,
            "nextService" => $ns,
            "garageID" => $gID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert bus");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    //here is the delete bus method
    public function deleteBus($bID) {
        $sqlQuery = "DELETE FROM buses WHERE busesID = :busesID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "busesID" => $bID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete bus");
        }

        return ($statement->rowCount() == 1);
    }

    // here is the update method
    public function updateBus($bID, $rn, $mk, $md, $nos, $es, $dbb, $ns, $gID) {

        $sqlQuery = "UPDATE buses SET " .
                "regNo = :regNo, " .
                "make = :make, " .
                "model = :model, " .
                "noOfSeats = :noOfSeats, " .
                "engineSize = :engineSize, " .
                "dateBusBought = :dateBusBought, " .
                "nextService = :nextService, " .
                "garageID = :garageID " .
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
            "nextService" => $ns,
            "garageID" => $gID
        );
        
        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }

}
