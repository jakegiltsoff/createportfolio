<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
	<div class="hero-container">
		<?php 
			$blog_page_id = get_option( 'page_for_posts' );
    		$blog_permalink = _get_page_link( $blog_page_id ); 
			echo '<div class="row">';
				echo '<div class="large-12 columns">';
					echo '<h2><a href="'.$blog_permalink.'" title="Blog home">';
					the_title();
					echo '</a></h2>';
				echo '</div>';
			echo '</div>';
		?>
	</div>
	<div class="main-container">
		<div class="row">
			<div class="large-10 large-offset-1 columns">
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">	
					<section class="entry-content clearfix">
						<?php if ( has_post_thumbnail()) the_post_thumbnail('create-featured-900'); ?>
						<?php the_content(); ?>
					</section>
					<p class="date-single"><a href="<?php echo $blog_permalink; ?>" title="Blog home"><?php printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'createtheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format'))); ?></a></p>
				</article>
				<?php endwhile; ?>
				<?php previous_post_link('%link', 'Previous'); ?>
				<?php next_post_link('%link', 'Next'); ?>
				<?php else : ?>
				<article id="post-not-found" class="hentry clearfix">
					<h2><?php _e("Post not found", "createtheme"); ?></h2>
					<section class="entry-content">
						<p><?php _e("Somethings gone wrong here.", "createtheme"); ?></p>
					</section>
				</article>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>