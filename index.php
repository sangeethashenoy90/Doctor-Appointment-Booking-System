<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Raagha Clinic — Appointment Booking</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="assets/style.css?v=2">
</head>
<body>

<div class="auth-shell">

  <div class="auth-brand">
    <div class="home-link">
      <a href="index.php">Home</a>
      <a href="services.html">About us</a>
    </div>
    <div class="mark"><i class="fa-solid fa-staff-snake"></i> Raagha <span>Clinic</span></div>
    <div class="tagline">Book care on your own time.</div>
    <ul>
      <li><i class="fa-solid fa-check"></i> Instant appointment booking with the doctor you need</li>
      <li><i class="fa-solid fa-check"></i> One account for your whole appointment history</li>
      <li><i class="fa-solid fa-check"></i> Doctors and staff manage schedules in one portal</li>
    </ul>
  </div>

  <div class="auth-form-panel">
    <div class="role-tabs">
      <button type="button" class="active" data-role="patient" onclick="showRole('patient')">Patient</button>
      <button type="button" data-role="doctor" onclick="showRole('doctor')">Doctor</button>
      <button type="button" data-role="admin" onclick="showRole('admin')">Admin</button>
    </div>

    <!-- Patient registration -->
    <div class="role-panel active" data-role="patient">
      <h3>Register as patient</h3>
      <form method="post" action="func2.php">
        <div class="field-row">
          <div class="field">
            <label>First name</label>
            <input type="text" class="input" placeholder="First name" name="fname" onkeydown="return alphaOnly(event);" required/>
          </div>
          <div class="field">
            <label>Last name</label>
            <input type="text" class="input" placeholder="Last name" name="lname" onkeydown="return alphaOnly(event);" required/>
          </div>
        </div>
        <div class="field-row">
          <div class="field">
            <label>Email</label>
            <input type="email" class="input" name="email" placeholder="you@example.com" required/>
          </div>
          <div class="field">
            <label>Phone</label>
            <input type="tel" minlength="10" maxlength="10" name="contact" class="input" placeholder="10-digit number" required/>
          </div>
        </div>
        <div class="field-row">
          <div class="field">
            <label>Password</label>
            <input type="password" class="input" placeholder="Password" id="password" name="password" onkeyup="checkPasswordMatch('password','cpassword','message');" required/>
          </div>
          <div class="field">
            <label>Confirm password <span id="message" class="hint"></span></label>
            <input type="password" class="input" id="cpassword" placeholder="Confirm password" name="cpassword" onkeyup="checkPasswordMatch('password','cpassword','message');" required/>
          </div>
        </div>
        <div class="field">
          <label>Gender</label>
          <div class="radio-row">
            <label><input type="radio" name="gender" value="Male" checked> Male</label>
            <label><input type="radio" name="gender" value="Female"> Female</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="patsub1" onclick="return checkPasswordLength('password',6);" value="Register">Register</button>
        <a class="foot-link" href="index1.php">Already have an account? Sign in</a>
      </form>
    </div>

    <!-- Doctor login -->
    <div class="role-panel" data-role="doctor">
      <h3>Sign in as doctor</h3>
      <form method="post" action="func1.php">
        <div class="field">
          <label>Username</label>
          <input type="text" class="input" placeholder="Username" name="username3" onkeydown="return alphaOnly(event);" required/>
        </div>
        <div class="field">
          <label>Password</label>
          <input type="password" class="input" placeholder="Password" name="password3" required/>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="docsub1" value="Login">Log in</button>
      </form>
    </div>

    <!-- Admin login -->
    <div class="role-panel" data-role="admin">
      <h3>Sign in as admin</h3>
      <form method="post" action="func3.php">
        <div class="field">
          <label>Username</label>
          <input type="text" class="input" placeholder="Username" name="username1" onkeydown="return alphaOnly(event);" required/>
        </div>
        <div class="field">
          <label>Password</label>
          <input type="password" class="input" placeholder="Password" name="password2" required/>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="adsub" value="Login">Log in</button>
      </form>
    </div>

  </div>
</div>

<script src="assets/app.js?v=2"></script>
</body>
</html>
