<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

$services = array(

	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="28" height="28" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>',
		'title'       => __( 'Rental Harian', 'rmjm' ),
		'description' => __( 'Sewa mobil fleksibel mulai 12 jam, cocok untuk wisata, perjalanan bisnis, atau keperluan harian di Yogyakarta.', 'rmjm' ),
		'features'    => array(
			__( 'Durasi 12 jam atau 24 jam', 'rmjm' ),
			__( 'Berlaku di Yogyakarta & sekitarnya', 'rmjm' ),
			__( 'Pilihan lepas kunci atau dengan sopir', 'rmjm' ),
			__( 'Armada beragam — city car hingga MPV', 'rmjm' ),
		),
	),

	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="28" height="28" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>',
		'title'       => __( 'Sewa + Sopir', 'rmjm' ),
		'description' => __( 'Nikmati perjalanan nyaman dengan sopir berpengalaman dan ramah yang siap menemani seharian penuh.', 'rmjm' ),
		'features'    => array(
			__( 'Sopir profesional & berlisensi', 'rmjm' ),
			__( 'Tersedia untuk wisata maupun bisnis', 'rmjm' ),
			__( 'Tunjangan makan sopir termasuk', 'rmjm' ),
			__( 'Bisa multi-destinasi dalam sehari', 'rmjm' ),
		),
	),

	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="28" height="28" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.769 59.769 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"/></svg>',
		'title'       => __( 'Antar Jemput Bandara YIA', 'rmjm' ),
		'description' => __( 'Layanan jemput dan antar ke Bandara Internasional Yogyakarta (YIA) tepat waktu dan tanpa repot.', 'rmjm' ),
		'features'    => array(
			__( 'Jemput sesuai jadwal penerbangan', 'rmjm' ),
			__( 'Melayani kedatangan & keberangkatan', 'rmjm' ),
			__( 'Tersedia 24 jam setiap hari', 'rmjm' ),
			__( 'Gratis tunggu hingga 60 menit', 'rmjm' ),
		),
	),

	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="28" height="28" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>',
		'title'       => __( 'Rental Bulanan', 'rmjm' ),
		'description' => __( 'Hemat lebih banyak dengan paket sewa jangka panjang, ideal untuk keperluan bisnis atau tinggal sementara di Jogja.', 'rmjm' ),
		'features'    => array(
			__( 'Harga jauh lebih hemat dari rental harian', 'rmjm' ),
			__( 'Kontrak fleksibel mulai 30 hari', 'rmjm' ),
			__( 'Servis & perawatan rutin termasuk', 'rmjm' ),
			__( 'Bisa diperpanjang kapan saja', 'rmjm' ),
		),
	),

	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="28" height="28" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z"/></svg>',
		'title'       => __( 'Lepas Kunci', 'rmjm' ),
		'description' => __( 'Bebas berkendara sendiri tanpa sopir — ideal untuk Anda yang ingin privasi dan kebebasan menjelajahi Jogja.', 'rmjm' ),
		'features'    => array(
			__( 'Bebas kemana saja di wilayah Yogyakarta', 'rmjm' ),
			__( 'Cukup tunjukkan SIM yang masih berlaku', 'rmjm' ),
			__( 'Deposit terjangkau, proses cepat', 'rmjm' ),
			__( 'BBM ditanggung penyewa', 'rmjm' ),
		),
	),

	array(
		'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="28" height="28" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>',
		'title'       => __( 'Support 24/7', 'rmjm' ),
		'description' => __( 'Tim kami siap membantu kapan saja — siang, malam, hari libur — untuk memastikan perjalanan Anda selalu lancar.', 'rmjm' ),
		'features'    => array(
			__( 'Respon cepat via WhatsApp & telepon', 'rmjm' ),
			__( 'Bantuan darurat di jalan', 'rmjm' ),
			__( 'Konsultasi pilihan armada gratis', 'rmjm' ),
			__( 'Tersedia 365 hari setahun', 'rmjm' ),
		),
	),

);
?>

<div class="container">

	<div class="section-header">
		<h2 class="section-title section-title--center"><?php esc_html_e( 'Layanan Kami', 'rmjm' ); ?></h2>
		<p class="section-subtitle section-subtitle--center"><?php esc_html_e( 'Solusi lengkap untuk semua kebutuhan rental mobil Anda di Yogyakarta.', 'rmjm' ); ?></p>
	</div>

	<div class="services-grid">
		<?php foreach ( $services as $service ) : ?>
		<div class="service-card">

			<div class="icon-wrap">
				<?php echo $service['icon']; // phpcs:ignore WordPress.Security.EscapeOutput -- developer-defined SVG constant ?>
			</div>

			<h3><?php echo esc_html( $service['title'] ); ?></h3>

			<p><?php echo esc_html( $service['description'] ); ?></p>

			<ul class="feature-list">
				<?php foreach ( $service['features'] as $feature ) : ?>
				<li><?php echo esc_html( $feature ); ?></li>
				<?php endforeach; ?>
			</ul>

		</div><!-- .service-card -->
		<?php endforeach; ?>
	</div><!-- .services-grid -->

</div><!-- .container -->
