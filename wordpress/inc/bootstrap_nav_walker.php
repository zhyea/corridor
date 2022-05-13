<?php


class Bootstrap_Nav_Walker extends Walker_Nav_Menu {
	/**
	 * Whether the items_wrap contains schema microdata or not.
	 *
	 * @since 4.2.0
	 * @var boolean
	 */
	private $has_schema = false;

	/**
	 * Ensure the items_wrap argument contains microdata.
	 *
	 * @since 4.2.0
	 */
	public function __construct() {
		if ( ! has_filter( 'wp_nav_menu_args', array( $this, 'add_schema_to_navbar_ul' ) ) ) {
			add_filter( 'wp_nav_menu_args', array( $this, 'add_schema_to_navbar_ul' ) );
		}
	}

	/**
	 * Starts the list before the elements are added.
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param WP_Nav_Menu_Args $args An object of wp_nav_menu() arguments.
	 *
	 * @see Walker_Nav_Menu::start_lvl()
	 *
	 * @since WP 3.0.0
	 *
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );
		// Default class to add to the file.
		$classes = array( 'dropdown-menu' );
		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @param array $classes The CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args An object of `wp_nav_menu()` arguments.
		 * @param int $depth Depth of menu item. Used for padding.
		 *
		 * @since WP 4.8.0
		 *
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/*
		 * The `.dropdown-menu` container needs to have a labelledby
		 * attribute which points to it's trigger link.
		 *
		 * Form a string for the labelledby attribute from the the latest
		 * link with an id that was added to the $output.
		 */
		$labelledby = '';
		// Find all links with an id in the output.
		preg_match_all( '/(<a.*?id=\"|\')(.*?)\"|\'.*?>/im', $output, $matches );
		// With pointer at end of array check if we got an ID match.
		if ( end( $matches[2] ) ) {
			// Build a string to use as aria-labelledby.
			$labelledby = 'aria-labelledby="' . esc_attr( end( $matches[2] ) ) . '"';
		}
		$output .= "{$n}{$indent}<ul$class_names $labelledby>{$n}";
	}

	/**
	 * Starts the element output.
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param WP_Nav_Menu_Item $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param WP_Nav_Menu_Args $args An object of wp_nav_menu() arguments.
	 * @param int $id Current item ID.
	 *
	 * @see Walker_Nav_Menu::start_el()
	 *
	 * @since WP 3.0.0
	 * @since WP 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
	 *
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
		} else {
			$t = "\t";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';


		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		// Updating the CSS classes of a menu item in the WordPress Customizer preview results in all classes defined
		// in that particular input box to come in as one big class string.
		$split_on_spaces = function ( $class ) {
			return preg_split( '/\s+/', $class );
		};
		$classes         = $this->flatten( array_map( $split_on_spaces, $classes ) );


		// Add .dropdown or .active classes where they are needed.
		if ( $this->has_children ) {
			$classes[] = 'dropdown';
		}
		if ( in_array( 'current-menu-item', $classes, true ) || in_array( 'current-menu-parent', $classes, true ) ) {
			$classes[] = 'active';
		}

		// Add some additional default classes to the item.
		$classes[] = 'nav-item';

		// Allow filtering the classes.
		$classes = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );

		// Form a string of classes in format: class="class_names".
		$class_names = join( ' ', $classes );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= $indent . '<li' . $class_names . '>';

		// Initialize array for holding the $atts for the link item.
		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		if ( '_blank' === $item->target && empty( $item->xfn ) ) {
			$atts['rel'] = 'noopener noreferrer';
		} else {
			$atts['rel'] = ! empty( $item->xfn ) ? $item->xfn : '';
		}

		// If the item has_children add atts to <a>.
		if ( $this->has_children && 0 === $depth ) {
			$atts['href']           = '#';
			$atts['data-bs-toggle'] = 'dropdown';
			$atts['aria-expanded']  = 'false';
			$atts['class']          = 'dropdown-toggle nav-link';
			$atts['role']           = 'button';
			$atts['id']             = 'menu-item-dropdown-' . $item->ID;
		} else {
			if ( true === $this->has_schema ) {
				$atts['itemprop'] = 'url';
			}

			$atts['href'] = ! empty( $item->url ) ? $item->url : '#';
			// For items in dropdowns use .dropdown-item instead of .nav-link.
			if ( $depth > 0 ) {
				$atts['class'] = 'dropdown-item';
			} else {
				$atts['class'] = 'nav-link';
			}
		}

		$atts['aria-current'] = $item->current ? 'page' : '';

		// Allow filtering of the $atts array before using it.
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		// Build a string of html containing all the atts for the item.
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value      = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		// START appending the internal item contents to the output.
		$item_output = isset( $args->before ) ? $args->before : '';


		// With no link mod type set this must be a standard <a> tag.
		$item_output .= '<a' . $attributes . '>';

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		 * Filters a menu item's title.
		 *
		 * @param string $title The menu item's title.
		 * @param WP_Nav_Menu_Item $item The current menu item.
		 * @param WP_Nav_Menu_Args $args An object of wp_nav_menu() arguments.
		 * @param int $depth Depth of menu item. Used for padding.
		 *
		 * @since WP 4.4.0
		 *
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		// Put the item contents into $output.
		$item_output .= isset( $args->link_before ) ? $args->link_before . $title . $args->link_after : '';


		// With no link mod type set this must be a standard <a> tag.
		$item_output .= '</a>';

		$item_output .= isset( $args->after ) ? $args->after : '';

		// END appending the internal item contents to the output.
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * Menu fallback.
	 *
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a menu has not been assigned to the theme location in the WordPress
	 * menu manager the function will display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 * @return string|void String when echo is false.
	 */
	public static function fallback( $args ) {
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}

		// Initialize var to store fallback html.
		$fallback_output = '';

		// Menu container opening tag.
		$show_container = false;
		if ( $args['container'] ) {
			/**
			 * Filters the list of HTML tags that are valid for use as menu containers.
			 *
			 * @param array $tags The acceptable HTML tags for use as menu containers.
			 *                    Default is array containing 'div' and 'nav'.
			 *
			 * @since WP 3.0.0
			 *
			 */
			$allowed_tags = apply_filters( 'wp_nav_menu_container_allowedtags', array( 'div', 'nav' ) );
			if ( is_string( $args['container'] ) && in_array( $args['container'], $allowed_tags, true ) ) {
				$show_container  = true;
				$class           = $args['container_class'] ? ' class="menu-fallback-container ' . esc_attr( $args['container_class'] ) . '"' : ' class="menu-fallback-container"';
				$id              = $args['container_id'] ? ' id="' . esc_attr( $args['container_id'] ) . '"' : '';
				$fallback_output .= '<' . $args['container'] . $id . $class . '>';
			}
		}

		// The fallback menu.
		$class           = $args['menu_class'] ? ' class="menu-fallback-menu ' . esc_attr( $args['menu_class'] ) . '"' : ' class="menu-fallback-menu"';
		$id              = $args['menu_id'] ? ' id="' . esc_attr( $args['menu_id'] ) . '"' : '';
		$fallback_output .= '<ul' . $id . $class . '>';
		$fallback_output .= '<li class="nav-item"><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" class="nav-link" title="' . esc_attr__( 'Add a menu', 'wp-bootstrap-navwalker' ) . '">' . esc_html__( 'Add a menu', 'wp-bootstrap-navwalker' ) . '</a></li>';
		$fallback_output .= '</ul>';

		// Menu container closing tag.
		if ( $show_container ) {
			$fallback_output .= '</' . $args['container'] . '>';
		}

		// if $args has 'echo' key and it's true echo, otherwise return.
		if ( array_key_exists( 'echo', $args ) && $args['echo'] ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $fallback_output;
		} else {
			return $fallback_output;
		}
	}

	/**
	 * Filter to ensure the items_Wrap argument contains microdata.
	 *
	 * @param array $args The nav instance arguments.
	 *
	 * @return array $args The altered nav instance arguments.
	 * @since 4.2.0
	 *
	 */
	public function add_schema_to_navbar_ul( $args ) {
		if ( isset( $args['items_wrap'] ) ) {
			$wrap = $args['items_wrap'];
			if ( strpos( $wrap, 'SiteNavigationElement' ) === false ) {
				$args['items_wrap'] = preg_replace( '/(>).*>?\%3\$s/', ' itemscope itemtype="http://www.schema.org/SiteNavigationElement"$0', $wrap );
			}
		}

		return $args;
	}


	/**
	 * Flattens a multidimensional array to a simple array.
	 *
	 * @param array $array a multidimensional array.
	 *
	 * @return array a simple array
	 */
	public function flatten( $array ) {
		$result = array();
		foreach ( $array as $element ) {
			if ( is_array( $element ) ) {
				array_push( $result, ...$this->flatten( $element ) );
			} else {
				$result[] = $element;
			}
		}

		return $result;
	}

}