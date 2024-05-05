<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style><?php include "admin.css" ?></style>
    <title>Document</title>
</head>
<body>
    <div class="subcontainer">
        <button type="button" class="btn btn-success btn1 w" onclick="window.location.href='FormAdd.php'">Register</button>
        <button type="button" class="btn btn-warning btn1 " onclick="window.location.href='FormFindID.php'">Update</button>
        <button type="button" class="btn btn-danger btn1 w" onclick="window.location.href='FormDelete.php'">Delete</button>
        <button type="button" class="btn btn-primary btn1 w" onclick="window.location.href='index.php'">Back</button>
    </div>
    <script src="admin.js"></script>
</body>
</html>