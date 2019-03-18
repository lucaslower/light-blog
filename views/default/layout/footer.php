		<footer id="page_bottom" class="page_width">
		&copy; <?php echo date('Y')." ".$app->get_setting('site.title'); ?>, unless otherwise stated.<br>
		<small>Icons by <a href="https://fontawesome.com">FontAwesome</a> &mdash; <a href="https://mattboldt.com/demos/typed-js/">typed.js</a> by <a href="https://mattboldt.com">Matt Boldt</a>.</small>
		</footer>

		<!-- CUSTOM JS -->
		<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
		<script type="text/javascript">
			var options = {
			strings: ["Rhea.", "the ocean.", "traveling.", "Costa Rica.", "writing."],
			typeSpeed: 100,
			backSpeed: 40,
			backDelay: 4000,
			startDelay: 500,
			loop: true
			}

			var typed = new Typed("#type_changer", options);
		</script>
		</div>
	</body>
</html>