<?php

$dsn = "mysql:host=localhost;dbname=college";  //data source host and db name
$username = "root";
$password = "";



// Check connection using try/catch statement

try  {
     $conn = new PDO($dsn, $username, $password);

     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     echo "Connection is successful<br><br>\n\r";
}

catch (PDOException $e) {
       $error_message = $e->getMessage();
    echo "An error occurred: $error_message" ;
} // end try catch


// create SQL query
$sql = "SELECT title, fname, lname, room, phone, email FROM advisors ORDER BY advisor_id DESC";

// execute the query
$result = $conn->query($sql);


// return result set using fetchAll method and foreach loop
// foreach ($array as $item)

$rows = $result->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Display Results of Insert</title>
    <style>
        body {
            font-family: arial, sans-serif;
            font-size: 100%;
         }
        div {
            margin-bottom: 20px;
            width: 600px;
            padding: 10px;
        }

        div:nth-of-type(odd){
            background-color: aliceblue;
        }

        div:nth-of-type(even){
            background-color:floralwhite;
        }
    </style>
</head>

<body>
   <header>
     <h1>Advisor Table</h1>
       <h2><a href="form.html">Go back to form</a></h2>
   </header>

 <?php
   foreach($rows as $row){
    echo "<div>\n\r";
    echo "<p><b>Title:</b> "       . $row['title']   . "</p>\n\r";
    echo "<p><b>First name:</b> "  . $row['fname']   .  "</p>\n\r";
    echo "<p><b>Last name:</b> "   . $row['lname']   . "</p>\n\r";
    echo "<p><b>Room:</b> "        . $row['room']    . "</p>\n\r";
    echo "<p><b>Phone:</b> "       . $row['phone']   . "</p>\n\r";
    echo "<p><b>Email:</b> "       . $row['email']   . "</p>\n\r";
    echo "</div>\n\r";
    }
  ?>

</body>
</html>
