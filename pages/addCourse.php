<?php
    require "../components/header.php";
?>

<?php
  if(isset($_GET["error"])){
      if($_GET["error"] == "emptyfields"){
          echo "<p class='error-field'>All fields are required!</p>";
      }
  }
?>

<form class="addCourse-form" action="../includes/addCourse.inc.php" method="POST">
  <?php 
  if(isset($_GET["error"])){
    if($_GET["error"] == "invalidCourseCode"){
          echo "<p class='error-field'>Invalid Course Code should be 4 Capital Letters followed by a dash and 3 digits!</p>";
        } elseif($_GET["error"] == "courseExists"){
          echo "<p class='error-field'>Course with this code already exists!</p>";
        }
  }
  ?>
  <label class="addCourse-form__label" for="course-code">Course code:</label>
  <input class="addCourse-form__input" type="text" id="course-code" name="course-code" placeholder="e.g. CSCI-101" value="<?php if(isset($_GET["course_code"])){echo $_GET["course_code"];}?>">

  <label class="addCourse-form__label" for="course-name">Course name:</label>
  <input class="addCourse-form__input" type="text" id="course-name" name="course-name" placeholder="e.g. Introduction to Computer Science" value="<?php if(isset($_GET["course_name"])){echo $_GET["course_name"];}?>">

  <label class="addCourse-form__label" for="course-description">Course description:</label>
  <textarea id="course-description" name="course-description" value="<?php if(isset($_GET["course_description"])){echo $_GET["course_description"];}?>"></textarea>

  <label class="addCourse-form__label" for="credit-hours">Credit hours:</label>
  <input class="addCourse-form__input" type="number" id="credit-hours" name="credit-hours" min=0 value="<?php if(isset($_GET["credit_hours"])){echo $_GET["credit_hours"];}?>">

  <label class="addCourse-form__label" for="prerequisite">Prerequisite (Course Code):</label>
  <input class="addCourse-form__input" type="text" id="prerequisite" name="prerequisite" placeholder="if any" value="<?php if(isset($_GET["prerequisite"])){echo $_GET["prerequisite"];}?>">
  
  <?php 
    if(isset($_GET["error"])){
      if($_GET["error"] == "invalidInstructor"){
        echo "<p class='error-field'>Invalid Instructir make sure email is correct!</p>";
      }
    }
  ?>

  <label class="addCourse-form__label" for="instructor-email">Instructor email:</label>
  <input class="addCourse-form__input" type="text" id="instructor-email" name="instructor-email" value="<?php if(isset($_GET["instructor_email"])){echo $_GET["instructor_email"];}?>">

  <label class="addCourse-form__label" for="meeting-times">Meeting times:</label>
  <select class="addCourse-form__input" id="meeting-times" name="meeting-times">
    <option value="MWF 09:00 AM - 10:00 AM" selected>MWF 09:00 AM - 10:00 AM</option>
    <option value="MWF 10:00 AM - 11:00 AM" >MWF 10:00 AM - 11:00 AM</option>
    <option value="MWF 11:00 AM - 12:00 PM" >MWF 11:00 AM - 12:00 PM</option>
    <option value="MWF 12:00 PM - 01:00 PM" >MWF 12:00 PM - 01:00 PM</option>
    <option value="MWF 01:00 PM - 02:00 PM" >MWF 01:00 PM - 02:00 PM</option>
    <option value="MWF 02:00 PM - 03:00 PM" >MWF 02:00 PM - 03:00 PM</option>
    <option value="MWF 03:00 PM - 04:00 PM" >MWF 03:00 PM - 04:00 PM</option>
    <option value="MWF 04:00 PM - 05:00 PM" >MWF 04:00 PM - 05:00 PM</option>
    <option value="MWF 05:00 PM - 06:00 PM" >MWF 05:00 PM - 06:00 PM</option>
    <option value="TH 09:00 AM - 10:00 AM"  >TH 09:00 AM - 10:00 AM</option>
    <option value="TH 10:00 AM - 11:00 AM"  >TH 10:00 AM - 11:00 AM</option>
    <option value="TH 11:00 AM - 12:00 PM"  >TH 11:00 AM - 12:00 PM</option>
    <option value="TH 12:00 PM - 01:00 PM"  >TH 12:00 PM - 01:00 PM</option>
    <option value="TH 01:00 PM - 02:00 PM"  >TH 01:00 PM - 02:00 PM</option>
    <option value="TH 02:00 PM - 03:00 PM"  >TH 02:00 PM - 03:00 PM</option>
    <option value="TH 03:00 PM - 04:00 PM"  >TH 03:00 PM - 04:00 PM</option>
    <option value="TH 04:00 PM - 05:00 PM"  >TH 04:00 PM - 05:00 PM</option>
    <option value="TH 05:00 PM - 06:00 PM"  >TH 05:00 PM - 06:00 PM</option>
  </select>

  <label class="addCourse-form__label" for="department">Department or program the course belongs to:</label>
  <select class="addCourse-form__input" id="department" name="department">
    <option value="Accounting" selected>Accounting</option>
    <option value="Anthropology">Anthropology</option>
    <option value="Art">Art</option>
    <option value="Biology">Biology</option>
    <option value="Business Administration">Business Administration</option>
    <option value="Chemistry">Chemistry</option>
    <option value="Communications">Communications</option>
    <option value="Computer Science">Computer Science</option>
    <option value="Criminal Justice">Criminal Justice</option>
    <option value="Data Science">Data Science</option>
    <option value="Economics">Economics</option>
    <option value="Education">Education</option>
    <option value="Engineering">Engineering</option>
    <option value="English">English</option>
    <option value="Environmental Science">Environmental Science</option>
    <option value="Film and Television">Film and Television</option>
    <option value="Finance">Finance</option>
    <option value="Gender Studies">Gender Studies</option>
    <option value="Geography">Geography</option>
    <option value="Geology">Geology</option>
    <option value="History">History</option>
    <option value="International Studies">International Studies</option>
    <option value="Journalism">Journalism</option>
    <option value="Law">Law</option>
    <option value="Linguistics">Linguistics</option>
    <option value="Mathematics">Mathematics</option>
    <option value="Mechanical Engineering">Mechanical Engineering</option>
    <option value="Music">Music</option>
    <option value="Nursing">Nursing</option>
    <option value="Philosophy">Philosophy</option>
    <option value="Physics">Physics</option>
    <option value="Political Science">Political Science</option>
    <option value="Psychology">Psychology</option>
    <option value="Public Health">Public Health</option>
    <option value="Religious Studies">Religious Studies</option>
    <option value="Sociology">Sociology</option>
    <option value="Software Engineering">Software Engineering</option>
    <option value="Theatre">Theatre</option>
  </select>

  <label class="addCourse-form__label" for="level">Level:</label>
  <select class="addCourse-form__input" id="level" name="level">
    <option value="undergraduate" selected>Undergraduate</option>
    <option value="graduate">Graduate</option>
  </select>

  <label class="addCourse-form__label" for="term">Term or semester offered:</label>
  <select class="addCourse-form__input" id="term" name="term">
    <option value="fall-2023" selected>Fall 2023</option>
  </select>

  <button class="addCourse-form__input" type="submit" name="course-submit">Submit</button>
</form>