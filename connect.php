<?php
    $user = 'newuser'; 
    $password = 'root'; 
    $db = 'marvel'; 
    $host = 'localhost'; 
    $port = 3306; 
    $conn = mysqli_init();

    
    // Create connection
    $conn = new mysqli($host, $user, $password, $db);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 

?>