<?php
// created by: lucas lower, 2019-03-07

require_once "app/config.php";

///////////////////
// ROUTE MANAGER //
///////////////////

// get url parts
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// check if top level path was set before (catch login redirect)
if(!isset($route[0])){
	$route = array_values(array_filter(explode('/',$path), function($v){
		return $v != '';
	}));
}

// switch on top level path (posts, dash, etc)
// default handles general page requests
switch($route[0]){
	
	// home/posts
	case '':
	case 'posts':
		$VIEW_DATA = $app->posts($route[1]);
		break;
	
	// default handles all other page requests
	default:
		
		break;

}

// initialize the view
include __DIR__ . "/views/".$app->get_setting('site.theme')."/".$VIEW_DATA['view'];