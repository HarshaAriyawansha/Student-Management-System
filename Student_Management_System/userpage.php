<?php
session_start();

if(!isset($_SESSION["username"]))
{
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Dashboard </title>
<!-- </head>
<body>
    <h2>THIS IS USER HOMEPAGE</h2><?php echo $_SESSION["username"] ?>
    <a href="logout.php">log out</a>
    <!DOCTYPE html>
<html lang="en">
<head> -->
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin DashBoard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script> -->


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin DashBoard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->

    <nav class="navbar bg-body-tertiary fixed-top" style="background-color:#00264d;">
    <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Offcanvas navbar</a> -->
    <button class="navbar-toggler" style="background-color:white;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-white" style="color:white;"></span>
    </button>
    <div style="background-color:#00264d;" class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <!-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5> -->
        <button style="background-color:#00264d; color:white;" type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body" style="background-color:#004d99;">
        <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
        <li class="nav-item mb-3 mx-3 text-white">
                    <a class="nav-link active" style="font-size: 20px;"  onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';" aria-current="page" href="userpage.php"><img style="width: 30px; margin-right:5px" src="./images/icons8-insert-table-50.png"> Dashboard </a>
                </li>
          <li class="nav-item mb-3 mx-3 text-white">
            <a class="nav-link active" style="font-size: 20px;" onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';"  aria-current="page" href="index.php"><img style="width: 25px; margin-right:5px" src="./images/icons8-day-view-50.png"> Insert Student Details</a>
          </li>
          <li class="nav-item mb-3 mx-3 text-white">
            <a class="nav-link active" style="font-size: 20px;"  onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';" aria-current="page" href="tableview1.php"><img style="width: 30px; margin-right:5px" src="./images/icons8-insert-table-50.png"> View TimeTable</a>
          </li>
          <li class="nav-item mb-3 mx-3 text-white">
            <a class="nav-link active" style="font-size: 20px;"  onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';"  aria-current="page" href="lecdetails.php"><img style="width: 30px; margin-right:5px" src="./images/icons8-insert-table-50.png"> View Lecture Details</a>
          </li>
          <li class="nav-item mb-3 mx-3 text-white">
            <a class="nav-link active" style="font-size: 20px;"  onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';" aria-current="page" href="CourseDetailsView.php"><img style="width: 30px; margin-right:5px" src="./images/icons8-insert-table-50.png"> View Course Details</a>
          </li>
          <li class="nav-item mb-3 mx-3 text-white">
            <a class="nav-link active" style="font-size: 20px;"  onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';" aria-current="page" href="result view.php"><img style="width: 30px; margin-right:5px" src="./images/icons8-insert-table-50.png"> View Results</a>
          </li>
          <li class="nav-item mb-3 mx-3 text-white">
            <a class="nav-link active" style="font-size: 20px;"  onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';" aria-current="page" href="logout.php"><img style="width: 30px; margin-right:5px" src="./images/icons8-insert-table-50.png"> Log out</a>
          </li>


          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> -->
        </ul>
        <!-- <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
      </div>
    </div>
    </div>
    </nav>

    <!-- <div class="bg-dark" id="sidebar" style="font-size:15px;">
        <div class="list-group list-group-flush" style=" margin-left:10px">
        <a href="StudentDataView.php" class="list-group-item list-group-item-action"> View Student Details </a>
        <a href="TimeTableInsert.php" class="list-group-item list-group-item-action"> Insert TimeTable </a>
        <a href="LectureDetailsInsert.php" class="list-group-item list-group-item-action"> Insert Lecture Details </a>
        <a href="CourseDetailsInsert.php" class="list-group-item list-group-item-action"> Insert Course Details </a>
        <a href="ResultsInsert.php" class="list-group-item list-group-item-action"> Insert Results </a>
        </div>
    </div> -->

    <!-- Page Content -->
    <div id="content">
        <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="btn btn-dark" id="menu-toggle"> Toggle Sidebar </button>
                <p class="container d-flex align-items-center justify-content-center" style="height:100px;">Royal Advanced Collage </p>
            </div>
        </nav> -->
        <div class="container-fluid">

        <div class="d-flex align-items-center justify-content-center mt-5 display-1">
            <img class=" align-items-center justify-content-center" style="height:150px;" src="./images/logo.png">
            <p class=" align-items-center justify-content-center mt-5 display-1" style="height:100px; color:black; font-size: 40px; text-shadow: 2px 2px 8px #00264d;">Royal Advanced ACADEMY </p>
        </div>

</div>
<?php
echo"<div class = 'calend'>";
function generate_calendar($year, $month) {
  // Array of days in a week
  $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

  // Array of month names
  $monthNames = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June',
                     7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');

  // Get the number of days in the current month
  $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

  // Get the starting day of the week for the current month
  $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
  $startDay = date('w', $firstDayOfMonth);

  // Create the calendar table
  echo "<table class='table mt-5 mb-5' border=1 style=background-color:#e6f7ff; margin-bottom:100px;>";
  echo '<tr>';
  foreach ($daysOfWeek as $day) {
    echo '<th>' . $day . '</th>';
  }
  echo '</tr>';

  // Create calendar rows
  echo '<tr>';
  // Empty cells before the first day of the month
  for ($i = 0; $i < $startDay; $i++) {
    echo '<td></td>';
  }

  // Create calendar days
  for ($day = 1; $day <= $daysInMonth; $day++, $startDay++) {
    if ($startDay == 7) {
      echo '</tr><tr>';
      $startDay = 0;
    }
    echo '<td>' . $day . '</td>';
  }

  // Empty cells after the last day of the month
  while ($startDay < 7) {
    echo '<td></td>';
    $startDay++;
  }
  echo '</tr>';
  echo '</table>';
}

// Get current month and year
$currentMonth = date('m');
$currentYear = date('Y');

// Generate the calendar
generate_calendar($currentYear, $currentMonth);
echo"</div>";
?>
<br><br><br><br>
<footer class="text-center bg-body-tertiary mt-5 text-white" style="background-color:#00264d; position: fixed; left: 0;bottom: 0; width: 100%; height:100px">
  <!-- Grid container -->
  <div class="container pt-1">
    <!-- Section: Social media -->
    <section class="mb-1">
      <!-- Facebook -->
      <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body"
        href="https://www.facebook.com/"
        role="button"
        data-mdb-ripple-color="dark"
        >
        <img src="./images/icons8-facebook-24.png">
        </a>
      <!-- Instagram -->
      <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body"
        href="https://www.instagram.com/"
        role="button"
        data-mdb-ripple-color="dark"
        >
        <img src="./images/icons8-instagram-24.png">
    </a>
    <!-- Linkedin -->
    <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body"
        href="https://lk.linkedin.com/"
        role="button"
        data-mdb-ripple-color="dark"
        >
        <img src="./images/icons8-linkedin-24.png">
    </a>
    <!-- whatsapp -->
    <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body"
        href="https://whatsapp.com/"
        role="button"
        data-mdb-ripple-color="dark"
        >
        <img src="./images/icons8-whatsapp-24.png">
    </a>
    <!-- youtube -->
    <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body"
        href="https://www.youtube.com/"
        role="button"
        data-mdb-ripple-color="dark"
        >
        <img src="./images/icons8-youtube-24.png">
    </a>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center text-white p-1" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2024 Copyright: Royal Advanced Academy
  </div>
  <!-- Copyright -->
</footer>

</body>
</html>
</body>
</html>