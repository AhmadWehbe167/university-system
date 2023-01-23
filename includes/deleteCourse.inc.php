<?php
if (isset($_GET['course_code'])){
    require 'dbh.inc.php';

    $sql = "DELETE FROM courses WHERE course_code=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?error=sqlError");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $_GET['course_code']);
        mysqli_stmt_execute($stmt);
        header("Location: ../index.php");
        exit();
    }
    
} else {
    header("Location: ../index.php");
    exit();
}

?>