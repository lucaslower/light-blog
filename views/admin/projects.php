<?php
include __DIR__ . "/layout/header.php";
?>

    <!-- Begin page content -->
    <main role="main" class="container">
        <h1 class="mt-5 mb-3">
            <?php echo $VIEW_DATA['meta']['page_name']; ?>
            <a href="https://<?php echo $app->get_setting('site.url'); ?>/admin/projects/new">
            <button type="button" class="btn btn-outline-primary btn-lg float-right">
                <i class="fa fa-plus mr-2"></i>
                Project
            </button>
            </a>
        </h1>

        <!-- POSTS TABLE -->
        <div class="card">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Year</th>
                <th scope="col" class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
			$posts = $app->sql->query("SELECT * FROM projects ORDER BY project_year desc")->toArray();
            $site_url = $app->get_setting('site.url');
            foreach($posts as $post){

                echo '<tr>';
                echo '<td>'.$post['project_title'].'</td>';
                echo '<td>'.$post['project_year'].'</td>';
                echo '<td class="text-right">';
				echo '<a href="https://'.$site_url.'/admin/projects/edit/'.$post['project_slug'].'/"><button type="button" class="btn btn-sm btn-primary mr-2">Edit<i class="fa fa-edit ml-2"></i></button></a>';
                echo '<a target="_blank" href="https://'.$site_url.'/projects/'.$post['project_slug'].'/"><button type="button" class="btn btn-sm btn-secondary">View<i class="fa fa-external-link-square-alt ml-2"></i></button></a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
        </div>
    </main>

<?php
include __DIR__ . "/layout/footer.php";