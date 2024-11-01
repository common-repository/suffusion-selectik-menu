$j=jQuery.noConflict();

$j(document).ready(function() {
var n=$j("#nav-top select").length;

if (n > 1) {
$j("#nav-top .tinynav").first().remove();
}


$j('.tinynav').selectik({
width: 200,
maxItems: 0,
customScroll: 1,
speedAnimation: 300,
smartPosition: false
});

	$j('.custom-scroll ul li').each(function() {
		if ($j.trim ($j(this).text()) === "") {
			var path_home_icon=$j('.home-icon')[0].src;
			$j(this).prepend('<img class="home-icon" src="' + path_home_icon + '" alt="home-icon" />');
		}
	});
	$j('span.custom-text').each(function() {
		if ($j.trim ($j(this).text()) === "") {
			var path_home_icon=$j('.home-icon')[0].src;
			$j(this).prepend('<img class="home-icon" src="' + path_home_icon + '" alt="home-icon" />');
		}
	});
});