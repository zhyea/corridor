<?php
/**
 * The index for corridor.
 *
 * @package Corridor
 */

get_header();
?>

	<div class="body" id="content-body">
		<div class="post-gallery">
			<!-- start post -->
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'gallery' );
				endwhile;
			endif; ?>
			<!-- end post -->
			<div class="clear"></div>
		</div>

		<?php corridor_pagination(); ?>
	</div>

<?php
get_footer();
