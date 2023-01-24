<?php
    require "../components/header.php";
?>

<?php
    if(isset($_SESSION['userType'])) {
        if($_SESSION['userType'] == "employee"){
            require("./employee.php");
        }
        elseif($_SESSION['userType'] == "instructor"){
            require("./instructor.php");
        }
        elseif($_SESSION['userType'] == "student"){
            require("./student.php");            
        }
    }
?>