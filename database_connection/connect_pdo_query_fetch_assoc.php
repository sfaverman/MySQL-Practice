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

// test the query returns one row so we need a loop

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    //echo $row['Name']."<br>\n\r"; //how to display the value of a column in a row
    print_r($row);
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
 <p>Uses a query() method and fetch(PDO::FETCH_ASSOC)to display results as an  array.</p>

</body>
</html>
