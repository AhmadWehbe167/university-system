<?php
if (isset($_POST['course-submit'])){
    require 'dbh.inc.php';
    
    $limit = 30;

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

    function courseExists($course_code, $conn){
        $sql = "SELECT course_code FROM courses WHERE course_code=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../pages/addCourse.php?error=sqlError&typeOfError=courseExists");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $course_code);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id);
            if(mysqli_stmt_fetch($stmt)){
                return true;
            }
            else{
                return false;
            }
        }
    }


    if(empty($course_code) || empty($course_name) ||  empty($course_description) || empty($credit_hours) || empty($instructor_email)){
        header("Location: ../pages/addCourse.php?error=emptyfields&course_code=".$course_code."&course_name=".$course_name."&course_description=".$course_description."&credit_hours=".$credit_hours."&instructor_email=".$instructor_email."&meeting_times=".$meeting_times."&department=".$department."&level=".$level."&term=".$term."&prerequisite=".$prerequisite);
        exit();
    }

    elseif (!preg_match("/[A-Z][A-Z][A-Z][A-Z]-[0-9][0-9][0-9]/", $course_code)) {
        header("Location: ../pages/addCourse.php?error=invalidCourseCode&course_name=".$course_name."&course_description=".$course_description."&credit_hours=".$credit_hours."&instructor_email=".$instructor_email."&meeting_times=".$meeting_times."&department=".$department."&level=".$level."&term=".$term."&prerequisite=".$prerequisite);
        exit();
    }

    elseif(courseExists($course_code, $conn)){
        header("Location: ../pages/addCourse.php?error=courseExists&course_name=".$course_name."&course_description=".$course_description."&credit_hours=".$credit_hours."&meeting_times=".$meeting_times."&department=".$department."&level=".$level."&term=".$term."&prerequisite=".$prerequisite);
        exit();
    }
    else {
        $sql = "INSERT INTO courses (course_code, course_name, course_description, credit_hours, instructor_email, meeting_times, department, level, term, prerequisite, enrolled) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../pages/addCourse.php?error=sqlError");
            exit();
        }
        else{
            $enrolled = "";
            mysqli_stmt_bind_param($stmt, "sssisssssss",$course_code, $course_name, $course_description, $credit_hours, $instructor_email, $meeting_times, $department, $level, $term, $prerequisite, $enrolled);
            mysqli_stmt_execute($stmt);
            header("Location: ../pages/main.php");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
} else {
    header("Location: ../pages/addCourse.php");
    exit();
}

?>