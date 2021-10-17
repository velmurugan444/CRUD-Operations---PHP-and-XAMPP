<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
.header {
    color: black;
    font-size: 27px;
   margin-top:4%;
}
.container{
	max-width: 50%;
	margin-top:2%;
	margin-left: auto;
margin-right: auto;
background: antiquewhite;
}
.secondcontainer{
	max-width: 50%;
	margin-top:2%;
	margin-left: auto;
margin-right: auto;
background: aliceblue;
}
.bigicon {
    font-size: 35px;
    color: #36A0FF;
}
.form-control{
margin-left:30%;
}
.btn-primary{
    color: #fff;
    background-color: red;
    border-color: #0062cc;
	padding: -0.5rem 1rem;
}
#taskdata{
	margin-left:5%;
}
.btn-info {
    color: #326128;
    background-color: red;
    border-color: #17a2b8;
    margin-left: 40%;
}
.trash{
	margin-left:2%;
	color:red;
}
.update{
	margin-left:3%;
	color:green;
}
#id{
	margin-left:41%;
}
</style>
<script>
$(document).ready(function(){
  $("#addtask").click(function(){
				 var task = $("#task").val();
					var datastring="task=" + task;
					if(task == "" ){
						alert("please enter task");
						return false;
					}
					else{
                $.ajax({
					url: "addtask.php",
                    type: "POST",
                    data: datastring,
                    success: function(result) {
                       alert(result);
					window.location.reload(true);
                    }
                });
				return false;
			}
          });
	});
</script>

<script>
$(document).ready(function(){
  $("#delete").click(function(){
				 var taskvalue = $('input:checkbox:checked').map(function(){
			return this.value; 
			}).get();
					var datastring="taskvalue=" + taskvalue;
					if(taskvalue == ""){
						alert("select the task to be deleted");
					}else{
                $.ajax({
					url: "deletetask.php",
                    type: "POST",
                    data: datastring,
                    success: function(result) {
                       alert(result);
						window.location.reload(true);
                    }
                });
				return false;
					}
          });
	});
</script>

<script>
$(document).ready(function(){
  $("#update").click(function(){
	   var task = $("#task").val();
				 var taskupdatevalue = $('input:checkbox:checked').map(function(){
			return this.value; 
			}).get();
					
					var datastring="task=" + task + "&taskupdatevalue=" + taskupdatevalue;
					if(task == "" || taskupdatevalue == ""){
						alert("Enter updated value");
					}else{
                $.ajax({
					url: "updatetask.php",
                    type: "POST",
                    data: datastring,
                    success: function(result) {
                       alert(result);
					   window.location.reload(true);
                    }
                });
				return false;
					}
          });
	});
</script>
<body>
  <legend class="text-center header">CRUD OPERATIONS</legend>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                      

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="task" name="task" type="text" placeholder="Enter Task..." class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg"name="addtask"id="addtask">Add Task</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="secondcontainer">
<?php
$conn=mysqli_connect("localhost","root","","crudoperations","3307");
if($conn->connect_error){
die("connection failed:".$conn->connect_error);
}
if (!$conn -> query($sql="SELECT * from tasks")) {
echo("Error description: " . $conn -> error);
}
$result=$conn->query($sql);
if (!empty($result) && $result->num_rows > 0) {
while($row=$result->fetch_assoc()){
echo"<tr><div style='margin-left: 23%;'><br><td id='taskvalue'>".$row["task"]."</td><input type='checkbox'name='id'id='id'value='".$row['task']."'><a href=''id='delete'class='trash'>Delete</a><a href=''id='update'class='update'> Update </a></br><br></div></tr>";
}
echo"</table>";
}
else
{
echo"no tasks added yet...";
}
$conn->close();
?>
</div>
</body>
</html>
