<?php  

/** Just checking to see if the submit button has been pressed.**/
if (isset($_POST['login-submit']))
{
    require 'database.connection.php';

    /** Storing the users input from the form
        below into PHP variables. **/
    $user_email = $_POST['mail'];
    $user_password = $_POST['pword'];

    /** Writing an SQL statement and sending
        it off to the database. **/
    // TODO: SQL Injection Warning! Change to a prepared statment!!!
    $sql = "SELECT * FROM users WHERE user_email = '" . $user_email . "' AND user_password = '" . SHA1($user_password) . "';";

    if ($results = mysqli_query($connection, $sql))
    {
        if ($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
        {
            header("Location: ./pages");
        }
        else 
        {
            readfile('./templates/header.html');
            echo ("<small class=\"todo\">Seems like either your use name or password is incorrect.<br>Please try again.</small>");
            readfile('./templates/footer.html');
        }
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
    /** If the Submit button hasn't been hit yet,
        we'll serve the following HTML. **/ 
    readfile('./templates/header.html');

    echo ('
        <form action="login.php" method="post">
            <input type="email" name="mail" placeholder="Email" required="required">
            <input type="password" name="pword" placeholder="Password" required="required">
            <button class="btn btn-success" type="submit" name="login-submit">Login</button>
        </form>
    ');
    
    readfile('./templates/footer.html');
}

?>


<?php  ?>


