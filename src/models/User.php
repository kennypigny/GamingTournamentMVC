<?php

class User extends Database
{
    private $firstname;
    private $lastname;
    private $email;
    private $nickname;
    private $password;
    private $country;


    //SETTER ET GETTER
    /**
     * Validate and set the nickname (pseudo)
     * Must be 3-15 characters, only letters and numbers
     * @param string $value The nickname to set
     * @throws Exception If validation fails
     */
    public function setNickname($value)
    {
        if (empty($value)) throw new Exception('Veuillez renseigner un pseudo');
        if (strlen($value) < 3 || strlen($value) > 15) throw new Exception('Votre pseudo doit contenir entre 3 et 15 caractères');
        if (!preg_match('/^[a-zA-Z0-9]+$/', $value)) throw new Exception('Votre pseudo doit contenir uniquement des lettres ou des chiffres');

        $this->nickname = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }

    /**
     * Get the nickname (pseudo) of a user 
     * @param string $email The email of the user
     * @return array The user's nickname
     * @return null If the user does not exist
     */
    public function getNickname($email)
    {
        $stmt = $this->db->prepare("SELECT pseudo FROM tnmt_users WHERE email = :email");
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
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
            if (preg_match('/^[\p{L} \'-]+$/u', $value)) {

                $this->firstname = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
            } else {
                throw new Exception('Votre prénom doit contenir uniquement des lettres');
            }
        } else {
            return throw new Exception('Veuillez renseigner un nom');
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
        $stmt = $this->db->prepare("SELECT firstname FROM tnmt_users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
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
        if (empty($value)) throw new Exception('Veuillez renseigner un prénom');
        if (!preg_match('/^[\p{L} \'-]+$/u', $value)) throw new Exception('Votre nom doit contenir uniquement des lettres');

        $this->lastname = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }

    /**
     * Get the lastname of a user
     * @param string $email The email of the user.
     * @return array The user's lastname.
     * @return null If the user does not exist.
     */
    public function getLastname($email)
    {
        $stmt = $this->db->prepare("SELECT lastname FROM tnmt_users WHERE email = :email");
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
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
        $stmt = $this->db->prepare("SELECT password FROM tnmt_users WHERE email = :email");
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
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
            return false;
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
        if (empty($value)) throw new Exception('Veuillez renseigner un email');
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) throw new Exception('Veuillez renseigner email valide');

        $this->email = trim($value);
    }

    /**
     * Get the email of a user 
     * @param string $email The email of the user
     * @return array The user's email
     * @return null If the user does not exist
     */
    public function getEmail($email)
    {
        $stmt = $this->db->prepare("SELECT email FROM tnmt_users WHERE email = :email");
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['email'] : null;
    }

    /**
     * Get the role of user 
     * @param string $email The email of the user
     * @return array The user's id
     */
    public function getRole($email)
    {
        $stmt = $this->db->prepare("SELECT id_role FROM tnmt_users WHERE email = :email");
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['id_role'] : null;
    }

    /**
     * Validate and set the country
     * @param string $value The country to set
     * @throws Exception If validation fails
     */
    public function setCountry($value)
    {
        if (! empty($value)) {
            $this->country = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
        } else {
            throw new Exception('Veuillez renseigner un pays');
        }
    }

    /**
     * Get the country of a user
     * @param string $email The email of the user
     * @return array The user country
     */
    public function getCountry($email)
    {
        $stmt = $this->db->prepare("SELECT country FROM tnmt_users WHERE email = :email");
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['country'] : null;
    }

    public function getId($email)
    {
        $stmt = $this->db->prepare("SELECT id_users FROM tnmt_users WHERE email = :email");
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['id_users'] : null;
    }

    /**
     * Register a new user
     * @return bool True if the user was registered, false otherwise
     * @throws Exception If the email is already used
     */
    public function register()
    {
        if ($this->getEmail($this->email)) throw new Exception('Cet email est déjà utilisé.');


        $stmt = $this->db->prepare("INSERT INTO `tnmt_users`(`firstname`, `lastname`, `email`, `pseudo`, `password`,`date_created_account`, `id_role`) 
        VALUES (:firstname, :lastname, :email, :pseudo, :pass, NOW(), 1)");

        $stmt->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':pseudo', $this->nickname, PDO::PARAM_STR);
        $stmt->bindValue(':pass', $this->password, PDO::PARAM_STR);


        return $stmt->execute();
    }

    public function modify()
    {
        if (empty($this->email)) {
            logMessage('Email not found');
            throw new Exception('Email non trouvé, réessayer plus tard');
        }

        $updates = [];
        $params = [':email' => $this->email];

        if (!empty($this->firstname)) {
            $updates[] = "`firstname` = :firstname";
            $params[':firstname'] = $this->firstname;
        }

        if (!empty($this->lastname)) {
            $updates[] = "`lastname` = :lastname";
            $params[':lastname'] = $this->lastname;
        }

        if (!empty($this->nickname)) {
            $updates[] = "`pseudo` = :pseudo";
            $params[':pseudo'] = $this->nickname;
        }

        if (!empty($this->country)) {
            $updates[] = "`country` = :country";
            $params[':country'] = $this->country;
        }

        if (!empty($this->password)) {
            $updates[] = "`password` = :pass";
            $params[':pass'] = $this->password;
        }


        if (!empty($updates)) {
            $sql = "UPDATE `tnmt_users` SET " . implode(", ", $updates) . " WHERE `email` = :email";
            $stmt = $this->db->prepare($sql);

            // Associer les valeurs
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }

            return $stmt->execute();
        }

        return false;
    }

    /**
     * Get all users from the tnmt_users table.
     * @return array array containing all users.
     */
    public function getUsers()
    {
        $stmt = $this->db->prepare("SELECT * FROM tnmt_users ");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Deletes a user from the tnmt_users table based on their ID.
     * @param string $id name of button user with ID user in value.
     * @return bool Returns true on success, false on failure.
     */
    public function deleteUser($id)
    {
        $stmt = $this->db->prepare("DELETE FROM tnmt_users WHERE id_users = :id_users");
        $stmt->bindValue(':id_users', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Counts the total number of users in the tnmt_users table.
     * @return array Returns an associative array containing the count of users with the key 'user_count'.
     */
    public function countUser()
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS user_count FROM tnmt_users ");
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
