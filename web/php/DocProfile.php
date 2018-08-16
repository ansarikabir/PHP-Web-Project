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

<!-- Page content -->
 <img src="../logo.png" class="logo"/>
<?php require_once 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error);
 $sql = "SELECT `DoctorID`, `Name`, `PatientID`, `NurseID` FROM `Doctors`";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
    echo "<table style ='margin: auto;'><tr><th>Doctor ID</th><th>Name</th><th>Patient ID</th><th>Nurse ID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td style = 'text-align: center;'>" . $row["DoctorID"]. "</td><td>" . $row["Name"]. "</td><td>"." " . $row["PatientID"]."</td><td>"." " . $row["NurseID"]."</td></tr>";
    }
    echo "</table>";
 } else {
    echo "0 results";
 }

 $conn->close();

?>

</html>