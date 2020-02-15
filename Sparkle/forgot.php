<?php
    include 'config.php';
    

    


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
  <div class="py-5 opaque-overlay bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-7">
          <h1 class="text-gray-dark">Forgot Your Password? No Worries</h1>
          <p class="lead mb-4">Complete all the fields below to reset Your Password</p>
          <form class="" method="post" action="forgot.php">
            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email" id = "email"> </div>
            <div class="form-group">
              <label>Enter New Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter New Password"> </div>
            <div class="form-group">
              <label id = "SequrityQuestion">Sequrity Question</label>
              <input type="txt" name="answer" class="form-control" placeholder="Answer"> </div>
            <button type="submit" class="btn btn-primary" name = "submit">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
  </script>
  
  <script>
      $(document).ready(function () {
        
          $("#email").blur(function (e) 
          { 
              var email = $("#email").val();
              
              $.ajax({
                type: "post",
                url: "loginCheck.php?forgot=1",
                data: { email : $("#email").val()},
                
                success: function (response) {
                  
                  $("#SequrityQuestion").html(response);
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

    if (isset($_POST["submit"]) === true)
    {
        $password = $_POST["password"];
        $email = $_POST["email"];
        $answer = $_POST["answer"];

        $sql = $query = "SELECT * FROM user 
                         WHERE email ='".$_POST["email"]."';"; 
        echo $sql;
        $result =  $conn->query($sql);
        
        if($result->num_rows > 0)
        {

            while($row = $result->fetch_assoc())
            {
              $answerDB = $row["SequrityAnswer"] ;
              
              
            }

            if( $answerDB == $answer)
            {
                $password = crypt($password, 'sparkle');

                $sql = "UPDATE user SET 
                        Password = '".$password."' WHERE email = '".trim($email)."';" ;

                if ($conn->query($sql) === TRUE) {
                      
                      
                  echo '<script type="text/javascript">
                          alert("Password Succesfully Reseted")
                          window.location = "http://localhost/Sparkle/login.php"

                          </script>';
                    
                  
                    
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    
                  } 
                  
                  
            };

          };
      

    };

?>