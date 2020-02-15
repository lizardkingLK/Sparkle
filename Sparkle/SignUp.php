
<?php
  
  require 'loginCheck.php';
  require 'config.php'
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css"> </head>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
    crossorigin="anonymous">
  </script>
  <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
  </script>



<body>
  <div class="py-5 bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-1">SignUp</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="form" method = "post" action = "SignUp.php">
            <div class="form-group">
              <label>Email address</label>
              <input type="email" class="form-control" placeholder="Enter email" id="email" name = "email1">
              <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Enter Name" id="name" name = "name1">
              
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" id="password" name = "password"> 
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Re-enter Password</label>
              <input type="text" class="form-control" placeholder="Password" id="reEnterPassword" name = "password2"> 
            </div>
            <div class="form-group">
              <label>Select Sequrity Question</label>
              <select class="custom-control custom-select" id="securityQuestion" name = "question">
                <option selected="">Open this select menu</option>
                <option value="What is Your nickname in highschool?">What is Your nickname in highschool?</option>
                <option value="Name Of Your First Pet">Name of your first pet</option>
              </select>
            </div>
            <div class="form-group">
              <label>Security Answer</label>
              <input type="text" class="form-control" id="securityAnswer" placeholder="Answer for the above Question" name = "answer">
            </div>

            <div class="row">
              <small>Sparkle.lk Only Delivers Inside SriLanka</small>
              <div class="col-md-12" id = "warning">


              </div>
            
            </div>

            <button type="submit" class="btn btn-primary" id = "signUpSubmit" name = "submitButton">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>

    $(document).ready(function () {
   
     
     $("#email").blur(function (e) { 
       
        var email = $("#email").val();
        
        $.ajax({
          type: "post",
          url: "loginCheck.php",
          data: {email : $("#email").val()},
          
          success: function (response) {
            
            
            $("#warning").html(response);
           

          }
        });   

      
    
        
       
     });

    });
   
  
  </script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
</body>

</html>


<?php

if(isset($_POST["submitButton"]))
{
    
    
    $question =  $_POST['question'];
    $answer = $_POST['answer'];
    $password = $_POST['password'];
    $email = $_POST['email1'];
    $name = $_POST['name1'];
    echo $name.$password.$email;

    $password = crypt($password,'sparkle');

    $sql = "INSERT INTO user ( email, Password,
                             SequrityQuestion, SequrityAnswer,Name)
            VALUES ('".$email."', '".$password."', '".$question."','".$answer."','".$name."');";
    
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION["S-username"] = $name;
        $_SESSION["S-email"] = $email;

        echo $_SESSION["S-email"];
        echo '<script type="text/javascript">
              window.location = "http://localhost/Sparkle/Sparkle/Home.php"
              </script>';
        
        
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header('Location: SignUp.php');
    }
    
   
}

   


?>