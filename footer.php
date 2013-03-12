	<footer>
		<div class="row">
			<div class="large-12 columns">
				<p class="copyright">&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
				<p class="createportfolio"><a href="http://createportfol.io">createportfol.io</a></p>
			</div>
		</div>
	</footer>
<?php wp_footer(); ?>
<?php 
	$google_analytics = get_field('google_analytics', 'options');
	if (!empty($google_analytics)) {
		echo '<script>';
			echo $google_analytics;
		echo '</script>';
	}
?>
</body>

</html>