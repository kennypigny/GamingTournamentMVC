<?php

class User extends Database
{
    
    private $firstname;
    private $lastname;
    private $email;
    private $pseudo;
    private $password;

    /**
     * coucou
     */
    public function setNickname($value)
    {
        
        if (! empty($value)) {
            if (strlen($value) > 3 && strlen($value) <= 15) {
                if (preg_match('/^[a-zA-Z0-9]+$/', $value)) {
    
                    $this->pseudo = htmlspecialchars($value);
    
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

    public function getNickname()
    {
        return $this->pseudo;
    }

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

    public function getFirstname()
    {
        return $this->firstname;
    }

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

    public function getLastname()
    {
        return $this->lastname;
    }

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

    public function getPassword()
    {
        return $this->password;
    }

    public function setEmail($value)
    {
        if (! empty($value)) {

            

            if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                
                $this->email = htmlspecialchars($value);
    
            } else {
                throw new Exception('Veuillez renseigner un mot de passe');
            }
        } else {
            throw new Exception('Veuillez renseigner un email');
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * 
     */
    public function register(){
        
        $queryExecute = $this->db->prepare("INSERT INTO `tnmt_users`(`firstname`, `lastname`, `email`, `pseudo`, `password`,`date_created_account`, `id_role`) 
        VALUES (:firstname, :lastname, :email, :pseudo, :password, NOW(), 1)");

        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryExecute->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);


        return $queryExecute->execute();
    }
}
