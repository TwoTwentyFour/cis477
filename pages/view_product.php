<?php 
require '../templates/header.php';
require '../database.connection.php';

if (isset($_POST['view_product_submit']))
{
    $sql = "SELECT * FROM products WHERE product_id = " . $_POST['product_id'] . ";";

    if ($result = mysqli_query($connection, $sql))
    {
        $row = mysqli_fetch_assoc($result);
        echo $row['product_name'] . '<br>';
        echo $row['product_description'] . '<br>';
        echo '$' . $row['product_price'] . '<br>';

    }
    else
    {
        echo 'Error: Could not execute SQL statment.';
    }
}

require '../templates/footer.html';

?>
