<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post();
	$featured = get_field('featured_image');
	$size = "create-featured-900";
	$image = wp_get_attachment_image_src( $featured, $size );
	$tagline = get_field('tagline');
	$information = get_field('information');
	echo '<div class="main-container">';
		echo '<div class="row">';
			echo '<div class="large-12 columns">';
				echo '<h2 class="portfolio-item-title">';
				the_title();
				echo '</h2>';
			echo '</div>';
		echo '</div>';
		echo '<div class="row">';
			echo '<div class="large-12 columns">';
				echo '<img class="featured-image" src="'.$image[0].'">';
			echo '</div>';
		echo '</div>';
		echo '<div class="row">';
			echo '<div class="large-9 columns portfolio-info">';
				echo '<h3>Information</h3>';
				echo '<p>';
				the_field('information');
				echo '</p>';
			echo '</div>';
			echo '<div class="large-3 columns pt portfolio-info">';
			$date = get_field('date');
			$client = get_field('client');
			$skills = get_field('skills');
			$tools = get_field('tools');
			$link = get_field('link');
			if (!empty($date) || !empty($client) || !empty($skills) || !empty($tools) || !empty($link)) {
				if (!empty($date)) {
					echo '<h4>Date</h4>';
					echo '<p class="details">'.$date.'</p>';
				}
				if (!empty($client)) {
					echo '<h4>Client</h4>';
					echo '<p class="details">'.$client.'</p>';
				}
				if(!empty($skills[0]['skill'])) {
					echo '<h4>Skills</h4>';
					echo '<p class="details">';
					$last_element = end(array_keys($skills));
					foreach ($skills as $key => $value) {
						$skill = $value['skill'];
						if ($key === $last_element) {
							echo $skill;
						} else {
							echo $skill.', ';
						}
					}
					echo '</p>';
				}
				if(!empty($tools[0]['tool'])) {
					echo '<h4>Tools</h4>';
					echo '<p class="details">';
					$last_element = end(array_keys($tools));
					foreach ($tools as $key => $value) {
						$tool = $value['tool'];
						if ($key === $last_element) {
							echo $tool;
						} else {
							echo $tool.', ';
						}
					}
					echo '</p>';
				}				
				if (!empty($link)) {
					echo '<h4>Link</h4>';
					echo '<p class="details"><a href="'.$link.'">View project &gt;</a></p>';
				}
			}
			echo '</div>';
		echo '</div>';
		$additional_images = get_field('additional_images');
		if(!empty($additional_images[0]['image'])) {
			foreach ($additional_images as $key => $value) {
				$image1 = $value['image'];
				$image2 = $value['image_2'];
				$fullsize = "create-featured-900";
				$halfsize = "create-half-450";
				$full = wp_get_attachment_image_src( $image1, $fullsize );
				$half1 = wp_get_attachment_image_src( $image1, $halfsize );
				$half2 = wp_get_attachment_image_src( $image2, $halfsize );
				if (empty($image2)) {
					echo '<div class="row">';
						echo '<div class="large-12 columns">';
							echo '<img class="full-image" src="'.$full[0].'">';
						echo '</div>';
					echo '</div>';
				} else {
					echo '<div class="row">';
						echo '<div class="small-6 columns">';
							echo '<img class="half-image" src="'.$half1[0].'">';
						echo '</div>';
						echo '<div class="small-6 columns">';
							echo '<img class="half-image" src="'.$half2[0].'">';
						echo '</div>';
					echo '</div>';
				}
			}
		}
	endwhile;
		echo '<div class="row">';
			echo '<div class="large-12 columns">';
				echo '<div class="portfolio-nav-links">';
					previous_post_link('%link', 'Previous');
					next_post_link('%link', 'Next');
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
	else : ?>
	<div class="main-container">
		<div class="row">
			<div class="large-10 large-offset-1 columns">
				<article id="post-not-found" class="hentry clearfix">
					<h2><?php _e("Post not found", "createtheme"); ?></h2>
					<section class="entry-content">
						<p><?php _e("Somethings gone wrong here.", "createtheme"); ?></p>
					</section>
				</article>
			</div>		
		</div>
	</div>
	<?php endif; ?>

<?php get_footer(); ?>