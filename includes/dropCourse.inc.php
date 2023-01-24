<?php

if (isset($_POST['drop-submit'])){
    require "./dbh.inc.php";
    require "./fetchCourses.inc.php";

    $course_code = $_POST['course_code'];
    $user_email = $_POST['user_email'];

    $course = getCourseByCode($course_code, $conn);
    $enrolled = $course["enrolled"];

    if(!userIsEnrolled($user_email, $enrolled)){
        header("Location: ../pages/main.php?error=userNotEnrolled");
        exit();
    }

    $user_email = $user_email . ",";
    $enrolled = removeUser($user_email, $enrolled);

    $sql = "UPDATE courses
            SET enrolled=?
            WHERE course_code =?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../pages/main.php?error=sqlError");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "ss", $enrolled, $course_code);
        mysqli_stmt_execute($stmt);
        header("Location: ../pages/main.php");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../index.php");
    exit();
}

?>