<?php
$full_header = false;
include __DIR__ . "/layout/header.php";

// single projects list view

// initialize data
$projects = $VIEW_DATA['data']['projects'];
?>

<section id="content" class="page_width projects">

    <h3><?php echo $VIEW_DATA['meta']['page_name']; ?></h3>

<?php foreach($projects as $proj){ ?>

    <?php if($proj['project_content'] != ''){ ?>
    <a class="readmore" href="https://<?php echo $app->get_setting('site.url')."/projects/".$proj['project_slug']; ?>">
    <?php } ?>

    <article class="post">



        <div class="title_wrap">
            <span class="year"><?php echo $proj['project_year']; ?></span>
            <h3>
                <?php if($proj['project_content'] != ''){ ?>
                    <div class="slider_thing"></div>
                <?php } ?>
                <span>
                    <?php echo $proj['project_title']; ?>
                </span>
            </h3>
        </div>


        <div class="post_content">
            <?php echo $proj['project_blurb']; ?>

            <?php if($proj['project_content'] != ''){ ?>
            <span class="more">More &rarr;</span>
            <?php } ?>
        </div>

    </article>

    <?php if($proj['project_content'] != ''){ ?>
    </a>
    <?php } ?>
<?php } ?>

</section>

<?php
include __DIR__ . "/layout/footer.php";