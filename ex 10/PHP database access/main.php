<!DOCTYPE html>
<html>
<head>
    <title>Course Enrollment</title>
</head>

<body>
    <?php
    session_start();
    // Database connection
    $con = mysqli_connect("localhost:3306","root","","college");
    $stmt = "select * from course";
    $res = mysqli_query($con,$stmt);
    echo '<center><h1>Course Details</h1></center>';
    if($res){
        while($row = mysqli_fetch_array($res))
        {
            echo'<center><div>'.
            '<h5>==========================================</h5>'.
            '<h5>Course Name : '.$row["course_name"].'</h5>'.        
            '<h5>No. Of Seats Available : '.$row["seats"].'</h5>'.
            '<h5>=========================================</h5>'.
            '</div></center>';
        }

        mysqli_free_result($res);
        mysqli_close($con);
    }
    else{
        echo("<SCRIPT>window.alert('No courses available');</SCRIPT>");
    }  
?>
<center><div>
    <form action="student.php" method="POST">
        <h1>Course Selection</h1>
          <label for="name">Select the course: </label>
            <select name="name" required>
                <option value="">Choose an option</option>
                <option value="CSE">CSE</option>
                <option value="IT">IT</option>
                <option value="ECE">ECE</option>
                <option value="EEE">EEE</option>
                <option value="MECH">MECH</option>  
            </select><br>
        <label for="seats">Enter the number of seats: </label>
        <input type="number" name="seats" min="1" max="15" required><br>
        <input type="submit">
    </form>
</div></center>
</body>
</html>
