<?php
/**
 * Portfolio front page.
 *
 * The page introduces the work, highlights two selected projects and then
 * lists every published project. Each real card links to single-project.php.
 *
 * @package Christian_Motion
 */

get_header();

$hero_video_id  = absint( get_theme_mod( 'christian_motion_hero_video', 0 ) );
$hero_poster_id = absint( get_theme_mod( 'christian_motion_hero_poster', 0 ) );
$hero_video_url  = $hero_video_id ? wp_get_attachment_url( $hero_video_id ) : get_template_directory_uri() . '/assets/video/christian-steitz-hero-showreel_2.mp4';
$hero_video_mime = $hero_video_id ? ( get_post_mime_type( $hero_video_id ) ?: 'video/mp4' ) : 'video/mp4';
$hero_poster     = $hero_poster_id ? wp_get_attachment_image_url( $hero_poster_id, 'full' ) : get_template_directory_uri() . '/assets/images/hero-showreel-poster.jpg';
$hero_name      = get_theme_mod( 'christian_motion_hero_name', 'Christian Steitz' );
$hero_words     = preg_split( '/\s+/', trim( $hero_name ) );
$intro_first    = $hero_words[0] ?? 'Christian';
$intro_last     = count( $hero_words ) > 1 ? implode( ' ', array_slice( $hero_words, 1 ) ) : 'Steitz';
$about_image_id = absint( get_theme_mod( 'christian_motion_about_image', 0 ) );
$about_image    = $about_image_id ? wp_get_attachment_image_url( $about_image_id, 'full' ) : '';
?>

<div class="site-intro" data-site-intro>
	<div class="site-intro-panel site-intro-panel-top" data-intro-panel-top aria-hidden="true"></div>
	<div class="site-intro-panel site-intro-panel-bottom" data-intro-panel-bottom aria-hidden="true"></div>
	<div class="site-intro-stage" data-intro-stage aria-hidden="true">
		<p class="site-intro-kicker" data-intro-kicker>Multimedia Produzent · Schweiz</p>
		<p class="site-intro-name">
			<span class="site-intro-first" data-intro-first><?php echo esc_html( $intro_first ); ?></span>
			<span class="site-intro-last" data-intro-last><?php echo esc_html( $intro_last ); ?></span>
		</p>
		<span class="site-intro-line" data-intro-line></span>
	</div>
	<button class="site-intro-skip" type="button" data-intro-skip><?php esc_html_e( 'Überspringen', 'christian-motion' ); ?></button>
</div>

