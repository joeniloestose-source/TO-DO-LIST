<?php

include 'db.php';

$task_name = $_POST['task_name'];
$description = $_POST['description'];
$due_date = $_POST['due_date'];


$sql = "INSERT INTO list(task_name,description,due_date)
VALUES('$task_name','$description','$due_date')";

mysqli_query($conn,$sql);

header("Location: index.php");

?>

