<?php require('../templates/header.php'); ?>

<div class="container">
<h3>
    <?php 
        echo "Welcome, ". $_SESSION['user_email'] . "!";
    ?>
</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Order Number</th>
        <th>Date Ordered</th>
        <th>Total</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
       <?php 
            require '../database.connection.php';

            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM orders WHERE user_id = ?";
            $stmt = mysqli_stmt_init($connection);

            if (mysqli_stmt_prepare($stmt, $sql))
            {
                mysqli_stmt_bind_param($stmt, "i", $user_id);

                if (mysqli_stmt_execute($stmt))
                {
                    $result = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo ('
                          <tr>
                            <td>' . $row['order_id'] . '</td>
                            <td>' . $row['order_date'] . '</td>
                            <td>' . $row['order_price'] . '</td>
                            <td style="float: right;">
                                <form action="delete_order.php" method="post">
                                    <input type="hidden" name="order_id" value="' . $row['order_id'] .'">
                                   <button type="submit" name="delete_order_submit" class="btn">Delete</button>
                                </form>
                            </td>
                            <td style="float: right;">
                                <form action="edit_order.php" method="post">
                                    <input type="hidden" name="order_id" value="' . $row['order_id'] .'">
                                    <button type="submit" name="edit_order_submit" class="btn">Edit</button>
                                </form>
                            </td>
                            <td style="float: right;">
                                <form action="view_order.php" method="post">
                                    <input type="hidden" name="order_id" value="' . $row['order_id'] .'">
                                    <button type="submit" name="view_order_submit" class="btn">View</button>
                                </form>
                            </td>
                          </tr>
                        ');
                    }
                }
                else
                {
                        echo '<h3 style="color: tomato;">Error: Could not execute SQL statment.</h3>';
                }
            }
            else
            {
                echo '<h3 style="color: tomato;">Error: Could not connect to the databse.</h3>';
            }
      ?>
    </tbody>
  </table>
</div>
   
<form action="create_order.php" method="post">
   <div class="container">
    <button style="float: right; padding: 2px;" type="submit" class="btn btn-success">Create Order</button>
   </div>
</form>
<?php readfile('../templates/footer.html'); ?>
