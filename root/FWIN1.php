<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> FW ENTRY</title>
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
         $search = $_SESSION['FWsrch'];
         $sql = "SELECT * FROM FWgen WHERE FWNO= ?";
            $statement = $conn->prepare($sql);
            $statement->bind_param('i',$search);
            $statement->execute();
            $result = $statement->get_result();
        ?>
      <div class="row">
    <div class="col-md-12">
      <form  method="post">
        <h1> FW UPDATION </h1>
        <center>
        <h3>    FW NO:
            <?php while ($row = $result->fetch_assoc()) {
                if (!empty($row)) {   
                echo $row['FWNO'];
                }
            }?> </h3>
        </center>
        <fieldset>
          
          <legend><span class="number">1</span>Date</legend>
        
          <label for="date">Date:</label>
          <input type="date" id="date" name="date">
          
        </fieldset>
        <fieldset>  
        
          <legend><span class="number">2</span> Water Level</legend>
          
          <label for="waterin">Water Level:</label>
          <input type="number" id="waterlvl" name="waterlvl" required = "" min=0 max=999.99>
        
       
         </fieldset>
         <fieldset>  
        
        <legend><span class="number">3</span> Water Quality</legend>
        
        <label for="turbidity">Turbidity:</label>
        <input type="number" id="turbidity" name="turbidity" required = "" >
      
        <label for="pH">pH:</label>
        <input type="number" id="pH" name="pH" required = "">

        <label for="calcium">Calcuim:</label>
        <input type="number" id="calcium" name="calcium" required = "">
      
        <label for="copper">Copper:</label>
        <input type="number" id="copper" name="copper" required = "" >

        <label for="zinc">Zinc:</label>
        <input type="number" id="zinc" name="zinc" required = "">

        <label for="iron">Iron:</label>
        <input type="number" id="iron" name="iron" required = "" >

        <label for="magnesium">Magnesium:</label>
        <input type="number" id="magnesium" name="magnesium" required = "" >
      
        <label for="manganese">Manganese:</label>
        <input type="number" id="manganese" name="manganese" required = "">

        <label for="chloride">Chloride:</label>
        <input type="number" id="chloride" name="chloride" required = "">
      
        <label for="fluoride">Fluoride:</label>
        <input type="number" id="fluoride" name="fluoride" required = "">

       </fieldset>
        <button type="submit">Record values</button>
        <?php
            $sql = "INSERT INTO FWinfo VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";
            if(isset($_POST['chloride'])){
            $statement = $conn->prepare($sql);
            $statement->bind_param('isidddddddddd',$_SESSION['FWsrch'],$_POST['date'],$_POST['waterlvl'],$_POST['turbidity'],$_POST['pH'],
            $_POST['calcium'],$_POST['copper'],$_POST['zinc'],$_POST['iron'],$_POST['magnesium'],$_POST['manganese'],$_POST['chloride'],$_POST['fluoride']);
            $statement->execute();
            }
            echo "<script>alert('VALUES ENTERED SUCCESSFULLY!')</script>";

            ?>
            <center>
            <a class="btn btn-outline-success" href = "FW2.php">View Data</a>
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
