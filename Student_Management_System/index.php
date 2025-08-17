<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
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
</nav>
<br><br><br><br>




<!--form-->
    <div class="container mr-20" style="width: 400px; background-color:#00264d; color:white;" >
         
        <form action="connection.php" method="post" class="row g-6" >  <!---external php connect-->
            <div class="col-mr-2">
                <label for="studentId">Student ID</label>
                <input type="number" name="studentid" id="studentid" placeholder="1234" class="form-control" required>  
            </div><br>

            <div class="col-mr-2">
                <label for="studentName">Student Name</label>
                <input type="text" name="studentname" placeholder="Thilina Perera" id="studentname" class="form-control" required>
            </div><br>

            <div class="col-mr-2">
                <label for="level">Course ID</label>
                <input type="text" name="courseid" id="courseid" placeholder="45678" class="form-control" class="form-control" required>
            </div><br>

            <div class="col-mr-2">
                <label for="birthday">Birthday</label>
                <input type="date" name="brithday" id="brithday" class="form-control" required>
                
            </div><br>
            <div class="col-mr-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                
            </div><br>
            <div class="col-mr-2">
                <label for="contactNumber">Contact Number</label>
                <input type="number" name="contactno" placeholder="0714565709" id="contactno" class="form-control" required>
                
            </div><br>
            <div class="col-mr-2">
                <label for="email">E-Mail</label>
                <input type="text" name="email" placeholder="thilinaperera22@gmail.com" id="email" class="form-control" required>
                
            </div><br>
            <div class="col-mr-2">
                <label for="nicNumber">NIC Number</label>
                <input type="number" name="nicnumber" placeholder="2002222111000" id="nicnumber" class="form-control" required>
                
            </div>
            <div class="mx-auto" style="width: 80px;" >
            <button type="submit" class="btn btn-primary mt-5">Register</button>
            </div>
            
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>