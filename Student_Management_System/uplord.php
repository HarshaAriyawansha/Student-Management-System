<?php

//getting user uplorded file

$file = $_FILES["file"];

// Saving file in uplords folder

//move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);

// Redirecting back to home

header("Location: tableview1.php");