<?php

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
            die('Erreur : ' . $e->getMessage());
        }
    }
}

//method appelé automatiquement quand l'objet est supprimé(ou = NULL) (stop la connection a la bdd)

// public function __destruct()
// {
// 	$this->db = null;
// }
