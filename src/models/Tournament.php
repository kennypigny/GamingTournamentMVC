<?php
class Tournament extends Database
{

    private $id;
    private $title;
    private $description;
    private $date;
    private $rules;
    private $reward;
    private $teams;
    private $autoAccept;


    public function setIdTournament($value)
    {

        if (empty($value)) throw new Exception('Veuillez renseigner un id');

        $this->id = (int) $value;
    }

    public function getIdTournament()
    {
        return $this->id;
    }

    public function setTitle($value)
    {

        if (empty($value)) {
            throw new Exception('Veuillez renseigner un titre');
        }
        if (strlen($value) < 3 || strlen($value) > 40) {
            throw new Exception('Votre titre doit contenir entre 3 et 40 caractères');
        }
        if (!preg_match('/^[a-zA-Z0-9]+$/', $value)) {
            throw new Exception('Votre titre doit contenir uniquement des lettres ou des chiffres');
        }

        $this->title = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($value)
    {

        if (empty($value)) {
            throw new Exception('Veuillez renseigner une description');
        }
        if (strlen($value) > 500) {
            throw new Exception('Votre description doit contenir 500 caractères maximum');
        }
        if (!preg_match('/^[a-zA-Z0-9\'"()\-&_]+$/', $value)) {
            throw new Exception('Votre description doit contenir uniquement des lettres, des chiffres ou \' " ( ) & - _');
        }

        $this->description = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDate($value)
    {

        if (empty($value)) {
            throw new Exception('Veuillez renseigner une date');
        }
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
            throw new Exception('Format de date invalide. Utilisez YYYY-MM-DD.');
        }

        $this->date = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setRules($value)
    {

        if (empty($value)) {
            throw new Exception('Veuillez renseigner des règles');
        }
        if (strlen($value) > 500) {
            throw new Exception('Vos règles doivent contenir 500 caractères maximum');
        }
        if (!preg_match('/^[a-zA-Z0-9\'"()\-&_]+$/', $value)) {
            throw new Exception('Vos règles doivent contenir uniquement des lettres, des chiffres ou \' " ( ) & - _');
        }

        $this->rules = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function setReward($value)
    {

        if (empty($value)) {
            throw new Exception('Veuillez renseigner une récompense');
        }
        if (strlen($value) > 500) {
            throw new Exception('Votre récompense doit contenir 500 caractères maximum');
        }
        if (!preg_match('/^[a-zA-Z0-9\'"()\-&_]+$/', $value)) {
            throw new Exception('Votre récompense doit contenir uniquement des lettres, des chiffres ou \' " ( ) & - _');
        }

        $this->reward = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }

    public function getReward()
    {
        return $this->reward;
    }

    public function get()
    {
        $query = $this->db->prepare('SELECT * FROM tournaments WHERE id = :id');
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM tournaments ORDER BY date DESC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create()
    {
        $query = $this->db->prepare('INSERT INTO `tnmt_tournament` (``, description, date, rules, reward) VALUES (:title, :description, :date, :rules, :reward)');
        $query->bindValue(':title', $this->title, PDO::PARAM_STR);
        $query->bindValue(':description', $this->description, PDO::PARAM_STR);
        $query->bindValue(':date', $this->date, PDO::PARAM_STR);
        $query->bindValue(':rules', $this->rules, PDO::PARAM_STR);
        $query->bindValue(':reward', $this->reward, PDO::PARAM_STR);
        return $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM tournaments WHERE id = :id');
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $query->execute();
    }
}
