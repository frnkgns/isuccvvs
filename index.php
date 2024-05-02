<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include("db.php");
    $adminhtml = "admin.php";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $logincodes = $_POST['entercode'];

        $query = "select * from logincode where '$logincodes' = code limit 1";
        $execute = mysqli_query($con, $query);

        if($execute){
            $row = mysqli_fetch_assoc($execute);     //dko alam pero gamit nito para maacess natin yung iba pang row?
            $college = $row['college'];

            if ($college == "admin") {
                echo "<script>window.location.href='$adminhtml';</script>";

            } 
        } else {
            echo "<script type='text/javascript'> alert('Couldn't Connect') </script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISU-CC VOTING SYSTEM</title>
    <!--eto sa babang link, is inimport lang natin yung css file na pang design natin sa website-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--etong mga classes na nakikita nyo ginagamit natin para matawag tong mga html elements sa css para doon tayo mag design-->
    <!--then yung mga Id parang sa classes lang pero ginagamit naman sya sa js-->
    <form method="post">
        <div class="logo">
            <img src="Pictures/isulogo.png" class="isulogo">
            <p class="isu" style="font-family: sans-serif; margin-top: 30px;">ISABELA STATE UNIVERSITY CAUAYAN CAMPUS</p>
            <input id="code" class="code" placeholder="Enter Code Here" name="entercode">
            <p class="notreg-text" id="notreg-text" style="font-family: sans-serif;">Code is not Registered</p>
        </div>
    </form>
    <!--Then eto nilink rin natin yung js para magamit, then bakit nasa baba kasi para hindi sya agad mag magamit kailangan mauna muna mag load yung html elements bago yung functionalities-->
    <script> var college = "<?php echo $college; ?>";</script>
    <script src="script.js"></script>
</body>
</html>