<?php

function getCourses($conn){
    $sql = "SELECT * FROM courses";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?error=sqlError");
        exit();
    }
    else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $rows;
    }
}

function numberOfEnrolledStudents($students) {
    $student_list = explode(",", $students);
    return count($student_list) - 1;
}

function getCourseByCode($course_code, $conn){
    $sql = "SELECT * FROM courses WHERE course_code=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?error=sqlError");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $course_code);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }else{
            return "";
        }
    }
}

function userIsEnrolled($user, $enrolled){
    return strpos($enrolled, $user) !== false;
}

function disabled($registered, $course_full){
    if($registered || $course_full) return "disabled";
}

function removeUser($user, $enrolled_users){
    $updated_enrolled_users = str_replace($user, "", $enrolled_users);
    return $updated_enrolled_users;
}

?>