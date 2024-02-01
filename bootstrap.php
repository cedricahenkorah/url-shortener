<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

// bind the db to the container
$container->bind('Core\Database', function () {
    $config = require base_path('config.php');

    return new Database($config['database']);
});

App::setContainer($container);
