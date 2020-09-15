<?php
$full_header = true;
include __DIR__ . "/layout/header.php";

// posts view

// initialize data
$posts = $VIEW_DATA['data']['posts'];
?>

<section id="content" class="page_width">

<section class="posts">
	<?php
	$prev_year = '';
	foreach($posts->toArray() as $post){
		$timestamp = strtotime($post['post_submitted']);
		$cur_year = date('Y', $timestamp);
		if($cur_year != $prev_year){
			echo '<h2 class="year">'.$cur_year.'</h2>';
		}
		$prev_year = $cur_year;
		echo '<article onclick="window.location = \'posts/' . $post['post_slug'] . '\';" class="post">';
		echo '<span class="title">'.$post['post_title'].'</span>';
		echo '<span class="date">'.date('M d', $timestamp).'</span>';
		echo '</article>';
	}
	?>
</section>
</section>

<?php
include __DIR__ . "/layout/footer.php";