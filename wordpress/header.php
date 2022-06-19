<?php
/**
 * The header for corridor.
 *
 * @package Corridor
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
	<meta content="width=device-width, initial-scale=1" name="viewport">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<div class="wrapper">
	<div class="header">
		<div class="logo">
			<?php corridor_site_logo() ?>
			<?php corridor_site_title() ?>
		</div>
	</div>

	<div class="neck">
		<?php get_template_part( 'template-parts/navigation', 'none' ); ?>
	</div>