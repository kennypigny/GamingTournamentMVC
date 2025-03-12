<?php

/**
 * Database class for handling the connection to the database.
 * 
 * - Establishes a connection to the MySQL database using PDO.
 * - Configures the connection to throw exceptions on errors and to fetch results as associative arrays.
 * - If the connection fails, logs the error and displays a generic connection error message.
 * 
 * @throws Exception If the connection fails, an exception is thrown.
 */
class Database
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=mysql-con;dbname=database;charset=utf8', 'root', 'pw', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            
        } catch (Exception $e) {
            error_log("Erreur de connexion : " . $e->getMessage());
            die('Erreur de connexion, Veuillez revenir plus tard');
        }
    }
}

