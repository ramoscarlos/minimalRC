<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bulmapress
 */
?>

<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ):
	return;
endif;
?>

<div id="comments" class="comments-area">
	<?php
	if ( have_comments() ) : ?>
	<div class="">
		<div class="header">
			<h2 class="title is-size-2">Comentarios (<?php echo get_comments_number() ?>)</h2>
		</div>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'bulmapress' ); ?></h2>
			<div class="nav-links level">
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'bulmapress' ) ); ?></div>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'bulmapress' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ul class="comment-list ">
		<?php
		wp_list_comments( array(
			'style'       => 'ul',
			'short_ping'  => true,
			'avatar_size' => 0
		) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'bulmapress' ); ?></h2>
				<div class="nav-links level">
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'bulmapress' ) ); ?></div>
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'bulmapress' ) ); ?></div>
				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
			<?php
	endif; // Check for comment navigation.
	?>
</div>
<br>
<br>
<?php
endif; // Check for have_comments().
?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<div class="content">
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bulmapress' ); ?></p>
	</div>
	<?php
	endif;
	?>

	<?php $comment_args = array(
		'title_reply'=>'<h2 class="title is-size-2">¿Tienes algún comentario?</h2>',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<div class="control"><input class="input" id="author" name="author" type="text" placeholder="Tu nombre*" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
			'email'  => '<div class="control"><input class="input" id="email" name="email" type="text" placeholder="Tu correo electrónico*" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
			'url'    => '</div>'
		)),
		'comment_field' => '<p class="control">' . '<textarea class="textarea" id="comment" placeholder="Escribe aquí tu comentario..." name="comment" cols="45" rows="8" aria-required="true"></textarea>' . '</p></div>',
		'comment_notes_after' => '',
		'submit_button' => '<div class="control"><input name="submit" type="submit" id="submit" class="button is-primary is-fullwidth post-comment-button" value="Comentar" /></div></div>'
		);
		comment_form($comment_args); ?>
</div><!-- #comments -->