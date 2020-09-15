<?php
include "config.php";

// ajax handler (select2's, mainly)

switch($_GET['func']){

	// tag search select2
	case 'tag_search_select2':
		// search for tags
		$tags = $app->sql->query(
			"SELECT CONCAT(\"tag_id|\", tag_id) as id, tag_label as text FROM tags WHERE tag_label LIKE ?",
			array("%".$_GET['q']."%")
		)->toArray();
		// format json for select2 response
		$json = array('results' => $tags);
		header('Content-type: application/json');
		echo json_encode($json);
		break;
}