<?php
/**
 * The footer for corridor.
 *
 * @package Corridor
 */
?>
<div class="foot">
	<div class="row">
		<div class="ci-widget col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
			<h3>This is Title</h3>
			<div>The Content is very very very very very very very very very very very very very very very very very
			     very very very very very very very very very very
			     long....
			</div>
		</div>
		<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
			<?php dynamic_sidebar( 'footer-widget' ); ?>
		<?php endif; ?>
	</div>
	<div class="copyright">
		© 2022 Chobit
	</div>
</div>
<div class="clear"></div>
</div>

<?php wp_footer(); ?>

</body>
</html>

