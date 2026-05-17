<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

$wa_url    = rmjm_whatsapp_url();
$phone     = get_theme_mod( 'rmjm_phone',     '' );
$email     = get_theme_mod( 'rmjm_email',     '' );
$address   = get_theme_mod( 'rmjm_address',   '' );
$instagram = get_theme_mod( 'rmjm_instagram', '' );
$facebook  = get_theme_mod( 'rmjm_facebook',  '' );
$tiktok    = get_theme_mod( 'rmjm_tiktok',    '' );
$maps_url  = get_theme_mod( 'rmjm_google_maps_embed', '' );

$site_desc = get_bloginfo( 'description' );
if ( empty( $site_desc ) ) {
	$site_desc = __( 'Rental mobil Jogja terpercaya dengan armada lengkap dan layanan profesional.', 'rmjm' );
}
?>

</main><!-- #content -->

<footer class="site-footer">
	<div class="container">

		<div class="footer-grid">

			<!-- Brand column -->
			<div class="footer-col footer-brand">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<div class="footer-logo-text"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></div>
				<?php endif; ?>

				<p><?php echo esc_html( $site_desc ); ?></p>

				<?php if ( $instagram || $facebook || $tiktok ) : ?>
				<div class="footer-socials">

					<?php if ( $instagram ) : ?>
					<a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
							<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
						</svg>
					</a>
					<?php endif; ?>

					<?php if ( $facebook ) : ?>
					<a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
							<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
						</svg>
					</a>
					<?php endif; ?>

					<?php if ( $tiktok ) : ?>
					<a href="<?php echo esc_url( $tiktok ); ?>" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
							<path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
						</svg>
					</a>
					<?php endif; ?>

				</div><!-- .footer-socials -->
				<?php endif; ?>
			</div><!-- .footer-brand -->

			<!-- Layanan column -->
			<div class="footer-col">
				<h4><?php esc_html_e( 'Layanan Kami', 'rmjm' ); ?></h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/#layanan' ) ); ?>"><?php esc_html_e( 'Rental Mobil Harian', 'rmjm' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#layanan' ) ); ?>"><?php esc_html_e( 'Rental Mobil Mingguan', 'rmjm' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#layanan' ) ); ?>"><?php esc_html_e( 'Rental Mobil Bulanan', 'rmjm' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#layanan' ) ); ?>"><?php esc_html_e( 'Sewa Mobil + Sopir', 'rmjm' ); ?></a></li>
					<li><a href="<?php echo esc_url( get_post_type_archive_link( 'armada' ) ); ?>"><?php esc_html_e( 'Armada Kami', 'rmjm' ); ?></a></li>
				</ul>
			</div>

			<!-- Kontak column -->
			<div class="footer-col">
				<h4><?php esc_html_e( 'Kontak Kami', 'rmjm' ); ?></h4>
				<ul class="footer-contact">

					<?php if ( ! empty( $address ) ) : ?>
					<li>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;margin-top:2px;">
							<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/>
						</svg>
						<span><?php echo esc_html( $address ); ?></span>
					</li>
					<?php endif; ?>

					<?php if ( ! empty( $phone ) ) : ?>
					<li>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;margin-top:2px;">
							<path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 8.81a19.79 19.79 0 01-3.07-8.67A2 2 0 012 0h3a2 2 0 012 1.72c.13 1 .36 1.99.69 2.94a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.14-1.14a2 2 0 012.11-.45c.95.33 1.94.56 2.94.69A2 2 0 0122 16.92z"/>
						</svg>
						<a href="<?php echo esc_url( 'tel:' . preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
					</li>
					<?php endif; ?>

					<?php if ( ! empty( $email ) ) : ?>
					<li>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex-shrink:0;margin-top:2px;">
							<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
						</svg>
						<a href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php echo esc_html( $email ); ?></a>
					</li>
					<?php endif; ?>

					<?php if ( '#' !== $wa_url ) : ?>
					<li>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="flex-shrink:0;margin-top:2px;">
							<path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.867-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
						</svg>
						<a href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Chat WhatsApp', 'rmjm' ); ?></a>
					</li>
					<?php endif; ?>

				</ul>
			</div><!-- .footer-col (kontak) -->

			<!-- Lokasi column -->
			<div class="footer-col">
				<h4><?php esc_html_e( 'Lokasi Kami', 'rmjm' ); ?></h4>

				<?php if ( ! empty( $maps_url ) ) : ?>
				<div class="footer-map">
					<iframe
						src="<?php echo esc_url( $maps_url ); ?>"
						width="100%"
						height="200"
						style="border:0;"
						allowfullscreen
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"
						title="<?php esc_attr_e( 'Lokasi kami di Google Maps', 'rmjm' ); ?>"
					></iframe>
				</div>
				<?php else : ?>
				<p class="footer-map-placeholder">
					<?php esc_html_e( 'Tambahkan URL Google Maps di Customizer → Info Bisnis RMJM.', 'rmjm' ); ?>
				</p>
				<?php endif; ?>

				<p class="footer-hours">
					<strong><?php esc_html_e( 'Jam Operasional', 'rmjm' ); ?></strong><br>
					<?php esc_html_e( 'Senin - Minggu: 24 Jam', 'rmjm' ); ?><br>
					<?php esc_html_e( 'Reservasi: 08:00 - 22:00 WIB', 'rmjm' ); ?>
				</p>
			</div><!-- .footer-col (lokasi) -->

		</div><!-- .footer-grid -->

		<div class="footer-bottom">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. <?php esc_html_e( 'Semua hak dilindungi.', 'rmjm' ); ?></p>
			<ul class="footer-bottom-links">
				<li><a href="#"><?php esc_html_e( 'Tentang Kami', 'rmjm' ); ?></a></li>
				<li><a href="#"><?php esc_html_e( 'Kontak', 'rmjm' ); ?></a></li>
				<li><a href="#"><?php esc_html_e( 'Syarat & Ketentuan', 'rmjm' ); ?></a></li>
				<li><a href="#"><?php esc_html_e( 'Kebijakan Privasi', 'rmjm' ); ?></a></li>
			</ul>
		</div>

	</div><!-- .container -->
</footer><!-- .site-footer -->

<!-- Floating WhatsApp button -->
<?php if ( '#' !== $wa_url ) : ?>
<a
	class="wa-float"
	href="<?php echo $wa_url; ?>"
	target="_blank"
	rel="noopener noreferrer"
	aria-label="<?php esc_attr_e( 'Chat via WhatsApp', 'rmjm' ); ?>"
>
	<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">
		<path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.867-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
	</svg>
</a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
