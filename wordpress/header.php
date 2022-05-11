<?php
/**
 * The header for corridor.
 *
 * @package Corridor
 */
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
    <meta content="width=device-width, initial-scale=1" name="viewport">

	<?php wp_head(); ?>
</head>

<div class="wrapper">
    <div class="header">
        <div class="logo">
			<?php corridor_site_title() ?>
        </div>
    </div>

    <div class="neck">
		<?php get_template_part( 'template-parts/navigation', 'none' ); ?>
    </div>