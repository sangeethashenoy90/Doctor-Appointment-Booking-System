<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Logged out — Raagha Clinic</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="assets/style.css?v=2">
</head>
<body>
<div class="msg-shell">
  <div class="msg-card">
    <i class="fa-solid fa-circle-check"></i>
    <h3>You've been logged out</h3>
    <a href="index1.php" class="btn btn-primary">Back to login</a>
  </div>
</div>
</body>
</html>
