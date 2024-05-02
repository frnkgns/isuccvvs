<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $getstudentid = $_POST['findstudentid'];
        $_SESSION['studentidfromphp'] = $getstudentid;
    }

    if(!empty($getstudentid)){

        $query = "select * from candidates where studentid = '$getstudentid'";
        $execute = mysqli_query($con, $query);

        if($execute){
            if(mysqli_num_rows($execute) > 0) {
                echo "<script>alert('Candidate Record Exist!');</script>";
                $row = mysqli_fetch_assoc($execute);
                echo $row['studentid'];
                echo $row['position'];
                echo $row['name'];
                echo $row['college'];
                echo $row['course'];
                
            } else {
                echo "<script>alert('Candidate Record Doesn\'t Exist!');</script>";
            }

        } else {
            echo "<script>alert('No Record Found!');</script>";

        }

    } else {
        echo "<script>alert('You didn't input anything');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "FormDelete.css" ?></style>
    <title>Delete Form</title>
</head>
<body>

    <!-- using the action= navigates you into another php and send request -->
    <form action="FormUpdate.php" method="post" id="formdelete">
        <div class="delete-div">
            <div class="delete-form">
                <p id="info" class="title addbx ">Please enter student id to proceed</p>
                <input id="dlt_cnddt" class="dlt_cnddt inputbx " placeholder="XX-XXXXX" name="findstudentid">
                <div class="btn-div">
                    <input type="submit" class="submitbx inputbx" value="Submit">
                    <input class="backbtn" onclick="window.location.href= 'admin.php'" value="Back">
                </div>
            </div>
        </div>
    </form>
</body>
</html>