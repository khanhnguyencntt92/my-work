<!DOCTYPE html>
<html>
<head>
	<title>Update Work</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<form method="post" action="">
			<div class="form-group">
				<label for="work_name">Work name</label>
				<input type="text" id="work_name" class="form-control" name="work_name" value="<?= $work->work_name ?>">
			</div>
			<div class="form-group">
				<label for="start_date">Start date</label>
				<input type="text" id="start_date" class="form-control" name="start_date" value="<?= createDateFormat($work->start_date) ?>">
			</div>
			<div class="form-group">
				<label for="end_date">End date</label>
				<input type="text" id="end_date" class="form-control" name="end_date" value="<?= createDateFormat($work->end_date) ?>">
			</div>
			<div class="form-group">
				<label for="status">Work status</label>
				<select id="status" class="form-control" name="status">
					<option>--</option>
					<?php foreach(createWorkStatuses() as $key => $value): ?>
						<?php if($key === $work->status): ?>
							<option value="<?= $key ?>" selected><?= $value ?></option>
						<?php else: ?>
							<option value="<?= $key ?>"><?= $value ?></option>
						<?php endif; ?>
					<?php endforeach;?>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" name="update" value="Update" class="btn btn-primary">
				<a class="btn btn-default" href="<?= createUrl(['controller' => 'my-work', 'method' => 'index']) ?>">Back</a>
			</div>
		</form>
	</div>
</body>
</html>