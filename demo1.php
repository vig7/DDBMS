<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Record Form</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
		.form{
			margin-top: 30px;
		}
		.d{
			margin:0% 0 0 40%;
			margin-left: 20px;
		}
		h1{
			margin-left: 32%;
		}
		.side{
			width: 150px;
			margin-left: 30px;
		}
		.main{
			border:1px solid black;
			width: 350px;
			margin:13% 0 0 36%;
			height: 300px;
			background-color: #90AFC5;
		}
		label{
			margin-left: 10px;
		}
		#lastName{
			margin-left: 70px;
		}
		#firstName{
			margin-left: 60px;
		}

		.firstName{
			margin-left: 12px;
		}
		span{
			margin-left: 15px;
		}
		.btn-info{
			margin-left: 80px;
		}
		body{
			background-color: #336B87;
		}
		.btn-info{
			font-size: 1.2em;
		}

	</style>
</head>
<body>
	<h1>Delivery Management System</h1><hr color="black">
	<div class="main">
		<center><h4>Enter information</h4></center><hr>
	<form action="demo1.php" method="POST" class="form">
		<p>
			<label for="firstName">Code</label>
			<input type="number" name="first_name" id="firstName" required>
		</p>
		<p>
			<label for="lastName">City</label>
			<input type="text" name="last_name" id="lastName">
		</p>

		<p>
			<label for="lastName">Delivery boy</label>
			<input type="text" name="boy" class="firstName">
		</p>

<span class="custom-dropdown big" >
    <select id="options" name="options" class="btn btn-primary dropdown-toggle">    
        <option value="1" selected="true">INSERTING</option>  
        <option value="2">UPDATING</option>
        <option value="3">DELETING</option>
    </select>
</span>
<input type="submit" name="submit" class="btn btn-info">
	</form><br>
	<form method="POST" action="demo5.php">
	<input type="text" name="fragment" class="side" required><input type="submit" class="d btn btn-success" value="Display"></form>
</div>
</body>
</html>
<?php
if(isset($_POST["options"])){

$cd=$_POST["first_name"];
if($cd<60){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "state");

// Check connection
if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$boy = mysqli_real_escape_string($link, $_REQUEST['boy']);

// attempt insert query execution
if($_POST["options"]==1){
	$sql = "INSERT INTO state (code,city,delivery) VALUES ('$first_name', '$last_name','$boy')";
}
if($_POST["options"]==2){
	$sql = "UPDATE `state` SET `city`='$last_name',`delivery`='$boy' WHERE `code`='$first_name' ";
}
if($_POST["options"]==3){
	$sql = "DELETE FROM `state` WHERE code='$first_name'";
}
if(mysqli_query($link, $sql)){
	echo "Operation completed successfully.";

} else{


	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
}
else{
	$link=pg_connect("host=localhost port=5432 dbname=demo user=postgres password=1234");

// Check connection
	if(!$link){
		die("ERROR: Could not connect. ");
	}

// Escape user inputs for security
	$fn = $_POST["first_name"];
	$ln = $_POST["last_name"];
	$b = $_POST["boy"];

// attempt insert query execution
	

if($_POST["options"]==1){
	$query = "INSERT INTO state (code,city,delivery) VALUES ('$fn', '$ln','$b')";
}
if($_POST["options"]==2){
	$query = "UPDATE state SET city='$ln',delivery='$b' WHERE code='$fn' ";
}
if($_POST["options"]==3){
	$query = "DELETE FROM state WHERE code=$fn";
}
	$result= pg_query($query);
	if($result){
		echo "Operation completed successfully.";
	} else{
		echo "ERROR: Could not able to execute ";
	}

// close connection
	pg_close($link);
}}
?>