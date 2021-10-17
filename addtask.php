
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('localhost', 'root', '','crudoperations','3307');

// get the post records
$task = $_POST['task'];
// database insert SQL code
$sql = "INSERT INTO tasks (task) VALUES ('$task')";
// insert in database 
$result = mysqli_query($con, $sql);
if($result)
{
	echo "Task added";
}
else{
	echo"nn";
}
?>