<?php
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM tasks WHERE task_id=$id");

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Task</title>
</head>

<body>

<h2>Edit Task</h2>

<form method="POST" action="update.php">

<input type="hidden" name="task_id" value="<?php echo $row['task_id']; ?>">

<input type="text" name="task_name" value="<?php echo $row['task_name']; ?>" required>

<input type="text" name="description" value="<?php echo $row['description']; ?>">

<input type="date" name="due_date" value="<?php echo $row['due_date']; ?>">

<button type="submit">Update Task</button>

</form>

</body>
</html>
