<!DOCTYPE html>
<?php 
include('func.php');  
include('newfunc.php');
$con=mysqli_connect("localhost","root","sangeethashenoy@90","myhmsdb");


  $pid = $_SESSION['pid'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $fname = $_SESSION['fname'];
  $gender = $_SESSION['gender'];
  $lname = $_SESSION['lname'];
  $contact = $_SESSION['contact'];



if(isset($_POST['app-submit']))
{
  $pid = $_SESSION['pid'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $fname = $_SESSION['fname'];
  $lname = $_SESSION['lname'];
  $gender = $_SESSION['gender'];
  $contact = $_SESSION['contact'];
  $doctor=$_POST['doctor'];
  $email=$_SESSION['email'];
  
  $docFees=$_POST['docFees'];

  $appdate=$_POST['appdate'];
  $apptime=$_POST['apptime'];
  $cur_date = date("Y-m-d");
  date_default_timezone_set('Asia/Kolkata');
  $cur_time = date("H:i:s");
  $apptime1 = strtotime($apptime);
  $appdate1 = strtotime($appdate);
  
	
  if(date("Y-m-d",$appdate1)>=$cur_date){
    if((date("Y-m-d",$appdate1)==$cur_date and date("H:i:s",$apptime1)>$cur_time) or date("Y-m-d",$appdate1)>$cur_date) {
      $check_query = mysqli_query($con,"select apptime from appointmenttb where doctor='$doctor' and appdate='$appdate' and apptime='$apptime'");

        if(mysqli_num_rows($check_query)==0){
          $query=mysqli_query($con,"insert into appointmenttb(pid,fname,lname,gender,email,contact,doctor,docFees,appdate,apptime,userStatus,doctorStatus) values('$pid','$fname','$lname','$gender','$email','$contact','$doctor','$docFees','$appdate','$apptime','1','1')");

          if($query)
          {
            echo "<script>alert('Your appointment successfully booked');</script>";
          }
          else{
            echo "<script>alert('Unable to process your request. Please try again!');</script>";
          }
      }
      else{
        echo "<script>alert('We are sorry to inform that the doctor is not available in this time or date. Please choose different time or date!');</script>";
      }
    }
    else{
      echo "<script>alert('Select a time or date in the future!');</script>";
    }
  }
  else{
      echo "<script>alert('Select a time or date in the future!');</script>";
  }
  
}




if(isset($_GET['cancel']))
  {
    $query=mysqli_query($con,"update appointmenttb set userStatus='0' where ID = '".$_GET['ID']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
  }





function get_specs(){
  $con=mysqli_connect("localhost","root","","myhmsdb");
  $query=mysqli_query($con,"select username,spec from doctb");
  $docarray = array();
    while($row =mysqli_fetch_assoc($query))
    {
        $docarray[] = $row;
    }
    return json_encode($docarray);
}

?>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Patient dashboard — Raagha Clinic</title>
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
      <a class="side-link" href="#" data-tab="book"><i class="fa-solid fa-calendar-plus"></i> Book appointment</a>
      <a class="side-link" href="#" data-tab="history"><i class="fa-solid fa-clock-rotate-left"></i> Appointment history</a>
    </nav>
    <div class="side-foot"><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log out</a></div>
  </aside>

  <main class="app-main">
    <div class="app-topbar">
      <h2>Welcome, <?php echo $username ?></h2>
    </div>

    <div class="app-content">

      <div class="tab-panel active" data-tab-panel="dash">
        <div class="stat-grid">
          <div class="stat-card">
            <i class="fa-solid fa-calendar-plus"></i>
            <h4>Book my appointment</h4>
            <a href="#" data-tab-goto="book">Book an appointment →</a>
          </div>
          <div class="stat-card">
            <i class="fa-solid fa-clipboard-list"></i>
            <h4>My appointments</h4>
            <a href="#" data-tab-goto="history">View appointment history →</a>
          </div>
        </div>
      </div>

      <div class="tab-panel" data-tab-panel="book">
        <div class="card">
          <h4>Create an appointment</h4>
          <form method="post" action="admin-panel.php">
            <div class="field-row">
              <div class="field">
                <label for="spec">Specialization</label>
                <select name="spec" class="input" id="spec" required="required">
                  <option value="" disabled selected>Select specialization</option>
                  <?php display_specs(); ?>
                </select>
              </div>
              <div class="field">
                <label for="doctor">Doctor</label>
                <select name="doctor" class="input" id="doctor" required="required">
                  <option value="" disabled selected>Select doctor</option>
                  <?php display_docs(); ?>
                </select>
              </div>
            </div>
            <div class="field-row">
              <div class="field">
                <label for="docFees">Consultancy fees</label>
                <input class="input" type="text" name="docFees" id="docFees" readonly="readonly"/>
              </div>
              <div class="field">
                <label>Appointment date</label>
                <input type="date" name="appdate" class="input datepicker" required="required">
              </div>
            </div>
            <div class="field">
              <label>Appointment time</label>
              <select name="apptime" class="input" id="apptime" required="required">
                <option value="" disabled selected>Select time</option>
                <option value="08:00:00">8:00 AM</option>
                <option value="10:00:00">10:00 AM</option>
                <option value="12:00:00">12:00 PM</option>
                <option value="14:00:00">2:00 PM</option>
                <option value="16:00:00">4:00 PM</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" name="app-submit" value="Create new entry">Create appointment</button>
          </form>
        </div>
      </div>

      <div class="tab-panel" data-tab-panel="history">
        <div class="card table-wrap">
          <h4>Appointment history</h4>
          <table class="data-table">
            <thead>
              <tr>
                <th>Doctor name</th>
                <th>Consultancy fees</th>
                <th>Appointment date</th>
                <th>Appointment time</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 

                $query = "select ID,doctor,docFees,appdate,apptime,userStatus,doctorStatus from appointmenttb where fname ='$fname' and lname='$lname';";
                $result = mysqli_query($con,$query);
                while ($row = mysqli_fetch_array($result)){

              ?>
                  <tr>
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
                  echo '<span class="status-pill status-cancelled">Cancelled by you</span>';
                }

                if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                {
                  echo '<span class="status-pill status-cancelled">Cancelled by doctor</span>';
                }
                    ?></td>

                    <td>
                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                    { ?>
                    <button type="button" class="btn btn-danger" title="Cancel appointment"
                          onclick="if(confirm('Are you sure you want to cancel this appointment ?')){ window.location.href='admin-panel.php?ID=<?php echo $row['ID']?>&cancel=update'; }">Cancel</button>
                    <?php } else {
                            echo "—";
                            } ?>
                    </td>
                  </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </main>
</div>

<script src="assets/app.js?v=2"></script>
</body>
</html>
