<?php
if (isset($_POST['signup-submit'])){
    require 'dbh.inc.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType= $_POST['userType'];

    if(empty($name) || empty($email) || empty($password) || empty($userType) ){
        header("Location: ../auth/signup.php?error=emptyfields&name=".$name."&email=".$email."&userType=".$userType);
        exit();
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../auth/signup.php?error=invalidemail&name=".$name."&userType=".$userType);
        exit();
    }

    elseif(!preg_match("/^[a-zA-Z0-9 ]*$/", $name)){
        header("Location: ../auth/signup.php?error=invalidname&email=".$email."&userType=".$userType);
        exit();
}
    else{
        $sql = "SELECT id FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../auth/signup.php?error=sqlError");
            exit();
        } 
        else {
            mysqli_stmt_bind_param($stmt, "s", $email); // "s" we are passing a string
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt); //check number of rows in the result
            if($resultCheck > 0){
                header("Location: ../auth/signup.php?error=emailTaken&email=".$email."&userType=".$userType);
                exit();        
            }else {
                $sql = "INSERT INTO users (name, email, pwd, userType) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../auth/signup.php?error=sqlError");
                    exit();
                }
                else{
                    $hashpwd =password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssss",$name, $email, $hashpwd, $userType);
                    mysqli_stmt_execute($stmt);
                    session_start();
                    $_SESSION['email'] = $email;
                    header("Location: ../auth/signup.php?signup=success");
                    exit();
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
    }
} else {
    header("Location: ../auth/signup.php");
    exit();
}

?>