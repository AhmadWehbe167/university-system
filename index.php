<?php 
    require "components/header.php";
?>

<main>
    <?php 
    if(isset($_SESSION['email'])) {
        header("Location: ./pages/main.php");
    }
    else{
        header("Location: ./auth/login.php");
    }
    ?>
</main>

<?php 
    require "footer.php"
?>