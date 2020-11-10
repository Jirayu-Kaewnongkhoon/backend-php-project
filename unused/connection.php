<?php
    header("Access-Control-Allow-Origin: *");
    date_default_timezone_set("Asia/Bangkok");
    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "php_project";

    // $hostname = "localhost";
    // $username = "id15150467_root";
    // $password = "xlHSIr|_AIq6>cNh";
    // $databasename = "id15150467_repair_application";
    
    // Create connection
    $conn = mysqli_connect($hostname, $username, $password, $databasename);
    
    // Check connection
    // if (!$conn) {
    //   die("Connection failed: " . mysqli_connect_error());
    // }
    // echo "Connected successfully";

?>