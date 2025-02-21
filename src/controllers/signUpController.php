<?php


$error = [];

if (! empty($_POST)) {


    if (! empty($_POST['nickname'])) {
        if ($_POST['nickname'] > 3 && $_POST['nickname'] < 15) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['nickname'])) {
                # code...
            } else {
                $error['nickname'] = 'Votre pseudo doit contenir uniquement des lettres ou des chiffres';
            }
        } else {
            $error['nickname'] = 'Votre pseudo doit contenir entre 3 et 15 caractéres';
        }
    } else {
        $error['nickname'] = 'Veuillez renseigner un pseudo';
    }

    if (! empty($_POST['firstname'])) {
        if (preg_match('/^[a-zA-Z]+$/', $_POST['firstname'])) {
            # code...
        }else {
            $error['firstname'] = 'Votre nom doit contenir uniquement des lettres';
        }
    } else {
        $error['firstname'] = 'Veuillez renseigner un nom';
    }

    if (! empty($_POST['lastname'])) {
        if (preg_match('/^[a-zA-Z]+$/', $_POST['lastname'])) {
            # code...
        }else {
            $error['lastname'] = 'Votre prénom doit contenir uniquement des lettres';
        }
    } else {
        $error['lastname'] = 'Veuillez renseigner un prénom';
    }

    if (! empty($_POST['password'])) {
        if (strlen($_POST['password']) >= 8) {
            # code...
        }else {
            $error['password'] = 'Votre mot de passe doit contenir au moins 8 caractéres';
        }
    } else {
        $error['password'] = 'Veuillez renseigner un mot de passe';
    }

    if (! empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            # code...
        }else {
            $error['email'] = 'Veuillez renseigner un email valide';
        }
    } else {
        $error['email'] = 'Veuillez confirmer votre email';
    }

    if (empty($error)) {
        # code...
    }

}

render('signUp', false, [
    'error' => $error
]);
