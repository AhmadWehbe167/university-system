<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="../styles/styles.css">
    <title></title>
</head>
<body>
<header>
    <form class='logout-form' action='../includes/logout.inc.php' method='post'>
        <a class="title-link" href="../index.php">
            University
        </a>
        <?php
        if(isset($_SESSION["email"])){
            echo "<button class='logout-btn' type='submit' name='logout-submit'> Logout </button>";
        }
        ?>
    </form>
</header>