<?php

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

	<title>Register &rarr; LightBlog</title>
</head>
<body class="bg-blue-grey-lighten-5">

	<!-- Begin page content -->
	<main role="main" class="container">

		<div class="row justify-content-center">
			<div class="col-md-4">
				<form class="form-register" action="https://<?php echo $app->get_setting('site.url'); ?>/post/register.php" method="POST">
					<h1 class="h3 mt-5 mb-3 font-weight-normal text-center">Create an account:<br><?php echo $app->get_setting('site.title'); ?></h1>

					<div class="list-group mb-3">
						<input type="text" id="username" name="username" class="list-group-item" placeholder="Username" required="" autofocus="">
						<input type="password" id="password" name="password" class="list-group-item" placeholder="Password" required="">
                        <input type="password" id="confirm_password" name="confirm_password" class="list-group-item" placeholder="Confirm Password" required="">
                        <input type="password" id="unique-key" name="unique-key" class="list-group-item" placeholder="Site Unique Key" required="">
					</div>

					<button class="btn btn-lg btn-primary btn-block" id="sendthatform" type="button">Create Account</button>
				</form>
			</div>
		</div>

	</main>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#sendthatform').on('click', function(){
               if($('#password').val() === $('#confirm_password').val()) $('.form-register').submit();
               else alert('Your passwords must match.');
            });
        });
    </script>

<?php
include __DIR__ . "/layout/footer.php";