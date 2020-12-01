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
		return $v != '' && $v != 'light-blog';
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

    // projects
    case 'projects':
        $VIEW_DATA = $app->projects($route[1]);
        break;

	// admin pages
	case 'admin':
		// check for admin access

		// setup admin view
		$VIEW_DATA = $app->admin($route);
		break;
	
	// default handles all other page requests
	default:
		// for now we just serve a 404
		$VIEW_DATA = $app->error_404();
		break;

}

// initialize the view
if($route[0] == 'admin' && $VIEW_DATA['meta']['page_type'] != 'error'){
	include __DIR__ . "/views/admin/".$VIEW_DATA['view'];
}
else{
	include __DIR__ . "/views/".$app->get_setting('site.theme')."/".$VIEW_DATA['view'];
}
