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
$sql = "SELECT Name FROM city WHERE CountryCode = :code AND Name LIKE :like ORDER BY Name";

// prepare statement
$statement = $conn->prepare($sql);

//execute query
$statement->execute([":code" => "USA", ":like" => "A%"]);





// return result set using fetchAll method and foreach loop
// foreach ($array as $item)

$rows = $statement->fetchAll();

foreach($rows as $row){

    echo "City name: " . $row['Name'] .  "<br>\n\r";
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
 <p>Uses a prepared statement to display results as an associative array. Two parameters are passed using a variable placeholder.</p>

</body>
</html>
