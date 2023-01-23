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
<?php
    require "../includes/dbh.inc.php";
    require "../includes/fetchCourses.inc.php";
    $course = "";
    if(!isset($_GET["course_code"])){
        echo "<p>course code is not set!</p>";
        exit();
    }
    else{
        $course = getCourseByCode($_GET["course_code"], $conn);
        if($course == ""){
            echo "<p>course code is not correct!</p>";
            exit();
        }
    }
?>

<form class="addCourse-form" action="../includes/editCourse.inc.php" method="POST">
    <label class="addCourse-form__label" for="course-code">Course code:</label>
    <p><?php echo $course["course_code"]?></p>
    <input class="addCourse-form__input" type="hidden" id="course-code" name="course-code" value="<?php echo $course["course_code"] ?>">

    <label class="addCourse-form__label" for="course-name">Course name:</label>
    <input class="addCourse-form__input" type="text" id="course-name" name="course-name" placeholder="e.g. Introduction to Computer Science" value="<?php echo $course["course_name"] ?>">

    <label class="addCourse-form__label" for="course-description">Course description:</label>
    <input class="addCourse-form__input" type="text" id="course-description" name="course-description" value="<?php echo $course["course_description"] ?>">

    <label class="addCourse-form__label" for="credit-hours">Credit hours:</label>
    <input class="addCourse-form__input" type="number" id="credit-hours" name="credit-hours" min=0 value="<?php echo $course["credit_hours"] ?>">

    <label class="addCourse-form__label" for="prerequisite">Prerequisite (Course Code):</label>
    <input class="addCourse-form__input" type="text" id="prerequisite" name="prerequisite" placeholder="if any" value="<?php echo $course["prerequisite"] ?>">
    
    <?php 
        if(isset($_GET["error"])){
        if($_GET["error"] == "invalidInstructor"){
            echo "<p class='error-field'>Invalid Instructir make sure email is correct!</p>";
        }
        }
        function isSelectedTime($course, $time){
            if($course["meeting_times"] == $time){
                echo "selected";
            }
        }
        function isSelectedDep($course, $dep){
            if($course["department"] == $dep){
                echo "selected";
            }
        }
        function isSelectedLevel($course, $level){
            if($course["level"] == $level){
                echo "selected";
            }
        }
    ?>

    <label class="addCourse-form__label" for="instructor-email">Instructor email:</label>
    <input class="addCourse-form__input" type="text" id="instructor-email" name="instructor-email" value="<?php echo $course["instructor_email"] ?>">

    <label class="addCourse-form__label" for="meeting-times">Meeting times:</label>
    <select class="addCourse-form__input" id="meeting-times" name="meeting-times">
        <option value="MWF 09:00 AM - 10:00 AM" <?php isSelectedTime($course,"MWF 09:00 AM - 10:00 AM")?> >MWF 09:00 AM - 10:00 AM</option>
        <option value="MWF 10:00 AM - 11:00 AM" <?php isSelectedTime($course,"MWF 10:00 AM - 11:00 AM")?> >MWF 10:00 AM - 11:00 AM</option>
        <option value="MWF 11:00 AM - 12:00 PM" <?php isSelectedTime($course,"MWF 11:00 AM - 12:00 PM")?> >MWF 11:00 AM - 12:00 PM</option>
        <option value="MWF 12:00 PM - 01:00 PM" <?php isSelectedTime($course,"MWF 12:00 PM - 01:00 PM")?> >MWF 12:00 PM - 01:00 PM</option>
        <option value="MWF 01:00 PM - 02:00 PM" <?php isSelectedTime($course,"MWF 01:00 PM - 02:00 PM")?> >MWF 01:00 PM - 02:00 PM</option>
        <option value="MWF 02:00 PM - 03:00 PM" <?php isSelectedTime($course,"MWF 02:00 PM - 03:00 PM")?> >MWF 02:00 PM - 03:00 PM</option>
        <option value="MWF 03:00 PM - 04:00 PM" <?php isSelectedTime($course,"MWF 03:00 PM - 04:00 PM")?> >MWF 03:00 PM - 04:00 PM</option>
        <option value="MWF 04:00 PM - 05:00 PM" <?php isSelectedTime($course,"MWF 04:00 PM - 05:00 PM")?> >MWF 04:00 PM - 05:00 PM</option>
        <option value="MWF 05:00 PM - 06:00 PM" <?php isSelectedTime($course,"MWF 05:00 PM - 06:00 PM")?> >MWF 05:00 PM - 06:00 PM</option>
        <option value="TH 09:00 AM - 10:00 AM" <?php isSelectedTime($course,"TH 09:00 AM - 10:00 AM")?>  >TH 09:00 AM - 10:00 AM</option>
        <option value="TH 10:00 AM - 11:00 AM" <?php isSelectedTime($course,"TH 10:00 AM - 11:00 AM")?>  >TH 10:00 AM - 11:00 AM</option>
        <option value="TH 11:00 AM - 12:00 PM" <?php isSelectedTime($course,"TH 11:00 AM - 12:00 PM")?>  >TH 11:00 AM - 12:00 PM</option>
        <option value="TH 12:00 PM - 01:00 PM" <?php isSelectedTime($course,"TH 12:00 PM - 01:00 PM")?>  >TH 12:00 PM - 01:00 PM</option>
        <option value="TH 01:00 PM - 02:00 PM" <?php isSelectedTime($course,"TH 01:00 PM - 02:00 PM")?>  >TH 01:00 PM - 02:00 PM</option>
        <option value="TH 02:00 PM - 03:00 PM" <?php isSelectedTime($course,"TH 02:00 PM - 03:00 PM")?>  >TH 02:00 PM - 03:00 PM</option>
        <option value="TH 03:00 PM - 04:00 PM" <?php isSelectedTime($course,"TH 03:00 PM - 04:00 PM")?>  >TH 03:00 PM - 04:00 PM</option>
        <option value="TH 04:00 PM - 05:00 PM" <?php isSelectedTime($course,"TH 04:00 PM - 05:00 PM")?>  >TH 04:00 PM - 05:00 PM</option>
        <option value="TH 05:00 PM - 06:00 PM" <?php isSelectedTime($course,"TH 05:00 PM - 06:00 PM")?>  >TH 05:00 PM - 06:00 PM</option>
    </select>

    <label class="addCourse-form__label" for="department">Department or program the course belongs to:</label>
    <select class="addCourse-form__input" id="department" name="department">
        <option value="Accounting"  <?php isSelectedDep($course, "Accounting")?>>Accounting</option>
        <option value="Anthropology"  <?php isSelectedDep($course, "Anthropology")?>>Anthropology</option>
        <option value="Art"  <?php isSelectedDep($course, "Art")?>>Art</option>
        <option value="Biology"  <?php isSelectedDep($course, "Biology")?>>Biology</option>
        <option value="Business Administration" <?php isSelectedDep($course, "Business Administration")?>>Business Administration</option>
        <option value="Chemistry" <?php isSelectedDep($course, "Chemistry")?>>Chemistry</option>
        <option value="Communications" <?php isSelectedDep($course, "Communications")?>>Communications</option>
        <option value="Computer Science" <?php isSelectedDep($course, "Computer Science")?>>Computer Science</option>
        <option value="Criminal Justice" <?php isSelectedDep($course, "Criminal Justice")?>>Criminal Justice</option>
        <option value="Data Science" <?php isSelectedDep($course, "Data Science")?>>Data Science</option>
        <option value="Economics" <?php isSelectedDep($course, "Economics") ?>>Economics</option>
        <option value="Education" <?php isSelectedDep($course, "Education") ?>>Education</option>
        <option value="Engineering" <?php isSelectedDep($course, "Engineering") ?>>Engineering</option>
        <option value="English" <?php isSelectedDep($course, "English") ?>>English</option>
        <option value="Environmental Science" <?php isSelectedDep($course, "Environmental Science") ?>>Environmental Science</option>
        <option value="Film and Television" <?php isSelectedDep($course, "Film and Television") ?>>Film and Television</option>
        <option value="Finance" <?php isSelectedDep($course, "Finance") ?>>Finance</option>
        <option value="Gender Studies" <?php isSelectedDep($course, "Gender Studies") ?>>Gender Studies</option>
        <option value="Geography" <?php isSelectedDep($course, "Geography")?>>Geography</option>
        <option value="Geology" <?php isSelectedDep($course, "Geology")?>>Geology</option>
        <option value="History" <?php isSelectedDep($course, "History")?>>History</option>
        <option value="International Studies" <?php isSelectedDep($course, "International Studies")?>>International Studies</option>
        <option value="Journalism" <?php isSelectedDep($course, "Journalism")?>>Journalism</option>
        <option value="Law" <?php isSelectedDep($course, "Law")?>>Law</option>
        <option value="Linguistics" <?php isSelectedDep($course, "Linguistics")?>>Linguistics</option>
        <option value="Mathematics" <?php isSelectedDep($course, "Mathematics")?>>Mathematics</option>
        <option value="Mechanical Engineering" <?php isSelectedDep($course, "Mechanical Engineering")?>>Mechanical Engineering</option>
        <option value="Music" <?php isSelectedDep($course, "Music") ?>>Music</option>
        <option value="Nursing" <?php isSelectedDep($course, "Nursing") ?>>Nursing</option>
        <option value="Philosophy" <?php isSelectedDep($course, "Philosophy") ?>>Philosophy</option>
        <option value="Physics" <?php isSelectedDep($course, "Physics") ?>>Physics</option>
        <option value="Political Science" <?php isSelectedDep($course, "Political Science")?>>Political Science</option>
        <option value="Psychology" <?php isSelectedDep($course, "Psychology")?>>Psychology</option>
        <option value="Public Health" <?php isSelectedDep($course, "Public Health")?>>Public Health</option>
        <option value="Religious Studies" <?php isSelectedDep($course, "Religious Studies")?>>Religious Studies</option>
        <option value="Sociology" <?php isSelectedDep($course, "Sociology")?>>Sociology</option>
        <option value="Software Engineering" <?php isSelectedDep($course, "Software Engineering")?>>Software Engineering</option>
        <option value="Theatre" <?php isSelectedDep($course, "Theatre")?>>Theatre</option>
    </select>

    <label class="addCourse-form__label" for="level">Level:</label>
    <select class="addCourse-form__input" id="level" name="level">
        <option value="undergraduate" <?php isSelectedLevel($course, "undergraduate")?> >Undergraduate</option>
        <option value="graduate" <?php isSelectedLevel($course, "graduate")?>>Graduate</option>
    </select>

    <label class="addCourse-form__label" for="term">Term or semester offered:</label>
    <select class="addCourse-form__input" id="term" name="term">
        <option value="fall-2023" selected>Fall 2023</option>
    </select>

    <button class="addCourse-form__input" type="submit" name="course-edit-submit">Update</button>
</form>