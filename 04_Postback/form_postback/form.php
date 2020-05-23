<?php
    //ini_set('display_errors', 1); // Let me learn from my mistakes!
    //error_reporting(E_ALL); // Show all possible problems!

    // variable to hold message
    $msg = '';

    // If form submittd, process the data.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //print_r($_POST);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $heard = $_POST['heard'];
        $comments = $_POST['comments'];

        $msg = "You entered the following information:<br>\n\r";
        $msg.= "\t\t\t Name: $name<br>\n\r";
        $msg.= "\t\t\t Email: $email<br>\n\r";
        $msg.= "\t\t\t Phone: $phone<br>\n\r";
        $msg.= "\t\t\t How you heard about us: $heard<br>\n\r";
        $msg.= "\t\t\t Comments: $comments<br>\n\r";

        //echo $msg;

    } // end of request method

?>
<!DOCTYPE html>
<!-- Sofia Faverman-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Account Sign Up</title>
    <link rel="stylesheet" href="form.css">
    <style>
    .dismsg {
        color: #f00 !important;
        }
    </style>
</head>

<body>
    <header>
        <h1>Account Sign Up</h1>
    </header>

    <main>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

            <p class="dismsg"><?php echo $msg ?></p>

            <fieldset>
                <legend>Account Information</legend>

                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="textbox" maxlength="25" required>
                <br>

                <label for="email">E-Mail:</label>
                <input type="email" name="email" id="email" class="textbox" maxlength="25" required>
                <br>

                <label for="phone">Phone Number:</label>
                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="012-345-6789" name="phone" id="phone" class="textbox" required>
            </fieldset>

            <fieldset>
                <legend>Other</legend>

                <p>How did you hear about us?</p>
                <label for="search">Search engine</label>
                <input type="radio" name="heard" id="search" value="Search Engine" required>
                <br>

                <label for="friend">Word of mouth</label>
                <input type="radio" name="heard" value="Friend" id="friend" required>
                <br>

                <label for="other">Other</label>
                <input type=radio name="heard" value="Other" id="other" required>
                <br>

                <p><label for="comments">Comments:</label></p>
                <textarea name="comments" id="comments" rows="4" cols="50" required></textarea>
            </fieldset>

            <input type="submit" value="Submit">
            <br>

            <input type="reset" value="Reset">
            <br>

        </form>
    </main>
</body>

</html>
