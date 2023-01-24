<div class="course-cont">
    <div class="course-cont__row">
        <h1>Course List</h1>
        <a href="../pages/addCourse.php">
            <button class="course-cont__btn">Add Course</button>
        </a>
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
      <th class="course-cont__th">Edit</th>
      <th class="course-cont__th">Delete</th>
    </tr>
    <?php
      require "../includes/fetchCourses.inc.php";
      require '../includes/dbh.inc.php';
      
      $rows = getCourses($conn);

      foreach ($rows as $row) {
        $studentsCount = numberOfEnrolledStudents($row['enrolled']);
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
                <td class='course-cont__td course-cont__table-edit'><a href='../pages/editCourse.php?course_code=".$row["course_code"]."'>Edit</a></td>
                <td>
                <form action='../includes/deleteCourse.inc.php?course_code=".$row['course_code']."' method='POST'>
                  <input class='course-cont__td course-cont__table-delete' type='submit' value='Delete'>
                </form>
                </td>
              </tr>";
      }
    ?>
  </table>
</div>