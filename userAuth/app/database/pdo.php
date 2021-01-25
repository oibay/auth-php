<?php 

    try{
        $conn = new PDO('mysql:host=userauth-database;dbname=mydb;charset=utf8mb4', 'myuser', 'secret');
    }catch (PDOException $pe) {
        die("Error $dbname :" . $pe->getMessage());
    }

