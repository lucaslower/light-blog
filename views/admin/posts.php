<?php
include __DIR__ . "/layout/header.php";
?>

    <!-- Begin page content -->
    <main role="main" class="container">
        <h1 class="mt-5 mb-3">
            <?php echo $VIEW_DATA['meta']['page_name']; ?>
            <a href="https://<?php echo $app->get_setting('site.url'); ?>/admin/posts/new">
            <button type="button" class="btn btn-outline-primary btn-lg float-right">
                <i class="fa fa-plus mr-2"></i>
                Post
            </button>
            </a>
        </h1>

        <!-- POSTS TABLE -->
        <div class="card">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Tags</th>
                <th scope="col" class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
			$posts = $app->sql->query("SELECT * FROM posts ORDER BY post_submitted desc")->toArray();
            $site_url = $app->get_setting('site.url');
            foreach($posts as $post){

                // get tags
                $tags = $app->sql->query(
                    "SELECT GROUP_CONCAT(tag_label) as labels FROM posts_tags LEFT JOIN tags USING (tag_id) WHERE post_id = ? GROUP BY post_id",
                    array($post['post_id'])
                )->toArray()[0]['labels'];

                echo '<tr>';
                echo '<td>'.$post['post_title'].'</td>';
                echo '<td>'.date('D, M jS, Y', strtotime($post['post_submitted'])).'</td>';
                echo '<td>'.$tags.'</td>';
                echo '<td class="text-right">';
				echo '<a href="https://'.$site_url.'/admin/posts/edit/'.$post['post_slug'].'/"><button type="button" class="btn btn-sm btn-primary mr-2">Edit<i class="fa fa-edit ml-2"></i></button></a>';
                echo '<a target="_blank" href="https://'.$site_url.'/posts/'.$post['post_slug'].'/"><button type="button" class="btn btn-sm btn-secondary">View<i class="fa fa-external-link-square-alt ml-2"></i></button></a>';
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