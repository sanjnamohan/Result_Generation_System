<?php
   include('session.php');
?>
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
    <a class="active" href="admin.php">ADMIN HOME</a>
    <a href="class.php">Add Class</a>
    <a href="student.php">Add Students</a>
    <a href="course.php">Add Courses</a>
    <a href="cc_comb.php">Add Class-Course Combinations</a>
    <a href="result_db.php">Add Results</a>
    <a href="homepage.html">Go to Main Page</a>
</div>

<div class="container-fluid content" id="admin_page_content" style="margin:auto;">
    <h1>Welcome to the Admin Interface!</h1>
    <h3>Click on the desired tab on the side panel to proceed</h3>
</div>

