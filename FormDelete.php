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

        //let's check if the query returns a row or a query really deleted a record
        //if query didn't delete a record or doens't work, it means that query doesn't find a record
        if(mysqli_affected_rows($con) > 0) {
            echo "<script>alert('Candidate Record Deleted!');</script>";
        } else {
            echo "<script>alert('Candidate Record Doesn\'t Exist!');</script>";
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
                <p id="info" class="title addbx ">Enter Student ID to proceed <br><br><a style="color: red;">Note: You can't undo the deleted record.<a></p>
                <input id="dlt_cnddt" class="dlt_cnddt inputbx " placeholder="XX-XXXX" name="studentid">
                <div class="btn-div">
                    <input type="submit" class="submitbx inputbx" value="Submit" style="cursor: pointer;">
                    <input class="backbtn" onclick="window.location.href= 'admin.php'" value="Back" style="cursor: pointer;">
                </div>
            </div>
        </div>
    </form>
</body>
</html>