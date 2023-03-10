<?php 
    require "../components/header.php"
?>

<main>
    <h1 class='main-title'>Sign Up</h1>
    <?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyfields"){
            echo "<p class='error-field'>All fields are required!</p>";
        }
        elseif($_GET["error"] == "invalidemail"){
            echo "<p class='error-field'>Invalid email!</p>";
        }
        elseif($_GET["error"] == "invalidname"){
            echo "<p class='error-field'>Invalid name!</p>";
        }
        elseif($_GET["error"] == "emailTaken"){
            echo "<p class='error-field'>Email Already in use!</p>";
        }
        elseif($_GET["error"] == "sqlerror"){
            echo "<p class='error-field'>Internal server error!</p>";
        }
    }

    if(isset($_SESSION['email'])){
        header("Location: ../pages/main.php");
    } else {
        $name = isset($_GET["name"]) ? $_GET["name"] : "";
        $email = isset($_GET["email"]) ? $_GET["email"] : "";

        echo "<form class='form' action='../includes/signup.inc.php' method='post'>
                <label class='form__label'>Name</label>
                <input class='form__input' type='text' name='name' placeholder='name' value='".$name."'>
                <label class='form__label'>Email</label>
                <input class='form__input' type='email' name='email' placeholder='email' value='".$email."'>
                <label class='form__label'>Password</label>
                <input class='form__input' type='password' name='password' value='' placeholder='password'>
                <label class='form__label'>User Type</label>
                <select class='form__select' name='userType' id='userType' placeholder='userType'>
                    <option value='student'>student</option>
                    <option value='instructor'>instructor</option>
                    <option value='employee'>employee</option>
                </select>
                <button class='form__btn' type='submit' name='signup-submit'>Signup</button>
                <p class='form__p'>or</p>
                <a class='form__a' href='login.php'>Signin</a>
            </form>";
        }
    ?>
</main>