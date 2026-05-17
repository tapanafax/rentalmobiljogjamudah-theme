<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

$blog_query = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

$page_for_posts = (int) get_option( 'page_for_posts' );
$blog_url       = $page_for_posts ? get_permalink( $page_for_posts ) : home_url( '/' );
?>

<div class="container">

	<div class="section-header">
		<h2 class="section-title section-title--center"><?php esc_html_e( 'Artikel & Tips', 'rmjm' ); ?></h2>
		<p class="section-subtitle section-subtitle--center"><?php esc_html_e( 'Panduan, tips perjalanan, dan info wisata Yogyakarta.', 'rmjm' ); ?></p>
	</div>

	<?php if ( $blog_query->have_posts() ) : ?>

	<div class="blog-grid">
		<?php while ( $blog_query->have_posts() ) : $blog_query->the_post();
			$permalink  = get_permalink();
			$categories = get_the_category();
			$first_cat  = ! empty( $categories ) ? $categories[0] : null;
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

	<?php else : ?>

	<p class="no-results">
		<?php esc_html_e( 'Belum ada artikel. Buat post pertama Anda di WP Admin → Posts → Add New.', 'rmjm' ); ?>
	</p>

	<?php endif; ?>

	<?php wp_reset_postdata(); ?>

	<div style="text-align:center; margin-top:var(--space-10);">
		<a class="btn btn-outline btn-lg" href="<?php echo esc_url( $blog_url ); ?>">
			<?php esc_html_e( 'Lihat Semua Artikel', 'rmjm' ); ?>
		</a>
	</div>

</div><!-- .container -->
