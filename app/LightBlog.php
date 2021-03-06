<?php
use Cocur\Slugify\Slugify;

class LightBlog{

	public function __construct(){

		// SET UP SEQUEL PDO CLASS
		$db_user = getenv('DB_USER');
		$db_pass = getenv('DB_PASS');
		$db_name = getenv('DB_NAME');
		
		require_once('Sequel.php');
		$this->sql = new Sequel(new PDO("mysql:host=localhost;dbname=$db_name;charset=utf8mb4;", $db_user, $db_pass));

		$this->slugify = new Slugify();
	}

	////////////////////////
	// SETTINGS / HELPERS //
	////////////////////////

	public function get_setting($name){
		return $this->sql->selectOne("settings", array("setting_name" => $name))['setting_value'];
	}

	public function is_active_page($view_schtuff, $page_slug_leader){
	    return substr($view_schtuff['meta']['page_slug'], 0, strlen($page_slug_leader)) === $page_slug_leader;
    }

	/////////////////
	// ERROR PAGES //
	/////////////////

	public function error_404(){
		return array(
			'meta' => array(
				"page_name" => '404',
				"page_slug" => "404",
				"page_type" => "error"
			),
			'view' => '404.php'
		);
	}

	///////////
	// POSTS //
	///////////

	public function posts($slug){

		// if a slug was passed
		if(!is_null($slug)){
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
			$posts = $this->sql->query("SELECT * FROM posts ORDER BY post_submitted desc");
			// build return
			$pass = array(
				'meta' => array(
					"page_name" => "",
					"page_slug" => "home"
				),
				'view' => 'posts.php',
				'data' => array(
					"posts" => $posts
				)	
			);
			return $pass;
		}
	}

	//////////////
    // PROJECTS //
    //////////////

    public function projects($slug){

        // if a slug was passed
        if(!is_null($slug)){
            $project = $this->sql->selectOne("projects", array("project_slug" => $slug));
            $pass = array(
                'meta' => array(
                    "page_name" => $project['project_title'],
                    "page_slug" => "projects"
                ),
                'view' => 'proj-single.php',
                'data' => array(
                    "project" => $project
                )
            );
            return $pass;
        }

        // if a slug was not passed
        else{
            // get projects
            $projects = $this->sql->query("SELECT * FROM projects ORDER BY project_year desc, project_submitted asc");
            // build return
            $pass = array(
                'meta' => array(
                    "page_name" => "",
                    "page_slug" => "projects"
                ),
                'view' => 'projects.php',
                'data' => array(
                    "projects" => $projects
                )
            );
            return $pass;
        }
    }

	////////////////////
	// ADMIN SECTIONS //
	////////////////////

	public function admin($route){
        if(!isset($_SESSION[$this->get_setting('site.unique-key')."_username"]) && !in_array($route[1], array('login', 'register'))){
            return $this->admin(array('admin', 'login'));
        }

		switch($route[1]){

			// LOGIN/REGISTER/LOGOUT
			case 'login':

				// check if already logged in
				if($_SESSION[$this->get_setting('site.unique-key')."_username"] != ''){
					return $this->admin(array('admin', 'posts'));
				}

				// not logged in, serve login page
				else{
					return array(
						'meta' => array(
							"page_name" => 'Login',
							"page_slug" => 'login'
						),
						'view' => 'login.php'
					);
				}
				break;
            case 'register':

                // check if already logged in
                if($_SESSION[$this->get_setting('site.unique-key')."_username"] != ''){
                    return $this->admin(array('admin', 'posts'));
                }

                // not logged in, serve register page
                else{
                    return array(
                        'meta' => array(
                            "page_name" => 'Register',
                            "page_slug" => 'register'
                        ),
                        'view' => 'register.php'
                    );
                }
                break;
            case 'logout':
                unset($_SESSION[$this->get_setting('site.unique-key')."_username"]);
                session_destroy();
                return $this->admin(array('admin','login'));
                break;

			// POST LIST (default)
			case '':
			case 'posts':
				switch($route[2]){
					case 'new':
						return array(
							'meta' => array(
								"page_name" => 'Create a Post',
								"page_slug" => 'posts-new'
							),
							'view' => 'posts-new.php'
						);
						break;
					case 'edit':
						// check if we weren't passed a post slug
						if($route[3] == null) return $this->error_404();
						// return post edit view
						return array(
							'meta' => array(
								"page_name" => 'Edit Post',
								"page_slug" => 'posts-edit'
							),
							'data' => $this->sql->selectOne('posts', array('post_slug' => $route[3])),
							'view' => 'posts-edit.php'
						);
						break;
					default:
						return array(
							'meta' => array(
								"page_name" => 'Posts',
								"page_slug" => "posts"
							),
							'view' => 'posts.php'
						);
				}
			case 'projects':
				switch($route[2]){
					case 'new':
						return array(
							'meta' => array(
								"page_name" => 'Create a Project',
								"page_slug" => 'projects-new'
							),
							'view' => 'projects-new.php'
						);
						break;
					case 'edit':
						// check if we weren't passed a project slug
						if($route[3] == null) return $this->error_404();
						// return project edit view
						return array(
							'meta' => array(
								"page_name" => 'Edit Project',
								"page_slug" => 'projects-edit'
							),
							'data' => $this->sql->selectOne('projects', array('project_slug' => $route[3])),
							'view' => 'projects-edit.php'
						);
						break;
					default:
						return array(
							'meta' => array(
								"page_name" => 'Projects',
								"page_slug" => "projects"
							),
							'view' => 'projects.php'
						);
				}
		}
	}
}