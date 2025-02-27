<?php

class Database
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=mysql-con;dbname=database;charset=utf8', 'root', 'pw', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false //  Désactive l'émulation pour plus de sécurité
            ]);
            
        } catch (Exception $e) {
            error_log("Erreur de connexion : " . $e->getMessage());
            die('Erreur de connexion, Veuillez revenir plus tard');
        }
    }
}

