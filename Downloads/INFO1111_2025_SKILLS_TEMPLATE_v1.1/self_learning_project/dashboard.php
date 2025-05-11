<?php
if (!isset($_COOKIE['owner_id'])) {
  header('Location: /login.html'); exit;
}
$mysqli = require __DIR__.'/api/db.php';
$oid = intval($_COOKIE['owner_id']);
$owner   = $mysqli->query("SELECT email FROM owners WHERE id=$oid")->fetch_assoc();
$tickets = $mysqli->query("SELECT * FROM tickets WHERE owner_id=$oid");
?>
<!doctype html><meta charset="utf-8">
<h1>Welcome <?=htmlspecialchars($owner['email'])?></h1>
<ul>
<?php foreach ($tickets as $t): ?>
  <li><?=htmlspecialchars($t['title'])?> – <?=$t['status']?></li>
<?php endforeach ?>
</ul>
<form action="/api/new_ticket.php" method="post">
  <input name="title" placeholder="New request" required>
  <button>Submit</button>
</form>
