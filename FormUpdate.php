
<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    
}

include("db.php");
$getstudentid = "";
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['findstudentid'])){
    $getstudentid = $_POST['findstudentid'];
}

//$getstudentif is a variable from another php file
if(!empty($getstudentid)){

    $sql = "select * from candidates where studentid = '$getstudentid'";
    $result = mysqli_query($con, $sql);

    if($result){
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo $row['profile'];
        
        } else {
            //if walang record si candidate, fetch natin ulit sa search id form
            echo "<script> alert('Candidate record doesnt existed!');</script>";
            echo "<script> window.location.href='FormFindID.php'; </script>";//balik natin sya doon
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "FormUpdate.css" ?></style>
    <title>Document</title>
</head>
<body>
    <p class="title addbx">Check the Candidates info before you submit</p>
    <form method="post" id="formupdate" enctype="multipart/form-data">
        <div class="maincontainer">
            <div class="secondcontainer">
                <input class="position inputbx" placeholder="Position" name="position" value="<?php echo $row['position']?>">
                <input class="stdntid inputbx" placeholder="Student ID" name="studentid" value="<?php echo $row['studentid']?>">
                <input class="name inputbx" placeholder="Name" name="name" value="<?php echo $row['name']?>">
                <input class="college inputbx" placeholder="College" name="college" value="<?php echo $row['college']?>">
                <input class="course inputbx" placeholder="Course" name="course" value="<?php echo $row['course']?>">
                <input class="quotes inputbx" placeholder="Quotes" name="quotes" value="<?php echo $row['quotes']?>">
                <input type="submit" class="submitbx inputbx" value="Submit" name="submit">
            </div>
            <div class="imagecontainer">
                <label class="addbx" for="input-file" id="drop-area">   
                    <input type="file" name="img" id="input-file" hidden>
                    <div id="img-view" class="img-view">
                        <img id="cndtpfl" src="CandidateProfile/<?php echo $row['profile']?>">
                        <p style="font-family: Arial;">Drag and drop or click here <br> to upload image</p>
                        <span style="font-family: Arial;">Upload any image of the candidate</span>
                    </div>
                </label>
                <input class="backbtn inputbx" onclick="window.location.href = 'FormFindID.php'" value="Back">
            </div>  
        </div>
        <?php
        include("db.php");
        
        if(isset($_POST['submit'])){
            // Sanitize inputs
            $studentid = mysqli_real_escape_string($con, $_POST['studentid']);
            $position = mysqli_real_escape_string($con, $_POST['position']);
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $college = mysqli_real_escape_string($con, $_POST['college']);
            $course = mysqli_real_escape_string($con, $_POST['course']);
            $quotes = mysqli_real_escape_string($con, $_POST['quotes']);

            $imagename = $_FILES['img']['name'];
            $extensionname = pathinfo($imagename, PATHINFO_EXTENSION);
            $allowedType = array("jpg", "jpeg", "png");
            $tempName = $_FILES["img"]["tmp_name"];
            $targetPath = "CandidateProfile/".$imagename;      
            
            if(in_array($extensionname, $allowedType)){
                if(move_uploaded_file($tempName, $targetPath)){
                    $upd = "update candidates 
                    set studentid = '$studentid',
                        position = '$position', 
                        name = '$name', 
                        college = '$college', 
                        course = '$course', 
                        quotes = '$quotes', 
                        profile = '$imagename'
                    where studentid = '$studentid'";                    
                    $result2 = mysqli_query($con, $upd);

                    if($result2){
                        echo "<script> alert('Candidate Record Updated Successfully.'); </script>";
                    } else {
                        echo "<script>alert('Error Occured: Registration Failed'); </script>";
                    }
                }

            } else {
                echo "<script> alert('Image type is not accesptable, we accept only jpg, jpeg and png');</script>";
            }
        }
    ?>
    </form>
    <script src="FormUpdate.js"></script>
</body>
</html>