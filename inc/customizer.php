<?php
/**
 * Controls for the content that should be editable without touching code.
 *
 * @package Christian_Motion
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the portfolio settings in the WordPress Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function christian_motion_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'christian_motion_home',
		array(
			'title'       => __( 'Portfolio-Startseite', 'christian-motion' ),
			'description' => __( 'Hier kannst du Hero, Über-mich-Text und die Beschreibungen für Design, Motion und Sound verändern.', 'christian-motion' ),
			'priority'    => 28,
		)
	);

	$text_settings = array(
		'christian_motion_hero_name' => array(
			'label'   => __( 'Grosser Name im Hero', 'christian-motion' ),
			'default' => 'Christian Steitz',
		),
		'christian_motion_hero_kicker' => array(
			'label'   => __( 'Kleine Zeile im Hero', 'christian-motion' ),
			'default' => 'Multimedia Production · Switzerland',
		),
		'christian_motion_hero_text' => array(
			'label'   => __( 'Hero-Beschreibung', 'christian-motion' ),
			'default' => 'Ich entwickle visuelle Geschichten zwischen Film, Design, Motion und Sound.',
		),
		'christian_motion_hero_button' => array(
			'label'   => __( 'Text des Hero-Buttons', 'christian-motion' ),
			'default' => 'Zu meiner Arbeit',
		),
		'christian_motion_profile_text' => array(
			'label'   => __( 'Kurzer Profiltext', 'christian-motion' ),
			'default' => 'Von der ersten Idee bis zum letzten Sound: Ich verbinde Gestaltung, bewegtes Bild und Audio zu einer klaren visuellen Sprache.',
		),
		'christian_motion_about_title' => array(
			'label'   => __( 'Über-mich-Titel', 'christian-motion' ),
			'default' => 'Ich verbinde Idee, Bild und Ton zu einer Geschichte.',
		),
		'christian_motion_about_note' => array(
			'label'   => __( 'Über-mich-Schlagwörter', 'christian-motion' ),
			'default' => 'Konzept · Kamera · Schnitt · Motion · Sound',
		),
	);

	foreach ( $text_settings as $setting_id => $setting_data ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $setting_data['default'],
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $setting_data['label'],
				'section' => 'christian_motion_home',
				'type'    => 'text',
			)
		);
	}

	$textarea_settings = array(
		'christian_motion_about_text' => array(
			'label'   => __( 'Über-mich-Text', 'christian-motion' ),
			'default' => 'Ich bin Christian Steitz und arbeite als Multimedia Producer an Projekten, die Gestaltung, bewegtes Bild und Sound zusammenbringen. Mich interessiert, wie aus einer ersten Idee eine klare visuelle Sprache entsteht.',
		),
		'christian_motion_design_text' => array(
			'label'   => __( 'Beschreibung: Design', 'christian-motion' ),
			'default' => 'Ich entwickle visuelle Konzepte, Layouts und Identitäten, die einer Idee eine klare Form und einen wiedererkennbaren Charakter geben.',
		),
		'christian_motion_motion_text' => array(
			'label'   => __( 'Beschreibung: Motion', 'christian-motion' ),
			'default' => 'Ich arbeite mit Kamera, Schnitt und Animation und übersetze Inhalte in bewegte Bilder mit Rhythmus, Timing und einer bewussten Bildsprache.',
		),
		'christian_motion_sound_text' => array(
			'label'   => __( 'Beschreibung: Sound', 'christian-motion' ),
			'default' => 'Ich gestalte Atmosphäre mit Sprache, Musik und Geräuschen und nutze Sound, damit Bilder emotionaler, räumlicher und präziser wirken.',
		),
	);

	foreach ( $textarea_settings as $setting_id => $setting_data ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $setting_data['default'],
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $setting_data['label'],
				'section' => 'christian_motion_home',
				'type'    => 'textarea',
			)
		);
	}

	$wp_customize->add_setting(
		'christian_motion_hero_video',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'christian_motion_hero_video',
			array(
				'label'     => __( 'Hero-Video (MP4)', 'christian-motion' ),
				'description' => __( 'Ein kurzes, stummes Querformat-Video funktioniert am besten. Es wird automatisch geloopt.', 'christian-motion' ),
				'section'   => 'christian_motion_home',
				'mime_type' => 'video',
			)
		)
	);

	$wp_customize->add_setting(
		'christian_motion_about_image',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'christian_motion_about_image',
			array(
				'label'       => __( 'Bild im Über-mich-Bento', 'christian-motion' ),
				'description' => __( 'Optionales Portrait oder Arbeitsbild für die grosse Collage-Karte.', 'christian-motion' ),
				'section'     => 'christian_motion_home',
				'mime_type'   => 'image',
			)
		)
	);

	$wp_customize->add_setting(
		'christian_motion_hero_poster',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'christian_motion_hero_poster',
			array(
				'label'       => __( 'Hero-Standbild', 'christian-motion' ),
				'description' => __( 'Wird angezeigt, bevor das Video geladen ist und bei reduziertem Bewegungsmodus.', 'christian-motion' ),
				'section'     => 'christian_motion_home',
				'mime_type'   => 'image',
			)
		)
	);

	$wp_customize->add_setting(
		'christian_motion_accent',
		array(
			'default'           => '#c9d7dc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'christian_motion_accent',
			array(
				'label'   => __( 'Akzentfarbe', 'christian-motion' ),
				'section' => 'colors',
			)
		)
	);
}
add_action( 'customize_register', 'christian_motion_customize_register' );

/**
 * Apply the selected accent colour through a CSS custom property.
 */
function christian_motion_customizer_css() {
	$accent = get_theme_mod( 'christian_motion_accent', '#c9d7dc' );
	?>
	<style id="christian-motion-custom-colour">:root{--c-accent:<?php echo esc_html( $accent ); ?>;}</style>
	<?php
}
add_action( 'wp_head', 'christian_motion_customizer_css', 20 );
