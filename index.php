<?php
	include_once 'config.php';	
?>

<!doctype html>

<head>
	<title>Bosh sahifa</title>
	<? include_once 'css.php'; ?>
</head>

<body>
	<div class="container">

		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Age</th>
					<th scope="col">Email</th>
					<th> Amallar </th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$result = mysqli_query($link, "SELECT * FROM users ORDER BY id DESC");
					while($res = mysqli_fetch_array($result)) {
				?>
				<tr>

					<th scope="row"><?=$res['id'];?></th>
					<td><?=$res['name'];?></td>
					<td><?=$res['age'];?></td>
					<td><?=$res['email'];?></td>
					<td>
						<? 
							$table = "users";
							$id = $res['id'];
						?>
						<button type="button" class="btn btn-danger" onclick="edi(<?=$id?>)"><i class="fa fa-edit"></i> Edit</button>
						<button type="button" class="btn btn-primary" onclick="del(<?=$res['id'];?>)"><i class="fa fa-trash"></i>Del</button>
					</td>
				</tr>
				<?}?>
			</tbody>
		</table>
	</div>

	<script> 
		function del(id) {
			window.location.href='delete.php?id='+id;
		}
		function edi(id) {
			window.location.href='edit.php?id='+id;
		}
	</script>

	<? include_once 'js.php'; ?>
</body>

</html>