<?php get_header(); ?>

	<div class="hero-container">
		<?php 
			$blog_page_id = get_option( 'page_for_posts' );
			$blog_permalink = _get_page_link( $blog_page_id ); 
			echo '<div class="row">';
				echo '<div class="large-12 columns">';
					echo '<h2><a href="'.$blog_permalink.'" title="Blog home">Blog</a></h2>';
				echo '</div>';
			echo '</div>';
		?>
	</div>
	<div class="main-container">
		<div class="row">
			<div class="large-10 large-offset-1 columns">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<section class="entry-content clearfix">
						<?php if ( has_post_thumbnail()) the_post_thumbnail('create-featured-900'); ?>
						<?php the_excerpt(); ?>
					</section>
					<p class="date"><?php printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'createtheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format'))); ?> <a class="fullpost" href="<?php the_permalink(); ?>">View post &gt;</a></p>
				</article>
				<?php endwhile; ?>
				<?php next_posts_link('Older', 0); ?>
				<?php previous_posts_link('Newer', 0); ?>
				<?php else : ?>
				<article id="post-not-found" class="hentry clearfix">
					<h2><?php _e("Nothing to see here", "createtheme"); ?></h2>
					<section class="entry-content">
						<p><?php _e("I haven&rsquo;t written any blog posts yet. Check back soon.", "createtheme"); ?></p>
					</section>
				</article>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>