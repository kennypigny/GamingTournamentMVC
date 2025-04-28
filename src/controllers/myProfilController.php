<?php

// Check if the user is logged in
if (! isset($_SESSION['id'])) {
    header('Location: /');
    exit();
}

// Instantiate the user with the session ID
$user = new User();
$user->setId($_SESSION['id']);
$dbUser = $user->get();
$error = [];
$success = [];

//Delete user account
if (!empty($_POST['delete'])) {

    // Verify password before deleting the account
    if (password_verify($_POST['delete-account'], $dbUser['password'])) {
        $user->deleteUser();
        session_destroy();
        header('Location: /');
    } else {
        $error['delete-account'] = 'mot de passe incorrect';
    }
}

// Modification form

// General information
if (!empty($_POST)) {

    if (!empty($_POST['nickname'])) {
        if ($user->nicknameIsUnique($_POST['nickname']) == false) {

            $error['nickname'] = 'Le pseudo existe déja';
        } else {
            try {
                $user->setNickname($_POST['nickname']);
            } catch (\Exception $e) {
                $error['nickname'] = $e->getMessage();
            }
        }
    }

    if (!empty($_POST['firstname'])) {
        try {
            $user->setFirstname($_POST['firstname']);
        } catch (\Exception $e) {
            $error['firstname'] = $e->getMessage();
        }
    }

    if (!empty($_POST['lastname'])) {
        try {
            $user->setLastname($_POST['lastname']);
        } catch (\Exception $e) {
            $error['lastname'] = $e->getMessage();
        }
    }

    if (!empty($_POST['country'])) {
        try {
            $user->setCountry($_POST['country']);
        } catch (\Exception $e) {
            $error['country'] = $e->getMessage();
        }
    }
    
    //Change password
    if (!empty($_POST['new-password'])) {

        if (!password_verify($_POST['password'], $dbUser['password'])) {

            $error['password'] = 'mot de passe incorrect';
        }

        if ($_POST['new-password'] != $_POST['verify-password']) {

            $error['new-password'] = 'Les mots de passe ne correspondent pas';
        }

        if (empty($error['new-password']) && empty($error['password'])) {

            try {
                $user->setPassword($_POST['new-password']);
            } catch (\Exception $e) {
                $error['password'] = $e->getMessage();
            }
            if (empty($error['password'])) {
                $success['new-password'] = 'Mot de passe changé !';
            }
        }
    }

    //Change Mail
    if (!empty($_POST['new-mail'])) {

        if (!password_verify($_POST['password-new-mail'], $dbUser['password'])) {

            $error['password-new-mail'] = 'mot de passe incorrect';
        }

        if ($user->emailIsUnique($_POST['new-mail']) == false) {

            $error['new-mail'] = 'L\'email existe déja';
        }

        if (empty($error['password-new-mail']) && empty($error['new-mail'])) {
            try {
                $user->setEmail($_POST['new-mail']);
            } catch (\Exception $e) {
                $error['email'] = $e->getMessage();
            }
            if (empty($error['email'])) {
                $success['new-mail'] = 'Email changé !';
            }
        }
    }

    // Update the user's data in the database
    $user->modify();
    
     
    $dbUser = $user->get();

    $_SESSION['id'] = $dbUser['id_users'];
    $_SESSION['firstname'] = $dbUser['firstname'];
    $_SESSION['lastname'] = $dbUser['lastname'];
    $_SESSION['email'] = $dbUser['email'];
    $_SESSION['nickname'] = $dbUser['pseudo'];
    $_SESSION['country'] = $dbUser['country'];
}

//END modification form

view('myProfil', [
    'error' => $error,
    'dbUser' => $user->get(),
    'success' => $success
]);





















// var_dump($_FILES);

// var_dump('/assets/img/profilePic/1.' . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

// $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
// move_uploaded_file($_FILES['photo']['tmp_name'], '/assets/ing/profilePic/1.' . $ext);

// $_SESSION['photo'] = $ext;
