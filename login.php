<?php  

if (isset($_POST['login-submit']))
{
    require 'database.connection.php';

    $user_email = $_POST['mail'];
    $user_password = $_POST['pword'];
    $sql = "SELECT * FROM users WHERE user_email = '" . $user_emailha . "' AND user_password = '" . SHA1($user_password) . "';";

    if (mysqli_query($connection, $sql))
    {
        echo("<h4 class=\"todo\">Fifth Check</h4>");
        header("Location: ./pages");
    }
    else
    {
        echo("Error: " . mysqli_error($connection));
    }

}
else
{
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


