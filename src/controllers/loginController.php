<?php
// Initializing the User object and the error array
$user = new User();
$error = [];

if (!empty($_POST)) {

     // Attempting to validate the user's email
    try {
        $user->setEmail($_POST['email']);
    } catch (\Exception $e) {
        $error['email'] = $e->getMessage();
    }
    
    // Attempting to validate the user's password
    try {
        $user->setPassword($_POST['password']);
    } catch (\Exception $e) {
        $error['password'] = $e->getMessage();
    }

    // If no errors were found in the data, proceed to check the user in the database
    if (empty($error)) {
        $dbUser = $user->getByMail();

        // Verifying password
        if (password_verify($_POST['password'], $dbUser['password'])) {

            // Successful login, creating session variables and redirecting the user to the homepage
            $_SESSION['id'] = $dbUser['id_users'];
            $_SESSION['firstname'] = $dbUser['firstname'];
            $_SESSION['lastname'] = $dbUser['lastname'];
            $_SESSION['email'] = $dbUser['email'];
            $_SESSION['nickname'] = $dbUser['pseudo'];
            
            if (!empty($dbUser['country'])) {
                $_SESSION['country'] = $dbUser['country'];
            }
            
            header('Location: /');
            exit();
        } else {
            $error['password'] = 'Mot de passe incorrect';
        }
    }
}

view('login', [
    'error' => $error,
]);
