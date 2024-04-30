<?php

use Symfony\Component\Dotenv\Dotenv;

if (getenv('RAILWAY_ENVIRONMENT') === 'production') {
    // do not load .env file
} else {
    $dotenv = new Dotenv();
    $dotenv->load(__DIR__ . "/.env");
}

$host = $_ENV['host'] ?? null;
$port = $_ENV['port'] ?? null;
$dbname = $_ENV['dbname'] ?? null;

return $config = [
    'database' => [
        'host' => $host,
        'port' => $port,
        'dbname' => $dbname,
        'charset' => 'utf8'
    ]
];
