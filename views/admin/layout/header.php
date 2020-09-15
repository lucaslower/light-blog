<?php
// admin header
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://<?php echo $app->get_setting('site.url'); ?>/views/admin/assets/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

	<title>Dashboard &rarr; LightBlog</title>
</head>
<body class="bg-blue-grey-lighten-5">

<header>
	<!-- Fixed navbar -->
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-blue-grey-darken-1">
        <div class="container pt-2 pb-2 pr-0 pl-0">
            <a class="navbar-brand d-inline-block mr-4" href="#"><?php echo $app->get_setting('site.title'); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php if(strpos($VIEW_DATA['meta']['page_slug'],'posts') <= 0) echo 'active'; ?> mr-2">
                        <a class="nav-link" href="https://<?php echo $app->get_setting('site.url'); ?>/admin/posts">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pages</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            lucaslower
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fa fa-user-circle mr-2"></i>Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://<?php echo $app->get_setting('site.url'); ?>/admin/logout"><i class="fa fa-sign-out-alt mr-2"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
	</nav>
</header>