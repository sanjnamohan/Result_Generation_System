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

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

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
    <a class="active" href="class.php">Add Class</a>
    <a href="student.php">Add Students</a>
    <a href="course.php">Add Courses</a>
    <a href="cc_comb.php">Add Class-Course Combinations</a>
    <a href="result_db.php">Add Results</a>
    <a href="homepage.html">Go to Main Page</a>

</div>
<form action="" method="post" class="form_body">
    <div id="form_body_class" class="container-fluid content">
        <h2>Enter New Class Details</h2>
        <br><br>
        <div class="form-group row">
            <label for="classid" class="col-md-2 col-form-label">Class ID:</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="classid" id="classid" required="required" placeholder="ClassID" />
            </div>
        </div>

        <div class="form-group row">
            <label for="class_no" class="col-md-2 col-form-label">Class Number:</label>
            <div class="col-md-10">
            <input type="text" class="form-control" name="class_no" id="class_no" required="required" placeholder="Class Number" />
            </div>
        </div>

        <div class="row">
          <button class="btn btn-primary button_next" type="submit">Add Class</button>
        </div>
    </div>
</form>

<?php
$classid = $_POST['classid'];
$classno = $_POST['class_no'];
$class_id_query = mysqli_query($conn, "SELECT * FROM Classes WHERE ClassID = $classid"); 
if($class_id_query->num_rows > 0){
    echo "<script>alert('Class ID already exists');</script>";
}

else{
    $add_class_query = mysqli_query($conn, "INSERT INTO Classes(ClassID,ClassNo) VALUES ($classid,$classno)"); 
    // echo "<script>alert('Student Query done');</script>";
    
    if($add_class_query){
        $msg = "Class Added Succesfully!!";
    }
    else{
        $msg = "Unable to add class!\n Please Try Again!";
    }
    echo "<script>alert('$msg');</script>";
}
?>
