<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

// ── Archive hero copy ──────────────────────────────────────────────────────────
$hero_prefix = '';
$hero_name   = '';
$hero_desc   = '';

if ( is_category() ) {

	$hero_prefix = __( 'Kategori', 'rmjm' );
	$hero_name   = single_term_title( '', false );
	$hero_desc   = term_description();

} elseif ( is_tag() ) {

	$hero_prefix = __( 'Tag', 'rmjm' );
	$hero_name   = single_term_title( '', false );
	$hero_desc   = term_description();

} elseif ( is_author() ) {

	$author      = get_queried_object();
	$hero_prefix = __( 'Penulis', 'rmjm' );
	$hero_name   = $author ? $author->display_name : '';

} elseif ( is_year() ) {

	$hero_prefix = __( 'Arsip', 'rmjm' );
	$hero_name   = get_query_var( 'year' );

} elseif ( is_month() ) {

	$hero_prefix = __( 'Arsip', 'rmjm' );
	$hero_name   = date_i18n(
		'F Y',
		mktime( 0, 0, 0, (int) get_query_var( 'monthnum' ), 1, (int) get_query_var( 'year' ) )
	);

} elseif ( is_day() ) {

	$hero_prefix = __( 'Arsip', 'rmjm' );
	$hero_name   = date_i18n(
		get_option( 'date_format' ),
		mktime( 0, 0, 0, (int) get_query_var( 'monthnum' ), (int) get_query_var( 'day' ), (int) get_query_var( 'year' ) )
	);

} elseif ( is_tax() ) {

	$term        = get_queried_object();
	$tax         = $term ? get_taxonomy( $term->taxonomy ) : null;
	$hero_prefix = $tax ? $tax->labels->singular_name : '';
	$hero_name   = single_term_title( '', false );
	$hero_desc   = term_description();

} else {

	// Catch-all: post type archives and anything else.
	$hero_name = get_the_archive_title();
	$hero_desc = get_the_archive_description();

}

$hero_title = ! empty( $hero_prefix )
	? esc_html( $hero_prefix ) . ': ' . esc_html( $hero_name )
	: esc_html( $hero_name );
?>

<div class="page-hero">
	<div class="container">
		<h1><?php echo $hero_title; // already escaped above ?></h1>
		<?php if ( ! empty( $hero_desc ) ) : ?>
		<p><?php echo wp_kses_post( $hero_desc ); ?></p>
		<?php endif; ?>
	</div>
</div>

<div class="container section">

	<?php if ( have_posts() ) : ?>

	<div class="blog-grid">
		<?php while ( have_posts() ) : the_post();
			$permalink = get_permalink();
			$cats      = get_the_category();
			$first_cat = ! empty( $cats ) ? $cats[0] : null;
		?>
		<article class="blog-card">

			<a href="<?php echo esc_url( $permalink ); ?>" class="blog-card-image" aria-hidden="true" tabindex="-1">
				<?php if ( has_post_thumbnail() ) :
					the_post_thumbnail( 'rmjm-blog', array( 'alt' => '' ) );
				else : ?>
					<div style="width:100%;height:100%;background:var(--color-hero-gradient);"></div>
				<?php endif; ?>
			</a>

			<div class="blog-card-body">

				<div class="blog-card-meta">
					<?php if ( $first_cat ) : ?>
					<a class="blog-category" href="<?php echo esc_url( get_category_link( $first_cat->term_id ) ); ?>">
						<?php echo esc_html( $first_cat->name ); ?>
					</a>
					<?php endif; ?>
					<span class="blog-date"><?php echo esc_html( get_the_date() ); ?></span>
				</div>

				<h3>
					<a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
				</h3>

				<p><?php echo esc_html( get_the_excerpt() ); ?></p>

				<a href="<?php echo esc_url( $permalink ); ?>" class="read-more">
					<?php esc_html_e( 'Baca Selengkapnya', 'rmjm' ); ?> &rarr;
				</a>

			</div><!-- .blog-card-body -->

		</article><!-- .blog-card -->
		<?php endwhile; ?>
	</div><!-- .blog-grid -->

	<?php
	$pagination = paginate_links( array(
		'mid_size'  => 2,
		'prev_text' => '&larr; ' . esc_html__( 'Sebelumnya', 'rmjm' ),
		'next_text' => esc_html__( 'Berikutnya', 'rmjm' ) . ' &rarr;',
		'type'      => 'array',
	) );

	if ( ! empty( $pagination ) ) : ?>
	<nav class="pagination" aria-label="<?php esc_attr_e( 'Navigasi halaman', 'rmjm' ); ?>">
		<?php foreach ( $pagination as $link ) : ?>
			<?php echo $link; // phpcs:ignore WordPress.Security.EscapeOutput -- WordPress core output ?>
		<?php endforeach; ?>
	</nav>
	<?php endif; ?>

	<?php else : ?>

	<div class="no-results">
		<h2><?php esc_html_e( 'Tidak ada konten ditemukan.', 'rmjm' ); ?></h2>
		<p><?php esc_html_e( 'Coba gunakan pencarian atau kembali ke halaman utama.', 'rmjm' ); ?></p>
		<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php esc_html_e( 'Kembali ke Beranda', 'rmjm' ); ?>
		</a>
	</div>

	<?php endif; ?>

</div><!-- .container.section -->

<?php get_footer(); ?>
