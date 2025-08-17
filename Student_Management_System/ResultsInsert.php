<?php
//Done all are work
$servername="localhost";
$username="root";
$password="";
$dbname="smsdb";
$link=mysqli_connect($servername,$username,$password,$dbname);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["insert"])){
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./files/" . $filename;

    // Data write command
    $sql = "INSERT INTO timetable (file_name) VALUES ('$filename')";

    if(mysqli_query($link, $sql)){
        // Insertion successful
    }
    else{
        echo "Error: " . mysqli_error($link);
    }

    // Save uploaded file to folder
    if(move_uploaded_file($tempname, $folder)){
        // File uploaded successfully
        echo"<div class='alert alert-success' role='alert'>
 Successfully Inserted!
</div>";
    }
    else{
        echo "Error uploading file.";
    }
}

// Retrieve and display data from database
$query = "SELECT * FROM timetable";
$result = mysqli_query($link, $query);

if ($result) {
    $checkresult = mysqli_num_rows($result);
    echo "<table class='table mt-5 mb-5 pt-5' border=1 style=background-color:#e6f7ff;>";
    echo "<tr>";
    echo "<th>File ID</th>";
    echo "<th>File Name</th>";
    echo "</tr>";
    
    if ($checkresult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['fileid'] . "</td>";
            echo "<td>" . $row['file_name'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else {
        echo "No records found.";
    }
} 
else {
    echo "Error: " . mysqli_error($link);
}
//data delete code
if(isset($_POST["delete"])){
     mysqli_query($link,"DELETE FROM timetable WHERE fileid='$_POST[fileid]'");
    echo"<div class='alert alert-success' role='alert'>
 Successfully Deleted!
</div>";
}
//datasearch code
if (isset($_POST["search"])) {
    // Retrieve the student ID from the form input
    $search_fileid = $_POST['fileid'];
    // Query the database for the student with the provided ID
    $resul = mysqli_query($link, "SELECT * FROM timetable WHERE fileid='$search_fileid'");
    if ($resul) {
        echo "<div class ='databsetable'>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>File ID</th>";
        echo "<th>File Name</th>";
        echo "</tr>";
        // Fetch data from the result set
        while ($row = mysqli_fetch_assoc($resul)) {
            echo "<tr";
            // Highlight the row if the searched student ID matches
            if ($row['fileid'] == $search_fileid) {
                echo " style='background-color: yellow;'";
            }
            echo "</tr>";
            // Display the data
            echo "<td>" . $row['fileid'] . "</td>";
            echo "<td>" . $row['file_name'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($link);
    }
}
mysqli_close($link);

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title> Insert Results </title>
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

    <div style="margin-top:5px"></div>

    <div class="timetableform">
    <form action="" method="POST" enctype="multipart/form-data" class="timetableform container flex-d mt-5 mb-5" style="width:40%; border: 1px solid #e6f7ff; padding: 60px; background-image: linear-gradient(180deg, #cce6ff, #e6f2ff); border-radius: 25px;">
        <div class="formname"><label for="" class="form-label">Upload file </label></div>
        <div class="fileuploder"><input class="form-control" type="file" name="uploadfile" id=""></div>
        <div class="inputtxtbox"><label for="" class="form-label">File ID <input class="form-control" type="text" name="fileid" id=""></label></div>


        <div class="allcontrolbtn d-flex mt-5 mb-5">
            <div class="controlbtn">
                <input class="btn btn-primary px-4" style="margin-right:10px" type="submit" value="INSERT" name="insert">
            </div>
            <div class="controlbtn">
                <input class="btn btn-danger px-4 mx-3" type="submit" value="DELETE" name="delete">
            </div>
            <div class="controlbtn">
                <input  class="btn btn-info px-4 mx-3" type="submit" value="SEARCH" name="search">
            </div>
        </div>
        <!-- <div class="allcontrolbtn" style="margin-bottom:120px">
            <div class="controlbtn"><input type="submit" value="INSERT" name="insert"></div>
            <div class="controlbtn"><input type="submit" value="DELETE" name="delete"></div>
            <div class="controlbtn"><input type="submit" value="SEARCH" name="search"></div>
        </div> -->
    </form>
    </form>
    </div>
    <div class="sp mt-5 mb-5"  style="margin-bottom:100px"></div>
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