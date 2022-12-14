<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="https://media.istockphoto.com/id/1204439297/vector/blue-drop-water-and-circle-logo-template-illustration-design-vector-eps-10.jpg?s=612x612&w=0&k=20&c=Ve1h-gTl_tL1p1WD-mpQuE3E3hsKY3zT51KWDl-5N_4=" height="50px" width="50px" ></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="bootstrap.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Topics
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="WaterTreatmentPlant.php">Water Treatment Plant</a></li>
              <li><a class="dropdown-item" href="WaterDistributionSystem.php">Water Distribution System</a></li>
              <li><a class="dropdown-item" href="FrenchWells.php">French Wells</a></li>
              <li><a class="dropdown-item" href="Customers.php">Customers</a></li>
              <li><a class="dropdown-item" href="WaterQuality.php">Water Quality</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Water Quality
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Residential</a></li>
              <li><a class="dropdown-item" href="#">Industrial</a></li>
              <li><a class="dropdown-item" href="#">Agriculture</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active">Water Management</a>
          </li>
        </ul>
        <form class="d-flex" role="search" >
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <div style="padding-top: 10%;padding-left: 8%;padding-right: 20%;">
<table class="table table-dark table-striped-columns" action = "WTP1.php">
    <thead>
      <tr>
        <th scope="col">WTPNo</th>
        <th scope="col">WTPName</th>
        <th scope="col">PumpCount</th>
        <th scope="col">WTPDate</th>
        <th scope="col">WTPTime</th>
        <th scope="col">Inflow</th>
        <th scope="col">Outflow</th>
        <th scope="col">WTPX</th>
        <th scope="col">WTPY</th>
      </tr>
    </thead>
    <tbody>
        <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "watermanagementsystem";
    
    // CREATE CONNECTION
    $conn = new mysqli($servername,
        $username, $password, $databasename);
    
    // GET CONNECTION ERRORS
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // SQL QUERY
    $query = "SELECT * FROM `watertreatmentplant`;";
    
    // FETCHING DATA FROM DATABASE
    $result = $conn->query($query);
    
        while ($row=$result->fetch_assoc()){?>
        <tr>
        <td><?php echo $row['WtpNo'] ?></td>
        <td><?php echo $row['WtpName'] ?></td>
        <td><?php echo $row['PumpCount'] ?></td>
        <td><?php echo $row['WtpDate'] ?></td>
        <td><?php echo $row['WtpTime'] ?></td>
        <td><?php echo $row['WtpWaterInflow'] ?></td>
        <td><?php echo $row['WaterOutflow'] ?></td>
        <td><?php echo $row['WtpX'] ?></td>
        <td><?php echo $row['WtpY'] ?></td>
      </tr>
      <?php
        }
        ?>
      <tr>
    </tbody>
  </table>
</div>
<?php
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $databasename = "watermanagementsystem";
  
  // CREATE CONNECTION
  $conn = new mysqli($servername,
    $username, $password, $databasename);
  
  // GET CONNECTION ERRORS
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  // SQL QUERY
  $query = "SELECT * FROM `watertreatmentplant`;";
  
  // FETCHING DATA FROM DATABASE
  $result = $conn->query($query);
  
    if ($result->num_rows > 0) 
    {
        // OUTPUT DATA OF EACH ROW
        /*
WtpNo	
WtpName	
PumpCount	
WtpDate	
WtpTime	
WtpWaterInflow	
WaterOutflow	
WtpX	
WtpY*/
// echo "<table border='1'>";
// echo "<tr>";
// echo "<th>".'Show'."</th>";
// echo "<th>".'TVDBID'."</th>";
// echo "<th>".'AirsDayOfWeek'."</th>";
// echo "<th>".'AirsTime'."</th>";
// echo "<th>".'Status'."</th>";
// echo "<th>".'Edit'."</th>";
// echo "<tr>";

// while ($row = $result->fetch_assoc()) {
//     echo "<tr>";
//     echo "<td>".$row["WtpNo"]."</td>";
//     echo "<td>".$row["WtpNo"]."</td>";
//     echo "<td>".$row["WtpName"]."</td>";
//     // echo "<td>".strftime("%l:%M %p", strtotime($row['AirsTime']))."</td>";
//     // echo "<td>".$row['sStatus']."</td>";
//     // echo "<td><formb name=".$row['TVDBID']." action='DeleteShow.php?id=".$row['TVDBID']."'>"."<input type='submit' value='Delete'/></formb></td>";
//     // echo "<tr>";
// }

// echo "</tr>";
// echo "</table>";
//         while($row = $result->fetch_assoc())
//         {
//             echo "WTP NO:: " .
//                 $row["WtpNo"]. " - WTPName: " .
//                 $row["WtpName"]. " | PumpCount: " . 
//                 $row["PumpCount"]. " | WTPDate: " . 
//                 $row["WtpDate"]. "|WTPTime:".
//                 $row["WtpTime"]."|WaterInflow:".
//                 $row["WtpWaterInflow"]."|WaterOutflow".
//                 $row["WaterOutflow"]."|WTPX".
//                 $row["WtpX"]."|WTPY".
//                 $row["WtpY"]. "<br>";
//         }
//     } 
//     else {
//         echo "0 results";
//     }
  
//    $conn->close();
}
?>
<div>
  <img style="padding-left: 60%;padding-right: 3%;" src="https://cablecommunity.com/wp-content/uploads/2019/11/sewage-treatment-plant.jpg" class="rounded" height="300" width="100">
</div>
</body>
<html>