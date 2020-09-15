<?php
include __DIR__ . "/layout/header.php";

?>

    <!-- Begin page content -->
    <main role="main" class="container pb-5">
        <h1 class="mt-5 mb-3">
            Create a Project
        </h1>

        <!-- new project form -->
        <form action="https://<?php echo $app->get_setting('site.url'); ?>/post/create_project.php" method="POST">

            <!-- PROJECT TITLE -->
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Title</span>
                    </div>
                    <input type="text" class="form-control" name="project_title" id="project_title" placeholder="Enter project title">
                </div>
            </div>

            <!-- PROJECT CONTENT -->
            <div class="form-group">
                <textarea class="form-control" name="project_content" id="project_content" rows="10"></textarea>
            </div>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-check mr-3"></i>Publish</button>
            </div>

        </form>
    </main>

<?php
include __DIR__ . "/layout/footer.php";