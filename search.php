<?php
session_start();
$con=mysqli_connect("localhost","root","sangeethashenoy@90","myhmsdb");
if(isset($_POST['search_submit'])){
  $contact=$_POST['contact'];
  $docname = $_SESSION['dname'];
 $query="select * from appointmenttb where contact='$contact' and doctor='$docname';";
 $result=mysqli_query($con,$query);
 echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search results — Raagha Clinic</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css?v=2">
</head>
<body style="background:var(--sage);">
<div style="max-width:900px;margin:3rem auto;padding:0 1.5rem;">
  <h3>Search results</h3>
  <div class="card table-wrap">
  <table class="data-table">
  <thead>
    <tr>
      <th>First name</th>
      <th>Last name</th>
      <th>Email</th>
      <th>Contact</th>
      <th>Appointment date</th>
      <th>Appointment time</th>
    </tr>
  </thead>
  <tbody>
  ';
  while($row=mysqli_fetch_array($result)){
    $fname=$row['fname'];
    $lname=$row['lname'];
    $email=$row['email'];
    $contact=$row['contact'];
    $appdate=$row['appdate'];
    $apptime=$row['apptime'];
    echo '<tr>
      <td>'.$fname.'</td>
      <td>'.$lname.'</td>
      <td>'.$email.'</td>
      <td>'.$contact.'</td>
      <td>'.$appdate.'</td>
      <td>'.$apptime.'</td>
    </tr>';
  }
echo '</tbody></table></div>
<a href="doctor-panel.php" class="btn btn-primary">Go back</a>
</div>
</body>
</html>';
}

?>
