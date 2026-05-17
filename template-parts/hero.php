<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

$tagline  = get_theme_mod( 'rmjm_hero_tagline', __( 'Sewa Mobil Terpercaya di Yogyakarta', 'rmjm' ) );
$title    = get_theme_mod( 'rmjm_hero_title',   __( 'Sewa Mobil Jogja <span>Mudah &amp; Terpercaya</span>', 'rmjm' ) );
$subtitle = get_theme_mod( 'rmjm_hero_subtitle', __( 'Armada lengkap, harga transparan, sopir berpengalaman. Pesan sekarang — siap antar jemput Bandara YIA dan seluruh wilayah Yogyakarta.', 'rmjm' ) );
$wa_url   = rmjm_whatsapp_url( __( 'Halo, saya ingin tanya info sewa mobil di Jogja.', 'rmjm' ) );
?>

<section class="hero">
	<div class="container">

		<div class="hero-content">

			<?php if ( ! empty( $tagline ) ) : ?>
			<span class="hero-badge"><?php echo esc_html( $tagline ); ?></span>
			<?php endif; ?>

			<h1 class="hero-title">
				<?php echo wp_kses_post( $title ); ?>
			</h1>

			<?php if ( ! empty( $subtitle ) ) : ?>
			<p class="hero-description"><?php echo esc_html( $subtitle ); ?></p>
			<?php endif; ?>

			<div class="hero-actions">
				<a class="btn btn-primary btn-lg" href="#armada">
					<?php esc_html_e( 'Lihat Armada', 'rmjm' ); ?>
				</a>
				<a class="btn btn-outline-white btn-lg" href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'Chat WhatsApp', 'rmjm' ); ?>
				</a>
			</div>

			<div class="hero-trust">
				<div class="trust-badge">
					<span class="icon">&#10003;</span>
					<?php esc_html_e( '100+ Mobil Tersedia', 'rmjm' ); ?>
				</div>
				<div class="trust-badge">
					<span class="icon">&#10003;</span>
					<?php esc_html_e( 'Antar Jemput Gratis', 'rmjm' ); ?>
				</div>
				<div class="trust-badge">
					<span class="icon">&#10003;</span>
					<?php esc_html_e( 'Harga Transparan', 'rmjm' ); ?>
				</div>
			</div>

		</div><!-- .hero-content -->

		<div class="hero-image">
			<?php
			// TODO: Add hero-car.png to assets/images/ — recommended size 800×560px,
			// transparent background PNG of a car (e.g. Toyota Avanza or Innova).
			// The image is hidden on mobile (≤1024px) via CSS.
			?>
			<img
				src="<?php echo esc_url( RMJM_URI . '/assets/images/hero-car.png' ); ?>"
				alt="<?php esc_attr_e( 'Mobil rental Jogja', 'rmjm' ); ?>"
				loading="eager"
				width="560"
				height="392"
			/>
		</div><!-- .hero-image -->

	</div><!-- .container -->
</section><!-- .hero -->
