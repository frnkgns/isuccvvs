<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "FormAdd.css" ?></style>
    <title>Document</title>
</head>
<body>
    <p class="title addbx">INPUT THE FOLLOWING TO ADD NEW OFFICERS</p>
    <form method="post" enctype="multipart/form-data">
        <div class="maincontainer">
            <div class="secondcontainer">
                <input class="position inputbx" placeholder="Position" name="position">
                <input class="stdntid inputbx" placeholder="Student ID" name="studentid">
                <input class="name inputbx" placeholder="Name" name="name">
                <input class="college inputbx" placeholder="College" name="college">
                <input class="course inputbx" placeholder="Course" name="course">
                <input class="quotes inputbx" placeholder="Quotes" name="quotes">
                <input type="submit" class="submitbx inputbx" value="Submit">
            </div>
            <div class="imagecontainer">
                <label class="addbx" for="input-file" id="drop-area">
                    <input type="file" name="img" id="input-file" hidden>
                    <div id="img-view">
                        <img src="Pictures/uploadpng.png">
                        <p style="font-family: Arial;">Drag and drop or click here <br> to upload image</p>
                        <span style="font-family: Arial;">Upload any image of the candidate</span>
                    </div>
                </label>
                <input class="backbtn inputbx" onclick="window.location.href= 'admin.php'" value="Back">
            </div>
        </div>
    </form>
    <script src="FormAdd.js"></script>
</body>
</html>

<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }   

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $studentid = $_POST['studentid'];
        $position = $_POST['position'];
        $name = $_POST['name'];
        $college = $_POST['college'];
        $course = $_POST['course'];
        $quotes = $_POST['quotes'];

        $studentid = $_POST['studentid'];
        $position = $_POST['position'];
        $name = $_POST['name'];
        $college = $_POST['college'];
        $course = $_POST['course'];
        $quotes = $_POST['quotes'];
        
        $imagename = $_FILES['img']['name'];
        $extensionname = pathinfo($imagename, PATHINFO_EXTENSION);
        $allowedType = array("jpg", "jpeg", "png");
        $tempName = $_FILES["img"]["tmp_name"];
        $targetPath = "CandidateProfile/".$imagename;
        

        if(!empty($studentid) && !empty($position) && !empty($name) && !empty($college) && !empty($course) && !empty($quotes) && !empty($imagename)){
            $query1 = "select * from candidates where studentid = '$studentid'";
            $result1 = mysqli_query($con, $query1);

            if(mysqli_num_rows($result1) > 0){
                echo "<script> alert('Candidate Record Existed!');</script>";
            } else {
                if(in_array($extensionname, $allowedType)){
                    if(move_uploaded_file($tempName, $targetPath)){
                        $query2 = "insert into candidates values ('$studentid','$position', '$name', '$college', '$course', '$quotes', '$imagename')";
                        $result2 = mysqli_query($con, $query2);

                        if($result2){
                            echo "<script> alert('Candidate Registration Complete!'); </script>";
                        } else {
                            echo "<script>alert('Error Occured: Registration Failed'); </script>";
                        }
                    }

                } else {
                    echo "<script> alert('Image type is not accesptable, we accept only jpg, jpeg and png');</script>";
                }
            }

        } else {
            echo "<script> alert('Please fill up all the information to proceed'); </script>";
        }
    }
?>
