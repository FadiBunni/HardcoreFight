<?php

class Connection extends PDO {

    public function __construct() {

        try {
            parent::__construct("mysql:dbname=HardcoreFight;host=localhost","root","root");

        } catch(PDOException $e) {

            echo ('Unable to Connect');
            die;

        }

    }

}


