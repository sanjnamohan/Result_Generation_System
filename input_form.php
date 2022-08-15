<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<form action="result.php" method="post">
    <div id="form_body" class="container-fluid content">
    <h2>Enter your Details</h2>
    <br><br>
        <div class="form-group row">
            <label for="roll" class="col-md-2 col-form-label">Roll Number:</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="roll" id="roll" required="required" placeholder="Roll Number" />
            </div>
        </div>

        <div class="form-group row">
            <label for="class" class="col-md-2 col-form-label">Class:</label>
            <div class="col-md-10">
                <select name="class" class="form-control" id="class" required="required">
                <option value="">Select Class</option>
                <?php require 'create_conn.php';

                $sql = mysqli_query($conn,"SELECT * FROM Classes");
                while ($row = mysqli_fetch_array($sql)) {
                    $classid = $row['ClassID'];
                    $classno = $row['ClassNo'];
                    ?>
                    <option value='<?php echo $classid; ?>'><?php echo $classno; ?></option>
                    <?php } ?>
                    <?php $conn->close(); ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="dob" class="col-md-2 col-form-label">Date of Birth:</label>
            <div class="col-md-10">
                <input type="date" class="form-control" name="dob" id="dob" required="required" placeholder="Date of Birth" />
            </div>
        </div>
        


        <button class="btn btn-primary button_next" type="submit">Get Results</button>
    </div>
</form>
   