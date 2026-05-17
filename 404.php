<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>

<section class="section">
	<div class="container" style="text-align:center;max-width:600px;">

		<div style="font-size:8rem;font-weight:800;color:var(--color-primary);line-height:1;">404</div>

		<h1 class="section-title"><?php esc_html_e( 'Halaman Tidak Ditemukan', 'rmjm' ); ?></h1>

		<p class="section-subtitle" style="margin-bottom:var(--space-8);">
			<?php esc_html_e( 'Maaf, halaman yang Anda cari tidak ada atau sudah dipindahkan.', 'rmjm' ); ?>
		</p>

		<div style="display:flex;gap:var(--space-4);justify-content:center;flex-wrap:wrap;margin-bottom:var(--space-10);">
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'Kembali ke Beranda', 'rmjm' ); ?>
			</a>
			<a class="btn btn-whatsapp" href="<?php echo rmjm_whatsapp_url(); ?>" target="_blank" rel="noopener noreferrer">
				<?php esc_html_e( 'Chat WhatsApp', 'rmjm' ); ?>
			</a>
		</div>

		<?php get_search_form(); ?>

	</div><!-- .container -->
</section>

<?php get_footer(); ?>
