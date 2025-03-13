<?php
if (!empty($_SESSION['id'])) {
    header("Location: /"); // Redirect if already logged in
    exit;
}

$error = [];

if (! empty($_POST)) {
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


    if (empty($error)) {

        if ($user->register()) {
            header('Location: /'); // Redirect to home page after successful registration
            exit();
        } else {
            $error['global'] = 'Echec de l\'inscription';  // General error message if registration fails
        }
    }
}

view('signUp', ['error' => $error]);
