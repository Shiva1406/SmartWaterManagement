<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
session_start();
?>
<body>
<div class="login-page">
<div class = "header">
    <h1>SMART WATER MANAGEMENT SYSTEM</h1>

</div>
  <div class="form">
    <!-- <form class="register-form" method = "POST">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form> -->
    <form class="login-form"  method = "POST">
      <input type="text" placeholder="Username" name = "userName"/>
      <input type="password" placeholder="Password" name = "password"/>
        <select name="usere" class="dropd">
          <option value="00">Select Type</option>
          <option value="WTPAD">WTP ADMIN</option>
          <option value="WDSAD">WDS ADMIN</option>
          <option value="FWAD">FW ADMIN</option>
          <option value="CUST">CUSTOMER</option>
          <option value="ADMIN">ADMIN</option>
        </select>
</br>
      <button>login</button>
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    </form>
  </div>
</div>
 
<?php
$message = "";
if (count($_POST) > 0) {
    $isSuccess = 0;
    $conn = mysqli_connect("localhost", "root", "", "payload");
    $userName = $_POST['userName'];
    if(isset($_POST['usere'])){
    $type = $_POST['usere'];
}
  else{
    $type = null;
  }
    if($type=="WTPAD"){
    $sql = "SELECT * FROM WTPAD WHERE username= ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s',$userName);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        if (! empty($row)) {
            $hashedPassword = $row["PASSWORD"];
            if (isset($_POST["password"])){
            if($_POST['password'] == $hashedPassword){
                $isSuccess = 1;
            }
          }
        }
    }
    if($isSuccess == 0) {
        echo "<script>alert('INVALID USERNAME/PASSWORD TRY AGAIN!')</script>";
    } else {
        header("Location:  WTPADMHOME.php");
        $_SESSION['username'] = $userName;
    }
  }
  else if($type=="WDSAD"){
    $sql = "SELECT * FROM WDSAD WHERE username= ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s',$userName);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        if (! empty($row)) {
            $hashedPassword = $row["PASSWORD"];
            if ($_POST["password"] == $hashedPassword){
                $isSuccess = 1;
            }
        }
    }
    if($isSuccess == 0) {
      echo "<script>alert('INVALID USERNAME/PASSWORD TRY AGAIN!')</script>";
    } else {
        header("Location:  WDSADMHOME.php");
        $_SESSION['username'] = $userName;
    }
  }
  else if($type=="FWAD"){
    $sql = "SELECT * FROM FWAD WHERE username= ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s',$userName);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        if (! empty($row)) {
            $hashedPassword = $row["PASSWORD"];
            if ($_POST["password"] == $hashedPassword){
                $isSuccess = 1;
            }
        }
    }
    if($isSuccess == 0) {
      echo "<script>alert('INVALID USERNAME/PASSWORD TRY AGAIN!')</script>";
    } else {
        header("Location:  FWADMHOME.php");
        $_SESSION['username'] = $userName;
    }
  }
  else if($type=="CUST"){
    $sql = "SELECT * FROM CUSTOMER WHERE username= ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s',$userName);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        if (! empty($row)) {
            $hashedPassword = $row["PSWD"];
            if ($_POST["password"] == $hashedPassword){
                $isSuccess = 1;
            }
        }
    }
    if($isSuccess == 0) {
        echo "<script>alert('INVALID USERNAME/PASSWORD TRY AGAIN!')</script>";
    } else {
        header("Location:  ./bootstrap.php");
        $_SESSION['username'] = $userName;
    }
    
  }else if($type=="ADMIN"){
    $sql = "SELECT * FROM CUSTOMER WHERE username= ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s',$userName);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        if (! empty($row)) {
            $hashedPassword = $row["PSWD"];
            if ($_POST["password"] == $hashedPassword){
                $isSuccess = 1;
            }
        }
    }
    if($isSuccess == 0) {
        echo "<script>alert('INVALID USERNAME/PASSWORD TRY AGAIN!')</script>";
    } else {
        header("Location:  ./bootstrap.php");
        $_SESSION['username'] = $userName;
    }
    
  }
  else{
    echo "ENTER VALID USER TYPE!";
  }
}
?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);
.header{
    text-align: center;
    position: relative;
    font-family: "Roboto", sans-serif;
    color: white;
    text-shadow: 1px 1px #c3ebfe;
    /*a5b6f,c3ebfe*/
}
.login-page {
  width: 380px;
  padding: 8% 5% 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 50px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.dropd{
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #25A3FF;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #0069ec;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #0069ec;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  /* #25A3FF
  #0069ec */
  background: #25A3FF;
  /* fallback for old browsers */
  background: -webkit-linear-gradient(to top, #0069ec, #25A3FF);
  background: -moz-linear-gradient(to top,#0069ec, #25A3FF);
  background: -o-linear-gradient(to top, #0069ec, #25A3FF);
  background: linear-gradient(to top, #0069ec, #25A3FF);
  background-size: cover;
  background-attachment: fixed;
  font-family: 'Roboto', sans-serif;  
}
</style>
<script>
    $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</body>
</html>