<?php

$router->get('/', 'index.php');

$router->post('/', 'url/create.php');
$router->get('/{code}', 'url/redirect.php');
