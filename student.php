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
    <a class="active" href="student.php">Add Students</a>
    <a href="course.php">Add Courses</a>
    <a href="cc_comb.php">Add Class-Course Combinations</a>
    <a href="result_db.php">Add Results</a>
    <a href="homepage.html">Go to Main Page</a>

</div>

<form action="" method="post" class="form_body">
    <div id="form_body_student" class="container-fluid content">
        <h2>Enter New Student Details</h2>
        <br><br>
        <div class="form-group row">
            <label for="studid" class="col-md-2 col-form-label">Student ID:</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="studid" id="studid" required="required" placeholder="Student ID" />
            </div>
        </div>

        <div class="form-group row">
            <label for="student_name" class="col-md-2 col-form-label">Student Name:</label>
            <div class="col-md-10">
            <input type="text" class="form-control" name="student_name" id="student_name" required="required" placeholder="Student Name" />
            </div>
        </div>

        <div class="form-group row">
            <label for="rollids" class="col-md-2 col-form-label">Roll ID:</label>
            <div class="col-md-10">
            <input type="text" class="form-control" name="rollids" id="rollids" required="required" placeholder="Roll ID" />
            </div>
        </div>

        <div class="form-group row">
            <label for="classids" class="col-md-2 col-form-label">Class ID:</label>
            <div class="col-md-10">
            <input type="text" class="form-control" name="classids" id="classids" required="required" placeholder="Class ID" />
            </div>
        </div>

        <div class="form-group row">
            <label for="dobs" class="col-md-2 col-form-label">Date of Birth:</label>
            <div class="col-md-10">
            <input type="date" class="form-control" name="dobs" id="dobs" required="required" placeholder="DOB" />
            </div>
        </div>





        <button class="btn btn-primary button_next" type="submit">Add Student</button>
    </div>
</form>

<?php 
$studid = $_POST['studid'];
$student_name = $_POST['student_name'];
$rollids = $_POST['rollids'];
$classids = $_POST['classids'];
$dobs = $_POST['dobs'];

$stud_id_query = mysqli_query($conn, "SELECT * FROM StudentInfo WHERE RollID = $rollids"); 
$class_id_query_fk = mysqli_query($conn, "SELECT * FROM Classes WHERE ClassID = $classids"); 

if($stud_id_query->num_rows > 0){
    echo "<script>alert('Roll ID already exists');</script>";
}

else if($class_id_query_fk->num_rows == 0){
    echo "<script>alert('Class ID does not exist');</script>";
}

else{
    $add_stud_query = mysqli_query($conn, "INSERT INTO StudentInfo(StudentID,StudentName, RollID, ClassID, DOB) VALUES ($studid,'$student_name',$rollids,$classids,'$dobs')");
    // echo "<script>alert('Student Query done');</script>";
    if($add_stud_query){
        $msgs = "Student Added Succesfully!!";
    }
    else{
        $msgs = "Unable to add student!\n Please Try Again!";
    }
    echo "<script>alert('$msgs');</script>";
}
?>