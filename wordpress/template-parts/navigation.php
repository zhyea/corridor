<?php
/**
 * The navigator for corridor.
 *
 * @package Corridor
 */
?>
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo home_url() ?>">Home</a>
        <button aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation"
                class="navbar-toggler"
                data-bs-target="#navbarNavDropdown"
                data-bs-toggle="collapse"
                type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- start Nav -->
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'depth'          => 2,
				'container'      => false,
				'menu_class'     => 'nav navbar-nav',
				'fallback_cb'    => 'bootstrap_nav_walker::fallback',
				'walker'         => new Bootstrap_Nav_Walker()
			) );
			?>
            <!-- End Nav -->
        </div>
    </div>
</nav>
