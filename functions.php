<?php
/**
 * Theme setup for Christian Motion.
 *
 * @package Christian_Motion
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CHRISTIAN_MOTION_VERSION', '4.9.1' );

/**
 * Register the WordPress features used by the theme.
 */
function christian_motion_setup() {
	load_theme_textdomain( 'christian-motion', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 420,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'primary' => __( 'Hauptnavigation', 'christian-motion' ),
			'footer'  => __( 'Footer-Navigation', 'christian-motion' ),
		)
	);

	add_image_size( 'christian-motion-spotlight', 1800, 1125, true );
	add_image_size( 'christian-motion-grid', 1200, 900, true );
}
add_action( 'after_setup_theme', 'christian_motion_setup' );

/**
 * Set the maximum width used by embedded media.
 */
function christian_motion_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'christian_motion_content_width', 960 );
}
add_action( 'after_setup_theme', 'christian_motion_content_width', 0 );

/**
 * Load the public CSS and JavaScript.
 */
function christian_motion_assets() {
	wp_enqueue_style(
		'christian-motion-lenis',
		get_template_directory_uri() . '/assets/vendor/lenis.css',
		array(),
		'1.3.26'
	);
	wp_enqueue_style(
		'christian-motion-tailwind',
		get_template_directory_uri() . '/assets/css/tailwind.css',
		array(),
		CHRISTIAN_MOTION_VERSION
	);
	wp_enqueue_style( 'christian-motion-style', get_stylesheet_uri(), array( 'christian-motion-lenis', 'christian-motion-tailwind' ), CHRISTIAN_MOTION_VERSION );
	wp_enqueue_script(
		'christian-motion-gsap',
		get_template_directory_uri() . '/assets/vendor/gsap.min.js',
		array(),
		'3.13.0',
		true
	);
	wp_enqueue_script(
		'christian-motion-scroll-trigger',
		get_template_directory_uri() . '/assets/vendor/ScrollTrigger.min.js',
		array( 'christian-motion-gsap' ),
		'3.13.0',
		true
	);
	wp_enqueue_script(
		'christian-motion-lenis',
		get_template_directory_uri() . '/assets/vendor/lenis.min.js',
		array(),
		'1.3.26',
		true
	);
	wp_enqueue_script(
		'christian-motion-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array( 'christian-motion-gsap', 'christian-motion-scroll-trigger', 'christian-motion-lenis' ),
		CHRISTIAN_MOTION_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'christian_motion_assets' );

/**
 * Register the portfolio project content type.
 */
function christian_motion_register_content_types() {
	register_post_type(
		'project',
		array(
			'labels'       => array(
				'name'               => __( 'Projekte', 'christian-motion' ),
				'singular_name'      => __( 'Projekt', 'christian-motion' ),
				'add_new'            => __( 'Projekt hinzufügen', 'christian-motion' ),
				'add_new_item'       => __( 'Neues Projekt hinzufügen', 'christian-motion' ),
				'edit_item'          => __( 'Projekt bearbeiten', 'christian-motion' ),
				'new_item'           => __( 'Neues Projekt', 'christian-motion' ),
				'view_item'          => __( 'Projekt ansehen', 'christian-motion' ),
				'search_items'       => __( 'Projekte durchsuchen', 'christian-motion' ),
				'not_found'          => __( 'Keine Projekte gefunden.', 'christian-motion' ),
				'not_found_in_trash' => __( 'Keine Projekte im Papierkorb gefunden.', 'christian-motion' ),
				'menu_name'          => __( 'Projekte', 'christian-motion' ),
			),
			'public'       => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-format-video',
			'rewrite'      => array( 'slug' => 'projekte' ),
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'discipline',
		array( 'project' ),
		array(
			'labels'            => array(
				'name'          => __( 'Disziplinen', 'christian-motion' ),
				'singular_name' => __( 'Disziplin', 'christian-motion' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'disziplin' ),
		)
	);

	register_post_meta(
		'project',
		'_christian_motion_spotlight',
		array(
			'type'              => 'boolean',
			'single'            => true,
			'default'           => false,
			'show_in_rest'      => true,
			'sanitize_callback' => 'rest_sanitize_boolean',
			'auth_callback'     => function() {
				return current_user_can( 'edit_posts' );
			},
		)
	);
}
add_action( 'init', 'christian_motion_register_content_types' );

/**
 * Add an easy Spotlight checkbox to the project editor.
 */
function christian_motion_add_project_metabox() {
	add_meta_box(
		'christian-motion-spotlight',
		__( 'Startseite', 'christian-motion' ),
		'christian_motion_spotlight_metabox',
		'project',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'christian_motion_add_project_metabox' );

/**
 * Render the Spotlight checkbox.
 *
 * @param WP_Post $post Current project.
 */
function christian_motion_spotlight_metabox( $post ) {
	wp_nonce_field( 'christian_motion_save_spotlight', 'christian_motion_spotlight_nonce' );
	$is_spotlight = (bool) get_post_meta( $post->ID, '_christian_motion_spotlight', true );
	?>
	<label for="christian-motion-spotlight-field">
		<input id="christian-motion-spotlight-field" type="checkbox" name="christian_motion_spotlight" value="1" <?php checked( $is_spotlight ); ?>>
		<?php esc_html_e( 'Als Spotlight-Projekt hervorheben', 'christian-motion' ); ?>
	</label>
	<p class="description"><?php esc_html_e( 'Maximal zwei markierte Projekte erscheinen gross unter dem Hero.', 'christian-motion' ); ?></p>
	<?php
}

/**
 * Save the Spotlight checkbox.
 *
 * @param int $post_id Project ID.
 */
function christian_motion_save_spotlight( $post_id ) {
	if ( ! isset( $_POST['christian_motion_spotlight_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['christian_motion_spotlight_nonce'] ) ), 'christian_motion_save_spotlight' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	update_post_meta( $post_id, '_christian_motion_spotlight', isset( $_POST['christian_motion_spotlight'] ) ? '1' : '0' );
}
add_action( 'save_post_project', 'christian_motion_save_spotlight' );

/**
 * Refresh project URLs after activating the theme.
 */
function christian_motion_activate_theme() {
	christian_motion_register_content_types();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'christian_motion_activate_theme' );

/**
 * Show twelve projects per archive page.
 *
 * @param WP_Query $query Main WordPress query.
 */
function christian_motion_project_archive_query( $query ) {
	if ( ! is_admin() && $query->is_main_query() && ( is_post_type_archive( 'project' ) || is_tax( 'discipline' ) ) ) {
		$query->set( 'posts_per_page', 12 );
	}
}
add_action( 'pre_get_posts', 'christian_motion_project_archive_query' );

/**
 * Navigation used until a custom menu has been assigned.
 */
function christian_motion_menu_fallback() {
	?>
	<ul class="menu">
		<li><a href="<?php echo esc_url( home_url( '/#spotlight' ) ); ?>"><?php esc_html_e( 'Spotlight', 'christian-motion' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>"><?php esc_html_e( 'Über mich', 'christian-motion' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/#projects' ) ); ?>"><?php esc_html_e( 'Projekte', 'christian-motion' ); ?></a></li>
	</ul>
	<?php
}

require get_template_directory() . '/inc/customizer.php';
