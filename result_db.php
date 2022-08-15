<?php require 'create_conn.php' ?>
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
    <a href="cc_comb.php">Add Class-Course Combinations</a>
    <a class="active" href="result_db.php">Add Results</a>
    <a href="homepage.html">Go to Main Page</a>

</div>
<form action="" method="post" class="form_body">
    <div id="form_body_class" class="container-fluid content">
        <h2>Enter New Result Details</h2>
        <br><br>
        <div class="form-group row">
            <label for="resultid" class="col-md-2 col-form-label">Result ID:</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="resultid" id="resultid" required="required" placeholder="ResultID" />
            </div>
        </div>

        <div class="form-group row">
            <label for="rollidr" class="col-md-2 col-form-label">Roll Number:</label>
            <div class="col-md-10">
            <input type="text" class="form-control" name="rollidr" id="rollidr" required="required" placeholder="Roll Number" />
            </div>
        </div>

        <div class="form-group row">
            <label for="classidr" class="col-md-2 col-form-label">Class ID:</label>
            <div class="col-md-10">
            <input type="text" class="form-control" name="classidr" id="classidr" required="required" placeholder="Class ID" />
            </div>
        </div>

        <div class="form-group row">
            <label for="courseidr" class="col-md-2 col-form-label">Course ID:</label>
            <div class="col-md-10">
            <input type="text" class="form-control" name="courseidr" id="courseidr" required="required" placeholder="Course ID" />
            </div>
        </div>

        <div class="form-group row">
            <label for="marksid" class="col-md-2 col-form-label">Marks:</label>
            <div class="col-md-10">
            <input type="text" class="form-control" name="marksid" id="marksid" required="required" placeholder="Marks" />
            </div>
        </div>

        <div class="row">
          <button class="btn btn-primary button_next" type="submit">Add Result</button>
        </div>
    </div>
</form>

<?php
$resultid = $_POST['resultid'];
$rollidr = $_POST['rollidr'];
$classidr = $_POST['classidr'];
$courseidr = $_POST['courseidr'];
$marksid = $_POST['marksid'];
$result_id_query = mysqli_query($conn, "SELECT * FROM Results WHERE ResultID = $resultid");
$class_id_query_fk_r = mysqli_query($conn, "SELECT * FROM Classes WHERE ClassID = $classidr");
$roll_id_query_fk_r = mysqli_query($conn, "SELECT * FROM StudentInfo WHERE RollID = $rollidr");
$course_id_query_fk_r =  mysqli_query($conn, "SELECT * FROM Courses WHERE CourseID = $courseidr");
if($result_id_query->num_rows > 0){
    echo "<script>alert('Result ID already exists');</script>";
}
else if($class_id_query_fk_r->num_rows == 0){
    echo "<script>alert('Class ID does not exist');</script>";
}
else if($roll_id_query_fk_r->num_rows == 0){
  echo "<script>alert('Roll ID does not exist');</script>";
}
else if($course_id_query_fk_r->num_rows == 0){
  echo "<script>alert('Course ID does not exist');</script>";
}

else{
    $add_result_query = mysqli_query($conn, "INSERT INTO Results(ResultID,RollID,ClassID,CourseID,Marks) VALUES ($resultid,$rollidr,$classidr,$courseidr,$marksid)"); 
    // echo "<script>alert('Student Query done');</script>";
    
    if($add_result_query){
        $msg = "Result Added Succesfully!!";
    }
    else{
        $msg = "Unable to add result!\n Please Try Again!";
    }
    echo "<script>alert('$msg');</script>";
}
?>
