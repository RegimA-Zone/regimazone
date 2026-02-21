<div id="splash"></div>

<?php
$spinner_type = get_option('lol_spinner_type');
switch($spinner_type) {
	case '1':
		get_template_part('preloader/spinner', '1');
		break;
	case '2':
		get_template_part('preloader/spinner', '2');
		break;
	case '3':
		get_template_part('preloader/spinner', '3');
		break;
	case '4':
		get_template_part('preloader/spinner', '4');
		break;
	case '5':
		get_template_part('preloader/spinner', '5');
		break;
	case '6':
		get_template_part('preloader/spinner', '6');
		break;
	case '7':
		get_template_part('preloader/spinner', '7');
		break;
	case '8':
		get_template_part('preloader/spinner', '8');
		break;
}
?>

<div id="bgsplash"></div>