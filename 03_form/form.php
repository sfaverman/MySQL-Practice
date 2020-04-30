<?php
    ini_set('display_errors', 1); // Let me learn from my mistakes!
    error_reporting(E_ALL); // Show all possible problems!
 // test data returned - display the content of the variables an array
//print_r($_POST);

// store data in variables
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$heard = $_POST['heard'];
$comments = $_POST['phone'];


?>
<!DOCTYPE html>
<!--Sofia Faverman Date: 04/29/2020-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Form Processing Results PHP Script</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <header>
        <h1>Thank You For Signing Up!</h1>
    </header>
    <main>
        <h2>You have entered the following information:</h2>
        <p>Name: <?php echo "$name" ?></p>
        <p>Email: <?php echo "$email" ?></p>
        <p>Phone: <?php echo "$phone" ?></p>
        <p>How you heard about us: <?php echo "$heard" ?></p>
        <p>Comments: <?php echo "$comments" ?></p>
    </main>


</body>


</html>
