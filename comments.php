<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( post_password_required() ) {
	return;
}
?>

<div class="comments-area">

	<?php if ( have_comments() ) : ?>

	<h2 class="comments-title">
		<?php
		$comment_count = (int) get_comments_number();
		printf(
			/* translators: %d: number of comments */
			esc_html( _n( '%d Komentar', '%d Komentar', $comment_count, 'rmjm' ) ),
			$comment_count
		);
		?>
	</h2>

	<ol class="comment-list">
		<?php
		wp_list_comments( array(
			'style'       => 'ol',
			'short_ping'  => true,
			'avatar_size' => 48,
		) );
		?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		$comment_nav = paginate_comments_links( array(
			'echo'      => false,
			'type'      => 'plain',
			'prev_text' => '&larr; ' . esc_html__( 'Sebelumnya', 'rmjm' ),
			'next_text' => esc_html__( 'Berikutnya', 'rmjm' ) . ' &rarr;',
		) );
	?>
	<nav class="pagination" aria-label="<?php esc_attr_e( 'Navigasi komentar', 'rmjm' ); ?>">
		<?php echo $comment_nav; // phpcs:ignore WordPress.Security.EscapeOutput -- WordPress core output ?>
	</nav>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php if ( comments_open() ) :

		comment_form( array(
			'title_reply'        => __( 'Tinggalkan Komentar', 'rmjm' ),
			'title_reply_before' => '<h2 class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
			'cancel_reply_link'  => __( 'Batal', 'rmjm' ),
			'label_submit'       => __( 'Kirim Komentar', 'rmjm' ),
			'comment_field'      =>
				'<p class="comment-form-comment">' .
				'<label for="comment">' . esc_html__( 'Komentar', 'rmjm' ) . ' <span class="required">*</span></label>' .
				'<textarea id="comment" name="comment" rows="5" placeholder="' . esc_attr__( 'Tulis komentar Anda di sini…', 'rmjm' ) . '" required></textarea>' .
				'</p>',
			'fields'             => array(
				'author' =>
					'<p class="comment-form-author">' .
					'<label for="author">' . esc_html__( 'Nama', 'rmjm' ) . ' <span class="required">*</span></label>' .
					'<input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Nama lengkap Anda', 'rmjm' ) . '" required />' .
					'</p>',
				'email'  =>
					'<p class="comment-form-email">' .
					'<label for="email">' . esc_html__( 'Email', 'rmjm' ) . ' <span class="required">*</span></label>' .
					'<input id="email" name="email" type="email" placeholder="' . esc_attr__( 'Tidak dipublikasikan', 'rmjm' ) . '" required />' .
					'</p>',
				'url'    =>
					'<p class="comment-form-url">' .
					'<label for="url">' . esc_html__( 'Website', 'rmjm' ) . '</label>' .
					'<input id="url" name="url" type="url" placeholder="' . esc_attr__( 'https://example.com (opsional)', 'rmjm' ) . '" />' .
					'</p>',
			),
		) );

	endif; // comments_open() ?>

</div><!-- .comments-area -->
