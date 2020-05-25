<?php

// varaible for form error message
$msg = "";
$semester_year = "";

$dsn      = "mysql:host=localhost;dbname=college";  //data source host and db name
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

// initial sql statement set up - join 3 tables

$sql = "SELECT
  CONCAT(me.lname, ', ', me.fname) AS Name,
    sc.organization AS organization,
    sc.amount AS amount,
    sc.semester AS semester,
    sc.year AS year
  FROM members me
    JOIN scholarships_students ss
      ON (ss.student_id = me.student_id)
    JOIN scholarships sc
      ON (ss.scholarship_id = sc.scholarship_id)
  ORDER BY year DESC, semester, amount DESC, lname ";

// prepare statement
$statement = $conn->prepare($sql);

// execute (create) the result set
$statement->execute();

// get row count
$rowcount = $statement->rowCount();

// just to test
//echo "Row count for Table is " . $rowcount . "<br><br>";

// retrieve a result set as an associative array
$statement = $statement->fetchAll(PDO::FETCH_ASSOC);

   //print_r($statement);

///////////  SQL for year ////////
$sql2 = "SELECT DISTINCT year from scholarships";
$statement2 = $conn->prepare($sql2);

// execute (create) the result set
$statement2->execute();

// row count
$rowcount2 = $statement2->rowCount();

// just to test
//echo "Row count for year is " . $rowcount2 . "<br>";

$statement2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

  //print_r($statement2);


// ***********  FORM POSTBACK ***********************

// retrieve form values
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // retrieve form values
    $year =  $_POST["year"];
    $semester =  $_POST["semester"];

    //echo "<br>Year is $year , Semester is $semester <br>";

    $semester_year ="$semester $year";

    // use must make 2 choices
    if ($year == "none" || $semester == "none"){
        $msg="Please choose a year and a semester";
        $semester_year ="";
    }

    else {

   // sql statement set up - join 3 tables with WHERE clause added. This SQL code will override the inital SQL code and this one will be used to fill in the table

$sql = "SELECT
  CONCAT(me.lname, ', ', me.fname) AS Name,
    sc.organization AS organization,
    sc.amount AS amount,
    sc.semester AS semester,
    sc.year AS year
  FROM members me
    JOIN scholarships_students ss
      ON (ss.student_id = me.student_id)
    JOIN scholarships sc
      ON (ss.scholarship_id = sc.scholarship_id)
    WHERE semester = :sem and year = :yr
  ORDER BY year DESC, semester, amount DESC, lname ";

$statement = $conn->prepare($sql);

// execute (create) the result set
$statement->execute([":sem" => "$semester", ":yr" => "$year"]);

// row count
$rowcount = $statement->rowCount();

// just to test
//echo "Row count for new Table is " . $rowcount . "<br><br>";

$statement = $statement->fetchAll(PDO::FETCH_ASSOC);

//print_r($statement);

 } //end else


} // end server request check

?>


<!DOCTYPE html>

<!--Sofia Faverman WEBD 167 Final-->

<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Display, Populate and Query the Scholarships Offered</title>
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
        th {
            background: steelblue;
            border: 1px solid #000;
            color: #fff;
            height: 20px;
            padding: 10px;
            font-size: 1.2em;
            width: 18%;
        }
        td {
            border: 1px solid #000;
            padding: 10px;
            vertical-align: top;
            width: 18%;
        }
        td:nth-child(1){
            width: 25%;
        }
        td:nth-child(2) {
            width: 30%;
        }
        tr:nth-child(even) {
            background-color: lightsteelblue;
        }

        table {
            border-collapse: collapse;
            border: 2px solid #000;
            min-width: 250px;
            margin: 2%;       }

        tbody tr:nth-of-type(odd) {
            background: #eee;
        }

        [type=submit] {
            margin: 20px auto 10px;
            padding: 10px;
            min-width: 200px;
            border: none;
            border-radius: 5px;
            background-color: steelblue; /*#d9d9d9; */
            color: #fff;
            font-size: 1.3em;
        }
        form {
            margin-top: 50px;
            max-width: 250px;
            margin-left: 2%;

        }

        fieldset {
            margin: 0;
            padding-left: 1em;
        }

        select,
        label,
        input {
            display: block;
            margin: 0 auto;
        }

        label {
        margin: 1em 0;
        font-weight: bold
        }

        select {
            background-color: #d9d9d9;
            color: #000;
            font-size: 1em;
            padding: 10px;
            width: 90%;
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
    @media only screen and (max-width: 550px) {
        th:nth-child(4),
        th:nth-child(5),
        td:nth-child(4),
        td:nth-child(5)   {
            display: none;
        }
         [type=submit] {
             font-size: 1.1em;
             min-width: 150px;
         }
    }
     @media only screen and (max-width: 450px) {
        th:nth-child(2),
        td:nth-child(2) {
            display: none;
        }
         th {
            background: steelblue;
            font-size: 1.1em;
         }
     }

 </style>

 <body>

    <header>
        <h1><?php echo "$rowcount " ?>Scholarships Offered <?php echo " $semester_year" ?></h1>
    </header>


     <?php

 // check to make sure we have records returned for table
if ($rowcount != 0){

    // header row of table
  echo "<table>\n\r";
  echo "<tr>\n\r";
  echo "<th>Student Name</th>\n\r";
  echo "<th>Scholarship</th>\n\r";
  echo "<th>Amount</th>\n\r";
  echo "<th>Semester</th>\n\r";
  echo "<th>Year</th>\n\r";
  echo "</tr>\n\r\n\r";


    //  body of table
 foreach($statement as $row) {
   echo "<tr>\n\r";
   echo "<td>" . $row["Name"] . "</td>\n\r";
   echo "<td>" . $row["organization"] . "</td>\n\r";
   echo "<td class='ra'>" . number_format($row["amount"], 2) . "</td>\n\r";
   echo "<td>" . $row["semester"] . "</td>\n\r";
   echo "<td>" . $row["year"] . "</td>\n\r";
   echo "</tr>\n\r\n\r";
 } // end foreach

    // end table
  echo "</table>\n\r\n\r";

}  // end if

else {
     echo "<p>Sorry, there were no scholarships offered for $semester $year</p>\n\r";
} // end else

 // check to make sure we have records returned for select year
if ($rowcount2 != 0){

    // begin form
    echo "<form action='". $_SERVER['PHP_SELF'] . "' method='post'>\n\r";

    echo "<fieldset>\n\r";
      echo "<legend>Scholarships Offered</legend>\n\r";
    echo "<label for='year'>Select a Year:</label>\n\r";
    echo "<select name='year' id='year'>\n\r";
    echo "<option value='none'>Make a Selection</option>\n\r";

    // <option< element - note the positioning of the quotations
foreach($statement2 as $row) {
    echo"<option value='" . $row["year"] . "'>" . $row["year"] . "</option>\n\r";
    } // end foreach

  echo "</select>\n\r<br><br>\n\r";

  // dropdown menu for semester
  echo "<label for='semester'>Select a Semester</label>\n\r";
  echo "<select name='semester' id='semester'>\n\r";
  echo "<option value='none'>Make a Selection</option>\n\r";
  echo "<option value='Fall'>Fall</option>\n\r";
  echo "<option value='Spring'>Spring</option>\n\r";
  echo "</select>\n\r<br><br>\n\r";

  // submit button
  echo "<input type='submit' value='Display Scholarships'>\n\r";
 echo "</fieldset>\n\r";
 echo "</form>\n\r";
  // end form

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
