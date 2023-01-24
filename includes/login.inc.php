<?php 

if(isset($_POST['login-submit'])){
    require 'dbh.inc.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        header("Location: ../auth/login.php?error=emptyFieldsError");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../auth/login.php?error=sqlError");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdcheck = password_verify($password, $row['pwd']);
                if($pwdcheck == false){
                    header("Location: ../auth/login.php?error=nouser");
                    exit();
                }
                elseif ($pwdcheck == true) {
                    session_start();
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['userType'] = $row['userType'];
                    header("Location: ../auth/login.php?login=success");
                    exit();
                }
            }
            else {
                header("Location: ../auth/login.php?error=nouser");
                exit();
            }
        }

    }
}
else{
    header("Location: ../auth/login.php");
    exit();
}

?>