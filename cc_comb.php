<?php require 'create_conn.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/styles.css">
<style>
    .sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #5b7cb5;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #073c96;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: rgba(39, 108, 213, 0.95);
  color: white;
}

/* div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
} */

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
<div class="sidebar">
    <a href="admin.php">ADMIN HOME</a>
    <a href="class.php">Add Class</a>
    <a href="student.php">Add Students</a>
    <a href="course.php">Add Courses</a>
    <a class="active" href="cc_comb.php">Add Class-Course Combinations</a>
    <a href="result_db.php">Add Results</a>
    <a href="homepage.html">Go to Main Page</a>

</div>
<form action="" method="post" class="form_body">
    <div id="form_body_course" class="container-fluid content">
        <h2>Enter the Class-Course Combination</h2>
        <br><br>
        <div class="form-group row">
            <label for="ccid" class="col-md-2 col-form-label">CC ID:</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="ccid" id="ccid" required="required" placeholder="Class-Course ID" />
            </div>
        </div>

        <div class="form-group row">
            <label for="classidcc" class="col-md-2 col-form-label">Class ID:</label>
            <div class="col-md-10">
            <input type="text" class="form-control" name="classidcc" id="classidcc" required="required" placeholder="Class ID" />
            </div>
        </div>

        <div class="form-group row">
            <label for="courseidcc" class="col-md-2 col-form-label">Course ID:</label>
            <div class="col-md-10">
            <input type="text" class="form-control" name="courseidcc" id="courseidcc" required="required" placeholder="Course ID" />
            </div>
        </div>


        <button class="btn btn-primary button_next" type="submit">Add Class-Course Mapping</button>
    </div>
</form>

<?php
$ccid = $_POST['ccid'];
$courseidcc = $_POST['courseidcc'];
$classidcc = $_POST['classidcc'];
$cc_id_query = mysqli_query($conn, "SELECT * FROM CourseClass WHERE CCID = $ccid");
$course_id_query_fk_cc = mysqli_query($conn, "SELECT * FROM Courses WHERE CourseID = $courseidcc");
$class_id_query_fk_cc = mysqli_query($conn, "SELECT * FROM Classes WHERE ClassID = $classidcc");
if($cc_id_query->num_rows > 0){
    echo "<script>alert('CC ID already exists');</script>";
}
else if($course_id_query_fk_cc->num_rows == 0){
    echo "<script>alert('Course ID does not exist');</script>";
}
else if($class_id_query_fk_cc->num_rows == 0){
    echo "<script>alert('Class ID does not exist');</script>";
}

else{
    $add_cc_query = mysqli_query($conn, "INSERT INTO CourseClass(CCID,ClassID,CourseID) VALUES ($ccid,$classidcc,$courseidcc)"); 
    // echo "<script>alert('Student Query done');</script>";
    
    if($add_cc_query){
        $msg = "Class-Course Mapping Added Succesfully!!";
    }
    else{
        $msg = "Unable to add course!\n Please Try Again!";
    }
    echo "<script>alert('$msg');</script>";
}
?>