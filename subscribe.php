
<?php require 'create_conn.php';
if (isset($_POST['roll'], $_POST['class'])) {
	$roll = $_POST['roll'];
	$class = $_POST['class'];
    $dob = $_POST['dob'];
    $_SESSION['roll'] = $roll;
    $_SESSION['class'] = $class;
    // echo "Im here"; 
    $result_name = mysqli_query($conn, "SELECT StudentInfo.StudentName, StudentInfo.ClassID, StudentInfo.DOB, Classes.ClassNo FROM StudentInfo, Classes WHERE StudentInfo.RollID=$roll AND Classes.ClassID=$class"); 
    if(false===$result_name) {
        echo "Error!!!!!";    
    }
    $row = mysqli_fetch_array($result_name);
    if($row['ClassID']!=$class||$row['DOB']!=$dob){
        header("Location: invalid.html");
        exit();
    }
    $studentname = $row['StudentName'];
    $classno = $row['ClassNo'];
    // echo $studentname;
    // echo "<br>";
    // echo $classno;
    // echo "<br>";
    $result = mysqli_query($conn, "SELECT CourseName, Marks, Results.ClassID FROM Results,Courses where Results.RollID=$roll and Courses.CourseID = Results.CourseID");
    // include 'result.php';
    
      
} 
else {
	echo 'Please Enter All Details';
}
?>
