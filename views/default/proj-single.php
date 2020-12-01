<?php
$full_header = false;
include __DIR__ . "/layout/header.php";

// single post view

// initialize data
$project = $VIEW_DATA['data']['project'];
?>

<section id="content" class="page_width">

<article class="post">
<p class="date"><?php echo $project['project_year']; ?></p>
<h2><?php echo $project['project_title']; ?></h2>
<div class="post_content">
<?php
    echo "<p class='intro'>".$project['project_blurb']."</p>";
    echo $project['project_content'];
?>
    <div class="more_proj"><a href="https://<?php echo $app->get_setting('site.url'); ?>/projects">More projects &rarr;</a></div>
</div>
</article>

</section>

<?php
include __DIR__ . "/layout/footer.php";