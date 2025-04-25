<?php
$user = new User();
$user->getEmail();
admin();

if (isset($_POST['get-id'])) {
  $user->setId($_POST['get-id']);
  $user->deleteUser();
}

$countUser = $user->countAll();

view('admin/dashboard', [
  'usersList' => $user->getList(),
  'countUsers' => $countUser,
]);
