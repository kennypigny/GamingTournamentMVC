<?php
admin();

$user = new User();


$user->getEmail();

if (isset($_POST['get-id'])) {
  $user->setId($_POST['get-id']);
  $user->deleteUser();
}

$countUser = $user->countAll();

view('admin/dashboard', [
  'users' => $user->getList(),
  'countUsers' => $countUser,
]);
