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
});
