<?php
$mysqli = require __DIR__.'/db.php';
$email = $_POST['email'] ?? '';
$pass  = $_POST['pass']  ?? '';

$stmt = $mysqli->prepare(
  'INSERT INTO owners(email,password_hash) VALUES(?,?)'
);
$stmt->bind_param('ss', $email, password_hash($pass, PASSWORD_BCRYPT));
$stmt->execute();

setcookie('owner_id', $stmt->insert_id, time()+604800, '/');
header('Location: /dashboard.php');
