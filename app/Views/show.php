<!DOCTYPE html>
<html>
<head>
	<title><?= $work->work_name ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="alert alert-success" role="alert">
			<h4 class="alert-heading"><?= $work->work_name ?> <strong><?= $work->status ?></strong></h4>
			<hr>
		  	<p>
		  		<?= createDateFormat($work->start_date) ?> - <?= createDateFormat($work->end_date) ?>
		  	</p>
		</div>
		<div class="pull-right">
			<a class="btn btn-default" href="<?= createUrl(['controller' => 'my-work', 'method' => 'index']) ?>">Back</a>
		</div>
	</div>
</body>
</html>