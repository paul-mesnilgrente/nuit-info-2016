$(document).ready(function() {
	$('a[href="#1A"]').click(function() {
		$('div.col-md-3:visible').fadeOut("slow", function() {
			$('div.col-md-3:contains(1ère)').fadeIn();
		});
		return false;
	});
	$('a[href="#2A"]').click(function() {
		$('div.col-md-3:visible').fadeOut("slow", function() {
			$('div.col-md-3:contains(2ème)').fadeIn();
		});
		return false;
	});
	$('a[href="#3A"]').click(function() {
		$('div.col-md-3:visible').fadeOut("slow", function() {
			$('div.col-md-3:contains(3ème)').fadeIn();
		});
		return false;
	});
	$('a[href="#1D"]').click(function() {
		$('div.col-md-3:visible').fadeOut("slow", function() {
			$('div.col-md-3:contains(Défi 1)').fadeIn();
		});
		return false;
	});
	$('a[href="#2D"]').click(function() {
		$('div.col-md-3:visible').fadeOut("slow", function() {
			$('div.col-md-3:contains(Défi 2)').fadeIn();
		});
		return false;
	});
	$('a[href="#3D"]').click(function() {
		$('div.col-md-3:visible').fadeOut("slow", function() {
			$('div.col-md-3:contains(Défi 3)').fadeIn();
		});
		return false;
	});

	$('.progress').each(function(){
		var size = $(this).attr('value');
		var colori = $(this).attr('color');

		var bar = new ProgressBar.Circle(this, {
			color: colori,
			// This has to be the same size as the maximum width to
			// prevent clipping
			strokeWidth: 5,
			trailWidth: 1,
			easing: 'easeInOut',
			duration: 1400,
			text: {
				autoStyleContainer: false
			},
			from: { color: colori, width: 1 },
			to: { color: colori, width: 4 },
			// Set default step function for all animate calls
			step: function(state, circle) {
				circle.path.setAttribute('stroke', state.color);
				circle.path.setAttribute('stroke-width', state.width);

				var value = Math.round(circle.value() * size);
				if (value === 0) {
					circle.setText('');
				} else {
					circle.setText(value);
				}

			}
		});
		bar.text.style.fontSize = '4rem';
		bar.text.style.color = colori;

		bar.animate(1.0);  // Number from 0.0 to 1.0
	});
});
