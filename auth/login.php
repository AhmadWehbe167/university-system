<?php 
    require "../components/header.php"
?>

<h1 class="main-title">Sign In</h1>
<?php
if(isset($_GET['error'])){
    if($_GET['error'] == "emptyFieldsError"){
        echo "<p class='error-field'>Email and password are both required!</p>";
    }
    elseif($_GET['error'] =="nouser"){
        echo "<p class='error-field'>no account with this email!</p>";
    } 
    elseif ($_GET['error'] == "sqlError"){
        echo "<p class='error-field'>Internal Server Error!</p>";
    }
}

if(isset($_SESSION['email'])){
    header("Location: ../pages/main.php");
} else {
    echo "<form class='form' action='../includes/login.inc.php' method='post'>
        <label class='form__label'>Email</label>
        <input class='form__input' type='email' name='email' value='' placeholder='email'>
        <label class='form__label'>Password</label>
        <input class='form__input' type='password' name='password' value='' placeholder='password'>
        <button class='form__btn' type='submit' name='login-submit'>Login</button>
        <p class='form__p'>or</p>
        <a class='form__a' href='signup.php'>Signup</a>
    </form>";
}
?>