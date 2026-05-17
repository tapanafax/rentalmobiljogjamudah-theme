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
?>
<article class="fleet-card">

	<div class="fleet-card-image">

		<?php if ( $terms && ! is_wp_error( $terms ) ) :
			$first_term = reset( $terms );
		?>
		<span class="fleet-category-badge"><?php echo esc_html( $first_term->name ); ?></span>
		<?php endif; ?>

		<?php if ( has_post_thumbnail() ) :
			the_post_thumbnail( 'rmjm-fleet', array( 'alt' => get_the_title() ) );
		endif; ?>

	</div><!-- .fleet-card-image -->

	<div class="fleet-card-body">

		<h3><?php echo esc_html( get_the_title() ); ?></h3>

		<div class="fleet-price">
			<span class="amount">
				<?php echo esc_html( ! empty( $price ) ? rmjm_format_price( $price ) : __( 'Hubungi kami', 'rmjm' ) ); ?>
			</span>
			<span class="period"><?php echo esc_html( $price_label ); ?></span>
		</div>

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

		<?php if ( ! empty( $features ) ) : ?>
		<div class="fleet-features">
			<?php foreach ( $features as $feature ) : ?>
			<span class="fleet-feature-tag"><?php echo esc_html( $feature ); ?></span>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<div class="fleet-card-actions">
			<a class="btn btn-whatsapp" href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer">
				<?php esc_html_e( 'Pesan via WhatsApp', 'rmjm' ); ?>
			</a>
			<a class="btn btn-outline" href="<?php echo esc_url( get_permalink() ); ?>">
				<?php esc_html_e( 'Lihat Detail', 'rmjm' ); ?>
			</a>
		</div>

	</div><!-- .fleet-card-body -->

</article><!-- .fleet-card -->
