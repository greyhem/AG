<?php

require_once 'class.user.php';
$reg_user = new USER();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbtest";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully";

$sql = "SELECT userEmail FROM tbl_users";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $email=$row["userEmail"];
		
// the message
$msg = "NEwsletter new";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
$subject = "NEwsletter2";

// send email
$reg_user->send_mail($email,$msg,$subject);
echo "sent";

		  }
} else {
    echo "0 results";
}


?>		