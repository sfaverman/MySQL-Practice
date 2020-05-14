<?php
ini_set('display_errors', 1); // Let me learn from my mistakes!
error_reporting(E_ALL); // Show all possible problems!

$dsn      = "mysql:host=localhost;dbname=college_faverman";  //data source host and db name
$username = "root";
$password = "";


// Create connection
$conn = new PDO($dsn, $username, $password); // creates PDO object

// Check connection using try/catch statement

try  {
     $conn = new PDO($dsn, $username, $password);
     //echo "Connection is successful<br><br>";
}

catch (PDOException $e) {
       $error_message = $e->getMessage();
    echo "An error occurred: $error_message" ;
}


// sql statement set up
$sql = "SELECT lname, fname, address, postal_code, phone, email FROM members WHERE city = 'San Diego' ORDER BY postal_code, lname LIMIT 12;";
$statement = $conn->prepare($sql);

// execute (create) the result set
$statement->execute();

// row count
$rowcount = $statement->rowCount();

// just to test
//echo "Row count is " . $rowcount;

?>



<!DOCTYPE html>
<!--Sofia Faverman-->

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Displaying Data from the College Database</title>
</head>

<style>
body {
    font-family: arial, sans-serif;
    font-size: 100%;
}

 h1 {
    text-align: center;
    font-size: 1.5em;
}

 h2 {
    margin-bottom: 20px;
    text-align: center;
    font-size: 1.25em;
}


  td {
    border: 1px solid #000;
    padding: 10px;
    vertical-align: top;
    width: 15%;
}

th {
    background: steelblue;
    border: 1px solid #000;
    color: #fff;
    height: 20px;
    padding: 10px;
    font-size: 1.2em;
    width: 15%;
}
tr:nth-child(even) {
    background-color: lightsteelblue;
}


table {
    border-collapse: collapse;
    border: 2px solid #000;
    width: 900px;
    margin-left: auto;
    margin-right: auto;
}

tbody tr:nth-of-type(odd) {
    background: #eee;
}
</style>

<body>

 <header>
    <h1>Student Population by City of Residence</h1>

 </header>


 <?php

 // check to make sure we have records returned
if ($rowcount != 0){

  echo "<h2>" . $rowcount .
     " Students living in San Diego</h2>";

    // header row of table
  echo "<table>\n\r";
  echo "<tr>\n\r";
  echo "<th>Last Name</th>\n\r";
  echo "<th>First Name</th>\n\r";
  echo "<th>Address</th>\n\r";
  echo "<th>Postal Code</th>\n\r";
  echo "<th>Phone</th>\n\r";
  echo "<th>Email</th>\n\r";
  echo "</tr>\n\r\n\r";

    //  body of table
   // output data of each row one at a time


 while ($row = $statement->fetch())  {
   echo "<tr>\n\r";
   echo "<td>" . $row["lname"] . "</td>\n\r";
   echo "<td>" . $row["fname"] . "</td>\n\r";
   echo "<td>" . $row["address"] . "</td>\n\r";
   echo "<td>" . $row["postal_code"] . "</td>\n\r";
   echo "<td>" . $row["phone"] . "</td>\n\r";
   echo "<td>" . $row["email"] . "</td>\n\r";
   echo "</tr>\n\r\n\r";
 } // end while

    // end table
   echo "</table>\n\r";

}  // end if

else {
     echo "<p>Sorry, there were no results</p>";
} // end else


// close the connection
$conn = null;

?>



</body>
</html>
