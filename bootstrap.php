<?php

use Core\App;
use Core\Container;
use Core\Database;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . "/.env");

$container = new Container();



$username = $_ENV['username'];
$password = $_ENV['password'];

// bind the db to the container
$container->bind('Core\Database', function () {
    $config = require base_path('config.php');
    $username = $_ENV['username'];
    $password = $_ENV['password'];

    return new Database($config['database'], $username, $password);
});

App::setContainer($container);
