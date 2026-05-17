<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>

<?php get_template_part( 'template-parts/hero' ); ?>

<section class="section section--light" id="layanan">
	<?php get_template_part( 'template-parts/services' ); ?>
</section>

<section class="section" id="armada">
	<?php get_template_part( 'template-parts/fleet' ); ?>
</section>

<section class="section section--blue-tint" id="testimoni">
	<?php get_template_part( 'template-parts/testimonials' ); ?>
</section>

<section class="section" id="blog">
	<?php get_template_part( 'template-parts/blog-preview' ); ?>
</section>

<?php get_footer(); ?>
