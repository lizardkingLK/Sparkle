<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css">
</head>

<body>
  <div class="py-5 opaque-overlay bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h1 class="text-gray-dark">Vendor Login</h1>
          <p class="lead mb-4">View Your Vendor Profile</p>
          <form class="" method="post" action="">
            <div class="form-group">
              <label>VendorName</label>
              <input type="text" name="VendorNameLogin" class="form-control" placeholder="Enter email"> </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="VendorpasswordLogin" class="form-control" placeholder="Password"> </div>
            <button type="submit" class="btn btn-primary" name = "VendorsubmitLogin">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 opaque-overlay bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h1 class="text-gray-dark">Dont Have An Account?</h1>
          <p class="lead mb-4">Join Sparkle to Boost Your Sales</p>
          <form class="" method="post" action="VendorSignUp.php">
            <div class="form-group">
              <label>Brand Name</label>
              <input type="text" name="brandVendor" class="form-control" placeholder="Enter Brand Name"> </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="passwordVendor" class="form-control" placeholder="Password"> </div>
            <div class="form-group">
              <label>Re-enter Password</label>
              <input type="password" name="password2Vendor" class="form-control" placeholder="Password"> </div>
            <div class="form-group">
              <label for="exampleInputEmail1">PhoneNumber</label>
              <input type="text" class="form-control" id="inlineFormInput" placeholder="07X - XXX XXX XXX" name="phoneNumberVendor">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Bank Account Number(*this account will Recieve Payments)</label>
              <input type="text" class="form-control" id="inlineFormInput" placeholder="Jane Doe" name="BankAccountVendor">
            </div>
            <button type="submit" class="btn btn-primary" name = "signUp">SignUp</button>
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

  include 'config.php';

  if(isset($_POST["signUp"]) === true)
  {
    

    $brand = $_POST["brandVendor"];
    $passwordVendor = $_POST["passwordVendor"];
    $BankAccountVendor = $_POST["BankAccountVendor"];
    $phoneNumberVendor = $_POST["phoneNumberVendor"];
    $passwordVendor = crypt($passwordVendor,'sparkle');

    $sql = "INSERT INTO vendor (VendorName,VendorPassword,PhoneNumber,BankAccount)
            VALUES ('".$brand."','".$passwordVendor."','.".$phoneNumberVendor."','".$BankAccountVendor."')";
    if($conn->query($sql) === true)
    {
        session_start();
        $_SESSION["VendorName"] = $brand;
        echo "<script>Sussecfull Registration Of Brand ".$brand."</script>";
        header("Location: http://localhost/Sparkle/Sparkle/Vendor.php");

    }else  echo '<h1 color = "red">The Brand Name is Already Registerd</h1>';
    


  }
  
  if(isset($_POST["VendorsubmitLogin"]) === true)
  {
    $VendorName = $_POST["VendorNameLogin"];
    $VendorPassword = $_POST["VendorpasswordLogin"];
    

    $sql = "SELECT VendorPassword FROM vendor
            WHERE VendorName = '".$VendorName."';";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {

        while($row = $result->fetch_assoc())
        {
          $passwordDB = $row["VendorPassword"];
          
        }

        if( crypt($VendorPassword,'sparkle') == $passwordDB )
        {
          session_start();
          $_SESSION["VendorName"] = $VendorName;
          

          echo "<h1>".$_SESSION["VendorName"]."</h1>";
          header("Location: http://localhost/Sparkle/Sparkle/Vendor.php");
        }
        else echo "<h1>The Password is Wrong</h1>";

      }else echo '<h1 color = "Red">BrandName Is wrong </h1>';

  }
    










?>