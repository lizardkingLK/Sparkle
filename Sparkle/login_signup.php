

<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="theme.css" type="text/css">
        <link rel="stylesheet" href="css/itemStyle.css">

    </head>
    <body>
       

      <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="#">Sparkle.lk</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="opacity: 0.5;">
              <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="fa fa-shopping-cart px-1"></i>MyCart</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Contact us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Jewelry</a>
              </li>
            </ul>
            <form class="form-inline m-0">
              <input class="form-control mr-2" type="text" placeholder="Search">
              <button class="btn btn-primary" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    


        <div class="main-box">
            <div class="slider-cont">
              <div class="signup-slider">
                <div class="img-txt">
                  <div class="img-layer"></div>
                  <h1>The hardest part of starting up is starting out for you.</h1>
                  <img src="https://static.pexels.com/photos/33972/pexels-photo.jpg"/>
                </div>
                <div class="img-txt">
                  <div class="img-layer"></div>
                  <h1>We understand you and your business, We have the right solutions for you.</h1>
                  <img src="https://static.pexels.com/photos/257897/pexels-photo-257897.jpeg"/>
                </div>
                <div class="img-txt">
                  <div class="img-layer"></div>
                  <h1>Join US Now!</h1>
                  <img src="https://static.pexels.com/photos/317383/pexels-photo-317383.jpeg"/>
                </div>
              </div>
            </div>
            
            
            <div class="form-cont">
          
              <div class="top-buttons">
                <button class="to-signup top-active-button">
                  Sign Up
                </button>
                <button class="to-signin">
                  Sign In
                </button>
              </div>
              
              <div class="form form-signup">
                <form action="login_signup.php" method="post">
                  <lable>First Name</lable>
                  <input type="text" name="name"
                         placeholder="Your full name">



                  <lable>E-MAIL</lable>
                  <input type="email" name = "email"
                         placeholder="Your e-mail">
                  <lable>PASSWORD</lable>

                  <input type="password" name = "password"
                         placeholder="Your password">

                  <lable>Retype Password</lable>
                  <input type="password" name= "password2"
                  placeholder="Your password" onmouseout="checkPassword()" id="p1">
                  <lable>Enter A Security Question</lable>
                  <input type="text"
                  placeholder="eg: What is Your mothers maiden name?">
                  <lable>Enter Answer to Security Question</lable>
                  <input type="text"
                  placeholder="eg: jane doe">

                  <div id = "warning">

                  </div>

                  <p class="terms">
                    <input type="checkbox" name = "terms">
                    I agree all statments in
                    <a href="#" class="lined-link">terms of service</a>
                  </p>
                  <input type="submit"
                         class="form-btn"
                         value="Sign Up" name="signUpBtn"/>
                  <a href="#" class="lined-link to-signin-link">I'm already member</a>

                </form>
              </div>

     

              <div class="form form-signin">
                <form action="login_signup.php" method="POST">
                  <lable>E-MAIL</lable>
                  <input type="email" 
                         placeholder="Your e-mail">
                  <lable>PASSWORD</lable>
                  <input type="password" 
                         placeholder="Your password">
                  <input type="submit"
                         class="form-btn"
                         value="Sign In"/>
                  <a href="#" class="lined-link to-signup-link">Create new account</a>
                </form>
              </div>
            </div>
            <div class="clear-fix"></div>
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

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
          

          
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

          <script src="js/login.js"></script>
    </body>
</html>


                <?php
                  //SignUp PHP script
                  
                 require 'config.php' ;

                 if (isset($_POST["signUpBtn"]))
                 {
                    $name =  $_POST["name"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $password2 = $_POST["password2"];

                 }




                 
              


              
              
              
              ?>