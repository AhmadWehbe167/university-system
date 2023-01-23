<div class="employee-container">
    <div class="employee-container__row">
        <h1>Course List</h1>
        <a href="../pages/addCourse.php">
            <button class="employee-container__btn">Add Course</button>
        </a>
    </div>
  <table class="employee-container__table">
    <tr class="employee-container__tr">
      <th class="employee-container__th">Course Code</th>
      <th class="employee-container__th">Course Name</th>
      <th class="employee-container__th">Course Desc</th>
      <th class="employee-container__th">Credit Hours</th>
      <th class="employee-container__th">Instructor</th>
      <th class="employee-container__th">Times</th>
      <th class="employee-container__th">Enrolled</th>
      <th class="employee-container__th">Department</th>
      <th class="employee-container__th">Level</th>
      <th class="employee-container__th">Term</th>
      <th class="employee-container__th">Prereq</th>
      <th class="employee-container__th">Edit</th>
      <th class="employee-container__th">Delete</th>
    </tr>
    <?php
      require "../includes/fetchCourses.inc.php";
      require '../includes/dbh.inc.php';
      
      $rows = getCourses($conn);

      foreach ($rows as $row) {
        $studentsCount = numberOfEnrolledStudents($row['enrolled']);
        echo "<tr class='employee-container__tr'>
                <td class='employee-container__td'>".$row['course_code']."</td>
                <td class='employee-container__td'>".$row['course_name']."</td>
                <td class='employee-container__td'>".$row['course_description']."</td>
                <td class='employee-container__td'>".$row['credit_hours']."</td>
                <td class='employee-container__td'>".$row['instructor_email']."</td>
                <td class='employee-container__td'>".$row['meeting_times']."</td>
                <td class='employee-container__td'>".$studentsCount."</td>
                <td class='employee-container__td'>".$row['department']."</td>
                <td class='employee-container__td'>".$row['level']."</td>
                <td class='employee-container__td'>".$row['term']."</td>
                <td class='employee-container__td'>".$row['prerequisite']."</td>
                <td class='employee-container__td employee-container__table-edit'><a href='../pages/editCourse.php?course_code=".$row["course_code"]."'>Edit</a></td>
                <td>
                <form action='../includes/deleteCourse.inc.php?course_code=".$row['course_code']."' method='POST'>
                  <input class='employee-container__td employee-container__table-delete' type='submit' value='Delete'>
                </form>
                </td>
              </tr>";
      }
    ?>
  </table>
</div>