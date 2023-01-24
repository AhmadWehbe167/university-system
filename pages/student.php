<div class="course-cont">
    <div class="course-cont__row">
        <h1>Course List</h1>
    </div>
  <table class="course-cont__table">
    <tr class="course-cont__tr">
      <th class="course-cont__th">Course Code</th>
      <th class="course-cont__th">Course Name</th>
      <th class="course-cont__th">Course Desc</th>
      <th class="course-cont__th">Credit Hours</th>
      <th class="course-cont__th">Instructor</th>
      <th class="course-cont__th">Times</th>
      <th class="course-cont__th">Enrolled</th>
      <th class="course-cont__th">Department</th>
      <th class="course-cont__th">Level</th>
      <th class="course-cont__th">Term</th>
      <th class="course-cont__th">Prereq</th>
      <th class="course-cont__th">Register</th>
      <th class="course-cont__th">Drop</th>
    </tr>
    <?php
      require "../includes/fetchCourses.inc.php";
      require '../includes/dbh.inc.php';
      
      $rows = getCourses($conn);

      foreach ($rows as $row) {
        $studentsCount = numberOfEnrolledStudents($row['enrolled']);
        $registered = userIsEnrolled($_SESSION['email'], $row['enrolled']);
        $course_full = $studentsCount >= 30;
    
        echo "<tr class='course-cont__tr'>
                <td class='course-cont__td'>".$row['course_code']."</td>
                <td class='course-cont__td'>".$row['course_name']."</td>
                <td class='course-cont__td'>".$row['course_description']."</td>
                <td class='course-cont__td'>".$row['credit_hours']."</td>
                <td class='course-cont__td'>".$row['instructor_email']."</td>
                <td class='course-cont__td'>".$row['meeting_times']."</td>
                <td class='course-cont__td'>".$studentsCount."</td>
                <td class='course-cont__td'>".$row['department']."</td>
                <td class='course-cont__td'>".$row['level']."</td>
                <td class='course-cont__td'>".$row['term']."</td>
                <td class='course-cont__td'>".$row['prerequisite']."</td>

                <td>
                    <form action='../includes/registerCourse.inc.php' method='POST'>
                        <input type='hidden' name='course_code' value=".$row['course_code'].">
                        <input type='hidden' name='user_email' value=".$_SESSION['email'].">
                        <input class='course-cont__td course-cont__table-register " . disabled($registered, $course_full) . "' type='submit' value='Register' name='register-submit' " . disabled($registered, $course_full) . " >
                    </form>
                </td>
                <td>
                    <form action='../includes/dropCourse.inc.php' method='POST'>
                        <input type='hidden' name='course_code' value=".$row['course_code'].">
                        <input type='hidden' name='user_email' value=".$_SESSION['email'].">    
                        <input class='course-cont__td course-cont__table-drop " . disabled(!$registered, false) . " ' type='submit' value='Drop' name='drop-submit' " . disabled(!$registered, false) . ">
                    </form>
                </td>
              </tr>";
      }
    ?>
  </table>
</div>