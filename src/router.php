<?php
session_start();

require 'utils/utils.php';
require 'models/Database.php';
require 'models/User.php';
require 'models/Tournament.php';


$path = $_SERVER['REDIRECT_URL'];

if ($path == '/') {
    require 'controllers/indexController.php';
} else {
    $controlleur = 'controllers' . $path . 'Controller.php';

    if (file_exists($controlleur)) {
        require $controlleur;
    } else {
        require 'views/404.php';
    }
}
