<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

while ( have_posts() ) : the_post(); ?>

<header class="page-hero">
	<div class="container">
		<h1><?php echo esc_html( get_the_title() ); ?></h1>
	</div>
</header>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-content">

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
</article>

<?php if ( comments_open() || get_comments_number() > 0 ) : ?>
	<?php comments_template(); ?>
<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
