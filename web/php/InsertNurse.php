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

function get_post($conn, $var){
     return $conn->real_escape_string($_POST[$var]);
}



if (isset($_POST['pname']) && isset($_POST['pID']) && isset($_POST['docID'])) {
 $stmt = $conn->prepare("INSERT INTO Nurses(NurseID, Name, PatientID, DoctorID) VALUES (NULL,?,?,?)");
 $stmt->bind_param("sii", $name,$docid, $nurseid);


$name = get_post($conn, 'pname');
$docid = get_post($conn, 'docID'); 
$nurseid = get_post($conn, 'nurseID'); 


if($stmt->execute()){
echo "<center>Record inserted successfully</center>";
}

} 
?>

<center><form action="InsertNurse.php" method="post">
<pre> Name: <input type="text" name="pname"> 
Patient ID: <input type="number" name="pID"> 
Doctor ID: <input type="number" name="docID"> 
<input type="submit" value="Submit"> </pre></form>
</center> 
</html>


