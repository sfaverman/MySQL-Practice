<?php

$dsn = "mysql:host=localhost;dbname=college";  //data source host and db name
$username = "root";
$password = "";


// Check connection using try/catch statement

try  {
     // Create connection
     $conn = new PDO($dsn, $username, $password); // creates PDO object
     echo "Connection is successful";
}

catch (PDOException $e) {
       $error_message = $e->getMessage();
    echo "An error occurred: $error_message" ;
}


?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Connecting to the Database</title>
</head>

<body>

 <h1>Shows How to Connect to a Database using PDO</h1>

</body>
</html>
