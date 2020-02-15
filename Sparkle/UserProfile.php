<?php
  include 'config.php';
  session_start();

  $sql= "SELECT * FROM user 
        WHERE email ='".$_SESSION["S-email"]."';";
  //echo $sql;
  $result =  $conn->query($sql);

  

    while($row = $result->fetch_assoc())
    {
       $Address = $row["Address"];
       $CardNumber = $row["CardNumber"];
       $Expires = $row["Expires"];
       $Cvc = $row["Cvc"];
       $CCtype = $row["CCtype"];
     // echo $Cvc.$CCtype;
    }


  
  

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="the/theme.css">
  <link rel="stylesheet" href=".css">
  <link rel="stylesheet" href="theme.css"> </head>

<body>
  <div class="p-0">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1 class="display-1" id="userNameDisplay"><?php echo $_SESSION["S-username"]; ?></h1>
          <h1 class="" id="emailDisplay"><?php echo $_SESSION["S-email"]; ?></h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-center">
          <a class="btn btn-danger" href="Home.php?logout=1">
            <i class="fas fa-power-off"></i>Logout</a>
        </div>
      </div>
    </div>
  </div>
  <div class="p-0 bg-primary" id="BillingInfoSection">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Billing Infomation</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h4 class="">Address</h4>
        </div>
        <div class="col-md-6 bg-dark" id="AddressDisplay" >
          <h4><?php echo $Address; ?><h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h4 class="">Credit-Card Number</h4>
        </div>
        <div class="col-md-6 bg-dark" id="CCNDisplay"  ><h4><?php echo $CardNumber; ?></h4></div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h4 class="">CVC number</h4>
        </div>
        <div class="col-md-6 bg-dark" id="CVCDisplay"><?php echo $Cvc; ?></div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h4 class="">Expiary Date</h4>
        </div>
        <div class="col-md-6" id="expiaryDateDisplay"><?php echo $Expires; ?></div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h4 class="">Credit-Card Type</h4>
        </div>
        <div class="col-md-6" id="CCInfoDisplay"><?php echo $CCtype; ?></div> 
      </div>
      <div class="row">
        <div class="col-md-12">
          <a class="btn btn-danger btn-lg btn-block" href="BillInfo.php" name = "">Edit</a>
        </div>
      </div>
    </div>
  </div>
  <div class="p-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Purchase History</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <h2 class="bg-secondary">Purchace</h2>
        </div>
        <div class="col-md-4">
          <h2 class="">Date</h2>
        </div>
        <div class="col-md-4">
          <h2 class="bg-light">Status</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">WishList</h1>
          <div class="p-0" id="whichlist"></div>
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