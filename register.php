<?php 

/** Just checking to see if the submit button has been pressed.**/
if (isset($_POST['register-submit']))
{
    require 'database.connection.php';

    /** Storing the users input from the form
        below into PHP variables. **/
    $user_email = $_POST['mail'];
    $user_password = $_POST['pword'];
    $password_check = $_POST['pword-check'];

    if ($user_password == $password_check)
    {
        $protected_password = SHA1($user_password);
        /** Writing an SQL statement and sending
            it off to the database. **/
        // TODO: SQL Injection Warning! Change to a prepared statment!!!
        $sql = "INSERT INTO users (user_email, user_password) VALUES ('$user_email', '$protected_password');"; 
        if (mysqli_query($connection, $sql))
        {
            header("Location: ./pages/");
        }
        else
        {
             readfile('./templates/header.html');
             echo("Error: " . mysqli_error($connection));
             readfile('./templates/footer.html');
        }
    }
    else
    {
        readfile('./templates/header.html');
        echo ("<small class=\"todo\">Both password entries must match.<br>Please try again.</small>");
        readfile('./templates/footer.html');
    }
}
else
{
    /** If the Submit button hasn't been hit yet,
        we'll serve the following HTML. **/ 
    readfile('./templates/header.html');

    echo ('
        <form action="register.php" method="post">
            <input type="email" name="mail" placeholder="Email" required="requiered">
            <input type="password" name="pword" placeholder="Password" required="required">
            <input type="password" name="pword-check" placeholder="Re-Type Password" required="required">
            <button class="btn btn-success" name="register-submit" type="submit">Register</button>
        </form>
    ');

    readfile('./templates/footer.html');
}

?>


