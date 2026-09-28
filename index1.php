<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Patient login — Raagha Clinic</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="assets/style.css?v=2">
</head>
<body>

<div class="top-nav">
  <a class="mark" href="index.php"><i class="fa-solid fa-staff-snake"></i> Raagha <span>Clinic</span></a>
  <nav>
    <a href="index.php">Home</a>
    <a href="services.html">About us</a>
  </nav>
</div>

<div class="center-shell">
  <div class="login-card">
    <i class="fa-solid fa-hospital"></i>
    <h3>Patient login</h3>
    <form method="POST" action="func.php">
      <div class="field">
        <label>Email</label>
        <input type="text" name="email" class="input" placeholder="you@example.com" required/>
      </div>
      <div class="field">
        <label>Password</label>
        <input type="password" class="input" name="password2" placeholder="Password" required/>
      </div>
      <button type="submit" class="btn btn-primary btn-block" name="patsub" value="Login">Log in</button>
    </form>
  </div>
</div>

<script src="assets/app.js?v=2"></script>
</body>
</html>
