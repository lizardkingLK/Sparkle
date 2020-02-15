<?php
  include 'config.php';
  session_start();
?>

<?php

$itemDisplayArray= array(     
                              $values = array( 'name' => 'name',
                                                'price' => 'price',
                                                 'vendor' => 'vendor',
                                                 'image' => 'image'
                              )
                            );
$heading = "Sparkle.lk";

if(isset($_GET['search']))
{
    $heading = "Results for ".$_GET['search'];
    $sql = "SELECT * FROM item WHERE SearchTags  LIKE '%".$_GET['search']."%' ";

    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {   $rowNumber = $result->num_rows;
        while ($row = $result->fetch_assoc())
        {
          $itemDisplayArray[  $rowNumber ]['name'] =  $row['ItemName'];
          $itemDisplayArray[ $rowNumber ]['price'] = $row['Price'];
          $itemDisplayArray[  $rowNumber  ]['image'] = $row['ImageURL'];
          $itemDisplayArray[ $rowNumber ]['vendor'] = $row['Vendor_VendorName'];
          $rowNumber = $rowNumber - 1;


        }
    }

 
}

function displayItem($Name,$price,$image,$brand)
{
  echo '  <div class="snip1492 col-md-3 bg-dark" style = "margin : 0; padding : 0;"> 

  <figure class="snip1492">
  <img src="./images/476501963.jpg" alt="sample85" />
  <figcaption>
    <h3>Floral Ring</h3>
    <p>loren ipsum loren ipsum Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Veniam beatae aperiam nulla facere incidunt temporibus praesentium adipisci optio repellendus id, 
        iusto quaerat nostrum ipsum reprehenderit, nesciunt iste sunt quis ea
        !</p>
    <div class="price">
      <s>$24.00</s>$19.00
    </div>
  </figcaption><i class="ion-plus-round"></i>
  <a href="#"></a>
</div> 
';


}





?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css">
  <link rel="stylesheet" href="css/itemStyle.css"> </head>
  

