<?php

$dsn = "mysql:host=localhost;dbname=world";  //data source host and db name
$username = "root";
$password = "";



// Check connection using try/catch statement

try  {
     $conn = new PDO($dsn, $username, $password);
     echo "Connection is successful<br><br>\n\r";
}

catch (PDOException $e) {
       $error_message = $e->getMessage();
    echo "An error occurred: $error_message" ;
} // end try catch


// create SQL query
$sql = "SELECT * FROM city";

// execute the query
$result = $conn->query($sql);

// append fetchAll()
$result2 = $result->fetchAll(PDO::FETCH_ASSOC);

// test the query

    print_r($result2);


?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Connecting to the Database</title>
</head>

<body>

 <h1>Shows How to Connect to a Database using PDO</h1>
 <p>Uses a query() method and fetchAll(PDO::FETCH_ASSOC)to display results as an  array.</p>

</body>
</html>
