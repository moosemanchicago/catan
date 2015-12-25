(function () {

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

	function updateActions () {
		// Roads
		if (	Player.brick >= ActionCosts.road.brick &&
			Player.wood >= ActionCosts.road.wood ) {
			$('button.action.road').addClass('btn-success').attr('disabled',false);
		} else {
			$('button.action.road').removeClass('btn-success').attr('disabled',true);
		}

		//Settlements
		if (	Player.brick >= ActionCosts.settlement.brick &&
			Player.wood >= ActionCosts.settlement.wood &&
			Player.wheat >= ActionCosts.settlement.wheat &&
			Player.sheep >= ActionCosts.settlement.sheep ) {
			$('button.action.settlement').addClass('btn-success').attr('disabled',false);
		} else {
			$('button.action.settlement').removeClass('btn-success').attr('disabled',true);
		}

		//Cities
		if (	Player.wheat >= ActionCosts.city.wheat &&
			Player.stone >= ActionCosts.city.stone ) {
			$('button.action.city').addClass('btn-success').attr('disabled',false);
		} else {
			$('button.action.city').removeClass('btn-success').attr('disabled',true);
		}

		//Development Card
		if (	Player.wheat >= ActionCosts.developmentCard.wheat &&
			Player.sheep >= ActionCosts.developmentCard.sheep &&
			Player.stone >= ActionCosts.developmentCard.stone ) {
			$('button.action.developmentCard').addClass('btn-success').attr('disabled',false);
		} else {
			$('button.action.developmentCard').removeClass('btn-success').attr('disabled',true);
		}

		//Update the resource counts from Player
		$('.resource-count').each(function() {
			var resource = $(this).parent().data('resource');
			$(this).text( Player[ resource ]);
		});
	}

	$('button.action').attr('disabled',true);

	$('.add-resource').click(function(){
		var resource = $(this).parent().parent('.resource').data('resource');
		Player[ resource ] += 1;
		if ( Player[ resource ] > 0 ) {
			$(this).siblings('.remove-resource').attr('disabled',false);
			console.log($(this) );
		}
		console.info("Added 1 " + resource);
		$(this).parent().siblings('.resource-count').text( Player[ resource ]);
		updateActions ();
	});

	$('.remove-resource').click(function(){
		var resource = $(this).parent().parent('.resource').data('resource');
		Player[ resource ] -= 1;
		if ( Player[ resource ] <= 0 ) {
			Player[ resource ] = 0;
			$(this).attr('disabled',true);
		}
		console.info("Removed 1 " + resource);
		$(this).parent().siblings('.resource-count').text( Player[ resource ]);
		updateActions ();
	});

	$('button.action').click(function(){
		var action = $(this).data('action');
		Player.removeResources(action);
	});

} )();
