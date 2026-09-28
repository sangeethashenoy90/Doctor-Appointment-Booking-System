<!DOCTYPE html>
<?php 
$con=mysqli_connect("localhost","root","sangeethashenoy@90","myhmsdb");

include('newfunc.php');

if(isset($_POST['docsub']))
{
  $doctor=$_POST['doctor'];
  $dpassword=$_POST['dpassword'];
  $demail=$_POST['demail'];
  $spec=$_POST['spec'];
  $docFees=$_POST['docFees'];

  // Only email and username identify a doctor for login/lookup purposes,
  // so those are the fields checked for duplicates -- name/spec/fees stay free-form.
  $dupe_check = mysqli_query($con,"select id from doctb where email='$demail' or username='$doctor'");
  if(mysqli_num_rows($dupe_check) > 0)
  {
    echo "<script>alert('A doctor with this email or username already exists. Please use different details.');</script>";
  }
  else
  {
    $query="insert into doctb(username,password,email,spec,docFees)values('$doctor','$dpassword','$demail','$spec','$docFees')";
    $result=mysqli_query($con,$query);
    if($result)
      {
        echo "<script>alert('Doctor added successfully!');</script>";
    }
  }
}


if(isset($_POST['docsub1']))
{
  $demail=$_POST['demail'];

  // Resolve the record's own primary key first, then delete by that ID --
  // never by email -- so this can never remove more than the one intended row.
  $find = mysqli_query($con,"select id from doctb where email='$demail'");
  $row = mysqli_fetch_assoc($find);
  if($row)
  {
    $id = $row['id'];
    $query="delete from doctb where id='$id';";
    $result=mysqli_query($con,$query);
    if($result)
      {
        echo "<script>alert('Doctor removed successfully!');</script>";
    }
    else{
      echo "<script>alert('Unable to delete!');</script>";
    }
  }
  else
  {
    echo "<script>alert('No doctor found with that email.');</script>";
  }
}


?>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin dashboard — Raagha Clinic</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="assets/style.css?v=2">
</head>
<body>

