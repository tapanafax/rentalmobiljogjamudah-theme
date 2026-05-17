<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

while ( have_posts() ) : the_post();

	$cats      = get_the_category();
	$first_cat = ! empty( $cats ) ? $cats[0] : null;
	$cat_ids   = wp_get_post_categories( get_the_ID() );

	$word_count = str_word_count( strip_tags( get_the_content() ) );
	$read_time  = max( 1, (int) round( $word_count / 200 ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>

	<header class="post-hero">
		<div class="container">

			<div class="post-hero-meta">
				<?php if ( $first_cat ) : ?>
				<a class="blog-category" href="<?php echo esc_url( get_category_link( $first_cat->term_id ) ); ?>">
					<?php echo esc_html( $first_cat->name ); ?>
				</a>
				<span>&middot;</span>
				<?php endif; ?>
				<span><?php echo esc_html( get_the_date() ); ?></span>
				<span>&middot;</span>
				<span>
					<?php
					printf(
						/* translators: %d: reading time in minutes */
						esc_html__( '%d menit baca', 'rmjm' ),
						$read_time
					);
					?>
				</span>
			</div>

			<h1><?php echo esc_html( get_the_title() ); ?></h1>

		</div>
	</header>

	<div class="post-content">

		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'rmjm-hero', array( 'alt' => get_the_title() ) ); ?>
		<?php endif; ?>

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before'      => '<div class="page-links">' . esc_html__( 'Halaman:', 'rmjm' ) . ' ',
			'after'       => '</div>',
			'link_before' => '<span class="page-numbers">',
			'link_after'  => '</span>',
		) );
		?>

	</div><!-- .post-content -->

</article><!-- .single-post -->

<?php if ( comments_open() || get_comments_number() > 0 ) : ?>
	<?php comments_template(); ?>
<?php endif; ?>

<?php
if ( ! empty( $cat_ids ) ) :
	$related = new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'post__not_in'   => array( get_the_ID() ),
		'category__in'   => $cat_ids,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'post_status'    => 'publish',
	) );

	if ( $related->have_posts() ) :
?>
<section class="section section--light">
	<div class="container">

		<div class="section-header">
			<h3 class="section-title"><?php esc_html_e( 'Artikel Lainnya', 'rmjm' ); ?></h3>
		</div>

		<div class="blog-grid">
			<?php while ( $related->have_posts() ) : $related->the_post();
				$permalink = get_permalink();
				$rel_cats  = get_the_category();
				$rel_cat   = ! empty( $rel_cats ) ? $rel_cats[0] : null;
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
						<?php if ( $rel_cat ) : ?>
						<a class="blog-category" href="<?php echo esc_url( get_category_link( $rel_cat->term_id ) ); ?>">
							<?php echo esc_html( $rel_cat->name ); ?>
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

		<?php wp_reset_postdata(); ?>

	</div><!-- .container -->
</section>

<?php
	endif;
endif;
?>

<?php endwhile; ?>

<?php get_footer(); ?>
