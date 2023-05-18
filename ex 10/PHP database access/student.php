<!DOCTYPE html>
<html>
<head>
    <title>Course Selection</title>
</head>

<body>
    <?php
    session_start();

    $name = $_POST['name'];
    $seats = intval($_POST['seats']);

    $con = mysqli_connect("localhost:3306","root","","college");
    $stmt = "select * from course where course_name = '$name'";
    $res = mysqli_query($con,$stmt);
    $row = mysqli_fetch_array($res);

    echo '<center><h1>Course Details</h1></center>';
    if($row){
        $count = intval($row['seats']);
        $name = $row['course_name'];
        if($seats > $count)
        {
            echo("<SCRIPT>window.alert('Exceeded more than available seats for this course');</SCRIPT>");
        }
        else{
            $count = $count - $seats;
            $stmt2 = "update course set seats = '$count' where course_name = '$name'";
            $res2 = mysqli_query($con,$stmt2);
            if($res2){
                echo("<SCRIPT>window.alert('Course booked successfully');
                window.location.href='main.php';</SCRIPT>");
            }
        }
        mysqli_free_result($res);
        mysqli_close($con);
    }
    else{
        echo("<SCRIPT>window.alert('No Such Course Available');</SCRIPT>");
    }  
?>
</body>
</html>
