<?php

// initialize varaible
$msg = "";

// check that page is called from the form
if($_SERVER['REQUEST_METHOD'] == 'POST') {

 // retrieve fprm values

$title =  $_POST["title"];

 // addslashes() will escape any quotations so they do not interfere with the PHP code
 // trim()  will remove any leading or trailing white space
 // htmlspecialchars() will convert any HTML characters into entity values - example <script> will be &lt;script&gt;
$fname =  htmlentities(trim($_POST["fname"]));
$fname = addslashes($fname);

$lname =  htmlentities(trim($_POST["lname"]));
$lname = addslashes($lname);

$room  = htmlentities(trim($_POST["room"]));

$phone = htmlentities(trim($_POST["phone"]));

$email = htmlentities(trim($_POST["email"]));



}

else {
    exit("There is a problem");
}


// create connection string
$dsn = "mysql:host=localhost;dbname=college";  //data source host and db name
$username = "root";
$password = "";



// Check connection AND INSERT using try/catch statement

try  {
     $conn = new PDO($dsn, $username, $password);

     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     echo "Connection is successful<br><br>\n\r";


// create SQL query
$sql = "INSERT INTO advisors(title, fname, lname, room, phone, email) VALUES ('$title', '$fname', '$lname', '$room', '$phone', '$email')";

// execute the statemeent - we do not use 'query()' because no records are returned
 $conn->exec($sql);
  echo "The record was sucessfully entered";
  $msg =  "You have added an advisor! You may see your entry <a href='show_advisor.php'>Here</a>.</p>";
}

catch (PDOException $e) {
       $error_message = $e->getMessage();
    echo "An error occurred: $error_message" ;
} // end try catch

$conn = null;
?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Inserting Advisor Data into the Database Table</title>
</head>

<body>

   <header>
     <h1>Inserting Advisor Data into the Database Table</h1>
   </header>
   <p><?php echo $msg; ?></p>

</body>
</html>
