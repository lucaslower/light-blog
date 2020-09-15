<?php
// admin footer
?>

<footer class="footer">
	<div class="container text-center">
		Powered by <a href="https://lucaslower.com/projects/light-blog">LightBlog</a>&nbsp;&nbsp;&mdash;&nbsp;&nbsp;Crafted with Care by <a href="https://lucaslower.com">Lucas Lower</a>.
	</div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://<?php echo $app->get_setting('site.url'); ?>/views/admin/assets/js/tinymce/tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector:'textarea',
        min_height:400,
        plugins: ['autoresize', 'lists'],
        autoresize_bottom_margin:20,
        toolbar: 'undo redo | styleselect | bold italic | bullist | link image'
    });
    $(document).ready(function(){
        $('#tags').select2({
            placeholder: "Set your post's tags",
            minimumInputLength: 2,
            tags: true,
            createTag: function(params){
                // get tag label
                var term = $.trim(params.term);
                if(term === '') return null;
                // pass to select2
                return{
                    id: 'tag_label|'+term,
                    text: term
                }
            },
            ajax: {
                url: "https://<?php echo $app->get_setting('site.url'); ?>/app/ajax.php",
                data: function(params){
                    return {
                        func: "tag_search_select2",
                        q: params.term
                    }
                }
            }
        });
    });
</script>
</body>
</html>

