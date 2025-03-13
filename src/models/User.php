<?php

/**
 * User class for managing user data and interactions with the database.
 * 
 * - Manages user properties such as ID, first name, last name, email, nickname, password, country, and role.
 * - Provides methods SETTER and GETTER these properties with validation.
 * - Includes methods for interacting with the database, including retrieving, registering, modifying, and deleting users.
 */
class User extends Database
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $nickname;
    private $password;
    private $country;
    private $role;



    //SETTER ET GETTER

    /**
     * Sets the ID of the user.
     * 
     * - Checks if the provided value is empty and throws an exception if it is.
     * 
     * @param $value The ID value to set.
     * @throws Exception If the value is empty.
     */
    public function setId($value)
    {
        if (empty($value)) throw new Exception('Veuillez renseigner un id');

        $this->id = (int) $value;
    }
    /**
     * Gets the user ID.
     * 
     * @return int The ID of the user.
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Sets the user's first name after validation and sanitization.
     * 
     * - Ensures the value is not empty and contains only valid characters.
     * - Throws an exception if validation fails.
     * 
     * @param string $value The first name to set.
     * @throws Exception If the value is empty or invalid.
     */
    public function setFirstname($value)
    {
        if (empty($value)) {
            throw new Exception('Veuillez renseigner un nom');
        }
        if (!preg_match('/^[\p{L} \'-]+$/u', $value)) {
            throw new Exception('Votre prénom doit contenir uniquement des lettres');
        }
        $this->firstname = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }
    /**
     * Gets the user's first name.
     * 
     * @return string The first name.
     */
    public function getFirstname()
    {
        return $this->firstname;
    }


    /**
     * Validates and sets the user's last name.
     * 
     * - Ensures the value is not empty and contains only valid characters.
     * - Throws an exception if validation fails.
     * 
     * @param string $value The last name to set.
     * @throws Exception If empty or invalid.
     */
    public function setLastname($value)
    {
        if (empty($value)) {

            throw new Exception('Veuillez renseigner un prénom');
        }
        if (!preg_match('/^[\p{L} \'-]+$/u', $value)) {

            throw new Exception('Votre nom doit contenir uniquement des lettres');
        }

        $this->lastname = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }
    /**
     * Gets the user's last name.
     * 
     * @return string The stored last name.
     */
    public function getLastname()
    {
        return $this->lastname;
    }


    /**
     * Valide et définit le pseudo de l'utilisateur.
     * 
     * - Vérifie que la valeur n'est pas vide et que sa longueur est entre 3 et 15 caractères.
     * - Vérifie que le pseudo contient uniquement des lettres et des chiffres.
     * - Lève une exception si la validation échoue.
     * 
     * @param string $value Le pseudo à définir.
     * @throws Exception Si vide, longueur invalide, ou contient des caractères non alphanumériques.
     */
    public function setNickname($value)
    {
        if (empty($value)) {
            throw new Exception('Veuillez renseigner un pseudo');
        }
        if (strlen($value) < 3 || strlen($value) > 15) {
            throw new Exception('Votre pseudo doit contenir entre 3 et 15 caractères');
        }
        if (!preg_match('/^[a-zA-Z0-9]+$/', $value)) {
            throw new Exception('Votre pseudo doit contenir uniquement des lettres ou des chiffres');
        }

        $this->nickname = trim(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }
    /**
     * Gets the user's nickname.
     * 
     * @return string The stored nickname.
     */
    public function getNickname()
    {
        return $this->nickname;
    }


    /**
     * Validates and sets the user's email address.
     * 
     * - Ensures the value is not empty and is a valid email format.
     * - Trims the email before assigning it.
     * - Throws an exception if validation fails.
     * 
     * @param string $value The email to set.
     * @throws Exception If empty or invalid email format.
     */
    public function setEmail($value)
    {
        if (empty($value)) {
            throw new Exception('Veuillez renseigner un email');
        }
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Veuillez renseigner email valide');
        }

        $this->email = trim($value);
    }
    /**
     * Gets the user's email address.
     * 
     * @return string The stored email address.
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Validates and sets the user's password.
     * 
     * - Ensures the value is not empty and is at least 8 characters long.
     * - Hashes the password using the default algorithm before assigning it.
     * - Throws an exception if validation fails.
     * 
     * @param string $value The password to set.
     * @throws Exception If empty or less than 8 characters.
     */
    public function setPassword($value)
    {
        if (!empty($value)) {
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
     * Validates and sets the user's country.
     * 
     * - Ensures the value is not empty.
     * - Throws an exception if validation fails.
     * 
     * @param string $value The country to set.
     * @throws Exception If empty.
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
     * Gets the user's country.
     * 
     * @return string The stored country.
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Gets the user's role.
     * 
     * @return INT The stored role.
     */
    public function getRole()
    {
        return $this->role;
    }


    // DATABASE

    /**
     * Retrieves a user's data from the database by user ID.
     * 
     * - Prepares and executes a SELECT query to fetch the user's details.
     * - Uses the user's ID as a parameter in the query.
     * - Returns the result as an associative array.
     * 
     * @return array The user's data, or false if no user is found.
     */
    public function get()
    {
        $stmt = $this->db->prepare("SELECT * FROM tnmt_users WHERE id_users = :id");
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    /**
     * Retrieves a user's data from the database by email.
     * 
     * - Prepares and executes a SELECT query to fetch the user's details using the email.
     * - Uses the user's email as a parameter in the query.
     * - Returns the result as an associative array.
     * 
     * @return array The user's data, or false if no user is found.
     */
    public function getByMail()
    {
        $stmt = $this->db->prepare("SELECT * FROM tnmt_users WHERE email = :email");
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves a list of users from the database with pagination.
     * 
     * - Prepares and executes a SELECT query to fetch user data with a specified limit and offset.
     * - Allows pagination by controlling the number of users returned and the starting point.
     * - Returns the results as an array of associative arrays.
     * 
     * @param int $offset The starting point for the query (default is 0).
     * @param int $limit The number of users to fetch (default is 20).
     * @return array A list of users.
     */
    public function getList()
    {
        $stmt = $this->db->prepare("SELECT * FROM tnmt_users");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Compte le nombre total d'utilisateurs dans la base de données.
     * 
     * - Prépare et exécute une requête SELECT pour compter le nombre total d'utilisateurs.
     * - Renvoie le nombre d'utilisateurs, ou 0 si aucun utilisateur n'est trouvé.
     * 
     * @return int Le nombre total d'utilisateurs.
     */
    public function countAll()
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS user_count FROM tnmt_users ");
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['user_count'] : 0;
    }

    /**
     * Registers a new user in the database.
     * 
     * - Prepares and executes an INSERT query to add a new user with their details (first name, last name, email, nickname, password).
     * - Sets the `date_created_account` to the current date and assigns a default role (`id_role` 1).
     * - Returns the result of the execution (true if successful, false otherwise).
     * 
     * @return bool True if the user was successfully registered, false otherwise.
     */
    public function register()
    {
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
     * Modifies a user's details in the database.
     * 
     * - Checks if the user's ID is set; if not, throws an exception.
     * - Dynamically builds the UPDATE query based on the fields that are not empty (firstname, lastname, nickname, country, password).
     * - Binds the parameters for the query and executes it.
     * - Returns true if the update is successful, false otherwise.
     * 
     * @return bool True if the user was successfully modified, false otherwise.
     * @throws Exception If the user's ID is not found.
     */
    public function modify()
    {
        if (empty($this->id)) {

            throw new Exception('Email non trouvé, réessayer plus tard');
        }

        $updates = [];
        $params = [':id' => $this->id];

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
        if (!empty($this->email)) {
            $updates[] = "`email` = :email";
            $params[':email'] = $this->email;
        }


        if (!empty($updates)) {
            $sql = "UPDATE `tnmt_users` SET " . implode(", ", $updates) . " WHERE `id_users` = :id";
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
     * Deletes a user from the database by their ID.
     * 
     * - Binds the user ID as a parameter in the query.
     * - Returns true if the deletion is successful, false otherwise.
     * 
     * @return bool True if the user was successfully deleted, false otherwise.
     */
    public function deleteUser()
    {
        $stmt = $this->db->prepare("DELETE FROM tnmt_users WHERE id_users = :id_users");
        $stmt->bindValue(':id_users', $this->id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    //Verify in Database

    /**
     * Checks if the given email is already used in the database.
     * Executes a query to count occurrences of the email.
     *
     * @param string $email The email to verify.
     * @return bool True if the email is unique, false otherwise.
     */
    public function emailIsUnique($email): bool
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM tnmt_users WHERE email = :email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn() == 0;
    }

    /**
     * Checks if the given nickname is already used in the database.
     * Executes a query to count occurrences of the nickname.
     *
     * @param string $nickname The nickname to verify.
     * @return bool True if the nickname is unique, false otherwise.
     */
    public function nicknameIsUnique($nickname): bool
    {
        $sql = "SELECT COUNT(*) FROM tnmt_users WHERE pseudo = :nickname";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn() == 0;
    }
}













// public function __construct()
// {
//     parent::__construct();

//     if (!empty($_SESSION['id'])) {
//         try {
//             $this->setId($_SESSION['id']);
//             $this->load();
//         } catch (\Exception $e) {
//         }
//     }
// }







// public function load()
    // {
    //     $stmt = $this->db->prepare("SELECT * FROM tnmt_users WHERE id_users = :id");
    //     $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
    //     $stmt->execute();

    //     $data = $stmt->fetch(PDO::FETCH_ASSOC);

    //     if (!empty($data)) {
    //         $this->id = $data['id_users'];
    //         $this->firstname = $data['firstname'];
    //         $this->lastname = $data['lastname'];
    //         $this->email = $data['email'];
    //         $this->nickname = $data['pseudo'];
    //         $this->password = $data['password'];
    //         $this->country = $data['country'];
    //         $this->role = $data['id_role'];
    //     }
    // }