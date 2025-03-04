<?php
session_start();
require 'models/User.php';
$user = new User();
$error = [];

if (!empty($_POST['delete'])) {
    $user->deleteUser($_SESSION['id']);
    session_destroy();
    header('Location: /');
}

//Verification de la connexion
if (! isset($_SESSION['email'])) {
    header('Location: /');
    exit();
}



//Verification de la modification
if (! empty($_POST)) {



    try {
        $user->setNickname($_POST['nickname']);
    } catch (\Exception $e) {
        $error['nickname'] = $e->getMessage();
        var_dump($error);
    }

    try {
        $user->setFirstname($_POST['firstname']);
    } catch (\Exception $e) {
        $error['firstname'] = $e->getMessage();
    }

    try {
        $user->setLastname($_POST['lastname']);
    } catch (\Exception $e) {
        $error['lastname'] = $e->getMessage();
    }

    try {
        $user->setCountry($_POST['country']);
    } catch (\Exception $e) {
        $error['country'] = $e->getMessage();
    }

    try {
        $user->setPassword($_POST['password']);
    } catch (\Exception $e) {
        $error['password'] = $e->getMessage();
    }

    try {
        $user->setPassword($_POST['password']);
    } catch (\Exception $e) {
        $error['password'] = $e->getMessage();
    }


    if ($user->modify($_SESSION['email'])) {
        $_SESSION['nickname'] = $user->getNickname($_SESSION['email']);
        $_SESSION['firstname'] = $user->getFirstname($_SESSION['email']);
        $_SESSION['lastname'] = $user->getLastname($_SESSION['email']);
        $_SESSION['country'] = $user->getCountry($_SESSION['email']);
    } else {
        $error['global'] = 'Echec de la modification';
    }
}




view('myProfil', [
    'error' => $error,
]);
