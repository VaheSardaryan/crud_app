<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Codeigniter CRUD Application With Example - Tutsmake.com</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
	<style>
		.mt40{
			margin-top: 40px;
		}
	</style>
</head>
<body>

<div class="container">
	<div class="row mt40">
		<div class="col-md-10">
			<h2>Codeigniter Basic Crud Example - Tuts Make</h2>
		</div>
		<div class="col-md-2">
			<a href="<?php echo base_url('student/create/') ?>" class="btn btn-danger">Add Student</a>
		</div>
		<br><br>

		<table class="table table-bordered">
			<thead>
			<tr>
				<th>Id</th>
				<th>Fisrtname</th>
				<th>Lastname</th>
				<th>Created at</th>
				<td colspan="2">Action</td>
			</tr>
			</thead>
			<tbody>
			<?php if($student): ?>
				<?php foreach($student as $note): ?>
					<tr>
						<td><?php echo $note->id; ?></td> <!--ete object a urem ($note -> id)-->
                                                          <!--ete array a urem ($note['id'])-->
						<td><?php echo $note->firstname; ?></td>
						<td><?php echo $note->lastname; ?></td>
						<td><a href="<?php echo base_url('student/edit/'.$note->id) ?>" class="btn btn-primary">Edit</a></td>
						<td>
							<form action="<?php echo base_url('student/delete/'.$note->id) ?>" method="post">
								<button class="btn btn-danger" type="submit">Delete</button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			</tbody>
		</table>

	</div>

</div>

</body>
</html>
