<?php
$sites_html = file_get_contents('http://lol.garena.tw');

$html = new DOMDocument();
@$html->loadHTML($sites_html);
$content = [];

foreach($html->getElementsByTagName('meta') as $meta) {
	echo str_replace("og:", "", $meta->getAttribute('property'));
	if($meta->getAttribute('property') != ""){
		$content[$meta->getAttribute('property')] = $meta->getAttribute('content');
	}else if($meta->getAttribute('name')){
		$content[$meta->getAttribute('name')] = $meta->getAttribute('content');
	}

}

var_dump($content);
?>