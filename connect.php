<?php
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$TableType = $_POST['TableType'];
$GuestNumber = $_POST['GuestNumber'];
$Placement = $_POST['Placement'];
$Date = $_POST['Date'];
$Time = $_POST['Time'];
$Note = $_POST['Note'];

//Database connection
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into booktable(FirstName, LastName, Email, TableType, GuestNumber, Placement, Date, Time, Note)
     values(?,?,?,?,?,?,?,?,?)");
     $stmt->bind_param("ssssisiis",$FirstName, $LastName, $Email, $TableType, $GuestNumber, $Placement, $Date, $Time, $Note);
     $stmt->execute();
     echo"Congratulations Youre Table is Booked...";
     $stmt->close();
     $conn->close();
}

?>