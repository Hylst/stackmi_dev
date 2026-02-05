<?php

// Mode debug (a retirer en prod)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// charge autoloader composer
require_once __DIR__ . '/../vendor/autoload.php';

// instancie le routeur
use App\Core\Router;

$router = new Router();

// lance la machine
$router->run();