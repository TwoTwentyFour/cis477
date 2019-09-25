<?php 
if (isset($_POST['register-submit']))
{
    require 'database.connection.php';

    $user_email = $_POST['mail'];
    $user_password = $_POST['pword'];
    $password_check = $_POST['pword-check'];

    if ($user_password == $password_check)
    {
        $sql = "INSERT INTO users (user_email, user_password) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($connection);
        if (mysqli_stmt_prepare($stmt, $sql))
        {
            mysqli_stmt_bind_param($stmt, "ss", $user_email, SHA1($user_password));
            if (mysqli_stmt_execute($stmt))
            {
                if (mysqli_affected_rows($connection) > 0)
                {
                    mysqli_close($connectoin);
                    session_start();
                    $_SESSION['user_email'] = $user_email;
                    $_SESSION['user_id'] = $user_id;
                    header("Location: ./pages/");
                }
                else
                {
                    echo("Error: Could not update the database.");
                }
            }
        }
    }
    else
    {
        /*
        require('./templates/header.php');
        echo ("<small class=\"todo\">Both password entries must match.<br>Please try again.</small>");
        readfile('./templates/footer.html');
         */
        require('./templates/header.php');
        echo '<h4 style="color: tomato;">Both passwords must match!</h4>';
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
}
else
{
    require('./templates/header.php');

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




