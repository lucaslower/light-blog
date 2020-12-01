<?php
include __DIR__ . "/layout/header.php";

$project = $VIEW_DATA['data'];
?>

    <!-- Begin page content -->
    <main role="main" class="container pb-5">
        <h1 class="mt-5 mb-3">
            <?php echo $VIEW_DATA['meta']['page_name']; ?>
            <a href="https://<?php echo $app->get_setting('site.url'); ?>/admin/new">
                <button type="button" class="btn btn-outline-danger btn-lg float-right">
                    <i class="fa fa-trash mr-1"></i>
                    Trash
                </button>
            </a>
        </h1>

        <!-- edit project form -->
        <form action="https://<?php echo $app->get_setting('site.url'); ?>/post/edit_project.php" method="POST">

            <input type="hidden" name="project_id" value="<?php echo $project['project_id']; ?>">

            <!-- PROJECT TITLE -->
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Title</span>
                    </div>
                    <input type="text" class="form-control" name="project_title" id="project_title" placeholder="Enter project title" value="<?php echo addslashes($project['project_title']); ?>">
                </div>
            </div>

            <!-- PROJECT BLURB -->
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Intro</span>
                    </div>
                    <textarea class="form-control" name="project_blurb" id="project_blurb" rows="4"><?php echo $project['project_blurb']; ?></textarea>
                </div>
            </div>

            <!-- PROJECT YEAR -->
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Year</span>
                    </div>
                    <input type="text" class="form-control" name="project_year" id="project_year" placeholder="xxxx" value="<?php echo $project['project_year']; ?>">
                </div>
            </div>

            <!-- PROJECT CONTENT -->
            <div class="form-group">
                <textarea class="form-control tiny" name="project_content" id="project_content" rows="10"><?php echo $project['project_content']; ?></textarea>
            </div>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-check mr-3"></i>Publish</button>
            </div>

        </form>
    </main>

<?php
include __DIR__ . "/layout/footer.php";