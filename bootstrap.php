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
  <figure class="text-center">
    <blockquote class="blockquote">
    <p style="font-size:50px;padding-top: 50px;color:rgb(0, 140, 255); ">Welcome <?php echo $_SESSION['username'];?>!</p>
      <p style="font-size:60px;padding-top: 50px;color:rgb(0, 140, 255); ">What is Smart-Water Management?</p>
    </blockquote>
    <figcaption class="blockquote-footer" style = "font-size:20px">
      the activity of planning, developing, distributing and managing <cite title="Source Title">water</cite>
    </figcaption>
  </figure>
  <div class="text-center">
    <img src="https://media.istockphoto.com/id/168415508/photo/water-drops-on-green-leaf.jpg?s=612x612&w=0&k=20&c=HX-Igo6HJZKZ5pvYqQIz4Llay_KqnQp88Uds0z5hJPo=" class="rounded" width="1000" height="500">
  </div>
  <h3 style="color:rgb(0, 140, 255); padding-left: 5%;padding-top: 4%;letter-spacing: 1.5px; ">Introduction</h3>
  <p style="padding-left: 5%;padding-top: 1%;padding-right: 5%;font-size: larger;">
    Smart water management systems can provide a more resilient and efficient water supply system, reducing costs and improving sustainability. High-technology solutions for the water sector 
    include digital meters and sensors, supervisory control and data acquisition (SCADA) systems, and geographic information systems (GIS).

This explainer is adapted from<mark style="color: rgb(0, 140, 255);background-color: white;"> proceedings of a workshop conducted by the Asian Development Bank (ADB) in Tashkent, Uzbekistan </mark>for the water sector. The workshop introduced smart systems and focused on remote monitoring of water networks using smart meters and other instruments.
  </p>
  <h3 style="color:rgb(0, 140, 255); padding-left: 5%;padding-top: 1%;letter-spacing: 1px; ">Why Smart Water Technology?</h3>
  <p style="padding-left: 5%;padding-top: 1%;padding-right: 5%;font-size: larger;">
    Smart technology can change conventional water and wastewater systems into instrumented, interconnected, and intelligent systems.
    <ul style="padding-left: 9%;padding-top: -1%;padding-right: 5%;font-size: larger;">
      <li>Instrumented: the ability to detect, sense, measure, and record data.</li>
      <li>Interconnected: the ability to communicate and interact with system operators and managers.</li>
      <li>Intelligent: the ability to analyze the situation, enable quick responses, and optimize troubleshooting solutions.</li>
    </ul>
    <img style="padding-left: 5%;" src="https://development.asia/sites/default/files/explainer/smart-water-mngt-system-01.jpg" class="rounded"width="1000" height="500">
  </p>
</body>
</html>