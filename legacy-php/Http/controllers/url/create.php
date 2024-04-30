<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

$shortcode = generateCode(6);

$domain = $_SERVER['HTTP_HOST'];

$shortenedUrl = "http://$domain/$shortcode";

if (!$_POST['link']) {
    $_SESSION['error'] = 'URL is required';
    header('location: /');
    exit();
}

if (!filter_var($_POST['link'], FILTER_VALIDATE_URL)) {
    $_SESSION['error'] = 'Invalid URL';
    header('Location: /');
    exit();
}


$db->query("INSERT INTO urls(link, shortUrl) VALUES(:link, :shortUrl)", [
    'link' => $_POST['link'],
    'shortUrl' => $shortenedUrl
]);

$_SESSION['url'] = [
    'link' => $shortenedUrl,
];

session_regenerate_id();

// redirect back to home page
header('location: /');
exit();
