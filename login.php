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
                // Added the session stuff here.
                session_start();
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['user_id'] = $row['user_id'];
                header("Location: ./pages");
            }
            else
            {
                require('./templates/header.php');
                echo ("<small class=\"todo\">Seems like either your use name or password is incorrect.<br>Please try again.</small>");
                require('./templates/footer.html');
            }
        }
        else
        {
            require('./templates/header.php');
            echo "Error in SQL statment execution.";
            require('./templates/footer.html');
        }
    }
    else
    {
        require('./templates/header.php');
        echo "Error: " . mysqli_errno();
        require('./templates/footer.php');
    }
}
else
{
    require('./templates/header.php');

    echo ('
        <form action="login.php" method="post">
            <input type="email" name="mail" placeholder="Email" required="required">
            <input type="password" name="pword" placeholder="Password" required="required">
            <button class="btn btn-success" type="submit" name="login-submit">Login</button>
        </form>
    ');
    
    readfile('./templates/footer.html');
}





