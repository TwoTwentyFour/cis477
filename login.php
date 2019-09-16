<?php  

if (isset($_POST['login-submit']))
{
    require 'database.connection.php';

    $user_email = $_POST['mail'];
    $user_password = $_POST['pword'];

    $sql = "SELECT * FROM users WHERE user_email = ? AND user_password = ?";
    $stmt = mysqli_stmt_init($connection);
    if (mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "ss", $user_email, SHA1($user_password));
        if (mysqli_stmt_execute($stmt))
        {
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result))
            {
                mysqli_close($connection);
                // TODO: Session stuff is going to happen right here. 
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
            echo "Error in SQL statment execution.";
        }
    }
    else
    {
        echo "Error: " . mysqli_errno();
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





