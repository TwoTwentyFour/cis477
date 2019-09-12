<?php  

if (isset($_POST['login-submit']))
{
    require 'database.connection.php';

    $user_email = $_POST['mail'];
    $user_password = $_POST['pword'];

    header("Location: ./pages");
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
}

?>


<?php readfile('./templates/footer.html'); ?>


