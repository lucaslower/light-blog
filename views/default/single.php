<?php
$full_header = false;
include __DIR__ . "/layout/header.php";

// single post view

// initialize data
$post = $VIEW_DATA['data']['post'];
?>

<section id="content" class="page_width">

<article class="post">
<p class="date"><?php echo date('l, F d, Y', strtotime($post['post_submitted'])); ?></p>
<h2><?php echo $post['post_title']; ?></h2>
<div class="post_content">
<?php echo $post['post_content']; ?>
</div>
</article>

</section>

<?php
include __DIR__ . "/layout/footer.php";