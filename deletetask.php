
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('localhost', 'root', '','crudoperations','3307');

// get the post records
$taskvalue = $_POST['taskvalue'];
// database insert SQL code
$sql = "DELETE FROM tasks WHERE task='$taskvalue'";
// insert in database 
$result = mysqli_query($con, $sql);
if($result)
{
	echo "Task deleted";
}
else{
	echo"nn";
}
?>