<body class="">
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Sparkle.lk</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="opacity: 0.5;">
          <li class="nav-item">

            <?php
            
            if(isset( $_SESSION["S-username"]) === true )
            {
              echo '<a Class="nav-link" href="UserProfile.php" >'.$_SESSION['S-username'].'</a>';  
            }
            else
            {
              echo '<a class="nav-link" href="login.php" >Login</a>';
            }
            
            ?>


          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-shopping-cart px-1"></i>MyCart</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Vendor</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Vendor1</a>
              <a class="dropdown-item" href="#">Vendor2</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Contact us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Explore&nbsp;</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Category1</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline m-0" onsubmit = "redirect()" id = "SearchForm" action = "Browse.php" method  = "GET">

          <input class="form-control mr-2" type="text" placeholder="Search" name = "search" id = "search">
          <button class="btn btn-primary" type="submit" id = "searchsubmit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class=" text-secondary"></h1>
        </div>
        <div class="col-md-6"></div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <h1 class = "display-3 text-secondary" ><?php echo $heading?></h1>
            <div class="col-md-12" id="banner">
              <div class="row">
                <div class="col-4 col-md-3">
                  <ul class="nav nav-pills flex-column text-secondary">
                    <h1 class="text-primary">Category</h1>

                    <select name="Category">
                    <li class="nav-item">
                      <a href="" class="active nav-link" data-toggle="pill" data-target="#tabone"><option value="None">None</option></a>
                    </li>
                    <li class="nav-item">
                      <a href="" class="active nav-link" data-toggle="pill" data-target="#tabone"><option value="Bracelets">Bracelets</option></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="" data-toggle="pill" data-target="#tabtwo"><option value=" Pendants"> Pendants</option></a>
                    </li>
                    <li class="nav-item">
                      <a href="" class="nav-link" data-toggle="pill" data-target="#tabthree"><option value="Rings">Rings</option></a>
                    </li>
                    <li class="nav-item">
                      <a href="" class="nav-link" data-toggle="pill" data-target="#tabthree"><option value="Earings">Earings</option></a>
                    </li>
                  </ul>
                    </select>
                    
                </div>
                <div class="col-4 col-md-3">
                  <ul class="nav nav-pills flex-column">
                    <h1 class="text-primary">MetalType</h1>
                    
                    <select name="metal">
                    <li class="nav-item">
                      <a href="" class="active nav-link" data-toggle="pill" data-target="#tabone"><option value="None">None</option></a>
                    </li>

                    <li class="nav-item">
                      <a href="" class="active nav-link" data-toggle="pill" data-target="#tabone"><option value="Gold">Gold</option></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="" data-toggle="pill" data-target="#tabtwo"><option value="Silver">Silver</option></a>
                    </li>
                    <li class="nav-item">
                      <a href="" class="nav-link" data-toggle="pill" data-target="#tabthree"><option value="Bronze">Bronze</option></a>
                    </li>
                  </ul>
                    </select>


                </div>
                <div class="col-4 col-md-3">
                  <ul class="nav nav-pills flex-column">
                    <h1 class="text-primary">Stone</h1>
                    
                    <select name="stone">
                    <li class="nav-item">
                      <a href="" class="active nav-link" data-toggle="pill" data-target="#tabone"><option value="None">None</option></a>
                    </li>
                    <li class="nav-item">
                      <a href="" class="active nav-link" data-toggle="pill" data-target="#tabone"><option value="Ruby">Ruby</option></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="" data-toggle="pill" data-target="#tabtwo"><option value="Saphire">Saphire</option></a>
                    </li>
                    <li class="nav-item">
                      <a href="" class="nav-link" data-toggle="pill" data-target="#tabthree"><option value="Diamond">Diamond</option></a>
                    </li>
                  </ul>
                    </select>


                </div>
                <div class="col-4 col-md-3">
                  <ul class="nav nav-pills flex-column text-primary">
                    <h1 class="text-primary">Sort</h1>
                    
                    <select name="sort">
                    <li class="nav-item">
                      <a href="" class="active nav-link" data-toggle="pill" data-target="#tabone"><option value="Price-Highest">Price-Highest</option></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="" data-toggle="pill" data-target="#tabtwo"><option value="Price-Lowest">Price-Lowest</option></a>
                    </li>
                    <li class="nav-item">
                      <a href="" class="nav-link" data-toggle="pill" data-target="#tabthree"><option value="Popular">Popular</option></a>
                    </li>
                  </ul>
                    </select>

                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="itemDisplay">
          
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12" id="banner"></div>
          </div>
          <div class="row flex d-flex flex-row justify-content-start align-items-center align-self-center " id="itemDisplay"  > 
            <div class = "col-md-12">
              <?php
                    
                    $arraySize =  count($itemDisplayArray);
                    for( $i = 0 ; $i < $arraySize ;$i++)
                    {
                      displayItem($itemDisplayArray[$i]['name'],$itemDisplayArray[$i]['price'],$itemDisplayArray[$i]['image'],$itemDisplayArray[$i]['vendor']);
                    }
                
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-secondary">Sparkle.lk</h2>
          <p class="text-white">Onestop Shop for Best Jewelry,&nbsp;</p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-secondary">Mapsite</h2>
          <ul class="list-unstyled">
            <a href="#" class="text-white">Home</a>
            <br>
            <a href="#" class="text-white">Browse</a>
            <br>
            <a href="#" class="text-white">Cart</a>
            <br>
            <a href="#" class="text-white">Message</a>
            <li>vendor</li>
          </ul>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4">Contact</h2>
          <p>
            <a href="tel:+246 - 542 550 5462" class="text-white">
              <i class="fa d-inline mr-3 text-secondary fa-phone"></i>+246 - 542 550 5462</a>
          </p>
          <p>
            <a href="mailto:info@pingendo.com" class="text-white">
              <i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>info@pingendo.com</a>
          </p>
          <p>
            <a href="https://goo.gl/maps/AUq7b9W7yYJ2" class="text-white" target="_blank">
              <i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>365 Park Street, NY</a>
          </p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-light">Subscribe</h2>
          <form>
            <fieldset class="form-group text-white">
              <label for="exampleInputEmail1">Get our newsletter</label>
              <input type="email" class="form-control" placeholder="Enter email"> </fieldset>
            <button type="submit" class="btn btn-outline-secondary">Submit</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-white">© Copyright 2017 Pingendo - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>

  <script>
  
           
  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
</body>

</html>

