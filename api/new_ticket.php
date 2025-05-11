<?php
$mysqli = require __DIR__.'/db.php';
$owner = intval($_COOKIE['owner_id'] ?? 0);
$title = $_POST['title'] ?? '';

$stmt = $mysqli->prepare(
  'INSERT INTO tickets(owner_id,title) VALUES(?,?)'
);
$stmt->bind_param('is', $owner, $title);
$stmt->execute();

header('Location: /dashboard.php');
