<?php 
require '../templates/header.php';
require '../database.connection.php';

$sql = "SELECT * FROM products;";

if ($result = mysqli_query($connection, $sql))
{
    while ($row = mysqli_fetch_assoc($result))
    {
        echo $row['product_name'] . '&nbsp;';
        echo $row['product_description'] . '&nbsp;';
        echo '$' . $row['product_price'] . '<br>';
    }
}
else
{
    echo 'Error: Could not execute SQL statment.';
}


require '../templates/footer.php';
?>
