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
    echo"<table class='table mt-5 mb-5 pt-5' border=1 style=background-color:#e6f7ff;>";
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
}
//data insert code part
if(isset($_POST["insert"])){
    // Retrieve form data
    $lectureid = $_POST['lectureid'];
    $lecturename = $_POST['lecturename'];
    $courseid = $_POST['courseid'];
    $lecturedetails = $_POST['lecturedetails'];
    
    // Check if the lectureid already exists
    $existing_record = mysqli_query($link, "SELECT * FROM lecture WHERE lectureid = '$lectureid'");
    if (mysqli_num_rows($existing_record) > 0) {
        // Handle the situation where a record with the same lectureid already exists
        echo "<div class='alert alert-info' role='alert'>
  A record with the same lectureid already exists.
</div>";
    } else {
        // Insert the new record
        $insert_query = "INSERT INTO lecture (lectureid, lecturename, courseid, lecturedetails) VALUES ('$lectureid', '$lecturename', '$courseid', '$lecturedetails')";
        $result = mysqli_query($link, $insert_query);
        if ($result) {
            echo "<div class='alert alert-success' role='alert'>
 Successfully Inserted!
</div>";
        } else {
            // Handle insertion error
            echo "Error: " . mysqli_error($link);
        }
    }
}
//data delete code part
if(isset($_POST["delete"])){
    mysqli_query($link,"DELETE FROM lecture WHERE lectureid='$_POST[lectureid]'");
    echo "<div class='alert alert-success' role='alert'>
 Successfully Deleted!
</div>";
}
//data search code 
if (isset($_POST["search"])) {
    // Retrieve the student ID from the form input
    $search_lectureid = $_POST['lectureid'];
    // Query the database for the student with the provided ID
    $resul = mysqli_query($link, "SELECT * FROM lecture WHERE lectureid='$search_lectureid'");
    if ($resul) {
        echo "<table  border='1'>";
        echo "<tr>";
        echo "<th>lectureid</th>";
        echo "<th>lecturename</th>";
        echo "<th>courseid</th>";
        echo "<th>lecturedetails</th>";
        echo "</tr>";
        // Fetch data from the result set
        while ($row = mysqli_fetch_assoc($resul)) {
            echo "<tr";
            // Highlight the row if the searched student ID matches
            if ($row['lectureid'] == $search_lectureid) {
                echo " style='background-color: yellow;'";
            }
            echo ">";
            // Display the data
            echo "<td>" . $row['lectureid'] . "</td>";
            echo "<td>" . $row['lecturename'] . "</td>";
            echo "<td>" . $row['courseid'] . "</td>";
            echo "<td>" . $row['lecturedetails'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($link);
    }
}
//data update code
if(isset($_POST["update"])){
    $lectureid = $_POST['lectureid'];
    $lecturename = $_POST['lecturename'];
    $courseid = $_POST['courseid'];
    $lecturedetails = $_POST['lecturedetails'];

    $query = "UPDATE lecture SET ";
    $query .= "lecturename = '$lecturename', ";
    $query .= "courseid = '$courseid', ";
    $query .= "lecturedetails = '$lecturedetails' ";
    $query .= "WHERE lectureid = '$lectureid'";

    $result = mysqli_query($link, $query);

    // Check if the query was successful
    if ($result) {
        echo "<div class='alert alert-success' role='alert'>
 Successfully updated.!
</div>";
    } else {
        // Handle query error
        echo "Error updating record: " . mysqli_error($link);
    }
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Details </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

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
                    <a class="nav-link active" style="font-size: 20px;"  onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';" aria-current="page" href="AdminPanel.php"><img style="width: 30px; margin-right:5px" src="./images/icons8-insert-table-50.png"> Dashboard </a>
                </li>
                <li class="nav-item mb-3 mx-3 text-white">
                    <a class="nav-link active" style="font-size: 20px;" onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';"  aria-current="page" href="StudentDataView.php"><img style="width: 25px; margin-right:5px" src="./images/icons8-day-view-50.png"> View Student Details</a>
                </li>
                <li class="nav-item mb-3 mx-3 text-white">
                    <a class="nav-link active" style="font-size: 20px;"  onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';" aria-current="page" href="TimeTableInsert.php"><img style="width: 30px; margin-right:5px" src="./images/icons8-insert-table-50.png"> Insert TimeTable</a>
                </li>
                <li class="nav-item mb-3 mx-3 text-white">
                    <a class="nav-link active" style="font-size: 20px;"  onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';"  aria-current="page" href="LectureDetailsInsert.php"><img style="width: 30px; margin-right:5px" src="./images/icons8-insert-table-50.png"> Insert Lecture Details</a>
                </li>
                <li class="nav-item mb-3 mx-3 text-white">
                    <a class="nav-link active" style="font-size: 20px;"  onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';" aria-current="page" href="CourseDetailsInsert.php"><img style="width: 30px; margin-right:5px" src="./images/icons8-insert-table-50.png"> Insert Course Details</a>
                </li>
                <li class="nav-item mb-3 mx-3 text-white">
                    <a class="nav-link active" style="font-size: 20px;"  onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';" aria-current="page" href="ResultsInsert.php"><img style="width: 30px; margin-right:5px" src="./images/icons8-insert-table-50.png"> Insert Results</a>
                </li>
                <li class="nav-item mb-3 mx-3 text-white">
            <a class="nav-link active" style="font-size: 20px;"  onmouseover="this.style.color='#ffcccc';" onmouseout="this.style.color='white';" aria-current="page" href="logout.php"><img style="width: 30px; margin-right:5px" src="./images/icons8-insert-table-50.png"> Log out</a>
          </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

    <!-- <button type="button" class="btn btn-secondary">Secondary</button> -->

    <div style="margin-top:100px"></div>


    <div class="studentform container flex-d mt-5 mb-5" style="width:40%; border: 1px solid #e6f7ff; padding: 60px; background-image: linear-gradient(180deg, #cce6ff, #e6f2ff); border-radius: 25px;">
        <div class="lectureform">
        <form action="" name="lecturedata" method="POST">
            <div class="alltxtbox">
                <div class="inputtxtbox mb-4">
                    <label class="form-label" for="">Lecture ID </label>
                    <input class="form-control" type="text" name="lectureid" id="">
                </div>
                
                <div class="inputtxtbox mb-4">
                    <label class="form-label" for="">Lecture Name </label> 
                    <input class="form-control" type="text" name="lecturename" id="">
                </div>
                
                <div class="inputtxtbox mb-4">
                    <label class="form-label" for="">Course ID </label>
                    <input class="form-control" type="text" name="courseid" id="">
                </div>
                
                <div class="inputtxtbox mb-4">
                    <label class="form-label" for="">Lecture Details </label>
                    <input class="form-control" type="text" name="lecturedetails" id="">
                </div>
                
            </div>
            <!-- <div class="allcontrolbtn">
                <div class="controlbtn"><input type="submit" value="INSERT" name="insert"></div>
                <div class="controlbtn"><input type="submit" value="UPDATE" name="update"></div>
                <div class="controlbtn"><input type="submit" value="DELETE" name="delete"></div>
                <div class="controlbtn"><input type="submit" value="SEARCH" name="search"></div>
            </div> -->
            <div class="allcontrolbtn d-flex mt-5 mb-5">
                <div class="controlbtn">
                    <input class="btn btn-primary px-4" style="margin-right:10px" type="submit" value="INSERT" name="insert">
                </div>
                <div class="controlbtn">
                    <input class="btn btn-success px-4 mx-3" type="submit" value="UPDATE" name="update">
                </div>
                <div class="controlbtn">
                    <input class="btn btn-danger px-4 mx-3" type="submit" value="DELETE" name="delete">
                </div>
                <div class="controlbtn">
                    <input  class="btn btn-info px-4 mx-3" type="submit" value="SEARCH" name="search">
                </div>
            </div>
            
        </form>
        </div>
    </div>

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
    © 2024 Copyright: Royal Advanced Collage
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>