<div class="course-cont">
  <h1>Course List</h1>
  <table class="course-cont__table">
    <tr class="course-cont__tr">
      <th class="course-cont__th">Course Code</th>
      <th class="course-cont__th">Course Name</th>
      <th class="course-cont__th">Course Desc</th>
      <th class="course-cont__th">Credit Hours</th>
      <th class="course-cont__th">Times</th>
      <th class="course-cont__th">Enrolled</th>
      <th class="course-cont__th">Department</th>
      <th class="course-cont__th">Level</th>
      <th class="course-cont__th">Term</th>
      <th class="course-cont__th">Prereq</th>
      <th class="course-cont__th">Students</th>
    </tr>
    <?php
      require "../includes/fetchCourses.inc.php";
      require '../includes/dbh.inc.php';
      
      $rows = getCourses($conn);
      $filtered_courses = array_filter($rows, function($course) {
        return $course['instructor_email'] == $_SESSION["email"];
      });

      foreach ($filtered_courses as $row) {
        $studentsCount = numberOfEnrolledStudents($row['enrolled']);
        $enrolled = str_replace(",", "\n", $row['enrolled']);
        echo "<tr class='course-cont__tr'>
                <td class='course-cont__td'>".$row['course_code']."</td>
                <td class='course-cont__td'>".$row['course_name']."</td>
                <td class='course-cont__td'>".$row['course_description']."</td>
                <td class='course-cont__td'>".$row['credit_hours']."</td>
                <td class='course-cont__td'>".$row['meeting_times']."</td>
                <td class='course-cont__td'>".$studentsCount."</td>
                <td class='course-cont__td'>".$row['department']."</td>
                <td class='course-cont__td'>".$row['level']."</td>
                <td class='course-cont__td'>".$row['term']."</td>
                <td class='course-cont__td'>".$row['prerequisite']."</td>
                <td class='course-cont__td'>
                    <div class='course-container'>" . $enrolled . "</div>
                </td>
              </tr>";
      }
    ?>
  </table>
</div>