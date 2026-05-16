<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

// ── Constants ──────────────────────────────────────────────────────────────────
define( 'RMJM_VERSION', '1.0.0' );
define( 'RMJM_DIR', get_template_directory() );
define( 'RMJM_URI', get_template_directory_uri() );

// ── Theme Setup ────────────────────────────────────────────────────────────────
function rmjm_setup() {
	load_theme_textdomain( 'rmjm', RMJM_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	add_theme_support( 'custom-logo', array(
		'width'       => 200,
		'height'      => 48,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rmjm' ),
		'footer'  => __( 'Footer Menu', 'rmjm' ),
	) );

	add_image_size( 'rmjm-fleet', 600, 400, true );
	add_image_size( 'rmjm-blog',  800, 500, true );
	add_image_size( 'rmjm-hero', 1200, 800, true );
}
add_action( 'after_setup_theme', 'rmjm_setup' );

// ── Enqueue Scripts & Styles ───────────────────────────────────────────────────
function rmjm_enqueue_assets() {
	$google_fonts = 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap';

	wp_enqueue_style( 'rmjm-google-fonts', $google_fonts, array(), null );
	wp_enqueue_style( 'rmjm-style', get_stylesheet_uri(), array(), RMJM_VERSION );
	wp_enqueue_style( 'rmjm-main', RMJM_URI . '/assets/css/main.css', array( 'rmjm-style' ), RMJM_VERSION );

	wp_enqueue_script( 'rmjm-main', RMJM_URI . '/assets/js/main.js', array(), RMJM_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rmjm_enqueue_assets' );

// ── Resource Hints ─────────────────────────────────────────────────────────────
function rmjm_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => '',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'rmjm_resource_hints', 10, 2 );

// ── Custom Post Type: Armada ───────────────────────────────────────────────────
function rmjm_register_armada_cpt() {
	$labels = array(
		'name'                  => __( 'Armada', 'rmjm' ),
		'singular_name'         => __( 'Armada', 'rmjm' ),
		'add_new'               => __( 'Tambah Mobil', 'rmjm' ),
		'add_new_item'          => __( 'Tambah Mobil Baru', 'rmjm' ),
		'edit_item'             => __( 'Edit Mobil', 'rmjm' ),
		'new_item'              => __( 'Mobil Baru', 'rmjm' ),
		'view_item'             => __( 'Lihat Mobil', 'rmjm' ),
		'view_items'            => __( 'Lihat Semua Mobil', 'rmjm' ),
		'search_items'          => __( 'Cari Mobil', 'rmjm' ),
		'not_found'             => __( 'Tidak ada mobil ditemukan.', 'rmjm' ),
		'not_found_in_trash'    => __( 'Tidak ada mobil di sampah.', 'rmjm' ),
		'all_items'             => __( 'Semua Mobil', 'rmjm' ),
		'menu_name'             => __( 'Armada', 'rmjm' ),
		'archives'              => __( 'Arsip Armada', 'rmjm' ),
		'attributes'            => __( 'Atribut Mobil', 'rmjm' ),
		'featured_image'        => __( 'Foto Utama', 'rmjm' ),
		'set_featured_image'    => __( 'Set Foto Utama', 'rmjm' ),
		'remove_featured_image' => __( 'Hapus Foto Utama', 'rmjm' ),
		'use_featured_image'    => __( 'Gunakan Sebagai Foto Utama', 'rmjm' ),
	);

	register_post_type( 'armada', array(
		'labels'             => $labels,
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_in_rest'       => true,
		'has_archive'        => true,
		'publicly_queryable' => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'armada', 'with_front' => false ),
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
		'menu_icon'          => 'dashicons-car',
		'menu_position'      => 5,
		'capability_type'    => 'post',
	) );
}
add_action( 'init', 'rmjm_register_armada_cpt' );

// ── Taxonomy: Armada Kategori ──────────────────────────────────────────────────
function rmjm_register_armada_kategori() {
	$labels = array(
		'name'              => __( 'Kategori Mobil', 'rmjm' ),
		'singular_name'     => __( 'Kategori Mobil', 'rmjm' ),
		'search_items'      => __( 'Cari Kategori', 'rmjm' ),
		'all_items'         => __( 'Semua Kategori', 'rmjm' ),
		'parent_item'       => __( 'Kategori Induk', 'rmjm' ),
		'parent_item_colon' => __( 'Kategori Induk:', 'rmjm' ),
		'edit_item'         => __( 'Edit Kategori', 'rmjm' ),
		'update_item'       => __( 'Update Kategori', 'rmjm' ),
		'add_new_item'      => __( 'Tambah Kategori Baru', 'rmjm' ),
		'new_item_name'     => __( 'Nama Kategori Baru', 'rmjm' ),
		'menu_name'         => __( 'Kategori Mobil', 'rmjm' ),
	);

	register_taxonomy( 'armada_kategori', 'armada', array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'kategori-mobil', 'with_front' => false ),
	) );
}
add_action( 'init', 'rmjm_register_armada_kategori' );

