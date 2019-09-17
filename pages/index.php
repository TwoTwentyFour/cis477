<?php require('../templates/header.php'); ?>

<div class="container">
<h3>
    <?php 
        echo "Welcome, ". $_SESSION['user_email'] . "!";
    ?>
</h3>
<h5>You'll see all of your orders listed below.</h5>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Order Number</th>
        <th>Date Ordered</th>
        <th>Status</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href="read_order.php">1</a></td>
        <td>4/9/2019</td>
        <td>Sent</td>
        <td style="float: right;"><a href="update_order.php">Edit</a></td>
        <td style="float: right;"><a href="delete_order.php">Delete</a></td>
      </tr>
      <tr>
        <td><a href="read_order.php">2</a></td>
        <td>6/12/2019</td>
        <td>Sent</td>
        <td style="float: right;"><a href="update_order.php">Edit</a></td>
        <td style="float: right;"><a href="delete_order.php">Delete</a></td>
      </tr>
      <tr>
        <td><a href="read_order.php">3</a></td>
        <td>9/9/2019</td>
        <td style="color: tomato;">Pending!</td>
        <td style="float: right;"><a href="update_order.php">Edit</a></td>
        <td style="float: right;"><a href="delete_order.php">Delete</a></td>
      </tr>
    </tbody>
  </table>
</div>
   
<form action="create_order.php" method="post">
   <div class="container">
    <button style="float: right; padding: 2px;" type="submit" class="btn btn-primary">Create Order</button>
   </div>
</form>
<?php readfile('../templates/footer.html'); ?>
