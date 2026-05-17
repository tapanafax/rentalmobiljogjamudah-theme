<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/**
 * Shared fleet card partial. Must be called inside a WP loop after the_post()
 * so all global post functions resolve to the correct post.
 */

$post_id      = get_the_ID();
$price        = rmjm_armada_meta( 'price',        $post_id );
$price_label  = rmjm_armada_meta( 'price_label',  $post_id, __( '/ hari', 'rmjm' ) );
$seats        = rmjm_armada_meta( 'seats',        $post_id );
$transmission = rmjm_armada_meta( 'transmission', $post_id );
$fuel         = rmjm_armada_meta( 'fuel',         $post_id );
$luggage      = rmjm_armada_meta( 'luggage',      $post_id );
$features     = rmjm_armada_features( $post_id );
$wa_url       = rmjm_armada_whatsapp_url( $post_id );
$terms        = get_the_terms( $post_id, 'armada_kategori' );
$excerpt      = get_the_excerpt();

$feat_shown = array_slice( $features, 0, 3 );
$feat_extra = count( $features ) - 3;
?>
<article class="fleet-card">

	<div class="fleet-card-image">

		<?php if ( $terms && ! is_wp_error( $terms ) ) :
			$first_term = reset( $terms );
		?>
		<span class="fleet-category-badge"><?php echo esc_html( $first_term->name ); ?></span>
		<?php endif; ?>

		<span class="fleet-discount-badge"><?php esc_html_e( 'Diskon', 'rmjm' ); ?></span>

		<?php the_post_thumbnail( 'rmjm-fleet', array( 'loading' => 'lazy', 'alt' => get_the_title() ) ); ?>

	</div><!-- .fleet-card-image -->

	<div class="fleet-card-body">

		<h3 class="fleet-card-title"><?php the_title(); ?></h3>

		<div class="fleet-price">
			<span class="amount">
				<?php echo esc_html( ! empty( $price ) ? rmjm_format_price( $price ) : __( 'Hubungi kami', 'rmjm' ) ); ?>
			</span>
			<span class="period"><?php echo esc_html( $price_label ); ?></span>
		</div>

		<?php if ( ! empty( $excerpt ) ) : ?>
		<p class="fleet-card-excerpt"><?php echo esc_html( wp_trim_words( $excerpt, 22 ) ); ?></p>
		<?php endif; ?>

		<div class="fleet-specs">
			<?php if ( ! empty( $seats ) ) : ?>
			<span class="fleet-spec">👥 <?php echo esc_html( $seats ); ?> <?php esc_html_e( 'kursi', 'rmjm' ); ?></span>
			<?php endif; ?>

			<?php if ( ! empty( $transmission ) ) : ?>
			<span class="fleet-spec">⚙ <?php echo esc_html( $transmission ); ?></span>
			<?php endif; ?>

			<?php if ( ! empty( $fuel ) ) : ?>
			<span class="fleet-spec">⛽ <?php echo esc_html( $fuel ); ?></span>
			<?php endif; ?>

			<?php if ( ! empty( $luggage ) ) : ?>
			<span class="fleet-spec">🧳 <?php echo esc_html( $luggage ); ?></span>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $feat_shown ) ) : ?>
		<div class="fleet-features">
			<?php foreach ( $feat_shown as $feature ) : ?>
			<span class="fleet-feature-tag"><?php echo esc_html( $feature ); ?></span>
			<?php endforeach; ?>
			<?php if ( $feat_extra > 0 ) : ?>
			<span class="fleet-feature-tag fleet-feature-tag--more">+<?php echo (int) $feat_extra; ?></span>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<ul class="fleet-perks">
			<li>✓ <?php esc_html_e( 'Diskon sewa > 1 hari', 'rmjm' ); ?></li>
			<li>✓ <?php esc_html_e( 'Gratis antar jemput area Yogyakarta', 'rmjm' ); ?></li>
		</ul>

		<div class="fleet-card-actions">
			<a class="btn btn-outline btn-block" href="<?php echo esc_url( get_permalink() ); ?>">
				<?php esc_html_e( 'Lihat Detail', 'rmjm' ); ?>
			</a>
			<a class="btn btn-whatsapp btn-block" href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer">
				<?php esc_html_e( 'WhatsApp Sekarang', 'rmjm' ); ?>
			</a>
		</div>

	</div><!-- .fleet-card-body -->

</article><!-- .fleet-card -->
