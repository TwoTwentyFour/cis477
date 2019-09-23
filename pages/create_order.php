<?php
require '../templates/header.php';

require '../database.connection.php';

echo ('Please select a product you wish to add to the order: ');
$sql = "SELECT * FROM products;";

echo('<form action="confirm_order.php" method="post">');
echo 'Please select all products you wish to add to the order: <br>';
if ($result = mysqli_query($connection, $sql))
{
    while ($row = mysqli_fetch_assoc($result))
    {
        echo (' <input type="checkbox" name="order_product" value="
              ' . $row['product_id'] . '"/>' . $row['product_name'] . "<br>");
    }
    echo ('<button class="btn btn-success" type="submit" name="order_submit">
            Submit Order</button>');
    echo "</form>";
}
else
{
    echo 'Error: Could not execute SQL statment.';
}


require '../templates/footer.html';
?>



