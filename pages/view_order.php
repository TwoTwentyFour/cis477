<?php

require('../templates/header.php');

if (isset($_POST['view_order_submit']))
{
    require '../database.connection.php';

    $order_id = $_POST['order_id'];

    $sql = 'SELECT * FROM orders WHERE order_id = ?;';
    $stmt = mysqli_stmt_init($connection);
    if (mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "i", $order_id);

        if (mysqli_stmt_execute($stmt))
        {
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result))
            {
                echo 'Date ordered: ' . $row['order_date'] . '<br>';
                echo 'Order Total: $' . $row['order_price']. '<br>';
                echo 'User ID: ' . $row['user_id'] . '<br>';
            }
            else
            {
                require('../templates/header.php');
                echo "Seems like you don't have any orders to show.";
                require('../templates/footer.php');

            }
        }
        else
        {
            require('../templates/header.php');
            echo "Error in SQL statment execution.";
            require('../templates/footer.php');
        }
    }
    else
    {
        require('../templates/header.php');
        echo "Error: " . mysql_errno(); 
        require('../templates/footer.php');
    }
}
else
{
    echo 'Error: No submission data sent.';
}

require('../templates/footer.html');

?>


