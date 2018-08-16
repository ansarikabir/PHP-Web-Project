<html>
<head>
<link rel="stylesheet" href="../Style.css">
</head>

<div class="sidenav">
  <a href="../DocHomePage.html">Home</a>
  <a href="DocPatientPage.php">Patients</a>
  <a href="DocNursesPage.php">Nurses</a>
  <a href="DocProfile.php">User Profile</a>
  <a href="InsertPatient.php">Add a Patient</a>
  <a href="InsertNurse.php">Add a Nurse</a>
<a href="InsertDoctor.php">Add a Doctor</a>
<a href="DeletePatient.php">Remove a Patient</a>
<a href="DeleteNurse.php">Remove a Nurse</a>
<a href="DeleteDoctor.php">Remove a Doctor</a>
<a href="UpdatePatientName.php">Update Patient Name</a>
<a href="UpdateNurseName.php">Update Nurse Name</a>
<a href="UpdateDoctorName.php">Update Doctor Name</a>
</div>
 <img src="../logo.png" class="logo"/>
<?php require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error);
 $sql = "SELECT `PatientID`, `Name`, `Checkin`, `Checkout`, `DoctorID`, `NurseID` FROM `Patients`";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
    echo "<table style ='margin: auto;'><tr><th>Patient ID</th><th>Name</th><th>Check-in</th><th>Check-out</th><th>Doctor ID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td style = 'text-align: center;'>" . $row["PatientID"]. "</td><td>" . $row["Name"]. "</td><td>"." " . $row["Checkin"]."</td><td>"." " . $row["Checkout"]."</td><td style = 'text-align: center;'>"." " . $row["DoctorID"]."</td></tr>";
    }
    echo "</table>";
 } else {
    echo "0 results";
 }

 $conn->close();

?>













</html>