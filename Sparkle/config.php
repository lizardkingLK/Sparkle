<?php
    
    $conn = new mysqli('localhost','root','','sparkledb');

    if($conn->connect_error )
    {
        echo "<h1>Sorry We Could Not Connect To The Server</h1>";
        echo "<h3>Sparkle Says Sorry</h3>";
    }
    
    
    




?>