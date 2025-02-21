<?php
require 'utils/utils.php';
require 'models/Database.php';


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