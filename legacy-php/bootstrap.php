<?php

use Core\App;
use Core\Container;
use Core\Database;
use Symfony\Component\Dotenv\Dotenv;

if (getenv('RAILWAY_ENVIRONMENT') === 'production') {
    // do not load .env file
} else {
    $dotenv = new Dotenv();
    $dotenv->load(__DIR__ . "/.env");
}


$container = new Container();

$username = $_ENV['username'] ?? null;
$password = $_ENV['password'] ?? null;

// bind the db to the container
$container->bind('Core\Database', function () use ($username, $password) {
    $config = require base_path('config.php');
    $username = $username ?? $_ENV['username'];
    $password = $password ?? $_ENV['password'];

    return new Database($config['database'], $username, $password);
});

App::setContainer($container);
