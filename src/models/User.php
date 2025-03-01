<?php

class User extends Database
{
    // public function __construct() {
    //     parent::__construct();
    // }

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
            $this->country = htmlspecialchars($value);
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
    public function getId($email){
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
        if ($this->getEmail($this->email)) {
            throw new Exception('Cet email est déjà utilisé.');
        }

        $stmt = $this->db->prepare("INSERT INTO `tnmt_users`(`firstname`, `lastname`, `email`, `pseudo`, `password`,`date_created_account`, `id_role`) 
        VALUES (:firstname, :lastname, :email, :pseudo, :pass, NOW(), 1)");

        $stmt->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':pseudo', $this->nickname, PDO::PARAM_STR);
        $stmt->bindValue(':pass', $this->password, PDO::PARAM_STR);


        return $stmt->execute();
    }

    /**
     * Modify the user's information with email
     * @param string $email The email of the user
     * @return bool True if the user's information was modified
     * @throws Exception If the email is already used
     */
    public function modify($email)
    {

        if (!empty($_POST['firstname'])) {
            $stmt = $this->db->prepare("UPDATE `tnmt_users` SET `firstname` = :firstname WHERE `email` = :email");
            $stmt->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email);

            return $stmt->execute();
        }

        if (!empty($_POST['lastname'])) {
            $stmt = $this->db->prepare("UPDATE `tnmt_users` SET `lastname` = :lastname WHERE `email` = :email");
            $stmt->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email);

            return $stmt->execute();
        }

        if (!empty($_POST['nickname'])) {
            $stmt = $this->db->prepare("UPDATE `tnmt_users` SET `pseudo` = :pseudo WHERE `email` = :email");
            $stmt->bindValue(':pseudo', $this->nickname, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email);

            return $stmt->execute();
        }

        if (!empty($_POST['country'])) {
            $stmt = $this->db->prepare("UPDATE `tnmt_users` SET `country` = :country WHERE `email` = :email");
            $stmt->bindValue(':country', $this->country, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email);

            return $stmt->execute();
        }
        if (!empty($_POST['password'])) {
            $stmt = $this->db->prepare("UPDATE `tnmt_users` SET `password` = :pass WHERE `email` = :email");
            $stmt->bindValue(':pass', $this->password, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email);

            return $stmt->execute();
        }
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
