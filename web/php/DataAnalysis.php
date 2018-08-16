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

</html>
<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error);

$var = array();
$query  = "SELECT COUNT(PatientID), Checkin FROM Patients GROUP BY Checkin;";
  $result = $conn->query($query);   
  if (!$result) die($conn->error);

   $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j)  {   
 $result->data_seek($j);  
  $var[] =$result->fetch_assoc(); 
  
  }
 

?>  
<head>
<?php
 echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <script type='text/javascript'>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Patient ID'],
          [".$var[0]."]
        ]);
  var options = {
          title: 'Patients'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
      }
    </script>";
?> 
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

