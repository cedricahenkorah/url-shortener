<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

$shortcode = generateCode(6);

$domain = $_SERVER['HTTP_HOST'];

$shortenedUrl = "http://$domain/$shortcode";

$db->query("INSERT INTO urls(title, link, shortUrl) VALUES(:title, :link, '$shortenedUrl')", [
    'title' => $_POST['title'],
    'link' => $_POST['link']
]);

// redirect back to home page
header('location: /');
exit();
