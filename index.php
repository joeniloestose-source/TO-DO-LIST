

<?php
include 'db.php';
$search_query = "";
if(isset($_GET['search'])){
    $search_query = $_GET['search'];
    $result = mysqli_query($conn,"SELECT * FROM list
    WHERE task_name LIKE '%$search_query%'
    OR description LIKE '%$search_query%'");
    
}else{
    $result = mysqli_query($conn,"SELECT * FROM list");
}

?>                                                                             
<!DOCTYPE html>
<html>
<head>
<title>To-Do List System</title>

<style>

body{
font-family: Arial;
background:#f4f4f4;
text-align:center;
}

.container{
width:600px;
margin:auto;
background:white;
padding:20px;
border-radius:10px;
}

table{
width:100%;
border-collapse:collapse;
}

td,th{
border:1px solid gray;
padding:8px;
}

button{
padding:6px 10px;
}

</style>

</head>

<body>

<div class="container">

<h2>To-Do List System</h2>

<form class="search-form" method="GET" action="index.php">
<input type="text" name="search" placeholder="Search tasks..." value="<?php echo htmlspecialchars($search_query); ?>">
<button type="submit">Search</button>
<a href="index.php"><button type="button">Clear</button></a>
</form>


<form method="POST" action="add.php">

<input type="text" name="task_name" placeholder="Task Name" required>

<input type="text" name="description" placeholder="Description">

<input type="date" name="due_date">



<button type="submit">Add Task</button>

</form>

<br>

<table>

<tr>
<th>ID</th>
<th>Task</th>
<th>Description</th>
<th>Due Date</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

$result = mysqli_query($conn,"SELECT * FROM list");

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['task_id']; ?></td>
<td><?php echo $row['task_name']; ?></td>
<td><?php echo $row['description']; ?></td>
<td><?php echo $row['due_date']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['task_id']; ?>">Edit</a>
|
<a href="delete.php?id=<?php echo $row['task_id']; ?>">Delete</a>

</td>

</tr>

<?php
}
?>





</table>

</div>
                        
</body>
</html>