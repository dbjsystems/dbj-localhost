<footer class="footer">
	<div class="container">
		<p class="text-muted">You are running DesktopServer <?php echo $ds_runtime->preferences->edition; ?> edition version <?php echo $ds_runtime->preferences->version; ?></p>
		<?php $ds_runtime->do_action("ds_footer"); ?>
	</div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://localhost/js/jquery.min.js"></script>
<script src="http://localhost/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="http://localhost/js/ie10-viewport-bug-workaround.js"></script>
<script src="http://localhost/js/preserveAliases.js"></script>
<script src="http://localhost/js/jquery.tablesorter.js"></script>

<!-- Sorting -->
<script type="text/javascript" id="js">
	$(document).ready(function() {
		// call the tablesorter plugin
		$("table").tablesorter({
		});
	});
</script>
</body>
</html>