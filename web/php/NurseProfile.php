<html>
<head>
<link rel="stylesheet" href="../Style.css">
</head>
<div class="sidenav">
   <a href="../NurseHomePage.html">Home</a>
  <a href="NursePatientPage.php">Patients</a>
  <a href="NurseProfile.php">User Profile</a>
</div>

 <img src="../logo.png" class="logo"/>

<?php require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error);
 $sql = "SELECT `Nurse ID`, `Name`, `Patient ID`, `Doctor ID` FROM `Nurses`";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
    echo "<table style ='margin: auto;'><tr><th>Nurse ID</th><th>Name</th><th>Patient ID</th><th>Doctor ID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td style = 'text-align: center;'>" . $row["Patient ID"]. "</td><td style = 'text-align: center;'>" . $row["Name"]. "</td><td style = 'text-align: center;'>"." " . $row["Patient ID"]."</td><td>"." " . $row["Doctor ID"]."</td></tr>";
    }
    echo "</table>";
 } else {
    echo "0 results";
 }

 $conn->close();

?>



</html>