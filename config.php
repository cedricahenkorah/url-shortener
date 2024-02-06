<?php

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . "/.env");

$host = $_ENV['host'];
$port = $_ENV['port'];
$dbname = $_ENV['dbname'];

return $config = [
    'database' => [
        'host' => $host,
        'port' => $port,
        'dbname' => $dbname,
        'charset' => 'utf8'
    ]
];