<div class="app-shell">

  <aside class="app-sidebar">
    <div class="brand"><i class="fa-solid fa-staff-snake"></i> Raagha <span>Clinic</span></div>
    <nav class="side-nav">
      <a class="side-link active" href="#" data-tab="dash"><i class="fa-solid fa-gauge"></i> Dashboard</a>
      <a class="side-link" href="#" data-tab="doctors"><i class="fa-solid fa-user-doctor"></i> Doctor list</a>
      <a class="side-link" href="#" data-tab="patients"><i class="fa-solid fa-users"></i> Patient list</a>
      <a class="side-link" href="#" data-tab="appts"><i class="fa-solid fa-calendar-check"></i> Appointment details</a>
      <a class="side-link" href="#" data-tab="add-doc"><i class="fa-solid fa-user-plus"></i> Add doctor</a>
      <a class="side-link" href="#" data-tab="del-doc"><i class="fa-solid fa-user-minus"></i> Delete doctor</a>
    </nav>
    <div class="side-foot"><a href="logout1.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log out</a></div>
  </aside>

  <main class="app-main">
    <div class="app-topbar">
      <h2>Welcome, Admin</h2>
    </div>

    <div class="app-content">

      <div class="tab-panel active" data-tab-panel="dash">
        <div class="stat-grid">
          <div class="stat-card">
            <i class="fa-solid fa-user-doctor"></i>
            <h4>Doctor list</h4>
            <a href="#" data-tab-goto="doctors">View doctors →</a>
          </div>
          <div class="stat-card">
            <i class="fa-solid fa-users"></i>
            <h4>Patient list</h4>
            <a href="#" data-tab-goto="patients">View patients →</a>
          </div>
          <div class="stat-card">
            <i class="fa-solid fa-calendar-check"></i>
            <h4>Appointment details</h4>
            <a href="#" data-tab-goto="appts">View appointments →</a>
          </div>
          <div class="stat-card">
            <i class="fa-solid fa-user-plus"></i>
            <h4>Manage doctors</h4>
            <a href="#" data-tab-goto="add-doc">Add doctor</a> &nbsp;|&nbsp;
            <a href="#" data-tab-goto="del-doc">Delete doctor</a>
          </div>
        </div>
      </div>

      <div class="tab-panel" data-tab-panel="doctors">
        <div class="card">
          <form class="field-row" action="doctorsearch.php" method="post" style="align-items:end;">
            <div class="field" style="margin-bottom:0;">
              <label>Search by email</label>
              <input type="text" name="doctor_contact" placeholder="Enter email ID" class="input">
            </div>
            <div class="field" style="margin-bottom:0;">
              <button type="submit" name="doctor_search_submit" class="btn btn-primary btn-block" value="Search">Search</button>
            </div>
          </form>
        </div>
        <div class="card table-wrap">
          <table class="data-table">
            <thead>
              <tr>
                <th>Doctor name</th>
                <th>Specialization</th>
                <th>Email</th>
                <th>Password</th>
                <th>Fees</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $query = "select * from doctb";
                $result = mysqli_query($con,$query);
                while ($row = mysqli_fetch_array($result)){
                  $username = $row['username'];
                  $spec = $row['spec'];
                  $email = $row['email'];
                  $password = $row['password'];
                  $docFees = $row['docFees'];
                  
                  echo "<tr>
                    <td>$username</td>
                    <td>$spec</td>
                    <td>$email</td>
                    <td>$password</td>
                    <td>$docFees</td>
                  </tr>";
                }

              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-panel" data-tab-panel="patients">
        <div class="card">
          <form class="field-row" action="patientsearch.php" method="post" style="align-items:end;">
            <div class="field" style="margin-bottom:0;">
              <label>Search by contact</label>
              <input type="text" name="patient_contact" placeholder="Enter contact" class="input">
            </div>
            <div class="field" style="margin-bottom:0;">
              <button type="submit" name="patient_search_submit" class="btn btn-primary btn-block" value="Search">Search</button>
            </div>
          </form>
        </div>
        <div class="card table-wrap">
          <table class="data-table">
            <thead>
              <tr>
                <th>Patient ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Password</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $query = "select * from patreg";
                $result = mysqli_query($con,$query);
                while ($row = mysqli_fetch_array($result)){
                  $pid = $row['pid'];
                  $fname = $row['fname'];
                  $lname = $row['lname'];
                  $gender = $row['gender'];
                  $email = $row['email'];
                  $contact = $row['contact'];
                  $password = $row['password'];
                  
                  echo "<tr>
                    <td>$pid</td>
                    <td>$fname</td>
                    <td>$lname</td>
                    <td>$gender</td>
                    <td>$email</td>
                    <td>$contact</td>
                    <td>$password</td>
                  </tr>";
                }

              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-panel" data-tab-panel="appts">
        <div class="card">
          <form class="field-row" action="appsearch.php" method="post" style="align-items:end;">
            <div class="field" style="margin-bottom:0;">
              <label>Search by contact</label>
              <input type="text" name="app_contact" placeholder="Enter contact" class="input">
            </div>
            <div class="field" style="margin-bottom:0;">
              <button type="submit" name="app_search_submit" class="btn btn-primary btn-block" value="Search">Search</button>
            </div>
          </form>
        </div>
        <div class="card table-wrap">
          <table class="data-table">
            <thead>
              <tr>
                <th>Patient ID</th>
                <th>Appointment ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Doctor name</th>
                <th>Consultancy fees</th>
                <th>Appointment date</th>
                <th>Appointment time</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php 


                $query = "select * from appointmenttb;";
                $result = mysqli_query($con,$query);
                while ($row = mysqli_fetch_array($result)){
              ?>
                  <tr>
                    <td><?php echo $row['pid'];?></td>
                    <td><?php echo $row['ID'];?></td>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['doctor'];?></td>
                    <td><?php echo $row['docFees'];?></td>
                    <td><?php echo $row['appdate'];?></td>
                    <td><?php echo $row['apptime'];?></td>
                    <td>
                <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                {
                  echo '<span class="status-pill status-active">Active</span>';
                }
                if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                {
                  echo '<span class="status-pill status-cancelled">Cancelled by patient</span>';
                }

                if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                {
                  echo '<span class="status-pill status-cancelled">Cancelled by doctor</span>';
                }
                    ?></td>
                  </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="tab-panel" data-tab-panel="add-doc">
        <div class="card" style="max-width:560px;">
          <h4>Add doctor</h4>
          <form method="post" action="admin-panel1.php">
            <div class="field">
              <label>Doctor name</label>
              <input type="text" class="input" name="doctor" onkeydown="return alphaOnly(event);" required>
            </div>
            <div class="field">
              <label>Specialization</label>
              <select name="spec" class="input" id="spec" required="required">
                <option value="" disabled selected>Select specialization</option>
                <option value="Gynecologist">Gynecologist</option>
                <option value="Cardiologist">Cardiologist</option>
                <option value="Neurologist">Neurologist</option>
                <option value="Pediatrician">Pediatrician</option>
              </select>
            </div>
            <div class="field">
              <label>Email ID</label>
              <input type="email" class="input" name="demail" required>
            </div>
            <div class="field-row">
              <div class="field">
                <label>Password</label>
                <input type="password" class="input" onkeyup="checkPasswordMatch('dpassword','cdpassword','message');" name="dpassword" id="dpassword" required>
              </div>
              <div class="field">
                <label>Confirm password <span id="message" class="hint"></span></label>
                <input type="password" class="input" onkeyup="checkPasswordMatch('dpassword','cdpassword','message');" name="cdpassword" id="cdpassword" required>
              </div>
            </div>
            <div class="field">
              <label>Consultancy fees</label>
              <input type="text" class="input" name="docFees" required>
            </div>
            <button type="submit" class="btn btn-primary" name="docsub" value="Add Doctor">Add doctor</button>
          </form>
        </div>
      </div>

      <div class="tab-panel" data-tab-panel="del-doc">
        <div class="card" style="max-width:480px;">
          <h4>Delete doctor</h4>
          <form method="post" action="admin-panel1.php">
            <div class="field">
              <label>Email ID</label>
              <input type="email" class="input" name="demail" required>
            </div>
            <button type="submit" class="btn btn-danger" style="padding:0.7em 1.4em; font-size:0.95rem;" name="docsub1" value="Delete Doctor" onclick="return confirm('Do you really want to delete?')">Delete doctor</button>
          </form>
        </div>
      </div>

    </div>
  </main>
</div>

<script src="assets/app.js?v=2"></script>
</body>
</html>
