<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path("views/$path");
}

function generateCode($length = 6)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/errors/$code.php");

    die();
}
