<?php
require __DIR__.'/../vendor/autoload.php';
Dotenv\Dotenv::createImmutable(__DIR__.'/..')->load();

$mysqli = new mysqli(
    $_ENV['DB_HOST'],
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD'],
    $_ENV['DB_NAME'],
    intval($_ENV['DB_PORT'])
);

if ($mysqli->connect_errno) {
    http_response_code(500);
    exit('DB connection failed: '.$mysqli->connect_error);
}
return $mysqli;
