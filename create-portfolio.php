<?php /* Template Name: Portfolio */ ?>

<?php get_header(); ?>

	<?php
		$header_option = get_field('header', 'options');
		if ($header_option == 'Text') {
			echo '<div class="hero-container">';
				echo '<div class="row">';
					echo '<div class="large-12 columns">';
						echo '<h2>';
						the_field('header_text', 'options');
						echo '</h2>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '<div class="main-container">';
		} elseif ($header_option == 'Image') {
			$headimg = get_field('header_image', 'options');
			$format = "create-featured-900";
			$img = wp_get_attachment_image_src( $headimg, $format );
			echo '<div class="main-container head-img">';
				echo '<div class="row">';
					echo '<div class="large-12 columns">';
						echo '<img class="header-image" src="'.$img[0].'">';
					echo '</div>';
				echo '</div>';
		} else {
			echo '<div class="hero-container">';
				echo '<div class="row">';
					echo '<div class="large-12 columns">';
						echo '<p class="warning">Please update your settings from the Home Page Options page on the dashboard.</p>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '<div class="main-container">';
		}
	?>
	<div class="row">
	<?php
		$columns_option = get_field('number_of_columns', 'options');
		if ($columns_option == '3') { 
			$args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1 );
			$portfolio_query = new WP_Query( $args );
			if($portfolio_query->have_posts()) : while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); 
				$attachment_id = get_field('thumbnail');
				$size = "create-thumb-600";
				$image = wp_get_attachment_image_src( $attachment_id, $size );
				echo '<div class="large-4 columns">';
					echo '<a class="thumbnail" href="';
					the_permalink();
					echo '"><img src="'.$image[0].'">';
					echo '<span class="overlay">';
						echo '<h3>';
						the_title();
						echo '</h3>';
					echo '</span></a>';
				echo '</div>';
			endwhile; else :
				echo '<div class="large-12 columns">';
					echo '<p class="warning">There are currently no Portfolio Items available. Please add them from the dashboard.</p>';
				echo '</div>';
			endif;
			wp_reset_postdata();
		} elseif ($columns_option == '4') {
			$args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1 );
			$portfolio_query = new WP_Query( $args );
			if($portfolio_query->have_posts()) : while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); 
				$attachment_id = get_field('thumbnail');
				$size = "create-thumb-600";
				$image = wp_get_attachment_image_src( $attachment_id, $size );
				echo '<div class="large-3 columns">';
					echo '<a class="thumbnail" href="';
					the_permalink();
					echo '"><img src="'.$image[0].'">';
					echo '<span class="overlay">';
						echo '<h3>';
						the_title();
						echo '</h3>';
					echo '</span></a>';
				echo '</div>';
			endwhile; else :
				echo '<div class="large-12 columns">';
					echo '<p class="warning">There are currently no Portfolio Items available. Please add them from the dashboard.</p>';
				echo '</div>';
			endif;
			wp_reset_postdata();		} else {
			echo '<div class="large-12 columns">';
				echo '<p class="warning">Please update your settings from the Home Page Options page on the dashboard.</p>';
			echo '</div>';
		}
		?>
		</div>
	</div>
	<div class="details-container">
		<div class="row">
			<div class="large-6 columns pbmob">
				<h3>About</h3>
				<?php 
					$about = get_field('about_mini', 'options');
					if (!empty($about)) {
						echo '<p>'.$about.'</p>';
					} else {
						echo '<p class="warning">Please update your settings from the Home Page Options page on the dashboard.</p>';
					}
				?>
			</div>
			<div class="large-6 columns">
				<h3>Contact</h3>
				<?php 
					$contact = get_field('contact', 'options');
					$email = get_field('email_address', 'options');
					$facebook = get_field('facebook_link', 'options');
					$twitter = get_field('twitter_link', 'options');
					$googleplus = get_field('googleplus_link', 'options');
					$linkedin = get_field('linkedin_link', 'options');
					$flickr = get_field('flickr_link', 'options');
					$dribbble = get_field('dribbble_link', 'options');
					$tumblr = get_field('tumblr_link', 'options');
					$vimeo = get_field('vimeo_link', 'options');
					$deviantart = get_field('deviantart_link', 'options');
					$zerply = get_field('zerply_link', 'options');
					$instagram = get_field('instagram_link', 'options');
					if (!empty($contact)) {
						echo '<p>'.$contact.'</p>';
						echo '<div class="contact-links">';
							echo '<a class="button email" href="mailto:'.$email.'">Email me</a>';
							if (!empty($facebook) || !empty($twitter) || !empty($googleplus) || !empty($linkedin) || !empty($flickr) || !empty($dribbble) || !empty($tumblr) || !empty($vimeo) || !empty($deviantart) || !empty($zerply) || !empty($instagram)) {
								echo '<p class="or">or</p>';
								echo '<ul class="social-links">';
									if (!empty($facebook)) {
										echo '<li><a class="social-link" href="'.$facebook.'" data-icon="&#xe004;" target="_blank"></a></li>';
									}
									if (!empty($twitter)) {
										echo '<li><a class="social-link" href="'.$twitter.'" data-icon="&#xe002;" target="_blank"></a></li>';
									}
									if (!empty($googleplus)) {
										echo '<li><a class="social-link" href="'.$googleplus.'" data-icon="&#xe00a;" target="_blank"></a></li>';
									}
									if (!empty($linkedin)) {
										echo '<li><a class="social-link" href="'.$linkedin.'" data-icon="&#xe010;" target="_blank"></a></li>';
									}
									if (!empty($flickr)) {
										echo '<li><a class="social-link" href="'.$flickr.'" data-icon="&#xe007;" target="_blank"></a></li>';
									}					
									if (!empty($dribbble)) {
										echo '<li><a class="social-link" href="'.$dribbble.'" data-icon="&#xe008;" target="_blank"></a></li>';
									}
									if (!empty($tumblr)) {
										echo '<li><a class="social-link" href="'.$tumblr.'" data-icon="&#xe009;" target="_blank"></a></li>';
									}
									if (!empty($vimeo)) {
										echo '<li><a class="social-link" href="'.$vimeo.'" data-icon="&#xe006;" target="_blank"></a></li>';
									}
									if (!empty($deviantart)) {
										echo '<li><a class="social-link" href="'.$deviantart.'" data-icon="&#xe000;" target="_blank"></a></li>';
									}
									if (!empty($zerply)) {
										echo '<li><a class="social-link" href="'.$zerply.'" data-icon="&#xe00d;" target="_blank"></a></li>';
									}
									if (!empty($instagram)) {
										echo '<li><a class="social-link" href="'.$instagram.'" data-icon="&#xe003;" target="_blank"></a></li>';
									}
								echo '</ul>';
							}
						echo '</div>';
					} else {
						echo '<p class="warning">Please update your settings from the Home Page Options page on the dashboard.</p>';
					}
				?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>