<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color:#00264d;">



   <!--side menu-->
   <nav class="navbar  fixed-top" style="background-color:#00264d;">
    <div class="container-fluid">
        <button class="navbar-toggler" style="background-color:white;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white" style="color:white;"></span>
        </button>
        <div style="background-color:#00264d;" class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
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
                </ul>
            </div>
        </div>
    </div>
</nav><br><br><br><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


<?php
//Done all funtions are wark
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smsdb";

$link = mysqli_connect($servername, $username, $password, $dbname);
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
//select table
$query = "SELECT * FROM lecture";
$result = mysqli_query($link, $query);
//database table get to table in web page
if ($result) {
    $checkresult = mysqli_num_rows($result);
    echo"<table border=1 style='width: 700px; color:white;' class='table' align='center'>";
    echo"<tr>";
    echo"<th>";  echo"Lecture ID";  echo"</th>";
    echo"<th>";  echo"Lecture Name";  echo"</th>";
    echo"<th>";  echo"Course ID";  echo"</th>";
    echo"<th>";  echo"Lecture Details";  echo"</th>";
    echo"</tr>";
    //get database table colunms to table colunms
    if ($checkresult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo"<tr>";
            echo"<td>";  echo $row['lectureid']; echo"</td>";
            echo"<td>";  echo $row['lecturename']; echo"</td>";
            echo"<td>";  echo $row['courseid']; echo"</td>";
            echo"<td>";  echo $row['lecturedetails']; echo"</td>";
            echo"</tr>";
        }
        echo"</table>";
        }
    } 


 else {
    echo "Error: " . mysqli_error($link);
}?>