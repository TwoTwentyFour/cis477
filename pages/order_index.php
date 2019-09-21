<?php 
require '../database.connection.php';

$sql = "SELECT * FROM orderIndex WHERE order_id = " . $order_id . ";";

if ($result = mysqli_query($connection, $sql))
{
    while ($row = mysqli_fetch_assoc($result))
    {
        switch ($row['product_id'])
        {
            case 1:
                // These should all be forms, use hidden input and
                // view_product.php as the action.
                echo "Kong Classic <br>";
                break;
            case 2:
                echo "Kong Large <br>";
                break;
            case 3:
                echo "Kong Medium <br>";
                break;
            case 4:
                echo "Kong Small <br>";
                break;
            case 5:
                echo "Kong Extreme <br>";
                break;
            case 6:
                echo "Dog Treats <br>";
                break;
            case 7:
                echo "Dog Leash <br>";
                break;
            case 8:
                echo "Dog Whistle <br>";
                break;
            case 9:
                echo "Dog Collar <br>";
                break;
        }
    }
}
else
{
    echo 'Error: Could not execute SQL statment.';
}


