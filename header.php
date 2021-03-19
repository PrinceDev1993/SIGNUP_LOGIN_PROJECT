<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Okay</title>
</head>
<body>

    <!-- THE HEADER -->

    <nav class="navbar">
        <!-- <a href="#" class="navbar-brand"><span>W</span>eb<span>D</span>ev</a> -->
        <a href="#" class="navbar-brand"><img src="logo.png" style="width: 60px; vertical-align:middle" alt=""></a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">About</a></li>
            <?php 
                if (isset($_SESSION["useruid"])) {
                    echo "<li><a href='profile.php'>Profile</a></li>";
                    echo "<li><a href='contact.php'>Contact</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
                } else {
                    echo "<li><a href='signup.php'>Sign up</a></li>";
                    echo "<li><a href='login.php'>Login</a></li>";
                }
            ?>
        </ul>
        <button class="navbar-toggler">
            <span></span>
        </button>
    </nav>
    

   