<?php


$dsn      = "mysql:host=localhost;dbname=world";  //data source host and db name
$username = "root";
$password = "";


// Create connection
$conn = new PDO($dsn, $username, $password); // creates PDO object

// Check connection using try/catch statement

try  {
     $conn = new PDO($dsn, $username, $password);
     echo "Connection is successful<br><br>";
}

catch (PDOException $e) {
       $error_message = $e->getMessage();
       echo "An error occurred: $error_message" ;
}


// sql statement set up
$sql = "SELECT DISTINCT CountryCode FROM city";
$statement = $conn->prepare($sql);

// execute (create) the result set
$statement->execute();

// row count
$rowcount = $statement->rowCount();

// just to test
echo "Row count is " . $rowcount;

?>



    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Populate a select drop down form element</title>
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


        [type=submit] {
            margin-top: 25px;
            padding: 10px;
            width: 160px;
            border: none;
            border-radius: 5px;
            background-color: #d9d9d9;
            color: #000;
            font-size: 1.3em;
        }
        select, label, input {
            display: block;

        }


        form {
            margin-top: 50px;
        }

        select {
            background-color: #d9d9d9;
            color: #000;
            font-size: 1em;
            padding: 10px;
            width: 200px;
            margin-top: 10px;
            border: none;
        }

        option {
            background-color: #f5f5f5;
            color: #000;
            font-size: 1em;
            padding: 10px;
            border-bottom: 1px solid #000;
        }

    </style>

    <body>

        <header>
            <h1>Populate a 'select' Drop Down Form Element</h1>
        </header>

        <p>Drop down lists and check boxes are commonly used to send a parameter to an SQL statement in order to refine a result set. This typically is used with a WHERE clause. Rather than 'hard code' the values in HTML, it is more efficient to generate the values form the values in the database. Therfore you never have to change your code if the values change.</p>

        <p>
            <mark>This shows how to populate the 'select' only. Nothing happens when you click the submit button. Look at the source code to see what is being generated.</mark>
        </p>


<?php

 // check to make sure we have records returned
if ($rowcount != 0){

    // begin form
    echo "<form action='". $_SERVER['PHP_SELF'] . "' method='post'>\n\r";
    echo "<label for='countrycode'>Select a Country Code:</label>\n\r";
    echo "<select name='countrycode' id='countrycode'>\n\r";
    echo "<option value='none'>Make a Selection</option>\n\r";

     // output data of each row as associative array in result set
     $rows = $statement->fetchAll();

    // <option< element - note the positioning of the quotations
foreach($rows as $row) {
    echo"<option value='" . $row["CountryCode"] . "'>" . $row["CountryCode"] . "</option>\n\r";
    } // end foreach

    // end form
  echo "</select>\n\r<br><br>\n\r";
  echo "<input type='submit' value='Display Cities'>\n\r";
  echo "</form>\n\r";

}  // end if

else {
     echo "Sorry, there were no results";
} // end else


// close the connection
$conn = null;

?>


    </body>

    </html>
