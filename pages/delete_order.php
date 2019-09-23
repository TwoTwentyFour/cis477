<?php

if (isset($_POST['delete_order_submit']))
{
    require '../database.connection.php';

    $sql = "DELETE FROM orders WHERE order_id = " . $_POST['order_id'] . ";";
    
    if ( mysqli_query($connection, $sql))
    {
        header("Location: ./");
    }
    else
    {
        require('../templates/header.php');
        echo "Error: " . mysqli_errno(); 
        require('../templates/footer.html');
    }
}
else
{
    require('../templates/header.php');
    echo 'Error: No submission data sent.';
    require('../templates/footer.html');
}

?>



