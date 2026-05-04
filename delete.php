<?php

include 'db.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM tasks WHERE task_id=$id");

header("Location: index.php");

?>

