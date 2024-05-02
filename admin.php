<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "admin.css" ?></style>
    <title>Document</title>
</head>
<body>
    <div class="subcontainer">
        <button class="add btn" id="add" onclick="window.location.href='FormAdd.php'">Register</button>
        <button class="update btn" id="update" onclick="window.location.href='FormFindID.php'">Update</button>
        <button class="delete btn" id="delete" onclick="window.location.href='FormDelete.php'">Delete</button>
        <button class="delete btn" id="delete" onclick="window.location.href='index.php'">Back</button>
    </div>
    <script src="admin.js"></script>
</body>
</html>