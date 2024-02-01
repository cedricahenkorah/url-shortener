<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

$db->query("INSERT INTO urls(title, link) VALUES(:title, :link)", [
    'title' => $_POST['title'],
    'link' => $_POST['link']
]);

// redirect back to home page
header('location: /');
exit();
