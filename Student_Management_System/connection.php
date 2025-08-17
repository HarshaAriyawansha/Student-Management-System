<?php
	//php variable name = database coloum name
    $studentid = $_POST['studentid'];
	$studentname = $_POST['studentname'];
	$courseid = $_POST['courseid'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$contactno = $_POST['contactno'];
    $brithday = $_POST['brithday'];
	$nicnumber = $_POST['nicnumber'];

              //database connection
$conn = new mysqli ('localhost', 'root', "", 'smsdb');//form1 kiyanne database name ek
if($conn->connect_error)
{
    echo "$conn->connect_error";
	die("Connection Failed : ".$conn->connect_error);
}
		//insert into ______ methanata enne db eke table eke name ek
        $stmt = $conn->prepare("insert into student(studentid, studentname, courseid, email, password, contactno, brithday, nicnumber) values(?, ?, ?, ?, ?, ?, ?, ?)");
		
		//issiisss=db eke coloum wala data type ek(i=int,s=varchar)coloum ganata danna oni
		$stmt->bind_param("issiisss", $studentid, $studentname, $courseid, $email, $password, $contactno, $brithday, $nicnumber);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();





?>