<?php

  require 'config.php';

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css">
  
</head>

<body>
  <div class="py-5 text-white opaque-overlay bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h1 class="text-gray-dark">Login</h1>
          <p class="lead mb-4">Log Into Sparkle</p>
          <form class="" method="post" action="login.php">
            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email"> </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password"> </div>
            <button type="submit" class="btn btn-primary" name = "submit">Send</button>
            <a href="forgot.php" class="forgot">Forgot Password?</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
</body>

</html>

<?php

      if(isset($_POST["submit"]) === true)
      
      {
        $sql= "SELECT * FROM user 
        WHERE email ='".$_POST["email"]."';";

        
        $result =  $conn->query($sql);

        if($result->num_rows > 0)
        {

            while($row = $result->fetch_assoc())
            {
              $passwordDB = $row["Password"];
              $email = $row["email"];
              $name = $row["Name"];
            }

            if( crypt($_POST["password"],'sparkle') == $passwordDB )
            {
              session_start();
              $_SESSION["S-username"] = $name;
              $_SESSION["S-email"] = $email;

              echo "<h1>".$_SESSION["S-email"]."</h1>";
              header("Location: http://localhost/Sparkle/Sparkle/Home.php");
            }
            else echo "<h1>The Password is Wrong</h1>";

          }else echo '<h1 color = "Red">Email Is wrong </h1>';

      }

      
      


?>

