<!DOCTYPE html>
<html>
<head>
	<title>List work</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>List work <small><a href="<?= createUrl(['controller' => 'my-work', 'method' => 'create']) ?>">Create one work</a></small></h1>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Work name</th>
				<th>Start date</th>
				<th>End date</th>
				<th>Status</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			<?php foreach($data as $work): ?>
				<tr>
					<td><?= $work['id'] ?></td>
					<td><?= $work['work_name'] ?></td>
					<td><?= createDateFormat($work['start_date']) ?></td>
					<td><?= createDateFormat($work['end_date']) ?></td>
					<td><?= $work['status'] ?></td>
					<td>
						<a href="<?= createUrl(['controller' => 'my-work', 'method' => 'show', 'id' => $work['id']]) ?>">Show</a>
					</td>
					<td>
						<a href="<?= createUrl(['controller' => 'my-work', 'method' => 'update', 'id' => $work['id']]) ?>">Update</a>
					</td>
					<td>
						<a href="<?= createUrl(['controller' => 'my-work', 'method' => 'delete', 'id' => $work['id']]) ?>">Delete</a>
					</td>
				</tr>
			<?php  endforeach; ?>
		</table>
	</div>
</body>
</html>