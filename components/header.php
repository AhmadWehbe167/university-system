<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="../styles/auth.css">
    <title></title>
</head>
<body>
<header>
    <form class='logout-form' action='../includes/logout.inc.php' method='post'>
        <span>University</span>
        <?php
        if(isset($_SESSION["email"])){
            echo "<button class='logout-btn' type='submit' name='logout-submit'> Logout </button>";
        }
        ?>
    </form>
</header>