<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

$testimonials = array(

	array(
		'stars'        => 5,
		'text'         => 'Dijemput tepat waktu dari Bandara YIA, padahal penerbangan saya delay hampir satu jam. Sopirnya sabar menunggu dan langsung bantu bawain koper. Mobil bersih, AC dingin, perjalanan ke hotel di Malioboro jadi santai banget. Pasti balik lagi!',
		'author_name'  => 'Budi Santoso',
		'author_label' => 'Wisatawan dari Surabaya',
	),

	array(
		'stars'        => 5,
		'text'         => 'Liburan keluarga ke Jogja sama 4 anak jadi jauh lebih nyaman pakai Innova dari sini. Sopirnya hafal semua jalur wisata, sabar nemenin anak-anak foto, dan nggak pernah buru-buru. Harga transparan, tidak ada biaya tambahan yang mengejutkan. Recommended banget!',
		'author_name'  => 'Dewi Rahmawati',
		'author_label' => 'Ibu rumah tangga, Semarang',
	),

	array(
		'stars'        => 5,
		'text'         => 'Sudah berlangganan paket bulanan untuk operasional kantor cabang kami di Jogja. Armadanya selalu prima, kalau ada kendala langsung direspons CS dalam hitungan menit — bahkan tengah malam sekalipun. Perpanjangan kontrak prosesnya gampang, cukup chat WhatsApp. Sangat profesional!',
		'author_name'  => 'Rizky Firmansyah',
		'author_label' => 'Area Manager, Jakarta',
	),

);
?>

<div class="container">

	<div class="section-header">
		<h2 class="section-title section-title--center"><?php esc_html_e( 'Apa Kata Pelanggan', 'rmjm' ); ?></h2>
		<p class="section-subtitle section-subtitle--center"><?php esc_html_e( 'Ribuan pelanggan puas telah mempercayakan perjalanan mereka kepada kami.', 'rmjm' ); ?></p>
	</div>

	<div class="testimonials-grid">
		<?php foreach ( $testimonials as $testimonial ) :
			$avatar_url = add_query_arg( array(
				'name'       => $testimonial['author_name'],
				'background' => '1B4FD8',
				'color'      => 'fff',
				'size'       => '96',
				'bold'       => 'true',
			), 'https://ui-avatars.com/api/' );
		?>
		<div class="testimonial-card">

			<div class="testimonial-stars">
				<?php echo esc_html( str_repeat( '★', intval( $testimonial['stars'] ) ) ); ?>
			</div>

			<p class="testimonial-text">
				&ldquo;<?php echo esc_html( $testimonial['text'] ); ?>&rdquo;
			</p>

			<div class="testimonial-author">
				<img
					src="<?php echo esc_url( $avatar_url ); ?>"
					alt="<?php echo esc_attr( $testimonial['author_name'] ); ?>"
					loading="lazy"
					width="48"
					height="48"
				/>
				<div class="testimonial-author-info">
					<div class="name"><?php echo esc_html( $testimonial['author_name'] ); ?></div>
					<div class="label"><?php echo esc_html( $testimonial['author_label'] ); ?></div>
				</div>
			</div>

		</div><!-- .testimonial-card -->
		<?php endforeach; ?>
	</div><!-- .testimonials-grid -->

</div><!-- .container -->
