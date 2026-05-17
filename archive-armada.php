<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

$kategori_terms = get_terms( array(
	'taxonomy'   => 'armada_kategori',
	'hide_empty' => true,
) );
?>

<header class="page-hero">
	<div class="container">
		<h1><?php esc_html_e( 'Armada Kami', 'rmjm' ); ?></h1>
		<p><?php esc_html_e( 'Pilih mobil sesuai kebutuhan perjalanan Anda di Yogyakarta.', 'rmjm' ); ?></p>
	</div>
</header>

<section class="section">
	<div class="container">

		<?php if ( ! is_wp_error( $kategori_terms ) && ! empty( $kategori_terms ) ) : ?>
		<div style="display:flex;flex-wrap:wrap;gap:var(--space-3);margin-bottom:var(--space-10);">
			<a
				href="<?php echo esc_url( get_post_type_archive_link( 'armada' ) ); ?>"
				class="btn btn-sm <?php echo is_post_type_archive( 'armada' ) ? 'btn-primary' : 'btn-outline'; ?>"
			>
				<?php esc_html_e( 'Semua', 'rmjm' ); ?>
			</a>
			<?php foreach ( $kategori_terms as $term ) :
				$is_active = is_tax( 'armada_kategori', $term->slug );
			?>
			<a
				href="<?php echo esc_url( get_term_link( $term ) ); ?>"
				class="btn btn-sm <?php echo $is_active ? 'btn-primary' : 'btn-outline'; ?>"
			>
				<?php echo esc_html( $term->name ); ?>
			</a>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>

		<div class="fleet-grid">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/armada-card' ); ?>
			<?php endwhile; ?>
		</div><!-- .fleet-grid -->

		<?php
		$pagination = paginate_links( array(
			'mid_size'  => 2,
			'prev_text' => '&larr; ' . esc_html__( 'Sebelumnya', 'rmjm' ),
			'next_text' => esc_html__( 'Berikutnya', 'rmjm' ) . ' &rarr;',
			'type'      => 'array',
		) );

		if ( ! empty( $pagination ) ) : ?>
		<nav class="pagination" aria-label="<?php esc_attr_e( 'Navigasi armada', 'rmjm' ); ?>">
			<?php foreach ( $pagination as $link ) : ?>
				<?php echo $link; // phpcs:ignore WordPress.Security.EscapeOutput -- WordPress core output ?>
			<?php endforeach; ?>
		</nav>
		<?php endif; ?>

		<?php else : ?>

		<div class="no-results">
			<h2><?php esc_html_e( 'Belum ada armada.', 'rmjm' ); ?></h2>
			<p><?php esc_html_e( 'Tambahkan mobil pertama Anda di WP Admin → Armada → Tambah Mobil.', 'rmjm' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'Kembali ke Beranda', 'rmjm' ); ?>
			</a>
		</div>

		<?php endif; ?>

	</div><!-- .container -->
</section>

<?php get_footer(); ?>
