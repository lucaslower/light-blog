<?php
include __DIR__ . "/layout/header.php";

$post = $VIEW_DATA['data'];
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

        <!-- edit post form -->
        <form action="https://<?php echo $app->get_setting('site.url'); ?>/post/edit_post.php" method="POST">

            <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">

            <!-- POST TITLE -->
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Title</span>
                    </div>
                    <input type="text" class="form-control" name="post_title" id="post_title" placeholder="Enter post title" value="<?php echo addslashes($post['post_title']); ?>">
                </div>
            </div>

            <!-- POST TAGS -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tags</span>
                    </div>
                    <select class="form-control" name="post_tags[]" multiple id="tags">
						<?php
						$tags = $app->sql->query('SELECT tag_id, tag_label FROM posts_tags JOIN tags USING (tag_id) WHERE post_id = ?', array($post['post_id']));
						foreach($tags as $tag){
							echo '<option selected value="tag_id|'.$tag['tag_id'].'">'.$tag['tag_label'].'</option>';
						}
						?>
                    </select>
                </div>
            </div>

            <!-- POST CONTENT -->
            <div class="form-group">
                <textarea class="form-control tiny" name="post_content" id="post_content" rows="10"><?php echo $post['post_content']; ?></textarea>
            </div>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-check mr-3"></i>Publish</button>
            </div>

        </form>
    </main>

<?php
include __DIR__ . "/layout/footer.php";