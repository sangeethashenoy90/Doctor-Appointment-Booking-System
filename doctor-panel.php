<!DOCTYPE html>
<?php 
include('func1.php');
$con=mysqli_connect("localhost","root","sangeethashenoy@90","myhmsdb");
$doctor = $_SESSION['dname'];
if(isset($_GET['cancel']))
  {
    $query=mysqli_query($con,"update appointmenttb set doctorStatus='0' where ID = '".$_GET['ID']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
  }

?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
<title>Doctor dashboard — Raagha Clinic</title>
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
      <a class="side-link" href="#" data-tab="appts"><i class="fa-solid fa-list-check"></i> Appointments</a>
    </nav>
    <div class="side-foot"><a href="logout1.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log out</a></div>
  </aside>

  <main class="app-main">
    <div class="app-topbar">
      <h2>Welcome, <?php echo $_SESSION['dname'] ?></h2>
      <form class="search-form" method="post" action="search.php">
        <input class="input" type="text" placeholder="Enter contact number" aria-label="Search" name="contact">
        <button type="submit" class="btn btn-outline" style="color:var(--pine); border-color:var(--sage-line);" name="search_submit" value="Search">Search</button>
      </form>
    </div>

    <div class="app-content">

      <div class="tab-panel active" data-tab-panel="dash">
        <div class="stat-grid">
          <div class="stat-card">
            <i class="fa-solid fa-list-check"></i>
            <h4>View appointments</h4>
            <a href="#" data-tab-goto="appts">Appointment list →</a>
          </div>
        </div>
      </div>

      <div class="tab-panel" data-tab-panel="appts">
        <div class="card table-wrap">
          <h4>My appointments</h4>
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
                <th>Appointment date</th>
                <th>Appointment time</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $dname = $_SESSION['dname'];
                $query = "select pid,ID,fname,lname,gender,email,contact,appdate,apptime,userStatus,doctorStatus from appointmenttb where doctor='$dname';";
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
                  echo '<span class="status-pill status-cancelled">Cancelled by you</span>';
                }
                    ?></td>

                 <td>
                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                    { ?>
                    <button type="button" class="btn btn-danger" title="Cancel appointment"
                          onclick="if(confirm('Are you sure you want to cancel this appointment ?')){ window.location.href='doctor-panel.php?ID=<?php echo $row['ID']?>&cancel=update'; }">Cancel</button>
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