<main id="primary" class="site-main">
	<section class="video-hero" aria-labelledby="hero-title">
		<div class="hero-media" aria-hidden="true">
			<?php if ( $hero_video_url ) : ?>
				<video
					class="hero-video"
					data-hero-video
					autoplay
					muted
					loop
					playsinline
					preload="metadata"
					<?php if ( $hero_poster ) : ?>poster="<?php echo esc_url( $hero_poster ); ?>"<?php endif; ?>
				>
					<source src="<?php echo esc_url( $hero_video_url ); ?>" type="<?php echo esc_attr( $hero_video_mime ); ?>">
				</video>
			<?php elseif ( $hero_poster ) : ?>
				<img class="hero-poster" src="<?php echo esc_url( $hero_poster ); ?>" alt="">
			<?php else : ?>
				<div class="hero-placeholder">
					<span>Hero video placeholder</span>
					<span>16:9 · MP4 · muted loop</span>
				</div>
			<?php endif; ?>
		</div>
		<div class="hero-shade" aria-hidden="true"></div>

		<div class="shell hero-content">
			<div class="hero-copy" data-entrance="left">
				<p class="eyebrow"><?php echo esc_html( get_theme_mod( 'christian_motion_hero_kicker', 'Multimedia Production · Switzerland' ) ); ?></p>
				<p><?php echo esc_html( get_theme_mod( 'christian_motion_hero_text', 'Ich entwickle visuelle Geschichten zwischen Film, Design, Motion und Sound.' ) ); ?></p>
				<a class="hero-button" href="#spotlight">
					<span><?php echo esc_html( get_theme_mod( 'christian_motion_hero_button', 'Zu meiner Arbeit' ) ); ?></span>
				</a>
			</div>

			<h1 id="hero-title" class="hero-name" data-entrance="right">
				<?php foreach ( $hero_words as $hero_word ) : ?>
					<span><?php echo esc_html( $hero_word ); ?></span>
				<?php endforeach; ?>
			</h1>

			<div class="hero-foot">
				<span>Film · Design · Motion · Sound</span>
				<?php if ( $hero_video_url ) : ?>
					<button class="video-toggle" type="button" data-video-toggle aria-pressed="false">
						<span data-video-toggle-label><?php esc_html_e( 'Video pausieren', 'christian-motion' ); ?></span>
						<span aria-hidden="true">Ⅱ</span>
					</button>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section id="spotlight" class="spotlight-section section-space">
		<div class="shell section-heading" data-reveal>
			<div>
				<p class="section-index">01 / Spotlight</p>
				<h2>Ausgewählte<br>Arbeiten</h2>
			</div>
			<p>Zwei Projekte, die meine Arbeit zwischen Idee, Bild und Bewegung zeigen.</p>
		</div>

		<div class="shell-wide spotlight-grid">
			<?php
			$spotlight_query = new WP_Query(
				array(
					'post_type'      => 'project',
					'posts_per_page' => 2,
					'meta_key'       => '_christian_motion_spotlight',
					'meta_value'     => '1',
					'orderby'        => array(
						'menu_order' => 'ASC',
						'date'       => 'DESC',
					),
				)
			);

			$spotlight_posts = $spotlight_query->posts;
			$spotlight_ids   = wp_list_pluck( $spotlight_posts, 'ID' );

			if ( count( $spotlight_posts ) < 2 ) {
				$fallback_query = new WP_Query(
					array(
						'post_type'      => 'project',
						'posts_per_page' => 2 - count( $spotlight_posts ),
						'post__not_in'   => $spotlight_ids,
						'orderby'        => 'date',
						'order'          => 'DESC',
					)
				);
				$spotlight_posts = array_merge( $spotlight_posts, $fallback_query->posts );
			}

			if ( $spotlight_posts ) :
				foreach ( $spotlight_posts as $spotlight_index => $post ) :
					setup_postdata( $post );
					get_template_part( 'template-parts/project', 'spotlight', array( 'index' => $spotlight_index ) );
				endforeach;
				wp_reset_postdata();
			else :
				?>
					<article class="spotlight-card is-demo" data-reveal="clip">
						<a href="#projects" aria-label="<?php esc_attr_e( 'Zum Projektarchiv', 'christian-motion' ); ?>">
							<div class="spotlight-media">
								<div class="demo-frame demo-frame-one" aria-hidden="true"><span>01</span></div>
								<span class="spotlight-number" aria-hidden="true">01</span>
							</div>
							<div class="spotlight-copy">
								<p class="project-meta">Film · Direction</p>
								<h3>Spotlight Project</h3>
								<p>Hier erscheint dein erstes ausgewähltes Projekt.</p>
								<span class="spotlight-link"><?php esc_html_e( 'Projekte ansehen', 'christian-motion' ); ?></span>
							</div>
						</a>
					</article>
					<article class="spotlight-card is-demo" data-reveal="clip" style="--reveal-delay: 120ms">
						<a href="#projects" aria-label="<?php esc_attr_e( 'Zum Projektarchiv', 'christian-motion' ); ?>">
							<div class="spotlight-media">
								<div class="demo-frame demo-frame-two" aria-hidden="true"><span>02</span></div>
								<span class="spotlight-number" aria-hidden="true">02</span>
							</div>
							<div class="spotlight-copy">
								<p class="project-meta">Motion · Design</p>
								<h3>Featured Story</h3>
								<p>Hier erscheint dein zweites ausgewähltes Projekt.</p>
								<span class="spotlight-link"><?php esc_html_e( 'Projekte ansehen', 'christian-motion' ); ?></span>
							</div>
						</a>
					</article>
				<?php
			endif;
			?>
		</div>
	</section>

	<section id="about" class="about-section section-space overflow-hidden">
		<div class="shell about-heading" data-reveal>
			<p class="section-index">02 / Über mich</p>
			<p>Christian Steitz · Multimedia Producer</p>
		</div>

		<div class="shell-wide about-bento" aria-label="Über Christian Steitz">
			<article class="about-bento-card about-bento-intro" data-gsap-card>
				<span class="about-card-label">Portrait / 01</span>
				<h2><?php echo esc_html( get_theme_mod( 'christian_motion_about_title', 'Ich verbinde Idee, Bild und Ton zu einer Geschichte.' ) ); ?></h2>
				<span class="about-script" aria-hidden="true">About me</span>
			</article>

			<figure class="about-bento-card about-bento-photo" data-gsap-card>
				<?php if ( $about_image ) : ?>
					<img class="about-photo-image" src="<?php echo esc_url( $about_image ); ?>" alt="Christian Steitz">
				<?php else : ?>
					<div class="about-photo-placeholder">
						<span>Portrait / Hochformat</span>
						<strong>Dein Foto</strong>
						<small>Im Customizer austauschen</small>
					</div>
				<?php endif; ?>
				<figcaption>Christian Steitz / Visual storyteller</figcaption>
			</figure>

			<article class="about-bento-card about-bento-copy" data-gsap-card>
				<p class="about-bento-number">02</p>
				<p><?php echo esc_html( get_theme_mod( 'christian_motion_about_text', 'Ich bin Christian Steitz und arbeite als Multimedia Producer an Projekten, die Gestaltung, bewegtes Bild und Sound zusammenbringen. Mich interessiert, wie aus einer ersten Idee eine klare visuelle Sprache entsteht.' ) ); ?></p>
			</article>

			<div class="about-bento-card about-bento-note" data-gsap-card>
				<p>Mein Prozess</p>
				<strong><?php echo esc_html( get_theme_mod( 'christian_motion_about_note', 'Konzept · Kamera · Schnitt · Motion · Sound' ) ); ?></strong>
			</div>
		</div>
	</section>

	<section id="profile" class="discipline-section" aria-labelledby="discipline-title">
		<header class="shell discipline-heading" data-reveal>
			<div>
				<p class="section-index">03 / Arbeitsbereiche</p>
				<h2 id="discipline-title">Was ich mache</h2>
			</div>
			<p><?php echo esc_html( get_theme_mod( 'christian_motion_profile_text', 'Von der ersten Idee bis zum letzten Sound: Ich verbinde Gestaltung, bewegtes Bild und Audio zu einer klaren visuellen Sprache.' ) ); ?></p>
		</header>

		<div class="shell-wide discipline-interactive" data-disciplines>
			<div class="discipline-panel-stage" data-reveal="clip">
				<article id="discipline-panel-design" class="discipline-panel discipline-panel-design is-active" data-discipline-panel="design" aria-hidden="false">
					<p>01 / Design</p>
					<h3>Ideen bekommen eine klare Form.</h3>
					<p><?php echo esc_html( get_theme_mod( 'christian_motion_design_text', 'Ich entwickle visuelle Konzepte, Layouts und Identitäten, die einer Idee eine klare Form und einen wiedererkennbaren Charakter geben.' ) ); ?></p>
				</article>

				<article id="discipline-panel-motion" class="discipline-panel discipline-panel-motion" data-discipline-panel="motion" aria-hidden="true">
					<p>02 / Motion</p>
					<h3>Bilder finden Rhythmus und Bewegung.</h3>
					<p><?php echo esc_html( get_theme_mod( 'christian_motion_motion_text', 'Ich arbeite mit Kamera, Schnitt und Animation und übersetze Inhalte in bewegte Bilder mit Rhythmus, Timing und einer bewussten Bildsprache.' ) ); ?></p>
				</article>

				<article id="discipline-panel-sound" class="discipline-panel discipline-panel-sound" data-discipline-panel="sound" aria-hidden="true">
					<p>03 / Sound</p>
					<h3>Ton macht Bilder spürbar.</h3>
					<p><?php echo esc_html( get_theme_mod( 'christian_motion_sound_text', 'Ich gestalte Atmosphäre mit Sprache, Musik und Geräuschen und nutze Sound, damit Bilder emotionaler, räumlicher und präziser wirken.' ) ); ?></p>
				</article>
			</div>

			<div class="discipline-triggers">
				<button id="discipline-design" class="is-active" type="button" data-discipline-trigger="design" aria-expanded="true" aria-controls="discipline-panel-design">
					<span>Design.</span><i aria-hidden="true">+</i>
				</button>
				<button id="discipline-motion" type="button" data-discipline-trigger="motion" aria-expanded="false" aria-controls="discipline-panel-motion">
					<span>Motion.</span><i aria-hidden="true">+</i>
				</button>
				<button id="discipline-sound" type="button" data-discipline-trigger="sound" aria-expanded="false" aria-controls="discipline-panel-sound">
					<span>Sound.</span><i aria-hidden="true">+</i>
				</button>
			</div>
		</div>
	</section>

	<section id="projects" class="projects-section section-space">
		<header class="shell project-grid-header" data-reveal>
			<div>
				<p class="section-index">04 / Alle Projekte</p>
				<h2>Projektarchiv</h2>
			</div>
			<p>Fahre mit der Maus über ein Bild oder tippe es an, um den Projekttitel zu sehen.</p>
		</header>

		<div class="shell-wide project-grid">
			<?php
			$projects = new WP_Query(
				array(
					'post_type'      => 'project',
					'posts_per_page' => -1,
					'orderby'        => array(
						'menu_order' => 'ASC',
						'date'       => 'DESC',
					),
				)
			);

			if ( $projects->have_posts() ) :
				$project_index = 0;
				while ( $projects->have_posts() ) :
					$projects->the_post();
					get_template_part( 'template-parts/project', 'card', array( 'index' => $project_index ) );
					$project_index++;
				endwhile;
				wp_reset_postdata();
			else :
				$demo_titles = array( 'Short Film', 'Visual Identity', 'Live Session', 'Motion Study', 'Documentary', 'Sound Portrait', 'Campaign Cut', 'Editorial Motion', 'Studio Session', 'Field Notes' );
				foreach ( $demo_titles as $demo_index => $demo_title ) :
					?>
					<article class="project-card is-demo" data-gsap-project>
						<div class="project-card-media demo-frame demo-frame-<?php echo esc_attr( (string) ( ( $demo_index % 6 ) + 1 ) ); ?>"><span><?php echo esc_html( str_pad( (string) ( $demo_index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span></div>
						<div class="project-card-overlay"><p>Portfolio project</p><h3><?php echo esc_html( $demo_title ); ?></h3></div>
					</article>
					<?php
				endforeach;
			endif;
			?>
		</div>
	</section>

	<section class="contact-cta">
		<div class="shell contact-cta-inner" data-reveal>
			<p class="section-index">05 / Kontakt</p>
			<h2>Eine Idee im Kopf?</h2>
			<a href="mailto:christian.steitz@outlook.com">Lass uns darüber sprechen</a>
		</div>
	</section>
</main>

<?php get_footer(); ?>
