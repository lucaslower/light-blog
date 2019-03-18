<?php
// header file

$header_class = $full_header ? 'full' : '';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php 
			$page_title = $VIEW_DATA['meta']['page_name'];
			if($page_title == ''){
				echo $app->get_setting('site.title'); 
			}
			else{
				echo $VIEW_DATA['meta']['page_name'] . ' - ' . $app->get_setting('site.title'); 
			}
			?>
		</title>
		<meta charset="utf-8">
		<meta name="description" content="Comp Sci major and Web Dev at EIU" />
		<meta name="author" content="Lucas Lower">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="https://<?php echo $app->get_setting('site.url'); ?>/views/default/assets/favicon.png" />
		<link rel="stylesheet" href="https://<?php echo $app->get_setting('site.url'); ?>/views/css.php">
		<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:400,400i|IBM+Plex+Sans:300,300i,400,400i,600,700" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	</head>
	<body>
		<div id="page_wrap">
		<header id="page_top" class="page_width <?php echo $header_class; ?>">
			<section id="navigation">
				<nav>
					<a href="https://lucaslower.com">Home</a>
					<a href="https://lucaslower.com/about">About</a>
					<a href="https://lucaslower.com/projects">Projects</a>
				</nav>
				<nav>
					<a href="https://github.com/lucaslower"><i class="fab fa-github"></i></a>
					<a href="mailto:lucas@lucaslower.com"><i class="fas fa-envelope"></i></a>
				</nav>
			</section>

			<?php if($full_header){ ?>
			<h1><?php echo $app->get_setting('site.title'); ?></h1>
			<p><?php echo $app->get_setting('site.bio'); ?></p>

			<!-- fancy text effect thing -->
			<p>I &nbsp;<i style="color:#D84343;font-size:0.85em;" class="far fa-heart"></i>&nbsp; <span id="type_changer"></span></p>
			<?php } ?>
		</header>