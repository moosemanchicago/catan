<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Settlers of Catan | Resource Tracker</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.0.6/material.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

<div class="container-fluid">

<div class="available-actions">
<?php
	$actions = [	'road' => 'Road',
					'settlement' => 'Settlement',
					'city' => 'City',
					'developmentCard' => 'Development Card'
				];
	foreach ($actions as $action => $name) :
?>
<!-- Primary-colored flat button -->
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent action <?=$action?>" data-action="<?=$action?>">
<?=$name?>
</button>

<?php	endforeach;	?>
</div><!-- available-actions -->

<div class="resource-group">
<?php
	$resources = ['brick','wood','stone','wheat','sheep'];
	foreach ($resources as $resource) :
?>


<ul class="list-group">
  <li class="list-group-item resource <?=$resource?>" data-resource="<?=$resource?>">
    <span class="badge resource-count">--</span>
    <span class="badge resource-name"><?=$resource?></span>
    <span class="steppers">
		<!-- FAB button with ripple -->
		<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect remove-resource">
			<i class="material-icons">-</i>
		</button>
		<!-- FAB button with ripple -->
		<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect add-resource">
			<i class="material-icons">+</i>
		</button>
    </span>
  </li>
</ul>
 <?php	endforeach;	?>
</div>
</div><!-- container-fluid -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.0.6/material.js"></script>
<script src="script.js"></script>
</body>

</html>
