<?php


session_start(); 

if(isset($_GET["logout"]) === true )
{
  session_unset(); 
}


if(isset( $_SESSION["S-username"]) === true )
            {
              echo '<a Class="nav-link" href="UserProfile.php" >'.$_SESSION['S-username'].'</a>';  
            }
            else
            {
              echo '<a class="nav-link" href="login.php" >Login</a>';
            }

?>