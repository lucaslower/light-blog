<?php
class LightBlog{

	public function __construct(){

		// SET UP SEQUEL PDO CLASS
		$db_user = getenv('DB_USER');
		$db_pass = getenv('DB_PASS');
		$db_name = getenv('DB_NAME');
		
		require_once('sequel.php');
		$this->sql = new Sequel(new PDO("mysql:host=localhost;dbname=$db_name;charset=utf8mb4;", $db_user, $db_pass));
	}

	//////////////
	// SETTINGS //
	//////////////

	public function get_setting($name){
		return $this->sql->selectOne("settings", array("setting_name" => $name))['setting_value'];
	}

	///////////
	// POSTS //
	///////////

	public function posts($slug = null){

		// if a slug was passed
		if($slug){
			$post = $this->sql->selectOne("posts", array("post_slug" => $slug));
			$pass = array(
				'meta' => array(
					"page_name" => $post['post_title'],
					"page_slug" => "posts"
				),
				'view' => 'single.php',
				'data' => array(
					"post" => $post
				)	
			);
			return $pass;
		}

		// if a slug was not passed
		else{
			// get posts
			$posts = $this->sql->query("SELECT * FROM posts ORDER BY post_timestamp");
			// get bio text
			$bio = $this->get_setting("site.bio");
			// build return
			$pass = array(
				'meta' => array(
					"page_name" => "Posts",
					"page_slug" => "posts"
				),
				'view' => 'posts.php',
				'data' => array(
					"posts" => $posts
				)	
			);
			return $pass;
		}
	}
}