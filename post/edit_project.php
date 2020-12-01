<?php
include "../app/config.php";

// edit project handler

// update project
$app->sql->update(
	"projects",
	array(
		"project_title" => $_POST['project_title'],
		"project_content" => $_POST['project_content'],
		"project_blurb" => $_POST['project_blurb'],
        "project_year" => $_POST['project_year'],
		"project_slug" => $app->slugify->slugify($_POST['project_title'])
	),
	array(
		"project_id" => $_POST['project_id']
	)
);

// TODO: set session action for alert

// redirect
header('location: https://'.$app->get_setting('site.url').'/admin/projects');
exit;