<?php
require 'models/User.php';
$user = new User();
$error = [];

if (!empty($_POST['delete'])) {
    if ($user->verifyPassword($_SESSION['email'], $_POST['delete-account']) == true) {
        $user->deleteUser($_SESSION['id']);
        session_destroy();
        header('Location: /');
    }else {
        $error['delete-account'] = 'mot de passe incorrect';
    }
}

//Verification de la connexion
if (! isset($_SESSION['email'])) {
    header('Location: /');
    exit();
}



//Verification de la modification
if (! empty($_POST)) {


    try {
        $user->setEmail($_SESSION['email']);
    } catch (\Exception $e) {
        $error['email'] = $e->getMessage();
    }

    if (!empty($_POST['nickname'])) {
        try {
            $user->setNickname($_POST['nickname']);
        } catch (\Exception $e) {
            $error['nickname'] = $e->getMessage();
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


    if (!empty($_POST['new-password'])) {

        if ($user->verifyPassword($_SESSION['email'], $_POST['password']) == false) $error['password'] = 'mot de passe incorrect';

        if ($_POST['new-password'] != $_POST['verify-password']) $error['new-password'] = 'Mot de passe incorrect';

        try {
            $user->setPassword($_POST['new-password']);
        } catch (\Exception $e) {
            $error['password'] = $e->getMessage();
        }
    }


    if (empty($error)) {
        if ($user->modify()) {
            $_SESSION['nickname'] = $user->getNickname($_SESSION['email']);
            $_SESSION['firstname'] = $user->getFirstname($_SESSION['email']);
            $_SESSION['lastname'] = $user->getLastname($_SESSION['email']);
            $_SESSION['country'] = $user->getCountry($_SESSION['email']);
        } else {
            $error['global'] = 'Echec de la modification';
        }
    }
}





view('myProfil', [
    'error' => $error,
]);
