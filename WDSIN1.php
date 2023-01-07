<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> WDS ENTRY</title>
        <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php 
        session_start();
        ?>
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
         $search = $_SESSION['WDSsrch'];
         $sql = "SELECT * FROM WDSgen WHERE WDSNO= ?";
            $statement = $conn->prepare($sql);
            $statement->bind_param('i',$search);
            $statement->execute();
            $result = $statement->get_result();
        ?>
      <div class="row">
    <div class="col-md-12">
      <form  method="post">
        <h1> WDS UPDATION </h1>
        <center>
        <h3>    WDS NO:
            <?php while ($row = $result->fetch_assoc()) {
                if (!empty($row)) {   
                echo $row['WDSNO'];
                }
            }?> </h3>
        </center>
        <fieldset>
          
          <legend><span class="number">1</span>Date</legend>
        
          <label for="date">Date:</label>
          <input type="date" id="date" name="date">
        
          
        </fieldset>
        <fieldset>  
        
          <legend><span class="number">2</span> Water In/Out </legend>
          
          <label for="waterin">Water Inflow:</label>
          <input type="number" id="waterin" name="waterin" required = "" min=0 max=999.99>
        
          <label for="waterout">Water Outflow:</label>
          <input type="number" id="waterout" name="waterout" required = "" min=0 max=999.99>
       
         </fieldset>
         <fieldset>  
        

       </fieldset>
        <button type="submit">Record values</button>
        <?php
            $sql = "INSERT INTO WDSinfo VALUES (?,?,?,?);";
            if(isset($_POST['date'])){
            $statement = $conn->prepare($sql);
            $statement->bind_param('isii',$_SESSION['WDSsrch'],$_POST['date'],$_POST['waterin'],$_POST['waterout']);
            $statement->execute();
            }
            echo "<script>alert('VALUES ENTERED SUCCESSFULLY!')</script>";

            ?>
            <center>
            <a class="btn btn-outline-success" href = "WDS2.php">View Data</a>
        </center>
       </form>
        </div>
      </div>
      <style>
        *, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito', sans-serif;
  color: #384047;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #4bc970;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #3ac162;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #5fcf80;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

@media screen and (min-width: 480px) {

  form {
    max-width: 480px;
  }

}

        </style>

    </body>
</html>
