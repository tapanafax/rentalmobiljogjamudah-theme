<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<section class="hero hero--centered">

	<div class="hero-bg">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-bg.jpg' ); ?>" alt="" loading="eager" />
		<div class="hero-overlay"></div>
	</div>

	<div class="container">
		<div class="hero-content hero-content--centered">

			<?php $tagline = get_theme_mod( 'rmjm_hero_tagline', '' );
			if ( $tagline ) : ?>
			<span class="hero-badge"><?php echo esc_html( $tagline ); ?></span>
			<?php endif; ?>

			<h1 class="hero-title">
				<?php echo wp_kses_post( get_theme_mod( 'rmjm_hero_title', 'Rental Mobil Jogja<br>Terbaik & Terpercaya' ) ); ?>
			</h1>

			<p class="hero-description">
				<?php echo esc_html( get_theme_mod( 'rmjm_hero_subtitle', 'Sewa mobil di Yogyakarta dengan harga terjangkau. Armada lengkap, sopir profesional, dan layanan 24 jam.' ) ); ?>
			</p>

			<div class="hero-trust">
				<div class="trust-badge">✓ Armada Terjamin</div>
				<div class="trust-badge">✓ Layanan 24 Jam</div>
				<div class="trust-badge">✓ Harga Terbaik</div>
			</div>

			<div class="hero-actions">
				<a class="btn btn-primary btn-lg" href="#armada">Lihat Armada Kami</a>
				<a class="btn btn-outline-white btn-lg" href="<?php echo esc_url( rmjm_whatsapp_url() ); ?>" target="_blank" rel="noopener">WhatsApp Sekarang</a>
			</div>

		</div><!-- .hero-content--centered -->
	</div><!-- .container -->

</section><!-- .hero -->
