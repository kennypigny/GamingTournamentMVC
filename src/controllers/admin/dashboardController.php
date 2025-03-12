<?php
admin();

$user = new User();


$user->getEmail();

if (isset($_POST['get-id'])) {
  $user->deleteUser($_POST['get-id']);
}

$countUser = $user->countAll();

$page = 0;
$offset = 0;
$limit = 5;

$maxPage = ceil($countUser / $limit) - 1;


if (!empty($_GET['page'])) {
  if (is_numeric($_GET['page'])) {
    $tempPage = (int) $_GET['page'];
    if ($tempPage >= 0) {
      $page =  $tempPage > $maxPage ? $maxPage : $tempPage;
      $offset = $page * $limit;
    }
  }
}

view('admin/dashboard', [
  'users' => $user->getList($offset, $limit),
  'countUsers' => $countUser,
  'page' => $page,
  'maxPage' => $maxPage,
  'limit' => $limit,
]);
