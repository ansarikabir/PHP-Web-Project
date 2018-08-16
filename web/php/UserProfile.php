<html>
<head>
<link rel="stylesheet" href="../Style.css">
</head>
<div class="sidenav">
  <a href="../UserHomePage.html">Home</a>
  <a href="UserProfile.php">User Profile</a>
</div>

<!-- Page content -->
<img src="../logo.png" class="logo"/>
<?php require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error);
 $sql = "SELECT `Patient ID`, `Name`, `Check-in`, `Check-out`, `Doctor ID`, `Nurse ID` FROM `Patients`";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
    echo "<table style ='margin: auto;'><tr><th>Patient ID</th><th>Name</th><th>Check-in</th><th>Check-out</th><th>Doctor ID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td style = 'text-align: center;'>" . $row["Patient ID"]. "</td><td>" . $row["Name"]. "</td><td>"." " . $row["Check-in"]."</td><td>"." " . $row["Check-out"]."</td><td style = 'text-align: center;'>"." " . $row["Doctor ID"]."</td></tr>";
    }
    echo "</table>";
 } else {
    echo "0 results";
 }

 $conn->close();

?>


</html>