// ── Meta Box: Detail Mobil ─────────────────────────────────────────────────────
function rmjm_add_armada_meta_box() {
	add_meta_box(
		'rmjm_detail_mobil',
		__( 'Detail Mobil', 'rmjm' ),
		'rmjm_render_armada_meta_box',
		'armada',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'rmjm_add_armada_meta_box' );

function rmjm_render_armada_meta_box( $post ) {
	wp_nonce_field( 'rmjm_save_armada_meta', 'rmjm_armada_nonce' );

	$text_fields = array(
		'price'        => __( 'Harga (angka saja, misal: 350000)', 'rmjm' ),
		'price_label'  => __( 'Label Harga (misal: / hari)', 'rmjm' ),
		'seats'        => __( 'Jumlah Kursi (misal: 7)', 'rmjm' ),
		'transmission' => __( 'Transmisi (Manual / Automatic)', 'rmjm' ),
		'fuel'         => __( 'Bahan Bakar (misal: Bensin)', 'rmjm' ),
		'luggage'      => __( 'Bagasi (misal: 3 koper)', 'rmjm' ),
	);

	$textarea_fields = array(
		'features'     => __( 'Fitur (pisahkan koma, misal: AC, Audio, Power Window, USB)', 'rmjm' ),
		'whatsapp_msg' => __( 'Pesan WhatsApp (opsional — kosongkan untuk pesan otomatis)', 'rmjm' ),
	);
	?>
	<table class="form-table" role="presentation">
		<?php foreach ( $text_fields as $key => $label ) :
			$value = get_post_meta( $post->ID, '_rmjm_' . $key, true );
		?>
		<tr>
			<th scope="row">
				<label for="rmjm_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label>
			</th>
			<td>
				<input
					type="text"
					id="rmjm_<?php echo esc_attr( $key ); ?>"
					name="rmjm_<?php echo esc_attr( $key ); ?>"
					value="<?php echo esc_attr( $value ); ?>"
					class="regular-text"
				/>
			</td>
		</tr>
		<?php endforeach; ?>

		<?php foreach ( $textarea_fields as $key => $label ) :
			$value = get_post_meta( $post->ID, '_rmjm_' . $key, true );
		?>
		<tr>
			<th scope="row">
				<label for="rmjm_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label>
			</th>
			<td>
				<textarea
					id="rmjm_<?php echo esc_attr( $key ); ?>"
					name="rmjm_<?php echo esc_attr( $key ); ?>"
					rows="3"
					class="large-text"
				><?php echo esc_textarea( $value ); ?></textarea>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php
}

function rmjm_save_armada_meta( $post_id ) {
	if ( ! isset( $_POST['rmjm_armada_nonce'] ) ) return;
	if ( ! wp_verify_nonce( $_POST['rmjm_armada_nonce'], 'rmjm_save_armada_meta' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	$all_fields = array( 'price', 'price_label', 'seats', 'transmission', 'fuel', 'luggage', 'features', 'whatsapp_msg' );

	foreach ( $all_fields as $key ) {
		if ( isset( $_POST[ 'rmjm_' . $key ] ) ) {
			update_post_meta(
				$post_id,
				'_rmjm_' . $key,
				sanitize_text_field( wp_unslash( $_POST[ 'rmjm_' . $key ] ) )
			);
		}
	}
}
add_action( 'save_post_armada', 'rmjm_save_armada_meta' );

// ── Customizer ─────────────────────────────────────────────────────────────────
function rmjm_customize_register( $wp_customize ) {
	$wp_customize->add_panel( 'rmjm_business_panel', array(
		'title'    => __( 'Info Bisnis RMJM', 'rmjm' ),
		'priority' => 30,
	) );

	$wp_customize->add_section( 'rmjm_business', array(
		'title'    => __( 'Info Bisnis RMJM', 'rmjm' ),
		'panel'    => 'rmjm_business_panel',
		'priority' => 10,
	) );

	// All plain-text controls share sanitize_text_field.
	$plain_controls = array(
		'rmjm_whatsapp_number'      => __( 'Nomor WhatsApp (tanpa + atau 0 awal, misal: 6281234567890)', 'rmjm' ),
		'rmjm_whatsapp_default_msg' => __( 'Pesan WhatsApp Default', 'rmjm' ),
		'rmjm_phone'                => __( 'Nomor Telepon', 'rmjm' ),
		'rmjm_email'                => __( 'Email', 'rmjm' ),
		'rmjm_address'              => __( 'Alamat', 'rmjm' ),
		'rmjm_instagram'            => __( 'Instagram URL', 'rmjm' ),
		'rmjm_facebook'             => __( 'Facebook URL', 'rmjm' ),
		'rmjm_tiktok'               => __( 'TikTok URL', 'rmjm' ),
		'rmjm_hero_tagline'         => __( 'Hero Tagline (teks kecil di atas judul)', 'rmjm' ),
		'rmjm_hero_subtitle'        => __( 'Hero Subtitle', 'rmjm' ),
	);

	$priority = 10;
	foreach ( $plain_controls as $id => $label ) {
		$wp_customize->add_setting( $id, array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $id, array(
			'label'    => $label,
			'section'  => 'rmjm_business',
			'type'     => 'text',
			'priority' => $priority,
		) );
		$priority += 10;
	}

	// Hero title may contain <span> for the accent-coloured word.
	$wp_customize->add_setting( 'rmjm_hero_title', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'rmjm_hero_title', array(
		'label'    => __( 'Hero Title (boleh pakai <span> untuk warna aksen)', 'rmjm' ),
		'section'  => 'rmjm_business',
		'type'     => 'text',
		'priority' => $priority,
	) );
}
add_action( 'customize_register', 'rmjm_customize_register' );

// ── Helper Functions ───────────────────────────────────────────────────────────

/**
 * Build a wa.me URL. Falls back to the Customizer default message if $message
 * is empty. Returns '#' when no WhatsApp number is configured.
 */
function rmjm_whatsapp_url( $message = '' ) {
	$number = preg_replace( '/\D/', '', get_theme_mod( 'rmjm_whatsapp_number', '' ) );
	if ( empty( $number ) ) {
		return '#';
	}

	if ( empty( $message ) ) {
		$message = get_theme_mod( 'rmjm_whatsapp_default_msg', '' );
	}

	$url = 'https://wa.me/' . $number;
	if ( ! empty( $message ) ) {
		$url .= '?text=' . rawurlencode( $message );
	}

	return esc_url( $url );
}

/**
 * Build a per-car wa.me URL. Uses the car's custom message when set;
 * otherwise auto-builds "Halo, saya tertarik untuk sewa mobil [Name]…".
 */
function rmjm_armada_whatsapp_url( $post_id ) {
	$custom_msg = rmjm_armada_meta( 'whatsapp_msg', $post_id );

	if ( ! empty( $custom_msg ) ) {
		return rmjm_whatsapp_url( $custom_msg );
	}

	$car_name = get_the_title( $post_id );
	/* translators: %s: car name */
	$message = sprintf(
		__( 'Halo, saya tertarik untuk sewa mobil %s. Boleh minta info harga dan ketersediaannya?', 'rmjm' ),
		$car_name
	);

	return rmjm_whatsapp_url( $message );
}

/**
 * Format a raw price integer as Indonesian Rupiah: 350000 → "Rp 350.000".
 */
function rmjm_format_price( $amount ) {
	return 'Rp ' . number_format( (float) $amount, 0, ',', '.' );
}

/**
 * Get a single Armada post meta value. Falls back to $fallback when empty.
 */
function rmjm_armada_meta( $key, $post_id = null, $fallback = '' ) {
	if ( null === $post_id ) {
		$post_id = get_the_ID();
	}
	$value = get_post_meta( (int) $post_id, '_rmjm_' . $key, true );
	return ( '' !== $value && false !== $value ) ? $value : $fallback;
}

/**
 * Return the Armada features as a clean array, split from the comma string.
 */
function rmjm_armada_features( $post_id = null ) {
	$raw = rmjm_armada_meta( 'features', $post_id );
	if ( empty( $raw ) ) {
		return array();
	}
	return array_values( array_filter( array_map( 'trim', explode( ',', $raw ) ) ) );
}

// ── Excerpt ────────────────────────────────────────────────────────────────────
function rmjm_excerpt_length() {
	return 22;
}
add_filter( 'excerpt_length', 'rmjm_excerpt_length', 999 );

function rmjm_excerpt_more() {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'rmjm_excerpt_more' );

// ── Pingback Header ────────────────────────────────────────────────────────────
function rmjm_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'rmjm_pingback_header' );

// ── Flush Rewrite Rules on Theme Switch ───────────────────────────────────────
function rmjm_on_theme_switch() {
	rmjm_register_armada_cpt();
	rmjm_register_armada_kategori();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'rmjm_on_theme_switch' );
