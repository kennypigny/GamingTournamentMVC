<?php

class Database
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
        } catch (\Throwable $th) {
            die('Erreur : ' . $th->getMessage());
        }
    }
}

//method appelé automatiquement quand l'objet est supprimé(ou = NULL) (stop la connection a la bdd)

// public function __destruct()
// {
// 	$this->db = null;
// }
