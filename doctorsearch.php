<!DOCTYPE html>
<?php #include("func.php");?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Doctor details — Raagha Clinic</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css?v=2">
</head>
<body style="background:var(--pine);">
<?php
include("newfunc.php");
if(isset($_POST['doctor_search_submit']))
{
	$contact=$_POST['doctor_contact'];
  $query = "select * from doctb where email= '$contact'";
  $result = mysqli_query($con,$query);
  $row=mysqli_fetch_array($result);
  if($row['username']==""&$row['password']==""&$row['email']==""&$row['docFees']==""){
    echo "<script> alert('No entries found!'); 
          window.location.href = 'admin-panel1.php#list-doc';</script>";
  }
  else {
    echo "<div style='max-width:700px;margin:3rem auto;padding:0 1.5rem;'>
	<div class='card' style='background:#fff;'>
<table class='data-table'>
  <thead>
    <tr>
      <th scope='col'>Username</th>
      <th scope='col'>Password</th>
      <th scope='col'>Email</th>
      <th scope='col'>Consultancy fees</th>
    </tr>
  </thead>
  <tbody>";

	    $username = $row['username'];
        $password = $row['password'];
        $email = $row['email'];
        $docFees = $row['docFees'];
        echo "<tr>
          <td>$username</td>
          <td>$password</td>
          <td>$email</td>
          <td>$docFees</td>
        </tr>";
	echo "</tbody></table></div><div style='text-align:center;'><a href='admin-panel1.php' class='btn btn-primary'>Back to dashboard</a></div></div>";
}
  }
	

?>
</body>
</html>
