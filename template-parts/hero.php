<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<section class="hero hero--centered">

	<div class="hero-bg">
		<!-- TODO: Place a landscape hero photo at assets/images/hero-bg.jpg
		     Recommended: 1920×1080px or larger, Jogja temple/landscape.
		     The dark green overlay (hero-overlay) renders on top of this image. -->
		<img
			src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-bg.jpg' ); ?>"
			alt=""
			loading="eager"
		/>
		<div class="hero-overlay"></div>
	</div>

	<div class="container">
		<div class="hero-content hero-content--centered">

			<h1 class="hero-title">
				<?php echo wp_kses_post( get_theme_mod( 'rmjm_hero_title', __( 'Rental Mobil Jogja<br>Terbaik & Terpercaya', 'rmjm' ) ) ); ?>
			</h1>

			<p class="hero-description">
				<?php echo esc_html( get_theme_mod( 'rmjm_hero_subtitle', __( 'Sewa mobil di Yogyakarta dengan harga terjangkau. Armada lengkap, sopir profesional, dan layanan 24 jam.', 'rmjm' ) ) ); ?>
			</p>

			<div class="hero-trust">
				<div class="trust-badge"><?php esc_html_e( '✓ Armada Terjamin', 'rmjm' ); ?></div>
				<div class="trust-badge"><?php esc_html_e( '✓ Layanan 24 Jam', 'rmjm' ); ?></div>
				<div class="trust-badge"><?php esc_html_e( '✓ Harga Terbaik', 'rmjm' ); ?></div>
			</div>

			<div class="hero-actions">
				<a class="btn btn-primary btn-lg" href="#armada">
					<?php esc_html_e( 'Lihat Armada Kami', 'rmjm' ); ?>
				</a>
				<a class="btn btn-outline-white btn-lg" href="<?php echo esc_url( rmjm_whatsapp_url() ); ?>" target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'WhatsApp Sekarang', 'rmjm' ); ?>
				</a>
			</div>

		</div><!-- .hero-content--centered -->
	</div><!-- .container -->

</section><!-- .hero -->
