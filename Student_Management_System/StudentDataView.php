
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>
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

    <div class="studentform container flex-d mt-5 mb-5" style="width:80%; border: 1px solid #e6f7ff; padding: 60px; background-image: linear-gradient(180deg, #cce6ff, #e6f2ff); border-radius: 25px;">
    <?php 
//Done all funtions are work
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="smsdb";
    $link=mysqli_connect($servername,$username,$password,$dbname);
    $con=mysqli_select_db($link,$dbname);

    //database view using table
    $query = "SELECT * FROM student";
    $result = mysqli_query($link, $query);
    //table creating part
    if ($result) {
        $checkresult = mysqli_num_rows($result);
        echo"<table class='table' border=1>";
        echo"<tr>";
        echo"<th>";  echo"studentid";  echo"</th>";
        echo"<th>";  echo"studentname";  echo"</th>";
        echo"<th>";  echo"brithday";  echo"</th>";
        echo"<th>";  echo"password";  echo"</th>";
        echo"<th>";  echo"contactno";  echo"</th>";
        echo"<th>";  echo"email";  echo"</th>";
        echo"<th>";  echo"nicnumber";  echo"</th>";
        echo"<th>";  echo"courseid";  echo"</th>";
        echo"</tr>";
        //database colunms link to table colunms
        if ($checkresult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo"<tr>";
                echo"<td>";  echo $row['studentid']; echo"</td>";
                echo"<td>";  echo $row['studentname']; echo"</td>";
                echo"<td>";  echo $row['brithday']; echo"</td>";
                echo"<td>";  echo $row['password']; echo"</td>";
                echo"<td>";  echo $row['contactno']; echo"</td>";
                echo"<td>";  echo $row['email']; echo"</td>";
                echo"<td>";  echo $row['nicnumber']; echo"</td>";
                echo"<td>";  echo $row['courseid']; echo"</td>";
                echo"</tr>";
            }
            echo"</table>";
            }
        } 
     else {
        echo "Error: " . mysqli_error($link);
    }
    //connetion check
    if($con){
        echo(" ");
        //data insert code
        if(isset($_POST["insert"])){
            //data insert to database 
            mysqli_query($link,"INSERT INTO student VALUES('$_POST[studentid]','$_POST[studentname]','$_POST[brithday]','$_POST[password]','$_POST[contactno]','$_POST[email]','$_POST[nicnumber]','$_POST[courseid]')");
            echo"<div class='alert alert-success' role='alert'>
 Successfully Inserted!
</div>";
        }
        //data delete code
        if(isset($_POST["delete"])){
            mysqli_query($link,"DELETE FROM student WHERE studentid='$_POST[studentid]'");
            echo"<div class='alert alert-success' role='alert'>
 Successfully Deleted!
</div>";
        }
       //Data search code
        if (isset($_POST["search"])) {
            // Retrieve the student ID from the form input
            $search_studentid = $_POST['studentid'];
            // Query the database for the student with the provided ID
            $resul = mysqli_query($link, "SELECT * FROM student WHERE studentid='$search_studentid'");
            if ($resul) {
                // echo "<div class ='databsetable'>";
                echo "<table class='table-primary' border='1'>";
                echo "<tr>";
                echo "<th>Student ID</th>";
                echo "<th>Student Name</th>";
                echo "<th>Brithday</th>";
                echo "<th>Password</th>";
                echo "<th>Contact Number</th>";
                echo "<th>Email</th>";
                echo "<th>NIC Number</th>";
                echo "<th>Course ID</th>";
                echo "</tr>";
                // Fetch data from the result set
                while ($row = mysqli_fetch_assoc($resul)) {
                    echo "<tr";
                    // Highlight the row if the searched student ID matches
                    if ($row['studentid'] == $search_studentid) {
                        echo " style='background-color: yellow;'";
                    }
                    echo "</tr>";
                    // Display the data
                    echo "<td>" . $row['studentid'] . "</td>";
                    echo "<td>" . $row['studentname'] . "</td>";
                    echo "<td>" . $row['brithday'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td>" . $row['contactno'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['nicnumber'] . "</td>";
                    echo "<td>" . $row['courseid'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                // Handle query error
                echo "Error: " . mysqli_error($link);
            }
        }
        //Data update code
        if(isset($_POST["update"])){
            $studentid = $_POST['studentid'];
            // Assuming you have variables for other fields you want to update, adjust as needed
            $studentname = $_POST['studentname'];
            $brithday = $_POST['brithday'];
            $password = $_POST['password'];
            $contactno = $_POST['contactno'];
            $email = $_POST['email'];
            $nicnumber = $_POST['nicnumber'];
            $courseid = $_POST['courseid'];
        
            // Build the UPDATE query with the correct syntax
            $query = "UPDATE student SET ";
            $query .= "studentname = '$studentname', ";
            $query .= "brithday = '$brithday', ";
            $query .= "password = '$password', ";
            $query .= "contactno = '$contactno', ";
            $query .= "email = '$email', ";
            $query .= "nicnumber = '$nicnumber', ";
            $query .= "courseid = '$courseid' ";
            $query .= "WHERE studentid = '$studentid'";
        
            // Execute the query
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
        
    }
    //if had connetion error
    else{
        die("connection failed because".mysqli_connect_error());
    }
    ?>
    </div>


    

    <div class="studentform container flex-d mt-5 mb-5" style="width:40%; border: 1px solid #e6f7ff; padding: 60px; background-image: linear-gradient(180deg, #cce6ff, #e6f2ff); border-radius: 25px;">
    <form action="" name="studentdata" method="POST">
        <div class="alltxtbox mb-3">
            <div class="inputtxtbox mb-4">
                <label class="form-label" for="">Student ID </label>
                <input class="form-control" type="text" placeholder="Enter the ID (23456)" name="studentid" id="">   
            </div>

            <div class="inputtxtbox mb-4">
                <label class="form-label" for="">Student Name</label>
                <input class="form-control" placeholder="Harsha Pamodha" type="text" name="studentname" id="">
            </div>
            
            <div class="inputtxtbox mb-4">
                <label class="form-label" for="">Brithday </label>
                <input class="form-control" type="date" name="brithday" id="">
            </div>
            
            <div class="inputtxtbox mb-4">
                <label class="form-label" for="">Password </label>
                <input class="form-control" type="password" placeholder="Enter the Passsword" name="password" id="">
                </div>
            <div class="inputtxtbox mb-4">
                <label class="form-label" for="">Contact No </label>
                <input class="form-control" type="text" placeholder="0781521137"name="contactno" id="">
            </div>
            
            <div class="inputtxtbox mb-4">
                <label class="form-label" for="">Email </label>
                <input class="form-control" type="email" placeholder="harshapamodha2002@gmail.com" name="email" id="">
            </div>
            
            <div class="inputtxtbox mb-4">
                <label class="form-label" for="">NIC Number </label>
                <input class="form-control" placeholder="200229502582" type="text" name="nicnumber" id="">
            </div>
            
            <div class="inputtxtbox mb-4">
                <label class="form-label" for="">Course ID </label>
                <input class="form-control" placeholder="123456" type="text" name="courseid" id="">
            </div>
            
        </div>

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


