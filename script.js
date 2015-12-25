// iife to keep things private
(function () {

	var ActionCosts = {
		'road' : {
			'brick' : 1,
			'wood' : 1
		},
		'settlement' : {
			'brick' : 1,
			'wood' : 1,
			'wheat' : 1,
			'sheep' : 1,
		},
		'city' : {
			'wheat' : 2,
			'stone' : 3
		},
		'developmentCard' : {
			'wheat' : 1,
			'sheep' : 1,
			'stone' : 1
		}
	};

	var Player = {
		'brick' : 0,
		'wood' : 0,
		'stone' : 0,
		'wheat' : 0,
		'sheep' : 0,
		'developmentCards' : [],
		'longestRoad' : false,
		'largestArmy' : false,
		'roads' : 0,
		'settlements' : 0,
		'cities' : 0,
		'ports' : [],
		'victoryPoints' : 0,
		'leader' : false,

		removeResources : function( action ) {
			for (var resource in ActionCosts[ action ]){
				Player[ resource ] -= 1;
				if ( Player [ resource ] < 0 ) { Player[ resource ] = 0; }
			}

			updateActions();
		}
	};

	//@TODO: make multiple players happen
	// var currentPlayer = "Moose";
	// if (currentPlayer == "Moose") {
	// 	window.Moose = Player;	// yes, i know this is not good, just here for debugging ;)
	// 	// console.log(Moose);
	// }

	var Moose = Player;




	//@TODO: refine this code, what a mess!
	function updateActions() {
		// Roads
		if (	Moose.brick >= ActionCosts.road.brick &&
			Moose.wood >= ActionCosts.road.wood ) {
			$('button.action.road').addClass('btn-success').attr('disabled',false);
		} else {
			$('button.action.road').removeClass('btn-success').attr('disabled',true);
		}

		//Settlements
		if (	Moose.brick >= ActionCosts.settlement.brick &&
			Moose.wood >= ActionCosts.settlement.wood &&
			Moose.wheat >= ActionCosts.settlement.wheat &&
			Moose.sheep >= ActionCosts.settlement.sheep ) {
			$('button.action.settlement').addClass('btn-success').attr('disabled',false);
		} else {
			$('button.action.settlement').removeClass('btn-success').attr('disabled',true);
		}

		//Cities
		if (	Moose.wheat >= ActionCosts.city.wheat &&
			Moose.stone >= ActionCosts.city.stone ) {
			$('button.action.city').addClass('btn-success').attr('disabled',false);
		} else {
			$('button.action.city').removeClass('btn-success').attr('disabled',true);
		}

		//Development Card
		if (	Moose.wheat >= ActionCosts.developmentCard.wheat &&
			Moose.sheep >= ActionCosts.developmentCard.sheep &&
			Moose.stone >= ActionCosts.developmentCard.stone ) {
			$('button.action.developmentCard').addClass('btn-success').attr('disabled',false);
		} else {
			$('button.action.developmentCard').removeClass('btn-success').attr('disabled',true);
		}

		//Update the resource counts from Moose
		$('.resource-count').each(function() {
			var resource = $(this).parent().data('resource');
			$(this).text( Moose[ resource ]);
		});
	}



	// start application with action buttons disabled
	$('button.action, .remove-resource').attr('disabled',true);

	// add a particular resource with plus button
	$('.add-resource').click(function(){
		var resource = $(this).parent().parent('.resource').data('resource');
		Moose[ resource ] += 1;
		if ( Moose[ resource ] > 0 ) {
			$(this).siblings('.remove-resource').attr('disabled',false);
		}
		console.info("Added 1 " + resource);
		$(this).parent().siblings('.resource-count').text( Moose[ resource ]);
		updateActions();
	});

	// remove a particular resource with plus button
	$('.remove-resource').click(function(){
		var resource = $(this).parent().parent('.resource').data('resource');
		Moose[ resource ] -= 1;
		if ( Moose[ resource ] <= 0 ) {
			Moose[ resource ] = 0;
			$(this).attr('disabled',true);
		}
		console.info("Removed 1 " + resource);
		$(this).parent().siblings('.resource-count').text( Moose[ resource ]);
		updateActions();
	});

	//perform action; like make a road or settlement
	$('button.action').click(function(){
		var action = $(this).data('action');
		Moose.removeResources(action);
	});

} )(); //end iife
