<?php
require 'models/User.php';
session_start();

$user = new User();

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    $error['global'] = 'Veuillez remplir tous les champs';
} else {
    if ($user->verifyPassword($_POST['email'], $_POST['password'])) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['nickname'] = $user->getNickname($_POST['email']);
        header('Location: /');
        exit();
    } else {
        $error['global'] = 'Identifiants incorrects';
    }
}


view('login', ['error' => $error]);
