<?php
session_start();
if (!empty($_SESSION['email'])) {
    header("Location: /");
    exit;
}
$error = [];

//Process form submission for user registration.
if (! empty($_POST)) {
    require 'models/User.php';
    $user = new User();

    try {
        $user->setNickname($_POST['nickname']);
    } catch (\Exception $e) {
        $error['nickname'] = $e->getMessage();
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
        $user->setEmail($_POST['email']);
    } catch (\Exception $e) {
        $error['email'] = $e->getMessage();
    }

    try {
        $user->setPassword($_POST['password']);
    } catch (\Exception $e) {
        $error['password'] = $e->getMessage();
    }


    //Send data to database if there are no errors.
    if (empty($error)) {

        if ($user->register()) {
            header('Location: /');
            exit();
        } else {
            $error['global'] = 'Echec de l\'inscription';
        }
    }
}

view('signUp', ['error' => $error]);
