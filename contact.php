<?php
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$Subject= $_POST['Subject'];
$Message = $_POST['Message'];

//Database connection
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into contact(FirstName, LastName, Email, Subject, Message)
     values(?,?,?,?,?)");
     $stmt->bind_param("sssss",$FirstName, $LastName, $Email, $Subject, $Message);
     $stmt->execute();
     echo"Thanks For Giving Feedback";
     $stmt->close();
     $conn->close();
}

?>