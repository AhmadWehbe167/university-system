<?php
if (isset($_POST['course-edit-submit'])){
    require 'dbh.inc.php';
    
    $course_code = $_POST['course-code'];
    $course_name = $_POST['course-name'];
    $course_description = $_POST['course-description'];
    $credit_hours = $_POST['credit-hours'];
    $instructor_email = $_POST['instructor-email'];
    $meeting_times = $_POST['meeting-times'];
    $department = $_POST['department'];
    $level = $_POST['level'];
    $term = $_POST['term'];
    $prerequisite = $_POST['prerequisite'];

    if(empty($course_code) || empty($course_name) ||  empty($course_description) || empty($credit_hours) || empty($instructor_email)){
        header("Location: ../pages/editCourse.php?error=emptyfields&course_code=".$course_code."&course_name=".$course_name."&course_description=".$course_description."&credit_hours=".$credit_hours."&instructor_email=".$instructor_email."&meeting_times=".$meeting_times."&department=".$department."&level=".$level."&term=".$term."&prerequisite=".$prerequisite);
        exit();
    }

    else {
        $sql = "UPDATE courses 
                SET course_name=?, course_description=?, credit_hours=?, instructor_email=?, meeting_times=?, department=?, level=?, term=?, prerequisite=?
                WHERE course_code =?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../pages/editCourse.php?error=sqlError");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ssisssssss", $course_name, $course_description, $credit_hours, $instructor_email, $meeting_times, $department, $level, $term, $prerequisite, $course_code);
            mysqli_stmt_execute($stmt);
            header("Location: ../pages/main.php");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
} else {
    header("Location: ../pages/editCourse.php");
    exit();
}

?>