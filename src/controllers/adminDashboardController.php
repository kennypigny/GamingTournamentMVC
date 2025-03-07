<?php
if ($_SESSION['email'] != 'pigny.kenny@gmail.com') {
  redirectTo('/');
}

require 'models/User.php';

$user = new User;

if (isset($_POST['get-id'])) {
  $user->deleteUser($_POST['get-id']);
}

$users = $user->getUsers();

$user->countUser();


function showUsers()
{
  global $users;
  foreach ($users as $user) {
    echo '<li class="list-item">
              <a class="user-lign" href="/" target="_blank">
                <p class="name">
                  <img
                    src="./assets/img/General/PhotoProfil.jpg"
                    alt="Photo de profil" />' . $user['firstname'] . ' ' .  $user['lastname']   . '
                </p>
                <p class="user-email">' . $user['email'] . '</p>
                <p class="user-nickname">
                  ' . $user['pseudo'] . ' ' . ' <span class="green">"Online"</span>
                </p>
                <form method="POST">
                <button class="delete" type="submit" name="get-id" value="' . $user['id_users'] . '"><img src="../assets/img/General/poubelle.png" alt="Supprimer"></button>
                </form>
              </a>
            </li>';
  }
}

view('adminDashboard', [
  'countUsers' => $user->countUser(),
]);
