<?php
    
    session_start();
    $checkFlags = true;
    require 'config.php';
   
    if( isset($_REQUEST['email']) === true && isset($_GET['forgot']) !== true)
    {
       $email =  $_REQUEST['email'];
    
        
       $query = "SELECT * FROM user 
                 WHERE email ='".$_REQUEST["email"]."';";
                 
               
       
       $result = $conn->query($query);
        


           while($row = $result->fetch_assoc())
           {
             
               if($email == $row['email'])
               {
                   echo "<h3>";
                   echo "Your Email Already Exist";
                   echo "</h3><br>";
                   $checkFlags = false;
               } 
           }
      



    }

    if(isset($_GET['forgot']) === true)
    {
        $email =  $_REQUEST['email'];

        $sql= "SELECT * FROM user 
        WHERE email ='".$_REQUEST["email"]."';";

        $result = $conn->query($sql);
        if($result->num_rows > 0)
        {

            while($row = $result->fetch_assoc())
            {
            $sequrityQuestion = $row["SequrityQuestion"];
            
            }

            echo $sequrityQuestion;
            

        }else echo '<h1 color = "Red">Email Is wrong </h1>';

    }

    if(isset($_POST["submitBtn"]))
    {
        
        echo "<script>alert(1);<script>";
        $question =  $_POST['question'];
        $answer = $_POST['answer'];
        $password = $_POST['password'];
        $email = $_POST['email1'];
        $name = $_POST['name1'];

        $password = crypt($password,'sparkle');

        $sql = "INSERT INTO user ( email, Password,
                                 SequrityQuestion, SequrityAnswer,Name)
                VALUES ('".$email."', '".$password."', '".$question."','".$answer."','".$name."');";
        
        
        if ($conn->query($sql) === TRUE) {
            $_SESSION["S-username"] = $name;
            $_SESSION["S-email"] = $email;

            echo $_SESSION["S-email"];
            header("Location: http://localhost/Sparkle/Sparkle/Home.php");
            
            
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            header('Location: SignUp.php');
        }
        
       
    }




    $conn->close();
?>