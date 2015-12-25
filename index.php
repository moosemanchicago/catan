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

<main>

<div class="col-sm-12 resource-group">
<!-- Wide card with share menu button -->
<div class="demo-card-wide mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title">
   <?php
	$actions = [	'road' => 'Road',
					'settlement' => 'Settlement',
					'city' => 'City',
					'developmentCard' => 'Development'
				];
	foreach ($actions as $action => $name) :
?>
<!-- Primary-colored flat button -->
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent action <?=$action?>" data-action="<?=$action?>">
<?=$name?>
</button>

<?php	endforeach;	?>
    <!-- <h2 class="mdl-card__title-text">Resource Tracker</h2> -->
  </div>
  <div class="mdl-card__supporting-text">

  </div>
  <!-- <div class="mdl-card__actions mdl-card--border">
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Get Started
    </a>
  </div> -->
  <div class="mdl-card__menu">
  <div class="list-group">
  <a class="list-group-item list-group-item-success">Victory Points: <span class="victory-points">0</span></a>
  <a class="list-group-item list-group-item-danger">Largest Army: <span class="largest-army">No</span></a>
  <a class="list-group-item list-group-item-danger">Longest Road: <span class="longest-road">No</span></a>
  </div>

  </div>
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

 <div class="list-group">
  <a class="list-group-item list-group-item-info stats">Roads: <span class="roads-built">0</span></a>
  <a class="list-group-item list-group-item-info stats">Settlements: <span class="settlements-builts">0</span></a>
  <a class="list-group-item list-group-item-info stats">Cities: <span class="cities-built">0</span></a>
  <a class="list-group-item list-group-item-info stats">Army Size: <span class="army-size">0</span></a>
</div>


</div>






<!-- Trigger the modal with a button -->
<button type="button" class="hide btn btn-info btn-lg modal-toggle" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">The Island of Catan.</h4>
      </div>
      <div class="modal-body">
        <p>Did you know that you can save this to your phone and use it offline whenever you want?</p>
        <p>
        <span>Your Team:</span>
        </p>
        <p>
      <!-- Raised button with ripple -->
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect team white">White</button>
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect team blue">Blue</button>
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect team red">Red</button>
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect team orange">Orange</button>
        </p>
        <!-- Simple Textfield -->
	  <form action="#">
	    <div class="mdl-textfield mdl-js-textfield">
	      <input class="mdl-textfield__input" type="text" id="sample1">
	      <label class="mdl-textfield__label" for="sample1">Name...</label>
	    </div>
	  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Play!</button>
      </div>
    </div>

  </div>
</div>



</main>


</div><!-- container-fluid -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.0.6/material.js"></script>
<script src="script.js"></script>
</body>

</html>
