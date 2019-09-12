<?php 

if (isset($_POST['register-submit']))
{

    require 'database.connection.php';

    $user_email = $_POST['mail'];
    $user_password = $_POST['pword'];
    $protected_password = SHA1($user_password);
    $password_check = $_POST['pword-check'];

    $sql = "INSERT INTO users (user_email, user_password) VALUES ('$user_email', '$protected_password');";
    mysqli_query($connection, $sql);

    header("Location: ./pages/index.php?register=success");

}
else
{
    readfile('./templates/header.html');

    echo ('
        <form action="register.php" method="post">
            <input type="email" name="mail" placeholder="Email" required="requiered">
            <input type="password" name="pword" placeholder="Password" required="required">
            <input type="password" name="pword-check" placeholder="Re-Type Password" required="required">
            <button class="btn btn-success" name="register-submit" type="submit">Register</button>
        </form>

    ');
}

?>

<?php readfile('./templates/footer.html'); ?>

