
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('localhost', 'root', '','crudoperations','3307');

// get the post records
$task = $_POST['task'];
$taskupdatevalue = $_POST['taskupdatevalue'];

// database insert SQL code
if (!$con -> query($sql= "UPDATE tasks SET task = '".$task."'  where task ='".$taskupdatevalue."'")) {
echo("Error description: " . $con -> error);
}
// insert in database 
$result = mysqli_query($con, $sql);
if($result)
{
	echo "Task updated";
}
else{
	echo"nn";
}
?>