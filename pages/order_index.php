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
                echo '<form action="view_product.php" method="post">
                    <input type="hidden" name="product_id" value="1">
                    <button class="btn" type="submit" name="view_product_submit">Kong Classic</button>                    
                </form>';
                break;
            case 2:
                echo '<form action="view_product.php" method="post">
                    <input type="hidden" name="product_id" value="2">
                    <button class="btn" type="submit" name="view_product_submit">Kong Large</button>                    
                </form>';
                break;
            case 3:
                echo '<form action="view_product.php" method="post">
                    <input type="hidden" name="product_id" value="3">
                    <button class="btn" type="submit" name="view_product_submit">Kong Medium</button>                    
                </form>';
                break;
            case 4:
                echo '<form action="view_product.php" method="post">
                    <input type="hidden" name="product_id" value="4">
                    <button class="btn" type="submit" name="view_product_submit">Kong Small</button>                    
                </form>';
                break;
            case 5:
                echo '<form action="view_product.php" method="post">
                    <input type="hidden" name="product_id" value="5">
                    <button class="btn" type="submit" name="view_product_submit">Kong Extreme</button>                    
                </form>';
                break;
            case 6:
                echo "Dog Treats <br>";
                echo '<form action="view_product.php" method="post">
                    <input type="hidden" name="product_id" value="6">
                    <button class="btn" type="submit" name="view_product_submit">Dog Treats</button>                    
                </form>';
                break;
            case 7:
                echo '<form action="view_product.php" method="post">
                    <input type="hidden" name="product_id" value="7">
                    <button class="btn" type="submit" name="view_product_submit">Dog Leash</button>                    
                </form>';
                break;
            case 8:
                 echo '<form action="view_product.php" method="post">
                    <input type="hidden" name="product_id" value="8">
                    <button class="btn" type="submit" name="view_product_submit">Dog Whistle</button>                    
                 </form>';
                break;
            case 9:
                  echo '<form action="view_product.php" method="post">
                    <input type="hidden" name="product_id" value="9">
                    <button class="btn" type="submit" name="view_product_submit">Dog Collar</button>                    
                  </form>';
                  break;
        }
    }
}
else
{
    echo 'Error: Could not execute SQL statment.';
}


