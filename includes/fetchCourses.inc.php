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
    return count($student_list);
}
?>