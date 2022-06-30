<?php
include_once("crud.php");
include_once("validation.php");

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['update']))
{	
	$id = $crud->escape_string($_POST['id']);
	
	$name = $crud->escape_string($_POST['name']);
	$age = $crud->escape_string($_POST['age']);
	$email = $crud->escape_string($_POST['email']);
	
	$msg = $validation->check_empty($_POST, array('name', 'age', 'email'));
	$check_age = $validation->is_age_valid($_POST['age']);
	$check_email = $validation->is_email_valid($_POST['email']);
	
	// checking empty fields
	if($msg) {
		echo $msg;		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} elseif (!$check_age) {
		echo 'Please provide proper age.';
	} elseif (!$check_email) {
		echo 'Please provide proper email.';	
	} else {	
		//updating the table
		$result = $crud->execute("UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>

<?php
	include_once("crud.php");

	$crud = new Crud();

	$id = $crud->escape_string($_GET['id']);

	$result = $crud->getData("SELECT * FROM users WHERE id=$id");

	foreach ($result as $res) {
		$name = $res['name'];
		$age = $res['age'];
		$email = $res['email'];
	}
?>
<html>

<head>
	<title>Edit Data</title>

	<? include_once 'css.php'; ?>
</head>

<body>
	<form name="form1" method="post" action="" class="container">
		<div class="form-group">
			<label for="exampleInputEmail1">Name</label>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
				placeholder="" name="name" value="<?=$name;?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Yoshi</label>
			<input type="number" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
				value="<?=$age?>">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Email</label>
			<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
				value="<?=$email?>">
		</div>
		<input type="" name="id" id="" hidden>
		
		<button type="submit" class="btn btn-primary" name="update">Submit</button>
	</form>
	<? include_once 'js.php'; ?>
</body>

</html>