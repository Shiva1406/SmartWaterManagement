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
<?php
session_start();
?>
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
  
  <!-- <th scope="col">FWNo</th>
        <th scope="col">FWName</th>
        <th scope="col">PumpCount</th>
        <th scope="col">FWDate</th>
        <th scope="col">FWTime</th>
        <th scope="col">Inflow</th>
        <th scope="col">Outflow</th>
        <th scope="col">FWX</th>
        <th scope="col">FWY</th> -->
        <!-- <td><?php //echo $row['FWDate'] ?></td>
        <td><?php //echo $row['FWTime'] ?></td>
        <td><?php //echo $row['FWWaterInflow'] ?></td>
        <td><?php //echo $row['WaterOutflow'] ?></td>
        <td><?php //echo $row['FWX'] ?></td>
        <td><?php //echo $row['FWY'] ?></td> -->
        <center>
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
         $search = $_SESSION['FWsrch'];
         $sql = "SELECT * FROM FWgen WHERE FWNO= ?";
            $statement = $conn->prepare($sql);
            $statement->bind_param('i',$search);
            $statement->execute();
            $result = $statement->get_result();
            while ($row = $result->fetch_assoc()) {
                if (!empty($row)) {   
                echo "<h3 style='color:rgb(0, 140, 255); padding-left: 5%;padding-top: 1%;letter-spacing: 1px;'>FWNO:".$row['FWNO']."</h3>";
                }
            }
        ?>
        
        <?php
  
    // SQL QUERY
    $query = "SELECT * FROM FWinfo WHERE FWNO=?;";
    $statement = $conn->prepare($query);
    $statement->bind_param('i',$_SESSION['FWsrch']);
    $statement->execute();
    
    // FETCHING DATA FROM DATABASE
    $result = $statement->get_result();
    $q = "SELECT * FROM FWinfo WHERE FWNO IN (SELECT FWNO FROM FWinfo);";
    $st = $conn->prepare($query);
    $st->bind_param('i',$_SESSION['FWsrch']);
    $st->execute();
    $res = $st->get_result();
    $r = $res->fetch_assoc();
    if(empty($r)){
        die("<center><h1 style='color:red ;padding-top:10%;padding-left:20%'>Record not found<h1></center>");
    }
    ?>
<table class="table table-dark table-striped-columns">
    <thead>
      <tr>
        <th scope="col">FWNo</th>
        <th scope="col">FWDate</th>
        <th scope="col">Water Level</th>
        <th scope="col">Turbidity</th>
        <th scope="col">pH</th>
        <th scope="col">Calcium</th>
        <th scope="col">Copper</th>
        <th scope="col">Zinc</th>
        <th scope="col">Iron</th>
        <th scope="col">Magnesium</th>
        <th scope="col">Manganese</th>
        <th scope="col">Chloride</th>
        <th scope="col">Fluoride</th>
      </tr>
    </thead>
    <tbody>
    <?php
        while ($row=$result->fetch_assoc()){
            if(!empty($row)){
    ?>
        <tr>
        <td><?php echo $row['FWNO'] ?></td>
        <td><?php echo $row['FWDATE'] ?></td>
        <td><?php echo $row['WATERLEVEL'] ?></td>
        <td><?php echo $row['TURBIDITY'] ?></td>
        <td><?php echo $row['pH'] ?></td>
        <td><?php echo $row['CALCIUM'] ?></td>
        <td><?php echo $row['COPPER'] ?></td>
        <td><?php echo $row['ZINC'] ?></td>
        <td><?php echo $row['IRON'] ?></td>
        <td><?php echo $row['MAGNESIUM'] ?></td>
        <td><?php echo $row['MANGANESE'] ?></td>
        <td><?php echo $row['CHLORIDE'] ?></td>
        <td><?php echo $row['FLUORIDE'] ?></td>
      </tr>
      <?php
        }
        
    }

        ?>
    </tbody>
  </table>
  </center>
</div>
</body>
<html>
