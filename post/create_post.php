<?php
include "../app/config.php";

// create post handler

// insert post
$post_id = $app->sql->insert(
	"posts",
	array(
		"post_title" => $_POST['post_title'],
		"post_content" => $_POST['post_content'],
		"post_slug" => $app->slugify->slugify($_POST['post_title'])
	)
);

// insert posted tags
foreach($_POST['post_tags'] as $tag_str){
	// split tag params
	list($tag_type,$tag_val) = explode('|', $tag_str);
	// get tag id if new tag
	if($tag_type == 'tag_label') $tag_val = $app->sql->insert('tags', array('tag_label' => $tag_val));
	// insert tag --> post map
	$app->sql->insert('posts_tags', array('post_id' => $post_id, 'tag_id' => $tag_val));
}

// TODO: set session action for alert

// redirect
header('location: https://'.$app->get_setting('site.url').'/admin/posts');
exit;