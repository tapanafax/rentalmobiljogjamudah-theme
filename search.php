<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

$search_query = get_search_query();
?>

<div class="page-hero">
	<div class="container">
		<h1><?php esc_html_e( 'Hasil Pencarian', 'rmjm' ); ?></h1>
		<p>
			<?php esc_html_e( 'untuk', 'rmjm' ); ?>
			&ldquo;<em><?php echo esc_html( $search_query ); ?></em>&rdquo;
		</p>
	</div>
</div>

<div class="container section">

	<?php if ( have_posts() ) : ?>

	<p style="margin-bottom:var(--space-8);color:var(--color-text-secondary);font-size:var(--text-sm);">
		<?php
		printf(
			/* translators: %d: number of results */
			esc_html__( 'Ditemukan %d hasil', 'rmjm' ),
			(int) $wp_query->found_posts
		);
		?>
	</p>

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
	<nav class="pagination" aria-label="<?php esc_attr_e( 'Navigasi pencarian', 'rmjm' ); ?>">
		<?php foreach ( $pagination as $link ) : ?>
			<?php echo $link; // phpcs:ignore WordPress.Security.EscapeOutput -- WordPress core output ?>
		<?php endforeach; ?>
	</nav>
	<?php endif; ?>

	<?php else : ?>

	<div class="no-results">
		<h2><?php esc_html_e( 'Tidak ada hasil ditemukan.', 'rmjm' ); ?></h2>
		<p>
			<?php
			printf(
				/* translators: %s: search query */
				esc_html__( 'Tidak ada hasil untuk &ldquo;%s&rdquo;. Coba kata kunci lain.', 'rmjm' ),
				esc_html( $search_query )
			);
			?>
		</p>
		<?php get_search_form(); ?>
	</div>

	<?php endif; ?>

</div><!-- .container.section -->

<?php get_footer(); ?>
