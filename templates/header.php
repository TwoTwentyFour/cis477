<?php session_start(); ?>

<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>Paws R Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css" type="text/css">
</head>
<body>
    <div class="container"><!-- div ended in footer -->
         <!-- A grey horizontal navbar that becomes vertical on small screens -->
        <nav style="background: #2375f0;" class="navbar navbar-expand-sm">
          <!-- Links -->
          <img class="navbar-brand" src="./images/v2_paw_logo.png" alt="Logo!" onerror="this.onerror=null; this.src='../images/v2_paw_logo.png'">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a style="color: white;" class="nav-link" href="./">Home</a>
            </li>
          </ul>
          <?php
              if (isset($_SESSION['user_email']))
              {
                 echo ('
                    <form action="../logout.php" method="post">
                        <div class="navbar navbar-right">
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </div>
                    </form>
                ');
               }
          ?>
        </nav> 
