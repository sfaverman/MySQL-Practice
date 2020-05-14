<?php
    $msg = '';
    $name = '';
    // method 1 to check if form submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
    }
    // method 2 to check if form submitted
    if (isset($_POST['submitted']) {
        $name = $_POST['name'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form processing with PHP</title>
</head>
<body>

   <!-- IF ACTION EMPTY, POSTS TO THE SAME PAGE ,
BUT NOT PROFESSIONAL
<form action="POST" ACTION=""></form>    -->

<form method="post"

    action="<?php echo htmlspecialschars($_SERVER["PHP_SELF"]); ?>"></form>
    <input type="text" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="submitted" value="true">
<p> <?php echo $msg ?></p>

</body>
</html>


