<?php
// header file

$header_class = $full_header ? 'full' : '';
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $VIEW_DATA['meta']['page_name'] . ' - ' . $app->get_setting('site.title'); ?></title>
		<meta charset='utf-8'>
		<link rel="stylesheet" href="https://<?php echo $app->get_setting('site.url'); ?>/views/css.php">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	</head>
	<body>
		<header id="page_top" class="page_width <?php echo $header_class; ?>">
			<section id="navigation">
				<nav>
					<a href="https://lucaslower.com">Home</a>
					<a href="https://lucaslower.com/about">About</a>
					<a href="https://lucaslower.com/projects">Projects</a>
				</nav>
				<nav>
					<a href="https://github.com/lucaslower">Github</a>
					<a href="mailto:lucas@lucaslower.com">Mail</a>
				</nav>
			</section>

			<?php if($full_header){ ?>
			<h1><?php echo $app->get_setting('site.title'); ?></h1>
			<p><?php echo $app->get_setting('site.bio'); ?></p>
			<?php } ?>
		</header>