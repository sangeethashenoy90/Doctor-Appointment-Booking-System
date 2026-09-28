<!DOCTYPE html>
<?php #include("func.php");?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Appointment details — Raagha Clinic</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css?v=2">
</head>
<body style="background:var(--pine);">
<?php
include("newfunc.php");
if(isset($_POST['app_search_submit']))
{
	$contact=$_POST['app_contact'];
	$query = "select * from appointmenttb where contact= '$contact';";
  $result = mysqli_query($con,$query);
  $row=mysqli_fetch_array($result);
  if($row['fname']==""&$row['lname']==""&$row['email']==""&$row['contact']==""&$row['doctor']==""&$row['docFees']==""&$row['appdate']==""&$row['apptime']==""){
    echo "<script> alert('No entries found! Please enter valid details'); 
          window.location.href = 'admin-panel1.php#list-doc';</script>";
  }
  else {
    echo "<div style='max-width:900px;margin:3rem auto;padding:0 1.5rem;'>
    <div class='card' style='background:#fff;'>
  <table class='data-table'>
    <thead>
      <tr>
        <th scope='col'>First name</th>
        <th scope='col'>Last name</th>
        <th scope='col'>Email</th>
        <th scope='col'>Contact</th>
        <th scope='col'>Doctor name</th>
        <th scope='col'>Consultancy fees</th>
        <th scope='col'>Appointment date</th>
        <th scope='col'>Appointment time</th>
        <th scope='col'>Status</th>
      </tr>
    </thead>
    <tbody>";
  
    
          $fname = $row['fname'];
          $lname = $row['lname'];
          $email = $row['email'];
          $contact = $row['contact'];
          $doctor = $row['doctor'];
          $docFees= $row['docFees'];
          $appdate= $row['appdate'];
          $apptime = $row['apptime'];
          if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                    {
                      $appstatus = "Active";
                    }
                    if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                    {
                      $appstatus = "Cancelled by you";
                    }

                    if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                    {
                      $appstatus = "Cancelled by doctor";
                    }
          echo "<tr>
            <td>$fname</td>
            <td>$lname</td>
            <td>$email</td>
            <td>$contact</td>
            <td>$doctor</td>
            <td>$docFees</td>
            <td>$appdate</td>
            <td>$apptime</td>
            <td>$appstatus</td>
          </tr>";
    echo "</tbody></table></div><div style='text-align:center;'><a href='admin-panel1.php' class='btn btn-primary'>Back to your dashboard</a></div></div>";
  }
  }
	
?>
</body>
</html>
