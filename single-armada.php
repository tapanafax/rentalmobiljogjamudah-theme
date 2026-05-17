<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

while ( have_posts() ) : the_post();

	$post_id      = get_the_ID();
	$car_name     = get_the_title();
	$price        = rmjm_armada_meta( 'price',        $post_id );
	$price_label  = rmjm_armada_meta( 'price_label',  $post_id, __( '/ hari', 'rmjm' ) );
	$seats        = rmjm_armada_meta( 'seats',        $post_id );
	$transmission = rmjm_armada_meta( 'transmission', $post_id );
	$fuel         = rmjm_armada_meta( 'fuel',         $post_id );
	$luggage      = rmjm_armada_meta( 'luggage',      $post_id );
	$features     = rmjm_armada_features( $post_id );
	$wa_url       = rmjm_armada_whatsapp_url( $post_id );
	$archive_url  = get_post_type_archive_link( 'armada' );

	$terms      = get_the_terms( $post_id, 'armada_kategori' );
	$first_term = ( $terms && ! is_wp_error( $terms ) ) ? reset( $terms ) : null;

	$specs = array_filter( array(
		'seats'        => $seats,
		'transmission' => $transmission,
		'fuel'         => $fuel,
		'luggage'      => $luggage,
	) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-armada' ); ?>>

	<!-- Hero -->
	<section class="hero" style="padding-block:var(--space-16);">
		<div class="container" style="grid-template-columns:1fr 1fr;">

			<div class="hero-content">

				<?php if ( $first_term ) : ?>
				<span class="hero-badge"><?php echo esc_html( $first_term->name ); ?></span>
				<?php endif; ?>

				<h1 class="hero-title"><?php echo esc_html( $car_name ); ?></h1>

				<div class="fleet-price" style="margin-bottom:var(--space-6);">
					<span class="amount" style="color:var(--color-accent);font-size:var(--text-4xl);">
						<?php echo esc_html( ! empty( $price ) ? rmjm_format_price( $price ) : __( 'Hubungi kami', 'rmjm' ) ); ?>
					</span>
					<span class="period" style="color:var(--color-text-on-dark-muted);">
						<?php echo esc_html( $price_label ); ?>
					</span>
				</div>

				<?php $excerpt = get_the_excerpt(); if ( ! empty( $excerpt ) ) : ?>
				<p class="hero-description"><?php echo esc_html( $excerpt ); ?></p>
				<?php endif; ?>

				<div class="hero-actions">
					<a class="btn btn-whatsapp btn-lg" href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer">
						<?php esc_html_e( 'Pesan Sekarang via WhatsApp', 'rmjm' ); ?>
					</a>
				</div>

			</div><!-- .hero-content -->

			<div class="hero-image">
				<?php if ( has_post_thumbnail() ) :
					the_post_thumbnail( 'rmjm-hero', array( 'alt' => esc_attr( $car_name ) ) );
				endif; ?>
			</div><!-- .hero-image -->

		</div><!-- .container -->
	</section><!-- .hero -->

	<!-- Specs, features, content -->
	<section class="section">
		<div class="container" style="max-width:900px;">

			<?php if ( ! empty( $specs ) ) : ?>
			<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:var(--space-4);margin-bottom:var(--space-12);">

				<?php if ( ! empty( $seats ) ) : ?>
				<div class="service-card" style="text-align:center;padding:var(--space-6);">
					<div style="font-size:2rem;margin-bottom:var(--space-3);">👥</div>
					<div style="font-size:var(--text-xs);color:var(--color-text-muted);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:var(--space-2);"><?php esc_html_e( 'Kapasitas', 'rmjm' ); ?></div>
					<div style="font-size:var(--text-xl);font-weight:var(--font-bold);color:var(--color-text-primary);">
						<?php echo esc_html( $seats ); ?> <?php esc_html_e( 'kursi', 'rmjm' ); ?>
					</div>
				</div>
				<?php endif; ?>

				<?php if ( ! empty( $transmission ) ) : ?>
				<div class="service-card" style="text-align:center;padding:var(--space-6);">
					<div style="font-size:2rem;margin-bottom:var(--space-3);">⚙</div>
					<div style="font-size:var(--text-xs);color:var(--color-text-muted);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:var(--space-2);"><?php esc_html_e( 'Transmisi', 'rmjm' ); ?></div>
					<div style="font-size:var(--text-xl);font-weight:var(--font-bold);color:var(--color-text-primary);">
						<?php echo esc_html( $transmission ); ?>
					</div>
				</div>
				<?php endif; ?>

				<?php if ( ! empty( $fuel ) ) : ?>
				<div class="service-card" style="text-align:center;padding:var(--space-6);">
					<div style="font-size:2rem;margin-bottom:var(--space-3);">⛽</div>
					<div style="font-size:var(--text-xs);color:var(--color-text-muted);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:var(--space-2);"><?php esc_html_e( 'Bahan Bakar', 'rmjm' ); ?></div>
					<div style="font-size:var(--text-xl);font-weight:var(--font-bold);color:var(--color-text-primary);">
						<?php echo esc_html( $fuel ); ?>
					</div>
				</div>
				<?php endif; ?>

				<?php if ( ! empty( $luggage ) ) : ?>
				<div class="service-card" style="text-align:center;padding:var(--space-6);">
					<div style="font-size:2rem;margin-bottom:var(--space-3);">🧳</div>
					<div style="font-size:var(--text-xs);color:var(--color-text-muted);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:var(--space-2);"><?php esc_html_e( 'Bagasi', 'rmjm' ); ?></div>
					<div style="font-size:var(--text-xl);font-weight:var(--font-bold);color:var(--color-text-primary);">
						<?php echo esc_html( $luggage ); ?>
					</div>
				</div>
				<?php endif; ?>

			</div><!-- specs grid -->
			<?php endif; ?>

			<?php if ( ! empty( $features ) ) : ?>
			<h2 class="section-title" style="margin-bottom:var(--space-6);"><?php esc_html_e( 'Fitur', 'rmjm' ); ?></h2>
			<div class="fleet-features" style="margin-bottom:var(--space-12);">
				<?php foreach ( $features as $feature ) : ?>
				<span class="fleet-feature-tag"><?php echo esc_html( $feature ); ?></span>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<h2 class="section-title" style="margin-bottom:var(--space-6);"><?php esc_html_e( 'Deskripsi', 'rmjm' ); ?></h2>
			<div class="post-content" style="padding:0;margin:0;">
				<?php the_content(); ?>
			</div>

		</div><!-- .container -->
	</section>

	<!-- CTA -->
	<section class="section section--blue-tint">
		<div class="container" style="text-align:center;">

			<h2 class="section-title section-title--center">
				<?php
				printf(
					/* translators: %s: car name */
					esc_html__( 'Tertarik dengan %s?', 'rmjm' ),
					esc_html( $car_name )
				);
				?>
			</h2>

			<p class="section-subtitle section-subtitle--center">
				<?php esc_html_e( 'Hubungi kami sekarang untuk cek ketersediaan dan booking.', 'rmjm' ); ?>
			</p>

			<div style="display:flex;gap:var(--space-4);justify-content:center;margin-top:var(--space-8);flex-wrap:wrap;">
				<a class="btn btn-whatsapp btn-lg" href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'WhatsApp Sekarang', 'rmjm' ); ?>
				</a>
				<a class="btn btn-outline btn-lg" href="<?php echo esc_url( $archive_url ); ?>">
					<?php esc_html_e( 'Lihat Armada Lain', 'rmjm' ); ?>
				</a>
			</div>

		</div><!-- .container -->
	</section>

</article><!-- .single-armada -->

<?php endwhile; ?>

<?php get_footer(); ?>
