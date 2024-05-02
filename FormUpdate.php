
<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    
}

include("db.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
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
            $destination = 'CandidateProfile/' . basename($row['profile']); // Specify the destination path
            
            if (rename($row['profile'], $destination)) {
                echo 'File moved successfully.';
            } else {
                echo 'Error moving file.';
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
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
    <form method="post" id="formupdate">
        <div class="maincontainer">
            <div class="secondcontainer">
                <input class="position inputbx" placeholder="Position" name="position" value="<?php echo $row['position']?>">
                <input class="stdntid inputbx" placeholder="Student ID" name="studentid" value="<?php echo $row['studentid']?>">
                <input class="name inputbx" placeholder="Name" name="name" value="<?php echo $row['name']?>">
                <input class="college inputbx" placeholder="College" name="college" value="<?php echo $row['college']?>">
                <input class="course inputbx" placeholder="Course" name="course" value="<?php echo $row['course']?>">
                <input class="quotes inputbx" placeholder="Quotes" name="quotes" value="<?php echo $row['quotes']?>">
                <input type="submit" class="submitbx inputbx" value="Submit">
            </div>
            <div class="imagecontainer">
                <label class="addbx" for="input-file" id="drop-area">
                    <input type="file" name="img" accept="image/*" id="input-file" hidden value="<?php echo $row['profile']?>">
                    <div id="img-view" class="img-view">
                        <img src="Pictures/uploadpng.png">
                        <p style="font-family: Arial;">Drag and drop or click here <br> to upload image</p>
                        <span style="font-family: Arial;">Upload any image of the candidate</span>
                    </div>
                </label>
                <input class="backbtn inputbx" onclick="window.location.href = 'FormFindID.php'" value="Back">
            </div>  
        </div>
    </form>
    <script src="FormUpdate.js"></script>
</body>
</html>