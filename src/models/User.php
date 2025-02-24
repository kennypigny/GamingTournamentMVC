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
     * Get the nickname (pseudo) of a user 
     * @param string $email The email of the user
     * @return array The user's nickname
     * @return null If the user does not exist
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
     * Get the firstname of a user .
     * @param string $email The email of the user.
     * @return array The user's firstname.
     * @return null If the user does not exist.
     */
    public function getFirstname($email)
    {
        $query = $this->db->prepare("SELECT firstname FROM tnmt_users WHERE email = :email");
        $query->execute(['email' => $email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['firstname'] : null;
    }
    /**
     * Validate and set the lastname.
     * Must be only letters.
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
     * Get the lastname of a user
     * @param string $email The email of the user.
     * @return array The user's lastname.
     * @return null If the user does not exist.
     */
    public function getLastname($email)
    {
        $query = $this->db->prepare("SELECT lastname FROM tnmt_users WHERE email = :email");
        $query->execute(['email' => $email]);
        
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['lastname'] : null;
    }
    
    /**
     * Validate and set the password
     * Must be at least 8 characters
     * Hash using `password_hash()`
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
     * Get the password of a user 
     * @param string $email The email of the user
     * @return array The user's password
     * @return string 'null' If the user does not exist
     */
    public function getPassword($email)
    {
        $query = $this->db->prepare("SELECT password FROM tnmt_users WHERE email = :email");
        $query->execute(['email' => $email]);

        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['password'] : 'null';
    }
    /**
     * @param string $email The email of the user
     * @param string $password The password to verify
     * @return bool True if the password is correct, false otherwise
     */
    public function verifyPassword($email, $password)
    {
        $hashedPassword = $this->getPassword($email);

        if (!is_string($hashedPassword)) {
            return false; // L'utilisateur n'existe pas ou problème avec la récupération du mot de passe
        }
    
        return password_verify($password, $hashedPassword);
    }
    /** 
     * Validate and set the email
     * Must be a valid email
     * @param string $value The email to set
     * @throws Exception If validation fails
     */
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
    /**
     * Get the email of a user 
     * @param string $email The email of the user
     * @return array The user's email
     * @return null If the user does not exist
     */
    public function getEmail($email)
    {
        $query = $this->db->prepare("SELECT email FROM tnmt_users WHERE email = :email");
        $query->execute(['email' => $email]);
        
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['email'] : null ;
    }
    /**
     * Get the role of user 
     * @param string $email The email of the user
     * @return array The user's id
     */
    public function getRole($email)
    {
        $query = $this->db->prepare("SELECT id_role FROM tnmt_users WHERE email = :email");
        $query->execute(['email' => $email]);

        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['id_role'] : null ;
        
        
    }

    /**
     * Register a new user
     * @return bool True if the user was registered, false otherwise
     * @throws Exception If the email is already used
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
