<?php
$full_header = false;
include __DIR__ . "/layout/header.php";

// 404 view
?>

<section id="content" class="page_width">
	<article class="error">
		<h1>404</h1>
		<p>I can't seem to find that page&nbsp;&mdash;&nbsp;<a href="/">go home &rarr;</a></p>
	</article>
</section>

<?php
include __DIR__ . "/layout/footer.php";