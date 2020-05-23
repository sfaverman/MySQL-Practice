<?php

// varaible for form error message
$msg = "";

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
$sql = "SELECT Name, CountryCode, Population FROM city LIMIT 25";
$statement = $conn->prepare($sql);

// execute (create) the result set
$statement->execute();

// row count
$rowcount = $statement->rowCount();

// just to test
echo "Row count for Begining Table is " . $rowcount . " because we have a LIMIT<br>";

// sql statement set up
$sql2 = "SELECT DISTINCT CountryCode FROM city";
$statement2 = $conn->prepare($sql2);

// execute (create) the result set
$statement2->execute();

// row count
$rowcount2 = $statement2->rowCount();

// just to test
echo "Row count for Select is " . $rowcount2 . "<br>";


// ******************  FORM POSTBACK ***********************

// retrieve form values
if($_SERVER['REQUEST_METHOD'] == 'POST') {

$countrycode =  $_POST["countrycode"];

    // use cannot make the first selection
    if ($countrycode == "none"){
        $msg="Please make a selection";
    }

    else {

        // this SQL code will override the inital SQL code and this one will be used to fill in the table

       $sql = "SELECT Name, CountryCode, Population FROM city WHERE  CountryCode = :cc ORDER BY name";

        $statement = $conn->prepare($sql);

        // execute (create) the result set
       $statement->execute([":cc" => "$countrycode"]);

        // row count
        $rowcount = $statement->rowCount();

        // just to test
        echo "Row count for new table is " . $rowcount;

        // you could also use the below code but the above is mor professional
        // $sql = "SELECT Name, CountryCode, Population FROM city WHERE  CountryCode = '$countrycode'  ORDER BY name";
        // $statement = $conn->query($sql);
    }

} // server request check

?>



    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Display, Populate and Query the Database</title>
    </head>

    <style>
        body {
            font-family: arial, sans-serif;
            font-size: 100%;
        }

        h1 {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 20px;
        }


        .red {
            color: red;
        }

        td {
            border: 1px solid #000;
            padding: 10px;
            vertical-align: top;
            width: 33%;
        }

        th {
            background: #000;
            color: #fff;
            height: 20px;
            padding: 10px;
            font-size: 1.2em;
            width: 33%;
        }

        table {
            border-collapse: collapse;
            border: 2px solid #000;
            width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        tbody tr:nth-of-type(odd) {
            background: #eee;
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

        select,
        label,
        input {
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
            <h1>Displaying Data from the Database, Populating 'select' element, Query the Database</h1>
        </header>


        <?php

 // check to make sure we have records returned for table
if ($rowcount != 0){

    // header row of table
  echo "<table>\n\r";
  echo "<tr>\n\r";
  echo "<th>City  Name</th>\n\r";
  echo "<th>Country Code</th>\n\r";
  echo "<th>Population</th>\n\r";
  echo "</tr>\n\r\n\r";

     // output data of each row as associative array in result set
     $rows = $statement->fetchAll();

    //  body of table
 foreach($rows as $row) {
   echo "<tr>\n\r";
   echo "<td>" . $row["Name"] . "</td>\n\r";
   echo "<td>" . $row["CountryCode"] . "</td>\n\r";
   echo "<td>" . $row["Population"] . "</td>\n\r";
   echo "</tr>\n\r\n\r";
 } // end foreach

    // end table
  echo "</table>\n\r\n\r";

}  // end if

else {
     echo "Sorry, there were no results\n\r";
} // end else



 // check to make sure we have records returned for select
if ($rowcount2 != 0){

    // begin form
    echo "<form action='". $_SERVER['PHP_SELF'] . "' method='post'>\n\r";
    echo "<label for='countrycode'>Select a Country Code:</label>\n\r";
    echo "<select name='countrycode' id='countrycode'>\n\r";
    echo "<option value='none'>Make a Selection</option>\n\r";

     // output data of each row as associative array in result set
     $rows = $statement2->fetchAll();

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

<p class="red"><?php echo $msg ?></p>



    </body>

    </html>
