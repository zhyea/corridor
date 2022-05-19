<?php
/**
 * The footer for corridor.
 *
 * @package Corridor
 */
?>
<div class="foot">
	<div class="row">
		<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
			<?php dynamic_sidebar( 'footer-widget' ); ?>
		<?php endif; ?>
	</div>
	<div class="copyright">
		<?php corridor_credit_link() ?>
	</div>
</div>
<div class="clear"></div>
</div>

<?php wp_footer(); ?>

</body>
</html>

