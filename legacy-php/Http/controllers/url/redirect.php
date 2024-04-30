<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// get the short url 
$shortenedUrl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// find the url in the database
$originalUrl = $db->query("SELECT link FROM urls WHERE shortUrl = :shortenedUrl", [':shortenedUrl' => $shortenedUrl])->findOrFail();

if ($originalUrl['link']) {
    // redirect to the original url
    header("Location: {$originalUrl['link']}");
    exit();
} else {
    // redirect to the home page
    header("Location: /");
    exit();
}
