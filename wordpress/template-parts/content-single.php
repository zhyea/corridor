<?php
/**
 * The template for displaying single posts
 *
 * @package Corridor
 */
?>
<div class="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-title">
		<h2><a href="#"><?php the_title(); ?></a></h2>
	</div>
	<div class="article-meta">
		<div class="social">
			<?php corridor_social_buttons() ?>
		</div>
		<div class="keywords">
			<?php echo get_the_tag_list( '', ' ' ) ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="article-content">
		<?php the_content( '' ); ?>
	</div>

	<nav class="navigation">
		<?php wp_link_pages( array(
			'before' => '<div class="pagination">',
			'after'  => '</div>',
		) ); ?>
	</nav>
</div>