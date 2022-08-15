<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php require 'subscribe.php';?>
<h1>Final Examination Results</h1>


<div class="container-fluid resultdisplay">
 

    <table id="detailtable">
        <tr>
            <th>Name</th>
            <td><?php echo $studentname; ?></td>
        </tr>
        <tr>
            <th>Roll No</th>
            <td><?php echo $roll; ?></td>
        </tr>
        <tr>
            <th>Class</th>
            <td><?php echo $classno; ?></td>
        </tr>
    </table>
    <div class="row">
        <br>
    </div>
    <div class="row">
        <br>
    </div>
    <div class="row">
        <br>
    </div>
    <div class="row">
        <br>
    </div>
    <table id="resulttable">
        <tr>
            <th>Course Name</th>
            <th>Marks Scored</th>
            <th>Maximum Marks</th>
        </tr>
        <?php
        $totalmarks = 0;
            while ($row = mysqli_fetch_array($result)) {
                $coursename = $row['CourseName'];
                $Marks = $row['Marks'];
                $totalmarks = $totalmarks + $Marks;
                ?>
                <tr>
                    <td><?php echo $coursename;?></td>
                    <td><?php echo $Marks;?></td>
                    <td>100</td>
                </tr>
            <?php }?>
            <tr>
                <td><strong>Total Marks</strong></td>
                <td><strong><?php echo $totalmarks;?></strong></td>
                <td><strong>600</strong></td>
            </tr>
    </table> 

</div>
