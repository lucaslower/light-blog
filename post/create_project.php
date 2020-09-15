<?php
include "../app/config.php";

// create project handler

// insert project
$project_id = $app->sql->insert(
	"projects",
	array(
		"project_title" => $_POST['project_title'],
		"project_content" => $_POST['project_content'],
		"project_slug" => $app->slugify->slugify($_POST['project_title'])
	)
);

// TODO: set session action for alert

// redirect
header('location: https://'.$app->get_setting('site.url').'/admin/projects');
exit;