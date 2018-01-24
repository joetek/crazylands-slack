<?php
header('Content-Type: application/json');

$xmasbops = [
	'with a cheezy Christmas ornament.',
	'with a creature that isn\'t stirring.',
	'with a firey yule log. :fire:',
	'with a grouchy Scrooge.',
	'with a half decorated Christmas tree. :christmas_tree:',
	'with a one-horse open sleigh. :horse:',
	'with a partridge in a pear tree. :deciduous_tree:',
	'with a remedial Christmas Caroller. :astonished:',
	'with a sleighload of wrapped presents no one will use. :gift:',
	'with a snowman named Frosty. :snowman_without_snow:',
	'with a stocking full of gifts you\'ll never use. :gift:',
	'with a string of lights that don\'t work.',
	'with a turkey covered in cranberry sauce. :turkey:',
	'with a wreath covered in snow. :snowflake:',
	'with frankinscence and myrrh.',
	'with some mistletoe. :wink:',
	'with the relatives descending on your house. :house:'
];

$bops = [
	'with a bowl of sticky green jello.',
	'with a spods long-distance bill. :page_facing_up:  *woah*',
	'with a giant Stay-Puft Marshmallow Man.',
	'with a defective swipey card. :credit_card:',
	'with a gooey interface. *yuck*',
	'with an Argentinian Antelope.',
	'with a plate of Free Bird Seed from the Road Runner.',
	'with a giant bendy straw.',
	'with a house made out of Lego. :house:',
	'with a greasy rusted bicycle chain. :bike:',
	'with the artist formally known as Prince. ',
	'with a tangled slinkey'
];


if (date('z') > 334) { $bops = $xmasbops; }
$args = explode(' ', $_POST['text']);
$bop = $bops[array_rand($bops)];
$target = userlist($args);
//if(strpos($target, '@') === false) $target = '<@'. $target .'>';
//else  $target = '<'. $target .'>';

$message = ".\n".'<@'.$_POST['user_name'].'> bops '.$target.' '.$bop;
$out['response_type'] = 'in_channel';
$out['text'] = $message;
echo json_encode($out);

function userlist($arr) {
	foreach ($arr as $item) {
		if(strpos($item, '@') === false) $out[] = '<@'. $item.'>';
		else  $out[] = '<'. $item.'>';
	}
	
	if (sizeof($out) > 1) {
		$last_element = array_pop($out);
		array_push($out, 'and '.$last_element);
	}
	return implode(', ', $out);
}