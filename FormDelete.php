<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $studentid = $_POST['studentid'];
    }

    if(!empty($studentid)){

        $query = "delete from candidates where studentid = '$studentid'";
        $execute = mysqli_query($con, $query);

        if(mysqli_query($con, $query) <= 0) {
            echo "<script>alert('Candidate Record Doesn\'t Exist!');</script>";
        } else {
            echo "<script>alert('Candidate Record Deleted!');</script>";
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
    <form method="post" id="formdelete">
        <div class="delete-div">
            <div class="delete-form">
                <p id="info" class="title addbx ">You can't undo the record once you've deleted</p>
                <input id="dlt_cnddt" class="dlt_cnddt inputbx " placeholder="Enter Student ID" name="studentid">
                <div class="btn-div">
                    <input type="submit" class="submitbx inputbx" value="Submit">
                    <input class="backbtn" onclick="window.location.href= 'admin.php'" value="Back">
                </div>
            </div>
        </div>
    </form>
</body>
</html>