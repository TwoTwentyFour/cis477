<?php 
require '../templates/header.php';
require '../database.connection.php';

if (isset($_POST['create_order_submit']))
{
    // need to loop through the $_POST['selected_items'] array and tally up the price
    $order_total = 0;
    foreach ($_POST['selected_items'] as $item)
    {
        if ($item == 1)
        {
            $order_total += 12;  
        }
        else if ($item == 2)
        {
            $order_total += 16; 
        }
        else if ($item == 3)
        {
            $order_total += 14; 
        }
        else if ($item == 4)
        {
            $order_total += 8; 
        }
        else if ($item == 5)
        {
            $order_total += 13; 
        }
        else if ($item == 6)
        {
            $order_total += 8; 
        }
        else if ($item == 7)
        {
            $order_total += 6; 
        }
        else if ($item == 8)
        {
            $order_total += 3; 
        }
        else
        {
            $order_total += 5; 
        }
    }

    

    // first we create the order
    $sql = "INSERT INTO orders (order_date, order_price, user_id) VALUES ('" . date("Y-m-d") . "' , '" . $order_total . "', " . $_SESSION['user_id']. ");";
    mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection) > 0)
    {
        // than we grab the id for the order we just created
        $order_id = mysqli_insert_id($connection); 

        // and than create the orderIndex
        foreach ($_POST['selected_items'] as $item)
        {
            $sql = "INSERT INTO orderIndex (product_id, order_id) VALUES ('" . $item . "', '" . $order_id . "')";
            mysqli_query($connection, $sql);
            header('Location: ./');
        }
    }
    else
    {
        echo '<p style="color: tomato;">Error: There was a problem with the database.</p>';
    }

}
else
{
    $sql = "SELECT * FROM products;";
    if ($result = mysqli_query($connection, $sql))
    {
        echo '<form action="create_order.php" method="post"  onsubmit="return confirm(\'Are you sure you want to submit this order?\');">';
        while ($row = mysqli_fetch_assoc($result))
        {
            echo '<input type="checkbox" name="selected_items[]" value="' . $row['product_id'] . '">';
            echo $row['product_name'];
            echo ' -- $' . $row['product_price'];
            echo '<br>';
        }
        echo '<button class="btn btn-success" type="submit" name="create_order_submit">Submit Order</button>';
        echo '</form>';
    }
    else
    {
        echo '<p style="color: tomato;"></p>Error: Could not connect to the database.';
    }
}

require '../templates/footer.html';
?>
