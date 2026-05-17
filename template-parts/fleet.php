<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

$fleet_query = new WP_Query( array(
	'post_type'      => 'armada',
	'posts_per_page' => 6,
	'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
	'post_status'    => 'publish',
) );
?>

<div class="container">

	<div class="section-header">
		<h2 class="section-title section-title--center"><?php esc_html_e( 'Armada Kami', 'rmjm' ); ?></h2>
		<p class="section-subtitle section-subtitle--center"><?php esc_html_e( 'Pilih mobil sesuai kebutuhan Anda. Semua armada terawat dan siap jalan.', 'rmjm' ); ?></p>
	</div>

	<?php if ( $fleet_query->have_posts() ) : ?>

	<div class="fleet-grid">
		<?php while ( $fleet_query->have_posts() ) : $fleet_query->the_post(); ?>
			<?php get_template_part( 'template-parts/armada-card' ); ?>
		<?php endwhile; ?>
	</div><!-- .fleet-grid -->

	<?php else : ?>

	<p class="no-results">
		<?php esc_html_e( 'Belum ada armada yang ditambahkan. Tambahkan mobil pertama Anda di WP Admin → Armada → Tambah Mobil.', 'rmjm' ); ?>
	</p>

	<?php endif; ?>

	<?php wp_reset_postdata(); ?>

	<div style="text-align:center; margin-top:var(--space-10);">
		<a class="btn btn-outline btn-lg" href="<?php echo esc_url( get_post_type_archive_link( 'armada' ) ); ?>">
			<?php esc_html_e( 'Lihat Semua Armada', 'rmjm' ); ?>
		</a>
	</div>

</div><!-- .container -->
