<?php

class User extends Database
{

    private $firstname;
    private $lastname;
    private $email;
    private $nickname;
    private $password;

    /**
     * Validate and set the nickname (pseudo)
     * Must be 3-15 characters, only letters and numbers
     * Clean and throws an exception if invalid
     *
     * @param string $value The nickname to set
     * @throws Exception If validation fails
     */
    public function setNickname($value)
    {

        if (! empty($value)) {
            if (strlen($value) > 3 && strlen($value) <= 15) {
                if (preg_match('/^[a-zA-Z0-9]+$/', $value)) {

                    $this->nickname = htmlspecialchars($value);
                } else {
                    throw new Exception('Votre pseudo doit contenir uniquement des lettres ou des chiffres');
                }
            } else {
                throw new Exception('Votre pseudo doit contenir entre 3 et 15 caractères');
            }
        } else {
            throw new Exception('Veuillez renseigner un pseudo');
        }
    }
    /**
     * Get the nickname (pseudo) of a user by email
     * @param string $email The email of the user
     * @return array The user's nickname
     */
    public function getNickname($email)
    {
        $query = $this->db->prepare("SELECT pseudo FROM tnmt_users WHERE email = :email");
        $query->execute(['email' => $email]);

        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['pseudo'] : null;
    }

    /**
     * Validate and set the firstname
     * Must be only letters
     * Clean and throws an exception if invalid
     * @param string $value The firstname to set
     * @throws Exception If validation fails
     */
    public function setFirstname($value)
    {
        if (! empty($value)) {
            if (preg_match('/^[a-zA-Z]+$/', $value)) {

                $this->firstname = htmlspecialchars($value);
            } else {
                throw new Exception('Votre nom doit contenir uniquement des lettres');
            }
        } else {
            throw new Exception('Veuillez renseigner un nom');
        }
    }
    /**
     * Get the firstname of a user by email.
     * @param string $email The email of the user.
     * @return array The user's firstname.
     */
    public function getFirstname($email)
    {
        $query = $this->db->prepare("SELECT firstname FROM tnmt_users WHERE email = :email");
        $query->execute(['email' => $email]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * Validate and set the lastname.
     * Must be only letters.
     * Clean and throws an exception if invalid.
     * @param string $value The lastname to set.
     * @throws Exception If validation fails.
     */
    public function setLastname($value)
    {
        if (! empty($value)) {
            if (preg_match('/^[a-zA-Z]+$/', $value)) {

                $this->lastname = htmlspecialchars($value);
            } else {
                throw new Exception('Votre prénom doit contenir uniquement des lettres');
            }
        } else {
            throw new Exception('Veuillez renseigner un prénom');
        }
    }
    /**
     * Get the lastname of a user by email.
     * @param string $email The email of the user.
     * @return array The user's lastname.
     */
    public function getLastname($email)
    {
        $query = $this->db->prepare("SELECT lastname FROM tnmt_users WHERE email = :email");
        $query->execute(['email' => $email]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Validate and set the password
     * Must be at least 8 characters
     * Hash using `password_hash()`
     * Clean and throws an exception if invalid
     * @param string $value The password to set
     * @throws Exception If validation fails
     */
    public function setPassword($value)
    {
        if (! empty($value)) {
            if (strlen($value) >= 8) {

                $this->password = password_hash($value, PASSWORD_DEFAULT);
            } else {
                throw new Exception('Votre mot de passe doit contenir au moins 8 caractéres');
            }
        } else {
            throw new Exception('Veuillez renseigner un mot de passe');
        }
    }
    /**
     * Get the password of a user by email
     * @param string $email The email of the user
     * @return array The user's password
     */
    public function getPassword($email)
    {
        $query = $this->db->prepare("SELECT password FROM tnmt_users WHERE email = :email");
        $query->execute(['email' => $email]);

        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['password'] : 'null';
    }

    public function verifyPassword($email, $password)
    {
        $hashedPassword = $this->getPassword($email);

        if (!is_string($hashedPassword)) {
            return false; // L'utilisateur n'existe pas ou problème avec la récupération du mot de passe
        }
    
        return password_verify($password, $hashedPassword);
    }

    public function setEmail($value)
    {
        if (! empty($value)) {
            if ($this->getEmail($value)) {
                throw new Exception('Cet email est déjà utilisé.');
            }
            if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $this->email = htmlspecialchars($value);
            } else {
                throw new Exception('Veuillez renseigner email valide');
            }
        } else {
            throw new Exception('Veuillez renseigner un email');
        }
    }
    public function getEmail($email)
    {
        $query = $this->db->prepare("SELECT email FROM tnmt_users WHERE email = :email");
        $query->execute(['email' => $email]);
        
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['email'] : null ;
    }


    /**
     * Register user in database
     * 
     */
    public function register()
    {
        if ($this->getEmail($this->email)) {
            throw new Exception('Cet email est déjà utilisé.');
        }

        $queryExecute = $this->db->prepare("INSERT INTO `tnmt_users`(`firstname`, `lastname`, `email`, `pseudo`, `password`,`date_created_account`, `id_role`) 
        VALUES (:firstname, :lastname, :email, :pseudo, :password, NOW(), 1)");

        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryExecute->bindValue(':pseudo', $this->nickname, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);


        return $queryExecute->execute();
    }
}
